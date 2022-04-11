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
        $sql = "SELECT * from review_link where rev_id=$brand limit 1";
        $run = mysqli_query($conn,$sql);
        while($data = mysqli_fetch_assoc($run))
        {
            $row['rev_id'] =  $data['rev_id'];
            $row['rev_name'] =$data['rev_name'];
            $row['rev_slug'] =$data['rev_slug'];
            $row['rev_desc'] =$data['rev_desc'];
            $row['rev_nmsg1'] =$data['rev_nmsg1'];
            $row['rev_nmsg2'] =$data['rev_nmsg2'];
            $row['rev_pmsg'] =$data['rev_pmsg'];


        }
        echo json_encode($row);

}
