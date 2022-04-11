<?php
class DBController {

    private $hostname  =   "localhost";

    private $username  =   "u583862346_root";

    private $password  =   "Root1234";

    private $db        =   "u583862346_review";

    //create connection
    public function connect() {

        $conn = new mysqli($this->hostname, $this->username, $this->password, $this->db)or die("Database connection error." . $conn->connect_error);

        return $conn;
    }

    // close connection
    public function close($conn) {

        $conn->close();

    }
}
$base_url ="http://review.nishatbrothers.com/Controllers/";
$femail = 'sum@nishatbrothers.com';
?>