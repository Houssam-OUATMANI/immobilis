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

?>

<div class="container">
    <h1>Detail du bien</h1>

    <div class="card">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <?php foreach($p["images"] as $i=>$image) :?>
                    <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>" ">
                        <img class="d-block w-100 h-50 object-cover" src="/immobilis/public/<?=$image ?>" alt="Second slide">
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</div>
