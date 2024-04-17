<?php  

session_start();

if(!isset($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}

if(empty($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}


   require("../../config/commande.php");
   $evenements=afficher_even();


   if(isset($_GET['pdt'])){
    $id = $_GET['pdt'];
    supprimer_even($id);
    header("Location: afficher.php");
}
   
?>