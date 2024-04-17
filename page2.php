
<!DOCTYPE html>
<html lang="fr">

<head>
<link rel="shortcut icon" href="images/114logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>reponse</title>
    <body>


    <?php include'header.php'  ?>
    <div class="message-box">
    <p class="message-text">
    <?php

if (isset($_GET['message'])) {
    $message = urldecode($_GET['message']);

    // Afficher le message
    echo $message;
}
?>
    </p>
</div >

    <style>
       body {
            background-color: hwb(26 78% 13%);
        }
         .message-box {
            margin-top:20%;
            margin-bottom: 20%;
            margin-left: 30%;
            margin-right: 30%;
            text-align: center;
            background-color: #C9B4A3;
            border: 1px solid #ccc;
            padding: 20px;
        }

        /* Style du texte du message */
        .message-text {
            font-size: 18px;
            margin-bottom: 10px;
        }

        /* Style du lien */
        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        
    </style>

    <script src="reserver.js"></script>
    <?php include'footer.php' ?>
 

</body>

</html>
