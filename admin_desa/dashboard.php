<?php
require '../config/config.php';
require '../config/cookies.php';

if (!check_login()) {
    header("Location: ../login.php");
    exit();
}

// Cek role
if (!in_array($_SESSION['user']['role'], ['master', 'admin desa'])) {
    header("Location: dashboard.php");
    exit();
}

if (empty($_SESSION['id'])) {
    echo "Error: Anda harus login untuk mengakses halaman ini.";
    exit();
}

$user_id = $_SESSION['id'];

// Query untuk mendapatkan data user beserta nama desa
$query = "
SELECT 
    a.*, 
    v.villages_name AS desa
FROM 
    tb_anggota a
LEFT JOIN 
    tb_villages v ON a.anggota_domisili_des = v.villages_id
WHERE 
    a.anggota_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    echo "Data tidak ditemukan.";
    exit();
}

// total pendaftar
$query_total_pendaftar = "SELECT COUNT(*) AS total_pendaftar FROM tb_anggota";
$total_pendaftar = $conn->query($query_total_pendaftar)->fetch_assoc()['total_pendaftar'];

// Nama desa
$desa_name = $data['desa'];

// Query untuk menghitung total pendaftar di desa yang sesuai
$query_total_pendaftar_desa = "
    SELECT COUNT(*) AS total_pendaftar
    FROM tb_anggota
    WHERE anggota_domisili_des = (
        SELECT villages_id FROM tb_villages WHERE villages_name = ?
    )
";

// Eksekusi query
$stmt_total_pendaftar_desa = $conn->prepare($query_total_pendaftar_desa);
$stmt_total_pendaftar_desa->bind_param("s", $desa_name);
$stmt_total_pendaftar_desa->execute();
$total_pendaftar_desa = $stmt_total_pendaftar_desa->get_result()->fetch_assoc()['total_pendaftar'];

require_once 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Admin Desa <?php echo $data['desa']; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Admin Desa</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Dashboard Card -->
            <div class="row">

                <!-- Total Pendaftar -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $total_pendaftar; ?></h3>
                            <p>Total Pendaftar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                        <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Total Pendaftar Kecamatan [Filter] -->
                <div class="col-lg-3 col-6">
                    <!-- kotak kecil -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3><?php echo $total_pendaftar_desa; ?></h3>
                            <p>Pendaftar Desa <?php echo $data['desa']; ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-home"></i>
                        </div>
                        <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Total Kecamatan -->
                <div class="col-lg-3 col-6">
                    <!-- kotak kecil -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>9</h3>
                            <p>Total Kecamatan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-map"></i>
                        </div>
                        <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Total Desa -->
                <div class="col-lg-3 col-6">
                    <!-- kotak kecil -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>123</h3>
                            <p>Total Desa</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-location"></i>
                        </div>
                        <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- Dashboard Card -->
        </div>
</div>

<?php
require_once 'footer.php';
?>