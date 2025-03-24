<?php
class MovieModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function getMovieById($movieId) {
        $movieId = intval($movieId);
        $sql = "SELECT * FROM movie WHERE movieId = $movieId";
        $result = $this->con->query($sql);
        return $result->fetch_assoc();
    }

    public function updateMovie($movieId, $movieName, $movieDescription, $movieType, $movieYear, $movieActor, $moviePicture) {
        $movieId = intval($movieId);
        $movieName = mysqli_real_escape_string($this->con, $movieName);
        $movieDescription = mysqli_real_escape_string($this->con, $movieDescription);
        $movieType = mysqli_real_escape_string($this->con, $movieType);
        $movieYear = mysqli_real_escape_string($this->con, $movieYear);
        $movieActor = mysqli_real_escape_string($this->con, $movieActor);

        $sql = "UPDATE movie SET movieName='$movieName', movieDescription='$movieDescription', movieType='$movieType', movieYear='$movieYear', movieActor='$movieActor'";

        if (!empty($moviePicture['name'])) {
            $targetDir = "../image/";
            $existingImage = $targetDir . "pic" . $movieId . ".jpg";

            if (file_exists($existingImage)) {
                unlink($existingImage);
            }

            $targetFile = $targetDir . "pic" . $movieId . ".jpg";
            if (move_uploaded_file($moviePicture["tmp_name"], $targetFile)) {
                // Successfully uploaded file
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        }

        $sql .= " WHERE movieId=$movieId";

        if ($this->con->query($sql) === TRUE) {
            return "Movie updated successfully!";
        } else {
            return "Error: " . $this->con->error;
        }
    }
}
?>
