<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Data_admin');
        // load model

        $this->load->helper(array('form', 'file', 'url'));
        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    public function index()
    {
        //userdata
        $data['username']   = $this->session->userdata('username');
        $data['id']         = $this->session->userdata('id');
        $data['title']      = 'Admin Panel | Profil Admin';
        $data['title_name'] = 'Profil';
        $data['footer']     = 'Powered by Cleverlabs Indonesia <span class="text-muted d-none d-sm-inline-block float-right"></span>';

        $id_admin = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        // var_dump($data);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/admin_profile', $data);
        $this->load->view('templates/footer', $data);
    }

    public function get($id)
    {
        $data = $this->Data_admin->get_profile($id);
        echo json_encode($data);
    }

    public function edit_profile()
    {
        $id['id']               = $this->input->post('ed_id');
        $data['name']           = $this->input->post('ed_name');
        $data_img['image']      = $this->input->post('add_images');
        $image                  = $data_img['image'];

        if ($image != " ") {
            $config['upload_path']          = './assets/images/users/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['overwrite']            = true;
            $config['max_size']             = 10000;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('add_images')) {
                $file_image         = $this->upload->data();
                $images['image']    = $file_image['file_name'];

                // var_dump($id, $data, $image);
                // die;

                $this->Data_admin->edit_image($id, $images);
                $this->Data_admin->edit_profile($id, $data);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data anda berhasil diubah.
                 </div>'
                );

                redirect('admin/Admin_profile/');
            } else {
                $this->Data_admin->edit_profile($id, $data);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data anda berhasil diubah.
                 </div>'
                );

                redirect('admin/Admin_profile/');
            }
        } else if ($image == " ") {
            $this->Data_admin->edit_profile($id, $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data anda tanpa foto profil berhasil diubah.
                 </div>'
            );

            redirect('admin/Admin_profile/');
        }
    }

    public function changepassword()
    {

        //userdata
        $data['username']   = $this->session->userdata('username');
        $data['id']         = $this->session->userdata('id');
        $data['title']      = 'Admin Panel | Profil Admin';
        $data['footer']     = 'Powered by Cleverlabs Indonesia <span class="text-muted d-none d-sm-inline-block float-right"></span>';

        $id_admin = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        $id_user            = $this->input->post('ed_id');
        $current_password   = $this->input->post('ed_current_password');

        $cek_id = $this->Data_admin->get_profile($id_user);

        // var_dump($cek_id);
        // die;

        if ($cek_id != " ") {
            if (password_verify($current_password, $cek_id['password'])) {

                $new_password       = $this->input->post('ed_new_password');
                $id['id']           = $this->input->post('ed_id');
                $new_password_hash  = password_hash($new_password, PASSWORD_DEFAULT);
                $pass['password']   = $new_password_hash;

                $this->Data_admin->edit_profile($id, $pass);

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Password anda berhasil diubah.
                 </div>'
                );

                redirect('admin/Admin_profile/');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Maaf!</strong> Password anda gagal diubah.
                 </div>'
                );

                redirect('admin/Admin_profile/');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Maaf!</strong> Password anda gagal diubah.
                 </div>'
            );

            redirect('admin/Admin_profile/');
        }


        // $new_password       = $this->input->post('ed_new_password');


        // if ($this->form_validation->run() == false) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/side_bar');
        //     $this->load->view('admin/admin_profile', $data);
        //     $this->load->view('templates/footer', $data);
        // } else {
        //     $current_password   = $this->input->post('current_password');
        //     $new_password       = $this->input->post('new_password1');
        //     if (!password_verify($current_password, $data['user']['password'])) {
        //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        //         Wrong Current Password
        //         </div>');
        //         redirect('admin/admin_password');
        //     } else {

        //         //password sudah benar
        //         $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        //         $this->db->set('password', $password_hash);
        //         $this->db->where('username', $this->session->userdata('username'));
        //         $this->db->update('user');

        //         $this->session->set_flashdata(
        //             'message',
        //             '<div class="alert alert-success" role="alert">
        //             Password Changed !
        //             </div>'
        //         );
        //         redirect('admin/admin_profile');
        //     }
        // }
    }
}
