<?php
session_start();
require_once ('../includes/db.php');
if(isset($_POST['login']))
{
    $db = new DBController();
    $conn =$db->connect();
    $user = $_POST['email'];
    $pass = $_POST['password'];
    $query = "SELECT * from users where u_email = '$user' and u_password = MD5('$pass')";
    try
    {
        $check = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($check);
        $count = mysqli_num_rows($check);
        if($count == 1)
        {
            $_SESSION['username'] = $data['u_name'];
            $_SESSION ['user_key'] = $data['u_id'];
            header('location:../index.php');
        }
        else
        {
           echo "<script>alert('Wrong Credentials'); window.location='../login.php';</script>";

        }
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

