<?php

// memanggil class dari models
include './helpers/config.php';
include './models/m_judul.php';
include './models/m_author.php';
include './models/m_list.php';

$judul = new m_judul($conn);
$listjudul = $judul->getAllJudul();

$author = new m_author($conn);
$listauthor = $author->getAllAuthors();

$list = new m_list($conn);
$listanime = $list->getAllTableList();
?>

<!-- title -->
<div class="text-3xl font-bold">Tabel</div>

<!--Data List Anime  -->
<div class="container mx-auto p-4 m-2">
    <div class="text-3xl font-bold">Tambah List Anime</div>

    <!-- Input -->
    <form method="POST" action="./controllers/proses_tambah.php" class="mb-4 mt-4">
        <div class="mb-4">
            <label for="judul_anime" class="block text-gray-700 font-bold mb-2">Judul Anime:</label>
            <input type="text" id="judul_anime" name="judul_anime" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="genre_anime" class="block text-gray-700 font-bold mb-2">Genre Anime:</label>
            <input type="text" id="genre_anime" name="genre_anime" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="nama_author" class="block text-gray-700 font-bold mb-2">Nama Author:</label>
            <input type="text" id="nama_author" name="nama_author" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="gender_author" class="block text-gray-700 font-bold mb-2">Gender:</label>
            <select id="gender_author" name="gender_author" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="">Pilih Gender</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
                <option value="Tak Dipublikasi">Tak Dipublikasi</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="cover_image" class="block text-gray-700 font-bold mb-2">Cover:</label>
            <input type="text" id="cover_image" name="cover_image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah</button>
    </form>

    <!-- Tabel -->
    <div class="text-3xl font-bold">List Anime</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Genre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Author
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listanime as $list) {
                    echo "<tr>";
                    echo "<td>" . $list['judul_anime'] . "</td>";
                    echo "<td>" . $list['genre_anime'] . "</td>";
                    echo "<td>" . $list['nama_author'] . "</td>";
                    echo "<td><a href='./controllers/proses_update.php?id=" . $list['id'] . "' class='text-blue-500 hover:text-blue-700'>Edit</a> | <a href='./controllers/proses_hapus.php?id_list=" . $list['id'] . "&id_judul_anime=" . $list['id_judul_anime'] . "&id_nama_author=" . $list['id_nama_author'] . "' onclick='return confirm(\"Yakin ingin menghapus data ini?\")' class='text-red-500 hover:text-red-700'>Delete</a></td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Data Judul -->
<div class="container mx-auto p-4 m-2">
    <div class="text-3xl font-bold">Judul Anime</div>

    <!-- Tabel -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Genre
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listjudul as $judul) {
                    echo "<tr>";
                    echo "<td>" . $judul['judul_anime'] . "</td>";
                    echo "<td>" . $judul['genre_anime'] . "</td>";
                    // echo "<td><a href='./controllers/proses_update_judul.php?id=" . $judul['id'] . "' class='text-blue-500 hover:text-blue-700'>Edit</a> | <a href='./controllers/proses_hapus_judul.php?id=" . $judul['id'] . "' onclick='return confirm(\"Yakin ingin menghapus data ini?\")' class='text-red-500 hover:text-red-700'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</div>

<!-- Data Penulis -->
<div class="container mx-auto p-4 m-2">
    <div class="text-3xl font-bold">Nama Author</div>

    <!-- Tabel -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Author
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gender
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listauthor as $author) {
                    echo "<tr>";
                    echo "<td>" . $author['nama_author'] . "</td>";
                    echo "<td>" . $author['gender_author'] . "</td>";
                    // echo "<td><a href='./controllers/proses_update_author.php?id=" . $author['id'] . "' class='text-blue-500 hover:text-blue-700'>Edit</a> | <a href='./controllers/proses_hapus_author.php?id=" . $author['id'] . "' onclick='return confirm(\"Yakin ingin menghapus data ini?\")' class='text-red-500 hover:text-red-700'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>