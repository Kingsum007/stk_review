<?php
require_once ('../includes/db.php');
if(isset($_POST['st_delete']))
{
    $db = new DBController();
    $conn = $db->connect();
    try{
        while($row = mysqli_fetch_assoc(mysqli_query($conn,'select * from sticky_review where st_id='.$_POST['st_delete'])))
        {
            $image = $row['st_image'];
            if(file_exists($image)) {
                unlink('uploads/' . $image);
            }
            else {
                mysqli_query($conn, 'DELETE FROM sticky_review where st_id=' . $_POST['st_delete'] . '');
                echo "Deleted Successfully";
            }
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
?>