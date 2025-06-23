<div class="row">
<div class="col-lg-12">
  <!-- Form Basic -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
    </div>
    <div class="card-body">
      <form action="?page=user/proses_tambah" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>NIP</label>
          <input type="text" class="form-control" placeholder="Massukan NIP" name="nip">
        </div>
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" class="form-control" placeholder="Massukan Nama Lengkap" name="nama_lengkap">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" placeholder="Massukan Username" name="username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="text" class="form-control" placeholder="Massukan Password" name="password">
        </div>
        <div class="form-group">
          <label>Jabatan</label>
          <input type="text" class="form-control" placeholder="Massukan Jabatan" name="jabatan">
        </div>
        <div class="d-flex justify-content-star">
        <a href="?page=user/index" class="btn btn-danger mr-2">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>