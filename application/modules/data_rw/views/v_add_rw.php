<div class="form-elements-wrapper">
    <div class="row">
        <div class="col-sm-12 ">
            <!-- input style start -->
            <div class="card-style mb-30">
                <div class="col-sm-6  m-auto justify-content-center">
                    <h6 class="mb-30 text-center ">Form Inputan Tambah Data RT</h6>
                    <?php echo form_open('data_rw/add_rw'); ?>
                    <div class="input-style-1">
                        <label>Nama RW</label>
                        <input type="text" name="nama_rw" placeholder="Nama RW" value="<?= set_value('nama_rw') ?>" />
                    </div>
                    <div class="input-style-1">
                        <label>Nomer RW</label>
                        <input type="text" name="no_rw" placeholder="Nomer RW" value="<?= set_value('no_rw') ?>" />
                    </div>
                    <div class="input-style-1">
                        <label>Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin"
                            value="<?= set_value('jenis_kelamin') ?>" />
                    </div>
                    <div class="input-style-1">
                        <label>Alamat</label>
                        <textarea name="alamat" rows="3" placeholder="Alamat"><?= set_value('alamat') ?></textarea>
                    </div>
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                Simpan
                            </button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>
                <!-- end input -->
            </div>
            <!-- end card -->
        </div>
    </div>
</div>