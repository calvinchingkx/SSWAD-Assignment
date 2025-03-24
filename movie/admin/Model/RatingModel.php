<?php
class RatingModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getAllRatings() {
        $sql = "SELECT 
                    r.ratingId, 
                    r.userId, 
                    r.movieId, 
                    u.name AS userName, 
                    m.movieName, 
                    r.ratingStar
                FROM 
                    rating r
                JOIN 
                    users u ON r.userId = u.id
                JOIN 
                    movie m ON r.movieId = m.movieId
                ORDER BY 
                    r.ratingId ASC";
        
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
}
?>
