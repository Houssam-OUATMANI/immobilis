<?php
$title = "Connexion Admin";
// Import du header
require "../partials/header.php";
require  "../components/navbar.php";
?>
    <div class="container">
        <?php require  "../components/flash.php";?>
        <h1 class="text-center">Connexion Admin</h1>


        <form action="pages/admin/dologin.php" method="post">
            <?php  $type="email"; $label = "Email";  $name = "email";  require "../components/Input.php";?>
            <?php  $type="password"; $label = "Mot de paase";  $name = "password";  require "../components/Input.php";?>
            <button type="submit" class="mt-2 btn btn-info">Connexion</button>
        </form>
    </div>



<?php
// Import du footer
require  "../partials/footer.php"
?>
