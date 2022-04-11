<?php
session_start();
require_once ('../includes/db.php');
$db = new DBController();
$conn   = $db->connect();
if(isset($_POST['st_id']))
{

    $row = array();
    $timeFormat = 'Y-m-d\TH:i';
    $brand = $_POST['st_id'];
        $sql = "SELECT * from sticky_review where st_id=$brand limit 1";
        $run = mysqli_query($conn,$sql);
        while($data = mysqli_fetch_assoc($run))
        {
            $reg_date = new DateTime($data['st_date']);
            $row['st_id'] =  $data['st_id'];
            $row['st_name'] =$data['st_name'];
            $row['st_tags'] =$data['st_tags'];
            $row['st_desc'] =$data['st_desc'];
            $row['st_stars'] =$data['st_stars'];
            $row['st_image'] =$data['st_image'];
            $row['st_user'] =$data['st_user'];
            $row['st_date'] =$reg_date->format($timeFormat);
        }
        echo json_encode($row);

}
