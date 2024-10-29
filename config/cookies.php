<?php
include 'config.php';

function check_login(): bool
{
  session_start();

  // Cek apakah user sudah login via sesi
  if (isset($_SESSION['user'])) {
    return true;
  }

  // Cek apakah user login via cookie
  if (isset($_COOKIE['user_login'])) {
    [$username, $password] = explode('::', base64_decode($_COOKIE['user_login']));

    global $conn;
    $stmt = $conn->prepare("SELECT * FROM tb_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    // Verifikasi password dan buat sesi jika benar
    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['user'] = [
        'id' => $user['id'],
        'nama_lengkap' => $user['nama_lengkap'],
        'role' => $user['role']
      ];
      return true;
    }
  }

  return false;
}
