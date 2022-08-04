<!-- ========== tables-wrapper start ========== -->
<?= $this->session->flashdata('message') ?>
<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10"><?= $title ?></h6>
                <a href="<?= base_url('pengarsipan/tambahPengarsipan') ?>"
                    class="main-btn primary-btn btn-sm btn-hover"><i class="lni lni-plus me-2"></i>Tambah</a>
                <p class="text-sm mb-20 mt-4">
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
                                    <h6>Alamat</h6>
                                </th>
                                <th>
                                    <h6>Dusun</h6>
                                </th>
                                <th>
                                    <h6>RT/RW</h6>
                                </th>
                                <th>
                                    <h6>Jenis Surat</h6>
                                </th>
                                <th>
                                    <h6>File Surat</h6>
                                </th>
                                <th>
                                    <h6>Ket</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pengarsipan as $key => $value) { ?>
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
                                    <p><?= $value->no_rt ?>/<?= $value->no_rw ?></p>
                                </td>
                                <td>
                                    <p><?= $value->nama_surat ?></p>
                                </td>
                                <td>
                                    <p><?= $value->file_surat ?></p>
                                </td>
                                <td>
                                    <p><?= $value->ket ?></p>
                                </td>
                                <td class=" text-center">
                                    <p>
                                        <a href="<?= base_url('pengarsipan/Pengarsipan/detailSuratArsip/' . $value->id_pengarsipan); ?>"
                                            class="text-success">
                                            <i class="lni lni-eye"></i>
                                        </a>
                                        <a href="<?= base_url('pengarsipan/Pengarsipan/ubahPengarsipan/' . $value->id_pengarsipan); ?>"
                                            class="text-warning">
                                            <i class="lni lni-pencil-alt ml-2 mr-2"></i>
                                        </a>
                                        <a href="<?= base_url('pengarsipan/Pengarsipan/hapusPengarsipan/' . $value->id_pengarsipan) ?>"
                                            onclick="return confirm('Apakah yakin data dihapus ?')" class="text-danger">
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