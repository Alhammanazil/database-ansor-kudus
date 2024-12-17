<?php
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Untuk mengakses session user role

// Fungsi untuk mengunggah file dengan pengkondisian format nama
function uploadFileWithFormat($fileInput, $subfolder, $prefix, $anggota_id)
{
    if (!empty($_FILES[$fileInput]['name'])) {
        error_log("DEBUG: Mengunggah file: " . $_FILES[$fileInput]['name']);
        $targetDir = "../file/$subfolder/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileTmp = $_FILES[$fileInput]['tmp_name'];
        $fileExtension = pathinfo($_FILES[$fileInput]['name'], PATHINFO_EXTENSION);
        $randomNumber = rand(1000, 9999);
        $fileName = "$prefix-$anggota_id-$randomNumber.$fileExtension";
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($fileTmp, $targetFile)) {
            error_log("DEBUG: File berhasil dipindahkan ke $targetFile");
            return $fileName;
        } else {
            error_log("ERROR: Gagal memindahkan file: $fileInput");
        }
    }
    return null;
}

// Fungsi untuk mendapatkan nama file input yang sesuai
function getFileInputName($item)
{
    $inputName = strtolower(str_replace([' ', '.', '-'], '', $item)) . 'Certificate';
    error_log("DEBUG: Input file name generated: $inputName"); // Tambahkan log ini
    return $inputName;
}

// Fungsi untuk menyimpan atau memperbarui riwayat pelatihan
function simpanRiwayatPelatihan($conn, $anggota_id, $diklatItem, $subfolder)
{
    $fileInput = getFileInputName($diklatItem);
    $fileName = null;

    // Jika ada file baru yang diunggah
    if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['error'] !== UPLOAD_ERR_NO_FILE) {
        $fileName = uploadFileWithFormat($fileInput, $subfolder, strtolower(str_replace(' ', '-', $diklatItem)), $anggota_id);
    } else {
        // Ambil file lama dari form jika tidak ada file baru
        $fileName = $_POST[$fileInput . '_old'] ?? null;
    }

    // Cek apakah data riwayat pelatihan sudah ada
    $checkQuery = "SELECT riwayat_diklat_file FROM tb_riwayat_diklat WHERE anggota_id = ? AND riwayat_diklat_item = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("is", $anggota_id, $diklatItem);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika data sudah ada, lakukan update file jika ada file baru
        if ($fileName) {
            $updateQuery = "UPDATE tb_riwayat_diklat 
                            SET riwayat_diklat_file = ?, updated_at = NOW()
                            WHERE anggota_id = ? AND riwayat_diklat_item = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("sis", $fileName, $anggota_id, $diklatItem);
            $stmt->execute();
        }
    } else {
        // Jika data belum ada, lakukan insert data baru
        if ($fileName) {
            $insertQuery = "INSERT INTO tb_riwayat_diklat (anggota_id, riwayat_diklat_item, riwayat_diklat_file, created_at) 
                            VALUES (?, ?, ?, NOW())";
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("iss", $anggota_id, $diklatItem, $fileName);
            $stmt->execute();
        }
    }

    // Debugging log untuk memeriksa status
    error_log("DEBUG: File input yang dicari: $fileInput");
    if ($fileName) {
        error_log("DEBUG: File berhasil diproses untuk item: $diklatItem, nama file: $fileName");
    } else {
        error_log("DEBUG: Tidak ada file baru atau lama untuk item: $diklatItem.");
    }
}

