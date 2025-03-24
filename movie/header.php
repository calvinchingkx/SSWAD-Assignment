<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require "database.php";
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
            background-color: yellow;
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
            color: yellow;
        }
        .search-bar {
            margin-left: auto;
            margin-right: 10px;
            display: flex;
            align-items: center;
            position: relative;
        }
        .search-bar input {
            width: 250px;
            padding: 5px;
            border: 1px solid black;
            border-radius: 5px;
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
            background-color: yellow;
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
            color: yellow;
        }
        .dropdown-menu.show {
            display: block;
        }
        #search-results {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: yellow;
            border: 1px solid #ccc;
            z-index: 1000;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
            padding: 0;
            margin: 0;
        }

        .search-results p {
            margin: 0;
            padding: 8px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
            display: block;
            box-sizing: border-box;
        }

        .search-results p:hover {
            background-color: black;
            color: yellow;
        }

        .search-results p a {
            color: inherit;
            text-decoration: none;
            display: block;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }

    </style>
    <script>
        // Function to show search results based on user input
        function showResults(query) {
            const searchResults = document.getElementById("search-results");
            if (query.length == 0) {
                searchResults.innerHTML = "";
                searchResults.style.display = "none";
                return;
            }
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    searchResults.innerHTML = this.responseText;
                    searchResults.style.display = "block";
                }
            };
            xhr.open("GET", "search.php?q=" + encodeURIComponent(query), true);
            xhr.send();
        }

        // Hide the seach results and dropdown menu if clicking outside
        document.addEventListener("click", function(event) {
            const searchBox = document.getElementById("search-box");
            const searchResults = document.getElementById("search-results");
            const dropdownMenu = document.querySelector('.dropdown-menu');
            const userIcon = document.querySelector('.user-icon img');

            if (!searchBox.contains(event.target) && !searchResults.contains(event.target)) {
                searchResults.style.display = "none";
            }

            if (!dropdownMenu.contains(event.target) && event.target !== userIcon) {
                dropdownMenu.classList.remove('show');
            }
        });

        // Show results when typing in the search box
        document.getElementById("search-box").addEventListener("input", function() {
            const query = this.value;
            showResults(query);
        });

        // Ensure search results are shown when the search box gains focus
        document.getElementById("search-box").addEventListener("focus", function() {
            const query = this.value;
            if (query.length > 0) {
                showResults(query);
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
            <a href="index.php" style="background:none"><img src="image/icon.jpg" width="36px" height="36px" alt="Website Icon"></a>
            <a href="index.php">Movie</a>
            <a href="leaderboard.php">Leaderboard</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
        </div>

        <div class="search-bar">
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Search" autocomplete="off" id="search-box" onkeyup="showResults(this.value)">
            </form>
            <div id="search-results" class="search-results"></div>
        </div>

        <div class="user-icon">
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="login.php">Login</a>
            <?php else: ?>
                <?php
                    $userImagePath = 'avatar/user' . $_SESSION['user_id'] . '.jpg';
                    if (file_exists($userImagePath)) {
                        $imagePath = $userImagePath;
                    } else {
                        $imagePath = 'avatar/default-avatar.jpg';
                    }
                ?>
                <img src="<?php echo $imagePath; ?>" alt="User Icon" onclick="toggleDropdown()">
                <div class="dropdown-menu">
                    <a href="#"><?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
                    <a href="user_profile.php">User Profile</a>
                    <a href="logout.php">Logout</a>
                </div>
            <?php endif; ?> 
        </div>
    </div>
</body>
</html>
