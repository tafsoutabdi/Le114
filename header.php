<?php         session_start();
 ?>
<header class="header">
    <div class="headerbar">

        <div class="nav">
            <ul>
                <a href="index.php" class="nav-link">
                    <li>Accueil</li>
                </a>
                <a href="plats.php" class="nav-link">
                    <li>Menu</li>
                </a>
                <a href="evenement.php" class="nav-link">
                    <li>Evénement</li>
                </a>
                <a href="reserver.php" class="nav-link">
                    <li>Réserver</li>
                </a>
                <ul>
                    <?php

        if (isset($_SESSION['user_id'])) {
            // Rediriger vers le profil de l'utilisateur
            echo '<a href="login/profil.php">';
            echo '<li>';
            echo '<i class="fa fa-user" id="user"></i>';
            echo '</li>';
            echo '</a>';
        } else {
            // Rediriger vers la page de connexion
            echo '<a href="login/login.php">';
            echo '<li>';
            echo '<i class="fa fa-user" id="user"></i>';
            echo '</li>';
            echo '</a>';
        }
        ?>
                </ul>

            </ul>
        </div>
    </div>
    <div class="logo">
        <img src="images/114logo.png" alt="">
    </div>
    <div class="bar">
        <i class="fas fa-bars"></i>
        <i class="fa-regular fa-x" id="hdcross"></i>
    </div>
    <div class="nav">
        <ul>
            <a href="index.php" class="nav-link">
                <li>Accueil</li>
            </a>
            <a href="plats.php" class="nav-link">
                <li>Menu</li>
            </a>
            <a href="evenement.php" class="nav-link">
                <li>Evénement</li>
            </a>
            <a href="reserver.php" class="nav-link">
                <li>Réserver</li>
            </a>

        </ul>
    </div>
    <div class="account">
        <ul>
            <?php

        if (isset($_SESSION['user_id'])) {
            // Rediriger vers le profil de l'utilisateur
            echo '<a href="login/profil.php">';
            echo '<li>';
            echo '<i class="fa fa-user" id="user"></i>';
            echo '</li>';
            echo '</a>';
        } else {
            // Rediriger vers la page de connexion
            echo '<a href="login/login.php">';
            echo '<li>';
            echo '<i class="fa fa-user" id="user"></i>';
            echo '</li>';
            echo '</a>';
        }
        ?>
        </ul>
    </div>

    </div>
</header>





<style>
.nav-link {
    text-decoration: none;
    display: flex;
    padding: 0;
}
</style>


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