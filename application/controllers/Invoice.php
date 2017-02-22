<?php

class Invoice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
////////      
            redirect(BASE_URL . '/auth/login');
        }

        $this->load->model('InvoiceManage');
        $this->load->model('ConsignmentManage');
    }

    public function addInvoice($page = 'invoice') {

        if ($this->input->is_ajax_request()) {

            try {
                $this->form_validation->set_rules('invoicenum', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Invoice number is required",
                        "field" => "invoicenum"
                    ));
                    die();
                }
                $this->form_validation->set_rules('billnum', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Bill number is requierd",
                        "field" => "billnum"
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
                $this->form_validation->set_rules('weight', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "weight is required",
                        "field" => "weight"
                    ));
                    die();
                }
                $this->form_validation->set_rules('quantity', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "quantity is required",
                        "field" => "quantity"
                    ));
                    die();
                }

                $this->form_validation->set_rules('destination', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "destination is required",
                        "field" => "destination"
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
                        "field" => "state"
                    ));
                    die();
                }
                $this->form_validation->set_rules('district', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "District is required",
                        "field" => "district"
                    ));
                    die();
                }
                $this->form_validation->set_rules('city', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "City is required",
                        "field" => "city"
                    ));
                    die();
                }

                $this->form_validation->set_rules('pin', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Pin code is required",
                        "field" => "pin"
                    ));
                    die();
                }
                $this->form_validation->set_rules('mob', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Mobile code is required",
                        "field" => "mob"
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
                $insert = $this->InvoiceManage->invoiceInsert($data);
                if ($insert == true) {
////                    $data = $this->ConsignmentManage->displayConsignment();
                    echo json_encode(array(
                        "result" => utils_constant::SUCCESS,
                        "reason" => 'success',
                    ));
                    die();
//                   
                }
            } catch (Exception $e) {
                return $e;
            }
        }

        if (!file_exists(APPPATH . 'views/admin/pages/' . $page . '.php')) {
// Whoops, we don't have a page for that!
            show_404();
        }


        $data['title'] = ucfirst($page); // Capitalize the first letter
//        consi=consignment

        $data['consiDetails'] = $this->ConsignmentManage->consiDetails();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pages/' . $page, $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function consiDetailsById() {
        $billId = $_POST['billNum'];
        $data['consiDetails'] = $this->ConsignmentManage->consiDetails();
//print default address
        $data['consiDetailsById'] = $this->ConsignmentManage->consiDetailsById($billId);
        $data['billId'] = $billId;

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pages/invoice', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function invoiceEdit($page = 'editInvoice') {

        if ($this->input->is_ajax_request()) {
            try {
                $this->form_validation->set_rules('invoicenum', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Invoice number is required",
                        "field" => "invoicenum"
                    ));
                    die();
                }
                $this->form_validation->set_rules('billnum', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Bill number is requierd",
                        "field" => "billnum"
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
                $this->form_validation->set_rules('weight', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "weight is required",
                        "field" => "weight"
                    ));
                    die();
                }
                $this->form_validation->set_rules('quantity', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "quantity is required",
                        "field" => "quantity"
                    ));
                    die();
                }

                $this->form_validation->set_rules('destination', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "destination is required",
                        "field" => "destination"
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
                        "field" => "state"
                    ));
                    die();
                }
                $this->form_validation->set_rules('district', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "District is required",
                        "field" => "district"
                    ));
                    die();
                }
                $this->form_validation->set_rules('city', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "City is required",
                        "field" => "city"
                    ));
                    die();
                }

                $this->form_validation->set_rules('pin', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Pin code is required",
                        "field" => "pin"
                    ));
                    die();
                }
                $this->form_validation->set_rules('mob', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Mobile code is required",
                        "field" => "mob"
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
                    'status' => 'updated',
                );
                
                $id=$this->input->post('id', TRUE);
                
                $insert = $this->InvoiceManage->invoiceUpdate($data, $id);
                
                if ($insert == true) {
                    echo json_encode(array(
                        "result" => utils_constant::SUCCESS,
                        "reason" => 'success',
                    ));
                    die();
                }
                
            } catch (Exception $e) {
                return $e;
            }
        }
        if (!file_exists(APPPATH . 'views/admin/pages/' . $page . '.php')) {
// Whoops, we don't have a page for that!
            show_404();
        }


        $data['title'] = ucfirst($page); // Capitalize the first letter
        $invoiceId=$_GET['id'];
        $data['invoiceDetails'] = $this->InvoiceManage->invoiceDetailsById($invoiceId);

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pages/' . $page, $data);
        $this->load->view('templates/admin_footer', $data);
    }

}
