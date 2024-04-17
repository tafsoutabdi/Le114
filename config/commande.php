<?php
// plats
function modifier_plats($image, $nom, $prix, $description, $id) {
    if (require("connexion.php")) {
        $req=$access->prepare("UPDATE plats SET `image`=?, `nom`=?, `prix`=?, `description`=? WHERE id=?");
        $req->execute(array($image, $nom, $prix, $description, $id));
        
        $req->closeCursor();
    }
}


function supprimer_plat($id) {
    if (require("connexion.php")) {
        $req = $access->prepare("DELETE FROM plats WHERE id=?");
        $req->execute(array($id));
        
        $req->closeCursor();
    }
}



function getPlat($id)
{
    if (require("connexion.php")) 
    {
        $req = $access->prepare("SELECT * FROM plats WHERE id=? ");
        $req->execute([$id]);
        
        if ($req->rowCount() == 1)
         {
            $data = $req->fetchALL(PDO::FETCH_OBJ);
            return $data;
        } else{
            return false;
        }
        $req->closeCursor();
    }
}




    function getAdmin($email, $motdepasse)
{
    if (require("connexion.php")) 
    {
        $req = $access->prepare("SELECT * FROM admin WHERE email=? AND motdepasse=? ");
        $req->execute([$email, $motdepasse]);
        
        if ($req->rowCount() == 1)
         {
            $data = $req->fetch();
            return $data;
        } else{
            return false;
        }
        $req->closeCursor();
    }
}


function ajouter_plats($image, $nom, $prix, $description) {
    if (require("connexion.php")) {
        $req=$access->prepare("INSERT INTO plats (image, nom, prix, description) VALUES (?, ?, ?, ?)");
        $req->execute(array($image, $nom, $prix, $description));

        $req->closeCursor();
    }
}

    
 


function afficher_plats()
{
    if (require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM plats ORDER BY id ");
        $req->execute();
        $data=$req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
    
}

function supprimer_plats($id)
{
    if (require("connexion.php"))
    {
        $req=$access->prepare("DELETE FROM plats WHERE id=?");
        $req->execute(array($id));
    }
}

//  evenement

function ajouter_even($image) {
    if (require("connexion.php")) {
        $req=$access->prepare("INSERT INTO evenements (image) VALUES (?)");
        $req->execute(array($image));

        $req->closeCursor();
    }
}

    
function afficher_even()
{
    if (require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM evenements ORDER BY id ");
        $req->execute();
        $data=$req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
    
}

function supprimer_even($id)
{
    if (require("connexion.php"))
    {
        $req=$access->prepare("DELETE FROM evenements WHERE id=?");
        $req->execute(array($id));
    }
}

// clients

    
 


function afficher_user()
{
    if (require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM users ORDER BY id ");
        $req->execute();
        $data=$req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
    
}


function supprimer_user($id) {
    if (require("connexion.php")) {
        $req = $access->prepare("DELETE FROM users WHERE id=?");
        $req->execute(array($id));
        
        $req->closeCursor();
    }
}

// function ajouter_user($nom, $email, $password, $image) {
//     if (require("connexion.php")) {
//         $req=$access->prepare("INSERT INTO users (nom, email, image) VALUES (?, ?, ?, ?)");
//         $req->execute(array($nom, $email, $password, $image));

//         $req->closeCursor();
//     }
// }



// avis
function afficher_avis()
{
    if (require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM avis ORDER BY id_avis ");
        $req->execute();
        $data=$req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
    
}


function supprimer_avis($id) {
    if (require("connexion.php")) {
        $req = $access->prepare("DELETE FROM avis WHERE id=?");
        $req->execute(array($id));
        
        $req->closeCursor();
    }
}



// reservation

function afficher_res()
{
    if (require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM reservation ORDER BY id ");
        $req->execute();
        $data=$req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
    
}

function supprimer_res($id)
{
    if (require("connexion.php"))
    {
        $req=$access->prepare("DELETE FROM reservation WHERE id=?");
        $req->execute(array($id));
    }
}

function ajouter_res($nom, $prenom, $date_res, $heure_debut, $heure_fin, $nb_personnes, $nb_tables) {
    if (require("connexion.php")) {
        $req=$access->prepare("INSERT INTO plats (nom, prenom, date_res, heure_debut, heure_fin, nb_personnes, nb_tables) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $req->execute(array($nom, $prenom, $date_res, $heure_debut, $heure_fin, $nb_personnes, $nb_tables));

        $req->closeCursor();
    }
}



?>