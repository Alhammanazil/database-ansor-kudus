<?php
include 'config.php';

// Fungsi untuk mengirim pesan via Fonnte
function sendUserCredentials($no_hp, $nama, $username, $plain_password)
{
    $api_key = 'z1UTH7UwXp2AHo8UNCtT';
    $url = 'https://api.fonnte.com/send';

    // Pesan yang akan dikirim
    $message = "✅ Pendaftaran Berhasil\n\n"
        . "Halo $nama,\nAkun Anda telah berhasil dibuat. Berikut adalah kredensial login Anda:\n\n"
        . "Username: $username\nPassword: $plain_password\n\n"
        . "Login pada website https://dev.menarakudus.id/login.php";

    $data = [
        'target' => $no_hp,
        'message' => $message
    ];

    // Konfigurasi cURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        "Authorization: $api_key", // Header otorisasi dengan API key
    ]);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    $response = curl_exec($curl);
    curl_close($curl);

    // Decode respons dari API
    $result = json_decode($response, true);
    if ($result['status'] != "success") {
        echo "Gagal mengirim pesan sukses: " . $result['message'];
    }
}

// Ambil data dari form
$email = mysqli_real_escape_string($conn, $_POST['email']);
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$nik = mysqli_real_escape_string($conn, $_POST['nik']);
$tempat_lahir = mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
$tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);
$golongan_darah = mysqli_real_escape_string($conn, $_POST['golongan_darah']);
$tinggi_badan = mysqli_real_escape_string($conn, $_POST['tinggi_badan']);
$berat_badan = mysqli_real_escape_string($conn, $_POST['berat_badan']);
$ayah = mysqli_real_escape_string($conn, $_POST['ayah']);
$ibu = mysqli_real_escape_string($conn, $_POST['ibu']);
$status_pernikahan = mysqli_real_escape_string($conn, $_POST['status_pernikahan']);
$nama_istri = isset($_POST['nama_istri']) ? mysqli_real_escape_string($conn, $_POST['nama_istri']) : null;
$anak_laki = isset($_POST['anak_laki']) ? mysqli_real_escape_string($conn, $_POST['anak_laki']) : null;
$anak_perempuan = isset($_POST['anak_perempuan']) ? mysqli_real_escape_string($conn, $_POST['anak_perempuan']) : null;
$npwp = mysqli_real_escape_string($conn, $_POST['npwp']);
$bpjs = mysqli_real_escape_string($conn, $_POST['bpjs']);

$kecamatan = mysqli_real_escape_string($conn, $_POST['kecamatan']);
$desa = mysqli_real_escape_string($conn, $_POST['desa']);
$rt = mysqli_real_escape_string($conn, $_POST['rt']);
$rw = mysqli_real_escape_string($conn, $_POST['rw']);
$no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']);
$facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
$instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
$tiktok = mysqli_real_escape_string($conn, $_POST['tiktok']);
$youtube = mysqli_real_escape_string($conn, $_POST['youtube']);
$twitter = mysqli_real_escape_string($conn, $_POST['twitter']);

$jenis_pekerjaan = mysqli_real_escape_string($conn, $_POST['jenisPekerjaan']);
$sistem_kerja = isset($_POST['sistemKerja']) ? mysqli_real_escape_string($conn, $_POST['sistemKerja']) : null;
$nama_instansi = isset($_POST['namaInstansi']) ? mysqli_real_escape_string($conn, $_POST['namaInstansi']) : null;
$alamat_instansi = isset($_POST['alamatInstansi']) ? mysqli_real_escape_string($conn, $_POST['alamatInstansi']) : null;
$jenis_pekerjaan_istri = isset($_POST['jenisPekerjaanIstri']) ? mysqli_real_escape_string($conn, $_POST['jenisPekerjaanIstri']) : null;
$pendapatan_suami = isset($_POST['pendapatanSuami']) ? mysqli_real_escape_string($conn, $_POST['pendapatanSuami']) : 5;
$pendapatan_istri = isset($_POST['pendapatanIstri']) ? mysqli_real_escape_string($conn, $_POST['pendapatanIstri']) : 5;

