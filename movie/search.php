<?php
    include "database.php";

    $q = isset($_GET['q']) ? mysqli_real_escape_string($con, $_GET['q']) : '';

    if ($q !== '') {
        $sql = "SELECT * FROM movie WHERE movieName LIKE '$q%'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p><a href='movie_details.php?id=" . htmlspecialchars($row['movieId']) . "'>" . htmlspecialchars($row['movieName']) . "</a></p>";
            }
        } else {
            echo "<p>No results found.</p>";
        }
    }
?>

