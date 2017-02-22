<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
////////        $username=($this->session->userdata['logged_in']['username']);
////////        $email=($this->session->userdata['logged_in']['password']);
            redirect(BASE_URL.'/auth/login');
        }

        $this->load->model('UserManage');
    }

    public function create($page = 'usercreate') {
        if ($this->input->is_ajax_request()) {

            try {
                $this->form_validation->set_rules('name', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect Name",
                        "field" => "name"
                    ));
                    die();
                }
                $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[10]');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect User name",
                        "field" => "username"
                    ));
                    die();
                }
                $this->form_validation->set_rules('password', 'Password', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_PASSWORD,
                        "reason" => "Incorrect password",
                        "field" => "password"
                    ));
                    die();
                }
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect email",
                        "field" => "email"
                    ));
                    die();
                }
                $this->form_validation->set_rules('address', 'Address', 'required|min_length[10]|max_length[50]');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect Address",
                        "field" => "address"
                    ));
                    die();
                }
                $this->form_validation->set_rules('mobile', 'Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect Contact Number",
                        "field" => "mobile"
                    ));
                    die();
                }
                $username = $this->input->post('username', TRUE);
                
                $result = $this->UserManage->checkUsername($username);
                if ($result == TRUE) {
                    $data = array(
                        'userName' => $this->input->post('name', TRUE),
                        'userUsername' => $this->input->post('username', TRUE),
                        'userPassword' => md5($this->input->post('password', TRUE)),
                        'userEmailId' => $this->input->post('email', TRUE),
                        'userAddress' => $this->input->post('address', TRUE),
                        'userGender' => $this->input->post('gender', TRUE),
                        'userMobile_no' => $this->input->post('mobile', TRUE),
                        'userDOB' => $this->input->post('date', TRUE),
                        'userRole' => $this->input->post('role', TRUE),
                        'userBranch' => $this->input->post('branch', TRUE),
                        'STATUS' => 'created',
                        'createdDate' => date("Y/m/d h:i:s"),
                    );
                    $insert = $this->UserManage->userInsert($data);
                    if ($insert == TRUE) {

                        echo json_encode(array(
                            "result" => utils_constant::CREATED,
                            "reason" => "created success",
                        ));
                        die();
                    }
                } else {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_ALREADY_EXIST,
                        "reason" => "username already exist",
                        "field" => "username"
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
        $data['userDetails'] = $this->UserManage->displayUser();
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['roles'] = $this->UserManage->selectRole();
        $data['branches'] = $this->UserManage->selectBranch();


        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pages/' . $page, $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function update($page = 'userupdate') {
        if (!file_exists(APPPATH . 'views/admin/pages/' . $page . '.php')) {
// Whoops, we don't have a page for that!
            show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['userDetails'] = $this->UserManage->displayUser();
//        print_r($data['userDetails']);
//        exit;


        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pages/' . $page, $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function delete() {

        $id = $_POST['dataDel'];
        $data = array(
            'STATUS' => 'deleted',
        );
        $delete = $this->UserManage->deleteUser($id, $data);
        if ($delete == TRUE) {
            echo json_encode(array(
                "result" => utils_constant::SUCCESS,
                "message" => "successfully deleted",
            ));
            die();
        }
    }

    public function edit($page = 'useredit') {

        if ($this->input->is_ajax_request()) {

            try {
                $this->form_validation->set_rules('name', 'Name', 'required');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect Name",
                        "field" => "name"
                    ));
                    die();
                }
                $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[10]');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect User name",
                        "field" => "username"
                    ));
                    die();
                }
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect email",
                        "field" => "email"
                    ));
                    die();
                }
                $this->form_validation->set_rules('address', 'Address', 'required|min_length[10]|max_length[50]');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect Address",
                        "field" => "address"
                    ));
                    die();
                }
                $this->form_validation->set_rules('mobile', 'Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                        "result" => utils_constant::ERROR_VALID_INPUT,
                        "reason" => "Incorrect Contact Number",
                        "field" => "mobile"
                    ));
                    die();
                }
                $userId = $this->input->post('id', TRUE);
                $username = $this->input->post('username', TRUE);
                $data = array(
                    'userName' => $this->input->post('name', TRUE),
                    'userUsername' => $this->input->post('username', TRUE),
                    'userEmailId' => $this->input->post('email', TRUE),
                    'userAddress' => $this->input->post('address', TRUE),
                    'userGender' => $this->input->post('gender', TRUE),
                    'userMobile_no' => $this->input->post('mobile', TRUE),
                    'userDOB' => $this->input->post('date', TRUE),
                    'userRole' => $this->input->post('role', TRUE),
                    'userBranch' => $this->input->post('branch', TRUE),
                    'STATUS' => 'edited',
                    'createdDate' => date("Y/m/d h:i:s"),
                );
//                
                $currentUserName = $this->UserManage->selectUsername($userId, $username);

                if ($currentUserName == FALSE) {
//                    check the username is changed or not
                    $edit = $this->UserManage->userNewDatas($data, $userId);
                    if ($edit == TRUE) {

                        echo json_encode(array(
                            "result" => utils_constant::CREATED,
                            "reason" => "edited success",
                        ));
                        die();
                    }
                } else {
                    $result = $this->UserManage->checkUsername($username);
                    if ($result == TRUE) {
                        $edit = $this->UserManage->userNewDatas($data, $userId);
                        if ($edit == TRUE) {

                            echo json_encode(array(
                                "result" => utils_constant::CREATED,
                                "reason" => "edited success",
                            ));
                            die();
                        }
                    } else {
                        echo json_encode(array(
                            "result" => utils_constant::ERROR_ALREADY_EXIST,
                            "reason" => "username already exist",
                            "field" => "username"
                        ));
                        die();
                    }
                }
            } catch (Exception $e) {
                return $e;
            }
        }

        if (!file_exists(APPPATH . 'views/admin/pages/' . $page . '.php')) {
// Whoops, we don't have a page for that!
            show_404();
        }

        $Id = $_GET['id'];
        $data['UserDetails'] = $this->UserManage->displayUser();
        $data['userDetails'] = $this->UserManage->userEditDetails($Id);
        $data['id'] = $_GET['id'];
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['roles'] = $this->UserManage->selectRole();
        $data['branches'] = $this->UserManage->selectBranch();


        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pages/' . $page, $data);
        $this->load->view('templates/admin_footer', $data);
    }

}
