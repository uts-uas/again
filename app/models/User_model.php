<?php

class User_model
{
    private $role = 'role';
    private $absensi = 'absensi';
    private $user = 'user';
    private $kelas = 'kelas';


    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLastInsertedId()
    {
        return $this->db->getLastInsertedId();
    }
    // Login
    public function authByUsername($data)
    {
        $this->db->query("SELECT * FROM $this->user WHERE username = :username AND password = :password");
        $this->db->bind("username", $data['username']); // $data['username'] = ['username'] ambil dari nama input yg ada di file
        $this->db->bind("password", $data['password']);

        return $this->db->rowCount();
    }

    public function getUserByUsername($data)
    {
        $this->db->query("SELECT * FROM $this->user WHERE username = :username");
        $this->db->bind("username", $data['username']);

        return $this->db->result();
    }
    // End Login

    //student
    public function countAllStudent()
    {
        $this->db->query("SELECT * FROM $this->user where is_role = 1");
        return $this->db->rowCount();
    }

    public function getAllStudent()
    {
        $this->db->query("SELECT user.*, kelas.nama_kelas 
                      FROM $this->user 
                      LEFT JOIN absensi ON user.id = absensi.is_user 
                      LEFT JOIN kelas ON absensi.is_kelas = kelas.id 
                      WHERE user.is_role = 1");
        return $this->db->resultAll();
    }

    public function addMurid($data)
    {
        $query = "INSERT INTO $this->user (username, password, is_role, is_active) VALUES (:username, :password, :is_role, :is_active)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('is_role', 1);
        $this->db->bind('is_active', 0);

        return $this->db->rowCount();
    }

    // teacher
    public function countAllTeacher()
    {
        $this->db->query("SELECT * FROM $this->user where is_role = 1");
        return $this->db->rowCount();
    }

    public function getAllTeacher()
    {
        $this->db->query("SELECT user.*, kelas.nama_kelas 
                      FROM $this->user 
                      LEFT JOIN $this->kelas ON user.id = kelas.is_user
                      WHERE user.is_role = 2");
        return $this->db->resultAll();
    }
    public function addTeacher($data)
    {
        $query = "INSERT INTO $this->user (username, password, is_role, is_active) VALUES (:username, :password, :is_role, :is_active)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('is_role', 2); // Set is_role to 2
        $this->db->bind('is_active', 0); // Set is_active to 0

        return $this->db->rowCount();
    }
}
