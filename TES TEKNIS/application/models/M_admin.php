<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model {

  public function auth($email, $password)
  {
    $query = $this->db->query("SELECT id, nama, email FROM admin WHERE email = '$email' AND password = '$password' ");

    return $query->row();
  }

  public function checkEmail($email)
  {
    $query = $this->db->query("SELECT id FROM admin WHERE email = '$email'");

    return $query->num_rows();
  }

  public function checkNip($nip)
  {
    $query = $this->db->query("SELECT nip FROM pegawai WHERE nip = '$nip'");

    return $query->num_rows();
  }

  public function checkPassword($password, $email)
  {
    $query = $this->db->query("SELECT id FROM admin WHERE email = '$email' AND password = '$password'");

    return $query->num_rows();
  }

  public function getAllPegawai()
  {
    $query = $this->db->query("SELECT pegawai.*, provinsi.nama as nama_provinsi, agama.nama_agama, unit_kerja.nama as nama_unit_kerja, jabatan.nama_jabatan 
                                FROM pegawai
                                LEFT JOIN provinsi ON pegawai.tempat_tugas = provinsi.id
                                LEFT JOIN agama ON pegawai.id_agama = agama.id
                                LEFT JOIN unit_kerja ON pegawai.unit_kerja = unit_kerja.id
                                LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id
                                WHERE pegawai.status = 1");
    return $query->result();
  }

  public function getDetailPegawai($id)
  {
    $query = $this->db->query("SELECT pegawai.*, provinsi.nama as nama_provinsi,provinsi.id as id_provinsi, agama.nama_agama,agama.id as id_agama,unit_kerja.id as id_unit, unit_kerja.nama as nama_unit_kerja,jabatan.id as id_jabatan, jabatan.nama_jabatan 
                                FROM pegawai
                                LEFT JOIN provinsi ON pegawai.tempat_tugas = provinsi.id
                                LEFT JOIN agama ON pegawai.id_agama = agama.id
                                LEFT JOIN unit_kerja ON pegawai.unit_kerja = unit_kerja.id
                                LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id
                                WHERE pegawai.id = $id AND pegawai.status = 1");
    return $query->row();
  }

  public function getJabatan()
  {
    $query = $this->db->query("SELECT * FROM jabatan");
    return $query->result();
  }

  public function getProvinsi()
  {
    $query = $this->db->query("SELECT * FROM provinsi");
    return $query->result();
  }

  public function getAgama()
  {
    $query = $this->db->query("SELECT * FROM agama");
    return $query->result();
  }

  public function getUnitKerja()
  {
    $query = $this->db->query("SELECT * FROM unit_kerja");
    return $query->result();
  }

  public function tambahPegawai($data)
  {
    return $this->db->insert('pegawai', $data);
  }

  public function updatePegawait($data, $nip)
  {
    $this->db->where('nip', $nip);
    return $this->db->update('pegawai', $data);
  }

  public function deleteData($id)
  {
    $this->db->where("id", $id);
    return $this->db->update('pegawai', array('status'=> 0));
  }

  public function getUnitById($id)
  {
    $query = $this->db->query("SELECT pegawai.*, provinsi.nama as nama_provinsi, agama.nama_agama, unit_kerja.nama as nama_unit_kerja, jabatan.nama_jabatan 
                                FROM pegawai
                                LEFT JOIN provinsi ON pegawai.tempat_tugas = provinsi.id
                                LEFT JOIN agama ON pegawai.id_agama = agama.id
                                LEFT JOIN unit_kerja ON pegawai.unit_kerja = unit_kerja.id
                                LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id
                                WHERE pegawai.status = 1 AND unit_kerja.id = $id");

    return $query->result();
  }
}