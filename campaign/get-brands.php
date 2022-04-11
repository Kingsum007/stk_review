<?php
session_start();
require_once ('../includes/db.php');
$db = new DBController();
$conn = $db->connect();
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    try{
       $query=  mysqli_query($conn,"SELECT  `b_name` FROM `branding` WHERE `b_user_key`=".$id." ");
       $count = mysqli_num_rows($query);
       if($count>0)
       {
       while ($row = mysqli_fetch_assoc($query))
        echo '
                                                    <option value='.$row['b_name'].'>'.$row['b_name'].'</option>
                                               
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