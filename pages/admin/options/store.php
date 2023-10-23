<?php
session_start();
if($_SESSION["connected"] !== true || !isset($_SESSION["connected"])){
    header("Location: /immobilis/pages/admin/login.php");
}
if($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /immobilis/pages/admin/login.php");
};


if(!empty($_POST) && isset($_POST["name"])){
    require "../../../database/connexion.php";
    require "../../../database/Option.php";
    $pdo = Database::dbConnexion();
    $option = new Option($pdo);
    $name = htmlentities($_POST["name"]);
    $result = $option->store($name);
    if($result) {
        $_SESSION["success"] = "L'option bien a ete ajoute";
    }
    else {
        $_SESSION["error"] = "Erreur lors de l'ajout";
    }
    header("Location: /immobilis/pages/admin/options/create.php");
}




