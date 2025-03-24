<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Details</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid pink;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #333;
            text-align: center;
        }
        tr:nth-child(odd) {
            background-color: #222;
        }
    </style>
</head>
<body>
    <div class="w3-container w3-margin-top">
        <div>
            <h1>Rating Details</h1>
        </div>
        <div>
            <a href="rating_add.php">
                <button class="add-button" style="width: 200px;">Add New Rating</button>
            </a>
        </div>
        <?php 
            if (mysqli_num_rows($ratings) > 0) {
                echo "<table>";
                echo "<tr>
                        <th>Rating ID</th>
                        <th>User Name</th>
                        <th>Movie Name</th>
                        <th>Rating Star</th>
                        <th>Actions</th>
                    </tr>";
                
                while($row = mysqli_fetch_assoc($ratings)) {
                    echo "<tr>
                        <td style='text-align: center;'>" . $row["ratingId"] . "</td>
                        <td>" . $row["userName"] . "</td>
                        <td>" . $row["movieName"] . "</td>
                        <td style='text-align: center;'>" . $row["ratingStar"] . "</td>
                        <td style='text-align: center;'>
                            <a href='rating_edit.php?id=" . $row["ratingId"] . "'>
                                <button class='edit-button' style='width:100px;'>Edit</button>
                            </a>
                            <a href='rating_delete.php?id=" . $row["ratingId"] . "' onclick=\"return confirm('Are you sure you want to delete this rating?');\">
                                <button class='delete-button' style='width:100px;'>Delete</button>
                            </a>
                        </td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "No ratings found.";
            }
        ?>
        <br>
    </div>
</body>
<?php include "admin_footer.php"; ?>
</html>
