<?php
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fungsi untuk mengirim pesan via Fonnte
function sendUserCredentials($no_hp, $nama, $username, $plain_password)
{
    $api_key = 'z1UTH7UwXp2AHo8UNCtT';
    $url = 'https://api.fonnte.com/send';

    // Pesan yang akan dikirim
    $message = "✅ Pendaftaran Berhasil\n\n"
        . "Halo $nama,\nAkun Anda telah berhasil dibuat. Berikut adalah kredensial login Anda:\n\n"
        . "Username: $username\nPassword: $plain_password\n\n"
        . "Login pada website https://admin.ansorkudus.or.id/login.php";

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

// Fungsi untuk mengunggah file dengan pengkondisian format nama
function uploadFileWithFormat($fileInput, $subfolder, $prefix, $anggota_id)
{
    // Cek apakah file input tersedia
    if (!empty($_FILES[$fileInput]['name'])) {
        // Debugging
        error_log("File input tersedia untuk $fileInput");

        // Define the target directory and ensure it exists
        $targetDir = "../file/$subfolder/";
        if (!is_dir($targetDir)) {
            if (mkdir($targetDir, 0777, true)) {
                error_log("Direktori $targetDir berhasil dibuat.");
            } else {
                error_log("Gagal membuat direktori $targetDir");
            }
        }

        // Generate file name with prefix and random number
        $fileTmp = $_FILES[$fileInput]['tmp_name'];
        $fileExtension = pathinfo($_FILES[$fileInput]['name'], PATHINFO_EXTENSION);
        $randomNumber = rand(1000, 9999); // 4 random digits
        $fileName = "$prefix-$anggota_id-$randomNumber.$fileExtension";
        $targetFile = $targetDir . $fileName;

        // Attempt to move the uploaded file
        if (move_uploaded_file($fileTmp, $targetFile)) {
            error_log("File berhasil diunggah ke $targetFile");
            // Return the relative file path if successful
            return $fileName;
        } else {
            error_log("Gagal memindahkan file yang diunggah untuk $fileInput ke $targetFile");
        }
    } else {
        error_log("Tidak ada file yang diunggah untuk $fileInput");
    }
    return null;
}


function getFileInputName($item)
{
    // Konversi untuk Latihan Instruktur (LI)
    if (strpos($item, 'LI') === 0) {
        $number = trim(str_replace('LI', '', $item));
        // Konversi Roman numerals ke angka
        $romanToNum = [
            'I' => '1',
            'II' => '2',
            'III' => '3'
        ];
        $number = $romanToNum[$number] ?? $number;
        return 'li' . $number . 'Certificate';
    }

    // Konversi untuk Kursus Kepelatihan (SUSPELAT)
    if (strpos($item, 'SUSPELAT') === 0) {
        $number = trim(str_replace('SUSPELAT', '', $item));
        // Konversi Roman numerals ke angka
        $romanToNum = [
            'I' => '1',
            'II' => '2',
            'III' => '3'
        ];
        $number = $romanToNum[$number] ?? $number;
        return 'suspelat' . $number . 'Certificate';
    }


    // Default
    $itemSlug = strtolower(str_replace([' ', '-'], '', $item));
    return $itemSlug . 'Certificate';
}


function simpanRiwayatPelatihan($conn, $anggota_id, $diklatItem, $subfolder)
{
    // Dapatkan nama file input yang sesuai
    $fileInput = getFileInputName($diklatItem);

    // Debug
    error_log("Processing $diklatItem with file input $fileInput");

    // Cek apakah file diupload
    if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['error'] !== UPLOAD_ERR_NO_FILE) {
        // Upload file
        $fileName = uploadFileWithFormat($fileInput, $subfolder, strtolower(str_replace(' ', '-', $diklatItem)), $anggota_id);

        if ($fileName) {
            // Simpan ke database
            $sql_pelatihan = "INSERT INTO tb_riwayat_diklat (
                anggota_id, 
                riwayat_diklat_item, 
                riwayat_diklat_file, 
                created_at
            ) VALUES (
                '$anggota_id', 
                '$diklatItem', 
                '$fileName', 
                NOW()
            )";

            if ($conn->query($sql_pelatihan) !== TRUE) {
                error_log("Database Error for $diklatItem: " . $conn->error);
                return false;
            }
            return true;
        }
    }
    return false;
}

