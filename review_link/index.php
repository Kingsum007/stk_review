<?php
require_once ('../includes/header.php');
	require_once '../includes/db.php';

	require_once '../Controllers/Review_linkController.php';

	$db = new DBController();

	$conn = $db->connect();

	$dCtrl  =	new Review_linkController($conn);

	$reviews = $dCtrl->index();
	$baseURL = "http://review.nishatbrothers.com/feedback/index.php?slug=";
?>
    <div class="container">


    </div>
        <div class="row justify-content-center" style="margin-top: 20px;">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Review Links
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal" id="add_btn" data-bs-target="#staticBackdrop">
                            Add
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Create Review Links</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="stInsertForm" enctype="multipart/form-data" method="post" action="insert.php">
                                            <div class="form-group">
                                                <label for="rev_name">Name</label>
                                                <input type="text" class="form-control" id="rev_name" name="rev_name" required placeholder="Enter Your  Name" autofocus autocomplete>
                                            </div>
                                            <div class="form-group">
                                                <label for="rev_tags">URL Slug</label>
                                                <input type="text" class="form-control" id="rev_slug" name="rev_slug" required placeholder="URL SLUG"  autocomplete>
                                            </div>
                                            <div class="form-group">
                                                <label for="rev_desc">Description</label>
                                                <textarea  class="form-control" id="rev_desc" name="rev_desc" required></textarea>
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
                                            <hr>
                                            <label for="">Auto Approve</label>
                                          <span>Yes  <input type="radio" name="rev_approve" id="" value="1" ></span>
                                           <span>No <input type="radio" name="rev_approve" id="" value="0" ></span>
                                            <hr>
                                            <div class="form-group">
                                                <label for="rev_campaign">Campaign</label>
                                                <select name="rev_campaign" id="rev_campaign" class="form-control"></select>
                                            </div>
                                            <div class="form-group">
                                                <label for="rev_nmsg1">Negative Info Message #1</label>
                                                <textarea name="rev_nmsg1" id="rev_nmsg1" class="form-control" required></textarea></div>
                                            <div class="form-group">
                                                <label for="rev_nmsg2">Negative Info Message #2</label>
                                                <textarea name="rev_nmsg2" id="rev_nmsg2" class="form-control" required></textarea></div>
                                            <div class="form-group">
                                                <label for="rev_pmsg">Positive Info Message </label>
                                                <textarea name="rev_pmsg" id="rev_pmsg" class="form-control" required></textarea></div>
                                            <div class="form-group">
                                                <label for="st_image">Logo</label>
                                                <br>
                                                <input type="file" name="rev_image" id="rev_image" class="form-control">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="rev_id" name="rev_id" />
                                        <button type="button" class="btn btn-secondary editbrand" data-bs-dismiss="modal" id="editBrand" >Close</button>
                                        <button type="submit" class="btn btn-primary" name="save" id="save"> Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-responsive table-hovered table-striped " id="productTable">
                            <thead>
                            <th>  ID </th>
                            <th>  Name </th>
                            <th> URL Slug </th>
                            <th> Campaign </th>
                            <th> Star Rating</th>
                            <th> Description</th>
                            <th> Negative Message #1</th>
                            <th> Negative Message #2</th>
                            <th> Positive Message</th>
                            <th> Approve</th>
                            <th> Image</th>
                            <th> Actions </th>
                            </thead>

                            <tbody>

                            <?php
                            foreach($reviews as $review) : ?>

                                <tr>
                                    <td id="b_id"> <?php echo $review['rev_id']; ?> </td>
                                    <td> <?php echo $review['rev_name']; ?> </td>
                                    <td> <?php echo $review['rev_slug']; ?> </td>
                                    <td> <?php echo $review['rev_campaign']; ?> </td>

                                    <td>

                                        <h6 class="text-center mt-2 mb-4">
                                        <?php
                                        if($review['rev_rating']==5)
                                            {
                                        echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_5" data-rating="5"></i>
                                        </h4>';
                                        }
                                        elseif($review['rev_rating']==4)
                                        {
                                            echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h6>';
                                        }
                                        elseif($review['rev_rating']==3)
                                        {
                                            echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 " id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h6>';
                                        }
                                        elseif($review['rev_rating']==2)
                                        {
                                            echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 " id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 " id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h6>';
                                        }
                                        elseif($review['rev_rating']==1)
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
                                    <td> <?php echo $review['rev_desc']; ?> </td>
                                    <td> <?php echo $review['rev_nmsg1']; ?> </td>
                                    <td> <?php echo $review['rev_nmsg2']; ?> </td>
                                    <td> <?php echo $review['rev_pmsg']; ?> </td>
                                    <td> <?php
                                        if($review['rev_approve']==1)
                                        {
                                            echo '<i class="btn-success">Approved</i>';
                                        }
                                        else
                                        {
                                            echo '<i class="btn-danger">Not Approved</i>';
                                        }
                                        ?>
                                    </td>
                                    <td><img src="uploads/<?php echo $review['rev_image']; ?>" alt="" class="figure-img img-thumbnail">  </td>
                                    <td>
                                        <button  id="<?php echo $review['rev_id'];?>" class="btn btn-info update"><i class="fa fa-edit"></i></button>
                                        <button  id="<?php echo $review['rev_id'];?>"  class="btn btn-danger delete"><i class="fa fa-trash"></i></button>
                                        <button  id="<?php echo $review['rev_slug'];?>"  class="btn btn-success slug" data-clipboard-target="#slug"> <i class="fa fa-code"></i></button>
                                        <input class="visually-hidden" id="slug" value="<?php echo $baseURL.$review['rev_slug'];?>">
                                    </td>
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
        new ClipboardJS('.slug');
        var id = <?php echo $_SESSION['user_key']; ?>;
        $.ajax({
            url:'get-campaign.php',
            type:'POST',
            data:{id:id},
            cache:false,
            success:function (data) {
                $('#rev_campaign').html(data);
            }
        });
