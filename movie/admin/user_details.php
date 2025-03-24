<?php
include "admin_auth.php";
include "admin_header.php";
require __DIR__ . "/Controller/UserDetailController.php";

$controller = new UserDetailController();
$controller->listUsers();

include "admin_footer.php";
?>
