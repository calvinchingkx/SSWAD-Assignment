<?php
require "admin_database.php";

class AdminModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getAllAdmins() {
        $sql = "SELECT id, name, email, gender FROM admins ORDER BY id ASC";
        return $this->con->query($sql);
    }
}
?>
