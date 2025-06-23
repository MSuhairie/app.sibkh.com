</div>
<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout">Logout !</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Anda Yakin ingin logout <b><?= $_SESSION['nama_lengkap'] ?></b> ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            <a href="auth/logout.php" class="btn btn-primary">Logout</a>
        </div>
        </div>
    </div>
</div>

</div>

</div>
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="assets/template-admin/vendor/jquery/jquery.min.js"></script>
<script src="assets/template-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/template-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/template-admin/js/ruang-admin.min.js"></script>
<script src="assets/template-admin/vendor/chart.js/Chart.min.js"></script>
<script src="assets/template-admin/js/demo/chart-area-demo.js"></script>
<!-- Page level plugins -->
<script src="assets/template-admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/template-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- ckeditor -->
<script src="assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor');
</script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>  
</body>
</html>