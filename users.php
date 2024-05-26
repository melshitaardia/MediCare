<?php
include 'database.php';

function fetchUsers() {
    $mysqli = connectDB();
    
    $query = "SELECT * FROM akun";
    $result = $mysqli->query($query);
    
    $userData = array();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $userData[] = $row;
        }
    }
    
    $mysqli->close();
    return $userData;
}

header('Content-Type: application/json');
echo json_encode(fetchUsers());
?>
