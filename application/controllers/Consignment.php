<?php

class Consignment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
////////      
            redirect(BASE_URL . '/auth/login');
        }
        $this->load->model('InvoiceManage');
        $this->load->model('ConsignmentManage');
    }

    public function addConsignment($page = 'consignment') {


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

                $data = array(
                    'billNumber' => $this->input->post('billnum', TRUE),
                    'companyName' => $this->input->post('name', TRUE),
                    'pickupDate' => $this->input->post('date', TRUE),
                    'origin' => $this->input->post('origin', TRUE),
                    'consigneeName' => $this->input->post('consignee', TRUE),
                    'MODE' => $this->input->post('mode', TRUE),
                    'weight' => $this->input->post('weight', TRUE),
                    'destination' => $this->input->post('destination', TRUE),
                    'amount' => $this->input->post('amount', TRUE),
                    'deliveryState' => $this->input->post('state', TRUE),
                    'deliveryDistrict' => $this->input->post('district', TRUE),
                    'deliveryCity' => $this->input->post('city', TRUE),
                    'deliveryPin' => $this->input->post('pin', TRUE),
                    'deliveryMobile' => $this->input->post('mob', TRUE),
                    'deliveryClint' => $this->input->post('clintName', TRUE),
                    'deliveryClintHouse' => $this->input->post('home', TRUE),
                    'deliveryClintPost' => $this->input->post('post', TRUE),
                    'status' => 'created',
                );
                $insert = $this->ConsignmentManage->consignmentInsert($data);

                echo json_encode(array(
                    "result" => utils_constant::SUCCESS,
                    "reason" => 'success',
                    "data" => $this->db->insert_id(),
                ));
                die();
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

    public function manage($page = 'consiManage') {
        if (!file_exists(APPPATH . 'views/admin/pages/' . $page . '.php')) {
// Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['consiDetails'] = $this->ConsignmentManage->consiDetails();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pages/' . $page, $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function consiDetailsById() {

        $billId = $_POST['billNum'];
        $data['billId'] = $billId;

        $data['consiDetails'] = $this->ConsignmentManage->consiDetails();
        $data['consiDetailsById'] = $this->ConsignmentManage->consiDetailsById($billId);
        $billNum = $data['consiDetailsById'][0]->billNumber;
        $data['invoiceDetails'] = $this->InvoiceManage->invoiceDetails($billNum);

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pages/consiManage', $data);
        $this->load->view('templates/admin_footer', $data);
    }

//    public function consiDelete() {
//        $billId = $_GET['id'];
//        $data = array(
//            'status' => 'deleted',
//        );
//        $data['invoiceDetails'] = $this->ConsignmentManage->deleteConsi($billId, $data);
//
//        $data['consiDetails'] = $this->ConsignmentManage->consiDetails();
//
//        $this->load->view('templates/admin_header', $data);
//        $this->load->view('admin/pages/consiManage', $data);
//        $this->load->view('templates/admin_footer', $data);
//    }

    public function consiEdit($page = 'editConsi') {
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


                $data = array(
                    'billNumber' => $this->input->post('billnum', TRUE),
                    'companyName' => $this->input->post('name', TRUE),
                    'pickupDate' => $this->input->post('date', TRUE),
                    'origin' => $this->input->post('origin', TRUE),
                    'consigneeName' => $this->input->post('consignee', TRUE),
                    'MODE' => $this->input->post('mode', TRUE),
                    'weight' => $this->input->post('weight', TRUE),
                    'destination' => $this->input->post('destination', TRUE),
                    'amount' => $this->input->post('amount', TRUE),
                    'deliveryState' => $this->input->post('state', TRUE),
                    'deliveryDistrict' => $this->input->post('district', TRUE),
                    'deliveryCity' => $this->input->post('city', TRUE),
                    'deliveryPin' => $this->input->post('pin', TRUE),
                    'deliveryMobile' => $this->input->post('mob', TRUE),
                    'deliveryClint' => $this->input->post('clintName', TRUE),
                    'deliveryClintHouse' => $this->input->post('home', TRUE),
                    'deliveryClintPost' => $this->input->post('post', TRUE),
                    'status' => 'updated',
                );
//                hidden input
                $id=$this->input->post('id', TRUE);
                
                $insert = $this->ConsignmentManage->consignmentUpdate($data, $id);

                echo json_encode(array(
                    "result" => utils_constant::SUCCESS,
                    "reason" => 'success',
                ));
                die();
            } catch (Exception $e) {
                return $e;
            }
        }
        if (!file_exists(APPPATH . 'views/admin/pages/' . $page . '.php')) {
// Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $billId = $_GET['id'];

        $data['consiDetailsById'] = $this->ConsignmentManage->consiDetailsById($billId);

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pages/' . $page, $data);
        $this->load->view('templates/admin_footer', $data);
    }

}
