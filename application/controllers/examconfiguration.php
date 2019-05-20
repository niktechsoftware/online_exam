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
		$data['title'] = 'Exam Configur Area';
		$data['headercss'] = 'home_css';
		$data['header'] = 'header';
		$data['sidemenu'] = 'sidemenu';
		$data['contend'] = 'quesConfig';
		$data['subtitle'] = 'Question Configuration';
		$data['customizer'] = 'customizer';
		$data['footer'] = 'footer';
		$data['footerjs'] = 'home_js';
    $this->load->view("base/body", $data);
	}
	//add update delete exam code start
	public function addExam(){
		$exam=$this->input->post('examName');
		$this->load->model('examConfigModel');
		$examList = $this->examConfigModel->addExam($exam);
		$data['examList'] = $examList;
		$this->load->view("ajax/addExam",$data);
	}
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
		$testList = $this->examConfigModel->addTest($test,$exam_head,$testDesc,$testMarks);
		$data['testList'] = $testList;
		$this->load->view("ajax/addTest",$data);
	}
	public function updateTest(){
		$this->load->model('examconfigmodel');
		if($query = $this->examconfigmodel->updateTest($this->input->post("testId"),
			$this->input->post("testName"),
			$this->input->post("testDescription"),
			$this->input->post("testMarks"))){
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
		public function addSubject(){
		$sub=$this->input->post('subjectName');
		$examListshow=$this->input->post('examListshow');
		$testListshow=$this->input->post('testListshow');
		$questionNo = $this->input->post('questionNo');
		$this->load->model('examConfigModel');
		$subjectList = $this->examConfigModel->addSubject($sub,$examListshow,$testListshow,$questionNo);
		$data['subjectList'] = $subjectList;

		$this->load->view("ajax/addSubject",$data);
	}
	public function updateSubject(){
		$this->load->model('examconfigmodel');
		if($query = $this->examconfigmodel->updateSubject($this->input->post("subjectId"),$this->input->post("subjectName"),$this->input->post("questionNo"))){
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
		if($query = $this->examconfigmodel->deleteSubject($this->input->post("subjectId"))){
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
}
?>