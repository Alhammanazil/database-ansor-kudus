<?php

include 'config.php';

// Fungsi untuk mengirim pesan via Fonnte
function sendUserCredentials($no_hp, $nama, $username, $plain_password)
{
    $api_key = 'z1UTH7UwXp2AHo8UNCtT'; // Ganti dengan API key Fonnte Anda
    $url = 'https://api.fonnte.com/send';

    // Pesan yang akan dikirim
    $message = "✅ Pendaftaran Berhasil\n\n"
             . "Halo $nama,\nAkun Anda telah berhasil dibuat. Berikut adalah kredensial login Anda:\n\n"
             . "Username: $username\nPassword: $plain_password\n\n"
             . "Harap simpan dan gunakan untuk login ke sistem. Segera ganti password setelah login pertama kali.";

    $data = [
        'target' => $no_hp, // Nomor tujuan dalam format internasional
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

// Ambil data dari form dan escape untuk mencegah SQL Injection
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
$nama_istri = mysqli_real_escape_string($conn, $_POST['nama_istri'] ?? null);
$anak_laki = mysqli_real_escape_string($conn, $_POST['anak_laki'] ?? null);
$anak_perempuan = mysqli_real_escape_string($conn, $_POST['anak_perempuan'] ?? null);
$npwp = mysqli_real_escape_string($conn, $_POST['npwp']);
$bpjs = mysqli_real_escape_string($conn, $_POST['bpjs']);
$kecamatan = mysqli_real_escape_string($conn, $_POST['kecamatan']);
$desa = mysqli_real_escape_string($conn, $_POST['desa']);
$rt = mysqli_real_escape_string($conn, $_POST['rt']);
$rw = mysqli_real_escape_string($conn, $_POST['rw']);
$no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']); // nomor HP sebagai username
$facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
$instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
$tiktok = mysqli_real_escape_string($conn, $_POST['tiktok']);
$youtube = mysqli_real_escape_string($conn, $_POST['youtube']);
$twitter = mysqli_real_escape_string($conn, $_POST['twitter']);

// SQL untuk menyimpan data ke tabel tb_anggota
$sql = "INSERT INTO tb_anggota (
    anggota_email, anggota_nama, anggota_nik, anggota_tempat_lahir,
    anggota_tanggal_lahir, anggota_golongan_darah, anggota_tinggi_badan,
    anggota_berat_badan, anggota_ayah, anggota_ibu, anggota_pernikahan,
    anggota_istri, anggota_anak_lk, anggota_anak_pr, anggota_npwp, anggota_bpjs,
    anggota_domisili_kec, anggota_domisili_des, anggota_rt, anggota_rw, anggota_hp,
    anggota_fb, anggota_ig, anggota_tiktok, anggota_yt, anggota_twitter
) VALUES (
    '$email', '$nama', '$nik', '$tempat_lahir', '$tanggal_lahir', '$golongan_darah',
    '$tinggi_badan', '$berat_badan', '$ayah', '$ibu', '$status_pernikahan',
    '$nama_istri', '$anak_laki', '$anak_perempuan', '$npwp', '$bpjs',
    '$kecamatan', '$desa', '$rt', '$rw', '$no_telp', '$facebook', '$instagram',
    '$tiktok', '$youtube', '$twitter'
)";

// Eksekusi query pertama untuk tb_anggota
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

    // Eksekusi query kedua untuk tb_users
    if ($conn->query($sql_user) === TRUE) {
        // Panggil fungsi untuk mengirim pesan via Fonnte
        sendUserCredentials($no_telp, $nama, $no_telp, $plain_password);

        // Redirect ke halaman sukses
        header("Location: ../test.php?form_success=true");
        exit();
    } else {
        echo "Error pada tb_users: " . $sql_user . "<br>" . $conn->error;
    }
} else {
    echo "Error pada tb_anggota: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
