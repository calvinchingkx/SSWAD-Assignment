<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
    <style>
        body { background-color: black; color: pink; }
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
        <h2>Edit Movie</h2>
        
        <?php if ($movie): ?>
            <form action="movie_edit.php?movieId=<?php echo $movieId; ?>" method="POST" enctype="multipart/form-data">
                <label for="movieName">Movie Name:</label>
                <input type="text" name="movieName" value="<?php echo htmlspecialchars($movie['movieName']); ?>" required>

                <label for="movieDescription">Description:</label>
                <textarea name="movieDescription" rows="4" required><?php echo htmlspecialchars($movie['movieDescription']); ?></textarea>

                <label for="movieType">Type:</label>
                <select name="movieType" required>
                    <option value="Action" <?php echo ($movie['movieType'] == 'Action') ? 'selected' : ''; ?>>Action</option>
                    <option value="Comedy" <?php echo ($movie['movieType'] == 'Comedy') ? 'selected' : ''; ?>>Comedy</option>
                    <option value="Romance" <?php echo ($movie['movieType'] == 'Romance') ? 'selected' : ''; ?>>Romance</option>
                    <option value="Fantasy" <?php echo ($movie['movieType'] == 'Fantasy') ? 'selected' : ''; ?>>Fantasy</option>
                </select>

                <label for="movieYear">Year:</label>
                <input type="text" name="movieYear" value="<?php echo htmlspecialchars($movie['movieYear']); ?>" required>

                <label for="movieActor">Actor:</label>
                <input type="text" name="movieActor" value="<?php echo htmlspecialchars($movie['movieActor']); ?>" required>

                <label for="moviePicture">Upload New Picture (Only JPG):</label>
                <input type="file" name="moviePicture" accept="image/*">

                <input type="submit" name="submit" value="Update Movie">
            </form>

            <?php if (isset($message)) echo $message; ?>
        <?php else: ?>
            <p>No movie found with the specified ID.</p>
        <?php endif; ?>
        <br>
    </div>
</body>
</html>
