<?php
require_once ('../includes/db.php');
require_once ('../includes/header.php');
require_once ('../includes/footer.php');
$db = new DBController();
$conn = $db->connect();
if(isset($_POST['save']))
{
    $user = $_SESSION['user_key'];
    $name = $_POST['rev_name'];
    $slug= $_POST['rev_slug'];
    $desc = $_POST['rev_desc'];
    $campaign = $_POST['rev_campaign'];
    $nmsg1 = $_POST['rev_nmsg1'];
    $nmsg2 = $_POST['rev_nmsg2'];
    $pmsg = $_POST['rev_pmsg'];
    $approve = $_POST['rev_approve'];
    $image = $_FILES['rev_image']['name'];
    $tmp = $_FILES['rev_image']['tmp_name'];
    $star = $_POST['rating'];
    try {
        $sql = "INSERT INTO `review_link`(`rev_name`, `rev_slug`, `rev_desc`, `rev_image`, `rev_approve`, `rev_campaign`, `rev_nmsg1`, `rev_nmsg2`, `rev_rating`, `rev_pmsg`, `user_key`) 
                                   VALUES ('$name','$slug','$desc','$image','$approve' ,'$campaign','$nmsg1','$nmsg2',$star,'$pmsg','$user')";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            move_uploaded_file($tmp, 'uploads/' . $image . '');
            echo "<script>$(document).ready(function() {
    toastr.success('review Link Added Successfully');
}); window.location='index.php';</script>";

        } else {
            echo mysqli_error($conn);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}