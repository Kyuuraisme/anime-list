<?php
require_once dirname(__DIR__) . '/helpers/config.php';
require_once dirname(__DIR__) . '/models/m_judul.php';
require_once dirname(__DIR__) . '/models/m_author.php';
require_once dirname(__DIR__) . '/models/m_list.php';

$idList   = $_GET['id_list'] ?? null;
$idJudul  = $_GET['id_judul_anime'] ?? null;
$idAuthor = $_GET['id_nama_author'] ?? null;

$list   = new m_list($conn);
$judul  = new m_judul($conn);
$author = new m_author($conn);

if ($idList)   $list->hapusList($idList);
if ($idJudul)  $judul->hapusJudul($idJudul);
if ($idAuthor) $author->hapusAuthor($idAuthor);

header("Location: ../index.php?page=pages.tabel");
exit;
?>
