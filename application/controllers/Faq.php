<?php

defined('BASEPATH') or exit('No script access allowed');

class Faq extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');

        $this->load->model('Data_faq');
        $this->load->model('Data_search');
        $this->load->model('Data_category');
    }

    public function index()
    {

        $data['faq'] = $this->Data_faq->show_all_faq();
        $data['category']   = $this->Data_category->show_category();
        $data['activePage'] = basename($_SERVER['PHP_SELF'], ".php");
        // var_dump($data);
        // die;

        $this->load->view('templates_user/header', $data);
        $this->load->view('user/faq', $data);
        $this->load->view('templates_user/footer');
    }

    public function detail_faq($id)
    {
        // echo $id;
        $data['faq'] = $this->Data_faq->show_faq_by_id($id);

        $get_faq_number = $this->Data_faq->get_faq_number($id);

        foreach ($get_faq_number as $nilai) {
            $count_number = $nilai['faq_open_number'] + 1;
        }
        $faq_number['faq_open_number'] = $count_number;
        $add_number_to_db['faq_number'] = $this->Data_faq->add_number($id, $faq_number);

        // var_dump($faq_number);
        // die;

        $this->load->view('user/detail_faq', $data);
        $this->load->view('templates_user/footer');
    }

    public function proses_search_data()
    {
        if (isset($_POST["query"])) {
            // $query = $this->input->post("query");

            $data = array();

            $condition = preg_replace('/[^A-Za-z0-9\- ]/', '', $_POST["query"]);

            $query_search = $this->Data_faq->search($condition);

            $replace_string = '<b>' . $condition . '</b>';

            foreach ($query_search as $row) {

                $data[] = array(
                    'faq_consultation'        =>    str_ireplace($condition, $replace_string, $row["faq_consultation"])
                );
            }
            echo json_encode($data);
        }

        $post_data = json_decode(file_get_contents('php://input'), true);

        if (isset($post_data['search_query'])) {
            // $data = array(
            //     ':search_query'        =>    $post_data['search_query']
            // );
            $data['search_query'] = $post_data['search_query'];

            $query_search = $data['search_query'];

            $query = $this->db->Data_search->search($query_search);

            if ($query->rowCount() == 0) {
                $query2 = $this->Data_search->insert($query_search);

                $query2->execute($data);

                $output = array(
                    'success'    =>    true
                );

                echo json_encode($output);
            }
        }

        if (isset($post_data['action'])) {

            if ($post_data['action'] == 'fetch') {

                $result = $this->Data_search->get_search();

                // $data = array();
                foreach ($result as $row) {
                    $data['id'] = $row['search_id'];
                    $data['search_query'] = $row['search_query'];
                }

                echo json_encode($data);
            }

            if ($post_data['action'] == 'delete') {

                $id = $post_data["id"];
                $query = $this->Data_search->delete($id);

                $output = array(
                    'success'    =>    true
                );
                echo json_encode($output);
            }
        }
    }

    public function getFaqAutocomplete()
    {
        $json = array();
        $faqConsultation = $this->input->post('query');
        $this->Data_faq->setFaqConsultation($faqConsultation);
        $geConsultation = $this->Data_faq->getAllFaq();
        foreach ($geConsultation as $element) {
            $json[] = array(
                'faq_id' => $element['faq_id'],
                'faq_consultation' => $element['faq_consultation'],
            );
        }
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json);
    }

    public function show_faq_to_dom()
    {
        $json = array();
        $data = $this->Data_faq->show_faq_dom();
        foreach ($data as $element) {
            $json[] = array(
                'label' => substr($element['faq_consultation'], 0, 40) . "...",
                'value' => "Faq/detail_faq/" . $element['faq_id'],
            );
        }
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json);
    }
}
