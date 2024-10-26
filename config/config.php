<?php
// Koneksi ke database 'foto'
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ansor";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
