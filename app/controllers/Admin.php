<?php

class Admin extends Controller
{

    public function index()
    {
        $data['title'] = 'Halaman Admin';

        $this->view("templates/header", $data);
        $this->view("admin/index");
        $this->view("templates/footer");
    }

    // page guru
    public function guru()
    {
        $data['title'] = 'Halaman guru';

        $this->view("templates/header", $data);
        $this->view("admin/guru/index");
        $this->view("templates/footer");
    }

    // page kelas
    public function kelas()
    {
        $data['title'] = 'Halaman Kelas';

        $this->view("templates/header", $data);
        $this->view("admin/kelas/index");
        $this->view("templates/footer");
    }

    // page murid
    public function murid()
    {
        $data['title'] = 'Halaman guru';

        $this->view("templates/header", $data);
        $this->view("admin/murid/index");
        $this->view("templates/footer");
    }
}
