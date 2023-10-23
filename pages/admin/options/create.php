<?php
$title = "Ajouter Option";
require  "../../partials/header.php";
if($_SESSION["connected"] !== true || !isset($_SESSION["connected"])){
    header("Location: /immobilis/pages/admin/login.php");
}

require "../../components/navbar_admin.php";
?>


<main class="container p-4">
    <?php  require "../../components/flash.php";?>
    <h1>Ajouter Une option</h1>

    <form action="pages/admin/options/store.php" method="POST">
        <?php $name="name"; $label="Nom de l'option"; require "../../components/Input.php"?>
        <button class="btn btn-success">Ajouter</button>
    </form>
</main>



<?php
require  "../../partials/footer.php";
?>

