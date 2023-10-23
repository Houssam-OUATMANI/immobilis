<?php
session_start();
if($_SESSION["connected"] !== true || !isset($_SESSION["connected"])){
    header("Location: /immobilis/pages/admin/login.php");
}
if($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /immobilis/pages/admin/login.php");
};


if(!empty($_POST) && isset($_POST["id"])) {
    $id = intval(htmlentities($_POST["id"]));

    require "../../../database/connexion.php";
    require "../../../database/PropertyType.php";

    $pdo = Database::dbConnexion();
    $propertyType = new PropertyType($pdo);

    $result = $propertyType->deleteById($id);

    if($result) {
        $_SESSION["success"] = "le type a ete supprime";
    }
    else {
        $_SESSION["error"] = "erreur lors de la suppression";
    }

    header("Location: /immobilis/pages/admin/propertyType/index.php");
}