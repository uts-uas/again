<?php

class Student extends Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Student';

        $this->view("templates/header", $data);
        $this->view("student/index");
        $this->view("templates/footer");
    }
}
