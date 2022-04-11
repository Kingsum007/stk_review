<?php
require_once ('../includes/db.php');
$db = new DBController();
$conn = $db->connect();
if(isset($_POST['Positive_NF']))
{
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $rating = $_POST['rating'];
    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $sql = "INSERT INTO `feedback`( `fb_name`, `fb_description`, `fb_star`, `fb_image`)
                                  VALUES ('$title','$desc','$rating','$file')";
    if($title !='') {
        if (mysqli_query($conn, $sql)) {
            move_uploaded_file($tmp, 'uploads/' . $file . '');
            echo "<script>alert('Thank You For Review'); window.location='../index.php';</script>";
        }
    }

}
elseif(isset($_POST['Negative_feed']))
{

    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO `negative_fb`(  `nf_email`, `nf_phone`) 
                              VALUES ('$email','$phone')";
    if($email !='') {
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Thank You For Review'); window.location='../index.php';</script>";
        }
    }

}