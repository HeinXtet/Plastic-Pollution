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
$process = new Querying();

if (!isset($_POST['login'])){
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if (isset($_POST['clear'])) {
        var_dump('clear');
        session_destroy();
        header('location:../page/index.php');
    } else {
        $generateId = 'PP'.sha1($email);
        $encryptedPassword = sha1($password);
        if ($process->userTransaction($email, $conn) == false) {
            $insertQuery = "INSERT INTO user (first_name,last_name,email,password,user_id) VALUES  ('$firstName','$lastName','$email','$encryptedPassword','$generateId');";
            if ($conn->query($insertQuery) === true) {
               $process->userTransaction($email,$conn);
            } else {
                echo "Error: " . "<br>" . $conn->error;
            }
        }
    }
}else{
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($_SESSION['attampts'] < 3){
        $encryptedPassword = sha1($password);
        $selectQuery = "SELECT * FROM user WHERE email = '$email' and password = '$encryptedPassword' ";
        $result = $conn->query($selectQuery);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. "<br>";
                $process->userTransaction($email,$conn);
            }
        } else {
            $attamptCount  = $_SESSION['attampts'];
            $attamptCount = $attamptCount + 1; 
            $_SESSION['attampts'] = $attamptCount;
            $_SESSION['error'] = "UnAuthorized User, Please try again. Login Error Count ".$_SESSION['attampts'] ;
            header("location:../page/index.php");
        }
    }else{
        $_SESSION['error'] = "You've failed too many times, dude.You can try again after 3 minutes. ".$_SESSION['attampts'];
        header('location:../page/index.php');
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
