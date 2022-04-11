<?php
require_once ('../includes/db.php');
$id=$_POST['id1'];
$name = $_POST['cname1'];
$url = $_POST['curl1'];
$date = $_POST['cdate1'];
$style = $_POST['style1'];
$delay = $_POST['delay1'];
$brand = $_POST['brand1'];

try
{
    $db = new DBController();
    $conn = $db->connect();
    $sql ="UPDATE `campaigns` SET `campaign_name`='$name',`domain_name`='$url',`selected_style`='$style',`delay`='$delay',`branding`='$brand',
`date_reg`='$date' WHERE `id`=$id";
    $query = mysqli_query($conn,$sql);
    if($query)
    {
        echo "Updated Successfully";
    }
    else
    {
        echo mysqli_query($conn);
    }
}
catch (Exception $e) {
    echo $e->getMessage();
}