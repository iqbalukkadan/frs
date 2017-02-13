<?php

class frsUser {

    private $CI;
    private $userId;
    private $userName;
    private $userUsername;
    private $userPassword;
    private $userEmailId;
    private $userAddress;
    private $userGender;
    private $userMobile_no;
    private $userDOB;
    private $userRole;
    private $userBranch;
    private $status;
    private $image;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->database();
        if (isset($this->CI->session->userdata['logged_in']['login']) && $this->CI->session->userdata['logged_in']['login'] == 'Sucess') {
            $userId = ($this->CI->session->userdata['logged_in']['userId']);

            $this->CI->load->model('UserManage');
            $result = $this->CI->UserManage->userDetailsById($userId);

            if ($result != false) {
                foreach ($result[0] as $key => $value) {
                    $this->{$key} = $value;

//                    echo "public function set" . $key . '($value){</br> $this->' . $key . '=$value;<br/>}<br/>';
//                    echo "public function get" . $key . '(){</br> return $this->' . $key . ';<br/>}<br/>';
                }
//                exit;
            }
        }
    }

    public function userLogin($username, $password) {
        $username = $username;
        $password = $password;

        $this->CI->load->model('UserManage');
        $result = $this->CI->UserManage->login($username, $password);
        if ($result !== FALSE) {


            $result = $this->CI->UserManage->user_information($username);
            if ($result != false) {
                $session_data = array(
                    'login' => 'Sucess',
                    'userId' => $result[0]->userId,
                );

//
                // Add user data in session
                $this->CI->session->set_userdata('logged_in', $session_data);
                $userId = $result[0]->userId;
                $data = array(
                    'userId' => $userId,
                    'userLoginTime' => date("Y/m/d h:i:s"),
                );
                $this->CI->UserManage->loginTime($data);
            }
            return TRUE;
        }
    }

    public function setuserId($value) {
        $this->userId = $value;
    }

    public function getuserId() {
        return $this->userId;
    }

    public function setuserName($value) {
        $this->userName = $value;
    }

    public function getuserName() {
        return $this->userName;
    }

    public function setuserUsername($value) {
        $this->userUsername = $value;
    }

    public function getuserUsername() {
        return $this->userUsername;
    }

    public function setuserPassword($value) {
        $this->userPassword = $value;
    }

    public function getuserPassword() {
        return $this->userPassword;
    }

    public function setuserEmailId($value) {
        $this->userEmailId = $value;
    }

    public function getuserEmailId() {
        return $this->userEmailId;
    }

    public function setuserAddress($value) {
        $this->userAddress = $value;
    }

    public function getuserAddress() {
        return $this->userAddress;
    }

    public function setuserGender($value) {
        $this->userGender = $value;
    }

    public function getuserGender() {
        return $this->userGender;
    }

    public function setuserMobile_no($value) {
        $this->userMobile_no = $value;
    }

    public function getuserMobile_no() {
        return $this->userMobile_no;
    }

    public function setuserDOB($value) {
        $this->userDOB = $value;
    }

    public function getuserDOB() {
        return $this->userDOB;
    }

    public function setuserRole($value) {
        $this->userRole = $value;
    }

    public function getuserRole() {
        return $this->userRole;
    }

    public function setuserBranch($value) {
        $this->userBranch = $value;
    }

    public function getuserBranch() {
        return $this->userBranch;
    }

    public function setstatus($value) {
        $this->status = $value;
    }

    public function getstatus() {
        return $this->status;
    }

    public function setimage($value) {
        $this->image = $value;
    }

    public function getimage() {
        return $this->image;
    }

}
