<?php

require_once 'Model/MovieModel.php';

class MovieController {
    private $movieModel;

    public function __construct($con) {
        $this->movieModel = new MovieModel($con);
    }

    public function showAllMovies() {
        return $this->movieModel->getAllMovies();
    }

    public function deleteMovie($movieId) {
        return $this->movieModel->deleteMovie($movieId);
    }
}
?>