// Ambil data desa
$desa_id = mysqli_real_escape_string($conn, $_POST['desa']);

// Ambil villages_code berdasarkan villages_id (desa_id) yang dipilih
$query = "SELECT villages_code FROM tb_villages WHERE villages_id = '$desa_id'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $anggota_no_registrasi = $row['villages_code'];
} else {
    // Beri nilai default jika tidak ditemukan
    $anggota_no_registrasi = 'Unknown';
}

// Set nilai default untuk anggota_keanggotaan
$anggota_keanggotaan = 'anggota';

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
$pendapatan_suami = isset($_POST['pendapatanSuami']) ? mysqli_real_escape_string($conn, $_POST['pendapatanSuami']) : null;
$pendapatan_istri = isset($_POST['pendapatanIstri']) ? mysqli_real_escape_string($conn, $_POST['pendapatanIstri']) : null;

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

$pendidikan_kader = isset($_POST['pendidikanKader']) ? $_POST['pendidikanKader'] : [];
$instruktur = isset($_POST['instruktur']) ? $_POST['instruktur'] : [];
$dirosah = isset($_POST['dirosah']) ? $_POST['dirosah'] : [];
$pendidikan_latihan = isset($_POST['pendidikanLatihan']) ? $_POST['pendidikanLatihan'] : [];
$kursus = isset($_POST['kursus']) ? $_POST['kursus'] : [];

// SQL untuk menyimpan data ke tabel tb_anggota
$sql = "INSERT INTO tb_anggota (
    anggota_email, anggota_nama, anggota_nik, anggota_tempat_lahir, anggota_tanggal_lahir, anggota_golongan_darah, anggota_tinggi_badan, anggota_berat_badan, anggota_ayah, anggota_ibu, anggota_pernikahan, anggota_istri, anggota_anak_lk, anggota_anak_pr, anggota_npwp, anggota_bpjs, 

    anggota_domisili_kec, anggota_domisili_des, anggota_rt, anggota_rw, anggota_hp, anggota_fb, anggota_ig, anggota_tiktok, anggota_yt, anggota_twitter, 

    anggota_pekerjaan, anggota_sistem_kerja, anggota_nama_tempat_kerja, anggota_alamat_tempat_kerja, anggota_pekerjaan_istri, anggota_pendapatan, anggota_pendapatan_istri, 

    anggota_pendidikan, anggota_jurusan_smk, anggota_bidang_studi, anggota_nama_pendidikan, anggota_nama_pesantren, anggota_nama_madin, anggota_ipnu, anggota_pmii, anggota_dema_bem, anggota_organisasi_lain, anggota_parpol,

    anggota_pr_kec, anggota_pr_des, anggota_pr_jabatan, anggota_pr_mk, anggota_pac_kec, anggota_pac_jabatan, anggota_pac_mk, anggota_pc_jabatan, anggota_pc_mk,

    anggota_no_registrasi, anggota_keanggotaan
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
    " . ($masa_pc ? "'$masa_pc'" : "NULL") . ",

    '$anggota_no_registrasi', '$anggota_keanggotaan'
)";

