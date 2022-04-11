<?php
class FeedbackController
{
    function __construct($conn) {

        $this->conn = $conn;

    }


    // retrieving Branding data
    public function index() {

        $data       =    array();

        $sql        =    "SELECT * FROM review_link where rev_slug='".$_GET['slug']."'";

        $result     =    $this->conn->query($sql);

        if($result->num_rows > 0) {

            $data        =   mysqli_fetch_all($result, MYSQLI_ASSOC);

        }

        return $data;
    }
}