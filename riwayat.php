<?php
include 'database.php';

session_start();
$username = $_SESSION['username'];
function fetchHistoryData() {
    $mysqli = connectDB();
    
    $username = $_SESSION['username'];
    
    $query = "SELECT p.tanggal, p.waktu, d.nama, d.spesialis, pb.total, pb.metode_bayar
              FROM pemesanan p
              INNER JOIN list_dokter d ON p.str = d.str
              INNER JOIN pembayaran pb ON p.id = pb.id_pemesanan
              WHERE p.pasien = '$username'";
              
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
echo json_encode(fetchHistoryData());
?>
