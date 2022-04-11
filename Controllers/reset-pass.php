<?php
session_start();
require_once('../includes/db.php');
?>
!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Sticky Reviews App</title>
    <link rel="stylesheet" href="../Vendor/css/bootstrap.css">
    <link rel="stylesheet" href="../Vendor/styles.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">RESET PASSWORD</div>

                <div class="card-body">
                    <form method="POST" action="ResetController.php">

                        <div class="form-group row">
                            <label for="new_pass" class="col-md-4 col-form-label text-md-right">New Password</label>

                            <div class="col-md-6">
                                <input id="new_pass" type="password" class="form-control" name="new_pass" required  autofocus>
                            </div>
                        </div>
<br>
                        <div class="form-group row">
                            <label for="cnew_pass" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="cnew_pass" type="password" class="form-control" name="cnew_pass" required >
                            </div>
                             <div class="col-md-6">
                                <input id="token" type="hidden" value="<?php echo $_GET['token'];?>" class="form-control" name="token" required >
                            </div>
                        </div>
<br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="resetPass">
                              RESET PASSWORD
                                </button>
                                  </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="../Vendor/js/bootstrap.js"></script>
    <script src="../Vendor/jquery.js"></script>
</body>
</html>
