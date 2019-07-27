<?php
session_start();
include_once "../db/config.php";
if (isset($_SESSION['user_id'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "plastic";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = '$id' ";
    $result = $conn->query($sql);
    return $result;
    // if ($result->num_rows == 1) {
    //     while ($row = $result->fetch_assoc()) {
    //         $user = $row;
    //         return $row;
    //     }
    // }
    $conn->close();
}
