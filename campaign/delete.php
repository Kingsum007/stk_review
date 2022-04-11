<?php
require_once ('../includes/db.php');
if(isset($_POST['campaign']))
{
    $db = new DBController();
    $conn = $db->connect();
    try{
        mysqli_query($conn,'DELETE FROM campaigns where id='.$_POST['campaign'].'');
        echo "Deleted Successfully";
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
?>