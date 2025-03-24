<?php
require __DIR__ . "/../Model/UserEditModel.php";

class UserEditController {
    private $model;

    public function __construct($con) {
        $this->model = new UserEditModel($con);
    }

    public function handleRequest() {
        $userId = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $currentImage = $_POST['currentImage'];
            
            if ($this->model->updateUser($userId, $name, $email, $gender)) {
                $this->handleAvatarUpload($userId);
                header('Location: user_details.php');
                exit();
            } else {
                return "Error updating user: " . $this->model->con->error;
            }
        } else {
            $user = $this->model->getUserById($userId);
            if ($user === null) {
                return "User not found.";
            }
            return $user;
        }
    }

    private function handleAvatarUpload($userId) {
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = '../avatar/';
            $uploadFile = $uploadDir . 'user' . $userId . '.jpg';
            $fileType = $_FILES['avatar']['type'];
            $fileExtension = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
            
            if ($fileType == 'image/jpeg' && $fileExtension == 'jpg') {
                if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
                    throw new Exception("Error uploading file.");
                }
            } else {
                throw new Exception("Invalid file type. Only JPG images are allowed.");
            }
        }
    }
}
?>
