<?php
include "admin_auth.php";
include 'admin_database.php';

if (isset($_GET['id'])) {
    $ratingId = intval($_GET['id']);
    $sql = "DELETE FROM rating WHERE ratingId = $ratingId";
    
    if ($con->query($sql) === TRUE) {
        header('Location: rating_details.php');
        exit();
    }
} else {
    header('Location: rating_details.php');
    exit();
}

?>