<?php
require_once ('../includes/db.php');
if(isset($_POST['resetPass']))
{
    $db = new DBController();
    $conn =$db->connect();
    $pass = $_POST['new_pass'];
    $cpass = $_POST['cnew_pass'];
    $token = $_POST['token'];
    $upd = "UPDATE users set u_password=MD5('$pass') where  u_token='{$token}'";

    if($pass == $cpass)
    {

        if(mysqli_query($conn,$upd))
        {
            header('location:../login.php');
        }
        else
        {
            echo mysqli_error($conn);
        }

    }
    else
    {
        echo "<script>alert('Passwords not Match')</script>";
    }
}

?>