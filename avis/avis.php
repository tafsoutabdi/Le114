<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données envoyées par le formulaire
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    // Enregistrer les avis dans une base de données
    // Exemple de connexion à une base de données MySQL avec PDO
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projet";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer et exécuter la requête d'insertion des avis
        $stmt = $conn->prepare("INSERT INTO avis (review, rating) VALUES (:review, :rating)");
        $stmt->bindParam(':review', $review);
        $stmt->bindParam(':rating', $rating);
        $stmt->execute();

        // Rediriger l'utilisateur vers une page de confirmation ou afficher un message de succès
        header("Location: affiche_avis.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="avisstyle.css">
    <title>avis</title>
</head>

<body>
    <form method="POST">
        <label for="review">Laissez votre avis :</label>
        <textarea id="review" name="review" rows="4" cols="50"></textarea>

        <p>Évaluation :</p>
        <div class="rating">
            <input type="radio" id="star5" name="rating" value="5">
            <label for="star5"></label>
            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4"></label>
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3"></label>
            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2"></label>
            <input type="radio" id="star1" name="rating" value="1">
            <label for="star1"></label>
        </div>

        <input type="submit" value="Envoyer">
    </form>



    <script src="avis.js"></script>

</body>

</html>