<?php
  session_start();
  include '../koneksi.php';
  $nama_hari = array(
    "Minggu",
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat",
    "Sabtu"
  );

  $nama_bulan = array(
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember"
  );

  if(isset($_GET['tanggal_awal']) && isset($_GET['tanggal_akhir'])) {
?>

<!DOCTYPE html>
<html>
<head>
 <title>Laporan Absensi RSUD Sungai Dareh - <?= $nama_bulan[ date('n', strtotime($_GET['tanggal_awal'])) - 1 ] ?> <?= date('Y', strtotime($_GET['tanggal_awal'])) ?></title>
</head>
<body>
 <style type="text/css">
    body{
    font-family: sans-serif;
    font-size: 15px;
    }
    .tb2{
    margin: 20px auto;
    border-collapse: collapse;
    }
    .tb2 td{
    border: 1px solid #3c3c3c;
    padding: 2px 6px;
    }
    .tb2 th{
    border: 1px solid #3c3c3c;
    padding: 8px 6px;
    }
    a{
    background: blue;
    color: #fff;
    padding: 8px 10px;
    text-decoration: none;
    border-radius: 2px;
    }
    .tengah{
        text-align: center;
    }
 </style>
 <h3 align="center">LAPORAN ABSENSI RSUD SUNGAI DAREH</h3>
  <table>
    <tr>
        <td><label>NAMA</label></td>
        <td>:</td>
        <td style="text-transform: uppercase;"><?= $_SESSION['nama_lengkap'] ?></td>
    </tr>
    <br>
    <tr>
        <td><label>PERUSAHAAN</label></td>
        <td>:</td>
        <td>PT. JASAMEDIKA SARANATAMA</td>
    </tr>
    <tr>
        <td><label>JABATAN</label></td>
        <td>:</td>
        <td style="text-transform: uppercase;"><?= $_SESSION['jabatan'] ?></td>
    </tr>
    <tr>
        <td><label>PERIODE</label></td>
        <td>:</td>
        <td style="text-transform: uppercase;"><?= $nama_bulan[ date('n', strtotime($_GET['tanggal_awal'])) - 1] ?> <?= date('Y', strtotime($_GET['tanggal_awal'])) ?></td>
    </tr>
  </table>
 <table width="100%" class="tb2">
  <thead>
    <tr>
      <th>No</th>
      <th scope="col">Hari</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Chek In</th>
      <th scope="col">Status Absensi</th>
      <th scope="col">Chek Out</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $no = 1;
      $tanggal_awal = $_GET['tanggal_awal'];
      $tanggal_akhir = $_GET['tanggal_akhir'];
      $query = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE id_user='$_SESSION[id_user]' AND tgl_absen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND statusenabled='t' ORDER BY tgl_absen ASC");
      while($data = mysqli_fetch_array($query)) {
      $current_time = $data['chekin'];
      $time_parts = explode(' ', $current_time);
      $time = $time_parts[1];
      if ($data['chekin'] <= 0 || $time === '00:00:00') {
        $chekin = '-';
      }else {
        $chekin = date('H:i:s', strtotime($data['chekin']));
      }
    
      $current_time1 = $data['chekout'];
      $time_parts1 = explode(' ', $current_time1);
      $time1 = $time_parts1[1];
      if ($data['chekout'] <= 0 || $time === '00:00:00') {
        $chekout = '-';
      }else {
        $chekout = date('H:i:s', strtotime($data['chekout']));
      }
    ?>
    <tr>
      <td width="10px" align="center"><?= $no++ ?></td>
      <td align="center"><?= $nama_hari[ date('w', strtotime($data['tgl_absen'])) ] ?></td>
      <td align="center"><?= date('d', strtotime($data['tgl_absen'])) ?> <?= $nama_bulan[ date('n', strtotime($data['tgl_absen'])) - 1 ] ?> <?= date('Y', strtotime($data['tgl_absen'])) ?></td>
      <td width="100px" align="center"><?= $chekin ?></td>
      <td align="center"><?= $data['status'] ?></td>
      <td width="100px" align="center"><?= $chekout ?></td>
      <td  align="center"><?= $data['ket'] ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<div>
  <p style="text-align: end;">Dharmasraya, <?= date('d M Y') ?></p>
  <p style="text-align: end; margin: -12px 60px 0px 0px;">Pembuat Laporan</p>
  <br>     
  <br>     
  <p style="text-align: end;text-transform: uppercase;margin: 20px 70px 0px 0px;">( <?= $_SESSION['nama_lengkap'] ?> )</p>
</div>
  
</body>
</html>

<?php
} else {
  echo "Tidak ada data yang dipilih untuk dicetak.";
}
?>

<script>
  window.print();
</script>
