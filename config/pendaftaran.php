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

$jenis_pekerjaan = $_POST['jenisPekerjaan'];
$sistem_kerja = isset($_POST['sistemKerja']) ? $_POST['sistemKerja'] : null;
$nama_instansi = isset($_POST['namaInstansi']) ? $_POST['namaInstansi'] : null;
$alamat_instansi = isset($_POST['alamatInstansi']) ? $_POST['alamatInstansi'] : null;
$jenis_pekerjaan_istri = isset($_POST['jenisPekerjaanIstri']) ? $_POST['jenisPekerjaanIstri'] : null;
$pendapatan_istri = $_POST['pendapatanIstri'] ?? null;
$pendapatan_suami = $_POST['pendapatanSuami'] ?? null;

$pendidikan_terakhir = $_POST['pendidikanTerakhir'];
$jurusanSmk = $_POST['jurusanSmk'];
$bidangStudi = $_POST['bidangStudi'];
$lembaga_pendidikan = $_POST['lembagaPendidikan'] ?? null;
$nama_pendidikan = $_POST['lembagaPendidikan'] ?? null;
$nama_pesantren = $_POST['namaPesantren'] ?? null;
$nama_madin = $_POST['madrasahDiniyah'] ?? null;
$ipnu = $_POST['ipnu'];
$pmii = $_POST['pmii'];
$dema_bem = $_POST['dema'];
$organisasi_lainnya = $_POST['organisasiLainnya'] ?? null;
$parpol = $_POST['afiliasiPartai'] ?? null;

$kecamatan_ranting = $_POST['namaKecamatanRanting'] ?? null;
$jabatan_ranting = $_POST['jabatanRanting'] ?? null;
$masa_ranting = $_POST['masaRanting'] ?? null;
$kecamatan_pac = $_POST['kecamatanPAC'] ?? null;
$jabatan_pac = $_POST['jabatanPAC'] ?? null;
$masa_pac = $_POST['masaPAC'] ?? null;
$jabatan_pc = $_POST['jabatanPC'] ?? null;
$masa_pc = $_POST['masaPC'] ?? null;

$pendidikan_kader = $_POST['pendidikanKader'] ?? null;
$instruktur = $_POST['instruktur'] ?? null;
$dirosah = $_POST['dirosah'] ?? null;
$pendidikan_latihan = $_POST['pendidikanLatihan'] ?? null;
$kursus = $_POST['kursus'] ?? null;

// SQL untuk menyimpan data ke tabel tb_anggota
$sql = "INSERT INTO tb_anggota (
    anggota_email, anggota_nama, anggota_nik, anggota_tempat_lahir, anggota_tanggal_lahir, 
    anggota_golongan_darah, anggota_tinggi_badan, anggota_berat_badan, anggota_ayah, anggota_ibu, 
    anggota_pernikahan, anggota_domisili_kec, anggota_domisili_des, anggota_rt, anggota_rw, 
    anggota_hp, anggota_fb, anggota_ig, anggota_tiktok, anggota_yt, anggota_twitter, anggota_pekerjaan, 
    anggota_sistem_kerja, anggota_nama_tempat_kerja, anggota_alamat_tempat_kerja, anggota_pekerjaan_istri, anggota_pendapatan, anggota_pendapatan_istri, 
    anggota_pendidikan, anggota_jurusan_smk, anggota_bidang_studi, anggota_nama_pendidikan, anggota_nama_pesantren, anggota_nama_madin, anggota_ipnu, 
    anggota_pmii, anggota_dema_bem, anggota_organisasi_lain, anggota_parpol, anggota_pr_kec, anggota_pr_jabatan, 
    anggota_pr_mk, anggota_pac_kec, anggota_pac_jabatan, anggota_pac_mk, anggota_pc_jabatan, anggota_pc_mk
) VALUES (
    '$email', '$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$golongan_darah', 
    '$tinggi_badan', '$berat_badan', '$ayah', '$ibu', '$status_pernikahan', '$kecamatan', 
    '$desa', '$rt', '$rw', '$no_telp', '$facebook', '$instagram', '$tiktok', '$youtube', 
    '$twitter', '$jenis_pekerjaan', '$sistem_kerja', '$nama_instansi', '$alamat_instansi', 1, 
    '$pendapatan_suami', '$pendapatan_istri', '$pendidikan_terakhir', '$jurusanSmk', '$bidangStudi' , '$nama_pendidikan', '$nama_pesantren', 
    '$nama_madin', '$ipnu', '$pmii', '$dema_bem', '$organisasi_lainnya', '$parpol', 
    '$kecamatan_ranting', '$jabatan_ranting', '$masa_ranting', '$kecamatan_pac', 
    '$jabatan_pac', '$masa_pac', '$jabatan_pc', '$masa_pc'
)";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php?form_success=true");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
