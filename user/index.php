<div class="row">
  <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
      </div>
      <div class="table-responsive p-3">
        <div class="d-flex justify-content-end">
          <a href="?page=user/tambah" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
        <table class="table align-items-center table-flush" id="dataTable">
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Username</th>
              <th scope="col">Nama Lengkap</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE statusenabled='t'");
            while($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['username'] ?></td>
              <td><?= $data['nama_lengkap'] ?></td>
              <td><?= $data['jabatan'] ?></td>
              <td>
                <a href="?page=user/ubah&id_user=<?= $data['id_user'] ?>" class="btn btn-warning">Edit</a>
                <a href="?page=user/hapus&id_user=<?= $data['id_user'] ?>" class="btn btn-danger" onclick="confirm('Anda Yakin Hapus ?')">Hapus</a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

