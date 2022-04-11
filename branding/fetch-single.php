<?php
session_start();
require_once ('../includes/db.php');
$db = new DBController();
$conn   = $db->connect();
if(isset($_POST['brand_id']))
{

    $out = array();
    $timeFormat = 'Y-m-d\TH:i';
    $brand = $_POST['brand_id'];
        $sql = "SELECT * from branding where b_id=$brand limit 1";
        $run = mysqli_query($conn,$sql);
        while($data = mysqli_fetch_assoc($run))
        {
            $reg_date = new DateTime($data['b_reg_date']);
            $row['b_id'] =$data['b_id'];
            $row['b_name'] =$data['b_name'];
            $row['b_url'] =$data['b_url'];
            $row['b_reg_date'] =$reg_date->format($timeFormat);
        }
    echo json_encode($row);
}
