<?php

class Teacher extends Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Teacher';

        if (isset($_SESSION['user']['id'])) {
            $userId = $_SESSION['user']['id']; // Ambil user_id dari sesi
            $userModel = $this->model('User_model');
            $data['kelas'] = $userModel->getKelasByUserId($userId);
            $data['total_absensi'] = $userModel->countAbsensiByUserId($userId)['total_absensi'];
        } else {
            $data['kelas'] = null;
            $data['total_absensi'] = 0;
        }

        $this->view("templates/header", $data);
        $this->view("teacher/index", $data);
        $this->view("templates/footer");
    }
    // page absensi
    public function absensi()
    {
        $data['title'] = 'Halaman Absensi';

        if (isset($_SESSION['user']['id'])) {
            $userId = $_SESSION['user']['id'];
            $userModel = $this->model('User_model');
            $data['absensi'] = $userModel->getAbsensiDetailsByUserId($userId);
        } else {
            $data['absensi'] = [];
        }

        $this->view("templates/header", $data);
        $this->view("teacher/absensi/index", $data);
        $this->view("templates/footer");
    }


    // page rekap
    public function rekap()
    {
        $data['title'] = 'Halaman Rekap Absensi';

        $this->view("templates/header", $data);
        $this->view("teacher/rekap/index");
        $this->view("templates/footer");
    }
}
