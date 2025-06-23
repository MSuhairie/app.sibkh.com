<?php 
  $query = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE DATE(tgl_absen) = CURDATE() AND id_user='$_SESSION[id_user]' AND statusenabled = 't'");
  $data = mysqli_fetch_array($query);
?>

<div class="alert alert-primary" role="alert">
  <!-- <h4 class="alert-heading">Selamat Datang di Sistem Informasi Buku Kegiatan Harian !</h4>  -->

  <div class="row">
  <!-- Basic Button -->
  <a href="?page=kegiatan/tambah" class="btn btn-warning" style="margin-left: 11px;"><i class="fa fa-plus"></i> Input Kegitan Harian</a>
  <!-- <a href="?page=kegiatan/signature" class="btn btn-info" style="margin-left: 11px;"><i class="fa fa-eye"></i> Signature</a> -->
  <div class="col-lg-12">
    <div class="card mb-2 mt-2">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Absen Kehadiran</h6>
      </div>
      <div class="card-body">
        <div class="alert alert-light" role="alert" style="text-transform: capitalize;">
          <?php 
            $query = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE DATE(tgl_absen) = CURDATE() AND id_user='$_SESSION[id_user]' AND statusenabled = 't'");
            $data = mysqli_fetch_array($query);

            $tgl_now =  date('Y-m-d');

            if ($data) {
                $chekin = date('Y-m-d', strtotime($data['tgl_absen'])); // pastikan format sama
                if ($chekin == $tgl_now) {
                    $chekinFormatted = date('d-m-Y H:i:s', strtotime($data['chekin']));
                    $chekoutFormatted = $data['chekout'] ? date('d-m-Y H:i:s', strtotime($data['chekout'])) : '-';
                    $status = "<br>Telah Chekin : {$chekinFormatted} <br>Telah Chekout : {$chekoutFormatted}";
                } else {
                    $status = "Silakan Chekin Kehadiran";
                }

            } else {
                $status = "Silakan Chekin Kehadiran";
            }
          ?>
          <b><?= $_SESSION['nama_lengkap'] ?> - <?= $_SESSION['jabatan'] ?></b> <?= $status ?>
        </div>
        <div class="d-flex row">
        <!-- absensi chekin -->
        <form action="?page=absen/proses_chekin" method="post">
            <input type="hidden" name="chekin" value="<?= date('Y-m-d H:i:s') ?>">
            <input type="hidden" name="tgl_absen" value="<?= date('Y-m-d') ?>">
            <input type="hidden" name="status" value="Masuk">

            <?php 
            $tgl_now = date('Y-m-d');
            
            if (isset($data) && $data) {
                $chekin = isset($data['chekin']) ? date('Y-m-d', strtotime($data['chekin'])) : null;
                $tgl_absen = isset($data['tgl_absen']) ? date('Y-m-d', strtotime($data['tgl_absen'])) : null;

                if ($chekin == $tgl_now || $tgl_absen == $tgl_now) {
                    // Sudah Chekin Hari Ini
                    echo '<button class="btn btn-secondary" style="margin-left: 11px;" disabled>Chek In</button>';
                } else {
                    // Belum Chekin
                    echo '<button class="btn btn-success" style="margin-left: 11px;">Chek In</button>';
                }
            } else {
                // Tidak ada data absen hari ini
                echo '<button class="btn btn-success" style="margin-left: 11px;">Chek In</button>';
            }
            ?>
        </form>
        <!-- end absensi chekin -->

        <!-- absensi chekout -->
        <form action="?page=absen/proses_chekout" method="post">
        <?php 
            $tgl_now = date('Y-m-d');

            if (isset($data) && $data) {
                // Amanin jika field kosong/null
                $chekin = isset($data['chekin']) ? date('Y-m-d', strtotime($data['chekin'])) : null;
                $chekout = isset($data['chekout']) ? date('Y-m-d', strtotime($data['chekout'])) : null;
                $tgl_absen = isset($data['tgl_absen']) ? $data['tgl_absen'] : null;

                if ($chekout == $tgl_now) {
                    // Sudah chekout hari ini
                    echo '<button class="btn btn-secondary ml-2" disabled>Chek Out</button>';
                } elseif ($chekin != $tgl_now) {
                    // Belum chekin hari ini, tidak bisa checkout
                    echo '<button class="btn btn-secondary ml-2" disabled>Chek Out</button>';
                } else {
                    // Sudah chekin tapi belum checkout hari ini
                    echo '<input type="hidden" name="chekout" value="'.date('Y-m-d H:i:s').'">';
                    echo '<input type="hidden" name="tgl_absen" value="'.$tgl_absen.'">';
                    echo '<button class="btn btn-success ml-2">Chek Out</button>';
                }
            } else {
                // Tidak ada data absen sama sekali (belum chekin)
                echo '<button class="btn btn-secondary ml-2" disabled>Chek Out</button>';
            }
        ?>
        </form>
        <!-- end absensi chekout -->
      </div>
      </div>
    </div>
  </div>
  </div>
  
    <?php 
      $tgl_now = date('Y-m-d');
      $tgl_absen = isset($data['tgl_absen']) ? date('Y-m-d', strtotime($data['tgl_absen'])) : null;
      if ($tgl_absen == $tgl_now) {
    ?>
      <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#exampleModalCenter" style="margin-right: 11px;" disabled><i class="fa fa-plus"></i> Ketidakhadiran</button>
    <?php }else { ?>
      <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#exampleModalCenter" style="margin-right: 11px;"><i class="fa fa-plus"></i> Ketidakhadiran</button>
    <?php } ?>
</div>

<!-- Modal Center -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Ketidakhadiran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="?page=absen/proses_ketidakhadiran" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Tanggal Absen</label>
          <input type="date" class="form-control" name="tgl_absen" id="tgl_absen" required>
        </div>
        <div class="form-group">
          <label>Status Absensi</label>
          <select name="status" id="status" class="form-control" required>
            <option value="">- Pilih Status -</option>
            <option value="Hari Minggu">Hari Minggu</option>
            <option value="Tanggal Merah">Tanggal Merah</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
          </select>
        </div>
        <div class="form-group" id="keterangan_field" style="display: none;">
          <label>Keterangan</label>
          <input type="text" class="form-control" name="ket" id="keterangan">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>

      <script>
        document.getElementById('status').addEventListener('change', function() {
          var status = this.value;
          var keteranganField = document.getElementById('keterangan_field');
          var keteranganInput = document.getElementById('keterangan');

          if (status === 'Izin' || status === 'Sakit') {
            keteranganField.style.display = 'block';
            keteranganInput.setAttribute('required', 'required');
          } else {
            keteranganField.style.display = 'none';
            keteranganInput.removeAttribute('required');
          }

          if (status === 'Tanggal Merah') {
            keteranganInput.value = 'Tanggal Merah';
          }else{
            keteranganInput.value = null;
          }
        });

        document.addEventListener("DOMContentLoaded", function() {
          var today = new Date();
          var dd = String(today.getDate()).padStart(2, '0');
          var mm = String(today.getMonth() + 1).padStart(2, '0');
          var yyyy = today.getFullYear();

          today = yyyy + '-' + mm + '-' + dd;
          document.getElementById("tgl_absen").value = today;
        });
      </script>

    </div>
  </div>
</div>

