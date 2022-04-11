<?php
session_start();
require_once ('../includes/db.php');
$db = new DBController();
$conn = $db->connect();
$user = $_SESSION['user_key'];
$name = $_POST['Bname1'];
$url = $_POST['Burl1'];
$date = $_POST['Bdate1'];
try{
    mysqli_query($conn,"INSERT INTO `branding`( `b_name`, `b_url`, `b_reg_date`, `b_user_key`) VALUES ('$name','$url','$date',$user)");
    echo "Brand Saved Successfullay";
}
catch (Exception $e)
{
    echo $e->getMessage();
}
