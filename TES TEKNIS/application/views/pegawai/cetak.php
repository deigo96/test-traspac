<style>
  .page {
    font-family: "Times New Roman", Times, serif;
    -webkit-print-color-adjust:exact;
  }
  @page {
    size: auto !important;
  }

  @media print {
    #printPageButton {
      display: none;
    }
  }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  <title>Cetak Data Pegawai</title>
</head>

<body class="page">
  <button id="printPageButton" onclick="window.print()" class="btn btn-info mt-2 mr-2">Print</button>
  <table width="100%">
    <thead>
      <tr>
        <th width="25%"><img src="<?php echo base_url('assets/images/traspac.png') ?>" alt=""></th>
        <th>
          <span class="text-primary">PT. TRASPAC Makmur Sejahtera</span>
          <br>
          <span class="font-weight-normal text-primary">Office Park Thamrin City Blok AA-02, Jl. KebonKacang Raya</span>
          <br>
          <span class="font-weight-normal text-primary">Tanah Abang - Jakarta PusatTelp/Fax : +62-21-31997486</span>
          <br>
          <span class="font-weight-normal text-primary">Website :www.traspac.co.id Email : info@traspac.co.id</span>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="2" style="border-bottom: 1px solid black">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">
          <table width="100%" border="1" class="text-center align-top">
            <tr class="text-white font-weight-bold">
              <td bgcolor="#002489">No</td>
              <td bgcolor="#002489">NIP</td>
              <td bgcolor="#002489">Nama</td>
              <td bgcolor="#002489">Tempat Lahir</td>
              <td bgcolor="#002489">Alamat</td>
              <td bgcolor="#002489">Tgl Lahir</td>
              <td bgcolor="#002489">L/P</td>
              <td bgcolor="#002489">Gol</td>
              <td bgcolor="#002489">Eselon</td>
              <td bgcolor="#002489">Jabatan</td>
              <td bgcolor="#002489">Tempat Tugas</td>
              <td bgcolor="#002489">Agama</td>
              <td bgcolor="#002489">Unit Kerja</td>
              <td bgcolor="#002489">No.Hp</td>
              <td bgcolor="#002489">NPWP</td>
            </tr>
            <?php $no=1; foreach($getAllPegawai as $pegawai) { ?>
              <tr class="align-top">
                <td><?php echo $no ?></td>
                <td><?php echo $pegawai->nip ?></td>
                <td><?php echo $pegawai->nama ?></td>
                <td><?php echo $pegawai->tempat_lahir ?></td>
                <td><?php echo $pegawai->alamat ?></td>
                <td><?php echo $pegawai->tanggal_lahir ?></td>
                <td><?php echo $pegawai->jenis_kelamin ?></td>
                <td><?php echo $pegawai->golongan ?></td>
                <td><?php echo $pegawai->eselon ?></td>
                <td><?php echo $pegawai->nama_jabatan ?></td>
                <td><?php echo $pegawai->nama_provinsi ?></td>
                <td><?php echo $pegawai->nama_agama ?></td>
                <td><?php echo $pegawai->nama_unit_kerja ?></td>
                <td><?php echo $pegawai->no_telp ?></td>
                <td><?php echo $pegawai->npwp ?></td>
              </tr>
            <?php $no++; } ?>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body>

</html>