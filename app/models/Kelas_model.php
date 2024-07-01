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
}
