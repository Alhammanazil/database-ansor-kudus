<?php
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Untuk mengakses session user role

/**
 * Fungsi untuk mengunggah file dengan format nama tertentu.
 */
function uploadFileWithFormat($fileInput, $subfolder, $prefix, $anggota_id)
{
    if (!empty($_FILES[$fileInput]['name'])) {
        $targetDir = "../file/$subfolder/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileTmp = $_FILES[$fileInput]['tmp_name'];
        $fileExtension = pathinfo($_FILES[$fileInput]['name'], PATHINFO_EXTENSION);
        $randomNumber = rand(1000, 9999); // Generate random number
        $fileName = "$prefix-$anggota_id-$randomNumber.$fileExtension";
        $targetFile = $targetDir . $fileName;

        if (move_uploaded_file($fileTmp, $targetFile)) {
            return $fileName; // Return the filename if successful
        }
    }
    return null; // Return null if no file is uploaded
}

/**
 * Fungsi untuk mendapatkan nama file input berdasarkan tipe diklat.
 */
function getFileInputName($item)
{
    $romanToNum = ['I' => '1', 'II' => '2', 'III' => '3'];

    if (strpos($item, 'LI') === 0 || strpos($item, 'SUSPELAT') === 0) {
        $prefix = strtolower(explode(' ', $item)[0]);
        $number = $romanToNum[str_replace($prefix, '', $item)] ?? '';
        return $prefix . $number . 'Certificate';
    }

    return strtolower(str_replace([' ', '-'], '', $item)) . 'Certificate';
}

/**
 * Fungsi untuk menyimpan riwayat pelatihan ke database.
 */
function simpanRiwayatPelatihan($conn, $anggota_id, $diklatItem, $subfolder)
{
    $fileInput = getFileInputName($diklatItem);

    if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]['error'] !== UPLOAD_ERR_NO_FILE) {
        $fileName = uploadFileWithFormat($fileInput, $subfolder, strtolower(str_replace(' ', '-', $diklatItem)), $anggota_id);

        if ($fileName) {
            $sql = "INSERT INTO tb_riwayat_diklat (anggota_id, riwayat_diklat_item, riwayat_diklat_file, created_at)
                    VALUES ('$anggota_id', '$diklatItem', '$fileName', NOW())";

            if (!$conn->query($sql)) {
                error_log("Error saving $diklatItem: " . $conn->error);
            }
        }
    }
}

// Ambil ID anggota dan data dari form
$anggota_id = mysqli_real_escape_string($conn, $_POST['id']);
$fieldsToUpdate = [
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
    'anggota_npwp' => $_POST['npwp'],
    'anggota_bpjs' => $_POST['bpjs'],
    'anggota_domisili_kec' => $_POST['edit-kecamatan'],
    'anggota_domisili_des' => $_POST['edit-desa'],
    'anggota_rt' => $_POST['rt'],
    'anggota_rw' => $_POST['rw'],
    'anggota_hp' => $_POST['no_telp'],
    'anggota_fb' => $_POST['facebook'],
    'anggota_ig' => $_POST['instagram'],
    'anggota_tiktok' => $_POST['tiktok'],
    'anggota_yt' => $_POST['youtube'],
    'anggota_twitter' => $_POST['twitter']
];

// Siapkan query pembaruan anggota
$sql_update = "UPDATE tb_anggota SET ";
foreach ($fieldsToUpdate as $field => $value) {
    $escapedValue = mysqli_real_escape_string($conn, $value);
    $sql_update .= "$field = '$escapedValue', ";
}
$sql_update = rtrim($sql_update, ', ') . " WHERE anggota_id = '$anggota_id'";

// Eksekusi pembaruan data anggota
if ($conn->query($sql_update) === TRUE) {
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

    // Perbarui nama di tabel tb_users
    $anggota_nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $sql_update_user = "UPDATE tb_users SET nama_lengkap = '$anggota_nama' WHERE anggota_id = '$anggota_id'";

    if (!$conn->query($sql_update_user)) {
        echo "Error updating tb_users: " . $conn->error;
    }

    // Hapus riwayat pelatihan lama
    $conn->query("DELETE FROM tb_riwayat_diklat WHERE anggota_id = '$anggota_id'");

    // Simpan riwayat pelatihan baru
    $riwayatPelatihan = [
        'a.pendidikan_kader' => $_POST['pendidikanKader'] ?? [],
        'b.instruktur' => $_POST['latihanInstruktur'] ?? [],
        'c.dirosah' => $_POST['dirosah'] ?? [],
        'd.pendidikan_latihan' => $_POST['pendidikanLatihan'] ?? [],
        'e.kursus' => $_POST['kursus'] ?? [],
        'f.pendidikan_latihan_khusus' => $_POST['pendidikanKhusus'] ?? []
    ];

    foreach ($riwayatPelatihan as $subfolder => $items) {
        foreach ($items as $item) {
            simpanRiwayatPelatihan($conn, $anggota_id, $item, $subfolder);
        }
    }

    // Redirect berdasarkan user role
    $user_role = $_SESSION['user_role'] ?? 'user';
    switch ($user_role) {
        case 'master':
            header("Location: ../master/data-pribadi.php?anggota_id=$anggota_id");
            break;
        case 'admin_kecamatan':
            header("Location: ../admin_kecamatan/data-pribadi.php?anggota_id=$anggota_id");
            break;
        case 'admin_desa':
            header("Location: ../admin_desa/data-pribadi.php?anggota_id=$anggota_id");
            break;
        case 'user':
        default:
            header("Location: ../user/data-pribadi.php?anggota_id=$anggota_id");
            break;
    }
    exit();
} else {
    echo "Error: " . $sql_update . "<br>" . $conn->error;
}

$conn->close();
