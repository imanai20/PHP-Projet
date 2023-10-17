<?php

//$_SERVER => HASHMAP contenat
//information requete

function route_request(){
    $route = $_SERVER['REQUEST_URI'];

    if ($route === "/accueil"){
        
        require_once('./displayTask/controller.php');
        display_tasks();

        return;
    }

    if ($route === "/contact"){
        
        require_once('./contact/oui.php');
        display_tasks();

        return;
    }

    if ($route === "/jeu"){
        
        require_once('./jeu/non.php');
        display_tasks();

        return;
    }


    echo "<h1>404 NOT FOUND</h1>";

}
route_request();
  