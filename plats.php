<?php

require("config/commande.php");
$Plats=afficher_plats();

?>


<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="images/114logo.png" type="image/x-icon">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="style.css">


    <title>Restaurant le 114 - Plats</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <style>
    .plats {

        margin-top: 0;
        text-align: center;
        padding-top: 2%;
    }

    .plats .title h1 {
        font-size: 100px;
        color: rgb(145, 137, 128);
        font-family: 'Great Vibes', cursive;
    }

    .plats .title p {
        font-size: 25px;
        color: #454444;
    }
    </style>



</head>


<body>


    <?php include'header.php' ?>


    <div class="plats">
        <div class="title">
            <h1>Plats</h1>
            <p>Les plats les plus populaires chez nous </p>
        </div>
    </div>


    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach($Plats as $plats): ?>
                <div class="col">
                    <div class="card shadow-sm">

                        <!-- <title><?= $plats->nom ?> </title> -->

                        <img src="uploads<?= $plats->image ?>">
                        <div class="card-body">
                            <p class="card-text"><?= substr($plats->nom, 0,20);  ?></p>
                            <p class="card-text"><?= substr($plats->description, 0,200); ?></p>

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-body-secondary"><?= $plats->prix ?> DA</small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <?php include'footer.php' ?>


</body>

</html>