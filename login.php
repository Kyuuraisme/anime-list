<?php
include './helpers/config.php';
include './models/m_akun.php';

$akun = new m_akun($conn);
$error = $success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $result = $akun->login($_POST);
        if ($result) {
            header("Location: ./index.php?page=pages.list");
            exit;
        } else {
            $error = "Login gagal! Username atau password salah.";
        }
    }


    if (isset($_POST['register'])) {
        $result = $akun->addAkun($_POST);
        if ($result) {
            $success = "Akun berhasil dibuat!";
        } else {
            $error = "Register gagal!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login / Register</title>
    <style>
        body {
            background-color: #0f0f0f;
            color: #fff;
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #1a1a1a;
            padding: 30px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        input,
        select {
            margin-bottom: 15px;
            padding: 10px;
            border: none;
            border-radius: 6px;
            width: 100%;
        }

        .button {
            margin-top: 20px;
        }

        .button a {
            display: inline-block;
            background-color: yellow;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            color: black;
            font-size: 20px;
            font-weight: bold;
        }

        .button a:hover {
            background-color: black;
            color: yellow;
        }

        button {
            margin-top: 20px;
            display: inline-block;
            background-color: yellow;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            color: black;
            font-size: 20px;
            font-weight: bold;
        }

        .button a:hover {
            background-color: black;
            color: yellow;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="text" name="nama_user" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>


        <h2>Register</h2>
        <form method="POST" action="">
            <input type="text" name="nama_user" placeholder="Username" required>
            <input type="text" name="no_ponsel" placeholder="Nomor HP" required>
            <select name="gender_user" required>
                <option value="">Pilih Gender</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
                <option value="Tak Dipublikasi">Tak Dipublikasi</option>
            </select>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Daftar</button>
        </form>

        <?php if ($error): ?><p style="color:red;"><?= $error ?></p><?php endif; ?>
        <?php if ($success): ?><p style="color:green;"><?= $success ?></p><?php endif; ?>
    </div>
</body>

</html>