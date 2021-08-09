<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller
{
	public function __construct(){        
        parent::__construct();
        $this->load->model('standard_model');
    }

    public function index(){
        $data['main_content'] = "dashboard_view";
        $data['section'] = "dashboard";
        $data['type'] = '';
                
        $this->load->view('master',$data);
    }
    public function user($type="list", $user_id=0){
        
        $data['section'] = "user";
        $data['toggle_element'] = "user";
        $data['type'] = $type;

        if( $type=='list' ){
            $data['users'] = $this->get_user_lists();
            $data['main_content'] = "user_list_view";            
        } else if( $type=='create' || $type == 'edit') {
            if($user_id!=0) {
                $data['user_id'] = $user_id;                
            }
            $data['countries'] = $this->get_country();
            $data['main_content'] = "user_edit_view";            
        } else {
            redirect(base_url('admin'));
        }
        $this->load->view('master',$data);
    }

    private function get_country() {
        $data['table'] = 'countries';
        $data['field'] = 'id,name as country_name';
        $this->standard_model->set_query_data($data);
        $results = $this->standard_model->select();
        if (is_object($results)) {
            $results = array($results);
        }
        $append = '';
        foreach ($results as $result) {
            $append .= '<option value = "'.$result->id.'">'.$result->country_name.'</option>';
        }
        return $append;
    }
    private function get_user_lists() {
        $data['table'] = 'users';
        $data['field'] = 'users.id, users.name, users.email ,cities.name as city_name, states.name as state_name ,users.status, users.date_of_action';

        $data['join'] = array(
            "cities" => 'cities.id = users.city_id',
            'states' => 'states.id = cities.state_id'
        );
        $data['condition'] = array(                 
              "users.status !=" => 'deleted'
        );
        $data['order_by'] = array(
            'id' => 'desc'
        );
        $this->standard_model->set_query_data($data);
        $results = $this->standard_model->select();

        if (sizeof($results) > 0) {
            if(is_object($results)) {
                $results = array($results);
            }
            return $results;            
        } else {
            return array();
        }
    }
	
}