<?php

class Teacher extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }
    public function index()
    {
        $data['title'] = 'Halaman Teacher';

        if (isset($_SESSION['user']['id'])) {
            $userId = $_SESSION['user']['id'];
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


    public function editAbsensi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $absensiStatuses = $_POST['status-absensi'];
            $userModel = $this->model('User_model');

            foreach ($absensiStatuses as $id => $status) {
                $userModel->updateAbsensiStatus($id, $status);
            }

            // Flash message or redirect as needed
            Flasher::setFlash("success", "Absensi berasil di buat");
            Redirect::to("/teacher/rekap");
            exit();
        }
    }



    // page rekap
    public function rekap()
    {
        $data['title'] = 'Halaman Rekap Absensi';

        $this->view("templates/header", $data);
        $this->view("teacher/rekap/index");
        $this->view("templates/footer");
    }


    public function print()
    {



        if (isset($_SESSION['user']['id'])) {
            $userId = $_SESSION['user']['id'];
            $userModel = $this->model('User_model');
            $data['absensi'] = $userModel->getAbsensiDetailsByUserId($userId);
        } else {
            $data['absensi'] = [];
        }


        $this->view("teacher/print/index", $data);
    }
}
