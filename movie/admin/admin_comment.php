<?php
session_start();
include 'admin_auth.php';
include 'admin_header.php';
include 'admin_database.php';
include 'Controller/CommentController.php';

$commentController = new CommentController($con);
$comments = $commentController->handleRequest();

include 'View/CommentView.php';

$con->close();
include 'admin_footer.php';
?>
