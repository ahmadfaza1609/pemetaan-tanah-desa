<div class="container-fluid vh-100">
    <div
        class="d-flex w-100 h-100 p-3 mx-auto flex-column justify-content-center align-items-center top-0 m-auto position-absolute w-100">
        <main class="px-3 text-center mb-4">
            <h1 class="fw-bold col-lg-12 col-md-12 col-sm-12">Cari Data Tanah Anda Disini Dengan Memasukkan NIK anda
            </h1>
            <p class="lead">Masukkan NIK anda dikolom pencarian atau menggunakan voice.</p>

            <!-- <p class="lead">
                <a href="#" class="btn btn-lg btn-secondary fw-medium px-4 border-white btn-success">Learn more</a>
            </p> -->
        </main>
        <div class="container">
            <div class="col-12 col-lg-auto mb-3 mb-lg-0 w-100">
                <?php echo form_open('pemetaan_user/cari') ?>
                <div class="row justify-content-center">
                    <div class="col-3 col-sm-12 mb-3 col-lg-4 col-md-12">

                        <select name="cariberdasarkan" class="form-select py-4 px-5 border-0 shadow rounded-pill">
                            <option value="">Cari Berdasarkan</option>
                            <option value="nik">NIK</option>
                            <option value="nama">Nama</option>
                        </select>
                    </div>
                    <div class="col-7 col-sm-8 col-lg-6 col-md-8">

                        <input type="search" name="yangdicari"
                            class="form-control py-4 px-5 border-0 shadow rounded-pill"
                            placeholder="Cari Data Tanah Anda Disini..." aria-label="Search">
                    </div>
                    <div class="col-2 col-sm-4 col-lg-2 col-md-4">
                        <button class="btn btn-primary py-3 px-5 border-0 shadow rounded-pill" type="submit"><i
                                class="bi fs-3 bi-search"></i></button>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<section class="container mb-5">
    <div class="card border-0 shadow rounded" id="data">
        <div class="card-body">
            <h2 class="text-center mt-4">Data Pemetaan Tanah Warga Desa Bantan Tengah</h2>
            <div class="mt-5 overflow-auto">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>
                                <h6>No</h6>
                            </th>
                            <th>
                                <h6>NIK</h6>
                            </th>
                            <th>
                                <h6>Nama Lengkap</h6>
                            </th>
                            <th>
                                <h6>Alamat</h6>
                            </th>
                            <th>
                                <h6>Dusun</h6>
                            </th>
                            <th>
                                <h6>Jenis Sertifikat Surat</h6>
                            </th>
                            <th>
                                <h6>RT / RW</h6>
                            </th>
                            <th>
                                <h6>Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pemetaan_user as $key => $value) { ?>
                        <tr>
                            <td>
                                <p><?= $no++ ?></p>
                            </td>
                            <td>
                                <p><?= $value->nik ?></p>
                            </td>
                            <td>
                                <p><?= $value->nama ?></p>
                            </td>
                            <td>
                                <p><?= $value->alamat ?></p>
                            </td>
                            <td>
                                <p><?= $value->no_dusun ?></p>
                            </td>
                            <td>
                                <p><?= $value->nama_surat ?></p>
                            </td>
                            <td>
                                <p><?= $value->no_rt ?> / <?= $value->no_rw ?></p>
                            </td>
                            <td>
                                <p>
                                    <a href="<?= base_url('pemetaan_user/detailLahanUser/' . $value->id_lahan_warga) ?>"
                                        class="btn main-btn btn-sm btn-warning">Lihat Data</a>
                                </p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>