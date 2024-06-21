<?php

class About extends Controller
{
    public function index($nama = "rafi", $cita = "mao")
    {
        $data['title'] = "Halaman About";
        $data['nama'] = $nama;
        $data["cita"] = $cita;

        $this->view("templates/header", $data);
        $this->view("about/index", $data);
        $this->view("templates/footer");
    }

    public function page()
    {
        $data['judul'] = 'Halaman page about';

        $this->view("templates/header", $data);
        $this->view("about/page");
        $this->view("templates/footer");
    }
}
