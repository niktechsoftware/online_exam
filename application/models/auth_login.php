<?php
class Auth_login extends CI_Model {

    public function __construct() {
    	parent::__construct();
	}

	function getLoginData($username,$password)
	{

		$loginData=array('is_login'=>false);

		$this->db->where('username', $username);
		

		//$this->db->where('password',md5($password));

		$this->db->where('password', $password);

		$query = $this->db->get('general_settings');

		if ($query->num_rows() > 0)
		{
		    $res = $query->row();
		    $loginData = array(
		        "id" => $res->id,
		        //"isAdmin" => $res->isAdmin,
		        "username" => $res->username,
		        "password" => $res->password,
				"login_type" => 1,
				"is_login" => true,
				"is_lock" => true,
				"login_date" => date("d-M-Y"),
				"login_time" => date("H:i:s"),
		        //"branchId" => $res->branchID,
		         "name" => $res->name,
		        // "roleid" => $res->roleID,
		        // "modifieddate" => $res->modified,
		        // "createdate" => $res->created
		    );
		    return $loginData;
		 }
		 
		 //$this->db->where("status",0);
		 $this->db->where("username",$username);
		 $this->db->where("password",$password);
		 $query = $this->db->get("branch");
	 
		 if($query->num_rows() >0){
			 $res = $query->row();
			 $loginData = array(
			     "id" => $res->id,
				 //"isAdmin" => $res->isAdmin,
				 "username" => $res->username,
				 "password" => $res->password,
				 "login_type" => 2,
				 "is_login" => true,
				 "is_lock" => true,
				 "login_date" => date("d-M-Y"),
				 "login_time" => date("H:i:s")
				 //"branchId" => $res->branchID,
				 // "email" => $res->email_id,
				 // "roleid" => $res->roleID,
				 // "modifieddate" => $res->modified,
				 // "createdate" => $res->created
			 );
			 return $loginData;
		 }

		 //$this->db->where("status",0);
		 $this->db->where("username",$username);
		 $this->db->where("password",$password);
		 $query = $this->db->get("sub_branch");
	 
		 if($query->num_rows() >0){
			 $res = $query->row();
			 $loginData = array(
			     "id" => $res->id,
				 //"isAdmin" => $res->isAdmin,
				 "username" => $res->username,
				 "password" => $res->password,
				 "login_type" => 3,
				 "is_login" => true,
				 "is_lock" => true,
				 "login_date" => date("d-M-Y"),
				 "login_time" => date("H:i:s")
				 //"branchId" => $res->branchID,
				 // "email" => $res->email_id,
				 // "roleid" => $res->roleID,
				 // "modifieddate" => $res->modified,
				 // "createdate" => $res->created
			 );
			 return $loginData;
		 }

		 $this->db->where("status",0);
		 $this->db->where("username",$username);
		 $this->db->where("password",$password);
		 $query = $this->db->get("customers");
	 
		 if($query->num_rows() >0){
			 $res = $query->row();
			 
			 $loginData = array(
			    "id" => $res->id,
				 //"isAdmin" => $res->isAdmin,
				 "username" => $res->username,
				 "password" => $res->password,
				 "login_type" => 4,
				 "is_login" => true,
				 "is_lock" => true,
				 "login_date" => date("d-M-Y"),
				 "login_time" => date("H:i:s"),
				 "name" => $res->name,
				 // "email" => $res->email_id,
				 // "roleid" => $res->roleID,
				 // "modifieddate" => $res->modified,
				 // "createdate" => $res->created
			 );
			 return $loginData;
		 }

	}
	
}

