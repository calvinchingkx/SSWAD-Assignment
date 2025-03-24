<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Details</title>
    <style>
        body {
            background-color: black;
            color: pink;
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
        .admin-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="w3-container w3-margin-top">
        <div>
            <h1>Admin Details</h1>
        </div>
        <?php 
            if ($admins->num_rows > 0) {
                echo "<table>";
                echo "<tr>
                        <th>Admin ID</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                    </tr>";
                
                while($row = $admins->fetch_assoc()) {
                    $adminId = $row["id"];
                    $avatarPath = "../avatar/admin" . $adminId . ".jpg";
                    
                    // Check if the admin's avatar exists, otherwise use default
                    if (file_exists($avatarPath)) {
                        $avatar = $avatarPath;
                    } else {
                        $avatar = "../avatar/default-avatar.jpg"; // default avatar
                    }

                    echo "<tr>
                        <td style='text-align: center;'>" . $adminId . "</td>
                        <td style='text-align: center;'>
                            <img src='" . $avatar . "' alt='Admin Avatar' class='admin-avatar'>
                        </td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td style='text-align: center;'>" . $row["gender"] . "</td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "No admins found.";
            }
        ?>
        <br>
    </div>
</body>
<?php include "admin_footer.php"; ?>
</html>
