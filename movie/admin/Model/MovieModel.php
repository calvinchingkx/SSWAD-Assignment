<?php

class MovieModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getAllMovies() {
        $sql = "SELECT * FROM movie";
        $result = $this->con->query($sql);
        return $result;
    }

    public function getMovieById($movieId) {
        $sql = "SELECT * FROM movie WHERE movieId = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('i', $movieId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function deleteMovie($movieId) {
        $sql = "DELETE FROM movie WHERE movieId = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('i', $movieId);
        return $stmt->execute();
    }
}
?>
