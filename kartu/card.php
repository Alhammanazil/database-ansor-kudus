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

$anggota_nama = $data['anggota_nama'];
$formatted_id = str_pad($data['anggota_id'], 4, '0', STR_PAD_LEFT);
$no_registrasi = $formatted_id . '/' . $data['anggota_no_registrasi'] . '/KTR/2024';

// Generate QR code URL with QRServer API using the required format
$qr_data = urlencode($no_registrasi . '|' . $anggota_nama);
$qrcode_url = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=$qr_data";

// Load template
$template = imagecreatefrompng('template.png');

// Check if the photo file exists and is readable
$fotoFileName = $data['anggota_foto'];
$fotoFilePath = "../file/foto/" . $fotoFileName;
if ($fotoFileName && file_exists($fotoFilePath)) {
    $fileExtension = strtolower(pathinfo($fotoFilePath, PATHINFO_EXTENSION));
    $pass_foto = ($fileExtension === 'png') ? imagecreatefrompng($fotoFilePath) : imagecreatefromjpeg($fotoFilePath);
} else {
    die("Foto anggota tidak ditemukan atau tidak dapat dibaca.");
}

// Handle the download header if required
if (isset($_GET['download'])) {
    header('Content-Disposition: attachment; filename="KTR_' . $anggota_nama . '.png"');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
}

// Fetch the QR code image from the URL and load it
$qrcode_content = file_get_contents($qrcode_url);
$qrcode = imagecreatefromstring($qrcode_content);

if (!$template || !$pass_foto || !$qrcode) {
    die("Error: Gagal memuat gambar yang diperlukan.");
}

// Create the main canvas and other image processing logic
$canvas_width = imagesx($template);
$canvas_height = imagesy($template);
$image = imagecreatetruecolor($canvas_width, $canvas_height);
imagesavealpha($image, true);
$transparent_color = imagecolorallocatealpha($image, 0, 0, 0, 127);
imagefill($image, 0, 0, $transparent_color);

// Copy the template onto the main image
imagecopy($image, $template, 0, 0, 0, 0, $canvas_width, $canvas_height);

// Copy the member's photo with aspect ratio
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

// Add QR code to the canvas
$qrcode_x = 1875;
$qrcode_y = 1400;
$qrcode_width = 300;
$qrcode_height = 300;
imagecopyresampled($image, $qrcode, $qrcode_x, $qrcode_y, 0, 0, $qrcode_width, $qrcode_height, imagesx($qrcode), imagesy($qrcode));

// Set text color
$color = imagecolorallocate($image, 0, 0, 0); // Black

// Font and position text
$fontPathRegular = 'font/Poppins-SemiBold.ttf';
$fontSize = 45;

// Format text
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

$nama = ": " . format_name($data['anggota_nama']);
$no_registrasi_text = ": " . $no_registrasi;
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
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $no_registrasi_text);

$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "Kecamatan");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $kecamatan);

$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "Desa / Kelurahan");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $desa);

$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, "Keanggotaan");
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $keanggotaan);

// Output the image
imagepng($image);
imagedestroy($image);
imagedestroy($pass_foto);
imagedestroy($template);
imagedestroy($qrcode);
