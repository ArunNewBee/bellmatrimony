<?php
session_start();
			$_SESSION = array();

	setcookie("id", '', strtotime( '-5 days' ), '/');
    setcookie("username", '', strtotime( '-5 days' ), '/');
	setcookie("password", '', strtotime( '-5 days' ), '/');

// Destroy the session variables
session_destroy();
header("Location:index.php");
?>