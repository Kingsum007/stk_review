<?php
session_start();
require_once ('../includes/db.php');
$db = new DBController();
$conn = $db->connect();
if(isset($_POST['save']))
{
    $user = $_SESSION['user_key'];
    $st_id = $_POST['st_id'];
    $name = $_POST['st_name'];
    $tags = $_POST['st_tags'];
    $desc = $_POST['st_desc'];
    $date = $_POST['st_date'];
    $image = $_FILES['st_image']['name'];
    $tmp = $_FILES['st_image']['tmp_name'];
    $star = $_POST['rating'];
    try {
        $sql = "Update `sticky_review` set `st_name`='$name', `st_tags`='$tags', `st_desc`='$desc', `st_stars`=$star, `st_date`='$date', `st_image`='$image' where st_id=$st_id ";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            move_uploaded_file($tmp, 'uploads/' . $image . '');
            echo "<script>alert('Review Updated Successfully'); window.location='index.php';</script>";

        } else {
            echo mysqli_error($conn);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}