$pendidikan_terakhir = mysqli_real_escape_string($conn, $_POST['pendidikanTerakhir']);
$jurusanSmk = isset($_POST['jurusanSmk']) ? mysqli_real_escape_string($conn, $_POST['jurusanSmk']) : null;
$bidangStudi = isset($_POST['bidangStudi']) ? mysqli_real_escape_string($conn, $_POST['bidangStudi']) : null;;
$nama_pendidikan = isset($_POST['lembagaPendidikan']) ? mysqli_real_escape_string($conn, $_POST['lembagaPendidikan']) : null;
$nama_pesantren = isset($_POST['namaPesantren']) ? mysqli_real_escape_string($conn, $_POST['namaPesantren']) : null;
$nama_madin = isset($_POST['madrasahDiniyah']) ? mysqli_real_escape_string($conn, $_POST['madrasahDiniyah']) : null;
$ipnu = mysqli_real_escape_string($conn, $_POST['ipnu']);
$pmii = mysqli_real_escape_string($conn, $_POST['pmii']);
$dema_bem = mysqli_real_escape_string($conn, $_POST['dema']);
$organisasi_lainnya = isset($_POST['organisasiLainnya']) ? mysqli_real_escape_string($conn, $_POST['organisasiLainnya']) : null;
$parpol = isset($_POST['afiliasiPartai']) ? mysqli_real_escape_string($conn, $_POST['afiliasiPartai']) : null;

$kecamatan_ranting = isset($_POST['namaKecamatanRanting']) ? mysqli_real_escape_string($conn, $_POST['namaKecamatanRanting']) : null;
$desa_ranting = isset($_POST['namaDesaRanting']) ? mysqli_real_escape_string($conn, $_POST['namaDesaRanting']) : null;
$jabatan_ranting = isset($_POST['jabatanRanting']) ? mysqli_real_escape_string($conn, $_POST['jabatanRanting']) : null;
$masa_ranting = isset($_POST['masaRanting']) ? mysqli_real_escape_string($conn, $_POST['masaRanting']) : null;
$kecamatan_pac = isset($_POST['kecamatanPAC']) ? mysqli_real_escape_string($conn, $_POST['kecamatanPAC']) : null;
$jabatan_pac = isset($_POST['jabatanPAC']) ? mysqli_real_escape_string($conn, $_POST['jabatanPAC']) : null;
$masa_pac = isset($_POST['masaPAC']) ? mysqli_real_escape_string($conn, $_POST['masaPAC']) : null;
$jabatan_pc = isset($_POST['jabatanPC']) ? mysqli_real_escape_string($conn, $_POST['jabatanPC']) : null;
$masa_pc = isset($_POST['masaPC']) ? mysqli_real_escape_string($conn, $_POST['masaPC']) : null;

$pendidikan_kader = isset($_POST['pendidikanKader']) ? mysqli_real_escape_string($conn, $_POST['pendidikanKader']) : null;
$instruktur = isset($_POST['instruktur']) ? mysqli_real_escape_string($conn, $_POST['instruktur']) : null;
$dirosah = isset($_POST['dirosah']) ? mysqli_real_escape_string($conn, $_POST['dirosah']) : null;
$pendidikan_latihan = isset($_POST['pendidikanLatihan']) ? mysqli_real_escape_string($conn, $_POST['pendidikanLatihan']) : null;
$kursus = isset($_POST['kursus']) ? mysqli_real_escape_string($conn, $_POST['kursus']) : null;

// SQL untuk menyimpan data ke tabel tb_anggota
$sql = "INSERT INTO tb_anggota (
    anggota_email, anggota_nama, anggota_nik, anggota_tempat_lahir, anggota_tanggal_lahir, anggota_golongan_darah, anggota_tinggi_badan, anggota_berat_badan, anggota_ayah, anggota_ibu, anggota_pernikahan, anggota_istri, anggota_anak_lk, anggota_anak_pr, anggota_npwp, anggota_bpjs, 

    anggota_domisili_kec, anggota_domisili_des, anggota_rt, anggota_rw, anggota_hp, anggota_fb, anggota_ig, anggota_tiktok, anggota_yt, anggota_twitter, 

    anggota_pekerjaan, anggota_sistem_kerja, anggota_nama_tempat_kerja, anggota_alamat_tempat_kerja, anggota_pekerjaan_istri, anggota_pendapatan, anggota_pendapatan_istri, 

    anggota_pendidikan, anggota_jurusan_smk, anggota_bidang_studi, anggota_nama_pendidikan, anggota_nama_pesantren, anggota_nama_madin, anggota_ipnu, anggota_pmii, anggota_dema_bem, anggota_organisasi_lain, anggota_parpol,

    anggota_pr_kec, anggota_pr_des, anggota_pr_jabatan, anggota_pr_mk, anggota_pac_kec, anggota_pac_jabatan, anggota_pac_mk, anggota_pc_jabatan, anggota_pc_mk
) 

