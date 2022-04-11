<?php

class CampaignController {

    // constructor
    function __construct($conn) {

        $this->conn = $conn;

    }


    // retrieving Campaign data
    public function index() {

        $data       =    array();

        $sql        =    "SELECT * FROM campaigns where user_key=".$_SESSION['user_key']."";

        $result     =    $this->conn->query($sql);

        if($result->num_rows > 0) {

            $data        =   mysqli_fetch_all($result, MYSQLI_ASSOC);

        }

        return $data;
    }
}

?>