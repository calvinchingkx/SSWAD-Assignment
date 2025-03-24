<?php

require_once 'admin_auth.php';
require_once 'admin_database.php';
require_once 'Controller/MovieController.php';

$movieController = new MovieController($con);

$result = $movieController->showAllMovies();

include 'View/MovieView.php';

?>
