<?php
class m_list
{
    // inisialisasi koneksi database
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // query ambil data list anime untuk list page
    public function getAllList()
    {
        $query = "  SELECT m_judul.judul_anime, m_judul.genre_anime, m_author.nama_author, m_list.cover_image
                    FROM master.m_list
                    JOIN master.m_judul ON m_list.id_judul_anime = m_judul.id
                    JOIN master.m_author ON m_list.id_nama_author = m_author.id 
                    WHERE m_judul.deleted_at IS NULL AND m_author.deleted_at IS NULL";
        $result = pg_query($this->conn, $query);
        return $result;
    }

    // query ambil data list anime untuk tabel page
    public function getAllTableList()
    {
        $query = "  SELECT m_list.id, m_judul.id AS id_judul_anime, m_judul.judul_anime, m_judul.genre_anime, m_author.id AS id_nama_author, m_author.nama_author, m_author.gender_author, m_list.cover_image
                    FROM master.m_list
                    JOIN master.m_judul ON m_list.id_judul_anime = m_judul.id
                    JOIN master.m_author ON m_list.id_nama_author = m_author.id
                    WHERE m_list.deleted_at IS NULL 
                    AND m_judul.deleted_at IS NULL 
                    AND m_author.deleted_at IS NULL";
        $result = pg_query($this->conn, $query);
        $listanime = [];
        while ($row = pg_fetch_assoc($result)) {
            $listanime[] = $row;
        }
        return $listanime;
    }

    // query tambah data list
    public function addList($idJudul, $idAuthor, $cover_image)
    {
        $query = " INSERT INTO master.m_list (id_judul_anime, id_nama_author, cover_image, created_at)
            VALUES ($idJudul, $idAuthor, '$cover_image', NOW())
        ";
        return pg_query($this->conn, $query);
    }

    // Ambil data list + relasi judul & author berdasarkan id
    public function getListById($id)
    {
        $query = "SELECT m_list.id, 
                         m_judul.id AS id_judul_anime, m_judul.judul_anime, m_judul.genre_anime,
                         m_author.id AS id_nama_author, m_author.nama_author, m_author.gender_author,
                         m_list.cover_image
                  FROM master.m_list
                  JOIN master.m_judul ON m_list.id_judul_anime = m_judul.id
                  JOIN master.m_author ON m_list.id_nama_author = m_author.id
                  WHERE m_list.id = $id";
        $result = pg_query($this->conn, $query);
        return pg_fetch_assoc($result);
    }

    // query edit data list
    public function editList($id, $cover_image)
    {
        $query = "UPDATE master.m_list 
              SET cover_image = '" . pg_escape_string($this->conn, $cover_image) . "'
              WHERE id = $id";
        return pg_query($this->conn, $query);
    }

    // query hapus data list
    public function hapusList($id)
    {
        $query = "UPDATE master.m_list SET deleted_at=NOW() WHERE id=$id";
        return pg_query($this->conn, $query);
    }

    // query top 3 
    public function getTopAnime($limit = 3)
{
    $query = "SELECT j.judul_anime, j.genre_anime, a.nama_author, l.cover_image
              FROM master.m_list l
              JOIN master.m_judul j ON l.id_judul_anime = j.id
              JOIN master.m_author a ON l.id_nama_author = a.id
              WHERE j.deleted_at IS NULL AND a.deleted_at IS NULL
              ORDER BY l.id ASC
              LIMIT $1";
    $result = pg_query_params($this->conn, $query, [$limit]);
    return pg_fetch_all($result);
}

}
