<?php

// Menampilkan Gambar
header('Content-Type: image/png');

// Format dan jalur font
$fontPathRegular = 'font/Poppins-SemiBold.ttf';
$fontSize = 55;

// Fungsi untuk memformat nama
function format_name($full_name)
{
    // Hilangkan gelar di akhir nama
    $name = preg_replace('/, [A-Za-z.]+$/', '', $full_name);

    // Pisahkan nama menjadi array
    $name_parts = explode(' ', $name);

    // Jika nama terlalu panjang, singkat setelah dua kata pertama
    if (count($name_parts) > 3) { // Batas kata sesuai kebutuhan
        $formatted_name = $name_parts[0] . ' ' . $name_parts[1];
        // Tambahkan inisial untuk sisa kata
        for ($i = 2; $i < count($name_parts); $i++) {
            $formatted_name .= ' ' . substr($name_parts[$i], 0, 1) . '.';
        }
    } else {
        $formatted_name = $name; // Jika pendek, biarkan seperti semula
    }

    return $formatted_name;
}

// Load pass-foto, template dengan transparansi, dan QR code
$pass_foto = imagecreatefrompng('marsha.png');
$template = imagecreatefrompng('template.png');
$qrcode = imagecreatefrompng('qrcode.png');

// Tentukan ukuran kanvas utama (menggunakan ukuran template sebagai dasar)
$canvas_width = imagesx($template);
$canvas_height = imagesy($template);
$image = imagecreatetruecolor($canvas_width, $canvas_height);

// Aktifkan transparansi untuk kanvas utama
imagesavealpha($image, true);
$transparent_color = imagecolorallocatealpha($image, 0, 0, 0, 127);
imagefill($image, 0, 0, $transparent_color);

// Tentukan ukuran dan posisi kotak foto di dalam template
$foto_box_width = 730; // Lebar kotak foto
$foto_box_height = 975; // Tinggi kotak foto
$foto_x = 250; // Posisi X untuk foto
$foto_y = 418; // Posisi Y untuk foto

// Mendapatkan rasio asli dari pass-foto
$pass_foto_width = imagesx($pass_foto);
$pass_foto_height = imagesy($pass_foto);
$foto_aspect_ratio = $pass_foto_width / $pass_foto_height;
$box_aspect_ratio = $foto_box_width / $foto_box_height;

// Menyesuaikan ukuran foto agar memenuhi kotak foto dengan pemotongan
if ($foto_aspect_ratio > $box_aspect_ratio) {
    // Jika foto lebih lebar, isi kotak secara vertikal dan potong bagian samping
    $new_foto_height = $foto_box_height;
    $new_foto_width = $foto_box_height * $foto_aspect_ratio;
    $src_x = ($pass_foto_width - ($pass_foto_height * $box_aspect_ratio)) / 2;
    $src_y = 0;
    $src_width = $pass_foto_height * $box_aspect_ratio;
    $src_height = $pass_foto_height;
} else {
    // Jika foto lebih tinggi, isi kotak secara horizontal dan potong bagian atas/bawah
    $new_foto_width = $foto_box_width;
    $new_foto_height = $foto_box_width / $foto_aspect_ratio;
    $src_x = 0;
    $src_y = ($pass_foto_height - ($pass_foto_width / $box_aspect_ratio)) / 2;
    $src_width = $pass_foto_width;
    $src_height = $pass_foto_width / $box_aspect_ratio;
}

// Tempelkan pass-foto ke kanvas utama pada posisi yang sesuai
imagecopyresampled(
    $image,
    $pass_foto,
    $foto_x,
    $foto_y,
    $src_x,
    $src_y,
    $foto_box_width,
    $foto_box_height,
    $src_width,
    $src_height
);

// Tempelkan template dengan transparansi di atas foto
imagecopy($image, $template, 0, 0, 0, 0, $canvas_width, $canvas_height);

// Koordinat X untuk Field dan Data
$x_field = 1250; // Posisi X untuk label field
$x_data = 1900; // Posisi X untuk nilai data dinamis
$color = imagecolorallocate($image, 0, 0, 0); // Warna hitam untuk teks

// Field Labels dengan titik dua
$fnama = 'Nama';
$fno_registrasi = 'No. Registrasi';
$fkecamatan = 'Kecamatan';
$fdesa_kelurahan = 'Desa / Kel.';
$fkeanggotaan = 'Keanggotaan';

// Data Dummy
$nama = ': ' . format_name("Marsha Lenathea Lapian");
$no_registrasi = ': 0186/X-11-06-07/KTR/2024';
$kecamatan = ': Undefined';
$desa_kelurahan = ': Undefined';
$keanggotaan = ': Undefined';

// Jarak antar baris
$line_spacing = 120;

// Menambahkan field labels dan data dinamis ke template dengan koordinat yang disesuaikan
$y_position = 740; // Posisi Y awal

// Nama
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, $fnama);
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $nama);

// No. Registrasi
$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, $fno_registrasi);
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $no_registrasi);

// Kecamatan
$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, $fkecamatan);
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $kecamatan);

// Desa / Kel.
$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, $fdesa_kelurahan);
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $desa_kelurahan);

// Keanggotaan
$y_position += $line_spacing;
imagettftext($image, $fontSize, 0, $x_field, $y_position, $color, $fontPathRegular, $fkeanggotaan);
imagettftext($image, $fontSize, 0, $x_data, $y_position, $color, $fontPathRegular, $keanggotaan);

// Tentukan ukuran dan posisi QR code di dalam template
$qrcode_width = 300;
$qrcode_height = 300;
$qrcode_x = 1875;
$qrcode_y = 1400;

// Salin dan tempelkan QR code ke template
imagecopyresampled($image, $qrcode, $qrcode_x, $qrcode_y, 0, 0, $qrcode_width, $qrcode_height, imagesx($qrcode), imagesy($qrcode));

// Menampilkan gambar
imagepng($image);
imagedestroy($image);
imagedestroy($pass_foto);
imagedestroy($template);
imagedestroy($qrcode);
