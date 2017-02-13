<?php

Class UserManage extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function login($username, $password) {

        $this->db->select('userUsername, userPassword');
        $this->db->from('frs_user');
        $this->db->where('userUsername', $username);
        $this->db->where('userPassword', MD5($password));
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->result();
        } else {
            return false;
        }
    }

// Read data from database to show data in admin page
    public function user_information($username) {

        $condition = "userUsername =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('frs_user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

// Read data from database to show data in admin page
    public function userDetailsById($userId) {

        $condition = "userId =" . "'" . $userId . "'";
        $this->db->select('*');
        $this->db->from('frs_user');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function checkUsername($username) {

        $this->db->select('*');
        $this->db->from('frs_user');
        $this->db->where('userUsername', $username);
        $this->db->where("(STATUS='created' or STATUS='edited')");
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function userInsert($data) {
// Inserting in Table(frs_user) of Database(frs)
        $this->db->insert('frs_user', $data);
        return TRUE;
    }

    public function selectRole() {
//        $this->db->select('role');
//        $this->db->from('roles');
        $query = $this->db->get('frs_roles');
//        return $this->db->query($query)->result();
        $query_result = $query->result();
        return $query_result;
    }

    public function selectBranch() {
//        $this->db->select('role');
//        $this->db->from('roles');
        $query = $this->db->get('frs_branches');
//        return $this->db->query($query)->result();
        $query_result = $query->result();
        return $query_result;
    }

    public function displayUser() {

        $this->db->select('*');
        $this->db->from('frs_user');
        $this->db->where("(STATUS='created' or STATUS='edited')");
        $query = $this->db->get();

        return $query->result();
    }

    public function deleteUser($id, $data) {

        $this->db->where('userId', $id);
        $query = $this->db->update('frs_user', $data);

        return TRUE;
    }

    public function loginTime($data) {

        $this->db->insert('frs_user_history', $data);
    }

    public function logoutTime($data, $userId) {
        $this->db->where('userId', $userId);

        $this->db->update('frs_user_history', $data);
    }

    public function userEditDetails($Id) {

        $this->db->where('userId', $Id);
        $query = $this->db->get('frs_user');

        return $query->result();
    }
    public function userNewDatas($data, $userId) {

        $this->db->where('userId', $userId);
        $query = $this->db->update('frs_user', $data);

        return TRUE;
    }
    public function selectUsername($userId, $userName) {
        $this->db->select('userUsername');
        $this->db->where('userId', $userId);
        $this->db->where('userUsername', $userName);
        $query=$this->db->get('frs_user');
         if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

}

?>