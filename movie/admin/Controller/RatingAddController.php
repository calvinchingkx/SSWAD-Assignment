<?php
include 'Model/RatingAddModel.php';

class RatingController {
    private $ratingModel;

    public function __construct($con) {
        $this->ratingModel = new RatingModel($con);
    }

    public function handlePostRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userId = intval($_POST['userId']);
            $movieId = intval($_POST['movieId']);
            $ratingStar = intval($_POST['ratingStar']);

            if ($this->ratingModel->addRating($userId, $movieId, $ratingStar)) {
                header('Location: rating_details.php');
                exit();
            } else {
                return "Error adding rating: " . $this->ratingModel->con->error;
            }
        }
        return null;
    }

    public function getUsers() {
        return $this->ratingModel->getUsers();
    }

    public function getMovies() {
        return $this->ratingModel->getMovies();
    }
}
?>
