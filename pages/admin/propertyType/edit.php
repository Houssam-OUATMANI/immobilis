<?php
$title = "Modifier un type";
require "../../partials/header.php";
if($_SESSION["connected"] !== true || !isset($_SESSION["connected"])){
    header("Location: /immobilis/pages/admin/login.php");
}
require  "../../components/navbar_admin.php";
require "../../../database/connexion.php";
require "../../../database/PropertyType.php";

$pdo = Database::dbConnexion();
$propertyType = new PropertyType($pdo);
$id =  intval(htmlentities($_GET["id"]));
$pt = $propertyType->findById($id);
?>

<main class="container p-4">
    <h1>Modifier le type <?= $pt["name"] ?></h1>

    <form action="pages/admin/propertyType/update.php" method="POST">
        <?php $value=$pt["name"]; $name="name"; $label="Nom du type de bien"; require "../../components/Input.php"?>
        <?php $value=$pt["id"]; $name="id"; $type="hidden"; $label=""; require "../../components/Input.php"?>
        <button class="btn btn-success">Modifier</button>
    </form>
</main>


<?php
require "../../partials/footer.php";
?>
