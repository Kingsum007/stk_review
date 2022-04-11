<?php
session_start();
require_once ('../includes/db.php');
$db = new DBController();
$conn = $db->connect();
if(isset($_POST['save']))
{
    $user = $_SESSION['user_key'];
    $name = $_POST['st_name'];
    $tags = $_POST['st_tags'];
    $desc = $_POST['st_desc'];
    $date = $_POST['st_date'];
    $image = $_FILES['st_image']['name'];
    $tmp = $_FILES['st_image']['tmp_name'];
    $star = $_POST['rating'];
    try {
        $sql = "INSERT INTO `sticky_review`(`st_name`, `st_tags`, `st_desc`, `st_stars`, `st_date`, `st_user`, `st_image`)
                                    VALUES ('$name','$tags','$desc',$star,'$date','$user','$image')";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            move_uploaded_file($tmp, 'uploads/' . $image . '');
            echo "<script>alert('Review Added Successfully'); window.location='index.php';</script>";

        } else {
            echo mysqli_error($conn);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}