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
<!-- jQuery -->
<script src="<?= base_url() ?>style/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="<?= base_url() ?>style/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Ekko Lightbox -->
<script src="<?= base_url() ?>style/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>style/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>style/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>style/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>style/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>style/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- REQUIRED SCRIPTS -->
<script>
window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000);
</script>

<!-- Page script -->
<script>
$(function() {

    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

})
</script>