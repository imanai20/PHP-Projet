<?php
$dsn = "mysql:host=localhost;dbname=exercicephp;charset=utf8mb4";
$username = "root";
$password = "test";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM joueur"; 

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $joueurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "    <style>";
    echo "        body {";
    echo "            font-family: Arial, sans-serif;";
    echo "            background-color: #f0f0f0;";
    echo "            margin: 0;";
    echo "            padding: 0;";
    echo "        }";
    echo "        header {";
    echo "            background-color: #333;";
    echo "            color: #fff;";
    echo "            text-align: center;";
    echo "            padding: 10px;";
    echo "        }";
    echo "        .container {";
    echo "            width: 80%;";
    echo "            max-width: 800px;";
    echo "            margin: 20px auto;";
    echo "            background-color: #fff;";
    echo "            padding: 20px;";
    echo "            border-radius: 5px;";
    echo "            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);";
    echo "        }";
    echo "        .player {";
    echo "            border: 1px solid #ccc;";
    echo "            padding: 10px;";
    echo "            margin: 10px 0;";
    echo "        }";
    echo "        .player img {";
    echo "            max-width: 100%;";
    echo "            height: auto;";
    echo "            display: block;";
    echo "            margin: 10px auto;";
    echo "        }";
    echo "        h2 {";
    echo "            color: #333;";
    echo "        }";
    echo "        hr {";
    echo "            border: 1px solid #ccc;";
    echo "            margin: 10px 0;";
    echo "        }";
    echo "        .image-button {";
    echo "            background-color: #0074d9;";
    echo "            color: #fff;";
    echo "            padding: 5px 10px;";
    echo "            text-decoration: none;";
    echo "            border-radius: 5px;";
    echo "        }";
    echo "    </style>";
    echo "    <script>";
    echo "        function toggleImageAndName(playerId) {";
    echo "            var image = document.getElementById('image_' + playerId);";
    echo "            var name = document.getElementById('name_' + playerId);";
    echo "            if (image.style.display === 'none' || image.style.display === '') {";
    echo "                image.style.display = 'block';";
    echo "                name.style.display = 'block';";
    echo "            } else {";
    echo "                image.style.display = 'none';";
    echo "                name.style.display = 'none';";
    echo "            }";
    echo "        }";
    echo "    </script>";
    echo "</head>";
    echo "<body>";
    echo "<header>";
    echo "    <h1>Liste des Joueurs</h1>";
    echo "    <nav>";
    echo "        <a href='accueil'>";
    echo "            <img src='https://static.vecteezy.com/ti/vecteur-libre/p3/2141761-accueil-logo-et-symbole-icon-design-vector-gratuit-vectoriel.jpg' width='100' height='100' alt='home'>";
    echo "        </a>";
    echo "        <a href='contact'>";
    echo "            <img src='https://thumbs.dreamstime.com/z/contact-us-icons-vector-set-web-sign-illustration-collection-communication-symbol-logo-contact-us-icons-vector-set-web-sign-167467627.jpg' width='100' height='100' alt='contact'>";
    echo "        </a>";
    echo "    </nav>";
    echo "</header>";
    echo "<div class='container'>";

    foreach ($joueurs as $joueur) {
        echo "    <div class='player'>";
        echo "        <p>Pays : " . $joueur['pays'] . "</p>";
        echo "        <p>Club : " . $joueur['club'] . "</p>";
        echo "        <p>Age : " . $joueur['age'] . "</p>";
        echo "        <p>But : " . $joueur['but'] . "</p>";
        echo "        <p><a href='javascript:void(0);' onclick='toggleImageAndName(" . $joueur['id'] . ")' class='image-button'>📷 Image</a></p>";
        echo "        <img id='image_" . $joueur['id'] . "' src='" . $joueur['image'] . "' alt='Image du joueur' style='display: none;'>";
        echo "        <p id='name_" . $joueur['id'] . "' style='display: none;'>Nom : " . $joueur['nom'] . "</p>";
        echo "        <hr>";
        echo "    </div>";
    }

    echo "</div>";
    echo "</body>";
    echo "</html>";
} catch (PDOException $err) {
    die("Erreur de connexion : " . $err->getMessage());
}
?>
