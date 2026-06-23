<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-800">
    <!-- Header -->
    <header class="fixed top-0 left-0 w-full bg-gray-800 z-50">
        <?php include './inc/header.php'; ?>
    </header>

    <!-- Sidebar -->
    <?php
        $page = $_REQUEST['page'] ?? 'pages/landing';
        $file = str_replace(".", "/", $page) . ".php";
        if ($page !=='pages.landing') {
            include './inc/sidebar.php';
        }
    ?>

    <!-- Konten utama -->
    <main class="<?= $page !== 'pages.landing' ? 'ml-64' : '' ?> pt-20 px-6 bg-white min-h-screen">
        <?php
        if (file_exists($file)) {
            include $file;
        } else {
            echo "Halaman tidak ditemukan.";
        }
        ?>
    </main>
</body>

</html>