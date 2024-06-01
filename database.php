<?php
    function connectDB(){
    // $mysqli = new mysqli('localhost','root','','projectAkhirPemweb');
    $mysqli = new mysqli('localhost','mel','simel','projectAkhirPemweb');

    if ($mysqli -> connect_error) {
        echo "The database connection failed" . $mysqli -> connect_error;
        exit();
    }
    else {
        return $mysqli;
    }
}
?>