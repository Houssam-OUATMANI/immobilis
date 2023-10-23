<?php
$title = "Modifier un type";
require "../../partials/header.php";
if($_SESSION["connected"] !== true || !isset($_SESSION["connected"])){
    header("Location: /immobilis/pages/admin/login.php");
}
require  "../../components/navbar_admin.php";
require "../../../database/connexion.php";
require "../../../database/Option.php";

$pdo = Database::dbConnexion();
$option = new Option($pdo);
$id =  intval(htmlentities($_GET["id"]));
$o = $option->findById($id);
?>

<main class="container p-4">
    <h1>Modifier l'option <?= $o["name"] ?></h1>

    <form action="pages/admin/options/update.php" method="POST">
        <?php $value=$o["name"]; $name="name"; $label="Nom de l'option"; require "../../components/Input.php"?>
        <?php $value=$o["id"]; $name="id"; $type="hidden"; $label=""; require "../../components/Input.php"?>
        <button class="btn btn-success">Modifier</button>
    </form>
</main>


<?php
require "../../partials/footer.php";
?>
