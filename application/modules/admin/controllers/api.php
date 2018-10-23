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

    public function update_article_post()
    {
        if($this->input->post('id')) {
            $updatedata['table'] = 'articles';
            $updatedata['condition'] = array(
                  "id" => $this->input->post('id')
            );

            $this->standard_model->set_query_data($updatedata);

            if($this->input->post('action') == 'unpublish' ) {
                $stat = $this->standard_model->update(array('status'=>'inactive'));
            } else if($this->input->post('action') == 'delete' ){
                $stat = $this->standard_model->update(array('status'=>'deleted'));
            } else if($this->input->post('action') == 'publish' ){
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

    public function save_article_post(){

        if($this->input->post('title')) {
            $data['title'] = $this->input->post('title');
        }
        if($this->input->post('description')) {
            $data['description'] = $this->input->post('description');
        }
        if($this->input->post('cover_image')) {
            $data['cover_image'] = $this->input->post('cover_image');
        }
        if($this->input->post('tags')) {
            $data['tags'] = $this->input->post('tags');
        }
        if($this->input->post('slug')) {
            $data['slug'] = $this->input->post('slug');
            $data['slug'] = slugify($data['slug']);
        }


        $data_query['table'] = 'articles';        

        $blog_id = $this->input->post('blog_id');
        $data['date_of_action'] = date('Y-m-d H:i:s');
        if($blog_id && is_numeric($blog_id) && $blog_id!='') {
            $data_query['condition'] = array(
                "id" => $this->input->post('blog_id')
            );
            $this->standard_model->set_query_data($data_query);
            $this->standard_model->update($data);
            $this->response(array('status'=>true));
        } else {
            $data['status'] = 'inactive';
            $data['cat_id'] = '1';
            $data['date_of_creation'] = date('Y-m-d H:i:s');
            $this->standard_model->set_query_data($data_query);
            $blog_id = $this->standard_model->insert_and_id($data);
            $this->response(array('status'=>true, 'blog_id'=>$blog_id));
        }
    }

    public function get_article_get($blog_id=0){
        if($blog_id == 0) {
            $this->response(array('status'=>false));
        }

        $data['table'] = 'articles';
        $data['field'] = 'id, title, cat_id, cover_image, slug, status, description, tags';

        $data['condition'] = array(                 
              "id" => $blog_id
        );        
        
        $this->standard_model->set_query_data($data);
        $result = $this->standard_model->select();
        
        $this->response(array('status'=>true, 'data'=>$result));
    }

    public function get_articles_get(){

        $data['table'] = 'articles';
        $data['field'] = 'articles.id, articles.title, categories.name as cat_name, articles.cover_image, articles.slug, articles.status';

         $data['join'] = array(
            "categories" => 'categories.id = articles.cat_id',
        );

        $data['condition'] = array(                 
              "articles.id" => $blog_id
        );        
        
        $this->standard_model->set_query_data($data);
        $result = $this->standard_model->select();
        
        $this->response(array('status'=>true, 'data'=>$result));
    }
	
}