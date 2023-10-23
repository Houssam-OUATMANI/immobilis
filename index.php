<?php
$title = "Immobilis votre agent immobiler";
require "pages/partials/header.php";
require "pages/components/navbar.php";

require "database/connexion.php";
require "database/Admin.php";
$pdo = Database::dbConnexion();
$admin = new Admin($pdo);
if( count( $admin->getAdmins())  === 0 ) {
    $admin->createAdmin();
};
?>
<div class="container">
    <?php  require  "pages/components/flash.php";?>
    <h1 class="text-center">Page d'accueil</h1>
</div>


<?php require "pages/partials/footer.php"?>