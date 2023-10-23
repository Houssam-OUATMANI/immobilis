


<?php // Message flash pour les erreurs ?>
<?php if (isset($_SESSION["error"])) : ?>
    <div class="alert alert-danger m-auto w-50 text-center"><?=$_SESSION["error"]?></div>
<?php endif;?>


<?php // Message flash pour les success ?>
<?php if (isset($_SESSION["success"])) : ?>
    <div class="alert alert-success m-auto w-50 text-center"><?=$_SESSION["success"]?></div>
<?php endif;?>
