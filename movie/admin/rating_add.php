<?php
include "admin_auth.php";
include "admin_header.php";
include "admin_database.php";
include "Controller/RatingAddController.php";

$ratingController = new RatingController($con);

// Handle POST request
$error = $ratingController->handlePostRequest();

// Fetch data for dropdowns
$users = $ratingController->getUsers();
$movies = $ratingController->getMovies();

include "View/RatingAddView.php";
?>
