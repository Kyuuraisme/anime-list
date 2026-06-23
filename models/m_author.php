<?php
class m_author
{
    // inisialisasi koneksi database
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // query ambil data penulis
    public function getAllAuthors()
    {
        $query = "SELECT * FROM master.m_author WHERE deleted_at IS NULL";
        $result = pg_query($this->conn, $query);
        $listauthors = [];
        while ($row = pg_fetch_assoc($result)) {
            $listauthors[] = $row;
        }
        return $listauthors;
    }

    // query tambah data judul
    public function addAuthor($request)
    {
        $nama_author = $request['nama_author'];
        $gender_author = $request['gender_author'];

        $query = "INSERT INTO master.m_author (nama_author, gender_author, created_at) VALUES ('$nama_author', '$gender_author', NOW()) RETURNING ID";
        $result = pg_query($this->conn, $query);
        $row = pg_fetch_assoc($result);
        return $row['id'];
    }

    // query edit data judul
    public function editAuthor($id, $request)
    {
        $nama_author = $request['nama_author'];
        $gender_author = $request['gender_author'];

        $query = "UPDATE master.m_author SET nama_author = '" . pg_escape_string($this->conn, $nama_author) . "',gender_author = '" . pg_escape_string($this->conn, $gender_author) . "'WHERE id = $id";
        return pg_query($this->conn, $query);
    }

    // query hapus data judul
    public function hapusAuthor($id)
    {
        $query = "UPDATE master.m_author SET deleted_at=NOW() WHERE id=$id";
        return pg_query($this->conn, $query);
    }
}
