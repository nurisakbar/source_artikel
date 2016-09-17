<?php
require APPPATH . '/libraries/REST_Controller.php';

class mahasiswa extends REST_Controller{
    
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
    
    // show data dosen
    function index_get(){
        $idmhs = $this->get('idmahasiswa');
        if($idmhs==''){
            $mahasiswa = $this->db->get('mahasiswa')->result();
        }else{
            $this->db->where('idmahasiswa',$idmhs);
            $mahasiswa = $this->db->get('mahasiswa')->result();
        }
        $this->response($mahasiswa,200);
    }
    
    // insert new data to dosen
    function index_post(){
        $data = array(
                    'idmahasiswa'   =>  null,
                    'idkelas'       =>  $this->post('idkelas'),
                    'nim'           =>  $this->post('nim'),
                    'namamhs'       =>  $this->post('namamhs'),
                    'idprodi'       =>  $this->post('idprodi'),
                    'angkatan'      =>  $this->post('angkatan'),
                    'semester'      =>  $this->post('semester'));
        $insert = $this->db->insert('mahasiswa',$data);
        if($insert){
            $this->response($data,200);
        }else{
            $this->response(array('status'=>'fail',502));
        }      
    }
    
    // update data dosen
    function index_put(){
        $idmahasiswa    = $this->put('idmahasiswa');
        $data = array(
                    'idkelas'       =>  $this->put('idkelas'),
                    'nim'           =>  $this->put('nim'),
                    'namamhs'       =>  $this->put('namamhs'),
                    'idprodi'       =>  $this->put('idprodi'),
                    'angkatan'      =>  $this->put('angkatan'),
                    'semester'      =>  $this->put('semester'));
        $this->db->where('idmahasiswa',$idmahasiswa);
        $update = $this->db->update('mahasiswa',$data);
        if($update){
            $this->response($data,200);
        }else{
            $this->response(array('status'=>'fail',502));
        }
    }
    
    // delete dosen
    function index_delete(){
        $idmahasiswa    = $this->delete('idmahasiswa');
        $this->db->where('idmahasiswa',$idmahasiswa);
        $delete = $this->db->delete('mahasiswa');
        if($delete){
            $this->response(array('status'=>'success'),201);
        }else{
            $this->response(array('status'=>'fail',502));
        }
    }
}