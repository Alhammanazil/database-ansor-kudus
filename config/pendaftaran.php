<?php
include 'config.php';

// Ambil data dari form
$email = $_POST['email'];
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$golongan_darah = $_POST['golongan_darah'];
$tinggi_badan = $_POST['tinggi_badan'];
$berat_badan = $_POST['berat_badan'];
$ayah = $_POST['ayah'];
$ibu = $_POST['ibu'];
$status_pernikahan = $_POST['status_pernikahan'];

$kecamatan = $_POST['kecamatan'];
$desa = $_POST['desa'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];
$no_telp = $_POST['no_telp'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$tiktok = $_POST['tiktok'];
$youtube = $_POST['youtube'];
$twitter = $_POST['twitter'];

// SQL untuk menyimpan data
$sql = "INSERT INTO tb_anggota (anggota_email, anggota_nama, anggota_nik, anggota_tempat_lahir, anggota_tanggal_lahir, anggota_golongan_darah, anggota_tinggi_badan, anggota_berat_badan, anggota_ayah, anggota_ibu, anggota_pernikahan, anggota_domisili_kec, anggota_domisili_des, anggota_rt, anggota_rw, anggota_hp, anggota_fb, anggota_ig, anggota_tiktok, anggota_yt, anggota_twitter)
VALUES ('$email', '$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$golongan_darah', '$tinggi_badan', '$berat_badan', '$ayah', '$ibu', '$status_pernikahan', '$kecamatan', '$desa', '$rt', '$rw', '$no_telp', '$facebook', '$instagram', '$tiktok', '$youtube', '$twitter')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php?form_success=true");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
