<?php
// Koneksi ke database 'foto'
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ansor_kudus";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// cookie
function check_login()
{
  global $conn;

  session_start();

  // Cek apakah user sudah login dengan session
  if (isset($_SESSION['user'])) {
    return true;
  }

  // Cek apakah user sudah login dengan cookie
  if (isset($_COOKIE['user_login'])) {
    list($username, $password) = explode(':', base64_decode($_COOKIE['user_login']));
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $stmt = $conn->prepare("SELECT * FROM tb_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      return true;
    }
  }

  return false;
}
