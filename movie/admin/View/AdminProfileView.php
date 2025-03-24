<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Profile</title>
   <link rel="stylesheet" href="../css/user_profile.css">
</head>
<body>
   
<div class="update-profile">
   <form action="" method="post">
      <?php
      if (isset($admin['profile_picture']) && !empty($admin['profile_picture'])) {
         echo '<img src="uploads/' . htmlspecialchars($admin['profile_picture'], ENT_QUOTES, 'UTF-8') . '" alt="Profile Picture">';
      } else {
         $adminImagePath = '../avatar/admin' . htmlspecialchars($_SESSION['admin_id'], ENT_QUOTES, 'UTF-8') . '.jpg';
         if (file_exists($adminImagePath)) {
            echo '<img src="' . htmlspecialchars($adminImagePath, ENT_QUOTES, 'UTF-8') . '" alt="Admin Avatar">';
         } else {
            echo '<img src="../avatar/default-avatar.jpg" alt="Default Profile Picture">';
         }
      }

      if (!empty($messages)) {
         foreach ($messages as $msg) {
            echo '<div class="message">' . htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') . '</div>';
         }
      }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Admin Name :</span>
            <input type="text" name="update_name" value="<?php echo htmlspecialchars($admin['name'], ENT_QUOTES, 'UTF-8'); ?>" class="box">
            <span>Your Email :</span>
            <input type="email" name="update_email" value="<?php echo htmlspecialchars($admin['email'], ENT_QUOTES, 'UTF-8'); ?>" class="box">
            <span>Your Gender :</span>
            <select name="update_gender" class="box">
               <option value="male" <?php if ($admin['gender'] == 'male') { echo 'selected'; } ?>>Male</option>
               <option value="female" <?php if ($admin['gender'] == 'female') { echo 'selected'; } ?>>Female</option>
               <option value="other" <?php if ($admin['gender'] == 'other') { echo 'selected'; } ?>>Other</option>
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
      <a href="movie_details.php" class="delete-btn">Go Back</a>
   </form>
</div>

</body>
</html>
