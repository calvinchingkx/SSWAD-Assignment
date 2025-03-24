<?php
include "admin_auth.php";
include 'admin_database.php';

if (isset($_GET['movieId'])) {
    $movieId = intval($_GET['movieId']);
    $picturePath = "../image/pic" . $movieId . ".jpg";

    if (file_exists($picturePath)) {
        unlink($picturePath);
    }
    $sql = "DELETE FROM movie WHERE movieId = $movieId";
    if ($con->query($sql) === TRUE) {
        header('Location: movie_details.php');
        exit();
    } else {
        echo "Error deleting record: " . $con->error;
    }
} else {
    header('Location: movie_details.php');
    exit();
}
?>