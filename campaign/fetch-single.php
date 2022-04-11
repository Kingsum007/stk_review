<?php
session_start();
require_once ('../includes/db.php');
$db = new DBController();
$conn   = $db->connect();
if(isset($_POST['camp_id']))
{

    $out = array();
    $timeFormat = 'Y-m-d\TH:i';
    $brand = $_POST['camp_id'];
        $sql = "SELECT * from campaigns where id=$brand limit 1";
        $run = mysqli_query($conn,$sql);
        while($data = mysqli_fetch_assoc($run))
        {
            $reg_date = new DateTime($data['date_reg']);
            $row['id'] =$data['id'];
            $row['campaign_name'] =$data['campaign_name'];
            $row['domain_name'] =$data['domain_name'];
            $row['date_reg'] =$reg_date->format($timeFormat);
            $row['style'] =$data['selected_style'];
            $row['delay'] =$data['delay'];
        }
    echo json_encode($row);
}
