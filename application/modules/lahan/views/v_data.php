<!-- ========== tables-wrapper start ========== -->
<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10">Kelola Data Lahan</h6>
                <a href="#0" class="main-btn primary-btn btn-sm btn-hover"><i class="lni lni-plus me-2"></i>Tambah</a>
                <p class="text-sm mb-20 mt-4">
                    Data lahan masyarakat yang terdaftar di desa
                </p>
                <div class="table-wrapper table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>No</h6>
                                </th>
                                <th>
                                    <h6>Nama Lahan</h6>
                                </th>
                                <th>
                                    <h6>Luas Lahan</h6>
                                </th>
                                <th>
                                    <h6>Isi Lahan</h6>
                                </th>
                                <th>
                                    <h6>Pemilik Lahan</h6>
                                </th>
                                <th>
                                    <h6>Alamat Lahan</h6>
                                </th>
                                <th>
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($lahan as $key => $value) { ?>
                            <tr>
                                <td>
                                    <p><?= $no++ ?></p>
                                </td>
                                <td>
                                    <p><?= $value->nama_lahan ?></p>
                                </td>
                                <td>
                                    <p><?= $value->luas_lahan ?></p>
                                </td>
                                <td>
                                    <p><?= $value->isi_lahan ?></p>
                                </td>
                                <td>
                                    <p><?= $value->pemilik_lahan ?></p>
                                </td>
                                <td>
                                    <p><?= $value->alamat_pemilik ?></p>
                                </td>
                                <td>
                                    <p>
                                        action
                                    </p>
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