<?php  
session_start();

if(!isset($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}

if(empty($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}
 
require("../../config/commande.php");





if(isset($_POST['valider']))
{
  if(isset($_FILES['image']))
  {
    if(!empty($_FILES['image']['tmp_name']) ) 
    {
      $image = $_FILES['image']['tmp_name'];

      // Traitement de l'image
      $destination = "../../uploads/" . $_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'], $destination);

      try 
      {
        ajouter_even($destination);       
        header('Location: afficher.php');
      } 
      catch (Exception $e) 
      {
        echo $e->getMessage();
      }
    }
  }
}

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


    <title>Ajouter-Evenement</title>
    <style>
    .bg-light {
        background-color: #dedede !important;
    }
    </style>
</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name">Espace admin 'Le 114'</span>
            </div>
            <div class="navbar-collapse d-lg-flex align-items-lg-center">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="ajouter.php"
                            style="font-weight: bold;">Nouveau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="afficher.php" style="font-weight: bold;">Evenements</a>
                    </li>
                </ul>
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
                        <a href="../reservation/afficher.php" class="nav-link">
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
                        <a href="../avis/afficher.php" class="nav-link">
                            <i class="bx bx-message-square-detail icon"></i>
                            <span class="link">Avis</span>
                        </a>
                    </li>


                </ul>

                <div class="bottom-cotent">

                    <li class="list">

                        <a href="../deconnexion.php" class="nav-link">
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
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">L'image de l'evenement</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>

                    <button type="submit" name="valider" class="btn btn-dark">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../script.js"></script>

</body>

</html>