<?php
session_start();
require_once ('../includes/db.php');
$db = new DBController();
$conn = $db->connect();
$user = $_SESSION['user_key'];
$name = $_POST['cname1'];
$url = $_POST['curl1'];
$date = $_POST['cdate1'];
$style = $_POST['style1'];
$delay = $_POST['delay1'];
$brand = $_POST['brand1'];
try{
    $sql = "INSERT INTO `campaigns`( `campaign_name`, `domain_name`, `selected_style`,`delay`,`branding`,`date_reg`,`user_key`)
 VALUES ('$name','$url','$style','$delay','$brand','$date',$user)";
     $query=mysqli_query($conn,$sql);
     if($query) {
         echo "Campaign Saved Successfullay";
     }
     else
     {
         echo mysqli_error($conn);
     }
}
catch (Exception $e)
{
    echo $e->getMessage();
}
