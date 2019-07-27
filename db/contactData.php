<?php
session_start();
include_once "../db/config.php";

if(isset($_POST['contact'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $sql = "INSERT INTO contact (name, email, message)
    VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['contact'] = true;
        echo "New record created successfully";
        header('location:../page/contact.php');

    } else {
        $_SESSION['contact'] = false;
        header('location:../page/contact.php');
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn ->close();
}
?>
