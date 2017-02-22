<?php

Class InvoiceManage extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function invoiceInsert($data) {

        $this->db->insert('frs_invoice', $data);
        return $this->db->insert_id();
        return TRUE;
    }

//    public function invoiceDetails($billId) {
//        $this->db->select('*');
//        $this->db->from('frs_invoice');
//        $this->db->where('consignmentNumber', $billId);
//        $query = $this->db->get();
//
//        return $query->result();
//    }
    public function invoiceDetails($billNum ) {
        $this->db->select('*');
        $this->db->from('frs_invoice');
        $this->db->where('consignmentNumber', $billNum);
        $query = $this->db->get();

        return $query->result();
    }

//    public function consiDetailsById($billId) {
//        $this->db->select('*');
//        $this->db->from('frs_consignment');
//        $this->db->where('consignmentId', $billId);
//        $query = $this->db->get();
//
//        return $query->result();
//    }
   public function invoiceDetailsById($invoiceId) {
        $this->db->select('*');
        $this->db->from('frs_invoice');
        $this->db->where('invoiceId', $invoiceId);
        $query = $this->db->get();

        return $query->result();
    }
    public function invoiceUpdate($data, $id) {
        $this->db->where('invoiceId', $id);
        $query = $this->db->update('frs_invoice', $data);

        return TRUE;
        
    }
}

?>