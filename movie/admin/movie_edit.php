<?php
include "admin_auth.php";
include "admin_header.php";
include "admin_database.php";
include "Controller/MovieEditController.php";

$movieController = new MovieController($con);

if (isset($_GET['movieId'])) {
    $movieId = intval($_GET['movieId']);
    $movie = $movieController->getMovieDetails($movieId);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $message = $movieController->editMovie(
            $movieId,
            $_POST['movieName'],
            $_POST['movieDescription'],
            $_POST['movieType'],
            $_POST['movieYear'],
            $_POST['movieActor'],
            $_FILES['moviePicture']
        );
        echo "<meta http-equiv='refresh' content='0;url=movie_details.php'>";
        exit();
    }

    include "View/MovieEditView.php";
} else {
    echo "Invalid Movie ID.";
}

include "admin_footer.php";
?>
