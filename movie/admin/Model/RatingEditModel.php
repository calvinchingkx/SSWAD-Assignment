<?php
class RatingModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getRatingById($ratingId) {
        $sql = "SELECT userId, movieId, ratingStar FROM rating WHERE ratingId = $ratingId";
        $result = $this->con->query($sql);
        return $result->fetch_assoc();
    }

    public function updateRating($ratingId, $userId, $movieId, $ratingStar) {
        $sql = "UPDATE rating SET userId = $userId, movieId = $movieId, ratingStar = $ratingStar WHERE ratingId = $ratingId";
        return $this->con->query($sql);
    }

    public function getUsers() {
        $sql = "SELECT id, name FROM users ORDER BY name ASC";
        return mysqli_query($this->con, $sql);
    }

    public function getMovies() {
        $sql = "SELECT movieId, movieName FROM movie ORDER BY movieName ASC";
        return mysqli_query($this->con, $sql);
    }
}
?>