var rating_data=0;
        var clipboard = new ClipboardJS('.slug');

        clipboard.on('success', function(e) {
           alert('Link Copied Please share it for Getting Reviews');
            e.clearSelection();
        });

        clipboard.on('error', function(e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });
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



        $(document).on('click','.delete',function () {
            var st_delete = $(this).attr('id');
            if(confirm('Are you Sure you want to delete?')) {
                $.ajax({
                    type: 'post',
                    url: 'delete.php',
                    data: {st_delete: st_delete},
                    success: function (data) {
                      alert(data);
                        setInterval('refresh()', 1000);
                    }
                });
            }
        });
        $(document).on('click','.update',function () {
            var st_id = $(this).attr('id');
            console.log(st_id);
            $.ajax({
                url:"../review_link/fetch-single.php",
                method:"POST",
                data:{st_id:st_id},
                cache:false,
                success:function (data) {
                    $('#staticBackdrop').modal('show');
                   data = jQuery.parseJSON(data);
                   $('#rev_name').val(data.rev_name);
                   $('#rev_slug').val(data.rev_slug);
                   $('#rev_desc').val(data.rev_desc);
                   $('#rev_nmsg1').val(data.rev_nmsg1);
                   $('#rev_nmsg2').val(data.rev_nmsg2);
                   $('#rev_pmsg').val(data.rev_pmsg);
                   $('#rev_id').val(data.rev_id);
                   $('.modal-title').text('Edit  Review Link');
                   $('.editbrand').text('Close');
                   $('.editbrand').removeClass('disabled');
                   $('.editbrand').attr('data-bs-dismiss','modal');
                   $('#save').text('Update');
                   $('#stInsertForm').attr('action','update-stk.php');
                    console.log(data);
                }
            })
        });
        //$(document).on('click','.slug',function () {
        //    var url = '<?php //echo $baseURL; ?>//';
        //    var slugs = $(this).attr('id');
        //   var slug = document.getElementById('slug').value=url+slugs;
        //    navigator.clipboard.writeText(slug).then(function() {
        //        alert('Link Copied');
        //    }, function(err) {
        //        console.error('Async: Could not copy text: ', err);
        //    });
        //
        //});
$('#add_btn').click(function () {
    $('.modal-title').text('Create Sticky Review');
    $('.editbrand').text('Close');
    $('.editbrand').addClass('btn-info');
    $('.editbrand').attr('data-bs-dismiss','modal');
    $('#save').text('Save');
    $('#save').removeClass('Disabled');
    $('#stInsertForm').attr('action','insert.php');
})
    });
    function refresh() {
        location.reload(true);
    }
    function reset_background() {
        for(var count =1;count<=5;count++)
        {
            $('#submit_star_'+count).addClass('star-light');
            $('#submit_star_'+count).removeClass('text-warning');
        }
    }
</script>
