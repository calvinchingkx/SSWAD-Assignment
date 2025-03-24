<?php
include 'Model/MovieEditModel.php';

class MovieController {
    private $movieModel;

    public function __construct($con) {
        $this->movieModel = new MovieModel($con);
    }

    public function editMovie($movieId, $movieName, $movieDescription, $movieType, $movieYear, $movieActor, $moviePicture) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($movieId)) {
            return $this->movieModel->updateMovie($movieId, $movieName, $movieDescription, $movieType, $movieYear, $movieActor, $moviePicture);
        }
    }

    public function getMovieDetails($movieId) {
        return $this->movieModel->getMovieById($movieId);
    }
}
?>
