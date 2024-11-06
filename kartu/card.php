<?php
require_once '../config/config.php'; // Pastikan path ini benar

header('Content-Type: image/png');

// Pastikan ID diterima
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID anggota tidak disertakan.");
}

$id = $_GET['id'];

// Query untuk mengambil nama anggota berdasarkan ID
$query = "SELECT anggota_nama FROM tb_anggota WHERE anggota_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data anggota tidak ditemukan.");
}

// Ambil nama anggota dan format menjadi slug (untuk menghindari karakter spesial dalam nama file)
$anggota_nama = preg_replace('/[^A-Za-z0-9_\-]/', '_', $data['anggota_nama']); // Ganti spasi dan karakter khusus dengan '_'

// Jika ada parameter 'download', tambahkan header untuk memaksa unduhan dengan nama file dinamis
if (isset($_GET['download'])) {
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="KTR_' . $anggota_nama . '.png"');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header('Pragma: no-cache');
} else {
    header('Content-Type: image/png');
}

// Query untuk mengambil data anggota berdasarkan ID
$query = "
SELECT a.*, d.districts_name AS kecamatan, v.villages_name AS desa
FROM tb_anggota a
LEFT JOIN tb_districts d ON a.anggota_domisili_kec = d.districts_id
LEFT JOIN tb_villages v ON a.anggota_domisili_des = v.villages_id
WHERE a.anggota_id = ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data anggota tidak ditemukan.");
}

// Format dan jalur font
$fontPathRegular = 'font/Poppins-SemiBold.ttf';
$fontSize = 45;
if (!file_exists($fontPathRegular)) {
    die("Error: File font Poppins-SemiBold.ttf tidak ditemukan.");
}

// Fungsi untuk memformat nama
function format_name($full_name)
{
    $name = preg_replace('/, [A-Za-z.]+$/', '', $full_name);
    $name_parts = explode(' ', $name);

    if (count($name_parts) > 3) {
        $formatted_name = $name_parts[0] . ' ' . $name_parts[1];
        for ($i = 2; $i < count($name_parts); $i++) {
            $formatted_name .= ' ' . substr($name_parts[$i], 0, 1) . '.';
        }
    } else {
        $formatted_name = $name;
    }

    return $formatted_name;
}

// Load template, foto anggota, dan QR code
$template = imagecreatefrompng('template.png');
$pass_foto = imagecreatefrompng('marsha.png');
$qrcode = imagecreatefrompng('qrcode.png'); // QR code statis

if (!$template || !$pass_foto || !$qrcode) {
    die("Error: Gagal memuat gambar yang diperlukan.");
}

// Tentukan ukuran kanvas utama berdasarkan ukuran template
$canvas_width = imagesx($template);
$canvas_height = imagesy($template);
$image = imagecreatetruecolor($canvas_width, $canvas_height);
imagesavealpha($image, true);
$transparent_color = imagecolorallocatealpha($image, 0, 0, 0, 127);
imagefill($image, 0, 0, $transparent_color);

// Tempelkan pass-foto
$foto_box_width = 730;
$foto_box_height = 975;
$foto_x = 250;
$foto_y = 418;
imagecopyresampled(
    $image,
    $pass_foto,
    $foto_x,
    $foto_y,
    0,
    0,
    $foto_box_width,
    $foto_box_height,
    imagesx($pass_foto),
    imagesy($pass_foto)
);

// Tempelkan template dengan transparansi di atas kanvas utama
imagecopy($image, $template, 0, 0, 0, 0, $canvas_width, $canvas_height);

// Tentukan warna teks
$color = imagecolorallocate($image, 0, 0, 0); // Hitam

// Membuat anggota_id menjadi 4 digit
$formatted_id = str_pad($data['anggota_id'], 4, '0', STR_PAD_LEFT);

// Tentukan data anggota
$nama = ": " . format_name($data['anggota_nama']);
$no_registrasi = ": " . ($formatted_id . '/' . $data['anggota_no_registrasi'] . '/KTR/2024');
$kecamatan = ": " . ($data['kecamatan'] ?? 'Undefined');
$desa = ": " . ($data['desa'] ?? 'Undefined');
$keanggotaan = ": Anggota"; // Data dummy
$line_spacing = 120; // Jarak antar baris teks

// Koordinat untuk posisi teks
$x_field = 1250;
$x_data = 1900;
$y_position = 600;

// Tampilkan Nama
$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "Nama");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $nama);

// Tampilkan No. Registrasi
$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "No. Registrasi");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $no_registrasi);

// Tampilkan Kecamatan
$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "Kecamatan");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $kecamatan);

// Tampilkan Desa / Kelurahan
$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "Desa / Kelurahan");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $desa);

// Tampilkan Keanggotaan
$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "Keanggotaan");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $keanggotaan);

// Tempelkan QR code di posisi yang ditentukan
$qrcode_x = 1875;
$qrcode_y = 1400;
$qrcode_width = 300;
$qrcode_height = 300;
imagecopyresampled($image, $qrcode, $qrcode_x, $qrcode_y, 0, 0, $qrcode_width, $qrcode_height, imagesx($qrcode), imagesy($qrcode));

// Menampilkan gambar
imagepng($image);
imagedestroy($image);
imagedestroy($pass_foto);
imagedestroy($template);
imagedestroy($qrcode);
