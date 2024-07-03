<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once(__DIR__ . "/../partikels/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once(__DIR__ . "/../partikels/topbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                        Add Student
                    </button>

                    <?php Flasher::flash() ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Murid</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data['siswa'] as $siswa) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $siswa['username'] ?></td>
                                                <td><?= !empty($siswa['nama_kelas']) ? $siswa['nama_kelas'] : 'Belum memiliki kelas' ?></td>
                                                <td>
                                                    <?= $siswa['is_active'] == 0 ?
                                                        '<span class="badge badge-pill badge-success">Active</span>' :
                                                        '<span class="badge badge-pill badge-danger">Non Active</span>'
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="btn btn-warning" data-toggle="modal" data-target="#editModalStudent<?= $siswa['id'] ?>">
                                                        <i class="fas fa-pen-square"></i>
                                                    </div>
                                                    <div class="btn btn-danger">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- add modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Murid</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BURL ?>/admin/addMurid" method="POST">
                                <div>
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" placeholder="Masukan username murid" name="username" required>
                                </div>

                                <div class="my-3">
                                    <label for="password" class="">Password</label>
                                    <input type="password" class="form-control" placeholder="Masukan password" name="password" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Save changes" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ($data['siswa'] as $siswa) : ?>
                <!-- edit modal -->
                <div class="modal fade" id="editModalStudent<?= $siswa['id'] ?>" tabindex="-1" aria-labelledby="editModalStudentLabel<?= $siswa['id'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalStudentLabel<?= $siswa['id'] ?>">Edit Murid</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= BURL ?>/admin/editMurid" method="POST">
                                    <input type="hidden" id="edit-id" name="id" value="<?= $siswa['id'] ?>">
                                    <div>
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="edit-username" name="username" value="<?= $siswa['username'] ?>" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="edit-password" name="password" value="<?= $siswa['password'] ?>" required>
                                    </div>
                                    <div class="my-3">
                                        <label for="is_active">Status</label>
                                        <select name="is_active" id="edit-is_active" class="form-control">
                                            <option value="0" <?= $siswa['is_active'] == 0 ? 'selected' : '' ?>>Active</option>
                                            <option value="1" <?= $siswa['is_active'] == 1 ? 'selected' : '' ?>>Non Active</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Save changes">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
</body>