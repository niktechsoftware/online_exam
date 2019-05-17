<?php
	class Examconfigmodel extends CI_Model{
		public function addExam($exam){
		$db = array(
			"exam_head" => $exam,
				//"school_code"=>$this->session->userdata("school_code"),
		);
		if(strlen($exam) > 1){
			
			$this->db->insert("exam_head",$db);
		}
		//$this->db->where("school_code",$this->session->userdata("school_code"));
		$query = $this->db->get("exam_head");
		return $query;
	}
	}
?>