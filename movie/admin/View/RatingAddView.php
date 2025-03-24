<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Rating</title>
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
        <h2>Add New Rating</h2>
        <?php if ($error): ?>
            <p style="color: red; text-align: center;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="userId">User Name</label>
            <select id="userId" name="userId" required>
                <option value="">Select User</option>
                <?php
                    while($user = mysqli_fetch_assoc($users)) {
                        echo "<option value='" . $user['id'] . "'>" . htmlspecialchars($user['name']) . "</option>";
                    }
                ?>
            </select>

            <label for="movieId">Movie Name</label>
            <select id="movieId" name="movieId" required>
                <option value="">Select Movie</option>
                <?php
                    while($movie = mysqli_fetch_assoc($movies)) {
                        echo "<option value='" . $movie['movieId'] . "'>" . htmlspecialchars($movie['movieName']) . "</option>";
                    }
                ?>
            </select>

            <label for="ratingStar">Rating Star</label>
            <select id="ratingStar" name="ratingStar" required>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>

            <button type="submit" class="add-button">Add Rating</button>
        </form>
    </div>
</body>
<?php include "admin_footer.php"; ?>
</html>
