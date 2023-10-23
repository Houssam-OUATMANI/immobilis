<?php
$title = "Listing type de bien";
require "../../partials/header.php";
if($_SESSION["connected"] !== true || !isset($_SESSION["connected"])){
    header("Location: /immobilis/pages/admin/login.php");
}
require "../../components/navbar_admin.php";

require "../../../database/connexion.php";
require "../../../database/Option.php";
$pdo = Database::dbConnexion();
$option = new Option($pdo);
$options =  $option->findAll();

?>


<main class="container p-4">
        <?php require "../../components/flash.php"?>
      <h1 class="text-center">Listing  des options</h1>

        <table class="table border">
            <thead>
                <tr>
                    <th>Nom de l'option</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php  foreach ($options as $o): ?>
                    <tr>
                        <td><?= $o["name"] ?></td>
                        <td>
                            <a class="nav-link text-info" href="pages/admin/options/edit.php?id=<?=$o["id"]?>">Modifier</a>
                            <form action="pages/admin/options/destroy.php" method="post">
                                <input type="hidden" value="<?=$o["id"]?>" name="id">
                                <button class="nav-link text-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
            <?php endforeach; ?>

            </tbody>

        </table>

</main>



<?php
require "../../partials/footer.php"; ?>
