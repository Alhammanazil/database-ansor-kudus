<?php
require_once '../config/config.php';
header('Content-Type: image/png');

// Check if ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID anggota tidak disertakan.");
}

$id = $_GET['id'];

// Fetch member data from the database
$query = "SELECT * FROM tb_anggota WHERE anggota_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data anggota tidak ditemukan.");
}

// Format member name for file slug
$anggota_nama = preg_replace('/[^A-Za-z0-9_\-]/', '_', $data['anggota_nama']); // Replace spaces and special characters with '_'

// Get the file name for the photo
$fotoFileName = $data['anggota_foto'];
$fotoFilePath = "../file/foto/" . $fotoFileName;

// Check if the photo file exists and is readable
if ($fotoFileName && file_exists($fotoFilePath)) {
    $fileExtension = strtolower(pathinfo($fotoFilePath, PATHINFO_EXTENSION));
    if ($fileExtension === 'png') {
        $pass_foto = imagecreatefrompng($fotoFilePath);
    } elseif (in_array($fileExtension, ['jpg', 'jpeg'])) {
        $pass_foto = imagecreatefromjpeg($fotoFilePath);
    } else {
        die("Format file foto tidak didukung.");
    }
} else {
    die("Foto anggota tidak ditemukan atau tidak dapat dibaca.");
}

// Handle the download header if required
if (isset($_GET['download'])) {
    header('Content-Disposition: attachment; filename="KTR_' . $anggota_nama . '.png"');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header('Pragma: no-cache');
}

// Load template and QR code
$template = imagecreatefrompng('template.png');
$qrcode = imagecreatefrompng('qrcode.png'); // Static QR code

if (!$template || !$pass_foto || !$qrcode) {
    die("Error: Gagal memuat gambar yang diperlukan.");
}

// Create the main canvas
$canvas_width = imagesx($template);
$canvas_height = imagesy($template);
$image = imagecreatetruecolor($canvas_width, $canvas_height);
imagesavealpha($image, true);
$transparent_color = imagecolorallocatealpha($image, 0, 0, 0, 127);
imagefill($image, 0, 0, $transparent_color);

// Maintain aspect ratio for the photo
$original_width = imagesx($pass_foto);
$original_height = imagesy($pass_foto);
$scale = min(730 / $original_width, 975 / $original_height);
$new_width = (int)($original_width * $scale);
$new_height = (int)($original_height * $scale);
$foto_x_centered = 250 + (730 - $new_width) / 2;
$foto_y_centered = 418 + (975 - $new_height) / 2;

imagecopyresampled(
    $image,
    $pass_foto,
    $foto_x_centered,
    $foto_y_centered,
    0,
    0,
    $new_width,
    $new_height,
    $original_width,
    $original_height
);

// Overlay the template
imagecopy($image, $template, 0, 0, 0, 0, $canvas_width, $canvas_height);

// Set text color
$color = imagecolorallocate($image, 0, 0, 0); // Black

// Format and position text
$fontPathRegular = 'font/Poppins-SemiBold.ttf';
$fontSize = 45;
if (!file_exists($fontPathRegular)) {
    die("Error: File font Poppins-SemiBold.ttf tidak ditemukan.");
}

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

$formatted_id = str_pad($data['anggota_id'], 4, '0', STR_PAD_LEFT);
$nama = ": " . format_name($data['anggota_nama']);
$no_registrasi = ": " . ($formatted_id . '/' . $data['anggota_no_registrasi'] . '/KTR/2024');
$kecamatan = ": " . ($data['anggota_domisili_kec'] ?? 'Undefined');
$desa = ": " . ($data['anggota_domisili_des'] ?? 'Undefined');
$keanggotaan = ": Anggota";

$line_spacing = 120;
$x_field = 1250;
$x_data = 1900;
$y_position = 600;

$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "Nama");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $nama);

$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "No. Registrasi");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $no_registrasi);

$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "Kecamatan");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $kecamatan);

$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "Desa / Kelurahan");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $desa);

$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "Keanggotaan");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $keanggotaan);

// Add QR code
$qrcode_x = 1875;
$qrcode_y = 1400;
$qrcode_width = 300;
$qrcode_height = 300;
imagecopyresampled($image, $qrcode, $qrcode_x, $qrcode_y, 0, 0, $qrcode_width, $qrcode_height, imagesx($qrcode), imagesy($qrcode));

// Output the image
imagepng($image);
imagedestroy($image);
imagedestroy($pass_foto);
imagedestroy($template);
imagedestroy($qrcode);
