<?php
session_start();
if($_SESSION["connected"] !== true || !isset($_SESSION["connected"])){
    header("Location: /immobilis/pages/admin/login.php");
}


// TODO FORMULAIRE

if(!empty($_POST) ) {
       // PROPERTY
        $title = htmlentities($_POST["title"]);
        $price = intval($_POST["price"]);
        $rooms = intval($_POST["rooms"]);
        $floor = intval($_POST["floor"]);
        $bedrooms = intval($_POST["bedrooms"]);
        $bathrooms = intval($_POST["bathrooms"]);
        $surface = intval($_POST["surface"]);
        $description = htmlentities($_POST["description"]);
        $typeId = intval($_POST["type"]);
        $images = [];
        $optionsIds = [];

        // ADDRESS
        $number = intval($_POST["number"]);
        $street = htmlentities($_POST["street"]);
        $city = htmlentities($_POST["city"]);
        $zipcode = htmlentities($_POST["zipcode"]);

        // Conversion et ajout des identifiants des options dans le tableau optionsIDs
        foreach ($_POST["options"] as $o) {
            array_push($optionsIds, intval($o));
        }

        // GESTION DES IMAGES (STOCKAGE DANS LE SERVEUR WEB)
        $fileNames = $_FILES["images"]["name"];
        $tmpNames = $_FILES["images"]["tmp_name"];
        $documentRoot = $_SERVER["DOCUMENT_ROOT"];
        var_dump($documentRoot);
        for ($i = 0; $i < count($fileNames); $i++) {
            $fileName =  uniqid() . basename( $fileNames[$i] );
            $filePath = "storage/property/$fileName";
            array_push($images, $filePath);
           $result =  move_uploaded_file($tmpNames[$i], "$documentRoot/immobilis/public/$filePath");
           var_dump($result);
        }

        require  "../../../database/connexion.php";
        require  "../../../database/Property.php";
        require  "../../../database/Address.php";
        require  "../../../database/PropertyOption.php";



        $pdo = Database::dbConnexion();
        $property = new Property($pdo);
        $address = new Address($pdo);
        $propertyOption = new PropertyOption($pdo);

        $addressId = $address->store($number, $street, $city, $zipcode);
        $propertyId = $property->store($title,
                        $price,
                        $surface,
                        $rooms,
                        $floor,
                        $bedrooms,
                        $bathrooms,
                        $description,
                        json_encode($images),
                        $typeId,
                        $addressId);
       $result =  $propertyOption->store($propertyId, $optionsIds);

       if($result) {
           $_SESSION["success"] = "Le bien immobilier a ete ajoute";
       }
       else {
           $_SESSION["error"] = "Erreur lors de l'ajout";
       }

       header("Location: /immobilis/pages/admin/properties/create.php");










}