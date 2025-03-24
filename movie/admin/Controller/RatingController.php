<?php
include 'Model/RatingModel.php';

class RatingController {
    private $ratingModel;

    public function __construct($con) {
        $this->ratingModel = new RatingModel($con);
    }

    public function displayRatings() {
        $result = $this->ratingModel->getAllRatings();
        return $result;
    }
}
?>
