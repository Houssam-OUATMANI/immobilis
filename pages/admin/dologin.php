<?php
session_start();
if($_SERVER["REQUEST_METHOD"] === "GET") {
    header("Location: /immobilis/pages/admin/login.php");
};

if (!empty($_POST) && isset($_POST["email"]) && isset($_POST["password"])) {

    require "../../database/connexion.php";
    require "../../database/Admin.php";

    $pdo = Database::dbConnexion();
    $admin = new Admin($pdo);


    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["password"]);
     $user = $admin->getAdminByEmail($email);
     // TODO si l'admin n'existe pas on renvoi vers la page de login
     if(!$user){
         $_SESSION["error"] = "Email invalide";
         header("Location: /immobilis/pages/admin/login.php");
     }
     else {
        $match = password_verify($password, $user["password"]);
        if(!$match) {
            $_SESSION["error"] = "Mot de passe invalide";
            header("Location: /immobilis/pages/admin/login.php");
        }
        else {
            // TODO Creation de session
            $_SESSION["connected"] = true;
            $_SESSION["admin_id"] = $user["id"];
            $_SESSION["success"] = "Vous etes connecte";
            header("Location: /immobilis/pages/admin/dashboard.php");
        }
     }
}