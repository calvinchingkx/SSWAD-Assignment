<?php
require 'Controller/detail_controller.php';

$controller = new DetailController();

$movieId = isset($_GET['movieId']) ? intval($_GET['movieId']) : 0;
$ratingStar = isset($_GET['ratingStar']) ? intval($_GET['ratingStar']) : 0;

$controller->submitRating($movieId, $ratingStar);
?>
