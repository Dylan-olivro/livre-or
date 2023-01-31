<?php
session_start();
require "./include/config.php";

if ($_SESSION['login'] != 'admin') {
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
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/9a09d189de.js" crossorigin="anonymous"></script>

    <title>Admin</title>
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
        $request = $bdd->query('SELECT id,login FROM utilisateurs');
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table>
            <h1>All Users</h1>
            <thead>
                <tr>
                    <?php
                    foreach ($result[0] as $key => $value) : ?>
                        <th><?= $key ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < sizeof($result); $i++) : ?>
                    <tr>
                        <td><?= $result[$i]['id'] ?></td>
                        <td><?= $result[$i]['login'] ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <style>
            main {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin: 2% 0;
            }

            table {
                margin: 2% 0 0;
                border-collapse: collapse;
                width: 60%;
                background-color: rgba(255, 255, 255, 0.13);
                border-radius: 10px;
                backdrop-filter: blur(10px);
                box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            }

            th,
            td {
                padding: 0.5em;
                border: 1px solid;
                text-align: center;
            }

            tr:hover {
                background-color: rgba(255, 255, 255, 0.3);
            }
        </style>
    </main>

    <footer><a href="https://github.com/Dylan-olivro"><i class="fa-brands fa-github"></i></a></footer>
</body>

</html>