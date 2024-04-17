<?php 
session_start();


if(isset($_SESSION['zWuppkgTTGDHxnj2'])) {
    $_SESSION['zWuppkgTTGDHxnj2']=array();
 
    session_destroy();
    header("Location: login.php");  

}else {
    header("Location: login.php");
}

?>