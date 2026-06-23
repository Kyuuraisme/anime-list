<?php

// memanggil class dari models
include './helpers/config.php';
include './models/m_list.php';

$list = new m_list($conn);
$listanime = $list->getAllList();
?>

<!-- title -->
<div class="text-3xl font-bold">List Anime</div>

<!-- cardlist -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
  <?php while ($row = pg_fetch_assoc($listanime)) { ?>
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
      <a href="#" class="flex flex-col items-center pt-10 pb-10">
        <img class="rounded-t-lg" src="<?= $row['cover_image'] ?>" alt="<?= $row['judul_anime'] ?>" />
      </a>
      <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
          <?= $row['judul_anime'] ?>
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
          Author: <?= $row['nama_author'] ?>
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
          Genre: <?= $row['genre_anime'] ?>
        </p>
      </div>
    </div>
  <?php } ?>
</div>