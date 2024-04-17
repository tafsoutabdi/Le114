<?php

include 'config.php';
session_start();




if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('La requête a échoué');

   if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:profil.php');
   } else {
      $message[] = 'Email ou mot de passe incorrect!';  
   }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="shortcut icon" href="../images/114logo.png" type="image/x-icon">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="scriptLogin.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body>





    <div class="form-container">
        <div>
            <button onclick="window.location.href = '../index.php';" class="btn-close">
                <i class="fas fa-times"></i>
            </button>
            <form action="" method="post" enctype="multipart/form-data">


                <h3>Connexion</h3>
                <?php
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message">' . $message . '</div>';
            }
         }
         ?>

                <input type="email" name="email" placeholder="Entrez votre email" class="box" required>
                <input type="password" name="password" placeholder="Entrez votre mot de passe" class="box" required>
                <input type="submit" name="submit" value="Se connecter" class="btn">
                <p>Si vous n'avez pas de compte <a href="register.php">lancez-vous !</a></p>

            </form>
        </div>
    </div>

</body>

</html>


<style>
.btn-close {
    padding: 8px 15px;
    font-size: 15px;
    cursor: pointer;
    float: right;
}

.form-container {
    position: relative;
}
</style>