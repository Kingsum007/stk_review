<?php
require_once ('../includes/header.php');
require_once ('../includes/db.php');
require_once '../Controllers/NegetiveFeed.php';
$db = new DBController();

$conn = $db->connect();

$dCtrl  =	new NegetiveFeed($conn);

$reviews = $dCtrl->index();
?>
<div class="container">
    <div class="row justify-content-center" style="margin-top: 20px;">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Sticky Review

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hovered table-striped" id="productTable">
                        <thead>
                        <th>  ID </th>
                        <th>  Email </th>
                        <th> Phone </th>
                        <th> Date </th>
                        </thead>

                        <tbody>

                        <?php
                        foreach($reviews as $review) : ?>

                            <tr>
                                <td id="b_id"> <?php echo $review['nf_id']; ?> </td>
                                <td> <?php echo $review['nf_email']; ?> </td>
                                <td> <?php echo $review['nf_phone']; ?> </td>
                                <td> <?php echo $review['created_at']; ?> </td>

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

    <?php require_once ('../includes/footer.php');?>
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable();
        });
        </script>