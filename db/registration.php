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

if (!isset($_POST['login'])) {
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
        $encryptedPassword = sha1($password);
        $generateId = 'PP' . sha1($email);
        $id = $process->getPrefixId($conn);
        if ($id != null) {
            if ($process->userTransaction($email, $conn) == false) {
                $insertQuery = "INSERT INTO user
                (first_name,last_name,email,password,user_id)
                 VALUES  ('$firstName','$lastName','$email','$encryptedPassword','$id');";
                if ($conn->query($insertQuery) === true) {
                    $process->userTransaction($email, $conn);
                } else {
                    echo "Error: " . "<br>" . $conn->error;
                }
            }
        }

    }
} else {
    if(isset($_SESSION['num_login_fail']))
    {
        if($_SESSION['num_login_fail']==3)
        {

            if(time()-$_SESSION['last_login_time']<3*60*60)
            {
                echo "<script>alert('You are blocked from 3 minutes');</script>";
               // return;
                echo '<script language="javascript">location.replace("../page/index.php");</script>';
                //header("location:../page/index.php");
               // exit;
               return;
            }
        }
    }
    else{
        $_SESSION['num_login_fail']=0;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    var_dump("email $email pass $password");
    var_dump(sha1($password));

    if ($_SESSION['login_error_count'] < 3) {
        $encryptedPassword = sha1($password);
        $selectQuery = "SELECT * FROM user WHERE email = '$email' and password = '$encryptedPassword' ";
        $result = $conn->query($selectQuery);
        if ($result->num_rows > 0) {
            $_SESSION['num_login_fail']=0;
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
                $process->userTransaction($email, $conn);
            }
        } else {
            $_SESSION['num_login_fail']=$_SESSION['num_login_fail']+1;
            $_SESSION['last_login_time']=time();
            $attamptCount = $_SESSION['login_error_count'];
            $attamptCount = $attamptCount + 1;
            $_SESSION['login_error_count'] = $attamptCount;
            header("location:../page/index.php");
        }
    } else {
        $_SESSION['error'] = "You've failed too many times, dude.You can try again after 3 minutes. " . $_SESSION['attampts'];
        header('location:../page/index.php');
    }
}
$conn->close();
class Querying
{

    public function getPrefixId($conn)
    {
        $prefix = "PP";
        try {
            $sql = "SELECT * FROM maxIndex where id= '1' ";
            $result = $conn->query($sql);
            $data = $result->fetch_assoc();

            $maxId = $data['maxId'] + 1;
            var_dump($maxId);
            $id = $prefix . sprintf("%06s", $maxId);
            $saveMax = "UPDATE maxIndex SET
            maxId = '$maxId'
            WHERE id='1' ";
            if ($conn->query($saveMax) === true) {
                return $id;
            } else {
                echo "Error: " . "<br>" . $conn->error;
                return null;
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }

    }

    public function userTransaction($email, $conn)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' ";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['email'] = $row["email"];
                $_SESSION['user_id'] = $row['user_id'];
                header('location:../page/index.php');
                echo "id: " . $row["id"] . " - Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
            }
            return true;
        } else {
            return false;
        }
    }

    public function getUser($id, $conn)
    {
        $sql = "SELECT * FROM user WHERE user_id = '$id' ";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                return $row;
            }
            return null;
        } else {
            return null;
        }
    }
}
