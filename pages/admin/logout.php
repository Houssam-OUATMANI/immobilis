<?php
session_start();
$method = $_SERVER["REQUEST_METHOD"];
if($method !== "POST" || !isset($_SESSION["connected"]) || $_SESSION["connected"] !== true ) {
    header("Location: /immobilis/index.php");
}
$_SESSION["success"] = "Vous etes deconneter";
header("Location: /immobilis/index.php");
session_destroy();


