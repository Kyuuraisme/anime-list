<?php
// memanggil koneksi database dan class
require_once dirname(__DIR__) . '/helpers/config.php';
require_once dirname(__DIR__) . '/models/m_judul.php';
require_once dirname(__DIR__) . '/models/m_author.php';
require_once dirname(__DIR__) . '/models/m_list.php';

$listModel = new m_list($conn);

// tampilkan form edit
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $row = $listModel->getListById($_GET['id']);
?>
    <form method="POST" action="" class="mb-4 mt-4">
        <!-- Hidden Input -->
        <input type="hidden" name="id_list" value="<?= $row['id']; ?>">

        <!-- Input Edit Data -->
        <input type="hidden" name="id_judul_anime" value="<?= $row['id_judul_anime']; ?>">
        <input type="hidden" name="id_nama_author" value="<?= $row['id_nama_author']; ?>">

        <label>Judul Anime:</label>
        <input type="text" name="judul_anime" value="<?= $row['judul_anime']; ?>">

        <label>Genre Anime:</label>
        <input type="text" name="genre_anime" value="<?= $row['genre_anime']; ?>">

        <label>Nama Author:</label>
        <input type="text" name="nama_author" value="<?= $row['nama_author']; ?>">

        <label>Gender:</label>
        <select name="gender_author">
            <option value="Pria" <?= $row['gender_author'] == "Pria" ? "selected" : ""; ?>>Pria</option>
            <option value="Wanita" <?= $row['gender_author'] == "Wanita" ? "selected" : ""; ?>>Wanita</option>
            <option value="Tak Dipublikasi" <?= $row['gender_author'] == "Tak Dipublikasi" ? "selected" : ""; ?>>Tak Dipublikasi</option>
        </select>

        <label>Cover:</label>
        <input type="text" name="cover_image" value="<?= $row['cover_image']; ?>">

        <button type="submit">Update</button>
    </form>
<?php
    exit;
}

// proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idJudul  = $_POST['id_judul_anime'];
    $idAuthor = $_POST['id_nama_author'];
    $idList   = $_POST['id_list'];

    // Update judul
    if (!empty($_POST['judul_anime']) && !empty($_POST['genre_anime'])) {
        $judul = new m_judul($conn);
        $judul->editJudul($idJudul, $_POST);
    }

    // Update author
    if (!empty($_POST['nama_author']) && !empty($_POST['gender_author'])) {
        $author = new m_author($conn);
        $author->editAuthor($idAuthor, $_POST);
    }

    // Update list (cover image)
    if (!empty($_POST['cover_image'])) {
        $listModel->editList($idList, $_POST['cover_image']);
    }

    header("Location: ../index.php?page=pages.tabel");
    exit;
}
?>