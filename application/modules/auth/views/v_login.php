<section class="signin-section shadow-sm">
    <div class="container m-auto ">
        <div class="row d-flex m-auto align-items-center justify-content-center">
            <div class="col-lg-6 mt-3">
                <div class="signin-wrapper">
                    <div class="form-wrapper">
                        <div class="title text-center pb-5 ">
                            <h1 class="text-primary mb-10">Selamat Datang</h1>
                            <p class="text-medium">
                                Website Pemetaan Pertanahan Desa Bantan Tengah
                            </p>
                        </div>
                        <?= $this->session->flashdata('message') ?>
                        <?php echo form_open('auth') ?>
                        <div class="row">
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
                                    <input type="password" name="password" placeholder="Password" />
                                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-12">
                                <div class="button-group d-flex justify-content-center flex-wrap">
                                    <button class="main-btn primary-btn btn-hover w-100 text-center">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <?php echo form_close() ?>
                        <!-- <div class="singin-option pt-40">
                            <p class="text-sm text-medium text-dark text-center">
                                Belum punya akun ni?
                                <a href="<?= base_url('auth/register') ?>">Buat akun sekarang dong</a>
                            </p>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</section>