// Ambil ID anggota dan data dari form
$anggota_id = mysqli_real_escape_string($conn, $_POST['id']);
$fieldsToUpdate = [
    // Step 1: Data Anggota
    'anggota_email' => $_POST['email'],
    'anggota_nama' => $_POST['nama'],
    'anggota_nik' => $_POST['nik'],
    'anggota_tempat_lahir' => $_POST['tempat_lahir'],
    'anggota_tanggal_lahir' => $_POST['tanggal_lahir'],
    'anggota_golongan_darah' => $_POST['golongan_darah'],
    'anggota_tinggi_badan' => $_POST['tinggi_badan'],
    'anggota_berat_badan' => $_POST['berat_badan'],
    'anggota_ayah' => $_POST['ayah'],
    'anggota_ibu' => $_POST['ibu'],
    'anggota_pernikahan' => $_POST['status_pernikahan'],
    'anggota_istri' => $_POST['nama_istri'] ?? null,
    'anggota_anak_lk' => $_POST['anak_laki'] ?? null,
    'anggota_anak_pr' => $_POST['anak_perempuan'] ?? null,
    'anggota_npwp' => $_POST['npwp'],
    'anggota_bpjs' => $_POST['bpjs'],

    // Step 2: Alamat dan Media Sosial
    'anggota_domisili_kec' => $_POST['kecamatan'],
    'anggota_domisili_des' => $_POST['desa'],
    'anggota_rt' => $_POST['rt'],
    'anggota_rw' => $_POST['rw'],
    'anggota_hp' => $_POST['no_telp'],
    'anggota_fb' => $_POST['facebook'],
    'anggota_ig' => $_POST['instagram'],
    'anggota_tiktok' => $_POST['tiktok'],
    'anggota_yt' => $_POST['youtube'],
    'anggota_twitter' => $_POST['twitter'],

    // Step 3: Pekerjaan
    'anggota_pekerjaan' => $_POST['jenisPekerjaan'] ?? null,
    'anggota_sistem_kerja' => $_POST['sistemKerja'] ?? null,
    'anggota_nama_tempat_kerja' => $_POST['namaInstansi'] ?? null,
    'anggota_alamat_tempat_kerja' => $_POST['alamatInstansi'] ?? null,
    'anggota_pendapatan' => $_POST['pendapatanSuami'] ?? null,
    'anggota_pekerjaan_istri' => $_POST['jenisPekerjaanIstri'] ?? null,
    'anggota_pendapatan_istri' => $_POST['pendapatanIstri'] ?? null,

    // Step 4: Riwayat Pendidikan & Organisasi
    'anggota_pendidikan' => $_POST['pendidikanTerakhir'],
    'anggota_jurusan_smk' => $_POST['jurusanTerakhir'] ?? null,
    'anggota_bidang_studi' => $_POST['bidangStudi'] ?? null,
    'anggota_nama_pendidikan' => $_POST['lembagaPendidikan'],
    'anggota_nama_pesantren' => $_POST['namaPesantren'] ?? null,
    'anggota_nama_madin' => $_POST['madrasahDiniyah'] ?? null,
    'anggota_ipnu' => $_POST['ipnu'],
    'anggota_pmii' => $_POST['pmii'],
    'anggota_dema_bem' => $_POST['dema'],
    'anggota_organisasi_lain' => $_POST['organisasiLainnya'] ?? null,
    'anggota_parpol' => $_POST['afiliasiPartai'],

    // Step 5: Riwayat Kepengurusan Ansor
    'anggota_pr_kec' => $_POST['namaKecamatanRanting'] ?? null,
    'anggota_pr_des' => $_POST['namaDesaRanting'] ?? null,
    'anggota_pr_jabatan' => $_POST['jabatanRanting'] ?? null,
    'anggota_pr_mk' => $_POST['masaRanting'] ?? null,
    'anggota_pac_kec' => $_POST['kecamatanPAC'] ?? null,
    'anggota_pac_jabatan' => $_POST['jabatanPAC'] ?? null,
    'anggota_pac_mk' => $_POST['masaPAC'] ?? null,
    'anggota_pc_jabatan' => $_POST['jabatanPC'] ?? null,
    'anggota_pc_mk' => $_POST['masaPC'] ?? null,
];

