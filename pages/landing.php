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
      min-height: 100vh; 
      display: flex;
      justify-content: center;
      align-items: center; 
    }
    #box {
      background-color: whitesmoke;
      border-radius: 30px;
      max-width: 1200px; 
      width: 90%;       
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
      <h1>Welcome to My Anime List!!</h1>
      <p>This page is made by me for my final project web programming</p>
      <div class="button">
            <a href="/ta/login.php">Login"</a>
      </div>
    </div>
  </div>
</body>
