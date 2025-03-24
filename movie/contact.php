<?php include "header.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <style>
        body {
            background-color: black;
        }
        h1 {
            text-align: center;
            font-size: 36px;
            color: yellow;
        }
        p {
            text-align: center;
            font-size: 20px;
            color: yellow;
        }
        .social {
            text-align: center;
        }
        .social a {
            color: yellow;
            text-decoration: none;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <h1><b>Contact Us</b></h1>
        <br>
        <p>For more enquiries, please contact us.</p>
        <div class="social">
            <div class="w3-row-padding w3-margin-top">
                <a href="https://www.facebook.com">
                    <i class="fa fa-facebook-square" style="font-size:48px;color:blue"></i>
                    CineQ
                </a>
            </div>
            <br>
            <div>
                <a href="https://www.instagram.com">
                    <i class="fa fa-instagram" style="font-size:48px;color:red"></i>
                    @CineQ
                </a>
            </div>
            <br>
            <div>
                <a href="tel:+60123456789">
                    <i class="fa fa-phone" style="font-size:48px;color:green"></i>
                    +60123456789
                </a>
            </div>
            <br>
        </div>
    </div>
</body>

<?php include "footer.php" ?>
</html>