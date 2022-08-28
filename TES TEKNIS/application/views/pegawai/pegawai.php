<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pegawai</h1>
    
    <div>
      <a href="<?php echo base_url('pegawai/tambah_pegawai') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Tambah Pegawai</a>
      <a href="<?php echo base_url('pegawai/cetak') ?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fa fa-download fa-sm text-white-50"></i> Cetak Semua</a>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3 justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Filter Unit Kerja</h6>
      <div class="">
       <!-- Filter Unit Kerja -->
        <select name="filterUnitKerja" id="filterUnitKerja" class="form-control chosen-select">
          <option value=""hidden>Pilih---</option>
          <?php 
            foreach($getUnitKerja as $unit) {
              echo '<option value="'.$unit->id.'">'.$unit->nama.'</option>';
            }
          ?>
        </select>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Aksi</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Tempat Lahir</th>
              <th>Alamat</th>
              <th>Tanggal Lahir</th>
              <th>L/P</th>
              <th>Golongan</th>
              <th>Eselon</th>
              <th>Jabatan</th>
              <th>Tempat Tugas</th>
              <th>Agama</th>
              <th>Unit Kerja</th>
              <th>No.Hp</th>
              <th>NPWP</th>
            </tr>
          </thead>
          <!-- <tfoot>
            <tr>
              <th>Name</th>
              <th>Position</th>
              <th>Office</th>
              <th>Age</th>
              <th>Start date</th>
              <th>Salary</th>
            </tr>
          </tfoot> -->
          <tbody class="all-data-pegawai">
            <?php
              if(isset($getAllPegawai)){
                if(!empty($getAllPegawai)){
                  foreach($getAllPegawai as $pegawai) {
                    echo '<tr>
                      <td>
                        <a href='.base_url("pegawai/dataPegawai/").$pegawai->id.' class="d-none m-2 d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fa fa-eye fa-sm text-white-50"></i></a>
                        <a href="#" onclick=(deleteData('.$pegawai->id.')) class="d-none m-2 d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fa fa-trash fa-sm text-white-50"></i></a>
                      </td>
                      <td>'.$pegawai->nip.'</td>
                      <td>'.$pegawai->nama.'</td>
                      <td>'.$pegawai->tempat_lahir.'</td>
                      <td>'.$pegawai->alamat.'</td>
                      <td>'.date('d-m-y', strtotime($pegawai->tanggal_lahir)).'</td>
                      <td>'.$pegawai->jenis_kelamin.'</td>
                      <td>'.$pegawai->golongan.'</td>
                      <td>'.$pegawai->eselon.'</td>
                      <td>'.$pegawai->nama_jabatan.'</td>
                      <td>'.$pegawai->nama_provinsi.'</td>
                      <td>'.$pegawai->nama_agama.'</td>
                      <td>'.$pegawai->nama_unit_kerja.'</td>
                      <td>'.$pegawai->no_telp.'</td>
                      <td>'.$pegawai->npwp.'</td>
                    </tr>';
                  }
                }
                else{
                  echo '<tr>
                    <td align="center" colspan="14">Tidak Ada Data</td>
                  </tr>';
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
