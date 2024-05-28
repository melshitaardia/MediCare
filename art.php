<?php
include 'database.php';

function fetchArticles() {
    $mysqli = connectDB();
    
    $query = "SELECT * FROM articles";
    $result = $mysqli->query($query);
    
    $articlesData = array();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $articlesData[] = $row;
        }
    }
    
    $mysqli->close();
    return $articlesData;
}

header('Content-Type: application/json');
echo json_encode(fetchArticles());
?>
