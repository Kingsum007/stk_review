<?php
require_once ('../includes/header.php');
	require_once '../includes/db.php';

	require_once '../Controllers/ReviewController.php';

	$db = new DBController();

	$conn = $db->connect();

	$dCtrl  =	new ReviewController($conn);

	$reviews = $dCtrl->index();
?>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 20px;">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Sticky Review
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal" id="add_btn" data-bs-target="#staticBackdrop">
                            Add
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Create Sticky Review</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="stInsertForm" enctype="multipart/form-data" method="post" action="insert.php">
                                            <div class="form-group">
                                                <label for="st_name">Sticky Review Name</label>
                                                <input type="text" class="form-control" id="st_name" name="st_name" placeholder="Enter Your  Name" autofocus autocomplete>
                                            </div>
                                            <div class="form-group">
                                                <label for="st_tags">Tags (Optional)</label>
                                                <input type="text" class="form-control" id="st_tags" name="st_tags" placeholder="Tags"  autocomplete>
                                            </div>
                                            <div class="form-group">
                                                <label for="st_desc">Description</label>
                                                <textarea  class="form-control" id="st_desc" name="st_desc" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <hr>
                                                <label for="st_stars" class="text-center">Star Rating</label>
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
                                            <div class="form-group">
                                                <label for="st_image">Image</label>
                                                <br>
                                                <input type="file" name="st_image" id="st_image" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="b_name">Sticky Review Date</label>
                                                <input type="datetime-local" class="form-control" id="st_date" name="st_date">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="st_id" name="st_id" />
                                        <button type="button" class="btn btn-secondary editbrand" data-bs-dismiss="modal" id="editBrand" >Close</button>
                                        <button type="submit" class="btn btn-primary" name="save" id="save"> Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hovered table-striped" id="productTable">
                            <thead>
                            <th>  ID </th>
                            <th>  Name </th>
                            <th> Tags </th>
                            <th> Description</th>
                            <th> Star Rating</th>
                            <th> Date</th>
                            <th> Image</th>
                            <th> Actions </th>
                            </thead>

                            <tbody>

                            <?php
                            foreach($reviews as $review) : ?>

                                <tr>
                                    <td id="b_id"> <?php echo $review['st_id']; ?> </td>
                                    <td> <?php echo $review['st_name']; ?> </td>
                                    <td> <?php echo $review['st_tags']; ?> </td>
                                    <td> <?php echo $review['st_desc']; ?> </td>
                                    <td>

                                        <h6 class="text-center mt-2 mb-4">
                                        <?php
                                        if($review['st_stars']==5)
                                            {
                                        echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_5" data-rating="5"></i>
                                        </h4>';
                                        }
                                        elseif($review['st_stars']==4)
                                        {
                                            echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h6>';
                                        }
                                        elseif($review['st_stars']==3)
                                        {
                                            echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 " id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h6>';
                                        }
                                        elseif($review['st_stars']==2)
                                        {
                                            echo'<i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_1" data-rating="1"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 text-warning" id="submit_star_2" data-rating="2"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 " id="submit_star_3" data-rating="3"></i>
                                            <i class="fa fa-star star-light submit_star mr-1 " id="submit_star_4" data-rating="4"></i>
                                            <i class="fa fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h6>';
                                        }
                                        elseif($review['st_stars']==1)
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
                                    <td> <?php echo $review['st_date']; ?> </td>
                                    <td><img src="uploads/<?php echo $review['st_image']; ?>" alt="" class="figure-img img-thumbnail">  </td>
                                    <td> <button  id="<?php echo $review['st_id'];?>" class="btn btn-info update"><i class="fa fa-edit"></i></button>
                                        <button  id="<?php echo $review['st_id'];?>"  class="btn btn-danger delete"><i class="fa fa-trash"></i></button>
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
var rating_data=0;
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
                        setInterval('refresh()', 100);
                    }
                });
            }
        });
        $(document).on('click','.update',function () {
            var st_id = $(this).attr('id');
            console.log(st_id);
            $.ajax({
                url:"../reviews/fetch-single.php",
                method:"POST",
                data:{st_id:st_id},
                cache:false,
                success:function (data) {
                    $('#staticBackdrop').modal('show');
                   data = jQuery.parseJSON(data);
                   $('#st_name').val(data.st_name);
                   $('#st_tags').val(data.st_tags);
                   $('#st_desc').val(data.st_desc);
                   $('#st_date').val(data.st_date);
                   $('#st_id').val(data.st_id);
                   $('.modal-title').text('Edit Sticky Review');
                   $('.editbrand').text('Close');
                   $('.editbrand').removeClass('disabled');
                   $('.editbrand').attr('data-bs-dismiss','modal');
                   $('#save').text('Update');
                   $('#stInsertForm').attr('action','update-stk.php');
                    console.log(data);
                }
            })
        });
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
