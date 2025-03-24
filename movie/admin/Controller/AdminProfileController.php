<?php
require __DIR__ . '/../Model/AdminProfileModel.php';

class AdminProfileController {
    private $model;

    public function __construct($con) {
        $this->model = new AdminProfileModel($con);
    }

    public function handleRequest($adminId, $postData, $fileData) {
        $messages = [];
        
        if (isset($postData['update_profile'])) {
            $update_name = mysqli_real_escape_string($this->model->con, $postData['update_name']);
            $update_email = mysqli_real_escape_string($this->model->con, $postData['update_email']);
            $update_gender = mysqli_real_escape_string($this->model->con, $postData['update_gender']);
            $old_pass = mysqli_real_escape_string($this->model->con, $postData['old_pass']);
            $new_pass = mysqli_real_escape_string($this->model->con, $postData['new_pass']);
            $confirm_pass = mysqli_real_escape_string($this->model->con, $postData['confirm_pass']);

            // Check if the email is already in use by another admin
            $result_email = $this->model->getAdminByEmail($update_email, $adminId);
            if ($result_email && $result_email->num_rows > 0) {
                $messages[] = 'Email already in use!';
            } else {
                // Update profile details
                $update_result = $this->model->updateAdminProfile($adminId, $update_name, $update_email, $update_gender);
                if (!$update_result) {
                    $messages[] = 'Profile update failed!';
                }

                // Handle password change if provided
                if (!empty($old_pass) || !empty($new_pass) || !empty($confirm_pass)) {
                    $current_pass_result = $this->model->getCurrentPassword($adminId);
                    if ($current_pass_result) {
                        $fetch = $current_pass_result->fetch_assoc();
                        if (!password_verify($old_pass, $fetch['password'])) {
                            $messages[] = 'Old password does not match!';
                        } elseif ($new_pass !== $confirm_pass) {
                            $messages[] = 'New passwords do not match!';
                        } else {
                            $hashed_new_pass = password_hash($confirm_pass, PASSWORD_BCRYPT);
                            $update_pass_result = $this->model->updateAdminPassword($adminId, $hashed_new_pass);
                            if (!$update_pass_result) {
                                $messages[] = 'Password update failed!';
                            } else {
                                $messages[] = 'Password updated successfully.';
                            }
                        }
                    } else {
                        $messages[] = 'Password retrieval failed!';
                    }
                }
            }
        }

        $admin_result = $this->model->getAdminById($adminId);
        if (!$admin_result) {
            $messages[] = 'Error fetching admin details!';
        }
        return [
            'admin' => $admin_result ? $admin_result->fetch_assoc() : null,
            'messages' => $messages
        ];
    }
}
?>
