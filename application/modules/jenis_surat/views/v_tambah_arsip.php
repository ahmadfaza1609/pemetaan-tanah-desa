<div class="form-elements-wrapper">
    <div class="row">
        <div class="col-sm-12 ">
            <!-- input style start -->
            <div class="card-style mb-30">
                <div class="col-sm-6  m-auto justify-content-center">
                    <h6 class="mb-30 text-center ">Form Tambah Jenis Surat</h6>
                    <?php echo form_open_multipart('jenis_surat/upload_arsip'); ?>
                    <div class="input-style-1">
                        <label>NIK</label>
                        <input type="text" name="nik" placeholder="NIK" value="<?= set_value('nik') ?>" />
                    </div>
                    <div class="input-style-1">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>" />
                    </div>
                    <div class="select-style-1">
                        <label>Jenis Surat</label>
                        <div class="select-position">
                            <select name="id_jenis_surat" aria-label="Default select example">
                                <option value="id_jenis_surat" hidden>--Pilih Jenis Surat--</option>
                                <?php foreach ($jenis_surat as $key => $value) { ?>
                                <option value="<?= $value->id_jenis_surat ?>">
                                    <?= $value->nama_surat ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="input-style-1">
                        <label>Nomer Surat</label>
                        <input type="text" name="no_surat" placeholder="Nomor Surat"
                            value="<?= set_value('no_surat') ?>" />
                    </div>
                    <div class="input-style-1">
                        <label>Alamat</label>
                        <input type="text" name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>" />
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="select-style-1">
                                <label>Dusun</label>
                                <div class="select-position">
                                    <select name="id_dusun" aria-label="Default select example">
                                        <option value="id_dusun" hidden>--Pilih Jenis Surat--</option>
                                        <?php foreach ($data_dusun as $key => $value) { ?>
                                        <option value="<?= $value->id_data_dusun ?>">
                                            <?= $value->no_dusun ?> | <?= $value->nama_dusun ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="select-style-1">
                                <label>RW</label>
                                <div class="select-position">
                                    <select name="id_rw" aria-label="Default select example">
                                        <option value="id_rw" hidden>--Pilih RW--</option>
                                        <?php foreach ($data_rw as $key => $value) { ?>
                                        <option value="<?= $value->id_data_rw ?>">
                                            <?= $value->no_rw ?> | <?= $value->nama_rw ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="select-style-1">
                                <label>RT</label>
                                <div class="select-position">
                                    <select name="id_rt" aria-label="Default select example">
                                        <option value="id_data_rt" hidden>--Pilih RT--</option>
                                        <?php foreach ($data_rt as $key => $value) { ?>
                                        <option value="<?= $value->id_data_rt ?>">
                                            <?= $value->no_rt ?> | <?= $value->nama_rt ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-style-1">
                        <label>Jenis Surat</label>
                        <input type="file" name="file_arsip" />
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