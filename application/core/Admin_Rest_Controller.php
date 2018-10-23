<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/REST_Controller.php');

class Admin_Rest_Controller extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		
		if(!($this->session->userdata('user_id') && $this->session->userdata('role') == 'admin')) {			
			$this->response(array('status'=>false, 'message'=>'Login to continue', 'login'=>false));
		}
	}
}

?>