<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

public function index()
	{

 	//if($this->session->userdata("is_login")){

		$data['title'] = 'Home Page';
		$data['headercss'] = 'home_css';
		$data['header'] = 'header';
		$data['sidemenu'] = 'sidemenu';
		$data['contend'] = 'homepage';
		$data['customizer'] = 'customizer';
		$data['footer'] = 'footer';
		$data['footerjs'] = 'home_js';
    $this->load->view("base/body", $data);
	//}else{
		//redirect('login');
	//}

}

	


}