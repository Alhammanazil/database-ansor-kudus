<?php
header('Content-Type: application/json');
require 'config.php';

// Periksa koneksi
if ($conn->connect_error) {
    echo json_encode([
        "status" => "error",
        "message" => "Connection failed: " . $conn->connect_error
    ]);
    exit();
}

// Dapatkan districts_id dari parameter GET
$districts_id = isset($_GET['districts_id']) ? trim($_GET['districts_id']) : '';

if (empty($districts_id)) {
    echo json_encode([
        "status" => "error",
        "message" => "districts_id is required"
    ]);
    exit();
}

// Gunakan prepared statement untuk query
$sql = "SELECT villages_id, villages_name FROM tb_villages WHERE districts_id = ? ORDER BY villages_name ASC";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode([
        "status" => "error",
        "message" => "Failed to prepare statement"
    ]);
    exit();
}

// Bind parameter dan eksekusi query
$stmt->bind_param("s", $districts_id);
$stmt->execute();
$result = $stmt->get_result();

// Cek hasil query
if ($result && $result->num_rows > 0) {
    // Ambil data dari hasil query
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode([
        "status" => "success",
        "data" => $data
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "No records found for the provided districts_id"
    ]);
}

// Tutup statement dan koneksi
$stmt->close();
$conn->close();
