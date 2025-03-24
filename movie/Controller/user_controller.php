<?php

require_once 'Model/user_model.php';

class UserController {
    private $userModel;
    private $messages = [];

    public function __construct($con) {
        $this->userModel = new UserModel($con);
    }

    public function handleProfileUpdate($user_id, $postData) {
        // Retrieve data from $postData
        $update_name = mysqli_real_escape_string($this->userModel->getConnection(), $postData['update_name']);
        $update_email = mysqli_real_escape_string($this->userModel->getConnection(), $postData['update_email']);
        $update_gender = mysqli_real_escape_string($this->userModel->getConnection(), $postData['update_gender']);

        // Check if the email is already in use
        $select_email = "SELECT * FROM users WHERE email = '$update_email' AND id != '$user_id'";
        $result_email = mysqli_query($this->userModel->getConnection(), $select_email);

        if (mysqli_num_rows($result_email) > 0) {
            $this->messages[] = 'Email already in use!';
        } else {
            // Update profile in the database
            $this->userModel->updateUserProfile($user_id, $update_name, $update_email, $update_gender);
        }

        // Handle password update
        $old_pass = mysqli_real_escape_string($this->userModel->getConnection(), $postData['old_pass']);
        $new_pass = mysqli_real_escape_string($this->userModel->getConnection(), $postData['new_pass']);
        $confirm_pass = mysqli_real_escape_string($this->userModel->getConnection(), $postData['confirm_pass']);

        if (!empty($old_pass) || !empty($new_pass) || !empty($confirm_pass)) {
            $fetch = $this->userModel->getUserById($user_id);

            if (!password_verify($old_pass, $fetch['password'])) {
                $this->messages[] = 'Old password not matched!';
            } elseif ($new_pass != $confirm_pass) {
                $this->messages[] = 'Confirm password not matched!';
            } else {
                $hashed_new_pass = password_hash($confirm_pass, PASSWORD_BCRYPT);
                $this->userModel->updateUserPassword($user_id, $hashed_new_pass);
                $this->messages[] = '<div style="background-color:green">Password updated successfully.</div>';
            }
        }
    }

    public function getUserProfile($user_id) {
        return $this->userModel->getUserById($user_id);
    }

    public function getMessages() {
        return $this->messages;
    }
}
?>
