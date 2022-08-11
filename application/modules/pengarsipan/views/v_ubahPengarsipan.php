<div class="form-elements-wrapper">
    <div class="row">
        <div class="col-sm-12 ">
            <!-- input style start -->
            <div class="card-style mb-30">
                <div class="col-sm-6  m-auto justify-content-center">
                    <h6 class="mb-30 text-center ">Form Tambah Penduduk</h6>
                    <?php
                    // notifikasi form wajib diisi 
                    echo validation_errors('<div class="alert alert-danger alert-dismissible">', '</div>');

                    echo form_open_multipart('pengarsipan/ubahPengarsipan/' . $pengarsipan->id_pengarsipan); ?>
                    <div class="select-style-1">
                        <label>NIK</label>
                        <div class="select-position">
                            <select name="id_penduduk" aria-label="Default select example">
                                <option value="id_penduduk" hidden>--NIK--</option>
                                <?php foreach ($penduduk as $key => $value) { ?>
                                <option value="<?= $value->id_penduduk ?>"
                                    <?= $value->id_penduduk == $pengarsipan->id_penduduk ? ' selected' : '' ?>>
                                    <table>
                                        <tr>
                                            <td>
                                                <p><?= $value->nik ?></p>
                                            </td>
                                            <td> - </td>
                                            <td>
                                                <p><?= $value->nama ?></p>
                                            </td>
                                        </tr>
                                    </table>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="select-style-1">
                        <label>Jenis Surat</label>
                        <div class="select-position">
                            <select name="id_jenis_surat" aria-label="Default select example">
                                <option value="id_jenis_surat" hidden>--Pilih Jenis Surat--</option>
                                <?php foreach ($jenis_surat as $key => $value) { ?>
                                <option value="<?= $value->id_jenis_surat ?>"
                                    <?= $value->id_jenis_surat == $pengarsipan->id_jenis_surat ? ' selected' : '' ?>>
                                    <?= $value->nama_surat ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <embed class="mt-3" src="<?= base_url('uploads_file/' . $pengarsipan->file_surat) ?>"
                        type="application/PDF" height="200" width="100%"></embed>
                    <div class="input-style-1">
                        <label>File Surat</label>
                        <input type="file" name="file_surat" />
                        <small class="text-small">format file : <small
                                class="text-danger text-small">.pdf</small></small>
                    </div>
                    <div class="input-style-3">
                        <textarea placeholder="Keterangan" name="ket" rows="5"><?= $pengarsipan->ket ?></textarea>
                        <span class="icon"><i class="lni lni-text-format"></i></span>
                    </div>
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                Simpan
                            </button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>
                <!-- end input -->
            </div>
            <!-- end card -->
        </div>
    </div>
</div>