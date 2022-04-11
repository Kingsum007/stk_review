<?php
require_once ('../includes/db.php');
$bid=$_POST['eb_id'];
$bname=$_POST['eb_name'];
$burl=$_POST['eb_url'];
$bdate=$_POST['eb_date'];

try
{
    $db = new DBController();
    $conn = $db->connect();
    mysqli_query($conn,"UPDATE `branding` SET `b_name`='$bname',`b_url`='$burl',`b_reg_date`='$bdate' WHERE `b_id` =$bid");
    echo "Updated";
}
catch (Exception $e) {
    echo $e->getMessage();
}