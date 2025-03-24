<?php

include "admin_auth.php";
include "admin_database.php";
include "Controller/MovieAddController.php";

$movieController = new MovieController($con);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $movieName = mysqli_real_escape_string($con, $_POST['movieName']);
    $movieDescription = mysqli_real_escape_string($con, $_POST['movieDescription']);
    $movieType = mysqli_real_escape_string($con, $_POST['movieType']);
    $movieYear = mysqli_real_escape_string($con, $_POST['movieYear']);
    $movieActor = mysqli_real_escape_string($con, $_POST['movieActor']);
    $adminId = $_SESSION['admin_id'];
    $moviePicture = $_FILES["moviePicture"];

    $message = $movieController->addMovie($movieName, $movieDescription, $movieType, $movieYear, $movieActor, $adminId, $moviePicture);

    echo "<meta http-equiv='refresh' content='0;url=movie_details.php'>";
    exit();
}

include "View/MovieAddView.php";
?>