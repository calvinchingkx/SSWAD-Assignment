<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rating</title>
    <style>
        body {
            background-color: black;
            color: pink;
        }
        .form-container {
            background-color: #222;
            padding: 20px;
            border-radius: 15px;
            max-width: 500px;
            margin: 50px auto;
            color: pink;
            border: 1px solid pink;
        }
        .form-container h2 {
            text-align: center;
        }
        .form-container label {
            display: block;
            margin: 15px 0 5px;
            font-size: 18px;
        }
        .form-container input[type="text"],
        .form-container select {
            width: 100%;
            padding: 10px;
            border: 2px solid pink;
            border-radius: 5px;
            background-color: #333;
            color: pink;
        }
        .form-container .add-button {
            width: 100%;
            background-color: black;
            color: pink;
            border: 2px solid pink;
            border-radius: 25px;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
            margin-top: 15px;
        }
        .form-container .add-button:hover {
            background-color: pink;
            color: black;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Rating</h2>
        <?php if ($error): ?>
            <p style="color: red; text-align: center;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="userId">User Name</label>
            <select id="userId" name="userId" required>
                <?php
                    while($user = mysqli_fetch_assoc($users)) {
                        $selected = $user['id'] == $rating['userId'] ? 'selected' : '';
                        echo "<option value='" . $user['id'] . "' $selected>" . htmlspecialchars($user['name']) . "</option>";
                    }
                ?>
            </select>

            <label for="movieId">Movie Name</label>
            <select id="movieId" name="movieId" required>
                <?php
                    while($movie = mysqli_fetch_assoc($movies)) {
                        $selected = $movie['movieId'] == $rating['movieId'] ? 'selected' : '';
                        echo "<option value='" . $movie['movieId'] . "' $selected>" . htmlspecialchars($movie['movieName']) . "</option>";
                    }
                ?>
            </select>

            <label for="ratingStar">Rating Star</label>
            <select id="ratingStar" name="ratingStar" required>
                <option value="5" <?php if ($rating['ratingStar'] == 5) echo 'selected'; ?>>5</option>
                <option value="4" <?php if ($rating['ratingStar'] == 4) echo 'selected'; ?>>4</option>
                <option value="3" <?php if ($rating['ratingStar'] == 3) echo 'selected'; ?>>3</option>
                <option value="2" <?php if ($rating['ratingStar'] == 2) echo 'selected'; ?>>2</option>
                <option value="1" <?php if ($rating['ratingStar'] == 1) echo 'selected'; ?>>1</option>
            </select>

            <button type="submit" class="add-button">Update Rating</button>
        </form>
    </div>
</body>
<?php include "admin_footer.php"; ?>
</html>
