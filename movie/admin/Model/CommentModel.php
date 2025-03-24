<?php
class CommentModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function addComment($comment, $userId, $movieId, $currentTime) {
        $sql = "INSERT INTO comment (comment, commentTime, userId, movieId) VALUES (?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('ssii', $comment, $currentTime, $userId, $movieId);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function updateComment($commentId, $comment, $userId, $movieId, $currentTime) {
        $sql = "UPDATE comment SET comment=?, commentTime=?, userId=?, movieId=? WHERE commentId=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('ssiii', $comment, $currentTime, $userId, $movieId, $commentId);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function deleteComment($commentId) {
        $sql = "DELETE FROM comment WHERE commentId=?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param('i', $commentId);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function getComments() {
        $sql = "SELECT c.commentId, c.comment, c.commentTime, c.userId, c.movieId, m.movieName, u.name AS userName 
                FROM comment c 
                JOIN movie m ON c.movieId = m.movieId 
                JOIN users u ON c.userId = u.id 
                ORDER BY c.commentId";
        return $this->con->query($sql);
    }
}
?>
