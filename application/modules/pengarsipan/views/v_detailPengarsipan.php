<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="text-center mt-4 mb-3"><?= $arsip->nama_surat ?></h3>
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
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $arsip->alamat ?></td>
                                </tr>
                                <tr>
                                    <td>Sertifikat Tanah</td>
                                    <td>:</td>
                                    <td><?= $arsip->nama_surat ?></td>
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

                        <embed class="mt-3" src="<?= base_url('uploads_file/' . $arsip->file_surat) ?>"
                            type="application/PDF" height="600" width="100%"></embed>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>