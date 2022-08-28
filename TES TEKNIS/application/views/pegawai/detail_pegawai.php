<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Profile Pegawai</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="#" id="update-pegawai" method="post">
              <div class="input-group">
                <div class="col-lg-6 py-2">
                  <label for="nip">NIP</label>
                  <input type="number" name="nip" id="nip" class="form-control" value="<?php echo $getDetailPegawai->nip ?>" disabled>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $getDetailPegawai->nama ?>">
                </div>
                <div class="col-lg-6 py-2">
                  <label for="nama">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $getDetailPegawai->tempat_lahir ?>">
                </div>
                <div class="col-lg-6 py-2">
                  <label for="nama">Alamat</label>
                  <input type="text" name="alamat" id="alamat"  class="form-control" value="<?php echo $getDetailPegawai->alamat ?>">
                </div>
                <div class="col-lg-6 py-2 m-auto">
                  <div class="jenkel" style="padding-top: 32px;">
                    <label for="nama" class="pr-4">Jenis Kelamin: </label>
                    <input type="radio" name="jenis_kelamin" id="jenkel" value="L" <?php echo $getDetailPegawai->jenis_kelamin == "L" ? "checked" : "s"; ?>> Laki-laki
                    <input type="radio" name="jenis_kelamin" id="jenkel" value="P" <?php echo $getDetailPegawai->jenis_kelamin == "P" ? "checked" : "s"; ?>> Perempuan
                  </div>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="nama">Tanggal Lahir</label>
                  <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $getDetailPegawai->tanggal_lahir ?>">
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Golongan">Golongan</label>
                  <select name="golongan" id="golongan" class="form-control chosen-select">
                    <option value=""hidden>Pilih ---</option>
                    <option value="I/a" <?php echo $getDetailPegawai->golongan == "I/a" ? "selected" : ""  ?>>I/a</option>
                    <option value="I/b" <?php echo $getDetailPegawai->golongan == "I/b" ? "selected" : ""  ?>>I/b</option>
                    <option value="I/c" <?php echo $getDetailPegawai->golongan == "I/c" ? "selected" : ""  ?>>I/c</option>
                    <option value="I/d" <?php echo $getDetailPegawai->golongan == "I/d" ? "selected" : ""  ?>>I/d</option>
                    <option value="II/a" <?php echo $getDetailPegawai->golongan == "II/a" ? "selected" : ""  ?>>II/a</option>
                    <option value="II/b" <?php echo $getDetailPegawai->golongan == "II/b" ? "selected" : ""  ?>>II/b</option>
                    <option value="II/c" <?php echo $getDetailPegawai->golongan == "II/c" ? "selected" : ""  ?>>II/c</option>
                    <option value="II/d" <?php echo $getDetailPegawai->golongan == "II/d" ? "selected" : ""  ?>>II/d</option>
                    <option value="III/a" <?php echo $getDetailPegawai->golongan == "III/a" ? "selected" : ""  ?>>III/a</option>
                    <option value="III/b" <?php echo $getDetailPegawai->golongan == "III/b" ? "selected" : ""  ?>>III/b</option>
                    <option value="III/c" <?php echo $getDetailPegawai->golongan == "III/c" ? "selected" : ""  ?>>III/c</option>
                    <option value="III/d" <?php echo $getDetailPegawai->golongan == "III/d" ? "selected" : ""  ?>>III/d</option>
                    <option value="IV/a" <?php echo $getDetailPegawai->golongan == "IV/a" ? "selected" : ""  ?>>IV/a</option>
                    <option value="IV/b" <?php echo $getDetailPegawai->golongan == "IV/b" ? "selected" : ""  ?>>IV/b</option>
                    <option value="IV/c" <?php echo $getDetailPegawai->golongan == "IV/c" ? "selected" : ""  ?>>IV/c</option>
                    <option value="IV/d" <?php echo $getDetailPegawai->golongan == "IV/d" ? "selected" : ""  ?>>IV/d</option>
                  </select>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Eselon">Eselon</label>
                  <select name="eselon" id="eselon" class="form-control chosen-select">
                    <option value=""hidden>Pilih --</option>
                    <option value="I" <?php echo $getDetailPegawai->eselon == "I" ? "selected" : ""  ?>>I</option>
                    <option value="II" <?php echo $getDetailPegawai->eselon == "II" ? "selected" : ""  ?>>II</option>
                  </select>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Jabatan">Jabatan</label>
                  <select name="id_jabatan" id="id_jabatan" class="form-control chosen-select">
                    <option value="">Pilih --</option>
                    <?php
                      foreach ($getJabatan as $jabatan) {
                        $selected = $getDetailPegawai->id_jabatan == $jabatan->id ? "selected" : "";
                        echo '<option value="'.$jabatan->id.'"'.$selected.'>'.$jabatan->nama_jabatan.'</option>';
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
                        $selected = $getDetailPegawai->id_provinsi == $provinsi->id ? "selected" : "";
                        echo '<option value="'.$provinsi->id.'"'.$selected.'>'.$provinsi->nama.'</option>';
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
                        $selected = $getDetailPegawai->id_agama == $agama->id ? "selected" : "";
                        echo '<option value="'.$agama->id.'"'.$selected.'>'.$agama->nama_agama.'</option>';
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
                        $selected = $getDetailPegawai->id_unit == $unit->id ? "selected" : "";
                        echo '<option value="'.$unit->id.'"'.$selected.'>'.$unit->nama.'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="No Telepon">Nomor Telepon</label>
                  <input type="number" name="no_telp" id="no_telp" class="form-control" value="<?php echo $getDetailPegawai->no_telp ?>">
                </div>
                <div class="col-lg-6 py-2">
                  <label for="NPWP">NPWP</label>
                  <input type="number" name="npwp" id="npwp" class="form-control" value="<?php echo $getDetailPegawai->npwp ?>">
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Foto">Upload Foto</label>
                  <input type="file" name="foto" id="foto" class="form-control">
                  <span style="font-weight:bold"><i>Format file max. 2MB type jpe,jpeg,png</i></span>
                </div>
                <div class="col-lg-6 py-2">
                  <label for="Foto"> Foto Pegawai </label><br>
                  <img src="<?php echo base_url('assets/images/foto_pegawai/').$getDetailPegawai->foto ?>" alt="" class="img-thumbnail" style="width: 100px;">
                  <input type="hidden" name="oldFoto" value="<?php echo $getDetailPegawai->foto  ?>">
                </div>
                <div class="col-12 py-2">
                  <input type="submit" value="Update" class="btn btn-block btn-primary">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>