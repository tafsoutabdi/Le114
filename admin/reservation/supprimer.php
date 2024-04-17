<?php  

session_start();

if(!isset($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}

if(empty($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}


   require("../../config/commande.php");
   $reservation=afficher_res();


   if(isset($_GET['pdt'])){
    $id = $_GET['pdt'];
    supprimer_res($id);
    header("Location: afficher.php");
}
   
?>