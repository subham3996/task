<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MY_Controller {

	public function __construct()
	{
		 parent::__construct();		 
		 // $this->load->model('standard_model');
	}


	public function index_get() {			
		redirect(base_url());
	}

	public function send_message_post() {
		
		if($this->input->post('name') && $this->input->post('name')!='') {
			$data['name'] = $this->input->post('name');
		} else {
			$this->response(array('status'=>false, 'message' => 'Invalid Name!'));
		}

		if($this->input->post('email') && $this->input->post('email')!='') {
			$data['email'] = $this->input->post('email');
		} else {
			$this->response(array('status'=>false, 'message' => 'Invalid Email!'));
		}

		if($this->input->post('subject') && $this->input->post('subject')!='') {
			$data['subject'] = $this->input->post('subject');
		} else {
			$this->response(array('status'=>false, 'message' => 'Invalid Subject!'));
		}


		if($this->input->post('comment') && $this->input->post('comment')!='') {
			$data['comment'] = $this->input->post('comment');
		} else {
			$this->response(array('status'=>false, 'message' => 'Invalid City!'));
		}


		$subject = 'Contact - ' . $data['subject'];
        $message = '<span>Name:'.$data['name'].'</span><br><span>Email:'.$data['email'].'</span><br><span>Subject:'.$data['subject'].'</span><br><span> Comment:'.$data['comment'].'</span>';    

		$sent = $this->send_mail($subject, $message, 'deepak@grootify.com');
		
		if($sent) {
	        $this->response(array('status'=>true, 'message' => 'Thank You. We will contact you soon.'));
		} else {
			$this->response(array('status'=>false, 'message' => 'Error! Try after some time.'));
		}
	}	

	private function send_mail($subject='', $message='', $mailTo='') {

		$this->load->library('email');
             
        $config['protocol']  = "smtp";       
        $config['smtp_host'] = 'ssl://smtp.zoho.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'mktg@grootify.com';
        $config['smtp_pass'] = 'Hexzen@1601';
        $config['mailtype']  = 'html';
        $config['charset']   = 'utf-8';
        $config['newline']   = "\r\n";
        $config['wordwrap']  = TRUE;

        $this->email->initialize($config);
        $this->email->from('mktg@grootify.com','Grootify - Contact');
        $this->email->to($mailTo);   
        // $this->email->cc('deepak@grootify.com');

        $this->email->subject($subject);
        $this->email->message($message);
     
        if($message != '') {
            $res = $this->email->send();
	        if($res) {
	        	return true;
	        } else {
	        	return false;
	        }
        } else {
        	return false;
        }
               
	}

}