<section class="signin-section">
    <div class="container m-auto ">
        <div class="row d-flex m-auto align-items-center justify-content-center">
            <div class="col-lg-6 mt-3 mb-3">
                <div class="signin-wrapper">
                    <div class="form-wrapper">
                        <div class="title text-center pb-5 ">
                            <h1 class="text-primary mb-10">Registrasi</h1>
                            <p class="text-medium">
                                Website Pemetaan Pertanahan Desa Bantan Tengah
                            </p>
                        </div>
                        <div class="row">
                            <?php echo form_open('auth/register') ?>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" value="<?= set_value('nama') ?>"
                                        placeholder="Nama Lengkap" />
                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?= set_value('email') ?>"
                                        placeholder="Email" />
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>

                            <!-- end col -->
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Password</label>
                                    <input type="password" placeholder="Password" name="password1" id='password1' />
                                    <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Ulangi Password</label>
                                    <input type="password" placeholder="Ulangi Password" name="password2"
                                        id='password2' />
                                </div>
                            </div>

                            <!-- end col -->
                            <div class="col-12">
                                <div class="button-group d-flex justify-content-center flex-wrap">
                                    <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                        Registrasi
                                    </button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- end row -->
                        <div class="singin-option pt-40">
                            <p class="text-sm text-medium text-dark text-center">
                                Sudah punya akun?
                                <a href="<?= base_url('auth'); ?>">Login Sekarang</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</section>