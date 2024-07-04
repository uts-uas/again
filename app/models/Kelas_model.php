<?php

class Kelas_model
{
    private $kelas = 'kelas';
    private $user = 'user';
    private $absensi = 'absensi';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLastInsertedId()
    {
        return $this->db->getLastInsertedId();
    }


    // kelas
    public function countAllKelas()
    {
        $this->db->query("SELECT * FROM $this->kelas");
        return $this->db->rowCount();
    }

    public function getAllKelas()
    {
        $this->db->query("SELECT kelas.id, kelas.nama_kelas, user.username, COUNT(absensi.is_user) as jumlah_is_user
                      FROM $this->kelas 
                      LEFT JOIN $this->user ON kelas.is_user = user.id
                      LEFT JOIN $this->absensi ON kelas.id = absensi.is_kelas
                      GROUP BY kelas.id, kelas.nama_kelas, user.username");
        return $this->db->resultAll();
    }

    public function getUsersWithRoleTwoNotInKelas()
    {
        $this->db->query("SELECT id, username FROM $this->user WHERE is_role = 2 AND id NOT IN (SELECT is_user FROM $this->kelas)");
        return $this->db->resultAll();
    }



    public function addKelas($data)
    {

        $this->db->query("INSERT INTO $this->kelas (nama_kelas, is_user) VALUES (:nama_kelas, :guru_pengampu)");
        $this->db->bind('nama_kelas', $data['kelas']);
        $this->db->bind('guru_pengampu', $data['guru-pengampu']);

        return $this->db->rowCount();
    }

    public function editKelas($data)
    {
        $query = "UPDATE $this->kelas SET nama_kelas = :nama_kelas, is_user = :is_user WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_kelas', $data['kelas']);
        $this->db->bind('is_user', $data['guru-pengampu']);
        return $this->db->rowCount();
    }
}
