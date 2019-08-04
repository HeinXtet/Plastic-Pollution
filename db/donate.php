<?php
$donate = new Donate();
if(isset($_SESSION['email'])){
    $donate->donate();
}
class Donate
{
    public $isDonated = false;
    public function donate()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "plastic";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $process = new Querying();
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $name = $_POST['first_name'];
            $last_name = $_POST['last_name'];

            $message = $_POST['message'];
            
            if ($process->userTransaction($email, $conn) == false) {
                $insertQuery = "INSERT INTO donate (email,first_name,last_name,message) VALUES  ('$email','$name','$last_name','$message');";
                if ($conn->query($insertQuery) === true) {
                    $_SESSION['donate_success'] = true;
                    $isDonated = true;
                    return true;
                    // header("location:../page/index.php");
                } else {
                    echo "Error: " . "<br>" . $conn->error;
                    return false;
                }
            }else {
                return true;
            }
        }
    }
}
class Querying
{
    public function userTransaction($email, $conn)
    {
        $sql = "SELECT * FROM donate WHERE email = '$email' ";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }
}
