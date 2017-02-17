<?php

Class ConsignmentManage extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function consignmentInsert($data) {
// Inserting in Table(frs_user) of Database(frs)
        $this->db->insert('frs_consignment', $data);
//        $inser_id = $this->db->insert_id();

        return $this->db->insert_id();
    }

    public function consiDetails() {
        $this->db->select('*');
        $this->db->from('frs_consignment');
        $query = $this->db->get();

        return $query->result();
    }
     public function consiDetailsById($billId) {
        $this->db->select('*');
        $this->db->from('frs_consignment');
        $this->db->where('consignmentId', $billId);
        $query = $this->db->get();

        return $query->result();
    }

}

?>