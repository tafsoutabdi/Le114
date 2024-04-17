<?php

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="shortcut icon" href="images/114logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Restaurant le 114</title>

</head>

<body>


    <?php include'header.php'  ?>


    <div class="home">
        <div class="main_slide">
            <div>
                <h1>Bienvenus dans <span>votre restaurant</span> <br>"Le 114".</h1>
                <p>Vivez une expérience gustative inoubliable chez le 114, où l'art de la cuisine est porté à son plus
                    haut niveau. Explorez notre menu et réservez votre table dès maintenant !</p>
                <button class="red_btn"> 
                    <a href="reserver.php"> Réserver</a>
                </button>
            </div>
            <div>
                <img src="images/fond.png" alt="">
            </div>
        </div>
        <div class="food_items">
            <div class="item">
                <div>
                    <img src="images/plats/Entrecoteforestiere.png" alt="plat">
                </div>
                <h3>Entrecôte forestière</h3>
                <p>Combinaison d'une entrecôte de boeuf
                    tendre avec une sauce aux champignons et aux herbes</p>
                <button class="menu_btn">
                    <a href="plats.php">
                    Voir dans le menu
                    </a>
                </button>
            </div>
            <div class="item">
                <div>
                    <img src="images/plats/languedeveau.png" alt="plat">
                </div>
                <h3>Langue de veau en sauce</h3>
                <p>Un plat de viande tendre, préparé à partir de la langue de veau cuite dans une sauce aromatique</p>
                <button class="menu_btn">
                    <a href="plats.php">
                    Voir dans le menu
                    </a>
                </button>
            </div>
            <div class="item">
                <div>
                    <img src="images/plats/Emincédepoulet.png" alt="plat">
                </div>
                <h3>Émincé de poulet à la crème</h3>
                <p>Un plat de viandecrémeux, préparé à partir de tranches de blanc de poulet cuites dans une sauce à la
                    crème</p>
                    <button class="menu_btn">
                    <a href="plats.php">
                    Voir dans le menu
                    </a>
                </button>
            </div>

            

        </div>
        <div class="letter">
            <div class="letter-head">
                <h3>Laisser <span>un Avis</span></h3>
            </div>
            <div class="letter-input">
                <div>
                    <input type="email" id="email" placeholder="Laissez vos avis">
                </div>
                <button class="red_btn" id="submit-btn">Envoyer</button>
            </div>
        </div>
    </div>

    <?php include'footer.php' ?>

</body>

</html>