<?php
class PositiveFeed
{
    function __construct($conn) {

        $this->conn = $conn;

    }


    // retrieving Positive data
    public function index() {

        $data       =    array();

        $sql        =    "SELECT * FROM feedback ORDER BY fb_id desc";

        $result     =    $this->conn->query($sql);

        if($result->num_rows > 0) {

            $data        =   mysqli_fetch_all($result, MYSQLI_ASSOC);

        }

        return $data;
    }
}