<?php  
      $id_kegiatan = $_GET['id_kegiatan'];
      $query = mysqli_query($koneksi, "SELECT * FROM tb_kegiatan WHERE id_kegiatan='$id_kegiatan'");
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
      <form action="?page=kegiatan/proses_ubah" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_kegiatan" value="<?= $data['id_kegiatan'] ?>">
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control" name="tgl" value="<?= $data['tgl'] ?>" required>
        </div>
        <div class="form-group">
          <label>Kegiatan</label>
          <textarea name="kegiatan" class="form-control" id="" cols="30" rows="10" required><?= $data['kegiatan'] ?></textarea>
        </div>
        <div class="d-flex justify-content-star">
        <a href="?page=kegiatan/index" class="btn btn-danger mr-2">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>