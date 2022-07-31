<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10">Detail Surat Tanah</h6>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="table-wrapper table-responsive">
                            <table class="table">
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><?= $arsip->nik ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Pemilik Surat</td>
                                    <td>:</td>
                                    <td><?= $arsip->nama ?></td>
                                </tr>
                                <tr>
                                    <td>RT / RW</td>
                                    <td>:</td>
                                    <td><?= $arsip->no_rt ?> / <?= $arsip->no_rw ?></td>
                                </tr>
                                <tr>
                                    <td>Dusun</td>
                                    <td>:</td>
                                    <td><?= $arsip->no_dusun ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="table-wrapper table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $arsip->alamat ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Surat</td>
                                    <td>:</td>
                                    <td><?= $arsip->nama_surat ?></td>
                                </tr>
                                <tr>
                                    <td>No.Surat</td>
                                    <td>:</td>
                                    <td><?= $arsip->no_surat ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <embed class="mt-3" src="<?= base_url('uploads_file/' . $arsip->file_arsip) ?>" type="application/PDF"
                    height="1000" width="100%"></embed>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>