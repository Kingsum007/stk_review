<?php
require_once ('../includes/db.php');
if(isset($_POST['st_delete']))
{
    $db = new DBController();
    $conn = $db->connect();
    try{
        while($row = mysqli_fetch_assoc(mysqli_query($conn,'select * from review_link where rev_id='.$_POST['st_delete'])))
        {
            $image = $row['rev_image'];
            if(file_exists($image)) {
                unlink('uploads/' . $image);
            }
            else {
                mysqli_query($conn, 'DELETE FROM review_link where rev_id=' . $_POST['st_delete'] . '');
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