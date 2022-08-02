<div class="col-12">
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-title">
                <?= $lahan->nama_lahan ?>
            </div>
        </div>
        <div class="card-body">
            <?php
            // notifikasi form wajib diisi 
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                <button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');

            // notifikasi gagal upload
            if (isset($error_upload)) {
                echo '<div class="alert alert-warning alert-dismissible">
                    <button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>' . $error_upload . '</div>';
            };

            // notifikaasi berhasil simpan 
            if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
            }

            echo form_open_multipart('lahan/add_foto/' . $lahan->id_lahan); ?>

            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <input type="text" name="ket" class="form-control" placeholder="Keterangan Foto">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Foto</button>
                    </div>
                </div>
            </div>

            <?php echo form_close(); ?>

            <div class="row">
                <?php foreach ($foto as $key => $value) { ?>
                <div class="col-sm-3">
                    <a href="<?= base_url('foto/' . $value->foto) ?>" data-toggle="lightbox"
                        data-title="<?= $value->ket ?>" data-gallery="gallery">
                        <img src="<?= base_url('foto/' . $value->foto) ?>" class="img-fluid mb-2" />
                    </a>
                    </br>
                    <a href="<?= base_url('lahan/delete_foto/' . $value->id_lahan . '/' . $value->id_galeri_lahan) ?>"
                        class="btn btn-sm btn-danger"
                        onclick="return confirm('Apakah yakin <?= $value->ket ?> ini dihapus ? ')">Delete</a>
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