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
                        Add Teacher
                    </button>

                    <?php Flasher::flash() ?>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Guru</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Guru</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Guru</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data['guru'] as $teacher) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $teacher['username'] ?></td>
                                                <td> <?php
                                                        if (!empty($teacher['nama_kelas'])) {
                                                            echo $teacher['nama_kelas'];
                                                        } else {
                                                            echo "Belum punya kelas";
                                                        }
                                                        ?></td>
                                                <td>
                                                    <?= $teacher['is_active'] == 0 ?
                                                        '<span class="badge badge-pill badge-success">Active</span>' :
                                                        '<span class="badge badge-pill badge-danger">Non Active</span>'
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="btn btn-warning" data-toggle="modal" data-target="#editModalStudent<?= $teacher['id'] ?>">
                                                        <i class="fas fa-pen-square"></i>
                                                    </div>
                                                    <form action="<?= BURL ?>/admin/deleteGuru/<?= $teacher['id'] ?>" method="post" class="d-inline">
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus guru ini?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
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
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- modal add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BURL ?>/admin/addGuru" method="POST">
                        <div>
                            <label for="username">Username</label>
                            <input type="text" class="form-control" placeholder="Masukan username guru" name="username" required>
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

    <?php foreach ($data['guru'] as $teacher) : ?>
        <!-- edit modal -->
        <div class="modal fade" id="editModalStudent<?= $teacher['id'] ?>" tabindex="-1" aria-labelledby="editModalStudentLabel<?= $teacher['id'] ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalStudentLabel<?= $teacher['id'] ?>">Edit Murid</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BURL ?>/admin/editGuru" method="POST">
                            <input type="hidden" id="edit-id" name="id" value="<?= $teacher['id'] ?>">
                            <div>
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="edit-username" name="username" value="<?= $teacher['username'] ?>" required>
                            </div>
                            <div class="my-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="edit-password" name="password" value="<?= $teacher['password'] ?>" required>
                            </div>
                            <div class="my-3">
                                <label for="is_active">Status</label>
                                <select name="is_active" id="edit-is_active" class="form-control">
                                    <option value="0" <?= $teacher['is_active'] == 0 ? 'selected' : '' ?>>Active</option>
                                    <option value="1" <?= $teacher['is_active'] == 1 ? 'selected' : '' ?>>Non Active</option>
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