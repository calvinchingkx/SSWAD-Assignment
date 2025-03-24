<?php include "header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <style>
        .container {
            text-align: center;
            background-color: #222222;
        }
        .top-movie-title {
            font-size: 48px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }
        .movie-boxes {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            gap: 60px;
            padding-bottom: 60px;
        }
    .movie-box {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            position: relative;
            color: white;
            background-color: black;
        }
        .top-1 {
            height: 520px;
            width: 350px;
            box-shadow: 0 12px 30px rgba(255, 215, 0, 0.9);
            border-radius: 20px;
        }
        .top-2 {
            height: 480px;
            width: 320px;
            box-shadow: 0 10px 25px rgba(192, 192, 192, 0.8);
            border-radius: 20px;
        }
        .top-3 {
            height: 440px;
            width: 280px;
            box-shadow: 0 8px 20px rgba(205, 127, 50, 0.8);
            border-radius: 20px;
        }
        .top-1 img {
            height: 340px;
            width: 320px;
        }
        .top-2 img {
            height: 300px;
            width: 260px;
        }
        .top-3 img {
            height: 240px;
            width: 220px;
        }
        .rank {
            font-size: 60px;
            font-weight: bold;
            padding-bottom: 10px;
        }
        .top-1 .rank {
            color: rgba(255, 215, 0, 1);
        }
        .top-2 .rank {
            color: silver;
        }
        .top-3 .rank {
            color: rgba(205, 127, 50, 1);
        }
        .movie-box img {
            margin-bottom: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 1);
            border-radius: 20px;
            padding: 5px;
            background-color: #bcc7db;
        }
        .movie-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .movie-rating {
            font-size: 16px;
        }
        .movie-boxes.vertical {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .vertical-box {
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: black;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(70, 130, 180, 0.8);
            max-width: 600px;
            width: 100%;
        }
        .ranking-number {
            font-size: 60px;
            font-weight: bold;
            color: steelblue;
            margin-right: 20px;
            flex-shrink: 0;
            width: 20%;
        }
        .vertical-box img {
            width: 160px;
            height: 200px;
            margin-right: 15px;
            flex-basis: 30%;
        }
        .movie-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
            flex-basis: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-movie-title">TOP RATING MOVIES</div>

        <div class="movie-boxes">
            <div class="movie-box top-2">
                <div class="rank">2</div>
                <img src="image/pic<?php echo $leaderboard[1]['movieId']; ?>.jpg" alt="Top 2 Movie">
                <div class="movie-name"><?php echo $leaderboard[1]['movieName']; ?></div>
                <div class="movie-rating"><?php echo $leaderboard[1]['averageRating']; ?></div>
            </div>

            <div class="movie-box top-1">
                <div class="rank">1</div>
                <img src="image/pic<?php echo $leaderboard[0]['movieId']; ?>.jpg" alt="Top 1 Movie">
                <div class="movie-name"><?php echo $leaderboard[0]['movieName']; ?></div>
                <div class="movie-rating"><?php echo $leaderboard[0]['averageRating']; ?></div>
            </div>

            <div class="movie-box top-3">
                <div class="rank">3</div>
                <img src="image/pic<?php echo $leaderboard[2]['movieId']; ?>.jpg" alt="Top 3 Movie">
                <div class="movie-name"><?php echo $leaderboard[2]['movieName']; ?></div>
                <div class="movie-rating"><?php echo $leaderboard[2]['averageRating']; ?></div>
            </div>
        </div>

        <div class="movie-boxes vertical">
            <?php for ($i = 3; $i < 10; $i++): ?>
                <div class="movie-box vertical-box">
                    <div class="ranking-number"><?php echo $i + 1; ?></div>
                    <img src="image/pic<?php echo $leaderboard[$i]['movieId']; ?>.jpg" alt="Movie">
                    <div class="movie-info">
                        <div class="movie-name"><?php echo $leaderboard[$i]['movieName']; ?></div>
                        <div class="movie-rating"><?php echo $leaderboard[$i]['averageRating']; ?></div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</body>

<?php include "footer.php"; ?>
</html>
