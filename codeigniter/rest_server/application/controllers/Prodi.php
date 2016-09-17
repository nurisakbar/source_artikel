<?php
require APPPATH . '/libraries/REST_Controller.php';

class prodi extends REST_Controller{
    
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
    
    // show data dosen
    function index_get(){
        $idpr = $this->get('idprodi');
        if($idpr==''){
            $prodi = $this->db->get('prodi')->result();
        }else{
            $this->db->where('idprodi',$idpr);
            $prodi = $this->db->get('prodi')->result();
        }
        $this->response($prodi,200);
    }
    
    // insert new data to dosen
    function index_post(){
        $data = array(
                    'idprodi'   =>  null,
                    'kdprodi'  =>  $this->post('kdprodi'),
                    'prodi'     =>  $this->post('prodi'),
                    'jenjang'   =>  $this->post('jenjang'),
                    'kaprodi'   =>  $this->post('kaprodi'));
        $insert = $this->db->insert('prodi',$data);
        if($insert){
            $this->response($data,200);
        }else{
            $this->response(array('status'=>'fail',502));
        }      
    }
    
    // update data dosen
    function index_put(){
        $idprodi    = $this->put('idprodi');
        $data = array(
                    'kdprodi'  =>  $this->put('kdprodi'),
                    'prodi'     =>  $this->put('prodi'),
                    'jenjang'   =>  $this->put('jenjang'),
                    'kaprodi'   =>  $this->put('kaprodi'));
        $this->db->where('idprodi',$idprodi);
        $update = $this->db->update('prodi',$data);
        if($update){
            $this->response($data,200);
        }else{
            $this->response(array('status'=>'fail',502));
        }
    }
    
    // delete dosen
    function index_delete(){
        $idprodi    = $this->delete('idprodi');
        $this->db->where('idprodi',$idprodi);
        $delete = $this->db->delete('prodi');
        if($delete){
            $this->response(array('status'=>'success'),201);
        }else{
            $this->response(array('status'=>'fail',502));
        }
    }
}