<?php
class MovieModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getMoviesByType($type) {
        $sql = "SELECT * FROM movie WHERE movieType = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $type);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
