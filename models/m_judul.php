<?php
class m_judul
{
    // inisialisasi koneksi database
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // query ambil data judul
    public function getAllJudul()
    {
        $query = "SELECT * FROM master.m_judul WHERE deleted_at IS NULL";
        $result = pg_query($this->conn, $query);
        $listjudul = [];
        while ($row = pg_fetch_assoc($result)) {
            $listjudul[] = $row;
        }
        return $listjudul;
    }

    // query tambah data judul
    public function addJudul($request)
    {
        $judul_anime = $request['judul_anime'];
        $genre_anime = $request['genre_anime'];

        $query = "INSERT INTO master.m_judul (judul_anime, genre_anime, created_at) VALUES ('$judul_anime', '$genre_anime', NOW()) RETURNING ID";
        $result = pg_query($this->conn, $query);
        $row = pg_fetch_assoc($result);
        return $row['id'];
    }

    // query edit data judul
    public function editJudul($id, $request)
    {
        $judul_anime = $request['judul_anime'];
        $genre_anime = $request['genre_anime'];

        $query = "UPDATE master.m_judul SET judul_anime = '" . pg_escape_string($this->conn, $judul_anime) . "',genre_anime = '" . pg_escape_string($this->conn, $genre_anime) . "' WHERE id = $id";
        return pg_query($this->conn, $query);
    }


    // query hapus data judul
    public function hapusJudul($id)
    {
        $query = "UPDATE master.m_judul SET deleted_at=NOW() WHERE id=$id";
        return pg_query($this->conn, $query);
    }
}
