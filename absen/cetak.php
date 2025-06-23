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
  <style type="text/css" media="print">
    @page {
        size: A4 portrait;
        margin: 0;
    }

    body {
        margin: 0;
    }

    .container {
        box-shadow: none !important;
        margin: 0 !important;
    }

    .page-break {
        page-break-before: always;
    }
  </style>
  <style>
      body {
          background-color: #CCCCCC;
          font-family: Arial, sans-serif;
      }

      .container {
          width: 794px; /* A4 width */
          margin: 20px auto;
          background-color: #FFFFFF;
          padding: 20px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }

      .header {
          display: flex;
          align-items: flex-start;
          flex-wrap: wrap;
      }

      .hospital-info {
          flex: 1;
          text-align: center;
          font-size: 10pt;
      }

      .hospital-info .title {
          font-weight: 700;
      }

      .hospital-info .subtitle {
          font-size: 13pt;
          font-weight: 700;
          margin: 4px 0;
      }

      .address {
          margin-top: 5px;
      }

      .patient-info {
          font-size: 9pt;
          min-width: 250px;
          margin-left: auto;
          margin-top: 10px;
      }

      .patient-row {
          display: flex;
          margin-bottom: 5px;
          margin-left: -40px;
      }

      .patient-row .label {
          width: 100px;
      }

      .patient-row .separator {
          width: 10px;
      }

      .patient-row .value {
          flex: 1;
      }

      .row {
          display: flex;
          flex-wrap: wrap;
          font-size: 13px;
      }

      .grid_1  { width: 8.33%;  padding: 5px; box-sizing: border-box; }
      .grid_2  { width: 16.66%; padding: 5px; box-sizing: border-box; }
      .grid_3  { width: 25%;    padding: 5px; box-sizing: border-box; }
      .grid_4  { width: 33.33%; padding: 5px; box-sizing: border-box; }
      .grid_5  { width: 41.66%; padding: 5px; box-sizing: border-box; }
      .grid_6  { width: 50%;    padding: 5px; box-sizing: border-box; }
      .grid_7  { width: 58.33%; padding: 5px; box-sizing: border-box; }
      .grid_8  { width: 66.66%; padding: 5px; box-sizing: border-box; }
      .grid_9  { width: 75%;    padding: 5px; box-sizing: border-box; }
      .grid_10 { width: 83.33%; padding: 5px; box-sizing: border-box; }
      .grid_11 { width: 91.66%; padding: 5px; box-sizing: border-box; }
      .grid_12 { width: 100%;   padding: 5px; box-sizing: border-box; }

      .tg  {border-collapse:collapse;border-spacing:0;}
      .tg td{border-color:inherit;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:12px;
        overflow:hidden;padding:3px 0px;word-break:normal;}
      .tg th{border-color:inherit;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:12px;
        font-weight:normal;overflow:hidden;padding:3px 0px;word-break:normal;}
      .tg .tg-amwm{border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
      .tg .tg-0lax{border-color:inherit;text-align:center;vertical-align:top}
  </style>
  <div class="container">
    <div class="header">
        <img src="../assets/img/dms.png" alt="Logo" style="width: 80px; margin-right: 20px;">
        <div class="hospital-info" style="margin-left: -10px">
            <div class="title">PEMERINTAH KABUPATEN DHARMASRAYA <br> DINAS KESEHATAN</div>
            <div class="subtitle">UPTD RSUD SUNGAI DAREH</div>
            <div class="address">
                Alamat : Jl Lintas Utama Sumatera Km. 4 Pulau Punjung <br>
                Telp. (0754) 40053.40118 Fax.(0754) 40347 Sungai Dareh - 27573 Dharmasraya
            </div>
        </div>
        <img src="../assets/img/sungaidareh.png" alt="Logo" style="width: 73px; margin-right: 20px;">
    </div>
    <!-- GARIS KOP SURAT -->
    <hr style="border: 1px solid black;">
    <div style="text-align: center;font-size: 15px;font-weight: 700;">LAPORAN ABSENSI UPTD RSUD SUNGAI DAREH</div>
      <div style="margin-top: 15px;">
          <div class="row" style="margin-left: -5px; font-size: 12px;">
            <div class="grid_2">NAMA</div>
            <div class="grid_10" style="margin-left: -30px; text-transform: uppercase;">: <?= $_SESSION['nama_lengkap'] ?></div>
            <div class="grid_2">PERUSAHAAN</div>
            <div class="grid_10" style="margin-left: -30px; text-transform: uppercase;">: PT. Jasamedika Saranatama</div>
            <div class="grid_2">JABATAN</div>
            <div class="grid_10" style="margin-left: -30px; text-transform: uppercase;">: <?= $_SESSION['jabatan'] ?></div>
            <div class="grid_2">PERIODE</div>
            <div class="grid_10" style="margin-left: -30px; text-transform: uppercase;">: <?= $nama_bulan[ date('n', strtotime($_GET['tanggal_awal'])) - 1] ?> <?= date('Y', strtotime($_GET['tanggal_awal'])) ?></div>
          </div>
          <div class="row" style="margin-top: 10px;">
            <table class="tg" style="table-layout: fixed; width: 100%">
              <colgroup>
                <col style="width: 30px">
                <col style="width: 50px">
                <col style="width: 64px">
                <col style="width: 64px">
                <col style="width: 112px">
                <col style="width: 64px">
                <col style="width: 88px">
              </colgroup>
              <thead>
                <tr>
                  <th class="tg-amwm">No</th>
                  <th class="tg-amwm">Hari</th>
                  <th class="tg-amwm">Tanggal</th>
                  <th class="tg-amwm">Chek In</th>
                  <th class="tg-amwm">Status Absensi</th>
                  <th class="tg-amwm">Check Out</th>
                  <th class="tg-amwm">Keterangan</th>
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
                  <td class="tg-0lax"><?= $no++ ?></td>
                  <td class="tg-0lax"><?= $nama_hari[ date('w', strtotime($data['tgl_absen'])) ] ?></td>
                  <td class="tg-0lax"><?= date('d', strtotime($data['tgl_absen'])) ?> <?= $nama_bulan[ date('n', strtotime($data['tgl_absen'])) - 1 ] ?> <?= date('Y', strtotime($data['tgl_absen'])) ?></td>
                  <td class="tg-0lax"><?= $chekin ?></td>
                  <td class="tg-0lax"><?= $data['status'] ?></td>
                  <td class="tg-0lax"><?= $chekout ?></td>
                  <td class="tg-0lax"><?= $data['ket'] ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="row" style="margin-top: 10px;">
            <div class="grid_12" style="display: flex; justify-content: flex-end;">
                <div style="text-align: center">
                    <div>Pulau Punjung, <?= date('d M Y') ?></div>
                    <div style="margin: 5px 0px 5px 0px;">Pembuat Laporan</div>
                      <img src="../generate_qr.php" alt="QR Code dengan Logo" style="width: 80px;">
                    <div style="margin-top: 5px; text-transform: uppercase;">( <?= $_SESSION['nama_lengkap'] ?> )</div>
                </div>
            </div>
          </div>
      </div>
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
