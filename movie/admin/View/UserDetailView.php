<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
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
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="w3-container w3-margin-top">
        <div>
            <h1>User Details</h1>
        </div>
        <div>
            <a href="user_add.php">
                <button class="add-button" style="width: 200px;">Add New User</button>
            </a>
        </div>
        <?php if ($users && mysqli_num_rows($users) > 0): ?>
            <table>
                <tr>
                    <th>User ID</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($users)): ?>
                    <?php
                        $userId = $row["id"];
                        $avatarPath = "../avatar/user" . $userId . ".jpg";
                        $avatar = file_exists($avatarPath) ? $avatarPath : "../avatar/default-avatar.jpg";
                    ?>
                    <tr>
                        <td style='text-align: center;'><?= $userId ?></td>
                        <td style='text-align: center;'>
                            <img src='<?= $avatar ?>' alt='User Avatar' class='user-avatar'>
                        </td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["email"] ?></td>
                        <td style='text-align: center;'><?= $row["gender"] ?></td>
                        <td style='text-align: center;'>
                            <a href='user_edit.php?id=<?= $userId ?>'>
                                <button class='edit-button' style='width:100px;'>Edit</button>
                            </a>
                            <a href='user_delete.php?id=<?= $userId ?>' onclick="return confirm('Are you sure you want to delete this user?');">
                                <button class='delete-button' style='width:100px;'>Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
        <br>
    </div>
</body>
</html>