VALUES (
    '$email', '$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$golongan_darah', '$tinggi_badan', '$berat_badan', '$ayah', '$ibu', '$status_pernikahan', '$nama_istri', '$anak_laki', '$anak_perempuan', '$npwp', '$bpjs',

    '$kecamatan', '$desa', '$rt', '$rw', '$no_telp', '$facebook', '$instagram', '$tiktok', '$youtube', '$twitter', 

    '$jenis_pekerjaan',
    " . ($sistem_kerja ? "'$sistem_kerja'" : "NULL") . ",
    " . ($nama_instansi ? "'$nama_instansi'" : "NULL") . ",
    " . ($alamat_instansi ? "'$alamat_instansi'" : "NULL") . ",
    " . ($jenis_pekerjaan_istri ? "'$jenis_pekerjaan_istri'" : "NULL") . ",
    " . ($pendapatan_suami ? "'$pendapatan_suami'" : "NULL") . ",
    " . ($pendapatan_istri ? "'$pendapatan_istri'" : "NULL") . ",

    '$pendidikan_terakhir', 
    " . ($jurusanSmk ? "'$jurusanSmk'" : "NULL") . ", 
    " . ($bidangStudi ? "'$bidangStudi'" : "NULL") . ", 
    " . ($nama_pendidikan ? "'$nama_pendidikan'" : "NULL") . ", 
    " . ($nama_pesantren ? "'$nama_pesantren'" : "NULL") . ", 
    " . ($nama_madin ? "'$nama_madin'" : "NULL") . ", 
    '$ipnu', '$pmii', '$dema_bem', 
    " . ($organisasi_lainnya ? "'$organisasi_lainnya'" : "NULL") . ", 
    '$parpol',

    " . ($kecamatan_ranting ? "'$kecamatan_ranting'" : "NULL") . ", 
    " . ($desa_ranting ? "'$desa_ranting'" : "NULL") . ", 
    " . ($jabatan_ranting ? "'$jabatan_ranting'" : "NULL") . ", 
    " . ($masa_ranting ? "'$masa_ranting'" : "NULL") . ", 
    " . ($kecamatan_pac ? "'$kecamatan_pac'" : "NULL") . ", 
    " . ($jabatan_pac ? "'$jabatan_pac'" : "NULL") . ", 
    " . ($masa_pac ? "'$masa_pac'" : "NULL") . ", 
    " . ($jabatan_pc ? "'$jabatan_pc'" : "NULL") . ", 
    " . ($masa_pc ? "'$masa_pc'" : "NULL") . "
)";

// Eksekusi 1 - tb_anggota
if ($conn->query($sql) === TRUE) {
    // Ambil ID tb_anggota yang baru saja dimasukkan
    $anggota_id = $conn->insert_id;

    // Generate password acak 6 digit
    $plain_password = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

    // Hash password sebelum disimpan di database
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

    // Masukkan data ke tb_users dengan nomor HP sebagai username dan password yang di-hash
    $sql_user = "INSERT INTO tb_users (id, nama_lengkap, username, password, akses, role, created_at, updated_at) VALUES (
        '$anggota_id', '$nama', '$no_telp', '$hashed_password', 1, 'user', NOW(), NOW()
    )";

    // Eksekusi 2 - tb_users
    if ($conn->query($sql_user) === TRUE) {
        // Panggil fungsi untuk mengirim pesan via Fonnte
        sendUserCredentials($no_telp, $nama, $no_telp, $plain_password);

        // Redirect ke halaman sukses
        header("Location: ../index.php?form_success=true");
        exit();
    } else {
        echo "Error pada tb_users: " . $sql_user . "<br>" . $conn->error;
    }
} else {
    echo "Error pada tb_anggota: " . $sql . "<br>" . $conn->error;
}

$conn->close();
