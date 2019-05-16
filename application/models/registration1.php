<?php

class Registration1 extends CI_Model{

public function insert($tablename,$value){
	
    return $this->db->insert($tablename, $value)?$this->db->insert_id():false;

}

public function getsubcat1($tid){
 $query = $this->db->query("SELECT DISTINCT * FROM sub_category WHERE  cat_id = '$tid' order by id");
    return $query;
}
public function getsbranch($tid){
    $query = $this->db->query("SELECT DISTINCT * FROM sub_branch WHERE  district = '$tid' order by id");
       return $query;
   }
   
 public function stockupdate($tablename,$data){
	
    return $this->db->insert($tablename, $data)?$this->db->insert_id():false;

}



}
?>
