<?php
$title = "Ajouter uun bien";
require  "../../partials/header.php";
if($_SESSION["connected"] !== true || !isset($_SESSION["connected"])){
    header("Location: /immobilis/pages/admin/login.php");
}

require "../../components/navbar_admin.php";

require "../../../database/connexion.php";
require "../../../database/Option.php";
require "../../../database/PropertyType.php";

$pdo = Database::dbConnexion();
$option = new  Option($pdo);
$propertyType = new PropertyType($pdo);

$options = $option->findAll();
$propertyTypes = $propertyType->findAll();



?>


<main class="container p-4">
    <?php  require "../../components/flash.php";?>
    <h1>Ajouter un bien</h1>

    <form action="pages/admin/properties/store.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <?php $name="title"; $label="Titre du bien"; require "../../components/Input.php"?>
                <?php $name="price"; $label="Prix";  $type="number"; require "../../components/Input.php"?>
                <?php $name="rooms"; $label="Nombre de chambres";  $type="number"; require "../../components/Input.php"?>
                <?php $name="floor"; $label="Etage";  $type="number"; require "../../components/Input.php"?>
                <?php $name="bedrooms"; $label="Nombre de chambres a coucher";  $type="number"; require "../../components/Input.php"?>
                <?php $name="bathrooms"; $label="Nombre de salles de bains";  $type="number"; require "../../components/Input.php"?>
                <?php $name="images[]"; $type="file";  $multiple=true; $label="images"; require "../../components/Input.php"?>
                <?php $name="surface"; $type="number"; $label="Surface"; require "../../components/Input.php"?>

            </div>
            <div class="col">
                <?php $name="number"; $type="number"; $label="Numero"; require "../../components/Input.php"?>
                <?php $name="street"; $type="text"; $label="Rue"; require "../../components/Input.php"?>
                <?php $name="city"; $type="text"; $label="Ville"; require "../../components/Input.php"?>
                <?php $name="zipcode"; $type="text"; $label="Code postal"; require "../../components/Input.php"?>
                <?php $name="description"; $type="textarea"; $label="Description"; require "../../components/Input.php"?>
                <?php $name="type"; $multiple=false; $label="Type de bien"; $value=$propertyTypes; require "../../components/Select.php"?>
                <?php $name="options[]"; $multiple=true; $label="Options"; $value=$options; require "../../components/Select.php"?>


            </div>
        </div>


        <button class="btn btn-success">Ajouter</button>
    </form>
</main>



<?php
require  "../../partials/footer.php";
?>

