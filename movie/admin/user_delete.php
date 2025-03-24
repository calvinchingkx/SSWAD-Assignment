<?php
include "admin_auth.php";
include 'admin_database.php';

// Check if the 'id' parameter is set
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    
    // Define the file path for the profile picture
    $filePath = "../avatar/user" . $userId . ".jpg";
    
    // Delete the user record from the database
    $sql = "DELETE FROM users WHERE id = $userId";
    if ($con->query($sql) === TRUE) {
        // Check if the profile picture exists
        if (file_exists($filePath)) {
            // Attempt to delete the file
            if (unlink($filePath)) {
                // Optionally, you can redirect with a success message
                header('Location: user_details.php');
                exit();
            } else {
                // Handle file deletion error
                echo "Error deleting profile picture.";
            }
        } else {
            // Redirect if file does not exist
            header('Location: user_details.php');
            exit();
        }
    } else {
        echo "Error deleting user: " . $con->error;
    }
} else {
    // Redirect if 'id' parameter is missing
    header('Location: user_details.php');
    exit();
}
?>
