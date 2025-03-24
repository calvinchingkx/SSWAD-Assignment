<?php
require 'database.php';

class DetailModel {

    public static function getMovieDetails($movieId) {
        global $con;
        $movie_query = "SELECT movieId, movieName, movieDescription, movieType, movieYear, movieActor 
                        FROM movie 
                        WHERE movieId = $movieId";
        return mysqli_query($con, $movie_query);
    }

    public static function getRatings($movieId) {
        global $con;
        $ratingCounts = [
            5 => 0,
            4 => 0,
            3 => 0,
            2 => 0,
            1 => 0
        ];
        $totalRatingPoints = 0;
        $totalNumber = 0;

        $rating_query = "SELECT ratingStar, COUNT(*) as count
                        FROM rating
                        WHERE movieId = $movieId
                        GROUP BY ratingStar";
        $rating_result = mysqli_query($con, $rating_query);

        while ($rating_row = mysqli_fetch_assoc($rating_result)) {
            $ratingStar = $rating_row['ratingStar'];
            $count = $rating_row['count'];

            if (isset($ratingCounts[$ratingStar])) {
                $ratingCounts[$ratingStar] = $count;
            }
            $totalRatingPoints += $ratingStar * $count;
            $totalNumber += $count;
        }

        $averageRating = $totalNumber > 0 ? number_format($totalRatingPoints / $totalNumber, 1) : 0;

        return [$ratingCounts, $averageRating];
    }

    public static function getComments($movieId) {
        global $con;
        $comment_query = "
            SELECT u.id, u.name, c.comment, 
                DATE_FORMAT(c.commentTime, '%d/%m/%Y %l:%i%p') AS formattedTime
            FROM comment c
            INNER JOIN users u ON c.userId = u.id
            WHERE c.movieId = $movieId
            ORDER BY c.commentTime DESC";
        return mysqli_query($con, $comment_query);
    }

    public static function submitComment($userId, $movieId, $comment) {
        global $con;
        $commentTime = date('Y-m-d H:i:s');
        $insert_query = "INSERT INTO comment (comment, commentTime, userId, movieId) 
                         VALUES ('$comment', '$commentTime', '$userId', '$movieId')";
        return mysqli_query($con, $insert_query);
    }

    public static function submitRating($userId, $movieId, $ratingStar) {
        global $con;
        $check_query = "SELECT * FROM rating WHERE movieId = $movieId AND userId = $userId";
        $check_result = mysqli_query($con, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $update_query = "UPDATE rating SET ratingStar = $ratingStar WHERE movieId = $movieId AND userId = $userId";
            return mysqli_query($con, $update_query);
        } else {
            $insert_query = "INSERT INTO rating (ratingStar, userId, movieId) VALUES ($ratingStar, $userId, $movieId)";
            return mysqli_query($con, $insert_query);
        }
    }
}
?>
