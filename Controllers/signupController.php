<?php 
session_start();
require_once('../includes/db.php');
if(isset($_POST['signup']))
{
    $db = new DBController();
    $conn = $db->connect();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $token = md5(rand());
    $status = 0;
    $query = "INSERT INTO `users`( `u_name`, `u_email`, `u_password`,`u_token`,`u_statue`) VALUES ('$name','$email',MD5('$pass'),'$token',$status)";
    try
    {
            $run = mysqli_query($conn,$query);
            if($run) {
                echo "<script type='text/javascript'>alert('We Have Sent Verification Link to {$email}')</script>";
                $to = $email;
                $subject = "Email Verification";

                $message = "
<html>
<head>
<title>{$subject}</title>
</head>
<body>
<p><strong>Dear: {$name}</strong></p>
<p>Thank you for Registration! Verify your email to access our website. Click the below link.</p>
<p><a href='{$base_url}verify.php?token={$token}'>Verify Email</a></p>
</body>
</html>
";

// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
                $headers .= "From: {$femail}";


                if (mail($to, $subject, $message, $headers))
                {

                    $_SESSION['username'] = $name;
                    header('location:../login.php');

                }
                else{
                    echo "<script>alert('Verification Failed')</script>";
                }
            }
        else
        {
            echo mysqli_error($conn);
        }
            
    }
    catch(Exception $e)
    {
            echo $e->getMessage();
    }
}

?>