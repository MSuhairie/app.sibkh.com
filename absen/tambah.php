<div class="row">
<div class="col-lg-12">
  <!-- Form Basic -->
  <div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Kegiatan</h6>
    </div>
    <div class="card-body">
      <form action="?page=absen/proses_tambah" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Tanggal Absen</label>
          <input type="date" class="form-control" name="tgl_absen" required>
        </div>
        <div class="form-group">
          <label>Status Absensi</label>
          <select name="status" id="status" class="form-control" required>
            <option value="">- Pilih Status -</option>
            <option value="Masuk">Masuk</option>
            <option value="Hari Minggu">Hari Minggu</option>
            <option value="Tanggal Merah">Tanggal Merah</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
          </select>
        </div>
        <div class="form-group" id="chekin_field" style="display: none;">
          <label>ChekIn</label>
          <input type="time" class="form-control" name="chekin" id="chekin">
        </div>
        <div class="form-group" id="chekout_field" style="display: none;">
          <label>ChekOut</label>
          <input type="time" class="form-control" name="chekout" id="chekout">
        </div>
        <div class="form-group" id="keterangan_field" style="display: none;">
          <label>Keterangan</label>
          <input type="text" class="form-control" name="ket" id="keterangan">
        </div>
        <div class="d-flex justify-content-star">
          <button type="submit" class="btn btn-primary mr-2">Simpan</button>
          <a href="?page=absen/index" class="btn btn-danger">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<script>
  document.getElementById('status').addEventListener('change', function() {
    var status = this.value;
    var keteranganField = document.getElementById('keterangan_field');
    var keteranganInput = document.getElementById('keterangan');
    var chekinField = document.getElementById('chekin_field');
    var chekinInput = document.getElementById('chekin');
    var chekoutField = document.getElementById('chekout_field');
    var chekoutInput = document.getElementById('chekout');

    if (status === 'Izin' || status === 'Sakit') {
      keteranganField.style.display = 'block';
      keteranganInput.setAttribute('required', 'required');
      keteranganInput.value = null;
    } else {
      keteranganField.style.display = 'none';
      keteranganInput.removeAttribute('required');
    }

    if (status === 'Masuk') {
      chekinField.style.display = 'block';
      chekinInput.setAttribute('required', 'required');
      chekoutField.style.display = 'block';
      chekoutInput.setAttribute('required', 'required');
      keteranganInput.value = null;
    } else {
      chekinField.style.display = 'none';
      chekinInput.removeAttribute('required');
      chekoutField.style.display = 'none';
      chekoutInput.removeAttribute('required');
    }

    if (status === 'Tanggal Merah') {
      keteranganInput.value = 'Tanggal Merah';
    }else{
      keteranganInput.value = null;
    }
  });
</script>