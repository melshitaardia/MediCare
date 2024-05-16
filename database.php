<?php
    // $hostname = 'localhost';
    // $username = 'root';
    // $password = '';
    // $database_name = 'projectAkhirPemweb';
    
    function connectDB(){
    $mysqli = new mysqli('localhost','root','','projectAkhirPemweb');

    if ($mysqli -> connect_error) {
        echo "The database connection failed" . $mysqli -> connect_error;
        exit();
    }
    else{
        return $mysqli;
    }
}
?>