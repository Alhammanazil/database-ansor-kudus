<?php
require 'config.php';

function getData($tableName) {
    global $conn; // Mengakses koneksi database global
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($conn, $query);

    $data = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}
$kabupaten = getData('tb_regencies');

$pekerjaan = getData('tb_pekerjaan');

$pendidikan = getData('tb_pendidikan');

$pendapatan = getData('tb_pendapatan');

$gol_darah = getData('tb_golongan_darah');

$smk = getData('tb_jurusan_smk');

$studi = getData('tb_bidang_studi');

$tb = getData('tb_tinggi_badan');

$bb = getData('tb_berat_badan');

$pernikahan = getData('tb_pernikahan');

$kecamatan = getData('tb_districts');

$pr = getData('tb_jabatan_pr');

$pc = getData('tb_jabatan_pc');

$pac = getData('tb_jabatan_pac');

$masa_khidmat = getData('tb_masa_khidmat');

$rt = getData('tb_rt');

$rw = getData('tb_rw');

$partai = getData('tb_partai');