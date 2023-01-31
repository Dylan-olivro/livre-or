<?php
session_start();
require "./include/config.php";

if ($_SESSION['login'] == false) {
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/commentaire.css">
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
        <form action="" method="post">
            <h3>Écris un commentaire</h3>
            <textarea name="commentaire" autofocus></textarea>
            <?php
            if (isset($_POST['envoi'])) {
                $commentaire = htmlspecialchars($_POST['commentaire']);
                $date = date("Y-m-d H:i:s");

                if (!empty($commentaire)) {
                    $userId = $_SESSION["id"];
                    $getUser = $bdd->prepare("INSERT INTO commentaires (commentaire,id_utilisateur, date)VALUES(?,?,?)");

                    $getUser->bindValue(":id_utilisateur", $userId);
                    $getUser->execute([$commentaire, $userId, $date]);
                    header("Location: livre-or.php");
                } else {
                    echo "<p><i class='fa-solid fa-triangle-exclamation'></i>&nbspVeuillez écrire un commentaire</p>";
                }
            }
            ?>
            <input type="submit" name="envoi" id="button">

        </form>

    </main>

    <footer><a href="https://github.com/Dylan-olivro"><i class="fa-brands fa-github"></i></a></footer>

</body>

</html>