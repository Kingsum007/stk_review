<?php
require_once ('../includes/header.php');
	require_once '../includes/db.php';

	require_once '../Controllers/CampaignController.php';

	$db = new DBController();

	$conn = $db->connect();

	$dCtrl  =	new CampaignController($conn);

	$camps = $dCtrl->index();
?>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 20px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Campaigns
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Add
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add a Campaign</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="campInsertForm">
                                            <div class="form-group">
                                                <label for="b_name">Campaign Name</label>
                                                <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Campaign Name" autofocus autocomplete="Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="b_url">Campaign URL</label>
                                                <input type="text" class="form-control" id="c_url" name="c_url" placeholder="Campaign URL"  autocomplete="URL">
                                            </div>
                                            <div class="form-group">
                                                <label for="c_style">Select Style</label>
                                                <select name="style" id="c_style" class="form-control">
                                                    <option value="0">Select Style Please</option>
                                                    <option value="Rounded">Rounded</option>
                                                    <option value="Squared">Squared</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="c_delay">Delay</label>
                                                <input type="text" class="form-control" name="delay" id="c_delay">
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4"> <label for="brd">Branding :</label> <i class="fa fa-toggle-off fa-2x" id="toggle-on"></i>
                                                </div>
                                            </div>
                                            <div class="form-group" id="">
                                                <select name="branding" id="brandshow" class="form-control">
                                                    <option value="0"></option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="b_name">Registration Date</label>
                                                <input type="datetime-local" class="form-control" id="c_date" name="c_date">
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="id" name="bid" />
                                        <button type="button" class="btn btn-secondary editbrand updatecamp" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" name="saveBrand" id="saveBrand"> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hovered table-striped table-responsive-md" id="productTable">
                            <thead>
                            <th>  ID </th>
                            <th> Name </th>
                            <th> URL </th>
                            <th> Style </th>
                            <th> Delay </th>
                            <th> branding </th>
                            <th> Registration Date </th>
                            <th> Update Date </th>
                            <th> JS Code </th>
                            <th> Actions</th>
                            </thead>

                            <tbody>

                            <?php
                            foreach($camps as $camp) : ?>

                                <tr>
                                    <td id="b_id"> <?php echo $camp['id']; ?> </td>
                                    <td> <?php echo $camp['campaign_name']; ?> </td>
                                    <td> <?php echo $camp['domain_name']; ?> </td>
                                    <td> <?php echo $camp['selected_style']; ?> </td>
                                    <td> <?php echo $camp['delay']; ?> </td>
                                    <td> <?php echo $camp['branding']; ?> </td>
                                    <td> <?php echo $camp['date_reg']; ?> </td>
                                    <td> <?php echo $camp['date_update']; ?> </td>
                                    <td> <?php echo $camp['js_code']; ?> </td>
                                    <td> <button  id="<?php echo $camp['id'];?>" class="btn btn-info update"><i class="fa fa-edit"></i></button>
                                        <button  id="<?php echo $camp['id'];?>"  class="btn btn-danger delete"><i class="fa fa-trash"></i></button>
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

        $('#saveBrand').click(function () {
            var cname = $('#c_name').val();
            var curl = $('#c_url').val();
            var cdate = $('#c_date').val();
            var style = $('#c_style').val();
            var delay = $('#c_delay').val();
            var brand = $('#brandshow').val();

            var dataString = "cname1="+cname+ "&curl1="+curl+"&cdate1="+cdate+"&style1="+style+"&delay1="+delay+"&brand1="+brand;
            try{
                if(cname =='' || curl =='')
                {
                    alert('Please Fill the Fields');
                }
                else
                {
                    $.ajax({
                        type:'post',
                        url:'../campaign/insert.php',
                        data:dataString,
                        cache:false,
                        success:function (data) {
                            $('#campInsertForm')[0].reset();
                            $('#staticBackdrop').modal('hide');
                            alert(data);
                            setInterval('refresh()',500);
                        }
                    })
                }
            }
            catch (e) {
                alert(e.message);
            }
        });
$(document).on('click','.update',function () {
    var camp_id = $(this).attr('id');
    $.ajax({
        type:'post',
        url:'../campaign/fetch-single.php',
        data:{camp_id:camp_id},
        success:function (data) {
           $('#staticBackdrop').modal('show');
           data = jQuery.parseJSON(data);
           $('#c_name').val(data.campaign_name);
           $('#c_url').val(data.domain_name);
           $('#c_date').val(data.date_reg);
           $('#id').val(data.id);
           $('#c_style').val(data.style);
           $('#c_delay').val(data.delay);
           $('.modal-title').text('Edit Campaign');
           $('#saveBrand').addClass('disabled btn-warning');
           $('#saveBrand').attr('type','hidden');
           $('.editbrand').attr('data-bs-dismiss','');
           $('.editbrand').text('Update Data');
           $('.editbrand').attr('id','editcamp')
           $('#saveBrand').text('Disabled Button');

        }
    })
});
$('.updatecamp').click(function () {
    var id = $('#id').val();
    var cname = $('#c_name').val();
    var curl = $('#c_url').val();
    var cdate = $('#c_date').val();
    var style = $('#c_style').val();
    var delay = $('#c_delay').val();
    var brand = $('#brandshow').val();
    var dataString = "cname1="+cname+ "&curl1="+curl+"&cdate1="+cdate+"&style1="+style+"&delay1="+delay+"&brand1="+brand+"&id1="+id;
   $.ajax({
       type:"post",
       url:"update-campaign.php",
       data:dataString,
       cache:false,
       success:function (data) {
           alert(data);
         setInterval('refresh()',500);
       }

   })
});
$(document).on('click','.delete',function () {
    var campaign = $(this).attr('id');
    if(confirm('Are you Sure you want to delete?')) {
        $.ajax({
            type: 'post',
            url: 'delete.php',
            data: {campaign: campaign},
            success: function (data) {
                alert(data);
               setInterval('refresh()',500);;
            }
        });
    }
});
$('#toggle-on').click(function () {
    if($('#toggle-on').hasClass('fa-toggle-off')) {
        $('#toggle-on').attr('class', 'fa fa-toggle-on fa-2x');
        var id = <?php echo $_SESSION['user_key']; ?>;
        $.ajax({
            type: 'post',
            url: 'get-brands.php',
            data: {id: id},
            success: function (data) {
                $('#brandshow').html(data);
            }
        });
    }
    else
    {
        $('#toggle-on').attr('class','fa fa-toggle-off fa-2x');
        $('#brandshow').html('');
    }
});
    });
        
    function refresh() {
        location.reload(true);
    }
</script>
