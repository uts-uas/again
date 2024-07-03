<!-- app/views/admin/absensi/index.php -->

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
                        Add Absensi
                    </button>

                    <?php Flasher::flash() ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Absensi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kelas</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kelas</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data['absensi'] as $absensi) : ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $absensi['nama_kelas'] ?></td>
                                                <td><?= $absensi['jumlah_siswa']; ?></td>
                                                <td>
                                                    <a href="" class="btn btn-warning">
                                                        <i class="fas fa-pen-square"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
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

            <!-- Add Kelas Absensi -->
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
                            <form action="<?= BURL ?>/admin/addAbsensi" method="POST">
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-control">
                                        <option value="" hidden>Pilih murid</option>
                                        <?php foreach ($data['noregisclass'] as $kelas) : ?>
                                            <option value="<?= $kelas['id']; ?>"><?= $kelas['nama_kelas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="murid">Pilih murid</label>
                                    <select name="murid[]" id="murid" class="form-control" multiple>
                                        <option value="" hidden>Pilih murid</option>
                                        <?php foreach ($data['noregisstudent'] as $murid) : ?>
                                            <option value="<?= $murid['id']; ?>"><?= $murid['username']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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

</body>