// Eksekusi penyimpanan data ke tb_anggota
if ($conn->query($sql) === TRUE) {
    // Ambil ID anggota yang baru saja dimasukkan
    $anggota_id = $conn->insert_id;

    // Unggah file foto diri, NPWP, dan BPJS dengan format nama khusus
    $fotoKTPPath = uploadFileWithFormat('fotoKTP', 'ktp', 'ktp', $anggota_id);
    $fotoDiriPath = uploadFileWithFormat('fotoDiri', 'foto', 'fotodiri', $anggota_id);
    $npwpPath = uploadFileWithFormat('npwpFile', 'npwp', 'npwp', $anggota_id);
    $bpjsPath = uploadFileWithFormat('bpjsFile', 'bpjs', 'bpjs', $anggota_id);

    // Update tb_anggota dengan path file yang diunggah
    $sql_update = "UPDATE tb_anggota SET
        anggota_foto_ktp = " . ($fotoKTPPath ? "'$fotoKTPPath'" : "NULL") . ",
        anggota_foto = " . ($fotoDiriPath ? "'$fotoDiriPath'" : "NULL") . ",
        anggota_foto_npwp = " . ($npwpPath ? "'$npwpPath'" : "NULL") . ",
        anggota_foto_bpjs = " . ($bpjsPath ? "'$bpjsPath'" : "NULL") . "
        WHERE anggota_id = $anggota_id";

    // Simpan Riwayat Pelatihan
    // A. Pendidikan Kader
    if (isset($_POST['pendidikanKader'])) {
        foreach ($_POST['pendidikanKader'] as $diklatItem) {
            simpanRiwayatPelatihan($conn, $anggota_id, $diklatItem, 'a.pendidikan_kader');
        }
    }

    // B. Latihan Instruktur
    if (isset($_POST['instruktur'])) {
        foreach ($_POST['instruktur'] as $diklatItem) {
            simpanRiwayatPelatihan($conn, $anggota_id, $diklatItem, 'b.instruktur');
        }
    }

    // C. Dirosah
    if (isset($_POST['dirosah'])) {
        foreach ($_POST['dirosah'] as $diklatItem) {
            simpanRiwayatPelatihan($conn, $anggota_id, $diklatItem, 'c.dirosah');
        }
    }

    // D. Pendidikan & Latihan
    if (isset($_POST['pendidikanLatihan'])) {
        foreach ($_POST['pendidikanLatihan'] as $diklatItem) {
            simpanRiwayatPelatihan($conn, $anggota_id, $diklatItem, 'd.pendidikan_latihan');
        }
    }

    // E. Kursus Kepelatihan
    if (isset($_POST['kursus'])) {
        foreach ($_POST['kursus'] as $diklatItem) {
            simpanRiwayatPelatihan($conn, $anggota_id, $diklatItem, 'e.kursus');
        }
    }

    // F. Pendidikan & Latihan Khusus
    if (isset($_POST['latihanKhusus'])) {
        foreach ($_POST['latihanKhusus'] as $diklatItem) {
            simpanRiwayatPelatihan($conn, $anggota_id, $diklatItem, 'f.pendidikan_latihan_khusus');
        }
    }

    if (isset($_POST['latihanKhusus'])) {
        error_log("Data latihanKhusus diterima: " . print_r($_POST['latihanKhusus'], true));
    } else {
        error_log("Data latihanKhusus tidak diterima.");
    }



    // Update tb_anggota jika berhasil, dan simpan password pengguna
    if ($conn->query($sql_update) === TRUE) {
        // Generate password acak 6 digit
        $plain_password = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

        // Masukkan data ke tb_users dengan nomor HP sebagai username dan password yang di-hash
        $sql_user = "INSERT INTO tb_users (anggota_id, nama_lengkap, username, password, akses, role, created_at, updated_at) VALUES (
            '$anggota_id', '$nama', '$no_telp', '$hashed_password', 1, 'user', NOW(), NOW()
        )";

        if ($conn->query($sql_user) === TRUE) {
            // Kirim kredensial pengguna via Fonnte
            sendUserCredentials($no_telp, $nama, $no_telp, $plain_password);
            header("Location: ../index.php?form_success=true");
            exit();
        } else {
            echo "Error pada tb_users: " . $sql_user . "<br>" . $conn->error;
        }
    } else {
        echo "Error pada update tb_anggota: " . $sql_update . "<br>" . $conn->error;
    }
} else {
    echo "Error pada tb_anggota: " . $sql . "<br>" . $conn->error;
}

$conn->close();
