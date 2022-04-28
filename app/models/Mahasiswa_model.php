<?php

class Mahasiswa_model
{

    // data handler
    private $dbh;
    // statement
    private $stmt;

    // https://www.phptutorial.net/php-pdo/
    public function __construct()
    {
        // data source name
        $dsn = "mysql:host=localhost;dbname=phpdasar";

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    // private $mhs = [
    //     [
    //         "nama" => "Hendri",
    //         "nim" => "1101",
    //         "email" => "hendri@mail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Akbar",
    //         "nim" => "1102",
    //         "email" => "akbar@mail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ]
    // ];

    // public function getAllMahasiswa()
    // {
    //     return $this->mhs;
    // }
}
