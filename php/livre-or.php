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
    <link rel="stylesheet" href="../css/livre-or.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/9a09d189de.js" crossorigin="anonymous"></script>

    <title>Livre d'or</title>
</head>

<body>
    <header>
        <img src="../assets/mysql-logo.png" alt="logo">
        <nav>
            <?php require './include/header-include.php' ?>
        </nav>
    </header>
    <main>
        <?php
        $getUser = $bdd->query("SELECT login, commentaire, date FROM commentaires INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC");

        $livreor = $getUser->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <table>
            <!-- <h1>All Users</h1> -->
            <thead>
                <tr>
                    <th>Posté le :</th>
                    <th>Par :</th>
                    <th>Commentaires</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < sizeof($livreor); $i++) : ?>
                    <tr>
                        <td class="date"><?= $livreor[$i]['date'] ?></td>
                        <?php
                        if ($livreor[$i]['login'] === "admin") { ?>
                            <td class="login"><i class="fa-solid fa-user admin"></i><?= $livreor[$i]['login']; ?> </td>
                            <style>
                                .admin {
                                    background-color: red;
                                }
                            </style>
                        <?php     } else { ?>
                            <td class="login"><i class="fa-solid fa-user user"></i><?= $livreor[$i]['login']; ?> </td>

                            <style>
                                .user {
                                    background-color: blue;
                                }
                            </style>
                        <?php } ?> <td class="comment"><?= $livreor[$i]['commentaire'] ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </main>

    <footer><a href="https://github.com/Dylan-olivro"><i class="fa-brands fa-github"></i></a></footer>

</body>

</html>