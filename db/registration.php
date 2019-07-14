<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plastic";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$process = new Querying();

if (isset($_POST['clear'])) {
    var_dump('clear');
    session_destroy();
    header('location:../page/index.php');
} else {
    $encryptedPassword = sha1($password);
    if ($process->userTransaction($email, $conn) == false) {
        $insertQuery = "INSERT INTO user (first_name,last_name,email,password) VALUES  ('$firstName','$lastName','$email','$encryptedPassword');";
        if ($conn->query($insertQuery) === true) {
           $process->userTransaction($email,$conn);
        } else {
            echo "Error: " . "<br>" . $conn->error;
        }
    }
}
$conn->close();

class Querying
{

    public function userTransaction($email, $conn)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' ";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['email'] = $row["email"];
                header('location:../page/index.php');
                echo "id: " . $row["id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
            }
            return true;
        } else {
            return false;
        }
    }

}
