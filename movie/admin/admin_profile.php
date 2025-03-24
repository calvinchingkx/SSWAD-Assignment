<?php
include 'admin_auth.php';
include 'admin_header.php';
require 'admin_database.php';
require 'Controller/AdminProfileController.php';

$admin_id = $_SESSION['admin_id'];

$controller = new AdminProfileController($con);
$data = $controller->handleRequest($admin_id, $_POST, $_FILES);

if (is_string($data)) {
    echo $data;
} else {
    $admin = $data['admin'];
    $messages = $data['messages'];
    include 'View/AdminProfileView.php';
}

include 'admin_footer.php';
?>
