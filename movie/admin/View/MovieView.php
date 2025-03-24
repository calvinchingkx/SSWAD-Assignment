<?php include "admin_header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            background-color: black;
            color: pink;
        }
        .add-button, .edit-button, .delete-button {
            background-color: black;
            color: pink;
            border: 2px solid pink;
            border-radius: 25px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
            margin-bottom: 10px;
        }
        button:hover {
            background-color: pink;
            color: black;
        }
        tr:nth-child(even) {
            background-color: #222;
        }
    </style>
</head>
<body>
    <div class="w3-container w3-margin-top">
        <div>
            <a href="movie_add.php">
                <button class="add-button" style="width: 200px;">
                    Add New Movie
                </button>
            </a>
        </div>
        <?php 
            if ($result->num_rows > 0) {
                echo "<table border='1' cellpadding='10' cellspacing='0'>";
                echo "<tr>
                        <th>Movie ID</th>
                        <th>Movie Name</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Year</th>
                        <th>Actor</th>
                        <th>Picture</th>
                        <th>Actions</th>
                    </tr>";
               
                while($row = $result->fetch_assoc()) {
                    $imagePath = "../image/pic" . $row["movieId"] . ".jpg";
                    echo "<tr>
                            <td>" . $row["movieId"] . "</td>
                            <td>" . $row["movieName"] . "</td>
                            <td>" . $row["movieDescription"] . "</td>
                            <td>" . $row["movieType"] . "</td>
                            <td>" . $row["movieYear"] . "</td>
                            <td>" . $row["movieActor"] . "</td>
                            <td><img src='" . $imagePath . "' alt='Movie Picture' style='width:200px;height:200px;'></td>
                            <td>
                                <a href='movie_edit.php?movieId=" . htmlspecialchars($row['movieId']) . "'>
                                    <button class='edit-button' style='width:100px'>Edit</button>
                                </a>
                                <a href='movie_delete.php?movieId=" . htmlspecialchars($row['movieId']) . "' onclick=\"return confirm('Are you sure you want to delete this movie?');\">
                                    <button class='delete-button' style='width:100px'>Delete</button>
                                </a>
                            </td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        ?>
        <br>
    </div>
</body>
</html>

<?php include "admin_footer.php"; ?>
