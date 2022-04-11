<?php
session_start();
require_once('includes/db.php');
?>
!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Sticky Reviews App</title>
    <link rel="stylesheet" href="Vendor/css/bootstrap.css">
    <link rel="stylesheet" href="Vendor/styles.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check Email</div>

                <div class="card-body">
                    <form method="POST" action="forgot-password.php">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                            </div>
                        </div>
<br>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="resetPass">
                                SEND PASSWORD RESET LINK
                                </button>
                                  </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="Vendor/js/bootstrap.js"></script>
    <script src="Vendor/jquery.js"></script>
</body>
</html>
<?php
if(isset($_POST['resetPass']))
{
    $db = new DBController();
    $conn =$db->connect();
            $user = $_POST['email'];
            $query = "SELECT * from users where u_email = '$user'";
            try
            {
               $check = mysqli_query($conn,$query);
               $data = mysqli_fetch_assoc($check);

               $count = mysqli_num_rows($check);
               if($count == 1)
               {
                   $email = $data['u_email'];
               $name = $data['u_name'];
               $token = $data['u_token'];

                $to = $email;
                $subject = "Password Reset Request";

                $message = "
<html>
<head>
<title>{$subject}</title>
</head>
<body>
<p><strong>Dear: {$name}</strong></p>
<p>Forgot Password? Not a Problem. Click below link to reset your password.</p>
<p><a href='{$base_url}reset-pass.php?token={$token}'>Reset Password</a></p>
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
                     echo "<script type='text/javascript'>alWe Haveert(' Sent Verification Link to {$email}')</script>";
                    header('location:login.php');

                }
                else{
                    echo "<script>alert('Verification Failed ')</script>";
                }
            }

               else
               {
                   echo "<script>alert('email Not found')</script>";
               }

            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
}

?>