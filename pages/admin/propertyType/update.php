<?php
session_start();
if($_SESSION["connected"] !== true || !isset($_SESSION["connected"])){
    header("Location: /immobilis/pages/admin/login.php");
}
if($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /immobilis/pages/admin/login.php");
};


if(!empty($_POST) && isset($_POST["name"]) && isset($_POST["id"])) {

            $id = intval(htmlentities($_POST["id"]));
            $name = htmlentities($_POST["name"]);
            require  "../../../database/connexion.php";
            require  "../../../database/PropertyType.php";
            $pdo = Database::dbConnexion();
            $propertyType = new PropertyType($pdo);
            $result = $propertyType->updateById($id, $name);
           if($result) {
               $_SESSION["success"] = "Le type a ete mis a jour";
           }
           else {
               $_SESSION["error"] = "Erreur lors de la mise a jour";
           }

           header("Location: /immobilis/pages/admin/propertyType/index.php");
}