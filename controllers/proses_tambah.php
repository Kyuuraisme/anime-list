<?php
// memanggil koneksi database dan class
require_once dirname(__DIR__) . '/helpers/config.php';
require_once dirname(__DIR__) . '/models/m_judul.php';
require_once dirname(__DIR__) . '/models/m_author.php';
require_once dirname(__DIR__) . '/models/m_list.php';

// Tambah Data Judul
if (!empty($_POST['judul_anime'])) {
    $judul = new m_judul($conn);
    $idJudul = $judul->addJudul($_POST);
}

// Tambah Data Author
if (!empty($_POST['nama_author'])) {
    $author = new m_author($conn);
    $idAuthor = $author->addAuthor($_POST);
}

// Tambah Data List
if (!empty($idJudul) && !empty($idAuthor) && !empty($_POST['nama_author']) && !empty($_POST['gender_author']) && !empty($_POST['cover_image'])) {
    $list = new m_list($conn);
    $list->addList($idJudul, $idAuthor, $_POST['cover_image']);
}



// Redirect ke page tabel
header("Location: ../index.php?page=pages.tabel");
exit;
