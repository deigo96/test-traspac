<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Pegawai</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="#" id="tambah-pegawai" method="post">
              <div class="input-group">
                <div class="col-lg-6 py-2">
                  <label for="nip">NIP</label>
                  <input type="number" name="nip" id="nip" class="form-control">
                </div>
                <div class="col-lg-6 py-2">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="col-lg-6 py-2">
                  <label for="nama">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                </div>
                <div class="col-lg-6 py-2">
                  <label for="nama">Alamat</label>
                  <input type="text" name="alamat" id="alamat"  class="form-control">
                </div>
                <div class="col-lg-6 py-2 m-auto">
                  <div class="jenkel" style="padding-top: 32px;">
                    <label for="nama" class="pr-4">Jenis Kelamin: </label>
                    <input type="radio" name="jenis_kelamin" id="jenkel" value="L"> Laki-laki
                    <input type="radio" name="jenis_kelamin" id="jenkel" value="P"> Perempuan
                  </div>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="nama">Tanggal Lahir</label>
                  <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir">
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Golongan">Golongan</label>
                  <select name="golongan" id="golongan" class="form-control chosen-select">
                    <option value=""hidden>Pilih ---</option>
                    <option value="I/a">I/a</option>
                    <option value="I/a">I/b</option>
                    <option value="I/a">I/c</option>
                    <option value="I/a">I/d</option>
                    <option value="I/a">II/a</option>
                    <option value="I/a">II/b</option>
                    <option value="I/a">II/c</option>
                    <option value="I/a">II/d</option>
                    <option value="I/a">III/a</option>
                    <option value="I/a">III/b</option>
                    <option value="I/a">III/c</option>
                    <option value="I/a">III/d</option>
                    <option value="I/a">IV/a</option>
                    <option value="I/a">IV/b</option>
                    <option value="I/a">IV/c</option>
                    <option value="I/a">IV/d</option>
                  </select>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Eselon">Eselon</label>
                  <select name="eselon" id="eselon" class="form-control chosen-select">
                    <option value=""hidden>Pilih --</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                  </select>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Jabatan">Jabatan</label>
                  <select name="id_jabatan" id="id_jabatan" class="form-control chosen-select">
                    <option value="">Pilih --</option>
                    <?php
                      foreach ($getJabatan as $jabatan) {
                        echo '<option value="'.$jabatan->id.'">'.$jabatan->nama_jabatan.'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Tempat Tugas">Tempat Tugas</label>
                  <select name="tempat_tugas" id="tempat_tugas" class="form-control chosen-select">
                    <option value="">Pilih --</option>
                    <?php
                      foreach ($getProvinsi as $provinsi) {
                        echo '<option value="'.$provinsi->id.'">'.$provinsi->nama.'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Agama">Agama</label>
                  <select name="id_agama" id="id_agama" class="form-control chosen-select">
                    <option value="">Pilih --</option>
                    <?php
                      foreach ($getAgama as $agama) {
                        echo '<option value="'.$agama->id.'">'.$agama->nama_agama.'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Unit Kerja">Unit Kerja</label>
                  <select name="unit_kerja" id="unit_kerja" class="form-control chosen-select">
                    <option value="">Pilih --</option>
                    <?php
                      foreach ($getUnitKerja as $unit) {
                        echo '<option value="'.$unit->id.'">'.$unit->nama.'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="No Telepon">Nomor Telepon</label>
                  <input type="number" name="no_telp" id="no_telp" class="form-control">
                </div>
                <div class="col-lg-6 py-2">
                  <label for="NPWP">NPWP</label>
                  <input type="number" name="npwp" id="npwp" class="form-control">
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Foto">Upload Foto</label>
                  <input type="file" name="foto" id="foto" class="form-control">
                  <span style="font-weight:bold"><i>Format file max. 2MB type jpe,jpeg,png</i></span>
                </div>
                <div class="col-12 py-2">
                  <input type="submit" value="Tambah" class="btn btn-block btn-primary">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>