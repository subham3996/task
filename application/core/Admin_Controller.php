<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		
		if(!($this->session->userdata('user_id') && $this->session->userdata('role') == 'admin')) {
			redirect(base_url('admin/login'));
		}
	}
}

?>