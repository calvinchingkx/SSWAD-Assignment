<?php
include "database.php";
include "Model/movie_model.php";

class MovieController {
    private $model;

    public function __construct($con) {
        $this->model = new MovieModel($con);
    }

    public function displayMoviesByType($type) {
        return $this->model->getMoviesByType($type);
    }
}

// Instantiate the controller
$con = new mysqli("localhost","root","","movie_db");
$controller = new MovieController($con);

// Fetch movies by type
$actionMovies = $controller->displayMoviesByType('Action');
$comedyMovies = $controller->displayMoviesByType('Comedy');
$romanceMovies = $controller->displayMoviesByType('Romance');
$fantasyMovies = $controller->displayMoviesByType('Fantasy');
?>
