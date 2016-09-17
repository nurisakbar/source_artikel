<?php
require APPPATH . '/libraries/REST_Controller.php';

class dosen extends REST_Controller{
    
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
    
    // show data dosen
    function index_get(){
        $id = $this->get('iddosen');
        if($id==''){
            $dosen = $this->db->get('dosen')->result();
        }else{
            $this->db->where('iddosen',$id);
            $dosen = $this->db->get('dosen')->result();
        }
        $this->response($dosen,200);
    }
    
    // insert new data to dosen
    function index_post(){
        $data = array(
                    'iddosen'       =>  null,
                    'nidn'          =>  $this->post('nidn'),
                    'namadosen'     =>  $this->post('namadosen'),
                    'idprodi'       =>  $this->post('idprodi'),
                    'telp'          =>  $this->post('telp'),
                    'email'         =>  $this->post('email'),
                    'password'      =>  $this->post('password'));
        $insert = $this->db->insert('dosen',$data);
        if($insert){
            $this->response($data,200);
        }else{
            $this->response(array('status'=>'fail',502));
        }      
    }
    
    // update data dosen
    function index_put(){
        $iddosen    = $this->put('iddosen');
        $data = array(
                    'nidn'          =>  $this->put('nidn'),
                    'namadosen'     =>  $this->put('namadosen'),
                    'idprodi'       =>  $this->put('idprodi'),
                    'telp'          =>  $this->put('telp'),
                    'email'         =>  $this->put('email'),
                    'password'      =>  $this->put('password'));
        $this->db->where('iddosen',$iddosen);
        $update = $this->db->update('dosen',$data);
        if($update){
            $this->response($data,200);
        }else{
            $this->response(array('status'=>'fail',502));
        }
    }
    
    // delete dosen
    function index_delete(){
        $iddosen    = $this->delete('iddosen');
        $this->db->where('iddosen',$iddosen);
        $delete = $this->db->delete('dosen');
        if($delete){
            $this->response(array('status'=>'success'),201);
        }else{
            $this->response(array('status'=>'fail',502));
        }
    }
}