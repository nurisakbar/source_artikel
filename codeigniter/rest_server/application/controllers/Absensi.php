<?php
require APPPATH . '/libraries/REST_Controller.php';

class absensi extends REST_Controller{
    
    
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
    
    // show data dosen
    function index_get(){
        $idab = $this->get('idabsen');
        if($idab==''){
            $absensi = $this->db->get('absensi')->result();
        }else{
            $this->db->where('idabsen',$idab);
            $absensi = $this->db->get('absensi')->result();
        }
        $this->response($absensi,200);
    }
    
    // insert new data to dosen
    function index_post(){
        $data = array(
                    'idabsen'       =>  null,
                    'idprodi'       =>  $this->post('idprodi'),
                    'idmatkul'      =>  $this->post('idmatkul'),
                    'iddosen'       =>  $this->post('iddosen'),
                    'idkelas'       =>  $this->post('idkelas'),
                    'idmahasiswa'   =>  $this->post('idmahasiswa'),
                    'idjadwal'      =>  $this->post('idjadwal'),
                    'kehadiran'     =>  $this->post('kehadiran'),
                    'pertemuan'     =>  $this->post('pertemuan'),
                    'keterangan'    =>  $this->post('keterangan'),
                    'tanggal'       =>  $this->post('tanggal'));
        $insert = $this->db->insert('absensi',$data);
        if($insert){
            $this->response($data,200);
        }else{
            $this->response(array('status'=>'fail',502));
        }      
    }
    
    // update data dosen
    function index_put(){
        $idabsen    = $this->put('idabsen');
        $data = array(
                    'idprodi'       =>  $this->put('idprodi'),
                    'idmatkul'      =>  $this->put('idmatkul'),
                    'iddosen'       =>  $this->put('iddosen'),
                    'idkelas'       =>  $this->put('idkelas'),
                    'idmahasiswa'   =>  $this->put('idmahasiswa'),
                    'idjadwal'      =>  $this->put('idjadwal'),
                    'kehadiran'     =>  $this->put('kehadiran'),
                    'pertemuan'     =>  $this->put('pertemuan'),
                    'keterangan'    =>  $this->put('keterangan'),
                    'tanggal'       =>  $this->put('tanggal'));
        $this->db->where('idabsen',$idabsen);
        $update = $this->db->update('absensi',$data);
        if($update){
            $this->response($data,200);
        }else{
            $this->response(array('status'=>'fail',502));
        }
    }
    
    // delete dosen
    function index_delete(){
        $idabsen    = $this->delete('idabsen');
        $this->db->where('idabsen',$idabsen);
        $delete = $this->db->delete('absensi');
        if($delete){
            $this->response(array('status'=>'success'),201);
        }else{
            $this->response(array('status'=>'fail',502));
        }
    }
}