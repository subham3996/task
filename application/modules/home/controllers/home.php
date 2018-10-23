<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 
	public function __construct() {
		 parent::__construct();		 
	}

	public function index() {
		$data['main_content'] = "home_view";
				
        $data['title'] = '';
        $data['description'] = '';
        $data['keywords'] = '';
		
        $this->load->view('master',$data);
	}

	public function about() {

		$data['main_content'] = "about_view";
				
        $data['title'] = '';
        $data['description'] = '';
        $data['keywords'] = '';
		
        $this->load->view('master',$data);
	}

	public function contact_us() {

		$data['main_content'] = "contact_us_view";
				
        $data['title'] = '';
        $data['description'] = '';
        $data['keywords'] = '';
		
        $this->load->view('master',$data);
	}
}