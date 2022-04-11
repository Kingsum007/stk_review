<?php
session_start();
require_once ('../includes/db.php');
$db = new DBController();
$conn = $db->connect();
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    try{
       $query=  mysqli_query($conn,"SELECT  `campaign_name` FROM `campaigns` WHERE `user_key`=".$id." ");
       $count = mysqli_num_rows($query);
       if($count>0)
       {
       while ($row = mysqli_fetch_assoc($query))
        echo '
                                                    <option value='.$row['campaign_name'].'>'.$row['campaign_name'].'</option>
                                               
        ';
    }
    else
    {
    echo 'Nothing Found';
    }
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}