<?php
if(isset($_GET['token']))
{
        require_once ('../includes/db.php');
        $db = new DBController();
        $conn = $db->connect();
        $update = "update users set u_statue=1 where u_token='{$_GET['token']}'";
         mysqli_query($conn,$update);
         $user = mysqli_fetch_assoc( mysqli_query($conn,"SELECT u_name,u_id from users where u_token='{$_GET['token']}'"));
         $_SESSION['username'] = $user['u_name'];
         $_SESSION['user_key'] = $user['u_id'];
         header('location:../index.php');
}
else
{
    header('location:../login.php');
}