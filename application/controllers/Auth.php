<?php

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
//        if (isset($this->session->userdata['logged_in'])) {
//////        $username=($this->session->userdata['logged_in']['username']);
//////        $email=($this->session->userdata['logged_in']['password']);
//            redirect('/admin');
//        }
//         else {
//            
//        }
//       
    }

    public function login($page = 'login') {
      

        if (isset($this->session->userdata['logged_in'])) {
////////        $username=($this->session->userdata['logged_in']['username']);
////////        $email=($this->session->userdata['logged_in']['password']);
            redirect('/admin');
        } else {


            if ($this->input->is_ajax_request()) {

                try {
                    $this->form_validation->set_rules('userName', 'Username', 'required');
                    if ($this->form_validation->run() == false) {
                        echo json_encode(array(
                            "result" => utils_constant::ERROR_VALID_INPUT,
                            "reason" => "incorrect user name",
                            "field" => "userName"
                        ));
                        die();
                    }

                    $this->form_validation->set_rules('password', 'Password', 'required');
                    if ($this->form_validation->run() == false) {
                        echo json_encode(array(
                            "result" => utils_constant::ERROR_PASSWORD,
                            "reason" => "incorrect password",
                            "field" => "password"
                        ));
                        die();
                    }
//            if ($this->form_validation->run() == TRUE) {
//                echo json_encode(array(
//                    "result" => utils_constant::SUCCESS,
//                ));s
//
//                die();
//            }

                    $username = $this->input->post('userName');
                    $password = $this->input->post('password');

                    $user = new frsUser();

                    $result = $user->userLogin($username, $password);
                    if ($result == TRUE) {
                        echo json_encode(array(
                            "result" => utils_constant::SUCCESS,
                        ));
                        die();
                    } else {
                        echo json_encode(array(
                            "result" => utils_constant::ERROR_WRONGLOGIN,
                            "message" => "Invalid Username or Password",
                        ));
                        die();
                    }
                } catch (Exception $e) {
                    return $e;
                }
            }


            if (!file_exists(APPPATH . 'views/auth/' . $page . '.php')) {
// Whoops, we don't have a page for that!
                show_404();
            }

            $data['title'] = ucfirst($page); // Capitalize the first letter

            $this->load->view('auth/' . $page, $data);
        }
    }

    public function logout() {
        $data = array(
            'userLogoutTime' => date("Y/m/d h:i:s"),
        );
        $userId=($this->session->userdata['logged_in']['userId']);
        $this->load->model('UserManage');
        $this->UserManage->logoutTime($data, $userId);
        $sess_array = array(
//            'login' => 'false',
            'userId' => '',
        );
        $this->session->unset_userdata('logged_in', $sess_array);
//        $this->CI->session->sess_destroy();
        
        redirect('/login');
    }

}
