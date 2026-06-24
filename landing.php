<?php

include './helpers/config.php';
include './models/m_list.php';

$list = new m_list($conn);
$data = $list->getTopAnime();
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
  <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
  </style>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>




<body class="bg-black min-h-screen flex flex-col">
  <!-- Header di atas, full width -->
  <header class="w-full fixed">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://v3.flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="https://flowbite.com/images/logo.svg" class="h-8" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">My Anime List</span>
        </a>
        <!-- tombol menu -->
        <button data-collapse-toggle="navbar-default" type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
          <ul
            class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li><a href="#Hero" href="#" class="block py-2 px-3 text-blue-700 md:p-0 dark:text-white">Home</a></li>
            <li><a href="#PopularAnime" href="#" class="block py-2 px-3 text-gray-900 md:p-0 dark:text-white">About</a></li>
            <li><a href="#CRUD"href="#" class="block py-2 px-3 text-gray-900 md:p-0 dark:text-white">CRUD</a></li>
            <li><a href="/ta/login.php" href="#" class="block py-2 px-3 text-gray-900 md:p-0 dark:text-white">Login</a></li>
            <li><a href="https://github.com/Kyuuraisme/anime-list" href="#" class="block py-2 px-3 text-gray-900 md:p-0 dark:text-white">Github</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Konten box di tengah -->
  <main class="flex-grow flex flex-col items-center justify-center text-center text-white space-y-10 pt-16">
    <!-- Hero Section -->
    <section id="Hero">
      <h1 class="text-7xl font-extrabold text-sky-500 mb-4 pt-8">Welcome To My Anime List!!</h1>
      <p class=" text-gray-300 text-left max-w-2xl text-4xl font-semibold">
        Discover and share My favorite anime series. Built by Ega for the final web programming project.
      </p>
    </section>

    <!-- Popular Anime Section -->
    <section id="PopularAnime" name="popular-anime" class="w-11/12 max-w-5xl pt-8">
      <h2 class="text-5xl font-bold text-yellow-400 mb-6 text-left"> Top 3 Masterpiece Anime </h2>
      <p class="text-lg text-gray-300 max-w-2xl pb-4">
        These are the top 3 masterpiece anime in my version. what's your favorite?
      </p>
      <div class="bg-gray-900 rounded-2xl p-8 shadow-lg mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-4">
        <?php foreach ($data as $row): ?>
          <div class="bg-gray-800 rounded-xl p-4 hover:scale-105 transition">
            <img src="<?= htmlspecialchars($row['cover_image']) ?>"
              alt="<?= htmlspecialchars($row['judul_anime']) ?>"
              class="rounded-lg mb-3 w-full h-64 object-cover">
            <h3 class="text-xl font-semibold text-white"><?= htmlspecialchars($row['judul_anime']) ?></h3>
            <p class="text-gray-400 text-sm">By <?= htmlspecialchars($row['nama_author']) ?></p>
            <p class="text-gray-500 text-xs"><?= htmlspecialchars($row['genre_anime']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- CRUD Section -->
    <section id="CRUD"class="w-11/12 max-w-5xl">
      <h2 class="text-3xl font-bold text-yellow-400 mb-6"> Manage Your Anime List</h2>
      <p class="text-gray-300 mb-8">
        Use the CRUD features to add new anime, view my collection, edit details, or delete entries.
      </p>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6  bg-gray-900 rounded-2xl p-8 shadow-lg mt-10">
        <!-- Create -->
        <a class="bg-gray-800 rounded-xl p-6 hover:scale-105 transition flex flex-col items-center">
          <svg class="w-12 h-12 text-green-400 mb-3" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path d="M12 4v16m8-8H4" />
          </svg>
          <h3 class="text-lg font-semibold text-white">Create</h3>
          <p class="text-gray-400 text-sm text-center">Add new anime to my list</p>
        </a>

        <!-- Read -->
        <a class="bg-gray-800 rounded-xl p-6 hover:scale-105 transition flex flex-col items-center">
          <svg class="w-12 h-12 text-blue-400 mb-3" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path d="M5 4h14v16H5z" />
          </svg>
          <h3 class="text-lg font-semibold text-white">Read</h3>
          <p class="text-gray-400 text-sm text-center">View my anime collection</p>
        </a>

        <!-- Update -->
        <a class="bg-gray-800 rounded-xl p-6 hover:scale-105 transition flex flex-col items-center">
          <svg class="w-12 h-12 text-yellow-400 mb-3" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path d="M11 4h2v16h-2z" />
          </svg>
          <h3 class="text-lg font-semibold text-white">Update</h3>
          <p class="text-gray-400 text-sm text-center">Edit my anime details</p>
        </a>

        <!-- Delete -->
        <a class="bg-gray-800 rounded-xl p-6 hover:scale-105 transition flex flex-col items-center">
          <svg class="w-12 h-12 text-red-400 mb-3" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path d="M6 6h12M9 6v12m6-12v12" />
          </svg>
          <h3 class="text-lg font-semibold text-white">Delete</h3>
          <p class="text-gray-400 text-sm text-center">Remove my anime from list</p>
        </a>
      </div>
    </section>


    <!-- Footer -->
    <footer class="text-gray-400 text-sm mt-10">
      © 2026 My Anime List — Created by Ega 
    </footer>
  </main>
</body>