<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="form-container">
   <form action="" method="post">
      <?php
      if (isset($error)) {
         foreach ($error as $err) {
            echo '<span class="error-msg">'.$err.'</span>';
         }
      }
      ?>

      <!-- Hidden input to store selected account type -->
      <input type="hidden" name="account_type" id="account_type" value="user">

      <!-- Account Type Selection -->
      <div class="account-buttons">
         <button type="button" value="user" class="account-btn selected">User Login</button>
         <button type="button" value="admin" class="account-btn">Admin Login</button>
      </div>

      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login Now" class="form-btn">

      <!-- Registration link, visible only for users -->
      <p class="register-link" style="display: block;">Don't have an account? <a href="register.php">Register Now</a></p>
   </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
   const accountButtons = document.querySelectorAll('.account-btn');
   const accountTypeInput = document.getElementById('account_type');
   const registerLink = document.querySelector('.register-link');

   accountButtons.forEach(btn => {
      btn.addEventListener('click', function () {
         accountButtons.forEach(b => b.classList.remove('selected'));
         btn.classList.add('selected');

         // Update the hidden input with the selected account type
         accountTypeInput.value = btn.value;

         // Toggle registration link visibility
         if (btn.value === 'user') {
            registerLink.style.display = 'block';
         } else {
            registerLink.style.display = 'none';
         }
      });
   });
});
</script>

</body>
</html>
