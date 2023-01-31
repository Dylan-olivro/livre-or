<?php
session_start();
require "./include/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/login.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/9a09d189de.js" crossorigin="anonymous"></script>

    <title>Connexion</title>
</head>

<body>
    <header>
        <img src="../assets/mysql-logo.png" alt="logo">
        <nav>
            <?php require './include/header-include.php' ?>
        </nav>
    </header>
    <main>

        <form method="POST" action="">
            <h3>Login Here</h3>
            <label for="login">Username</label>
            <input type="text" id="login" name="login" placeholder="Login" required autofocus autocomplete="off">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder='Password' required autocomplete="off">
            <?php

            if (isset($_POST['envoi'])) {
                $login = htmlspecialchars($_POST['login']);
                $password = $_POST['password']; // md5'() pour crypet le mdp

                if (!empty($login) && !empty($password)) {
                    $recupUser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
                    $recupUser->execute([$login, $password]);
                    if (!preg_match("#^[a-z0-9]+$#", $login)) {
                        echo "<p><i class='fa-solid fa-triangle-exclamation'></i>&nbspLe login doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.</p>";
                    } elseif ($recupUser->rowCount() > 0) {
                        $_SESSION['login'] = $login;
                        $_SESSION['password'] = $password;
                        $recupUser = $recupUser->fetchAll(PDO::FETCH_ASSOC);
                        $_SESSION = $recupUser[0];
                        header("Location: ../index.php");
                    } else {
                        echo "<p><i class='fa-solid fa-triangle-exclamation'></i>&nbspVotre login ou mot de passe incorect.</p>";
                    }
                } else {
                    echo "<p><i class='fa-solid fa-triangle-exclamation'></i>&nbspVeuillez compléter tous les champs.</p>";
                }
            }
            ?>
            <input type="submit" name="envoi" value="Log In" id="button">
        </form>
    </main>

    <footer><a href="https://github.com/Dylan-olivro"><i class="fa-brands fa-github"></i></a></footer>

</body>

</html>