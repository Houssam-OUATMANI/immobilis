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
    require "../../../database/PropertyType.php";
    $pdo = Database::dbConnexion();
    $propertyType = new PropertyType($pdo);
    $name = htmlentities($_POST["name"]);
    $result = $propertyType->store($name);
    if($result) {
        $_SESSION["success"] = "Le type de bien a ete ajoute";
    }
    else {
        $_SESSION["error"] = "Erreur lors de l'ajout";
    }
    header("Location: /immobilis/pages/admin/propertyType/create.php");
}




