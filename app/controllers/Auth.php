<?php

class Auth extends Controller
{
    public function index()
    {
        $data['title'] = 'Halamaan Login';

        $this->view("templates/header", $data);
        $this->view("auth/index", $data);
        $this->view("templates/footer");
    }

    public function login()
    {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            Flasher::setFlash("danger", "Masukkan username dan password terlebih dahulu");
            Redirect::to("/auth");
            return;
        }

        if ($this->model("User_model")->authByUsername($_POST) > 0) {
            $user = $this->model("User_model")->getUserByUsername($_POST);
            if ($user) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'is_role' => $user['is_role'],
                    'login' => true,
                ];

                Flasher::setFlash("success", "Login berhasil");
                if ($user['is_role'] == '0') {
                    Redirect::to("/admin");
                } else if ($user['is_role'] == "2") {
                    Redirect::to("/teacher");
                } else {
                    Redirect::to("/student");
                }
            } else {
                Flasher::setFlash("danger", "Username tidak ditemukan");
                Redirect::to("/auth");
            }
        } else {
            Flasher::setFlash("danger", "Password atau username salah");
            Redirect::to("/auth");
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        Redirect::to("/auth");
    }
}
