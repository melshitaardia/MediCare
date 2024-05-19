<?php
include 'database.php';

function fetchDokterData() {
    $mysqli = connectDB();
    
    $query = "SELECT * FROM list_dokter";
    $result = $mysqli->query($query);
    
    $cardsData = array();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cardsData[] = $row;
        }
    }
    
    $mysqli->close();
    return $cardsData;
}

header('Content-Type: application/json');
echo json_encode(fetchDokterData());
?>
