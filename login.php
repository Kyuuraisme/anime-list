<?php
// Simulasi data user (hardcode)
$users = [
    ["nama_user" => "ega", "password" => "12345"],
    ["nama_user" => "admin", "password" => "admin123"]
];

$success = $error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // LOGIN
    if (isset($_POST['login'])) {
        $nama_user = $_POST['nama_user'];
        $password  = $_POST['password'];

        $found = false;
        foreach ($users as $user) {
            if ($user['nama_user'] === $nama_user && $user['password'] === $password) {
                $found = true;
                break;
            }
        }

        if ($found) {
            // langsung redirect ke list
            header("Location: index.php?page=pages.list");
            exit;
        } else {
            $error = "Login gagal! Username/Password salah.";
        }
    }

    // REGISTER (simulasi, hanya tampil pesan)
    if (isset($_POST['register'])) {
        $success = "Akun berhasil dibuat (simulasi, tidak tersimpan).";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <style>
        body {
            background-color: #0f0f0f;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #1a1a1a;
            border-radius: 12px;
            padding: 30px;
            width: 350px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .tabs {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            border-radius: 8px;
            background-color: #222;
        }

        .tab.active {
            background-color: #006b5f;
        }

        form {
            display: none;
            flex-direction: column;
        }

        form.active {
            display: flex;
        }

        input {
            margin-bottom: 15px;
            padding: 10px;
            border: none;
            border-radius: 6px;
        }

        button {
            background-color: #006b5f;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #008f7a;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="tabs">
            <div class="tab active" id="login-tab">Masuk</div>
            <div class="tab" id="register-tab">Daftar</div>
        </div>

        <!-- Form Login -->
        <form id="login-form" class="active" method="POST" action="">
            <label>Username</label>
            <input type="text" name="nama_user" placeholder="Username" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Masuk</button>
        </form>

        <!-- Form Register -->
        <form id="register-form" method="POST" action="">
            <label>Username</label>
            <input type="text" name="nama_user" placeholder="Masukkan username" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
            <label>Ulangi Password</label>
            <input type="password" name="confirm_password" placeholder="Ulangi password" required>
            <input type="email" name="email" placeholder="example@email.com" required>
            <input type="date" name="tanggal_lahir" required>
            <select name="gender_user" required>
                <option value="">Pilih Gender</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
                <option value="Tak Dipublikasi">Tak Dipublikasi</option>
            </select>
            <button type="submit" name="register">Daftar</button>
        </form>
    </div>
    <script>
        const loginTab = document.getElementById('login-tab');
        const registerTab = document.getElementById('register-tab');
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');

        loginTab.addEventListener('click', () => {
            loginTab.classList.add('active');
            registerTab.classList.remove('active');
            loginForm.classList.add('active');
            registerForm.classList.remove('active');
        });

        registerTab.addEventListener('click', () => {
            registerTab.classList.add('active');
            loginTab.classList.remove('active');
            registerForm.classList.add('active');
            loginForm.classList.remove('active');
        });
    </script>
    <!-- Pesan -->
    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <p style="color:green;"><?= $success ?></p>
    <?php endif; ?>
</body>

</html>