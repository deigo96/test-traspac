<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
  }

  public function index()
  {
    if($this->session->userdata('id')){
      $data['getAllPegawai'] = $this->M_admin->getAllPegawai();
      $data['getUnitKerja'] = $this->M_admin->getUnitKerja();

      $this->load->view('header');
      $this->load->view("pegawai/pegawai", $data);
      $this->load->view('footer');
    }
    else{ 
      $this->session->set_flashdata("error", "Silahkan login terlebih dahulu");
      redirect('login');
    }
  }

  public function tambah_pegawai()
  {
    
    if($this->session->userdata('id')){
      $data['getJabatan'] = $this->M_admin->getJabatan();
      $data['getProvinsi'] = $this->M_admin->getProvinsi();
      $data['getAgama'] = $this->M_admin->getAgama();
      $data['getUnitKerja'] = $this->M_admin->getUnitKerja();

      $this->load->view('header');
      $this->load->view('pegawai/tambah_pegawai', $data);
      $this->load->view('footer');
    }
    else{ 
      $this->session->set_flashdata("error", "Silahkan login terlebih dahulu");
      redirect('login');
    }
  }

  public function tambah_data()
  {
    if($this->session->userdata('id')){
      $data['id_admin'] = $this->session->userdata('id');
      $data['nip']  = $this->input->post('nip');
      $data['nama']  = $this->input->post('nama');
      $data['tempat_lahir']  = $this->input->post('tempat_lahir');
      $data['alamat']  = $this->input->post('alamat');
      $data['tanggal_lahir']  = $this->input->post('tanggal_lahir');
      $data['jenis_kelamin']  = $this->input->post('jenis_kelamin');
      $data['golongan']  = $this->input->post('golongan');
      $data['eselon']  = $this->input->post('eselon');
      $data['id_jabatan']  = $this->input->post('id_jabatan');
      $data['tempat_tugas']  = $this->input->post('tempat_tugas');
      $data['id_agama']  = $this->input->post('id_agama');
      $data['unit_kerja']  = $this->input->post('unit_kerja');
      $data['no_telp']  = $this->input->post('no_telp');
      $data['npwp']  = $this->input->post('npwp');

      // $checkPegawai = $this->M_admin->checkPegawai($data['nip']);

      if(isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])) {
        $path = realpath(APPPATH.'../assets/images/foto_pegawai/');
        $config['upload_path'] = $path;
        $config['max_size'] = 2048;
        $config['allowed_types'] = 'png|jpg|jpeg';
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('foto')){
          echo "error";
        }
        else {
          $file = $this->upload->data();
          $data['foto'] = $file['file_name'];
          $data['createdAt'] = date('Y-m-d H:i:s');
        }

        
        $this->load->library('upload');
  
        if(empty($this->upload->display_errors())){
          $tambahPegawai = $this->M_admin->tambahPegawai($data) ? "success" : "gagal";
    
          echo $tambahPegawai;
  
        }
      }
    }
    else{ 
      $this->session->set_flashdata("error", "Silahkan login terlebih dahulu");
      redirect('login');
    }
  }

  public function update_pegawai($nip)
  {
    if($this->session->userdata('id')){
      $data['id_admin'] = $this->session->userdata('id');
      $data['nama']  = $this->input->post('nama');
      $data['tempat_lahir']  = $this->input->post('tempat_lahir');
      $data['alamat']  = $this->input->post('alamat');
      $data['tanggal_lahir']  = $this->input->post('tanggal_lahir');
      $data['jenis_kelamin']  = $this->input->post('jenis_kelamin');
      $data['golongan']  = $this->input->post('golongan');
      $data['eselon']  = $this->input->post('eselon');
      $data['id_jabatan']  = $this->input->post('id_jabatan');
      $data['tempat_tugas']  = $this->input->post('tempat_tugas');
      $data['id_agama']  = $this->input->post('id_agama');
      $data['unit_kerja']  = $this->input->post('unit_kerja');
      $data['no_telp']  = $this->input->post('no_telp');
      $data['npwp']  = $this->input->post('npwp');
      $oldFoto = "";

      // $checkPegawai = $this->M_admin->checkPegawai($data['nip']);

      if(isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])) {
        $path = realpath(APPPATH.'../assets/images/foto_pegawai/');
        $config['upload_path'] = $path;
        $config['max_size'] = 2048;
        $config['allowed_types'] = 'png|jpg|jpeg';
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('foto')){
          echo "error";
        }
        else {
          $file = $this->upload->data();
          $data['foto'] = $file['file_name'];
          $data['createdAt'] = date('Y-m-d H:i:s');
          $oldFoto = $this->input->post('oldFoto');
        }

        
      }
      $this->load->library('upload');

      if(empty($this->upload->display_errors())){
        if($oldFoto != "") {
          $patholdFoto        = './assets/images/foto_pegawai/'.$oldFoto;
          unlink($patholdFoto);
        }
        $updatePegawait = $this->M_admin->updatePegawait($data, $nip) ? "success" : "gagal";
  
        echo $updatePegawait;

      }
    }
    else{ 
      $this->session->set_flashdata("error", "Silahkan login terlebih dahulu");
      redirect('login');
    }
  }

  public function checkNip()
  {
    if($this->session->userdata('id')){
      $nip = $this->input->post('nip');
    
      $checkNip = $this->M_admin->checkNip($nip) > 0 ? "false" : "true";

      echo $checkNip;
    }
    else{ 
      $this->session->set_flashdata("error", "Silahkan login terlebih dahulu");
      redirect('login');
    }
  }

  public function deleteData($id)
  {
    if($this->session->userdata('id')){
      $delete = $this->M_admin->deleteData($id) ? "success" : "false";

      echo $delete;

    }
    else{ 
      $this->session->set_flashdata("error", "Silahkan login terlebih dahulu");
      redirect('login');
    }
  }

  public function dataPegawai($id)
  {
    if($this->session->userdata('id')){
      $data['getDetailPegawai'] = $this->M_admin->getDetailPegawai($id);
      $data['getJabatan'] = $this->M_admin->getJabatan();
      $data['getProvinsi'] = $this->M_admin->getProvinsi();
      $data['getAgama'] = $this->M_admin->getAgama();
      $data['getUnitKerja'] = $this->M_admin->getUnitKerja();

      $this->load->view('header');
      $this->load->view('pegawai/detail_pegawai', $data);
      $this->load->view('footer');
    }
    else{ 
      $this->session->set_flashdata("error", "Silahkan login terlebih dahulu");
      redirect('login');
    }
  }

  public function cetak()
  {
    if($this->session->userdata('id')){
      $data['getAllPegawai'] = $this->M_admin->getAllPegawai();

      $this->load->view("pegawai/cetak", $data);
    }
    else{ 
      $this->session->set_flashdata("error", "Silahkan login terlebih dahulu");
      redirect('login');
    }
  }

  public function filterUnitKerja($id)
  {
    if($this->session->userdata('id')){
      $getUnit = $this->M_admin->getUnitById($id);

      if($getUnit) echo json_encode($getUnit);
    }
  }

  public function logout()
  {
    if($this->session->userdata('id')){
      $this->session->sess_destroy();
			echo 'true';
    }
  }

}