<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
        .form-container select,
        .form-container input[type="file"] {
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
        <h2>Edit User</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="currentImage" value="../avatar/user<?php echo htmlspecialchars($userId); ?>.jpg">
            
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male" <?php if ($user['gender'] == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if ($user['gender'] == 'female') echo 'selected'; ?>>Female</option>
                <option value="other" <?php if ($user['gender'] == 'other') echo 'selected'; ?>>Other</option>
            </select>

            <label for="avatar">Profile Picture (JPG only)</label>
            <input type="file" id="avatar" name="avatar" accept=".jpg">

            <button type="submit" class="add-button">Update User</button>
        </form>
    </div>
</body>
<?php include "admin_footer.php"; ?>
</html>
