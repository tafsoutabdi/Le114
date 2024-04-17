<?php  

session_start();

if(!isset($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: login.php");
}

if(empty($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: login.php");
}



?>



<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <link rel="shortcut icon" href="../images/114logo.png" type="image/x-icon">

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />
    <!-- Boxicons CSS -->

    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <nav>
        <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="logo-name">Espace admin 'Le 114'</span>
        </div>
        <div class="sidebar">
            <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name">Espace admin 'Le 114'</span>
            </div>

            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="link">Tableau de bord</span>
                        </a>
                    </li>

                    <li class="list">
                        <a href="clients/afficher.php" class="nav-link">
                            <i class="bx bxs-user icon"></i>
                            <span class="link">Clients</span>
                        </a>
                    </li>

                    <li class="list">
                        <a href="reservation/afficher.php" class="nav-link">
                            <i class="bx bx-calendar icon"></i>
                            <span class="link">Réservations</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="evenements/afficher.php" class="nav-link">
                            <i class="bx bx-calendar-plus icon"></i>
                            <span class="link">Événements</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="menu/afficher.php" class="nav-link">
                            <i class="bx bx-restaurant icon"></i>
                            <span class="link">Menu</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="avis/afficher.php" class="nav-link">
                            <i class="bx bx-message-square-detail icon"></i>
                            <span class="link">Avis</span>
                        </a>
                    </li>
                </ul>

                <div class="bottom-cotent">
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="bx bx-cog icon"></i>
                            <span class="link">Paramètres</span>
                        </a>
                    </li>
                    <li class="list">

                        <a href=" deconnexion.php" class="nav-link">
                            <i class="bx bx-log-out icon"></i>
                            <span class="link">Déconnecter</span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </nav>


    <script src="script.js"></script>
</body>

</html>