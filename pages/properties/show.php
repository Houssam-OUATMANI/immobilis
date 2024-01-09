<?php
$title = "Voir le bien";
// Import du header
require "../partials/header.php";
require  "../components/navbar.php";

if(!empty($_GET) && isset($_GET["id"]))
    require "../../database/connexion.php";
    require "../../database/Property.php";

    $id = intval($_GET["id"]);
    $pdo = Database::dbConnexion();
    $property = new Property($pdo);
    $p =json_decode( $property->findById($id)["property"], true);
    var_dump($p);

?>

<div class="container">
    <h1 class="text-center"><?= $p["title"] ?></h1>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <?php foreach ($p['images'] as $index=>$imagePath) :?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>  ">
                    <img src="public/<?=$imagePath?>" class="d-block w-100" alt="...">
                </div>
            <?php endforeach;?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>



        <p><?= $p["description"]?></p>

        <section>
            <h3>Information complementaires</h3>
            <p>Nombre de chambre: <?=$p["rooms"] ?></p>
        </section>


        <section>
            <h3 class="text-center">Nous contacter pour ce bien</h3>

            <form action="pages/properties/contact.php" method="post" class="w-50 mx-auto">
                <input type="hidden" name="property_id" value="<?=$p["id"]?>">
                <?php $label="Prénom"; $name="firstname";   require "../components/Input.php"?>
                <?php $label="Nom"; $name="lastname";   require "../components/Input.php"?>
                <?php $label="Email"; $name="email"; $type="email";   require "../components/Input.php"?>
                <?php $label="Votre message"; $name="message";  $type="textarea";  require "../components/Input.php"?>
                <button class="btn btn-outline-primary">Envoyer</button>
            </form>
        </section>

    </div>


