<!-- ========= All Javascript files linkup ======== -->

<script src="<?= base_url() ?>style-admin/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>style-admin/assets/js/Chart.min.js"></script>
<script src="<?= base_url() ?>style-admin/assets/js/dynamic-pie-chart.js"></script>
<script src="<?= base_url() ?>style-admin/assets/js/moment.min.js"></script>
<script src="<?= base_url() ?>style-admin/assets/js/fullcalendar.js"></script>
<script src="<?= base_url() ?>style-admin/assets/js/jvectormap.min.js"></script>
<script src="<?= base_url() ?>style-admin/assets/js/world-merc.js"></script>
<script src="<?= base_url() ?>style-admin/assets/js/polyfill.js"></script>

<script src="<?= base_url() ?>style-admin/assets/js/main.js"></script>


<!-- Ekko Lightbox -->
<!-- <script src="<?= base_url() ?>style/plugins/ekko-lightbox/ekko-lightbox.min.js"></script> -->
<!-- DataTables -->
<!-- <script src="<?= base_url() ?>style/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>style/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>style/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>style/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
<!-- bootstrap color picker -->
<!-- <script src="<?= base_url() ?>style/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script> -->


<!-- REQUIRED SCRIPTS -->
<script>
window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000);
</script>
<script>
const dataTable = new simpleDatatables.DataTable("#table", {
    searchable: true,
});
</script>