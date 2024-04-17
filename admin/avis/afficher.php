<?php  

session_start();

if(!isset($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}

if(empty($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}


   require("../../config/commande.php");
   $Avis=afficher_avis();


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../../images/114logo.png" type="image/x-icon">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../style.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

    <title>Affichage-Avis</title>


    <!-- <style>
    .card img {
        max-width: 100%;
        height: auto;
    }
    </style> -->

</head>



<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name">Espace admin 'Le 114'</span>
            </div>

        </div>





        <div class="sidebar">
            <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name">Espace admin 'Le 114'</span>
            </div>

            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="../index.php" class="nav-link">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="link">Tableau de bord</span>
                        </a>
                    </li>

                    <li class="list">
                        <a href="../clients/afficher.php" class="nav-link">
                            <i class="bx bxs-user icon"></i>
                            <span class="link">Clients</span>
                        </a>
                    </li>

                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="bx bx-calendar icon"></i>
                            <span class="link">Réservations</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="bx bx-calendar-plus icon"></i>
                            <span class="link">Événements</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="../menu/afficher.php" class="nav-link">
                            <i class="bx bx-restaurant icon"></i>
                            <span class="link">Menu</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="#" class="nav-link">
                            <i class="bx bx-message-square-detail icon"></i>
                            <span class="link">Avis</span>
                        </a>
                    </li>
                </ul>

                <div class="bottom-cotent">
                    <li class="list">

                        <a href=" ../deconnexion.php" class="nav-link">
                            <i class="bx bx-log-out icon"></i>
                            <span class="link">Déconnecter</span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </nav>







    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-center mt-5">
                <table class="table  w-50">
                    <thead class="table-dark">

                        <tr>
                            <th scope=" col">#</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Review</th>
                            <th scope="col">Operations</th>




                        </tr>
                    </thead>


                    <tbody>
                        <?php foreach ($Avis as $avis) { ?>

                        <tr>
                            <th scope="row"> <?= $avis->id_avis ?> </th>
                            <td> <?= $avis->rating ?> </td>
                            <td> <?= $avis->review ?> </td>

                            <td>
                                <a href=" Supprimer.php?pdt=<?= $avis->id ?>" class="btn btn-danger">Supprimer</a>

                            </td>

                        </tr>
                        <?php } ?>


                    </tbody>
                </table>

            </div>


            </nav>
        </div>
    </div>
    <script src="../script.js"></script>


</body>

</html>