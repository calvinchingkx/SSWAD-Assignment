<?php
require __DIR__ . "/../Model/AdminModel.php";

class AdminController {
    private $model;

    public function __construct($con) {
        $this->model = new AdminModel($con);
    }

    public function handleRequest() {
        $result = $this->model->getAllAdmins();
        if ($result === false) {
            return "Error retrieving admins: " . $this->model->con->error;
        }
        return $result;
    }
}
?>
