<?php

class MovieModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function addMovie($movieName, $movieDescription, $movieType, $movieYear, $movieActor, $adminId) {
        $sql = "INSERT INTO movie (movieName, movieDescription, movieType, movieYear, movieActor, adminId)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('sssssi', $movieName, $movieDescription, $movieType, $movieYear, $movieActor, $adminId);

        if ($stmt->execute()) {
            return $this->con->insert_id;
        } else {
            return false;
        }
    }
}
?>
