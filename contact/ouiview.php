<?php
$dsn = "mysql:host=localhost;dbname=exercicephp;charset=utf8mb4";
$username = "root";
$password = "test";
$message = "";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST['delete'])) {
            $idToDelete = $_POST['delete'];
            $query = "DELETE FROM joueur WHERE id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$idToDelete]);

            $_SESSION['message'] = "Joueur supprimé avec succès.";
        } else {
            if (empty($_POST["nom"])) {
                $_SESSION['message'] = "Le champ 'Nom' est obligatoire.";
            } else {
                $nom = $_POST["nom"];
                $club = !empty($_POST["club"]) ? $_POST["club"] : null;
                $age = !empty($_POST["age"]) ? $_POST["age"] : null;
                $but = !empty($_POST["but"]) ? $_POST["but"] : null;
                $pays = !empty($_POST["pays"]) ? $_POST["pays"] : null;
                $image = !empty($_POST["image"]) ? $_POST["image"] : null;

                $query = "INSERT INTO joueur (nom, club, age, but, pays, image) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$nom, $club, $age, $but, $pays, $image]);

                $_SESSION['message'] = "Nouveau joueur ajouté avec succès.";
            }
        }
    } catch (PDOException $err) {
        $_SESSION['message'] = "Erreur de connexion : " . $err->getMessage();
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$players = array();

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM joueur";
    $stmt = $pdo->query($query);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $players[] = $row;
    }
} catch (PDOException $err) {
    $message = "Erreur de connexion : " . $err->getMessage();
}


echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<style>";
echo "body {";
echo "    font-family: Arial, sans-serif;";
echo "    background-color: #f0f0f0;";
echo "    margin: 0;";
echo "    padding: 0;";
echo "}";
echo "header {";
echo "    background-color: #333;";
echo "    color: #fff;";
echo "    text-align: center;";
echo "    padding: 10px;";
echo "}";
echo ".container {";
echo "    width: 80%;";
echo "    max-width: 800px;";
echo "    margin: 20px auto;";
echo "    background-color: #fff;";
echo "    padding: 20px;";
echo "    border-radius: 5px;";
echo "    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);";
echo "}";
echo "h1 {";
echo "    text-align: center;";
echo "}";
echo "h4 {";
echo "    text-align: center;";
echo "}";
echo "form {";
echo "    text-align: center;";
echo "}";
echo "form input {";
echo "    margin: 10px;";
echo "    padding: 5px;";
echo "}";
echo ".message {";
echo "    text-align: center;";
echo "    color: green;";
echo "}";
echo "nav {";
echo "    display: flex;";
echo "    justify-content: center;";
echo "    background-color: #333;";
echo "    padding: 10px;";
echo "}";
echo "nav a {";
echo "    margin: 0 20px;";
echo "}";
echo "nav a img {";
echo "    width: 100px;";
echo "    height: 100px;";
echo "}";
echo ".social-links {";
echo "    text-align: center;";
echo "    margin-top: 20px;";
echo "}";
echo ".social-links a {";
echo "    margin: 0 10px;";
echo "    text-decoration: none;";
echo "    font-size: 20px;";
echo "}";
echo "table {";
echo "    width: 100%;";
echo "    border-collapse: collapse;";
echo "}";
echo "table, th, td {";
echo "    border: 1px solid #000;";
echo "}";
echo "th, td {";
echo "    padding: 10px;";
echo "    text-align: left;";
echo "}";
echo "</style>";
echo "</head>";
echo "<body>";
echo "<header>";
echo "<h1>Contacte nous</h1>";
echo "</header>";
echo "<nav>";
echo "<a href='accueil'>";
echo "<img src='https://static.vecteezy.com/ti/vecteur-libre/p3/2141761-accueil-logo-et-symbole-icon-design-vector-gratuit-vectoriel.jpg' width='100' height='100' alt='Home'>";
echo "</a>";
echo "<a href='contact'>";
echo "<img src='https://thumbs.dreamstime.com/z/contact-us-icons-vector-set-web-sign-illustration-collection-communication-symbol-logo-contact-us-icons-vector-set-web-sign-167467627.jpg' width='100' height='100' alt='Contact'>";
echo "</a>";
echo "<a href='jeu'>";
echo "<img src='https://img.freepik.com/vecteurs-premium/quiz-dans-style-bande-dessinee-pop-art_175838-505.jpg' width='100' height='100' alt='jeu'>";
echo "</a>";
echo "</nav>";
echo "<h4>Créer ton jeu</h4>";
echo "<h4>Une fois le joueur ajouté il est directement disponible sur le jeu</h4>";
echo "<div class='container'>";

if (isset($_SESSION['message'])) {
    echo "<p class='message'>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
}

echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>";
echo "<input type='text' name='nom' placeholder='Nom' required>";
echo "<input type='text' name='club' placeholder='Club'>";
echo "<input type='number' name='age' placeholder='Âge'>";
echo "<input type='number' name='but' placeholder='Buts'>";
echo "<input type='text' name='pays' placeholder='Pays'>";
echo "<input type='text' name='image' placeholder='Lien de l'image'>";
echo "<input type='submit' value='Ajouter'>";
echo "</form>";
echo "<table>";
echo "<tr>";
echo "<th>Nom</th>";
echo "<th>Club</th>";
echo "<th>Âge</th>";
echo "<th>Buts</th>";
echo "<th>Pays</th>";
echo "<th>Image</th>";
echo "<th>Action</th>";
echo "</tr>";
foreach ($players as $player) {
    echo "<tr>";
    echo "<td>" . ($player['nom'] ?? '') . "</td>";
    echo "<td>" . ($player['club'] ?? '') . "</td>";
    echo "<td>" . ($player['age'] ?? '') . "</td>";
    echo "<td>" . ($player['but'] ?? '') . "</td>";
    echo "<td>" . ($player['pays'] ?? '') . "</td>";
    echo "<td><img src='" . ($player['image'] ?? '') . "' width='50' height='50'></td>";
    echo "<td><form method='post' action='" . $_SERVER['PHP_SELF'] . "'><button type='submit' name='delete' value='" . $player['id'] . "'>Supprimer</button></form></td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";
echo "</body>";
echo "</html>";
?>



