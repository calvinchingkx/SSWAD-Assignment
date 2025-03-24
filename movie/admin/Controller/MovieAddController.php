<?php

require_once 'Model/MovieAddModel.php';

class MovieController {
    private $movieModel;

    public function __construct($con) {
        $this->movieModel = new MovieModel($con);
    }

    public function addMovie($movieName, $movieDescription, $movieType, $movieYear, $movieActor, $adminId, $file) {
        if (isset($file) && $file['error'] == UPLOAD_ERR_OK) {
            $fileType = $file['type'];
            $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if ($fileType != 'image/jpeg' || $fileExtension != 'jpg') {
                return "Error: Only JPG files are allowed.";
            }

            $movieId = $this->movieModel->addMovie($movieName, $movieDescription, $movieType, $movieYear, $movieActor, $adminId);
            
            if ($movieId) {
                $targetDir = "../image/";
                $targetFile = $targetDir . "pic" . $movieId . ".jpg";

                if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                    return "New movie added successfully! Picture uploaded as pic" . $movieId . ".jpg.";
                } else {
                    return "Movie added, but there was an error uploading the picture.";
                }
            } else {
                return "Error: Movie could not be added.";
            }
        } else {
            return "Error: No file was uploaded or there was an upload error.";
        }
    }
}
?>
