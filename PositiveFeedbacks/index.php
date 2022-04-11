<?php
require_once ('../includes/header.php');
require_once ('../includes/db.php');
require_once '../Controllers/PositiveFeed.php';
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
                                    <td><a href="../feedback/uploads/<?php echo $review['fb_image']; ?>" target="_blank"> <img src="../feedback/uploads/<?php echo $review['fb_image']; ?>" alt="" class="figure-img img-thumbnail" style="max-width: 3rem;"></a>  </td>
                                </tr>


                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
require_once ('../includes/footer.php');
?>
<script>
    $(document).ready(function() {
        $('#productTable').DataTable();
    });
</script>