<?php

session_start();

session_unset();

session_destroy();

session_start();

$_SESSION["message"] = "Vous êtes maintenant déconnecté.";

header("Location: index.php");
exit;