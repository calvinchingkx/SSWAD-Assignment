<?php
include "admin_auth.php";
include "admin_header.php";
require "admin_database.php";
require "Controller/UserAddController.php";

$controller = new UserAddController($con);
$error = $controller->handleRequest();
include "View/UserAddView.php";
?>
