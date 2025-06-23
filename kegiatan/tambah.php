<div class="row">
<div class="col-lg-12">
  <!-- Form Basic -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Kegiatan</h6>
    </div>
    <div class="card-body">
      <form action="?page=kegiatan/proses_tambah" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control" name="tgl" id="tgl" required>
        </div>
        <div class="form-group">
          <label>Kegiatan</label>
          <textarea name="kegiatan" class="form-control" id="" cols="30" rows="10" required></textarea>
        </div>
        <div class="d-flex justify-content-star">
          <button type="submit" class="btn btn-primary mr-2">Simpan</button>
          <a href="?page=kegiatan/index" class="btn btn-info"><i class="fa fa-eye"></i> Lihat Data</a>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
  var yyyy = today.getFullYear();

  today = yyyy + '-' + mm + '-' + dd;
  document.getElementById("tgl").value = today;
});
</script>