<?php include "admin_header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Movie</title>
    <style>
        body { 
            background-color: black; 
            color: pink; 
        }
        input[type="text"], textarea, select, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid pink;
            border-radius: 5px;
            background-color: black;
            color: pink;
        }
        input[type="submit"] {
            background-color: pink;
            color: black;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="w3-container w3-margin-top">
        <h2>Add New Movie</h2>
        <form action="movie_add.php" method="POST" enctype="multipart/form-data">
            <label for="movieName">Movie Name:</label>
            <input type="text" name="movieName" required>

            <label for="movieDescription">Description:</label>
            <textarea name="movieDescription" rows="4" required></textarea>

            <label for="movieType">Type:</label>
            <select name="movieType" required>
                <option value="Action">Action</option>
                <option value="Romance">Romance</option>
                <option value="Comedy">Comedy</option>
                <option value="Fantasy">Fantasy</option>
            </select>

            <label for="movieYear">Year:</label>
            <input type="text" name="movieYear" required>

            <label for="movieActor">Actor:</label>
            <input type="text" name="movieActor" required>

            <label for="moviePicture">Upload Picture (only JPG):</label>
            <input type="file" name="moviePicture" accept="image/*" required>

            <input type="submit" name="submit" value="Add Movie">
        </form>
        <br>
        <?php if (isset($message)) { echo $message; } ?>
        <br>
    </div>
</body>
<?php include "admin_footer.php"; ?>
</html>
