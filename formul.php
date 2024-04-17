<?php
// creation de cookie
//setcookie('previous_page','reserver.php',time()+3600,"","",true,true);


try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données');
}
$userID = $_SESSION['user_id'];
$var = date('Y-m-d');
$vare = date('H:i:s');

/*if (!isset($_SESSION['user'])){
    //message d'erreur si tu veux l'afficher 
    header('location:login.php');
    exit();
}else{
    // un exemple 
    // si le client est connecter a la base de donnes donc je dois 
    $req = $bdd ->prepare('SELECT * FROM clients WHERE id_client=:id_client');
    $req->execute([
        "id_client"=>$_SESSION['user']['id_client'] 
    ]);
    $client = $req -> fetch();
}*/

// Vérification du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = test_input($_POST["nom"]);
    $prenom = test_input($_POST["prenom"]);
    $tel = test_input($_POST["tel"]);
    $nb_tables = test_input($_POST["nb_tables"]);
    $nb_personnes = test_input($_POST["nb_personnes"]);
    $date_res = test_input($_POST['date_res']);
    $heure_debut = test_input($_POST['heure_debut']);
    $heure_fin = test_input($_POST['heure_fin']);

    if ($_POST['salle-option'] == "specific") {
        if (empty($nom) || empty($prenom) || empty($tel) || empty($nb_tables) || empty($nb_personnes)) {
            // Vérification que les champs obligatoires ne sont pas vides
            echo "Veuillez remplir tous les champs.<br>";
        }
        // Vérification du champ "nom"
        elseif (!preg_match("/^[a-zA-ZÀ-ÿ' -]+$/", $nom)) {
            echo "Le nom ne doit contenir que des lettres et des espaces.<br>";
        } 
        // Vérification du champ "prénom"
        elseif (!preg_match("/^[a-zA-ZÀ-ÿ' -]+$/", $prenom)) {
            echo "Le prénom ne doit contenir que des lettres et des espaces.<br>";
        }
        // Vérification du champ "numéro de téléphone"
        elseif (!preg_match("/^0[567][0-9]{8}$/", $tel)) { // Vérification du numéro de téléphone (10 chiffres et commence par 06, 05 ou 07)
            echo "Le numéro de téléphone doit être composé de 10 chiffres et doit commencer par 06, 05 ou 07.<br>";
        }
        // Vérification que le champ "nombre de tables" est un nombre positif non nul
        elseif (!is_numeric($nb_tables) || $nb_tables <= 0 || $nb_tables >= 10) {
            echo "Le nombre de tables doit être un nombre positif non nul et inférieur à 10.<br>";
        }
        // Vérification que le champ "nombre de personnes" est un nombre positif non nul
        elseif (!is_numeric($nb_personnes) || $nb_personnes <= 0) {
            echo "Le nombre de personnes doit être un nombre positif non nul.<br>";
        }
        // Vérification de la validité de la date de réservation
        elseif ($date_res < $var) {
            echo "Désolé, vous ne pouvez réserver qu'après la date d'aujourd'hui.<br>";
            exit;
        }
        elseif (($heure_debut < '11:00') || ($heure_fin > '23:00') || ($heure_debut > '23:00') || ($heure_fin < '11:00')) {
            echo "Désolé, vous ne pouvez réserver qu'entre 11h et 23h.<br>";
            exit;
        } else {
            // Affichage du message de réussite de la validation
            echo "Le formulaire est valide.<br>";
            $table = 'table';
            $salle = 'salle';

            if (isset($_POST['submit'])) {
                $res = "SELECT heure_debut, heure_fin, quoi_res,nb_tables FROM reservation WHERE date_res = :date_res";
                $stmt = $bdd->prepare($res);
                $stmt->bindParam(':date_res', $date_res);
                $stmt->execute();
                $existingReservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
                

                $canReserveTable = true;
                $canReserveSalle = true;
                $reservedTables = array();

                foreach ($existingReservations as $existingReservation) {
                    if ($existingReservation['quoi_res'] === $table) {
                        if (($heure_debut >= $existingReservation['heure_debut'] && $heure_debut < $existingReservation['heure_fin']) ||
                            ($heure_fin > $existingReservation['heure_debut'] && $heure_fin <= $existingReservation['heure_fin']) ||
                            ($heure_debut <= $existingReservation['heure_debut'] && $heure_fin >= $existingReservation['heure_fin'])) {
                            $canReserveTable = false;
                            $reservedTables[] = $existingReservation['nb_tables'];
                        }
                    } elseif ($existingReservation['quoi_res'] === $salle) {
                        $canReserveSalle = false;
                    }
                }

               /* if (!$canReserveTable) {
                    if (in_array($nb_tables, $reservedTables)) {
                        echo "Désolé, la table spécifiée est déjà réservée pour la même journée et plage horaire.<br>";
                    } else {
                        $sql = "INSERT INTO reservation (nom, prenom, tel, nb_tables, nb_personnes, date_res, heure_debut, heure_fin, quoi_res)
                            VALUES (:nom, :prenom, :tel, :nb_tables, :nb_personnes, :date_res, :heure_debut, :heure_fin, :quoi_res)";
                    $stmt = $bdd->prepare($sql);
                    $stmt->bindParam(':nom', $nom);
                    $stmt->bindParam(':prenom', $prenom);
                    $stmt->bindParam(':tel', $tel);
                    $stmt->bindParam(':nb_tables', $nb_tables);
                    $stmt->bindParam(':nb_personnes', $nb_personnes);
                    $stmt->bindParam(':date_res', $date_res);
                    $stmt->bindParam(':heure_debut', $heure_debut);
                    $stmt->bindParam(':heure_fin', $heure_fin);
                    $stmt->bindParam(':quoi_res', $table);
                    $stmt->execute();
                        





                    }
                } else*/ if (!$canReserveSalle) {
                    echo "Désolé, une réservation est déjà effectuée pour la  salle.<br>";
                } else{
                    $heure_debut = $_POST['heure_debut']; 
                    $heure_fin = $_POST['heure_fin']; 
                    // Effectuer la requête SQL pour compter le nombre de tables réservées
                    $query = "SELECT SUM(nb_tables) as nombre_tables_reservees FROM reservation
                              WHERE (
                                  (heure_debut >= :heure_debut AND heure_fin <= :heure_fin) OR
                                  (heure_debut <= :heure_debut AND heure_fin >= :heure_fin) OR
                                  (heure_debut <= :heure_debut AND heure_fin >= :heure_debut) OR
                                  (heure_debut <= :heure_fin AND heure_fin >= :heure_fin)
                              )";
                    $stmt = $bdd->prepare($query);
                    $stmt->bindParam(':heure_debut', $heure_debut);
                    $stmt->bindParam(':heure_fin', $heure_fin);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    // Vérifier si toutes les tables sont réservées
                    if ($result['nombre_tables_reservees'] >=10) {
                        echo "Désolé, toutes les tables sont réservées à ce moment-là. Veuillez choisir une autre heure.";
                    } else {
                    $sql = "INSERT INTO reservation (id, nom, prenom, tel, nb_tables, nb_personnes, date_res, heure_debut, heure_fin, quoi_res)
                            VALUES (:id, :nom, :prenom, :tel, :nb_tables, :nb_personnes, :date_res, :heure_debut, :heure_fin, :quoi_res)";
                    $stmt = $bdd->prepare($sql);
                    $stmt->bindParam(':id', $userID);
                    $stmt->bindParam(':nom', $nom);
                    $stmt->bindParam(':prenom', $prenom);
                    $stmt->bindParam(':tel', $tel);
                    $stmt->bindParam(':nb_tables', $nb_tables);
                    $stmt->bindParam(':nb_personnes', $nb_personnes);
                    $stmt->bindParam(':date_res', $date_res);
                    $stmt->bindParam(':heure_debut', $heure_debut);
                    $stmt->bindParam(':heure_fin', $heure_fin);
                    $stmt->bindParam(':quoi_res', $table);
                    $stmt->execute();
                    }
                }
            }
        }
    } elseif ($_POST['salle-option'] == "all") {
        if (empty($nom) || empty($prenom) || empty($tel)  || empty($nb_personnes)) {
            // Vérification que les champs obligatoires ne sont pas vides
            echo "Veuillez remplir tous les champs.<br>";
        }
        // Vérification du champ "nom"
        elseif (!preg_match("/^[a-zA-ZÀ-ÿ' -]+$/", $nom)) {
            echo "Le nom ne doit contenir que des lettres et des espaces.<br>";
        } 
        // Vérification du champ "prénom"
        elseif (!preg_match("/^[a-zA-ZÀ-ÿ' -]+$/", $prenom)) {
            echo "Le prénom ne doit contenir que des lettres et des espaces.<br>";
        }
        // Vérification du champ "numéro de téléphone"
        elseif (!preg_match("/^0[567][0-9]{8}$/", $tel)) { // Vérification du numéro de téléphone (10 chiffres et commence par 06, 05 ou 07)
            echo "Le numéro de téléphone doit être composé de 10 chiffres et doit commencer par 06, 05 ou 07.<br>";
        }
        // Vérification que le champ "nombre de personnes" est un nombre positif non nul
        elseif (!is_numeric($nb_personnes) || $nb_personnes <= 0) {
            echo "Le nombre de personnes doit être un nombre positif non nul.<br>";
        }
        elseif ($date_res < $var) {
            echo "Désolé, vous ne pouvez réserver qu'après la date d'aujourd'hui.<br>";
            exit;
        }
        elseif (($heure_debut < '11:00') || ($heure_fin > '23:00') || ($heure_debut > '23:00') || ($heure_fin < '11:00')) {
            echo "Désolé, vous ne pouvez réserver qu'entre 11h et 23h.<br>";
            exit;
        } else {
            // Affichage du message de réussite de la validation
            echo "Le formulaire est valide.<br>";
            $table = 'table';
            $salle = 'salle';

            if (isset($_POST['submit'])) {
                $res = "SELECT heure_debut, heure_fin, quoi_res FROM reservation WHERE date_res = :date_res";
                $stmt = $bdd->prepare($res);
                $stmt->bindParam(':date_res', $date_res);
                $stmt->execute();
                $existingReservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $canReserveTable = true;
                $canReserveSalle = true;

                foreach ($existingReservations as $existingReservation) {
                    if ($existingReservation['quoi_res'] === $table) {
                        if (($heure_debut >= $existingReservation['heure_debut'] && $heure_debut < $existingReservation['heure_fin']) ||
                            ($heure_fin > $existingReservation['heure_debut'] && $heure_fin <= $existingReservation['heure_fin']) ||
                            ($heure_debut <= $existingReservation['heure_debut'] && $heure_fin >= $existingReservation['heure_fin'])) {
                            $canReserveTable = false;
                            break;
                        }
                    } elseif ($existingReservation['quoi_res'] === $salle) {
                        $canReserveSalle = false;
                        break;
                    }
                }

                if (!$canReserveTable) {
                    echo "Désolé, une réservation est déjà effectuée pour des table.<br>";
                } elseif (!$canReserveSalle) {
                    echo "Désolé, une réservation est déjà effectuée pour la même salle, jour et heure.<br>";
                } else {
                    $sql = "INSERT INTO reservation (id, nom, prenom, tel, nb_tables, nb_personnes, date_res, heure_debut, heure_fin, quoi_res)
                            VALUES (:id, :nom, :prenom, :tel, :nb_tables, :nb_personnes, :date_res, :heure_debut, :heure_fin, :quoi_res)";
                    $stmt = $bdd->prepare($sql);
                    $stmt->bindParam(':id', $userID);
                    $stmt->bindParam(':nom', $nom);
                    $stmt->bindParam(':prenom', $prenom);
                    $stmt->bindParam(':tel', $tel);
                    $stmt->bindParam(':nb_tables', $nb_tables);
                    $stmt->bindParam(':nb_personnes', $nb_personnes);
                    $stmt->bindParam(':date_res', $date_res);
                    $stmt->bindParam(':heure_debut', $heure_debut);
                    $stmt->bindParam(':heure_fin', $heure_fin);
                    $stmt->bindParam(':quoi_res', $salle);
                    $stmt->execute();
                }
            }
        }
    }
}

