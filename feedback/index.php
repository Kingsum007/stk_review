<?php
require_once '../includes/db.php';

require_once '../Controllers/FeedbackController.php';

$db = new DBController();

$conn = $db->connect();

$dCtrl  =	new FeedbackController($conn);

$camps = $dCtrl->index();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../Vendor/animate.css">
    <link rel="stylesheet" href="../Vendor/css/bootstrap.css">
    <link rel="stylesheet" href="../Vendor/css/bootstrap-utilities.min.css">
    <link rel="stylesheet" href="../Vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Vendor/css/bootstrap-utilities.css">
    <link rel="stylesheet" href="../Vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Vendor/font-awesome/fonts/fontawesome-webfont5b62.eot">
    <link rel="stylesheet" href="../Vendor/font-awesome/fonts/fontawesome-webfont5b62.svg">
    <link rel="stylesheet" href="../Vendor/font-awesome/fonts/fontawesome-webfont5b62.ttf">
    <title>FeedBack</title>
    <style>
    .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    @media (min-width: 992px) {
    .rounded-lg-3 { border-radius: .3rem; }
    }
    </style>
</head>
<body>
<main style="direction: ltr; display: contents; padding: 10%;">
    <?php foreach ($camps as $camp)
        echo '
  
  <center>
<div class="card border-info mb-3 animate__animated animate__fadeInRight" style="max-width: 25rem;">
  <div class="card-header bg-transparent border-success">Feed Back Form</div>
  <div class="card-body ">
  <div class="card-img-top"><img src="../review_link/uploads/'.$camp['rev_image'].'" class="img-fluid" alt=""></div>
  <div id="Intro">
    <h5 class="card-title">'.$camp['rev_name'].'</h5>
    <p class="card-text">'.$camp['rev_desc'].'</p>
    <p class="h3">Would you like to recommend us?</p>
    <button id="yes" class="btn btn-sm btn-outline-info">Yes</button>
    <button id="no" class="btn btn-sm btn-outline-warning">No</button>
  </div>
  <div id="yesClick" class="visually-hidden">
    <h5 class="card-title">'.$camp['rev_name'].'</h5>
    <p class="card-text">'.$camp['rev_pmsg'].'</p>
  <form action="insert.php" class="text-lg-start" method="post" enctype="multipart/form-data">

    <div class="form-group">
    <label for="">Review Title</label>
<input type="text" name="title" id="rev_title" class="form-control">
</div>   
 <div class="form-group">
    <label for="">Review Description</label>
<textarea name="desc" id="rev_desc" class="form-control"></textarea>
</div>
 <div class="form-group">
                                                <hr>
                                                <label for="rev_stars" class="text-center">Star Rating</label>
                                                <br>

                                                <h4 class="text-center mt-2 mb-4">
                                                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                                    <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                                </h4>
                                                <input type="hidden" name="rating" id="rating" value="" />
                                                <hr>
                                            </div>
                                            <div class="form-group d-grid gap-2">
                                            <button  class="btn btn-primary " id="stepOnesave" style="display: block;">Save</button>
</div>

</div>
  </div>
  <div id="saveClick" class="visually-hidden">
  <h5 class="card-title">'.$camp['rev_name'].'</h5>
  <p> <strong>Can we use your Review in our website</strong></p>
   <button id="yes1" class="btn btn-sm btn-outline-info">Yes</button>
    <button id="no1" class="btn btn-sm btn-outline-warning" name="Positive_NF">No</button>
</div>
<div id="yes_click" class="visually-hidden">
<div class="form-group">

<input type="file" name="file" id="file" class="form-control">
</div>
<div class="form-group d-grid gap-2">
<button class="btn btn-primary" name="Positive_NF">Next</button>
</div>
</div>
<div id="noClick" class="visually-hidden" >
    <p class="card-text">'.$camp['rev_nmsg1'].'</p>
        <div class="form-group" style="text-align: left;">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
</div>
  <div class="form-group" style="text-align: left;">
        <label for="phone">Phone (Optional)</label>
        <input type="phone" name="phone" id="phone" class="form-control">
        <div class="form-group d-grid gap-2">
<button class="btn btn-primary" name="Negative_feed">Next</button>
</div>
</div>
</div>
</form>
  <div class="card-footer bg-transparent border-info">'.$camp['rev_slug'].'</div>
</div>
    </center>
    
    ';


        ?>

</main>
<script src="../Vendor/js/bootstrap.js"></script>
<script src="../Vendor/js/bootstrap.bundle.js"></script>
<script src="../Vendor/jquery.js"></script>
<link rel="stylesheet" href="../Vendor/app.js">
<script>
    $(document).ready(function () {
        $('#yes').click(function () {
            $('#Intro').addClass('visually-hidden');
            $('#yesClick').removeClass('visually-hidden');
        });
        $('#stepOnesave').click(function (e) {
            e.preventDefault();
            $('#yesClick').addClass('visually-hidden');
            $('#saveClick').removeClass('visually-hidden')

        });
        $('#yes1').click(function (e) {
            e.preventDefault();
            $('#saveClick').addClass('visually-hidden');
            $('#yes_click').removeClass('visually-hidden');

        })
        $(document).on('mouseenter','.submit_star',function () {
            var rating = $(this).data('rating');
            reset_background();
            for(var count =1; count<=rating;count++)
            {
                $('#submit_star_'+count).addClass('text-warning');
            }
        });
        $(document).on('click','.submit_star',function () {
            rating_data = $(this).data('rating');
            document.getElementById('rating').value = rating_data;
            var dd = $('#rating').val();
        });
        $('#no').click(function (e) {
            e.preventDefault();
            $('#Intro').addClass('visually-hidden'),
                $('#noClick').removeClass('visually-hidden');
        });
        $('$no1').click(function () {

        })
    });
    function reset_background() {
        for(var count =1;count<=5;count++)
        {
            $('#submit_star_'+count).addClass('star-light');
            $('#submit_star_'+count).removeClass('text-warning');
        }
    }
</script>
</body>
</html>
