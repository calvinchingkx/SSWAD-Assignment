<?php

include 'auth.php';
include 'header.php';
require_once 'Controller/user_controller.php';

$user_id = $_SESSION['user_id'];
$userController = new UserController($con);

if (isset($_POST['update_profile'])) {
    $userController->handleProfileUpdate($user_id, $_POST);
}

$fetch = $userController->getUserProfile($user_id);
$message = $userController->getMessages();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/user_profile.css">
</head>
<body>

<div class="update-profile">
    <form action="" method="post">
        <?php
        if (isset($fetch['profile_picture']) && !empty($fetch['profile_picture'])) {
            echo '<img src="uploads/' . $fetch['profile_picture'] . '" alt="Profile Picture">';
        } else {
            $userImagePath = 'avatar/user' . $user_id . '.jpg';

            if (file_exists($userImagePath)) {
                echo '<img src="' . $userImagePath . '" alt="User Avatar">';
            } else {
                echo '<img src="avatar/default-avatar.jpg" alt="Default Profile Picture">';
            }
        }

        if (isset($message)) {
            foreach ($message as $msg) {
                echo '<div class="message">' . $msg . '</div>';
            }
        }
        ?>
        <div class="flex">
            <div class="inputBox">
                <span>Username :</span>
                <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
                <span>Your Email :</span>
                <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                <span>Your Gender :</span>
                <select name="update_gender" class="box">
                    <option value="male" <?php if ($fetch['gender'] == 'male') {
                        echo 'selected';
                    } ?>>Male
                    </option>
                    <option value="female" <?php if ($fetch['gender'] == 'female') {
                        echo 'selected';
                    } ?>>Female
                    </option>
                    <option value="other" <?php if ($fetch['gender'] == 'other') {
                        echo 'selected';
                    } ?>>Other
                    </option>
                </select>
            </div>
            <div class="inputBox">
                <span>Old Password :</span>
                <input type="password" name="old_pass" placeholder="Enter previous password" class="box">
                <span>New Password :</span>
                <input type="password" name="new_pass" placeholder="Enter new password" class="box">
                <span>Confirm Password :</span>
                <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
            </div>
        </div>
        <input type="submit" value="Update Profile" name="update_profile" class="btn">
        <a href="index.php" class="delete-btn">Go Back</a>
    </form>
</div>

</body>
</html>

<?php include 'footer.php'; ?>
