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

// Dapatkan districts_id dari parameter GET
$districts_id = isset($_GET['districts_id']) ? $_GET['districts_id'] : '';

if (empty($districts_id)) {
    echo json_encode([
        "status" => "error",
        "message" => "districts_id is required"
    ]);
    exit();
}

// Query untuk mengambil data desa berdasarkan districts_id
$sql = "SELECT villages_id, villages_name FROM tb_villages WHERE districts_id = '$districts_id' ORDER BY villages_name ASC";
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
