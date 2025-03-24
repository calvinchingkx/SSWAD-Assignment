<?php
require "admin_database.php";

class UserDetailModel {
    public function getAllUsers() {
        global $con;
        $sql = "SELECT id, name, email, gender FROM users ORDER BY id ASC";
        $result = mysqli_query($con, $sql);
        return $result;
    }
}
?>
