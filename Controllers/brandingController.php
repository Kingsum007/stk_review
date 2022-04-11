<?php

class BrandingController {

    // constructor
    function __construct($conn) {

        $this->conn = $conn;

    }


    // retrieving Branding data
    public function index() {

        $data       =    array();

        $sql        =    "SELECT * FROM branding where b_user_key=".$_SESSION['user_key']."";

        $result     =    $this->conn->query($sql);

        if($result->num_rows > 0) {

            $data        =   mysqli_fetch_all($result, MYSQLI_ASSOC);

        }

        return $data;
    }
}

?>