<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Comments</title>
    <link rel="stylesheet" href="css/admin_comment.css">
</head>
<body>
    <h2>Manage Comments</h2>

    <!-- Display Status Message -->
    <?php if (isset($_SESSION['status'])): ?>
        <p class="<?php echo strpos($_SESSION['status'], 'Error') !== false ? 'error' : 'success'; ?>">
            <?php echo htmlspecialchars($_SESSION['status']); ?>
        </p>
        <?php unset($_SESSION['status']); ?>
    <?php endif; ?>

    <!-- Add Comment Form -->
    <div class="container">
        <h3>Add Comment</h3>
        <form method="post" action="">
            <label for="comment">Comment:</label>
            <textarea name="comment" rows="3" cols="30" required></textarea><br>

            <label for="userId">User ID:</label>
            <input type="text" name="userId" required><br>

            <label for="movieId">Movie ID:</label>
            <input type="text" name="movieId" required><br>

            <input type="submit" name="add" value="Add Comment">
        </form>
    </div>

    <!-- Comments Table -->
    <div class="container">
        <h3>Existing Comments</h3>
        <table border="1">
            <tr>
                <th>Comment ID</th>
                <th>Comment</th>
                <th>User ID</th>
                <th>User Name</th>
                <th>Movie ID</th>
                <th>Movie Name</th>
                <th>Comment Time</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php while ($row = $comments->fetch_assoc()): ?>
            <tr>
                <form method="post" action="">
                    <td><?php echo htmlspecialchars($row['commentId']); ?></td>
                    <td>
                        <textarea name="comment" rows="3" cols="30"><?php echo htmlspecialchars($row['comment']); ?></textarea>
                    </td>
                    <td>
                        <input type="text" name="userId" value="<?php echo htmlspecialchars($row['userId']); ?>">
                    </td>
                    <td><?php echo htmlspecialchars($row['userName']); ?></td>
                    <td>
                        <input type="text" name="movieId" value="<?php echo htmlspecialchars($row['movieId']); ?>">
                    </td>
                    <td><?php echo htmlspecialchars($row['movieName']); ?></td>
                    <td><?php echo htmlspecialchars($row['commentTime']); ?></td>
                    <td>
                        <input type="hidden" name="commentId" value="<?php echo htmlspecialchars($row['commentId']); ?>">
                        <button style="background-color: pink; color: black;" type="submit" name="update">Update</button>
                    </td>
                    <td>
                        <input type="hidden" name="delete" value="<?php echo htmlspecialchars($row['commentId']); ?>">
                        <button style="background-color: red" type="submit" onclick="return confirm('Are you sure you want to delete this comment?');">Delete</button>
                    </td>
                </form>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
