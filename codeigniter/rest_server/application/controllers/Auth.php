<?php
require APPPATH . '/libraries/REST_Controller.php';

class auth extends REST_Controller{
    
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
    
    // show data dosen
    function index_get(){
        $email    = $this->get('email');
        $password = $this->get('password');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $dosen = $this->db->get('dosen');
        if($dosen->num_rows()>0){
            $this->response($dosen->row_array(),200);
        }else{
            $this->response(array('status'=>'gagal'),404);
        }
    }
}