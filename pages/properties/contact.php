<?php
session_start();
$method = $_SERVER["REQUEST_METHOD"];
if($method !== "POST") {
    header("Location: /immobilis/index.php");
}

if(!empty($_POST) && isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['email'])  && isset($_POST['message'])  ) {
    require "../../database/Property.php";
    require "../../database/connexion.php";
    $pdo = Database::dbConnexion();
    $property = new Property($pdo);

    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $email = htmlentities($_POST['email']);
    $message = htmlentities($_POST['messsage']);
    $propertyId = intval($_POST['property_id']);

    $success = $property->contact($firstname, $lastname, $email, $message, $propertyId);

    if($success) {
        $_SESSION["success"] = "Votre message a bien été pris en compte";
        ini_set("smtp_port", 1025);
        ini_set("sendmail_from", "immobilis@noreply.com");
        $html = "<h1>Votre message a bien été pris en compte</h1>";
        mail($email, "Demande contact", $html );
    }
    else {
        $_SESSION["error"] = "Erreur lors de l'envoie de votre demande";

    }
    header("Location: /immobilis/index.php");
    session_destroy();
}


