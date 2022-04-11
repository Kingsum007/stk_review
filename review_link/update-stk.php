<?php
session_start();
require_once ('../includes/db.php');
$db = new DBController();
$conn = $db->connect();
if(isset($_POST['save']))
{
    $user = $_SESSION['user_key'];
    $name = $_POST['rev_name'];
    $id = $_POST['rev_id'];
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
        $sql = "UPDATE `review_link` SET `rev_name`='$name',`rev_slug`='$slug',`rev_desc`='$desc',`rev_image`='$image',`rev_approve`=$approve,`rev_campaign`='$campaign',`rev_nmsg1`='$nmsg1',
                                          `rev_nmsg2`='$nmsg2',`rev_rating`=$star,`rev_pmsg`='$pmsg' WHERE `rev_id`=$id ";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            move_uploaded_file($tmp, 'uploads/' . $image . '');
            echo "<script>alert('Review Link Updated Successfully'); window.location='index.php';</script>";

        } else {
            echo mysqli_error($conn);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}