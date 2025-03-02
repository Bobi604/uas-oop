<?php
require_once('lib/Database.php');

class Mahasiswa
{
    public $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function add($data)
    {
        // # $mysql = new mysqli($this->db->host, $this->db->user, $this->db->pass, $this->db->db);
        $nim = $data['nim'];
        $nama = $data['nama'];
        $email = $data['email'];
        $gender = $data['gender'];
        $query = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$email', '$gender')";
        // # $mysql->query($query);
        $this->db->insert($query);
    }
    function show()
    {
        $query = "SELECT * FROM mahasiswa";
        return $this->db->select($query);
    }
    function destroy($nim)
    {
        $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
        $this->db->delete($query);
    }
    function edit($nim, $data)
    {
        $nama = $data['nama'];
        $email = $data['email'];
        $gender = $data['gender'];
        $query = "UPDATE mahasiswa SET nama = '$nama', email = '$email', gender = '$gender' WHERE nim = '$nim'";
        return $this->db->update($query);
    }
}
