<!-- ========== tables-wrapper start ========== -->
<?= $this->session->flashdata('message') ?>
<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10">Kelola Data Dusun</h6>
                <a href="<?= base_url('data_dusun/add_dusun') ?>" class="main-btn primary-btn btn-sm btn-hover"><i
                        class="lni lni-plus me-2"></i>Tambah</a>
                <a href="<?= base_url() ?>" class="main-btn success-btn btn-sm btn-hover"><i
                        class="lni lni-add-files me-2 fs-5"></i>Import</a>
                <p class="text-sm mb-20 mt-4">
                    Data Dusun Desa Bantan Tengah yang terdaftar di pemerintahan desa.
                </p>
                <div class="table-wrapper table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>No</h6>
                                </th>
                                <th>
                                    <h6>Nama Dusun</h6>
                                </th>
                                <th>
                                    <h6>No Dusun</h6>
                                </th>
                                <th>
                                    <h6>Jenis Kelamin</h6>
                                </th>
                                <th>
                                    <h6>Alamat</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_dusun as $key => $value) { ?>
                            <tr>
                                <td>
                                    <p><?= $no++ ?></p>
                                </td>
                                <td>
                                    <p><?= $value->nama_dusun ?></p>
                                </td>
                                <td>
                                    <p><?= $value->no_dusun ?></p>
                                </td>
                                <td>
                                    <p><?= $value->jenis_kelamin ?></p>
                                </td>
                                <td>
                                    <p><?= $value->alamat ?></p>
                                </td>
                                <td class=" text-center">
                                    <p>
                                        <a href="<?= base_url('data_dusun/edit/' . $value->id_data_dusun); ?>"
                                            class="text-warning">
                                            <i class="lni lni-pencil-alt ml-2 mr-2"></i>
                                        </a>
                                        <a href="<?= base_url('data_dusun/delete/' . $value->id_data_dusun) ?>"
                                            onclick="return confirm('Apakah yakin data <?= $value->nama_dusun ?> dihapus ?')"
                                            class="text-danger">
                                            <i class="lni lni-trash-can"></i>
                                        </a>
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