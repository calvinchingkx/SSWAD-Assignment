<?php
include 'Model/RatingEditModel.php';

class RatingController {
    private $ratingModel;

    public function __construct($con) {
        $this->ratingModel = new RatingModel($con);
    }

    public function handlePostRequest($ratingId) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userId = intval($_POST['userId']);
            $movieId = intval($_POST['movieId']);
            $ratingStar = intval($_POST['ratingStar']);

            if ($this->ratingModel->updateRating($ratingId, $userId, $movieId, $ratingStar)) {
                header('Location: rating_details.php');
                exit();
            } else {
                return "Error updating rating: " . $this->ratingModel->con->error;
            }
        }
        return null;
    }

    public function getRatingById($ratingId) {
        return $this->ratingModel->getRatingById($ratingId);
    }

    public function getUsers() {
        return $this->ratingModel->getUsers();
    }

    public function getMovies() {
        return $this->ratingModel->getMovies();
    }
}
?>
