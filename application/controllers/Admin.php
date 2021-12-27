<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

 function __construct(){
  parent::__construct();
  // cek login
  /*if($this->session->userdata('status') != "login"){
   redirect(base_url().'welcome?pesan=belumlogin');
  }*/
 }

 function index(){
  $data['dosen'] = $this->db->query("select * from dosen order by nidn desc limit 10")->result();
  $data['mahasiswa'] = $this->db->query("select * from mahasiswa order by nim desc limit 10")->result();
  $data['matakuliah'] = $this->db->query("select * from matakuliah order by kode_mk desc limit 10")->result();
  $this->load->view('admin/header');
  $this->load->view('admin/index',$data);
  $this->load->view('admin/footer');
 } 

  function dosen(){
    $data['dosen'] = $this->m_sisfo->get_data('dosen')->result();
    $this->load->view('admin/header');
    $this->load->view('admin/dosen',$data);
    $this->load->view('admin/footer');
  }

  function dosen_add(){   
    $this->load->view('admin/header');
    $this->load->view('admin/dosen_add');
    $this->load->view('admin/footer');
  }

  function dosen_add_act(){   
    $nidn = $this->input->post('nidn');
    $nama_dosen = $this->input->post('nama_dosen');
    //$warna = $this->input->post('warna');
    //$tahun = $this->input->post('tahun');
    //$status = $this->input->post('status');
    $this->form_validation->set_rules('nidn','Merk Mobil','required');
    $this->form_validation->set_rules('nama_dosen','Status Mobil','required');

    if($this->form_validation->run() != false){
      $data = array(
        'nidn' => $nidn,
        'nama_dosen' => $nama_dosen      
        
      );
      $this->m_sisfo->insert_data($data,'dosen');
      redirect(base_url().'admin/dosen');
    }else{
      $this->load->view('admin/header');
      $this->load->view('admin/dosen_add');
      $this->load->view('admin/footer');
    }
  }

  function mobil_edit($id){       
    $where = array(
      'mobil_id' => $id   
    );
    $data['mobil'] = $this->m_rental->edit_data($where,'mobil')->result();    
    $this->load->view('admin/header');
    $this->load->view('admin/mobil_edit',$data);
    $this->load->view('admin/footer');
  }

  function mobil_update(){    
    $id = $this->input->post('id');
    $merk = $this->input->post('merk');
    $plat = $this->input->post('plat');
    $warna = $this->input->post('warna');
    $tahun = $this->input->post('tahun');
    $status = $this->input->post('status');
    $this->form_validation->set_rules('merk','Merk Mobil','required');
    $this->form_validation->set_rules('status','Status Mobil','required');
    if($this->form_validation->run() != false){
      $where = array(
        'mobil_id' => $id   
      );
      $data = array(
        'mobil_merk' => $merk,
        'mobil_plat' => $plat,      
        'mobil_warna' => $warna,      
        'mobil_tahun' => $tahun,      
        'mobil_status' => $status
      );
      $this->m_rental->update_data($where,$data,'mobil');
      redirect(base_url().'admin/mobil');
    }else{
      $where = array(
        'mobil_id' => $id   
      );
      $data['mobil'] = $this->m_rental->edit_data($where,'mobil')->result();    
      $this->load->view('admin/header');
      $this->load->view('admin/mobil_edit',$data);
      $this->load->view('admin/footer');
    }
  }

  function mobil_hapus($id){        
    $where = array(
      'mobil_id' => $id   
    );
    $this->m_rental->delete_data($where,'mobil');   
    redirect(base_url().'admin/mobil');
  }

} 
/*
if($this->session->userdata('status') != "login"){
 redirect(base_url().'welcome?pesan=belumlogin');
}*/
