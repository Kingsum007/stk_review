<?php

class Review_linkController
{
    // constructor
    function __construct($conn) {

        $this->conn = $conn;

    }

    // retrieving Branding data
    public function index() {

        $data       =    array();

        $sql        =    "SELECT * FROM review_link where user_key=".$_SESSION['user_key']."";

        $result     =    $this->conn->query($sql);

        if($result->num_rows > 0) {

            $data        =   mysqli_fetch_all($result, MYSQLI_ASSOC);

        }

        return $data;
    }
}
