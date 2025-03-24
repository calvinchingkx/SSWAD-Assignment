<?php
require 'Controller/detail_controller.php';

$controller = new DetailController();
$movieId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($movieId > 0) {
    $data = $controller->viewMovieDetails($movieId);
    require 'View/detail_view.php';
    renderMovieDetails($data['movieDetails'], $data['ratings'], $data['comments']);
} else {
    echo "Invalid movie ID.";
    exit();
}
?>
