<?php
class m_akun
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Fungsi login
    public function login($request)
    {
        $nama_user = $request['nama_user'];
        $password  = $request['password'];

        $query = "SELECT * FROM master.m_akun WHERE nama_user = $1";
        $result = pg_query_params($this->conn, $query, [$nama_user]);
        $row = pg_fetch_assoc($result);

        if ($row !== false && password_verify($password, $row['password'])) {
            return $row; // login berhasil
        }
        return false; // login gagal
    }




    // Fungsi register
    public function addAkun($request) {
    $nama_user   = $request['nama_user'];
    $no_ponsel   = $request['no_ponsel'];
    $gender_user = $request['gender_user'];
    $password    = $request['password'];

    // bikin hash dari password
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO master.m_akun (nama_user, no_ponsel, gender_user, password, created_at)
              VALUES ($1, $2, $3, $4, now())";
    $result = pg_query_params($this->conn, $query, [$nama_user, $no_ponsel, $gender_user, $hash]);

    return $result;
}

}
