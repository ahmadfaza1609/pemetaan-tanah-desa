<!-- ========== tables-wrapper start ========== -->
<?= $this->session->flashdata('message') ?>
<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10">Kelola Jenis Surat</h6>
                <a href="<?= base_url('jenis_surat/add_jenis') ?>" class="main-btn primary-btn btn-sm btn-hover"><i
                        class="lni lni-plus me-2"></i>Tambah</a>
                <p class="text-sm mb-20 mt-4">
                    Jenis Surat Akta Tanah.
                </p>
                <div class="table-wrapper table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>No</h6>
                                </th>
                                <th>
                                    <h6>Jenis Surat</h6>
                                </th>
                                <th>
                                    <h6>Keterangan</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($jenis_surat as $key => $value) { ?>
                            <tr>
                                <td>
                                    <p><?= $no++ ?></p>
                                </td>
                                <td>
                                    <p><?= $value->nama_surat ?></p>
                                </td>
                                <td>
                                    <p><?= $value->keterangan ?></p>
                                </td>

                                <td class=" text-center">
                                    <p>
                                        <a href="<?= base_url('jenis_surat/edit/' . $value->id_jenis_surat); ?>"
                                            class="text-warning">
                                            <i class="lni lni-pencil-alt ml-2 mr-2"></i>
                                        </a>
                                        <a href="<?= base_url('jenis_surat/delete/' . $value->id_jenis_surat) ?>"
                                            onclick="return confirm('Apakah yakin data <?= $value->nama_surat ?> dihapus ?')"
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