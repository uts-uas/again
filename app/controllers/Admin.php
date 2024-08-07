<?php

class Admin extends Controller
{

    protected $fixedData;

    public function __construct()
    {
        Middleware::auth();
    }

    public function setFixedData()
    {
        $this->fixedData = [
            'totalStudent' => $this->model("User_model")->countAllStudent(),
            'totalTeacher' => $this->model("User_model")->countAllTeacher(),
            'totalKelas' => $this->model("Kelas_model")->countAllKelas(),
        ];

        return $this->fixedData;
    }

    public function index()
    {
        $data['title'] = 'Halaman Admin';

        $this->view("templates/header", $data);
        $this->view("admin/index",  $data, $this->setFixedData());
        $this->view("templates/footer");
    }

    // page guru
    public function guru()
    {
        $data = [
            'title' => 'Halaman Guru',
            'guru' => $this->model("User_model")->getAllTeacher(),
        ];

        $this->view("templates/header", $data);
        $this->view("admin/guru/index", $data);
        $this->view("templates/footer");
    }

    public function addGuru()
    {
        if ($this->model("User_model")->addTeacher($_POST) > 0) {
            Flasher::setFlash("success", "Guru berhasil ditambahkan");
            Redirect::to("/admin/guru");
        } else {
            Flasher::setFlash("danger", "Guru gagal ditambahkan");
            Redirect::to("/admin/guru");
        }
    }

    public function editGuru()
    {
        if ($this->model("User_model")->editTeacher($_POST) > 0) {
            Flasher::setFlash("success", "guru berhasil diupdate");
            Redirect::to("/admin/guru");
        } else {
            Flasher::setFlash("danger", "guru gagal diupdate");
            Redirect::to("/admin/guru");
        }
    }

    public function deleteGuru($id)
    {
        $userModel = $this->model("User_model");

        $deleted = $userModel->deleteGuru($id);

        if ($deleted > 0) {
            Flasher::setFlash("success", "berhasil menghapus guru");
        } else {
            Flasher::setFlash("success", "berhasil menghapus guru");
        }

        Redirect::to("/admin/guru");
    }




    // page kelas
    public function kelas()
    {
        $data = [
            'title' => 'Halaman Kelas',
            'kelas' => $this->model("Kelas_model")->getAllKelas(),
            'usersRoleTwo' => $this->model("Kelas_model")->getUsersWithRoleTwoNotInKelas(),
        ];

        $this->view("templates/header", $data);
        $this->view("admin/kelas/index", $data);
        $this->view("templates/footer");
    }

    public function addKelas()
    {
        if ($this->model("Kelas_model")->addKelas($_POST) > 0) {
            Flasher::setFlash("success", "Kelas berhasil ditambahkan");
            Redirect::to("/admin/kelas");
        } else {
            Flasher::setFlash("danger", "Kelas gagal ditambahkan");
            Redirect::to("/admin/kelas");
        }
    }

    public function editKelas()
    {
        if ($this->model("Kelas_model")->editKelas($_POST) > 0) {
            Flasher::setFlash("success", "Kelas berhasil diupdate");
            Redirect::to("/admin/kelas");
        } else {
            Flasher::setFlash("danger", "Kelas gagal diupdate");
            Redirect::to("/admin/kelas");
        }
    }


    // page murid
    public function murid()
    {
        $data = [
            'title' => 'Halaman Murid',
            'siswa' => $this->model("User_model")->getAllStudent(),
        ];

        $this->view("templates/header", $data);
        $this->view("admin/murid/index", $data);
        $this->view("templates/footer");
    }

    public function addMurid()
    {
        if ($this->model("User_model")->addMurid($_POST) > 0) {
            Flasher::setFlash("success", "murid berhasil ditambahkan");
            Redirect::to("/admin/murid");
        } else {
            Flasher::setFlash("danger", "murid gagal ditambahkan");
            Redirect::to("/admin/murid");
        }
    }

    public function editMurid()
    {
        if ($this->model("User_model")->editMurid($_POST) > 0) {
            Flasher::setFlash("success", "Murid berhasil diupdate");
            Redirect::to("/admin/murid");
        } else {
            Flasher::setFlash("danger", "Murid gagal diupdate");
            Redirect::to("/admin/murid");
        }
    }

    public function deleteMurid($id)
    {
        $userModel = $this->model("User_model");

        // Hapus murid berdasarkan ID
        $deleted = $userModel->deleteMurid($id);

        if ($deleted > 0) {
            Flasher::setFlash("success", "Murid berhasil dihapus");
        } else {
            Flasher::setFlash("danger", "Gagal menghapus murid");
        }

        Redirect::to("/admin/murid");
    }

    // page absensi
    public function absensi()
    {
        $data = [
            'title' => 'Halaman Absensi',
            'absensi' => $this->model("Absensi_model")->getAbsensiTableData(),
            'noregisclass' => $this->model("Absensi_model")->getUnregisteredClasses(),
            'noregisstudent' => $this->model("Absensi_model")->getUnregisteredStudents(),
        ];

        $this->view("templates/header", $data);
        $this->view("admin/absensi/index", $data);
        $this->view("templates/footer");
    }

    public function addAbsensi()
    {
        if ($this->model("Absensi_model")->addAbsensi($_POST) > 0) {
            Flasher::setFlash("success", "absensi berhasil ditambahkan");
            Redirect::to("/admin/absensi");
        } else {
            Flasher::setFlash("danger", "absensi gagal ditambahkan");
            Redirect::to("/admin/absensi");
        }
    }
}
