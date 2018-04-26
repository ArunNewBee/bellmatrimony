<?php 
session_start();
$_SESSION["id"] = "14";
echo "Favorite animal is " . $_SESSION["id"] . ".";

?>