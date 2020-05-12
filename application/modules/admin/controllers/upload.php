<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends Admin_Rest_Controller
{
	public function __construct(){        
        parent::__construct();
        $this->load->helper('utilities');
        $this->load->model('standard_model');
    }

    public function index_get(){
        $this->response(array('status'=>false));
    }

    public function media_post(){

    /*******************************************************
        * Only these origins will be allowed to upload images *
        ******************************************************/
        $accepted_origins = array("http://localhost", "http://show.grootify.com");

        /*********************************************
        * Change this line to set the upload folder *
        *********************************************/
      
        $imageFolder = FCPATH . "assets/uploads/";
        // $imagePath = S3_IMAGE_PATH . "assets/images/uploads/";

        reset ($_FILES);
        $temp = current($_FILES);
        if (is_uploaded_file($temp['tmp_name'])){
            if (isset($_SERVER['HTTP_ORIGIN'])) {
                // same-origin requests won't set an origin. If the origin is set, it must be valid.
                if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
                    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
                } else {
                    header("HTTP/1.1 403 Origin Denied");
                    return;
                }
            }

            /*
              If your script needs to receive cookies, set images_upload_credentials : true in
              the configuration and enable the following two headers.
            */
            // header('Access-Control-Allow-Credentials: true');
            // header('P3P: CP="There is no P3P policy."');

            // Sanitize input
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
                header("HTTP/1.1 400 Invalid file name.");
                return;
            }

            // Verify extension
            if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png", "jpeg"))) {
                header("HTTP/1.1 400 Invalid extension.");
                return;
            }

            // Accept upload if there was no origin, or if it is an accepted origin
            $file_name = $this->random_string(20) . '.' . pathinfo($temp['name'], PATHINFO_EXTENSION);
            $filetowrite = $imageFolder . $file_name;
            move_uploaded_file($temp['tmp_name'], $filetowrite);
            
            if(file_exists($filetowrite)) {
                chmod($filetowrite, 0777);

                $filetowrite = base_url(). 'assets/uploads/'. $file_name;
            }
            // Respond to the successful upload with JSON.
            // Use a location key to specify the path to the saved image resource.

            $this->response(array('location' => $filetowrite));
        } else {
            // Notify editor that the upload failed
            header("HTTP/1.1 500 Server Error");
        }
    }
    private function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }
	
}