<?php
class NegetiveFeed
{
    function __construct($conn) {

        $this->conn = $conn;

    }


    // retrieving Negative Feed Back data
    public function index() {

        $data       =    array();

        $sql        =    "SELECT * FROM negative_fb  order by nf_id desc";

        $result     =    $this->conn->query($sql);

        if($result->num_rows > 0) {

            $data        =   mysqli_fetch_all($result, MYSQLI_ASSOC);

        }

        return $data;
    }
}