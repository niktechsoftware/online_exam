<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examconfiguration extends CI_Controller{

	public function examConfigur(){
		$data['title'] = 'Exam Configur Area';
		$data['headercss'] = 'home_css';
		$data['header'] = 'header';
		$data['sidemenu'] = 'sidemenu';
		$data['contend'] = 'examConfig';
		$data['subtitle'] = 'Exam Configuration';
		$data['customizer'] = 'customizer';
		$data['footer'] = 'footer';
		$data['footerjs'] = 'home_js';
    $this->load->view("base/body", $data);
	}
	public function quesConfigur(){
		$data['title'] = 'Question Configur Area';
		$data['headercss'] = 'home_css';
		$data['header'] = 'header';
		$data['sidemenu'] = 'sidemenu';
		$data['contend'] = 'quesConfig';
		$data['subtitle'] = 'Question Configuration';
		$data['customizer'] = 'customizer';
		$data['footer'] = 'footer';
		$data['footerjs'] = 'question_js';
    $this->load->view("base/body", $data);
	}
	
	public function addExam(){
		$exam=$this->input->post('examName');
		$this->load->model('examConfigModel');
		if($exam){
		$examList = $this->examConfigModel->addExam($exam);
	}else{
		$examList = $this->examConfigModel->addsExam();
	}
		$data['examList'] = $examList;
		$this->load->view("ajax/addExam",$data);
	}
	//add update delete exam code start
	public function updateExam(){
		$this->load->model('examconfigmodel');
		if($query = $this->examconfigmodel->updateExam($this->input->post("examId"),$this->input->post("examName"))){
			?>
			<script>
			        $.post("<?php echo base_url('examconfiguration/addExam') ?>", function(data){
			            $("#examAdd1").html(data);
					});
			</script>
			<?php 
		}
	}
	public function deleteExam(){
		$this->load->model('examconfigmodel');
		if($query = $this->examconfigmodel->deleteExam($this->input->post("examId"))){
			?>
			<script>
			        $.post("<?php echo base_url('examconfiguration/addExam') ?>", function(data){
			            $("#examAdd1").html(data);
					});
			</script>
			<?php 
		}
	}
	// add update delete exam code end
	// add update delete test code start
	public function addTest(){
		
		$test = $this->input->post('testName');
		$exam_head = $this ->input->post('examHead');
		$testDesc = $this ->input->post('testDesc');
		$testMarks = $this ->input->post('testMarks');
		$this->load->model('examConfigModel');
		if($test && $exam_head && $testDesc && $testMarks){
			$testList = $this->examConfigModel->addTest($test,$exam_head,$testDesc,$testMarks);
		}else{
			$testList = $this->examConfigModel->addsTest();
		}
		$data['testList'] = $testList;
		$this->load->view("ajax/addTest",$data);
	}
	
	public function updateTest(){
		$this->load->model('examconfigmodel');
		if($query = $this->examconfigmodel->updateTest($this->input->post("testId"),
			$this->input->post("testName"),
			$this->input->post("testDesc"),
			$this->input->post("testMar"))){
			?>
			<script>
			        $.post("<?php echo base_url('examconfiguration/addTest') ?>", function(data){
			            $("#addTest1").html(data);
					});
			</script>
			<?php 
		}
	}

	public function deleteTest(){
		$this->load->model('examconfigmodel');
		if($query = $this->examconfigmodel->deleteTest($this->input->post("testId"))){
			?>
			<script>
			        $.post("<?php echo base_url('examconfiguration/addTest') ?>", function(data){
			            $("#addTest1").html(data);
					});
			</script>
			<?php 
		}
	}
	// add update delete test code end
	// add update delete Subject code start
	function addSubject2(){
    //$this->db->where("school_code",$this->session->userdata("school_code"));
		$em = $this->input->post('testnm');
		$this->db->where('exam_head_id',$em);
        $var = $this->db->get("test_name");
            if($var->num_rows() > 0){
                echo '<option value="">-Select Test Name-</option>';
                foreach ($var->result() as $row){
                    echo '<option value="'.$row->id.'">'.$row->test_name.'</option>';
                }
                // echo '<option value="all">All</option>';
            }
        }
		public function addSubject(){
		$sub=$this->input->post('subjectName');
		$examListshow=$this->input->post('examListshow');
		$testListshow=$this->input->post('testListshow');
		$questionNo = $this->input->post('questionNo');
		$this->load->model('examConfigModel');
		if($sub && $examListshow && $testListshow && $questionNo){
			$subjectList = $this->examConfigModel->addSubject($sub,$examListshow,$testListshow,$questionNo);
		}else{
			$subjectList = $this->examConfigModel->addsSubject();
		}
		$data['subjectList'] = $subjectList;
		$this->load->view("ajax/addSubject",$data);
	}
	public function updateSubject(){
		$this->load->model('examconfigmodel');
		if($query = $this->examconfigmodel->updateSubject($this->input->post("subId"),$this->input->post("subName"),$this->input->post("questionNo"))){
			// print_r($query);exit;
			?>
			<script>
			        $.post("<?php echo base_url('examconfiguration/addSubject') ?>", function(data){
			            $("#addSubject1").html(data);
					});
			</script>
			<?php 
		}
	}
	public function deleteSubject(){
		$this->load->model('examconfigmodel');
	//	print_r($this->input->post("subjectId"));exit;
		if($query = $this->examconfigmodel->deleteSubject($this->input->post("subId"))){
			//print_r($query);exit;
			?>
			<script>
			        $.post("<?php echo base_url('examconfiguration/addSubject') ?>", function(data){
			            $("#addSubject1").html(data);
					});
			</script>
			<?php 
		}
	}
	// add update delete Subject code end
	///ADD UPDATE DELETE SECTION CODE STRART
		public function addTest2(){
    //$this->db->where("school_code",$this->session->userdata("school_code"));
		$tst = $this->input->post('examnm');
		$this->db->where('exam_head_id',$tst);
        $var = $this->db->get("test_name");
            if($var->num_rows() > 0){
                echo '<option value="">-Select Test Name-</option>';
                foreach ($var->result() as $row){
                    echo '<option value="'.$row->id.'">'.$row->test_name.'</option>';
                }
                // echo '<option value="all">All</option>';
            }
        }
        public function addSubject3(){
        	$sub = $this->input->post('subnm');
        	$this->db->where('test_name_id',$sub);
        	$var = $this->db->get("subject");
        	if($var){
        		echo '<option value="">-Select Test Name-</option>';
                foreach ($var->result() as $row){
                    echo '<option value="'.$row->id.'">'.$row->subject_name.'</option>';
                }
                // echo '<option value="all">All</option>';
        	}
        }

       	public function addQuestion(){
		$question=$this->input->post('questionName');
		$subject_ID = $this->input->post('subject_id');
		$this->load->model('examConfigModel');
		if($question && $subject_ID){
		$questionList = $this->examConfigModel->addQuestion($question,$subject_ID);
			}else{
				$questionList = $this->examConfigModel->addsQuestion();
			}
				$data['questionList'] = $questionList;
				$this->load->view("ajax/addQuestion",$data);
	}
	public function updateQuestion(){
		$this->load->model('examconfigmodel');
		if($query = $this->examconfigmodel->updateQuestion($this->input->post("questionId"),$this->input->post("questionName"))){
			?>
			<script>
			        $.post("<?php echo base_url('examconfiguration/addQuestion') ?>", function(data){
			            $("#addQuestion1").html(data);
					});
			</script>
			<?php 
		}
	}

	public function deleteQuestion(){
		$this->load->model('examconfigmodel');
		if($query = $this->examconfigmodel->deleteQuestion($this->input->post("questionId"))){
			?>
			<script>
			        $.post("<?php echo base_url('examconfiguration/addQuestion') ?>", function(data){
			            $("#addQuestion1").html(data);
					});
			</script>
			<?php 
		}
	}
	/// ADD UPDATE DELETE SECTION CODE END

	///ADD UPDATE DELETE SECTION CODE START
	///SELECT BOX CODE START
	 public function addTestOpt(){
        	$exam = $this->input->post('examnmOpt');
        	$this->db->where('exam_head_id',$exam);
        	$var = $this->db->get("test_name");
        	if($var){
        		echo '<option value="">-Select Test Name-</option>';
                foreach ($var->result() as $row){
                    echo '<option value="'.$row->id.'">'.$row->test_name.'</option>';
                }
        	}
        }
        public function addSubjectOpt(){
        	$test = $this->input->post('testnmOpt');
        	$this->db->where('test_name_id',$test);
        	$var = $this->db->get('subject');
        	if($var){
        		echo '<option value="">-Select Subject Name-</option>';
        		foreach($var->result() as $row){
        			echo '<option value="'.$row->id.'">'.$row->subject_name.'</option>';
        		}
        	}

        }
        public function addQuesOpt(){
        	$sub = $this->input->post('subjectnmOpt');
        	$this->db->where('subject_id',$sub);
        	$var = $this->db->get('question');
        	if($var){
        		echo '<option value="">-Select Question-</option>';
        		foreach($var->result() as $row){
        			echo '<option value="'.$row->id.'">'.$row->question.'</option>';
        		}
        	}
        }
	///SELECT BOX CODE END 
}
?>