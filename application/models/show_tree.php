<?php

class Show_tree extends CI_Model{

public function show($find=''){

  if($find){

    $dt=$this->db->get_where('customers', array('username' => $find))->row()->id;
    $this->db->select('cid');
    $dt=$this->db->get_where('tree', array('joiner_id' => $dt))->result_array();
    return $dt;
   
        }else{

    $id= $this->session->userdata('id');
    $this->db->select('cid');
    $dt=$this->db->get_where('tree', array('joiner_id' => $id))->result_array();
    return $dt;
}
}
}
?>
