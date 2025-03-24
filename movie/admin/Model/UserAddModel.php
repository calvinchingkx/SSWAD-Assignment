<?php
require "admin_database.php";

class UserAddModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function addUser($name, $email, $gender, $password) {
        $name = mysqli_real_escape_string($this->con, $name);
        $email = mysqli_real_escape_string($this->con, $email);
        $gender = mysqli_real_escape_string($this->con, $gender);
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, gender, password) VALUES ('$name', '$email', '$gender', '$password')";
        return $this->con->query($sql);
    }

    public function getLastInsertId() {
        return $this->con->insert_id;
    }
}
?>
