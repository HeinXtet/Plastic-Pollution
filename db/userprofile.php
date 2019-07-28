<?php
session_start();
include_once "../db/config.php";

$transaction = new Transaction();
if(isset($_POST['delete'])){
    $id = $_SESSION['user_id'];
    $deleteQuery = "DELETE FROM user where user_id = '$id' ";
    if (mysqli_query($conn, $deleteQuery)) {
        session_destroy();
        header("location:../page/index.php");
    }else {
        var_dump($conn->connect_error());
    }
}else if (isset($_POST['update'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    var_dump($firstName);
    $id = $_SESSION['user_id'];
    $transaction->updateUser($firstName, $lastName, $address, $conn);
} else if (isset($_POST['change_password'])) {
    $old = $_POST['old_password'];
    $new = $_POST['new_password'];

    $id = $_SESSION['user_id'];
    $sel_query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$id'")
    or die(mysql_error($conn));
    $user = mysqli_fetch_array($sel_query, MYSQLI_ASSOC);

    if ($old == $new) {
        $_SESSION['user_wrong_password'] = 'Your Old password  and New password should not be same.';
        header("location:../page/index.php");
    } else if (sha1($old) != $user['password']) {
        $_SESSION['user_wrong_password'] = 'Your Old password is not matching.';
        header("location:../page/index.php");
    } else {
        $transaction->updatePassword(sha1($new), $conn);
    }
}
class Transaction
{
    public function updateUser($first, $last, $address, $conn)
    {
        $id = $_SESSION['user_id'];
        $query = "UPDATE User SET
        first_name='$first',
        last_name='$last',
        address='$address'
        WHERE user_id='$id' ";
        if (mysqli_query($conn, $query)) {
            $_SESSION['user_update_success'] = 'update success';
            header("location:../page/index.php");
        }
    }

    public function updatePassword($pass, $conn)
    {
        $id = $_SESSION['user_id'];
        $query = "UPDATE user SET
        password='$pass'
        WHERE user_id='$id' ";
        try {
            if (mysqli_query($conn, $query)) {
                var_dump("SUCCESS");
                $_SESSION['chnage_password_success'] = 'Your password has been changed.';
                header("location:../page/index.php");
            }else{
                var_dump($conn->error() );
            }
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}
