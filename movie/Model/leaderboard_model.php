<?php
require "database.php";

function getMovieLeaderboard() {
    global $con;
    $leaderboard = [];

    for ($i = 1; $i <= 20; $i++) {
        $ratingCounts = [
            5 => 0,
            4 => 0,
            3 => 0,
            2 => 0,
            1 => 0
        ];
        $totalRatingPoints = 0;
        $totalNumber = 0;
        $averageRating = 0;

        $rating_query = "SELECT m.movieId, m.movieName, r.ratingStar, COUNT(*) as count
                         FROM movie m
                         LEFT JOIN rating r ON m.movieId = r.movieId
                         WHERE m.movieId = $i
                         GROUP BY r.ratingStar";

        $rating_result = mysqli_query($con, $rating_query);

        while ($rating_row = mysqli_fetch_assoc($rating_result)) {
            $ratingStar = $rating_row['ratingStar'];
            $count = $rating_row['count'];
            $movieName = $rating_row['movieName'];

            if (isset($ratingCounts[$ratingStar])) {
                $ratingCounts[$ratingStar] = $count;
            }
            $totalRatingPoints += $ratingStar * $count;
            $totalNumber += $count;
        }

        if ($totalNumber > 0) {
            $averageRating = $totalRatingPoints / $totalNumber;
            $averageRating = number_format($averageRating, 1);
        } else {
            $averageRating = 0;
        }

        $leaderboard[$i] = [
            'movieId' => $i,
            'movieName' => $movieName,
            'averageRating' => $averageRating
        ];
    }

    uasort($leaderboard, function ($a, $b) {
        return $b['averageRating'] <=> $a['averageRating'];
    });

    return array_values($leaderboard);
}
?>