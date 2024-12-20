<?php
header('Content-Type: application/json');
require 'config.php';

// Periksa koneksi
if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Connection failed: " . $conn->connect_error
    ]));
    exit();
}

// Query untuk mengambil semua data kecamatan
$sql = "SELECT districts_id, districts_name FROM tb_districts ORDER BY districts_name ASC";
$result = mysqli_query($conn, $sql);

// Cek hasil query
if ($result->num_rows > 0) {
    // Ambil data dari hasil query
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode([
        "status" => "success",
        "data" => $data
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "No records found"
    ]);
}

// Tutup koneksi
$conn->close();
