<?php
class m_akun {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Fungsi login
    public function login($request) {
        $nama_user = $request['nama_user'];
        $password = $request['password'];

        // Query pakai parameter biar aman dari SQL injection
        $query = "SELECT * FROM master.m_akun WHERE nama_user = $1 AND password = $2";
        $result = pg_query_params($this->conn, $query, [$nama_user, $password]);

        // Ambil hasil
        $row = pg_fetch_assoc($result);
        return $row; // kalau null berarti login gagal
    }

    // Fungsi register
    public function addAkun($request) {
        $nama_user = $request['nama_user'];
        $no_ponsel = $request['no_ponsel'];
        $gender_user = $request['gender_user'];
        $password = $request['password'];

        $query = "INSERT INTO master.m_akun (nama_user, no_ponsel, gender_user, password, created_at)
                  VALUES ($1, $2, $3, $4, now())";
        $result = pg_query_params($this->conn, $query, [$nama_user, $no_ponsel, $gender_user, $password]);

        return $result;
    }
}
?>
