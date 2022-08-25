<footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="#">PIONIKA GROUP</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>

<aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $('.date').datepicker({ format: 'yyyy-mm-dd'});
</script>
<script>
// $.widget.bridge('uibutton', $.ui.button)
$(function() {
    $('#tanggal_pinjam').datepicker({ format: 'yyyy-mm-dd' });
    $('#tanggal_kembali').datepicker({ format: 'yyyy-mm-dd' });
    $("#barang").chained("#warehouse");
});
</script>
<script>
    $(document).ready(function () {
    $('#barang').on('change', function () {
        $(".data").hide();
        $("#" + $(this).val()).fadeIn(500);
    }).change();
});
</script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/js/jquery.chained.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/sparklines/sparkline.js"></script>
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/js/adminlte.js"></script>
<script src="assets/js/demo.js"></script>
<script src="assets/js/pages/dashboard.js"></script>
<script src="assets/js/script.js"></script>
</body>

</html>