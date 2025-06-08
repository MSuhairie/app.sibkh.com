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
 <title>Laporan Kegiatan Kerja RSUD Sungai Dareh - <?= date('M Y', strtotime($_GET['tanggal_awal'])) ?></title>
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
 <h3 align="center">LAPORAN KEGIATAN KERJA RSUD SUNGAI DAREH</h3>
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
      <th>Kegiatan</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $no = 1;
      $tanggal_awal = $_GET['tanggal_awal'];
      $tanggal_akhir = $_GET['tanggal_akhir'];
      $query = mysqli_query($koneksi, "SELECT * FROM tb_kegiatan WHERE (kegiatan, tgl) IN (
                                SELECT kegiatan, MIN(tgl)
                                FROM tb_kegiatan
                                WHERE id_user='$_SESSION[id_user]' AND tgl BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND statusenabled='t'
                                GROUP BY kegiatan 
                                ORDER BY MIN(tgl) ASC);
                            ");
      while($data = mysqli_fetch_array($query)) {
    ?>
    <tr>
      <td width="10px" align="center"><?= $no++ ?></td>
      <td style="text-transform: capitalize;"><?= $data['kegiatan'] ?></td>
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
