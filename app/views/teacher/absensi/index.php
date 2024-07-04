<!-- views/teacher/absensi/index.php -->

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
                    <?php Flasher::flash(); ?>

                    <!-- DataTales Example -->
                    <form action="<?= BURL ?>/teacher/editAbsensi" method="post">
                        <!-- Tabel absensi -->
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data['absensi'])) : ?>
                                    <?php foreach ($data['absensi'] as $index => $absensi) : ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $absensi['username'] ?></td>
                                            <td><?= $absensi['nama_kelas'] ?></td>
                                            <td>
                                                <select name="status-absensi[<?= $absensi['id'] ?>]" class="form-control">
                                                    <option value="0" <?= isset($absensi['absensi']) && $absensi['absensi'] == 0 ? 'selected' : '' ?>>ALFA</option>
                                                    <option value="1" <?= isset($absensi['absensi']) && $absensi['absensi'] == 1 ? 'selected' : '' ?>>HADIR</option>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data absensi</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Update Absensi</button>
                    </form>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>