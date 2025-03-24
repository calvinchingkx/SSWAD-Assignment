<?php
class RatingModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getUsers() {
        $sql = "SELECT id, name FROM users ORDER BY name ASC";
        return mysqli_query($this->con, $sql);
    }

    public function getMovies() {
        $sql = "SELECT movieId, movieName FROM movie ORDER BY movieName ASC";
        return mysqli_query($this->con, $sql);
    }

    public function addRating($userId, $movieId, $ratingStar) {
        $sql = "INSERT INTO rating (userId, movieId, ratingStar) VALUES ($userId, $movieId, $ratingStar)";
        return $this->con->query($sql);
    }
}
?>
