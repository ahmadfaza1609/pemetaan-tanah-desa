<!-- ========== tables-wrapper start ========== -->
<?= $this->session->flashdata('message') ?>
<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10"><?= $title ?></h6>
                <p class="text-sm mb-20 mt-2">
                    <?= $title ?> Desa Bantan Tengah yang terdaftar di pemerintahan desa.
                </p>
                <div class="table-wrapper table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>No</h6>
                                </th>
                                <th>
                                    <h6>NIK</h6>
                                </th>
                                <th>
                                    <h6>Nama Penduduk</h6>
                                </th>
                                <th>
                                    <h6>Jumlah Tanah</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($jumlah_tanah as $key => $value) { ?>
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
                                    <p><span class="badge bg-primary px-3 py-2"><?= $value->total_tanah ?>
                                            Lahan Tanah</span></p>
                                </td>

                                <td class=" text-center">

                                    <a href="<?= base_url('lahan/LahanJumlah/tambahTanahWarga/' . $value->id_penduduk) ?>"
                                        class="main-btn success-btn btn-sm btn-hover"><i class="lni lni-plus me-2"></i>
                                        Tambah Lahan</a>

                                </td>

                            </tr>
                            <?php } ?>
                            <!-- end table row -->
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>