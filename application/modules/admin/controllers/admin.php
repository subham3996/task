<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller
{
	public function __construct(){        
        parent::__construct();
        // $this->load->library('memcached_library');
        $this->load->model('standard_model');
    }

    public function index(){

        $data['main_content'] = "dashboard_view";
        $data['section'] = "dashboard";
        $data['type'] = '';
                
        $this->load->view('master',$data);
    }

    public function blog($type="list", $blog_id=0){
        
        $data['section'] = "blog";
        $data['toggle_element'] = "blog";
        $data['type'] = $type;

        if( $type=='list' ){
            $data['articles'] = $this->get_blog_lists();
            $data['main_content'] = "blog_list_view";            
        } else if( $type=='create' || $type == 'edit') {
            if($blog_id!=0) {
                $data['blog_id'] = $blog_id;                
            }
            $data['main_content'] = "blog_edit_view";            
        } else {
            redirect(base_url('admin'));
        }
        
        $this->load->view('master',$data);
    }

    private function get_blog_lists() {
        $data['table'] = 'articles';
        $data['field'] = 'articles.id, articles.title, categories.name as cat_name, articles.cover_image, articles.slug, articles.status, articles.date_of_action';

        $data['join'] = array(
            "categories" => 'categories.id = articles.cat_id',
        );

        $data['condition'] = array(                 
              "articles.status !=" => 'deleted'
        );

        $data['order_by'] = array(
            'id' => 'desc'
        );

        $data['limit'] = 50;
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

    public function announcements(){
        
        $data['section'] = "more";
        $data['toggle_element'] = "more";
        $data['type'] = 'announcements';

        $data['main_content'] = "announcements_view";

        $this->load->view('master',$data);
    }

    public function gallery(){
        
        $data['section'] = "more";
        $data['toggle_element'] = "more";
        $data['type'] = 'gallery';

        $data['main_content'] = "gallery_view";

        $this->load->view('master',$data);
    }
	
}