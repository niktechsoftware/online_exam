<?php
	class Examconfigmodel extends CI_Model{
		//add exam section start
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
		public function updateExam($examId,$examName){
		$val = array(
				"exam_head" => $examName,
				//"school_code"=>$this->session->userdata("school_code"),
		);
		$this->db->where("id",$examId);
		$query = $this->db->update("exam_head",$val);
		return true;
	}
	public function deleteExam($examId){
		//$this->db->where("school_code",$this->session->userdata("school_code"));
		  $exam=$this->db->get('exam_head')->result();
		foreach ($exam as $value) {
		   	  if($value->exam_head==$examId){
                echo "<script>alert('you can not delete this exam because this exam is already used in class');</script>";
                return false;
		   	  }
		   }
		   	  	$this->db->where("id",$examId);
		    $query = $this->db->delete("exam_head");
		    return $query;
		}
		// end add  exam section  
		//start add test section
		public function addTest($test,$exam_head,$testDesc,$testMarks){
			$db = array(
			"test_name" => $test,
			"exam_head_id" =>$exam_head,
			"test_description" => $testDesc,
			"test_marks" => $testMarks
				//"school_code"=>$this->session->userdata("school_code"),
			);
			if(strlen($test)>1&&strlen($testDesc)>1&&strlen($testMarks)>1)
			{
			    $this->db->insert("test_name",$db);
			    }
			   $query = $this->db->get("test_name");
			    //print_r($query);exit();
			   return $query;
			   
			// } 
			// else {
			// 	echo "notttt";
			// }
			//$this->db->where("school_code",$this->session->userdata("school_code"));es
		}
		public function updateTest($testId,$testName,$testDescription,$testMarks){
		$val = array(
				"test_name" => $testName,
				"test_description" => $testDescription,
				"test_marks" => $testMarks
				//"school_code"=>$this->session->userdata("school_code"),
		);
		$this->db->where("id",$testId);
		$query = $this->db->update("test_name",$val);
		return true;
	}
	public function deleteTest($testId){
		//$this->db->where("school_code",$this->session->userdata("school_code"));
		  $test=$this->db->get('test_name')->result();
		foreach ($test as $value) {
		   	  if($value->test_name==$testId){
                echo "<script>alert('you can not delete this test because this exam is already used in class');</script>";
                return false;
		   	  }
		   }
		   	  	$this->db->where("id",$testId);
		    $query = $this->db->delete("test_name");
		    return $query;
		}
		//end add test section
		//start add Subject section
			public function addSubject($sub,$examListshow,$testListshow,$questionNo){
				$db = array(
					"subject_name" => $sub,
					"exam_head_id" => $examListshow,
					"test_name_id" => $testListshow,
					"subject_ques_no" => $questionNo
				);
				if(strlen($sub)>1){
					$this->db->insert("subject",$db);
				}
				$query = $this->db->get("subject");
				return $query;
			}
			public function updateSubject($subjectId,$subjectName,$questionNo){
		$val = array(
				"subject_name" => $subjectName,
				"subject_ques_no" => $questionNo
				//"school_code"=>$this->session->userdata("school_code"),
		);
		$this->db->where("id",$subjectId);
		$query = $this->db->update("subject",$val);
		return true;
	}
	public function deleteSubject($subjectId){
		//$this->db->where("school_code",$this->session->userdata("school_code"));
		  $subject=$this->db->get('subject')->result();
		foreach ($subject as $value) {
		   	  if($value->subject_name==$subjectId){
                echo "<script>alert('you can not delete this subject because this subject is already used in test');</script>";
                return false;
		   	  }
		   }
		   	  	$this->db->where("id",$subjectId);
		    $query = $this->db->delete("subject");
		    return $query;
		}
		//end add Subject section
	}
?>