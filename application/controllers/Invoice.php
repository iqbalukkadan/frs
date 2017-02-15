<?php

class Invoice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
////////      
            redirect('/login');
        }

        $this->load->model('ConsignmentManage');
    }

    public function addInvoice($page = 'invoice') {

        if ($this->input->is_ajax_request()) {

            try {
                $this->form_validation->set_rules('billnum', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect Bill Number",
                        "field" => "billnum"
                    ));
                    die();
                }
                $this->form_validation->set_rules('name', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect Company Name",
                        "field" => "name"
                    ));
                    die();
                }

                $this->form_validation->set_rules('date', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Pickup date is required",
                        "field" => "date"
                    ));
                    die();
                }
                $this->form_validation->set_rules('origin', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Origin is required",
                        "field" => "origin"
                    ));
                    die();
                }
                $this->form_validation->set_rules('consignee', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Consignee name is required",
                        "field" => "consignee"
                    ));
                    die();
                }
                $this->form_validation->set_rules('mode', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Mode is required",
                        "field" => "mode"
                    ));
                    die();
                }
                $this->form_validation->set_rules('weight', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Weight is required",
                        "field" => "weight"
                    ));
                    die();
                }
                $this->form_validation->set_rules('destination', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Destination is required",
                        "field" => "destination"
                    ));
                    die();
                }
                $this->form_validation->set_rules('amount', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Weight is required",
                        "field" => "amount"
                    ));
                    die();
                }
              $this->form_validation->set_rules('state', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "State is required",
                        "field" => "address"
                    ));
                    die();
                }
                $this->form_validation->set_rules('district', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "District is required",
                        "field" => "address"
                    ));
                    die();
                }
                $this->form_validation->set_rules('city', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "City is required",
                        "field" => "address"
                    ));
                    die();
                }

                $this->form_validation->set_rules('pin', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Pin code is required",
                        "field" => "address"
                    ));
                    die();
                }
                $this->form_validation->set_rules('mob', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Mobile code is required",
                        "field" => "address"
                    ));
                    die();
                }
                $data = array(
                    'invoiceNumber' => $this->input->post('invoicenum', TRUE),
                    'consignmentNumber' => $this->input->post('billnum', TRUE),
                    'origin' => $this->input->post('origin', TRUE),
                    'invoiceWeight' => $this->input->post('weight', TRUE),
                    'quantityInPieces' => $this->input->post('quantity', TRUE),
                    'destination' => $this->input->post('destination', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'amount' => $this->input->post('amount', TRUE),
                    'deliveryState' => $this->input->post('state', TRUE),
                    'deliveryDistrict' => $this->input->post('district', TRUE),
                    'deliveryCity' => $this->input->post('city', TRUE),
                    'deliveryPin' => $this->input->post('pin', TRUE),
                    'deliveryMobile' => $this->input->post('mob', TRUE),
                    'deliveryClint' => $this->input->post('clintName', TRUE),
                    'deliveryClintHouse' => $this->input->post('home', TRUE),
                    'deliveryClintPost' => $this->input->post('post', TRUE),
                );
//                $insert = $this->ConsignmentManage->consignmentInsert($data);
//                if ($insert == true) {
////                    $data = $this->ConsignmentManage->displayConsignment();
//                    echo json_encode(array(
//                        "result" => utils_constant::SUCCESS,
//                        "reason" => 'success',
//                    ));
//                    die();
//                    echo json_encode(array(
//                        "result" => utils_constant::CREATED,
//                        "reason" => "add successfully",
//                    ));
//                    die();
//                }
            } catch (Exception $e) {
                return $e;
            }
        }

        if (!file_exists(APPPATH . 'views/admin/pages/' . $page . '.php')) {
// Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter



        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pages/' . $page, $data);
        $this->load->view('templates/admin_footer', $data);
    }

}
