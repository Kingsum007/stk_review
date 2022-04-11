<?php

class ReviewController {

    // constructor
    function __construct($conn) {

        $this->conn = $conn;

    }


    // retrieving Review data
    public function index() {

        $data       =    array();

        $sql        =    "SELECT * FROM sticky_review where st_user=".$_SESSION['user_key']."";

        $result     =    $this->conn->query($sql);

        if($result->num_rows > 0) {

            $data        =   mysqli_fetch_all($result, MYSQLI_ASSOC);

        }

        return $data;
    }
}

?>