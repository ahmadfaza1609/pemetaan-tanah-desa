<div class="col-12">
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">
                <?= $lahan->nama_lahan ?>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <?php foreach ($foto as $key => $value) { ?>
                <div class="col-sm-3">
                    <a href="<?= base_url('foto/' . $value->foto) ?>" data-toggle="lightbox"
                        data-title="<?= $value->ket ?>" data-gallery="gallery">
                        <img src="<?= base_url('foto/' . $value->foto) ?>" class="img-fluid mb-2" />
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<!-- Page specific script -->
<script>
$(function() {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });
})
</script>