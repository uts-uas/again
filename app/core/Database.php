<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db";
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function getLastInsertedId()
    {
        return $this->dbh->lastInsertId();
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function execute()
    {
        if ($this->stmt) {
            $this->stmt->execute();
        } else {
            throw new Exception("Statement is null. Call query() before execute().");
        }
    }

    public function resultAll()
    {
        if ($this->stmt) {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }

    public function result()
    {
        if ($this->stmt) {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function rowCount()
    {
        if ($this->stmt) {
            $this->execute();
            return $this->stmt->rowCount();
        }
        return 0;
    }

    public function single()
    {
        if ($this->stmt) {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
}
