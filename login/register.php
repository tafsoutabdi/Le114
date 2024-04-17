<?php

include 'config.php';

if (isset($_POST['submit'])) {

   $nom = mysqli_real_escape_string($conn, $_POST['nom']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size']; 
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploads' . $image;

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('La requête a échoué');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'Ce compte existe déjà';
   } else {
      if ($pass != $cpass) {
         $message[] = 'Confirmez  le mot de passe ne correspond pas !';
      } elseif ($image_size > 2000000) {
         $message[] = "La taille de l'image est trop grande !";
      } else {
         $insert = mysqli_query($conn, "INSERT INTO `users`(nom, email, password, image) VALUES('$nom', '$email', '$pass', '$image')") or die('La requête a échoué');

         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Enregistré avec succès!';
            header('location:login.php');
         } else {
            $message[] = "Echec de l'enregistrement!";
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="fr>

<head>
    <meta charset=" UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<title>Inscription</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="form-container">
        <div>
            <button onclick="window.location.href = '../index.php';" class="btn-close">
                <i class="fas fa-times"></i>
            </button>
            <form action="" method="post" enctype="multipart/form-data">

                <h3>Créer un compte</h3>
                <?php
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message">' . $message . '</div>';
            }
         }
         ?>
                <input type="text" name="nom" placeholder="Entrez votre nom d'utilisateur" class="box" required>
                <input type="email" name="email" placeholder="Entrez votre email" class="box" required>
                <input type="password" name="password" placeholder="Entrez votre mot de passe" class="box" required>
                <input type="password" name="cpassword" placeholder="Confirmez votre mot de passe" class="box" required>
                <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
                <input type="submit" name="submit" value="S'inscrire" class="btn">
                <p>Vous avez déjà un compte? <a href="login.php">Connectez-vous maintenant!</a>
                </p>
            </form>
        </div>

    </div>

</body>

</html>


<style>
.btn-close {
    border: none;
    padding: 8px 15px;
    font-size: 15px;
    cursor: pointer;
    float: right;
}

.form-container {
    position: relative;
}
</style>