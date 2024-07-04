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
                        Add Kelas
                    </button>

                    <?php Flasher::flash() ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Kelas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kelas</th>
                                            <th>Nama Guru</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kelas</th>
                                            <th>Nama Guru</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data['kelas'] as $kelas) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $kelas['nama_kelas'] ?></td>
                                                <td><?= $kelas['username'] ?></td>
                                                <td><?= $kelas['jumlah_is_user'] ?></td>
                                                <td>
                                                    <div class="btn btn-warning" data-toggle="modal" data-target="#editModalKelas<?= $kelas['id'] ?>">
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

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Absensi Kelas</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Add Kelas Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BURL ?>/admin/addKelas" method="POST">
                        <div class="form-group">
                            <label for="namaKelas">Nama Kelas</label>
                            <input type="text" class="form-control" name="kelas" id="namaKelas" required>
                        </div>
                        <div class="form-group">
                            <label for="guruPengampu">Guru Pengampu</label>
                            <select name="guru-pengampu" id="guruPengampu" class="form-control" required>
                                <?php if (empty($data['usersRoleTwo'])) : ?>
                                    <option disabled>Tidak ada guru yang belum terhubung ke kelas</option>
                                <?php else : ?>
                                    <option value="" hidden>Pilih Guru pengampu</option>
                                    <?php foreach ($data['usersRoleTwo'] as $user) : ?>
                                        <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
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

    <!-- Edit Kelas Modals -->
    <?php foreach ($data['kelas'] as $kelas) : ?>
        <div class="modal fade" id="editModalKelas<?= $kelas['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $kelas['id'] ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?= $kelas['id'] ?>">Edit Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BURL ?>/admin/editKelas" method="POST">
                            <input type="hidden" name="id" value="<?= $kelas['id'] ?>">
                            <div class="form-group">
                                <label for="editNamaKelas<?= $kelas['id'] ?>">Nama Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="editNamaKelas<?= $kelas['id'] ?>" value="<?= $kelas['nama_kelas'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="editGuruPengampu<?= $kelas['id'] ?>">Guru Pengampu</label>
                                <select name="guru-pengampu" id="editGuruPengampu<?= $kelas['id'] ?>" class="form-control" required>
                                    <?php if (empty($data['usersRoleTwo'])) : ?>
                                        <option disabled>Tidak ada guru yang belum terhubung ke kelas</option>
                                    <?php else : ?>
                                        <option value="" hidden>Pilih Guru pengampu</option>
                                        <?php foreach ($data['usersRoleTwo'] as $user) : ?>
                                            <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
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
    <?php endforeach; ?>

</body>