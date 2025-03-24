<?php
include "admin_auth.php";
include "admin_header.php";
include "admin_database.php";
include "Controller/RatingEditController.php";

$ratingId = isset($_GET['id']) ? intval($_GET['id']) : 0;

$ratingController = new RatingController($con);

// Handle POST request
$error = $ratingController->handlePostRequest($ratingId);

// Fetch data for dropdowns and rating details
$rating = $ratingController->getRatingById($ratingId);
$users = $ratingController->getUsers();
$movies = $ratingController->getMovies();

include "View/RatingEditView.php";
?>
