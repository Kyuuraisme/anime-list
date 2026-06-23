<?php

include './helpers/config.php';
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <style>
    body {
      background-color: black;
      min-height: 100vh; /* biar full tinggi layar */
      display: flex;
      justify-content: center;
      align-items: center; /* konten di tengah vertikal */
    }
    #box {
      background-color: whitesmoke;
      border-radius: 30px;
      max-width: 1200px; /* lebih fleksibel */
      width: 90%;        /* responsif */
      padding: 40px;
    }
    .header {
      display: flex;
      justify-content: space-between;
      font-family: Arial, Helvetica, sans-serif;
    }
    .nav a {
      text-decoration: none;
      color: black;
      margin: 0 10px;
      font-size: 18px;
      font-weight: bold;
    }
    .nav a:hover {
      color: yellow;
    }
    .title h1 {
      font-size: 36px;
      margin-bottom: 10px;
    }
    .title p {
      font-size: 18px;
      line-height: 1.5;
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
  </style>
</head>
<body>
  <div id="box">
    <div class="title">
      <h1>Kessoku Band!</h1>
      <p>Kessoku Band (結束バンド Kessoku Bando) is the main unit band of Bocchi the Rock! series...</p>
      <div class="button">
        <a href="admin_page.php">Learn More</a>
      </div>
    </div>
  </div>
</body>
