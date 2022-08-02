<!-- ========== tables-wrapper start ========== -->
<?= $this->session->flashdata('message') ?>
<div class="tables-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10">Data User</h6>
                <p class="text-sm mb-20 mt-4">
                    Data user yang meregister.
                </p>
                <div class="table-wrapper table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>No</h6>
                                </th>
                                <th>
                                    <h6>Nama</h6>
                                </th>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <th>
                                    <h6>Role</h6>
                                </th>
                                <th>
                                    <h6>User Aktif</h6>
                                </th>
                                <th>
                                    <h6>Created</h6>
                                </th>
                                <th class="text-center">
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($user as $key => $value) { ?>
                            <tr>
                                <td>
                                    <p><?= $no++ ?></p>
                                </td>
                                <td>
                                    <p><?= $value->nama ?></p>
                                </td>
                                <td>
                                    <p><?= $value->email ?></p>
                                </td>
                                <td>
                                    <p><?= $value->role ?></p>
                                </td>
                                <td>

                                    <div class="form-check form-switch toggle-switch mb-30">
                                        <input class="form-check-input" type="checkbox"
                                            <?= $value->user_aktif == '1' ? 'checked' : '' ?> id="toggleSwitch1" />
                                    </div>
                                </td>
                                <td>
                                    <p><?= $value->date_created ?></p>
                                </td>
                                <td class=" text-center">
                                    <p>
                                        <a href="<?= base_url(); ?>" class="text-warning">
                                            <i class="lni lni-pencil-alt ml-2 mr-2"></i>
                                        </a>
                                        <a href="<?= base_url() ?>"
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