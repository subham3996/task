<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends Admin_Rest_Controller
{
	public function __construct(){        
        parent::__construct();
        $this->load->helper('utilities');
        $this->load->model('standard_model');
    }

    public function index_get(){
        $this->response(array('status'=>false));
    }

    public function update_user_post()
    {
        if($this->input->post('id')) {
            $updatedata['table'] = 'users';
            $updatedata['condition'] = array(
                  "id" => $this->input->post('id')
            );

            $this->standard_model->set_query_data($updatedata);

            if($this->input->post('action') == 'inactive' ) {
                $stat = $this->standard_model->update(array('status'=>'inactive'));
            } else if($this->input->post('action') == 'delete' ){
                $stat = $this->standard_model->update(array('status'=>'deleted'));
            } else if($this->input->post('action') == 'active' ){
                $stat = $this->standard_model->update(array('status'=>'active'));
            } else {
                $stat = false;
            }
            if($stat) {
                $this->response(array('status'=>true),200);
            } else {                
                $this->response(array('status'=>false));
            }
        } else{
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status'=>false, 'error'=>'data invalid')));
        }       
    } 

    public function save_user_post(){

        if($this->input->post('name')) {
            $data['name'] = $this->input->post('name');
        } else {
            $data['name'] = '';
        }
        if($this->input->post('email')) {
            $data['email'] = $this->input->post('email');
        } else {
            $data['email'] = '';
        }
        if($this->input->post('password')) {
            $this->load->library('Bcrypt');
            $unhashed = $this->input->post('password');
            $data['password'] = $this->bcrypt->hash_password($unhashed);
        }
        if($this->input->post('city')) {
            $data['city_id'] = $this->input->post('city');
        }
        if($this->input->post('address')) {
            $data['address'] = $this->input->post('address');
        } else {
            $data['address'] = '';
        }
        if($this->input->post('aboutyou')) {
            $data['about_you'] = $this->input->post('aboutyou');
        } else {
            $data['about_you'] = '';
        }
        $data_query['table'] = 'users';        
        $user_id = $this->input->post('user_id');
        $data['date_of_action'] = date('Y-m-d H:i:s');
        if($user_id && is_numeric($user_id) && $user_id!='') {
            $data_query['condition'] = array(
                "id" => $this->input->post('user_id')
            );
            $this->standard_model->set_query_data($data_query);
            $this->standard_model->update($data);
            $this->response(array('status'=>true));
        } else {
            $data['status'] = 'inactive';
            $data['date_of_creation'] = date('Y-m-d H:i:s');
            $this->standard_model->set_query_data($data_query);
            $user_id = $this->standard_model->insert_and_id($data);
            $this->response(array('status'=>true, 'user_id'=>$user_id));
        }
    }

    public function get_user_get($user_id=0){
        if($user_id == 0) {
            $this->response(array('status'=>false));
        }

        $data['table'] = 'users';
        $data['field'] = 'users.id, users.email,countries.id as country_id,users.address,users.about_you,users.name as user_name,cities.id as city_id, cities.name as city_name, states.id as state_id, states.name as state_name';

        $data['join'] = array(
            "cities" => 'cities.id = users.city_id',
            'states' => 'states.id = cities.state_id',
            'countries' => 'countries.id = states.country_id'
        );
        $data['condition'] = array(                 
              "users.id" => $user_id
        );       
        $this->standard_model->set_query_data($data);
        $result = $this->standard_model->select();
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        $this->response(array('status'=>true, 'data'=>$result));
    }

    public function get_states_get($country_id = 0) {
        if ($country_id == 0) {
            $this->response(array('status' => false));
        }
        $data['table'] = 'states';
        $data['field'] = 'id,name as state_name';
        $data['condition'] = array(                 
              "country_id" => $country_id
        );        
        $this->standard_model->set_query_data($data);
        $result = $this->standard_model->select();
        $this->response(array('status'=>true, 'data'=>$result));
    }

    public function get_city_get($state_id = 0) {
        if ($state_id == 0) {
            $this->response(array('status' => false));
        }
        $data['table'] = 'cities';
        $data['field'] = 'id,name as city_name';
        $data['condition'] = array(                 
              "state_id" => $state_id
        );        
        $this->standard_model->set_query_data($data);
        $result = $this->standard_model->select();
        $this->response(array('status'=>true, 'data'=>$result));
    }

    public function check_email_post()
    {
        if($this->input->post('email')) {
            $email = $this->input->post('email');
            $data['table'] = 'users';
            $data['field'] = 'id,email';
            $data['condition'] = array(                 
                  "email" => $email
            );        
            $this->standard_model->set_query_data($data);
            $result = $this->standard_model->select();
            if (isset($result->id)) {
                $this->response(array('status'=>true, 'message'=>'This email is already used! Please try other email'));
            }
        } else {
            $this->response(array('status' => false));
        }

    }
	
}