<?php

Class ConsignmentManage extends CI_Model {

    function __construct() {
        parent::__construct();
    }

   
    function consignmentInsert($data) {
// Inserting in Table(frs_user) of Database(frs)
        $this->db->insert('frs_consignment', $data);
        return TRUE;
    }

    public function displayConsignment() {

        $query = "select * from frs_consignment order by consignmentId DESC limit 1";
        $result = $this->db->query($query);

        if ($result->num_rows() > 0) {
            return $result->result("array");
        }
        else{
            return FALSE;
        }
    }

}

?>