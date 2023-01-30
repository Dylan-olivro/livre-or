<?php
session_start();
require "./php/include/config.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/common.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/9a09d189de.js" crossorigin="anonymous"></script>

    <title>Index</title>
</head>

<body>
    <header>
        <img src="./assets/mysql-logo.png" alt="logo">
        <nav>
            <?php require './php/include/header-index.php' ?>
        </nav>
    </header>

    <main>
        <h1>Bienvenue<br>
            <?php
            if (isset($_SESSION['login'])) {
                echo strtoupper($_SESSION['login']);
            }
            ?>
        </h1>
        <style>
            h1 {
                text-align: center;
                font-size: 5rem;
                margin: 5% 0 0;
            }

            @media screen and (max-width: 425px) {
                h1 {
                    font-size: 3rem;
                }
            }
        </style>
    </main>
    <footer><a href="https://github.com/Dylan-olivro"><i class="fa-brands fa-github"></i></a></footer>
</body>

</html>