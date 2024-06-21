<?php

class Auth extends Controller
{
    public function login()
    {
        $data['title'] = 'Halaman Login';

        $this->view("templates/header");
        $this->view("auth/login");
        $this->view("templates/footer");
    }

    public function register()
    {
        $data['title'] = 'Halaman Register';

        $this->view("templates/header");
        $this->view("auth/register");
        $this->view("templates/footer");
    }
}
