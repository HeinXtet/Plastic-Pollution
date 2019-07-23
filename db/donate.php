<?php


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
            if ($process->userTransaction($email, $conn) == false) {
                $insertQuery = "INSERT INTO donate (email) VALUES  ('$email');";
                if ($conn->query($insertQuery) === true) {
                    $_SESSION['donate_success'] = true;
                    $isDonated = true;
                    header("location:../page/index.php");
                } else {
                    echo "Error: " . "<br>" . $conn->error;
                }
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
    }
}
