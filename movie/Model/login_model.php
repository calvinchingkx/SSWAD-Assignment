<?php
function getUserByEmail($email, $table) {
    global $con;
    $select = "SELECT * FROM $table WHERE email = '$email'";
    $result = mysqli_query($con, $select);
    return mysqli_fetch_array($result);
}
?>
