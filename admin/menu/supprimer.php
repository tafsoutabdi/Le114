<?php  

session_start();

if(!isset($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}

if(empty($_SESSION['zWuppkgTTGDHxnj2'])){
    header("Location: ../login.php");
}


   require("../../config/commande.php");
   $Plats=afficher_plats();


   if(isset($_GET['pdt'])){
    $id = $_GET['pdt'];
    supprimer_plat($id);
    header("Location: afficher.php");
}
   
?>