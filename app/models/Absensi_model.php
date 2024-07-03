<?php

class Absensi_model
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

    public function getAbsensiTableData()
    {
        $this->db->query("SELECT kelas.nama_kelas, COUNT(absensi.is_user) AS jumlah_siswa
                          FROM $this->absensi
                          LEFT JOIN $this->kelas ON absensi.is_kelas = kelas.id
                          GROUP BY absensi.is_kelas");

        return $this->db->resultAll();
    }

    public function getUnregisteredClasses()
    {
        $this->db->query("SELECT id, nama_kelas FROM $this->kelas WHERE id NOT IN (SELECT DISTINCT is_kelas FROM $this->absensi)");
        return $this->db->resultAll();
    }

    public function getUnregisteredStudents()
    {
        $this->db->query("SELECT id, username FROM $this->user WHERE is_role = 1 AND id NOT IN (SELECT DISTINCT is_user FROM $this->absensi)");
        return $this->db->resultAll();
    }

    public function addAbsensi($data)
    {

        foreach ($data['murid'] as $murid) {

            $this->db->query("INSERT INTO $this->absensi (is_kelas, is_user, absensi, created_at) 
                              VALUES (:is_kelas, :is_user, :absensi, :created_at)");
            $this->db->bind('is_kelas', $data['kelas']);
            $this->db->bind('is_user', $murid);
            $this->db->bind('absensi', 0);
            $this->db->bind('created_at', date('Y-m-d H:i:s'));


            $this->db->execute();
        }

        return count($data['murid']);
    }
}
