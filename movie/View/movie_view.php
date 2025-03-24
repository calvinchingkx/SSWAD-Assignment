<?php include "header.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            background-color: black;
        }
        .w3-container {
            max-width: 2400px;
            margin: 0 auto;
        }
        .w3-row-padding img {
            width: 200px;
            height: 200px;
            box-shadow: 0 0 20px yellow;
            border-radius: 20px;
        }
        .w3-row-padding p {
            color: yellow;
            font-size: 20px;
            font-family: sans-serif;
        }
        .w3-row-padding .w3-col {
            text-align: center;
            width: 20%;
            padding: 0 5px;
            box-sizing: border-box;
        }
        .mySlides {
            height: 600px;
        }
        .w3-display-left, .w3-display-right {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }
        .w3-display-left {
            left: 0;
            border-radius: 3px 0 0 3px;
        }
        .w3-display-right {
            right: 0;
            border-radius: 0 3px 3px 0;
        }
    </style>
</head>
<body>

    <div class="w3-container w3-margin-top">
        <div class="w3-content w3-display-container" style="max-width:1600px; position:relative;">
            <a href="movie_details.php?id=5">
                <img class="mySlides w3-animate-fading" src="image/img1.jpg" style="width:100%" alt="Image 1">
            </a>
            <a href="movie_details.php?id=17">
                <img class="mySlides w3-animate-fading" src="image/img2.jpg" style="width:100%" alt="Image 2">
            </a>
            <a href="movie_details.php?id=2">
                <img class="mySlides w3-animate-fading" src="image/img3.jpg" style="width:100%" alt="Image 3">
            </a>
            <a href="movie_details.php?id=3">
                <img class="mySlides w3-animate-fading" src="image/img4.jpg" style="width:100%" alt="Image 4">
            </a>
            <a href="movie_details.php?id=16">
                <img class="mySlides w3-animate-fading" src="image/img5.jpg" style="width:100%" alt="Image 5">
            </a>

            <a class="w3-display-left" onclick="plusSlides(-1)">&#10094;</a>
            <a class="w3-display-right" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <div class="w3-row-padding w3-margin-top">
            <p><b>Action Movie</b></p>
            <?php foreach($actionMovies as $movie): ?>
                <div class="w3-col">
                    <a href="movie_details.php?id=<?php echo htmlspecialchars($movie['movieId']); ?>">
                        <img src="image/pic<?php echo htmlspecialchars($movie['movieId']); ?>.jpg" alt="<?php echo htmlspecialchars($movie['movieName']); ?>">
                        <p><?php echo htmlspecialchars($movie['movieName']); ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="w3-row-padding w3-margin-top">
            <p><b>Comedy Movie</b></p>
            <?php foreach($comedyMovies as $movie): ?>
                <div class="w3-col">
                    <a href="movie_details.php?id=<?php echo htmlspecialchars($movie['movieId']); ?>">
                        <img src="image/pic<?php echo htmlspecialchars($movie['movieId']); ?>.jpg" alt="<?php echo htmlspecialchars($movie['movieName']); ?>">
                        <p><?php echo htmlspecialchars($movie['movieName']); ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="w3-row-padding w3-margin-top">
            <p><b>Romance Movie</b></p>
            <?php foreach($romanceMovies as $movie): ?>
                <div class="w3-col">
                    <a href="movie_details.php?id=<?php echo htmlspecialchars($movie['movieId']); ?>">
                        <img src="image/pic<?php echo htmlspecialchars($movie['movieId']); ?>.jpg" alt="<?php echo htmlspecialchars($movie['movieName']); ?>">
                        <p><?php echo htmlspecialchars($movie['movieName']); ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="w3-row-padding w3-margin-top">
            <p><b>Fantasy Movie</b></p>
            <?php foreach($fantasyMovies as $movie): ?>
                <div class="w3-col">
                    <a href="movie_details.php?id=<?php echo htmlspecialchars($movie['movieId']); ?>">
                        <img src="image/pic<?php echo htmlspecialchars($movie['movieId']); ?>.jpg" alt="<?php echo htmlspecialchars($movie['movieName']); ?>">
                        <p><?php echo htmlspecialchars($movie['movieName']); ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slides[slideIndex-1].style.display = "block";  
        }
    </script>
</body>
<?php include "footer.php" ?>
</html>
