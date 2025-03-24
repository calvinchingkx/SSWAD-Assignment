<?php
include "admin_auth.php";
include "admin_header.php";
require "admin_database.php";
require "Controller/AdminController.php";

$controller = new AdminController($con);
$admins = $controller->handleRequest();

if (is_string($admins)) {
    echo $admins;
} else {
    include "View/AdminView.php";
}
?>
