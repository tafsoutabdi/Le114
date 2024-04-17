<?php

require("config/commande.php");
$evenements=afficher_even();

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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <title>Restaurant le 114 - Evenements</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <style>
    .evenements {

        margin-top: 0;
        text-align: center;
        padding-top: 2%;
    }

    .evenements .title h1 {
        font-size: 100px;
        color: rgb(145, 137, 128);
        font-family: 'Great Vibes', cursive;
    }

    .evenements .title p {
        font-size: 25px;
        color: #454444;
    }
    </style>



</head>


<body>




    <?php include'header.php' ?> <div class="evenements">
        <div class="title">
            <h1>Evenements</h1>
            <p>Nos evenements </p>
        </div>
    </div>


    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach($evenements as $even): ?>
                <div class="col">
                    <div class="card shadow-sm">

                        <!-- <title><?= $even->nom ?> </title> -->

                        <img src="uploads<?= $even->image ?>">

                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <?php require "footer.php";
 ?>

</body>

</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const bar = document.querySelector('.fas.fa-bars');
    const cross = document.querySelector('#hdcross');
    const headerbar = document.querySelector('.headerbar');

    bar.addEventListener('click', function() {
        setTimeout(() => {
            cross.style.display = 'block';
        }, 200);
        headerbar.style.right = '0%';
    });

    cross.addEventListener('click', function() {
        cross.style.display = 'none';
        headerbar.style.right = '-100%';
    });
});
</script>