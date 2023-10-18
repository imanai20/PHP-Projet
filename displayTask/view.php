<?php
function display_tasks_view(array $tasks) {
    echo '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #333;
            padding: 10px;
        }

        nav a {
            margin: 0 10px;
            text-decoration: none;
            color: white;
        }

        nav img {
            border: none;
        }

        div {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        div[id^="tabContent"] {
            display: none;
        }

        img {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>StatsPRO</h1>
    <nav>
        <a href="accueil">
            <img src="https://static.vecteezy.com/ti/vecteur-libre/p3/2141761-accueil-logo-et-symbole-icon-design-vector-gratuit-vectoriel.jpg" width="100" height="100" alt="home">
        </a>
        <a href="contact">
            <img src="https://thumbs.dreamstime.com/z/contact-us-icons-vector-set-web-sign-illustration-collection-communication-symbol-logo-contact-us-icons-vector-set-web-sign-167467627.jpg" width="100" height="100" alt="contact">
        </a>
    </nav>

    <div>
';

echo '
<button id="tabButton1">Règle 1</button>
<div id="tabContent1">
    <span>Trouves le joueur grâce à certaines informations</span>
</div>';

echo '
<button id="tabButton2">Règle 2</button>
<div id="tabContent2">
    <span>Ne triches pas</span>
</div>';

    echo '
    <button id="tabButton3">Règle 3</button>
    <div id="tabContent3">
        <span>Attention il peut avoir des pièges</span>
    </div>';

    echo '
    <button id="tabButton4">Règle 4</button>
    <div id="tabContent4">
        <span>Amusez vous bien</span>
    </div>';

    echo '
    </div>

    <br>
    <a href="jeu">
        <img src="https://img.freepik.com/vecteurs-premium/quiz-dans-style-bande-dessinee-pop-art_175838-505.jpg" width="200" height="200" alt="test">
    </a>

    <script>
        
        const tabButtons = document.querySelectorAll("button[id^=\'tabButton\']");
        const tabContents = document.querySelectorAll("div[id^=\'tabContent\']");

        tabButtons.forEach((button, index) => {
            button.addEventListener("click", () => {
                
                tabContents.forEach(content => {
                    content.style.display = "none";
                });

                
                tabContents[index].style.display = "block";
            });
        });
    </script>
</body>
</html>
';
}
?>

