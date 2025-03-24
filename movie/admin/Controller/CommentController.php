<?php
include 'Model/CommentModel.php';

class CommentController {
    private $commentModel;

    public function __construct($con) {
        $this->commentModel = new CommentModel($con);
    }

    public function handleRequest() {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $status = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add'])) {
                $status = $this->addComment($_POST);
            } elseif (isset($_POST['update'])) {
                $status = $this->updateComment($_POST);
            } elseif (isset($_POST['delete'])) {
                $status = $this->deleteComment($_POST['delete']);
            }
            $_SESSION['status'] = $status;
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }

        return $this->commentModel->getComments();
    }

    private function addComment($data) {
        $comment = $data['comment'];
        $userId = $data['userId'];
        $movieId = $data['movieId'];
        $currentTime = date('Y-m-d H:i:s');

        return $this->commentModel->addComment($comment, $userId, $movieId, $currentTime) ? 
            "Comment added successfully!" : "Error adding comment.";
    }

    private function updateComment($data) {
        $commentId = $data['commentId'];
        $comment = $data['comment'];
        $userId = $data['userId'];
        $movieId = $data['movieId'];
        $currentTime = date('Y-m-d H:i:s');

        return $this->commentModel->updateComment($commentId, $comment, $userId, $movieId, $currentTime) ? 
            "Comment updated successfully!" : "Error updating comment.";
    }

    private function deleteComment($commentId) {
        return $this->commentModel->deleteComment($commentId) ? 
            "Comment deleted successfully!" : "Error deleting comment.";
    }
}
?>
