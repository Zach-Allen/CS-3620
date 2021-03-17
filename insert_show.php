<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('./show/show.php');

$show = new show();
$show->setShowName($_POST["show_name"]);
$hero->setShowRating($_POST["show_rating"]);
$hero->setShowDescription($_POST["show_description"]);
$hero->createShow(); 

header("Location: dashboard.php");
?>