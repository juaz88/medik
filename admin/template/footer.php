<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy; 2020 <a href="#">Sistema Medik</a>.</strong> All rights
  reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="<?= BASE_URL ?>/assets/adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= BASE_URL ?>/assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= BASE_URL ?>/assets/adminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= BASE_URL ?>/assets/adminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables -->
<script src="<?= BASE_URL ?>/assets/adminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= BASE_URL ?>/assets/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASE_URL ?>/assets/adminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= BASE_URL ?>/assets/adminLTE/dist/js/demo.js"></script>
<!-- Toastr -->
<script src="<?= BASE_URL ?>/assets/adminLTE//Plugins/toastr/toastr.min.js"></script>


</body>

</html>

<?php if (isset($db)) {
  $db->db_disconnect();
} ?>