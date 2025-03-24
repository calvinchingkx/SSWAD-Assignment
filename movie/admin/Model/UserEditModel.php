<?php
require "admin_database.php";

class UserEditModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getUserById($userId) {
        $sql = "SELECT name, email, gender FROM users WHERE id = $userId";
        $result = $this->con->query($sql);
        if ($result->num_rows == 0) {
            return null;
        }
        return $result->fetch_assoc();
    }

    public function updateUser($userId, $name, $email, $gender) {
        $name = mysqli_real_escape_string($this->con, $name);
        $email = mysqli_real_escape_string($this->con, $email);
        $gender = mysqli_real_escape_string($this->con, $gender);

        $sql = "UPDATE users SET name = '$name', email = '$email', gender = '$gender' WHERE id = $userId";
        return $this->con->query($sql);
    }
}
?>
