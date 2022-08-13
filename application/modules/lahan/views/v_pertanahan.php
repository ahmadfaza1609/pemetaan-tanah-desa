<!-- ========== tables-wrapper start ========== -->
<?php
// notifikasi form wajib diisi 
echo validation_errors('<div class="alert alert-danger alert-dismissible">', '</div>');

// notifikasi gagal upload
if (isset($error_upload)) {
    echo '<div class="alert alert-warning alert-dismissible">' . $error_upload . '</div>';
};

// notifikaasi berhasil simpan 
if ($this->session->flashdata('sukses')) {
    echo $this->session->flashdata('sukses');
} ?>
<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30 overflow-auto">
                <h6 class="mb-10"><?= $title ?></h6>
                <a href="<?= base_url('lahan/LahanTanah/tambahTanah/') ?>"
                    class="main-btn primary-btn btn-sm btn-hover"><i class="lni lni-plus me-2"></i>Tambah</a>
                <p class="text-sm mb-20 mt-4">
                    <?= $title ?> masyarakat yang terdaftar di desa
                </p>
                <div class="table-wrapper table-responsive overflow-auto">
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>No</h6>
                                </th>
                                <th>
                                    <h6>NIK</h6>
                                </th>
                                <th>
                                    <h6>Nama</h6>
                                </th>
                                <th>
                                    <h6>Alamat</h6>
                                </th>
                                <th>
                                    <h6>RT/RW</h6>
                                </th>
                                <th>
                                    <h6>Batas Barat</h6>
                                </th>
                                <th>
                                    <h6>Batas Timur</h6>
                                </th>
                                <th>
                                    <h6>Batas Utara</h6>
                                </th>
                                <th>
                                    <h6>Batas Selatan</h6>
                                </th>
                                <th>
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($lahan_warga as $key => $value) { ?>
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
                                    <p><?= $value->no_rt ?> / <?= $value->no_rw ?></p>
                                </td>
                                <td>
                                    <p><?= $value->batas_barat ?></p>
                                </td>
                                <td>
                                    <p><?= $value->batas_selatan ?></p>
                                </td>
                                <td>
                                    <p><?= $value->batas_timur ?></p>
                                </td>
                                <td>
                                    <p><?= $value->batas_utara ?></p>
                                </td>
                                <td>
                                    <p>
                                        <a href="<?= base_url('lahan/LahanTanah/detailLahanTanah/' . $value->id_lahan_warga) ?>"
                                            class="text-success">
                                            <i class="lni lni-eye"></i>
                                        </a>
                                        <a href="<?= base_url('lahan/LahanTanah/ubahLahanTanah/' . $value->id_lahan_warga); ?>"
                                            class="text-warning">
                                            <i class="lni lni-pencil-alt ml-2 mr-2"></i>
                                        </a>
                                        <a href="<?= base_url('lahan/LahanTanah/hapusLahanTanah/' . $value->id_lahan_warga) ?>"
                                            onclick="return confirm('Apakah yakin data <?= $value->id_lahan_warga ?> dihapus ?')"
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