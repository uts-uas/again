<?php

class Teacher extends Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Teacher';

        $this->view("templates/header", $data);
        $this->view("teacher/index");
        $this->view("templates/footer");
    }

    // page absensi
    public function absensi()
    {
        $data['title'] = 'Halaman Absensi';

        $this->view("templates/header", $data);
        $this->view("teacher/absensi/index");
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
