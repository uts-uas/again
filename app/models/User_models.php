<?php

class User_models
{
    private $absensi = 'absensi';
    private $kelas = 'kelas';
    private $user = 'user';


    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLastInsertedId()
    {
        $this->db->getLastInsertedId();
    }

    // login
}
