<?php
include '../config/config.php';

// Ambil data anggota dari database
$query = "SELECT * FROM tb_anggota WHERE anggota_id = ?";
$anggota_id = $_GET['anggota_id'];
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $anggota_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
  echo "Data anggota tidak ditemukan.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kartu Anggota</title>
  <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
</head>

<body>
  <img
    src="card.php?id=<?php echo htmlspecialchars($_GET['id']); ?>"
    alt="Kartu Anggota" />

  <div id="qrcode"></div>

  <script>
    // Data untuk QR code
    var anggotaNoRegistrasi = "<?php echo $data['anggota_no_registrasi']; ?>";
    var anggotaNama = "<?php echo addslashes($data['anggota_nama']); ?>";
    var qrContent = anggotaNoRegistrasi + " | " + anggotaNama;

    // Buat QR code menggunakan qrcode.js
    new QRCode(document.getElementById("qrcode"), {
      text: qrContent,
      width: 128,
      height: 128,
      colorDark: "#000000",
      colorLight: "#ffffff",
      correctLevel: QRCode.CorrectLevel.H,
    });
  </script>
</body>

</html>