<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="affiche.css">
    <title>Avis des clients</title>
</head>

<body>
    <div class="container">
        <h1>Avis des clients</h1>
        <div class="avis-list">
            <?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erreur de connexion à la base de données');
            }
            $stmt = $bdd->query("SELECT review, rating FROM avis");
            $avis = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Afficher les avis
            foreach ($avis as $row) {
                $review = $row['review'];
                $rating = $row['rating'];

                echo "<p>Avis : " . $review . "</p>";
                echo "<p>Évaluation : " . $rating . "</p><br>";
            }

            // Récupérer l'ID et le nom de l'utilisateur à partir de la base de données
            session_start(); // Démarrer la session
            
            if (isset($_SESSION['id'])) {
                $userID = $_SESSION['user_id'];
                $stmt = $bdd->prepare("SELECT id, nom FROM users WHERE id = :id");
                $stmt->bindParam(':id', $userID);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    // Récupérer les données de l'utilisateur
                    $row = $stmt->fetch();
                    $nomUtilisateur = $row['nom'];

                    // Récupérer les données du formulaire d'avis
                    $rating = $_POST['rating'] ?? '';
                    $review = $_POST['review'] ?? '';

                    // Préparer la requête SQL pour insérer l'avis dans la table 'avis'
                    $stmt = $bdd->prepare("INSERT INTO avis (id, nomUtilisateur, rating, review) VALUES (:id, :nomUtilisateur, :rating, :review)");
                    $stmt->bindParam(':id', $userID);
                    $stmt->bindParam(':nomUtilisateur', $nomUtilisateur);
                    $stmt->bindParam(':rating', $rating);
                    $stmt->bindParam(':review', $review);
                    $stmt->execute();

                    echo "L'avis a été enregistré avec succès.";
                } else {
                    echo "Utilisateur non trouvé.";
                }
            } else {
                echo "ID d'utilisateur non défini.";
            }
            ?>
        </div>
    </div>
</body>

</html>
