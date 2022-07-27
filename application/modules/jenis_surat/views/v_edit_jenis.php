<div class="form-elements-wrapper">
    <div class="row">
        <div class="col-sm-12 ">
            <!-- input style start -->
            <div class="card-style mb-30">
                <div class="col-sm-6  m-auto justify-content-center">
                    <h6 class="mb-30 text-center ">Form Tambah Jenis Surat</h6>
                    <?php echo form_open('jenis_surat/edit/' . $jenis_surat->id_jenis_surat); ?>
                    <div class="input-style-1">
                        <label>Jenis Surat</label>
                        <input type="text" name="nama_surat" placeholder="Jenis Surat"
                            value="<?= $jenis_surat->nama_surat ?>" />
                    </div>
                    <div class="input-style-1">
                        <label>Keterangan</label>
                        <textarea name="keterangan" rows="3"
                            placeholder="Keterangan"><?= $jenis_surat->keterangan ?></textarea>
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