<?php
session_start();
require 'Model/detail_model.php';

class DetailController {

    public function viewMovieDetails($movieId) {
        $movieDetails = DetailModel::getMovieDetails($movieId);
        $ratings = DetailModel::getRatings($movieId);
        $comments = DetailModel::getComments($movieId);

        return [
            'movieDetails' => mysqli_fetch_assoc($movieDetails),
            'ratings' => $ratings,
            'comments' => $comments
        ];
    }

    public function submitComment($movieId, $comment) {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['comment_message'] = ['type' => 'error', 'content' => 'Please log in before commenting.'];
            header("Location: movie_details.php?id=$movieId");
            exit();
        }

        $userId = $_SESSION['user_id'];
        if (empty($comment)) {
            $_SESSION['comment_message'] = ['type' => 'error', 'content' => 'Comment cannot be empty.'];
        } else {
            if (DetailModel::submitComment($userId, $movieId, $comment)) {
                $_SESSION['comment_message'] = ['type' => 'success', 'content' => 'Comment submitted successfully!'];
            } else {
                $_SESSION['comment_message'] = ['type' => 'error', 'content' => 'Failed to submit comment. Please try again later.'];
            }
        }
        header("Location: movie_details.php?id=$movieId");
        exit();
    }

    public function submitRating($movieId, $ratingStar) {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['rating_message'] = ['type' => 'error', 'content' => 'Please log in before rating.'];
            header("Location: movie_details.php?id=$movieId");
            exit();
        }

        $userId = $_SESSION['user_id'];
        if (DetailModel::submitRating($userId, $movieId, $ratingStar)) {
            $_SESSION['rating_message'] = ['type' => 'success', 'content' => 'Successfully submitted your rating.'];
        } else {
            $_SESSION['rating_message'] = ['type' => 'error', 'content' => 'Failed to submit rating. Please try again later.'];
        }
        header("Location: movie_details.php?id=$movieId");
        exit();
    }
}
?>
