<?php
require 'admin_database.php';

class AdminProfileModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getAdminById($adminId) {
        $sql = "SELECT * FROM admins WHERE id = '$adminId'";
        return $this->con->query($sql);
    }

    public function updateAdminProfile($adminId, $name, $email, $gender) {
        $sql = "UPDATE admins SET name = '$name', email = '$email', gender = '$gender' WHERE id = '$adminId'";
        return $this->con->query($sql);
    }

    public function updateAdminPassword($adminId, $hashedPassword) {
        $sql = "UPDATE admins SET password = '$hashedPassword' WHERE id = '$adminId'";
        return $this->con->query($sql);
    }

    public function getAdminByEmail($email, $excludeId) {
        $sql = "SELECT * FROM admins WHERE email = '$email' AND id != '$excludeId'";
        return $this->con->query($sql);
    }

    public function getCurrentPassword($adminId) {
        $sql = "SELECT password FROM admins WHERE id = '$adminId'";
        return $this->con->query($sql);
    }
}
?>
