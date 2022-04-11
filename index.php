<!<!doctype html>
<html lang="en">
<?php
session_start();
require_once ('includes/db.php');
require_once ('Controllers/PositiveFeed.php');
if(empty($_SESSION["username"]))
{
    header('location:../login.php');
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Vendor/styles.css">
    <link rel="stylesheet" href="Vendor/css/bootstrap.css">
    <link rel="stylesheet" href="Vendor/datatables.css">
    <link rel="stylesheet" href="Vendor/datatables.min.css">
    <link rel="stylesheet" href="Vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="Vendor/font-awesome/fonts/fontawesome-webfont5b62.eot">
    <link rel="stylesheet" href="Vendor/font-awesome/fonts/fontawesome-webfont5b62.svg">
    <link rel="stylesheet" href="Vendor/font-awesome/fonts/fontawesome-webfont5b62.ttf">
    <title>Sticky Review App</title>
    <script src="Vendor/js/bootstrap.bundle.js"></script>
    <script src="Vendor/jquery.js"></script>
    <script src="Vendor/datatables.js"></script>
    <script src="Vendor/datatables.min.js"></script>
    <script src="Vendor/script.js"></script>
    <style>


    </style>
</head>

<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light"><?php echo $_SESSION['username']; ?></div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Dashboard</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="branding/">Branding</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="campaign/">Campaigns</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="reviews/">Sticky Review</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="review_link">Create Review Link</a>

            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="PositiveFeedbacks/">Positive Feedbacks</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="NegativeFeedbacks/">Negative Feedbacks</a>

            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Controllers/logoutController.php?logout=1">Sign Out</a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle"><i class="navbar-toggler-icon"></i></button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active"><a class="nav-link" href="#!">Sticky Review App</a></li>
                        <!--                        <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>-->
                        <!--                        <li class="nav-item dropdown">-->
                        <!--                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>-->
                        <!--                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">-->
                        <!--                                <a class="dropdown-item" href="#!">Action</a>-->
                        <!--                                <a class="dropdown-item" href="#!">Another action</a>-->
                        <!--                                <div class="dropdown-divider"></div>-->
                        <!--                                <a class="dropdown-item" href="#!">Something else here</a>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container-fluid">
<?php
            $db = new DBController();

            $conn = $db->connect();

            $dCtrl  =	new PositiveFeed($conn);

            $reviews = $dCtrl->index();
            ?>
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 20px;">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">Positive Feedbacks
                            </div>

                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-hovered table-striped" id="productTable">
                                    <thead>
                                    <th>  ID </th>
                                    <th>  Name </th>
                                    <th> Description</th>
                                    <th> Star Rating</th>
                                    <th>Date Created</th>
                                    <th> Image</th>

                                    </thead>

                                    <tbody>

                                    <?php
                                    foreach($reviews as $review) : ?>

                                        <tr>
                                            <td id="b_id"> <?php echo $review['fb_id']; ?> </td>
                                            <td> <?php echo $review['fb_name']; ?> </td>
                                            <td> <?php echo $review['fb_description']; ?> </td>
                                            <td>

                                                <h6 class="text-center mt-2 mb-4">
                                                    <?php
                                                    if($review['fb_star']==5)
                                                    {
                                                        echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_5" data-rating="5"></i>
                                        </h4>';
                                                    }
                                                    elseif($review['fb_star']==4)
                                                    {
                                                        echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h6>';
                                                    }
                                                    elseif($review['fb_star']==3)
                                                    {
                                                        echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 " id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h6>';
                                                    }
                                                    elseif($review['fb_star']==2)
                                                    {
                                                        echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 " id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 " id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h6>';
                                                    }
                                                    elseif($review['fb_star']==1)
                                                    {
                                                        echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h6>';
                                                    }
                                                    ?>
                                            </td>
                                            <td><?php echo $review['fb_created_at'] ?></td>
                                            <td><a href="feedback/uploads/<?php echo $review['fb_image']; ?>" target="_blank"> <img src="feedback/uploads/<?php echo $review['fb_image']; ?>" alt="" class="figure-img img-thumbnail" style="max-width: 3rem;"></a>  </td>
                                        </tr>


                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Bootstrap core JS-->

<!-- Core theme JS-->
<script src="Vendor/clipboard.js"></script>
<script src="Vendor/clipboard.min.js"></script>
</body>
</html>
<script>
    $(document).ready(function() {
        $('#productTable').DataTable();
    });
</script>