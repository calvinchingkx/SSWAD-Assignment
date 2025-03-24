<?php
session_start();
require 'database.php';
require 'Model/login_model.php';

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $accountType = mysqli_real_escape_string($con, $_POST['account_type']);

    if ($accountType == 'user') {
        $table = 'users';
        $redirectPage = 'index.php';
        $idColumn = 'id';
        $nameColumn = 'name';
        $sessionId = 'user_id';
        $sessionName = 'user_name';
    } elseif ($accountType == 'admin') {
        $table = 'admins';
        $redirectPage = 'admin/movie_details.php';
        $idColumn = 'id';
        $nameColumn = 'name';
        $sessionId = 'admin_id';
        $sessionName = 'admin_name';
    } else {
        $error[] = 'Invalid account type!';
        $table = '';
    }

    if ($table) {
        $user = getUserByEmail($email, $table);

        if ($user) {
            if (password_verify($pass, $user['password'])) {
                // Set session variables based on account type
                $_SESSION[$sessionId] = $user[$idColumn];
                $_SESSION[$sessionName] = $user[$nameColumn];

                header("Location: $redirectPage");
                exit();
            } else {
                $error[] = 'Incorrect email or password!';
            }

        } else {
            $error[] = 'Incorrect email or password!';
        }
    }
}

// Load the login view
include 'View/login_view.php';
?>
