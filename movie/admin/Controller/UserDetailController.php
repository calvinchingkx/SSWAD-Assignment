<?php
require __DIR__ . "/../Model/UserDetailModel.php";

class UserDetailController {
    private $model;

    public function __construct() {
        $this->model = new UserDetailModel();
    }

    public function listUsers() {
        $users = $this->model->getAllUsers();
        include __DIR__ . "/../View/UserDetailView.php";
    }
}
?>
