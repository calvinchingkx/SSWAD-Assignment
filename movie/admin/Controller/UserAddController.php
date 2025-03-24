<?php
require __DIR__ . "/../Model/UserAddModel.php";

class UserAddController {
    private $model;

    public function __construct($con) {
        $this->model = new UserAddModel($con);
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $password = $_POST['password'];

            if ($this->model->addUser($name, $email, $gender, $password)) {
                $userId = $this->model->getLastInsertId();
                $this->handleAvatarUpload($userId);
                header('Location: user_details.php');
                exit();
            } else {
                return "Error adding user: " . $this->model->con->error;
            }
        }
        return null;
    }

    private function handleAvatarUpload($userId) {
        if (!empty($_FILES["avatar"]["name"])) {
            $targetDir = "../avatar/";
            $targetFile = $targetDir . "user" . $userId . ".jpg"; // Avatar file path

            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if ($check !== false) {
                if (!move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFile)) {
                    throw new Exception("Error uploading the avatar.");
                }
            } else {
                throw new Exception("File is not a valid image.");
            }
        }
    }
}
?>
