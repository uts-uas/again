<?php

class Kelas_model
{
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


    // kelas
    public function countAllKelas()
    {
        $this->db->query("SELECT * FROM $this->kelas");
        return $this->db->rowCount();
    }

    public function getAllKelas()
    {
        $this->db->query("SELECT * FROM $this->kelas");
        return $this->db->resultAll();
    }
}
