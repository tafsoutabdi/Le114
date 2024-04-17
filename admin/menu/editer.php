<?php  
session_start();

if(!isset($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}

if(empty($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}

if(!isset($_GET['pdt'])) {
    header("Location: afficher.php");  
}

if(empty($_GET['pdt']) AND !is_numeric($_GET['pdt']))
{
    header("Location: afficher.php");
}

$id = $_GET['pdt'];
   
require("../../config/commande.php");
$Plats = getPlat($id);

foreach($Plats as $plats) {
    $nom = $plats->nom; 
    $idPDT = $plats->id; 
    $image = $plats->image; 
    $prix = $plats->prix; 
    $description = $plats->description; 

}


if(isset($_POST['valider'])) {
    if(isset($_FILES['image']['name']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['description'])) {
        if(!empty($_FILES['image']['name']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['description'])) {
            $image = $_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];

            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prix = htmlspecialchars(strip_tags($_POST['prix']));
            $description = htmlspecialchars(strip_tags($_POST['description']));

            // Traitement de l'image
            $destination = "../../uploads" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
      
            try {
                modifier_plats($image, $nom, $prix, $description, $id);       
                header('Location: afficher.php');
                exit();
            } catch (Exception $e) {
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



    <title>Modifier-Menu</title>

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
                        <a class="nav-link" aria-current="page" href="ajouter.php"
                            style="font-weight: bold;">Nouveau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="afficher.php" style="font-weight: bold;">Plats</a>
                    </li>
                </ul>
            </div>
        </div>


        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Le 114</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../admin/" style="font-weight: bold;">Nouveau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="afficher.php">Plats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" style="font-weight: bold; color: green;">Modification</a>
                    </li>
                </ul>
                <div style="display: flex ; justify-content: flex-end;">
                    <a href=" deconnexion.php" class="btn btn-danger">Se deconnecter</a>
                </div>
            </div>
        </div>
    </nav> -->



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
                        <a href="../evenements/afficher.php" class="nav-link">
                            <i class="bx bx-calendar-plus icon"></i>
                            <span class="link">Événements</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="afficher.php" class="nav-link">
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

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach($Plats as $plats ): ?>

                <form method="post" enctype="multipart/form-data">
                    <div class=" mb-3">

                        <label for="file" class="form-label">Choisir une image</label>
                        <input type="file" class="form-control" name="image" accept="image/jpg, image/jpeg, image/png"
                            value="<?= $image ?>" required>

                    </div>
                    <div class=" mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" value="<?= $nom ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Prix</label>
                        <input type="number" class="form-control" name="prix" value="<?= $prix ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea class="form-control" name="description"><?= $description ?></textarea>
                    </div>

                    <button type="submit" name="valider" class="btn btn-dark">Enregistrer</button>
                </form>

                <?php endforeach; ?>


            </div>
        </div>
    </div>

    <script src="../script.js"></script>

</body>

</html>