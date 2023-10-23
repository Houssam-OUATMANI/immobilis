<?php
$title = "Ajouter un type de bien";
require  "../../partials/header.php";
if($_SESSION["connected"] !== true || !isset($_SESSION["connected"])){
    header("Location: /immobilis/pages/admin/login.php");
}

require "../../components/navbar_admin.php";
?>


<main class="container p-4">
    <?php  require "../../components/flash.php";?>
    <h1>Ajouter un type de bien</h1>

    <form action="pages/admin/propertyType/store.php" method="POST">
        <?php $name="name"; $label="Nom du type de bien"; require "../../components/Input.php"?>
        <button class="btn btn-success">Ajouter</button>
    </form>
</main>



<?php
require  "../../partials/footer.php";
?>

