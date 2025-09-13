<style>
  /* Gaya umum */
.col-auto {
    display: inline-block;
    margin-right: 8px; /* Jarak antar tombol */
}

/* Gaya untuk perangkat dengan lebar layar kurang dari atau sama dengan 768px, misalnya ponsel */
@media (max-width: 768px) {
    .col-auto {
        display: block; /* Mengubah menjadi tata letak blok agar tombol berada di bawah-bawah */
        margin-bottom: 0.5rem; /* Jarak antara tombol dan elemen di atasnya */
    }
}
</style>

<div class="row mb-3">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <form action="?page=absen/index" method="post" name="postform">
        <div class="row">
          <div class="col-6">
            <label for="simpleDataInput" style="font-weight: bold;">Dari Tanggal</label>
            <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal">
          </div>
          <div class="col-6">
            <label for="simpleDataInput" style="font-weight: bold;">Sampai Tanggal</label>
            <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir">
          </div>
        </div>
        <div class="d-flex justify-content-start mt-2">
          <button type="submit" class="btn btn-primary mr-1" name="pencarian">Cari</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<?php
    //proses jika sudah klik tombol pencarian data
    if(isset($_POST['pencarian'])){
    //menangkap nilai form
    $tanggal_awal=$_POST['tanggal_awal'];
    $tanggal_akhir=$_POST['tanggal_akhir'];
    if(empty($tanggal_awal) || empty($tanggal_akhir)){
    //jika data tanggal kosong
?>
  <script language="JavaScript">
    alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
    document.location='?page=absen/index';
  </script>
<?php
  }else{
  $query = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE id_user='$_SESSION[id_user]' AND tgl_absen BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND  statusenabled='t' ORDER BY tgl_absen DESC");
  }
?>

<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Absen</h6>
      </div>
      <div class="table-responsive p-3">
      <div class="d-flex justify-content-end gap-1">
        <button type="button" class="btn btn-success mb-2 mr-2" onclick="cetakData()"><i class="fa fa-print"></i> Cetak Data</button>
        <a href="?page=absen/tambah" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Tambah Data</a>
      </div>
        <table class="table align-items-center table-flush" id="dataTable">
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Status</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Chek In</th>
              <th scope="col">Chek Out</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $no = 1;
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
            <td><?= $no++ ?></td>
            <td><?= $data['status'] ?></td>
            <td><?= date('d-m-Y', strtotime($data['tgl_absen'])) ?></td>
            <td><?= $chekin ?></td>
            <td><?= $chekout ?></td>
            <td><?= $data['ket'] ?></td>
            <td>
              <a href="?page=absen/ubah&id_absen=<?= $data['id_absen'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
              <a href="?page=absen/hapus&id_absen=<?= $data['id_absen'] ?>" class="btn btn-danger" onclick="confirm('Anda Yakin Hapus ?')"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          <?php } ?>
          <?php
            //jika pencarian data tidak ditemukan
            if(mysqli_num_rows($query) == 0){
          ?>
          <td colspan="7" align="center">
            <font color=red><blink>Pencarian data tidak ditemukan!</blink></font>
          </td>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php
  }else{
?>
<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Absen</h6>
      </div>
      <div class="table-responsive p-3">
        <div class="d-flex justify-content-end gap-1">
          <a href="?page=absen/tambah" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
        <table class="table align-items-center table-flush" id="dataTable">
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Status</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Chek In</th>
              <th scope="col">Chek Out</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE MONTH(tgl_absen) = MONTH(CURDATE()) AND YEAR(tgl_absen) = YEAR(CURDATE()) AND id_user='$_SESSION[id_user]' AND statusenabled='t' ORDER BY tgl_absen DESC");
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
            <td><?= $no++ ?></td>
            <td><?= $data['status'] ?></td>
            <td><?= date('d-m-Y', strtotime($data['tgl_absen'])) ?></td>
            <td><?= $chekin ?></td>
            <td><?= $chekout ?></td>
            <td><?= $data['ket'] ?></td>
            <td>
              <a href="?page=absen/ubah&id_absen=<?= $data['id_absen'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
              <a href="?page=absen/hapus&id_absen=<?= $data['id_absen'] ?>" class="btn btn-danger" onclick="confirm('Anda Yakin Hapus ?')"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- ini untuk url cetak -->
<script>
  function cetakData() {
    var tanggalAwal = '<?= isset($_POST['tanggal_awal']) ? $_POST['tanggal_awal'] : '' ?>';
    var tanggalAkhir = '<?= isset($_POST['tanggal_akhir']) ? $_POST['tanggal_akhir'] : '' ?>';
    var url = 'absen/cetak.php?tanggal_awal=' + tanggalAwal + '&tanggal_akhir=' + tanggalAkhir;
      window.open(url, '_blank');
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Inisialisasi tanggal awal dan tanggal akhir dengan bulan ini
    var today = new Date();
    var firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
    var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);

    var dd = String(firstDay.getDate()).padStart(2, '0');
    var mm = String(firstDay.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = firstDay.getFullYear();

    var ddLast = String(lastDay.getDate()).padStart(2, '0');
    var mmLast = String(lastDay.getMonth() + 1).padStart(2, '0');
    var yyyyLast = lastDay.getFullYear();

    var firstDayFormatted = yyyy + '-' + mm + '-' + dd;
    var lastDayFormatted = yyyyLast + '-' + mmLast + '-' + ddLast;

    document.getElementById("tanggal_awal").value = firstDayFormatted;
    document.getElementById("tanggal_akhir").value = lastDayFormatted;

    // Tangkap elemen tombol cari
    var cariButton = document.querySelector("button[name=pencarian]");

    // Tambahkan event listener untuk saat tombol cari ditekan
    cariButton.addEventListener("click", function() {
      // Simpan nilai tanggal awal dan tanggal akhir ke dalam local storage
      localStorage.setItem("tanggalAwal", document.getElementById("tanggal_awal").value);
      localStorage.setItem("tanggalAkhir", document.getElementById("tanggal_akhir").value);
    });

    // Cek apakah ada nilai tanggal awal dan tanggal akhir di local storage
    var tanggalAwalValue = localStorage.getItem("tanggalAwal");
    var tanggalAkhirValue = localStorage.getItem("tanggalAkhir");

    // Jika ada nilai di local storage, atur nilai input tanggal sesuai dengan nilai yang disimpan
    if (tanggalAwalValue && tanggalAkhirValue) {
      document.getElementById("tanggal_awal").value = tanggalAwalValue;
      document.getElementById("tanggal_akhir").value = tanggalAkhirValue;
    }
    
    var resetButton = document.querySelector("button[type=reset]");

    // Tambahkan event listener untuk saat tombol reset ditekan
    resetButton.addEventListener("click", function() {
      // Hapus nilai tanggal awal dan tanggal akhir dari local storage
      localStorage.removeItem("tanggalAwal");
      localStorage.removeItem("tanggalAkhir");
    });
    
  });
</script>
