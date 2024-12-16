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

// Fungsi untuk generate dan validasi token
if (!function_exists('generateToken')) {
  function generateToken($id)
  {
    $key = 'secret_key_anda'; // Kunci rahasia untuk enkripsi
    return base64_encode(openssl_encrypt($id, 'AES-128-ECB', $key));
  }
}

if (!function_exists('validateToken')) {
  function validateToken($token)
  {
    $key = 'secret_key_anda'; // Kunci rahasia yang sama untuk dekripsi
    return openssl_decrypt(base64_decode($token), 'AES-128-ECB', $key);
  }
}
