<?php
include "admin_auth.php";
include "admin_header.php";
include "admin_database.php";
include "Controller/RatingController.php";

$ratingController = new RatingController($con);
$ratings = $ratingController->displayRatings();

include "View/RatingView.php";

include "admin_footer.php";
?>
