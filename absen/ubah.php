<?php  
      $id_absen = $_GET['id_absen'];
      $query = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE id_absen='$id_absen'");
      $data = mysqli_fetch_array($query);
?>

<div class="row">
<div class="col-lg-12">
  <!-- Form Basic -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Kegiatan</h6>
    </div>
    <div class="card-body">
      <form action="?page=absen/proses_ubah" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_absen" value="<?= $data['id_absen'] ?>">
        <div class="form-group">
          <label>Status Absensi</label>
          <input type="text" class="form-control" name="status" value="<?= $data['status']?>">
        </div>
        <div class="form-group">
          <label>Tanggal Absen</label>
          <input type="date" class="form-control" name="tgl_absen" value="<?= $data['tgl_absen'] ?>" >
        </div>
        <div class="form-group">
          <label>ChekIn</label>
          <input type="datetime-local" class="form-control" name="chekin" value="<?= $data['chekin'] ?>" >
        </div>
        <div class="form-group">
          <label>ChekOut</label>
          <input type="datetime-local" class="form-control" name="chekout" value="<?= $data['chekout'] ?>" >
        </div>
        <div class="d-flex justify-content-star">
        <a href="?page=absen/index" class="btn btn-danger mr-2">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>