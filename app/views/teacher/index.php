<body id="page-top">
    <div id="wrapper">
        <?php require_once("partikels/sidebar.php") ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php require_once("partikels/topbar.php") ?>
                <div class="container-fluid">

                    <?php Flasher::flash() ?>

                    <div class="card my-3">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <i class="fas fa-warehouse fa-3x mr-3"></i>
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Kelas
                                    </div>
                                    <div class="text-lg mb-0 font-weight-bold text-gray-800">
                                        <?php if ($data['kelas']) : ?>
                                            <?= $data['kelas']['nama_kelas'] ?>
                                        <?php else : ?>
                                            Belum ada kelas
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <i class="fas fa-user fa-3x mr-2"></i>
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Jumlah Siswa
                                    </div>
                                    <div class="text-lg mb-0 font-weight-bold text-gray-800">
                                        <?= $data['total_absensi'] ?>
                                    </div>
                                </div>
                                <!-- Other contents -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>