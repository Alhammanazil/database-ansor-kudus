<?php
include 'config.php';

function check_login()
{
  global $conn;

  // Mulai session jika belum dimulai
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  // Cek apakah user sudah login dengan session
  if (isset($_SESSION['user']) && isset($_SESSION['id'])) {
    return true;
  }

  // Cek apakah user sudah login dengan cookie
  if (isset($_COOKIE['user_login'])) {
    list($username, $password) = explode(':', base64_decode($_COOKIE['user_login']));
    $username = mysqli_real_escape_string($conn, $username);

    $stmt = $conn->prepare("SELECT * FROM tb_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verifikasi password dan set session jika cookie benar
    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['id'] = $user['id'];
      return true;
    }
  }

  return false;
}
