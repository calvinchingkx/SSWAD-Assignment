<?php
function renderMovieDetails($movieDetails, $ratings, $comments) {
    list($ratingCounts, $averageRating) = $ratings;
    $width = [
        5 => ($ratingCounts[5] / max($ratingCounts)) * 100,
        4 => ($ratingCounts[4] / max($ratingCounts)) * 100,
        3 => ($ratingCounts[3] / max($ratingCounts)) * 100,
        2 => ($ratingCounts[2] / max($ratingCounts)) * 100,
        1 => ($ratingCounts[1] / max($ratingCounts)) * 100,
    ];

    include 'header.php';
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($movieDetails['movieName']); ?></title>
        <link rel="stylesheet" href="css/movie_details.css">
    </head>
    <body>
    <div class="container">
        <div class="movie-info">
            <div class="movie-picture">
                <img src="image/pic<?php echo htmlspecialchars($movieDetails['movieId']); ?>.jpg" alt="Movie Picture">
            </div>

            <div class="details">
                <h1 style="font-size: 48px;"><?php echo htmlspecialchars($movieDetails['movieName']); ?></h1>
                <p><strong>Movie Description:</strong><br> <?php echo htmlspecialchars($movieDetails['movieDescription']); ?></p>
                <p>
                    <strong>Movie Type:</strong> <?php echo htmlspecialchars($movieDetails['movieType']); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>Movie Year:</strong> <?php echo htmlspecialchars($movieDetails['movieYear']); ?>
                </p>
                <p><strong>Actor:</strong> <?php echo htmlspecialchars($movieDetails['movieActor']); ?></p>

                <div class="rating-review">
                    <div class="rating-statistics">
                        <h4>Rating Statistics</h4>
                    </div>
                    <div class="average-rating">
                        <h4>Average Rating</h4>
                    </div>
                </div>

                <div class="stat-average">
                    <div class="stat-container">
                        <div class="average">
                            <h1><?php echo htmlspecialchars($averageRating); ?></h1>
                        </div>

                        <?php foreach ([5, 4, 3, 2, 1] as $star): ?>
                            <div class="stat">
                                <span><?php echo $star; ?> star</span>
                                <div class="bar"><div class="bar-fill" style="width: <?php echo $width[$star]; ?>%;"></div></div>
                                <span><?php echo $ratingCounts[$star]; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="rating-section">
                    <div class="rating">
                        <div class="stars">
                            <?php foreach ([1, 2, 3, 4, 5] as $star): ?>
                                <a href="submit_rating.php?movieId=<?php echo htmlspecialchars($movieDetails['movieId']); ?>&ratingStar=<?php echo $star; ?>" class="star">&#9733;</a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($_SESSION['rating_message'])): ?>
            <p class='message <?php echo $_SESSION['rating_message']['type']; ?>'><?php echo $_SESSION['rating_message']['content']; ?></p>
            <?php unset($_SESSION['rating_message']); ?>
        <?php endif; ?>

        <div class="feedback-section">
            <h4 style="font-size: 24px;">Comment</h4>
            <form action="submit_comment.php?movieId=<?php echo htmlspecialchars($movieDetails['movieId']); ?>" method="post">
                <textarea name='comment' id="feedback" placeholder="Enter your comment"></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>

        <?php if (isset($_SESSION['comment_message'])): ?>
            <p class='message <?php echo $_SESSION['comment_message']['type']; ?>'><?php echo $_SESSION['comment_message']['content']; ?></p>
            <?php unset($_SESSION['comment_message']); ?>
        <?php endif; ?>

        <div class="comments-section">
            <h4 style="font-size:24px;">Comments</h4>
            <?php while ($comment_row = mysqli_fetch_assoc($comments)): ?>
                <div class='comment'>
                    <?php
                    $userImagePath = 'avatar/user' . htmlspecialchars($comment_row['id']) . '.jpg';
                    if (file_exists($userImagePath)): ?>
                        <img src="<?php echo htmlspecialchars($userImagePath); ?>" alt="User Avatar" class="user-avatar">
                    <?php else: ?>
                        <img src="avatar/default-avatar.jpg" alt="Default Profile Picture" class="user-avatar">
                    <?php endif; ?>

                    <div class='comment-content'>
                        <div class='user-info'>
                            <div class='user-name'><?php echo htmlspecialchars($comment_row['name']); ?></div>
                            <div class='time-date'><?php echo htmlspecialchars($comment_row['formattedTime']); ?></div>
                        </div>
                        <div class='text'><?php echo htmlspecialchars($comment_row['comment']); ?></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    </body>
    </html>

    <?php include 'footer.php';
}
?>
