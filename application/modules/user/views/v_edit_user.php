<div class="form-elements-wrapper">
    <div class="row">
        <div class="col-sm-12 ">
            <!-- input style start -->
            <div class="card-style mb-30">
                <div class="col-sm-6  m-auto justify-content-center">
                    <h6 class="mb-30 text-center ">Form Tambah Penduduk</h6>
                    <?php
                    // notifikasi form wajib diisi 
                    echo validation_errors('<div class="alert alert-danger alert-dismissible">', '</div>');

                    echo form_open('user/ubahUser/'); ?>
                    <div class="input-style-1">
                        <label>Nama User</label>
                        <input type="text" name="nama" placeholder=" Jenis Surat" value="<?= $user_regis->nama ?>" />
                    </div>
                    <div class="select-style-1">
                        <label>Role</label>
                        <div class="select-position">
                            <select name="id_role_user" aria-label="Default select example">
                                <option value="id_role_user" hidden>--Role--</option>
                                <?php foreach ($role as $key => $value) { ?>
                                <option value="<?= $value->id_role_user ?>"
                                    <?= $value->id_role_user == $user_regis->role_id ?>>
                                    <p><?= $value->role ?></p>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
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