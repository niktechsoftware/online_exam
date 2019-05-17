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

		public function updateStream($examId,$examName){
		$val = array(
				"exam_head" => $examName,
				//"school_code"=>$this->session->userdata("school_code"),
		);
		
		$this->db->where("id",$examId);
		$query = $this->db->update("exam_head",$val);
		return true;
	}
	
	public function deleteStream($examId){
		//$this->db->where("school_code",$this->session->userdata("school_code"));
		  $class=$this->db->get('exam_head')->result();
		  print_r($class);
		foreach ($class as $value)
		   {
		   	  if($value->exam_head==$examId)
		   	  {
               
                echo "<script>alert('you can not delete this stream because this stream is already used in class');</script>";
                return false;


		   	  }
		   }
		   	  	$this->db->where("id",$examId);
		    $query = $this->db->delete("exam_head");
		    return $query;

		   	 

		// $this->db->where("id",$streamId);
		// $query = $this->db->delete("stream");
		// return $query;
	}
	}
?>