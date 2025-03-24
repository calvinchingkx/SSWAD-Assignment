<?php

require_once 'database.php';

class UserModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    // Add this method to allow access to the connection
    public function getConnection() {
        return $this->con;
    }

    public function getUserById($user_id) {
        $query = mysqli_query($this->con, "SELECT * FROM users WHERE id = '$user_id'");
        return mysqli_fetch_assoc($query);
    }

    public function updateUserProfile($user_id, $name, $email, $gender) {
        $query = "UPDATE users SET name = '$name', email = '$email', gender = '$gender' WHERE id = '$user_id'";
        return mysqli_query($this->con, $query);
    }

    public function updateUserPassword($user_id, $newPasswordHash) {
        $query = "UPDATE users SET password = '$newPasswordHash' WHERE id = '$user_id'";
        return mysqli_query($this->con, $query);
    }
}
?>
