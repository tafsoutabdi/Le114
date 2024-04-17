<?php




include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['profil'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `users` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('La requête a échoué');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = "L'ancien mot de passe ne correspond pas !";
      }elseif($new_pass != $confirm_pass){
         $message[] = 'Confirmer le mot de passe ne correspond pas !';
      }else{
         mysqli_query($conn, "UPDATE `u` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('La requête a échoué');
         $message[] = 'Mot de passe mis à jour avec succès !';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = '../uploads'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = "L'image est trop grande";
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `u` SET image = '$update_image' WHERE id = '$user_id'") or die('La requête a échoué');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = "L'image a été mise à jour avec succès !";
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le profil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">


</head>

<body>

    <div class="update-profile">


        <?php
      $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('La requête a échoué');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
        <div>
            <button onclick="window.location.href = '../index.php';" class="btn-close">
                <i class="fas fa-times"></i>
            </button>
            <form action="" method="post" enctype="multipart/form-data">



                <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="../uploads'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
                <div class="flex">
                    <div class="inputBox">
                        <span>Votre nom d'utilisateur :</span>
                        <input type="text" name="update_name" value="<?php echo $fetch['nom']; ?>" class="box">
                        <span>Votre email :</span>
                        <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                        <span>Modifier votre photo :</span>
                        <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                    </div>
                    <div class="inputBox">
                        <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                        <span>Ancien mot de passe :</span>
                        <input type="password" name="update_pass" placeholder="Entrez le mot de passe précédent"
                            class="box">
                        <span>Nouveau mot de passe :</span>
                        <input type="password" name="new_pass" placeholder="Entrez le nouveau mot de passe" class="box">
                        <span>Confirmez le mot de passe :</span>
                        <input type="password" name="confirm_pass" placeholder="Confirmez le nouveau mot de passee"
                            class="box">
                    </div>
                </div>
                <input type="submit" value="Mettre à jour votre profil" name="profil" class="btn">
                <a href="logout.php" class="delete-btn">Se déconnecter</a>

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