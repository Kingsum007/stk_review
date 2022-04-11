<?php
session_start();
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
                <div class="card-header">Sign Up</div>

                <div class="card-body">
                    <form method="POST" action="Controllers/signupController.php">
                        
                    <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autocomplete="Name" autofocus>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" >
                            </div>
                        </div>
<br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                    <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                              <input type="submit" value="Sign Up" name='signup' class="btn btn-primary">

                    
                            
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
