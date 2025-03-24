<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "admin_database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        body, html {
            font-family: Verdana, sams-serif;
            font-size: 15px;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: pink;
            color: black;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }
        .nav-left {
            display: flex;
            gap: 10px;
            flex-grow: 1;
        }
        .nav-left a {
            color: black;
            text-decoration: none;
            padding: 10px;
            font-weight: bold;
            align-items: center;
            display: flex;
        }
        .nav-left a:hover {
            background-color: black;
            color: pink;
        }
        .user-icon {
            position: relative;
            display: flex;
            align-items: center;
        }
        .user-icon a {
            text-decoration: none;
        }
        .user-icon img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: pink;
            border: 1px solid black;
            border-radius: 5px;
            color: black;
            min-width: 150px;
            z-index: 1000;
        }
        .dropdown-menu a {
            display: block;
            padding: 10px;
            color: black;
            text-decoration: none;
        }
        .dropdown-menu a:hover {
            background-color: black;
            color: pink;
        }
        .dropdown-menu.show {
            display: block;
        }
    </style>
    <script>
        
        document.addEventListener("click", function(event) {
            const dropdownMenu = document.querySelector('.dropdown-menu');
            const userIcon = document.querySelector('.user-icon img');

            if (!dropdownMenu.contains(event.target) && event.target !== userIcon) {
                dropdownMenu.classList.remove('show');
            }
        });

        function toggleDropdown() {
            document.querySelector('.dropdown-menu').classList.toggle('show');
        }  
   
    </script>
</head>
<body>
    <div class="header">
        <div class="nav-left">
            <a href="movie_details.php" style="background:none"><img src="../image/icon.jpg" width="36px" height="36px" alt="Website Icon"></a>
            <a href="movie_details.php">Movie Details</a>
            <a href="rating_details.php">Rating Details</a>
            <a href="admin_comment.php">Comment Details</a>
            <a href="user_details.php">User Details</a>
            <a href="admin_details.php">Admin Details</a>
        </div>
        <div class="user-icon">
            <?php if (isset($_SESSION['admin_id'])): ?>
                <?php
                    $userImagePath = '../avatar/admin' . $_SESSION['admin_id'] . '.jpg';
                    if (file_exists($userImagePath)) {
                        $imagePath = $userImagePath;
                    } else {
                        $imagePath = '../avatar/default-avatar.jpg';
                    }
                ?>
                <img src="<?php echo $imagePath; ?>" alt="Admin Icon" onclick="toggleDropdown()">
                <div class="dropdown-menu">
                    <a href="#"><?php echo htmlspecialchars($_SESSION['admin_name']); ?></a>
                    <a href="admin_profile.php">Admin Profile</a>
                    <a href="admin_logout.php">Logout</a>
                </div>
            <?php endif; ?> 
        </div>
    </div>
</body>
</html>
