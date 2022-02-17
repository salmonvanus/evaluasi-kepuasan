<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Consultation_form extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Data_user_consultation');
        $this->load->model('Data_consultation');

        $this->load->helper(array('url', 'file', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->load->view('templates_user/header');
        $this->load->view('user/consultation_form');
        $this->load->view('templates_user/footer');
    }

    public function add_consultation()
    {
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
        $userIp = $this->input->ip_address();
        $secret = $this->config->item('google_secret');
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $status = json_decode($output, true);

        if ($status['success']) {

            $data['user_full_name']     = $this->input->post('add_user_full_name');

            $data['user_phone_number']  = $this->input->post('add_phone_number');

            $phone_number = $data['user_phone_number'];
            // ambil angka +62
            $ambil_angka = substr($phone_number, 0, 2);
            if ($ambil_angka == '08') {
                $replace = str_replace($ambil_angka, "+628", $phone_number);
                // var_dump($replace);
                // die;
                $data['user_phone_number'] = $replace;
            }

            $data['user_email']         = $this->input->post('add_user_mail');

            // var_dump($data);
            // die;

            $insert_user    = $this->Data_user_consultation->insert_user($data);
            $id['user_id']  = $insert_user['user_id'];

            if ($insert_user != ' ') {
                $consultation['user_id']                        = $id['user_id'];
                $consultation['consultation_text']              = $this->input->post('add_consultation_text');
                $consultation['consultation_date_created']      = date("Y-m-d H-i-s");
                $consultation['consultation_status']            = 0;

                // var_dump($consultation);
                // die;
                $insert_consultation = $this->Data_consultation->insert_consultation($consultation);

                if ($insert_consultation != ' ') {
                    $this->session->set_flashdata(
                        'message',
                        '<script>
                            swal({
                                title: "Selamat!",
                                text: "Konsultasi anda berhasil terkirim!",
                                icon: "success",
                                button: "Selesai",
                            });
                        </script>'
                    );
                    redirect('Landing');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<script>
                            Swal.fire({
                            icon: "error",
                            title: "Maaf",
                            text: "Konsultasi anda gagal terkirim.",
                            });
                        </script>'
                    );
                    redirect('Landing');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<script>
                        Swal.fire({
                        icon: "error",
                        title: "Maaf",
                        text: "Konsultasi anda gagal terkirim.",
                        });
                    </script>'
                );
                redirect('Landing');
            }
        } else {
            // $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
            $this->session->set_flashdata(
                'message',
                '<script>
                        Swal.fire({
                        icon: "error",
                        title: "Maaf",
                        text: "Validasi gagal.",
                        });
                </script>'
            );
            redirect('Consultation_form');
        }
    }

    public function search()
    {
        $data['search_keyword'] = $this->input->post('search_keywords');

        var_dump($data);
        die;
    }

    public function reply_consultation($id)
    {

        $this->load->view('reply_consultation');
    }
}
