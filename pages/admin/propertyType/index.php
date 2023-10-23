<?php
$title = "Listing type de bien";
require "../../partials/header.php";
if($_SESSION["connected"] !== true || !isset($_SESSION["connected"])){
    header("Location: /immobilis/pages/admin/login.php");
}
require "../../components/navbar_admin.php";

require "../../../database/connexion.php";
require "../../../database/PropertyType.php";
$pdo = Database::dbConnexion();
$propertyType = new PropertyType($pdo);
$propertyTypes =  $propertyType->findAll();

?>


<main class="container p-4">
        <?php require "../../components/flash.php"?>
      <h1 class="text-center">Listing type de bien</h1>

        <table class="table border">
            <thead>
                <tr>
                    <th>Type de bien</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php  foreach ($propertyTypes as $pt): ?>
                    <tr>
                        <td><?= $pt["name"] ?></td>
                        <td>
                            <a class="nav-link text-info" href="pages/admin/propertyType/edit.php?id=<?=$pt["id"]?>">Modifier</a>
                            <form action="pages/admin/propertyType/destroy.php" method="post">
                                <input type="hidden" value="<?=$pt["id"]?>" name="id">
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