// Cek villages_code berdasarkan anggota_domisili_des
$anggota_domisili_des = isset($_POST['edit-desa']) ? $_POST['edit-desa'] : null;
if ($anggota_domisili_des) {
    $villagesQuery = "SELECT villages_code FROM tb_villages WHERE villages_id = ?";
    $stmt = $conn->prepare($villagesQuery);
    $stmt->bind_param("s", $anggota_domisili_des);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $anggota_no_registrasi = $row['villages_code'];
    } else {
        // Nilai default jika tidak ditemukan
        $anggota_no_registrasi = 'Unknown';
    }

    // Tambahkan ke dalam daftar field untuk diperbarui
    $fieldsToUpdate['anggota_no_registrasi'] = $anggota_no_registrasi;
}

// Siapkan query pembaruan anggota
$sql_update = "UPDATE tb_anggota SET ";
foreach ($fieldsToUpdate as $field => $value) {
    $escapedValue = $value !== null ? "'" . mysqli_real_escape_string($conn, $value) . "'" : "NULL";
    $sql_update .= "$field = $escapedValue, ";
}
$sql_update = rtrim($sql_update, ', ') . " WHERE anggota_id = '$anggota_id'";

// Eksekusi pembaruan data anggota
if ($conn->query($sql_update) === TRUE) {
    // Sinkronisasi nama_lengkap di tb_users
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama']); // Ambil nama yang di-update
    $sync_users_query = "UPDATE tb_users SET nama_lengkap = '$nama_lengkap' WHERE anggota_id = '$anggota_id'";
    if (!$conn->query($sync_users_query)) {
        echo "Error sinkronisasi nama_lengkap di tb_users: " . $conn->error;
    }

    // Perbarui file jika ada
    $fileUpdates = [
        'anggota_foto_ktp' => uploadFileWithFormat('fotoKTP', 'ktp', 'ktp', $anggota_id),
        'anggota_foto' => uploadFileWithFormat('fotoDiri', 'foto', 'fotodiri', $anggota_id),
        'anggota_foto_npwp' => uploadFileWithFormat('npwpFile', 'npwp', 'npwp', $anggota_id),
        'anggota_foto_bpjs' => uploadFileWithFormat('bpjsFile', 'bpjs', 'bpjs', $anggota_id)
    ];

    $fileSqlUpdates = [];
    foreach ($fileUpdates as $field => $filePath) {
        if ($filePath) {
            $fileSqlUpdates[] = "$field = '$filePath'";
        }
    }

    if (!empty($fileSqlUpdates)) {
        $sql_file_update = "UPDATE tb_anggota SET " . implode(", ", $fileSqlUpdates) . " WHERE anggota_id = '$anggota_id'";
        $conn->query($sql_file_update);
    }

    // Simpan riwayat pelatihan baru tanpa menghapus data lama
    $riwayatPelatihan = $_POST['diklat'] ?? [];


    foreach ($riwayatPelatihan as $subfolder => $items) {
        foreach ($items as $item) {
            simpanRiwayatPelatihan($conn, $anggota_id, $item, $subfolder);
        }
    }

    // Ambil role user dari session
    if (isset($_SESSION['user']['role'])) {
        $user_role = $_SESSION['user']['role'];
    } else {
        $user_role = 'user';
    }

    // Redirect ke halaman data pribadi sesuai role
    if ($user_role === 'master') {
        header("Location: ../master/data-pribadi.php?anggota_id=$anggota_id");
    } elseif ($user_role === 'admin kecamatan') {
        header("Location: ../admin_kecamatan/data-pribadi.php?anggota_id=$anggota_id");
    } elseif ($user_role === 'admin desa') {
        header("Location: ../admin_desa/data-pribadi.php?anggota_id=$anggota_id");
    } else {
        header("Location: ../user/data-pribadi.php?anggota_id=$anggota_id");
    }
    exit();
} else {
    echo "Error: " . $sql_update . "<br>" . $conn->error;
}

$conn->close();
