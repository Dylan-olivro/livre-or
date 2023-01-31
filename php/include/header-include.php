<?php
if (isset($_SESSION['login'])) {
    echo '<a href="../index.php">Accueil</a>';
    echo '<a href="./profil.php">Profil</a>';
    echo '<a href="./commentaire.php">Écrire</a>';
    echo '<a href="./livre-or.php">Livre d\'or</a>';
    if ($_SESSION["login"] == "admin") {
        echo '<a href="./admin.php">Admin</a>';
    }
    echo '<a href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>';
} else {
    echo '<a href="../index.php">Accueil</a>';
    echo '<a href="./livre-or.php">Livre d\'or</a>';
    echo '<a href="./connexion.php">Se connecter</a>';
    echo "<a href='./inscription.php'>S'inscrire</a>";
}
