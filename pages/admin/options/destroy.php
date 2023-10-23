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
    require "../../../database/Option.php";

    $pdo = Database::dbConnexion();
    $option = new Option($pdo);

    $result = $option->deleteById($id);

    if($result) {
        $_SESSION["success"] = "l'option a ete supprime";
    }
    else {
        $_SESSION["error"] = "erreur lors de la suppression";
    }
    header("Location: /immobilis/pages/admin/options/index.php");
}