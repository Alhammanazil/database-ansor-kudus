<?php
include 'config.php';

if (isset($_POST['no_telp'])) {
    $no_telp = $_POST['no_telp'];

    // Query untuk mengecek apakah nomor telepon sudah ada
    $query = "SELECT * FROM tb_anggota WHERE anggota_hp = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $no_telp);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kembalikan respons dalam format JSON
    if ($result->num_rows > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
}
