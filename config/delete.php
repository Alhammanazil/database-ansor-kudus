<?php
session_start();
require_once 'config.php'; // Koneksi database

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($id > 0) {
        $query = "DELETE FROM tb_anggota WHERE anggota_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Menyimpan pesan sukses di session untuk alert
            $_SESSION['delete_success'] = "Data anggota berhasil dihapus";
        } else {
            $_SESSION['error_message'] = "Gagal menghapus data anggota.";
        }
    } else {
        $_SESSION['error_message'] = "ID tidak valid.";
    }
} else {
    $_SESSION['error_message'] = "Parameter ID tidak ditemukan.";
}

// Redirect kembali ke halaman data-ansor.php dengan query parameter
header("Location: ../master/data-ansor.php?delete_success=true");
exit();
