<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct(){        
        parent::__construct();
        $this->load->library('session');
        // $this->load->library('memcached_library');
        $this->load->model('standard_model');
    }

    public function index(){
       redirect('admin/login');
    }

    public function login() {
        $this->load->library('form_validation');
        if(isset($this->session->userdata['logged_in'])){
            redirect('admin');
        } else {
            $data = array();            

            if($this->input->post('username')) {
                $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

                if ($this->form_validation->run() == FALSE) {            
                    redirect('admin/login');                    
                } else {                    
                    $data = array(
                        'username' => $this->input->post('username'),
                        'password' => $this->input->post('password')
                    );
                    $result = $this->login_details($data);

                    if (isset($result->id)) {                        
                        $session_data = array(
                            'user_id' => $result->id,                            
                            'role' => $result->role,
                            'logged_in' => true
                        );
                        // Add user data in session
                        $this->session->set_userdata($session_data);
                        redirect('admin');
                    } else {                        
                        $data = array(
                            'error_message' => 'Invalid Username or Password'
                        );                
                    }                    
                }
            }
            $this->load->view('login_view', $data);
        }        
    }    

    private function login_details($data= null) {
        $result = new \stdClass();
        if($data['username'] == 'admin') {
            $data['table']  = 'admin_users';
            $data['field']  = 'id, role';
            $data['condition'] = array(
                'username' => $data['username'],
                'password' => $data['password']
            );
            $data['limit'] = 1;
            $this->standard_model->set_query_data($data);
            $result = $this->standard_model->select();            
        }

        return $result;        
    }

	public function logout() {        
		$this->session->sess_destroy();
        redirect('admin/login');
	}
}