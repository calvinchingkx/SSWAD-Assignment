<?php
require 'Controller/detail_controller.php';
date_default_timezone_set('Asia/Kuala_Lumpur');

$controller = new DetailController();

$movieId = isset($_GET['movieId']) ? intval($_GET['movieId']) : 0;
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';

$controller->submitComment($movieId, $comment);
?>