// Fonction pour sécuriser les données saisies dans le formulaire
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>






<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reserver.css">
    <title>Réservation</title>
</head>

<body>
    <div class="container">
        <div class="heading">Réservez dès maintenant! </div>
        <form  method="POST">
            <div class="card-details">
                <div class="card">
                    <div class="left-container">
                         <div class="card-box">
                            <span class="details">Nom</span>
                            <input type="text" name="nom" placeholder="Entrez votre nom" required>
                        </div>
                        <div class="card-box">
                            <span class="details">Prénom</span>
                            <input type="text" name="prenom" placeholder="Entrez votre prénom" required>
                        </div>
                        <div class="card-box">
                            <span class="details">Numéro de téléphone</span>
                            <input type="tel" name="tel" placeholder="Votre n° de téléphone" required>
                        </div>  
                        <div class="container">


                            <div>
                                <label>
                                    <input type="radio" name="salle-option" id="all-tables" value="all" >
                                    Réservation de la salle
                                </label>
                            </div>
                            <div>
                                <label>
                                    <input type="radio" name="salle-option" id="specify-tables" value="specific">
                                    Réservation de tables
                                </label>
                                <input type="number" name="nb_tables" id="table-quantity"
                                    placeholder="nb de tables" style="display:none;">
                            </div>


                        </div>

                    </div>
                    <div class="right-container">
                        <div class="card-box">
                            <span class="details">Nombre de personnes</span>
                            <input type="number" name="nb_personnes" placeholder="Le nombre de personnes" required>
                        </div>
                        <div class="card-box">
                            <span class="details">choisissez une date</span>
                            <input type="date" name="date_res" placeholder="Date de votre réservation" required>
                        </div>
                        <div class="card-box">
                            <span class="details">A partir de?</span>
                            <input type="time" name="heure_debut" placeholder="L'heure d'arrivée" required>
                        </div>
                        <div class="card-box">
                            <span class="details">Jusqu'à?</span>
                            <input type="time" name="heure_fin" placeholder="L'heure de départ" required>
                        </div>
                    </div>
                </div>
                <div class="button">
                <button type="submit" name="submit" value="reserver">Réserver</button>
                </div>
        </form>

       

    </div>
    
    <script src="reserver.js"></script>
</body>

</html>