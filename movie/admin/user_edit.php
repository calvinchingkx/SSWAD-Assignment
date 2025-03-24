<?php
include "admin_auth.php";
include "admin_header.php";
require "admin_database.php";
require "Controller/UserEditController.php";

$controller = new UserEditController($con);
$result = $controller->handleRequest();
if (is_string($result)) {
    // Display error message
    echo $result;
} else {
    // Pass user data to the view
    $user = $result;
    include "View/UserEditView.php";
}
?>
