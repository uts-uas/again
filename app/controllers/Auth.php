<?php

class Auth extends Controller
{
    public function index()
    {
        $data['title'] = 'Halamaan Login';

        $data['name'] = $this->model('User_model')->getUsername();

        $this->view("templates/header", $data);
        $this->view("auth/index", $data);
        $this->view("templates/footer");
    }
}
