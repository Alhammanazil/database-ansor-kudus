<?php
require '../config/config.php';

if (!check_login()) {
    header("Location: ../login.php");
    exit();
}

// Cek role
if ($_SESSION['user']['role'] !== 'master' && $_SESSION['user']['role'] !== 'admin') {
    header("Location: dashboard.php"); // atau halaman lain yang sesuai
    exit();
}

// Data dummy untuk kecamatan di Kudus, dengan maksimal pendaftar 100
$kecamatans = [
    ['kecamatan' => 'Kudus Kota', 'total_pendaftar' => 20],
    ['kecamatan' => 'Jati', 'total_pendaftar' => 15],
    ['kecamatan' => 'Bae', 'total_pendaftar' => 12],
    ['kecamatan' => 'Undaan', 'total_pendaftar' => 10],
    ['kecamatan' => 'Mejobo', 'total_pendaftar' => 14],
    ['kecamatan' => 'Jekulo', 'total_pendaftar' => 10],
    ['kecamatan' => 'Dawe', 'total_pendaftar' => 8],
    ['kecamatan' => 'Gebog', 'total_pendaftar' => 6],
    ['kecamatan' => 'Kaliwungu', 'total_pendaftar' => 5]
];

// Data Kecamatan dan Desa di Kudus
$kecamatanDesaData = [
    'Kaliwungu' => [
        'Bakalan Krapyak',
        'Banget',
        'Blimbing Kidul',
        'Gamong',
        'Garung Kidul',
        'Garung Lor',
        'Kalirejo',
        'Karangampel',
        'Kedungdowo',
        'Mijen',
        'Papringan',
        'Prambatan Kidul',
        'Prambatan Lor',
        'Setrokalangan',
        'Sidorekso'
    ],
    'Kota' => [
        'Barongan',
        'Burikan',
        'Damaran',
        'Demaan',
        'Demangan',
        'Glantengan',
        'Janggalan',
        'Kajosari',
        'Kaliputu',
        'Kauman',
        'Kesambi',
        'Kerjasari',
        'Kramat',
        'Krandon',
        'Langgardalem',
        'Mlatinorowito',
        'Mlatinorowito',
        'Nganguk',
        'Panji',
        'Purwosari',
        'Rendeng',
        'Singocandi',
        'Sunggingan',
        'Wergu Kulon',
        'Wergu Wetan'
    ],
    'Jati' => [
        'Getas Pejaten',
        'Jati Kulon',
        'Jati Wetan',
        'Jepang Pakis',
        'Jetis Kapuan',
        'Loram Kulon',
        'Loram Wetan',
        'Megawon',
        'Ngembal Kulon',
        'Pasuruhan Kidul',
        'Pasuruhan Lor',
        'Piso',
        'Tanjungkarang',
        'Tumpangkrasak'
    ],
    'Undaan' => [
        'Berugenjang',
        'Glagahwaru',
        'Kalirejo',
        'Karangrowo',
        'Kutuk',
        'Lambangan',
        'Larikrejo',
        'Medini',
        'Ngemplak',
        'Sambung',
        'Terasan',
        'Undaan Kidul',
        'Undaan Lor',
        'Undaan Tengah',
        'Wates',
        'Wonosoco'
    ],
    'Mejobo' => [
        'Golantepus',
        'Gulang',
        'Hadipolo',
        'Japah',
        'Jojo',
        'Kesambi',
        'Krikil',
        'Mejobo',
        'Payaman',
        'Temulus',
        'Tenggeles'
    ],
    'Jekulo' => [
        'Bulung Kulon',
        'Bulungcangkring',
        'Gondoharum',
        'Hadipolo',
        'Honggosoco',
        'Jekulo',
        'Kaliwungu',
        'Pladen',
        'Sadang',
        'Sidomulyo',
        'Tanjungrejo',
        'Terban'
    ],
    'Bae' => [
        'Bacin',
        'Bae',
        'Besito',
        'Gondangmanis',
        'Gemulung',
        'Ngembalrejo',
        'Panjunan',
        'Pedawang',
        'Peganjaran',
        'Purworejo'
    ],
    'Gebog' => [
        'Besito',
        'Getassrabi',
        'Gondosari',
        'Gribig',
        'Jurang',
        'Karangmalang',
        'Kedungsari',
        'Klumpit',
        'Menawan',
        'Padurenan',
        'Rahtawu'
    ],
    'Dawe' => [
        'Cendono',
        'Colo',
        'Cranggang',
        'Dukuhwaringin',
        'Glagahkulon',
        'Japan',
        'Kajar',
        'Kandangmas',
        'Krusen',
        'Lau',
        'Margorejo',
        'Piji',
        'Puyoh',
        'Rejosari',
        'Samirejo',
        'Socokangsi',
        'Tergo',
        'Ternadi'
    ]
];

require_once 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
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
                <div class="col-lg-3 col-6">
                    <!-- kotak kecil -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>100</h3>
                            <p>Total Pendaftar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                        <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- kotak kecil -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>9</h3>
                            <p>Total Kecamatan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-pin"></i>
                            <!-- Alternatif:
            <i class="ion ion-map"></i>
            -->
                        </div>
                        <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- kotak kecil -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>123</h3>
                            <p>Total Desa</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-home"></i>
                            <!-- Alternatif:
            <i class="ion ion-location"></i>
            -->
                        </div>
                        <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- kotak kecil -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Total Pendaftar [Kecamatan/Desa]</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-home"></i>
                            <!-- Alternatif:
            <i class="ion ion-person"></i>
            -->
                        </div>
                        <a href="#" class="small-box-footer">Info Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Dashboard Card -->

            <!-- Tabel Data Kecamatan & Desa -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row my-3">
                        <div class="col-sm-6">
                            <h1>Data Kecamatan & Desa</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->

                <!-- TABEL PENDAFTAR KECAMATAN -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title"><b>9 Kecamatan</b></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#kecamatanCollapse" aria-expanded="false">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div id="kecamatanCollapse" class="collapse">
                        <div class="card-body p-0">
                            <div class="table-responsive table-bordered table-hover">
                                <table id="data-kecamatan" class="table m-3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kecamatan</th>
                                            <th>Total Pendaftar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1; // Inisialisasi nomor
                                        foreach ($kecamatans as $kecamatan): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo htmlspecialchars($kecamatan['kecamatan']); ?></td>
                                                <td><?php echo htmlspecialchars($kecamatan['total_pendaftar']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- TABEL PENDAFTAR DESA -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title"><b>123 Desa</b></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#desaCollapse" aria-expanded="false">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div id="desaCollapse" class="collapse">
                        <div class="card-body p-0">
                            <div class="table-responsive table-bordered table-hover">
                                <table id="data-desa" class="table m-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kecamatan</th>
                                            <th>Desa / Kelurahan</th>
                                            <th>Total Pendaftar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1; // Inisialisasi nomor
                                        foreach ($kecamatanDesaData as $kecamatan => $desas): ?>
                                            <?php $rowspan = count($desas); ?>
                                            <tr>
                                                <td rowspan="<?php echo $rowspan; ?>"><?php echo $no++; ?></td>
                                                <td rowspan="<?php echo $rowspan; ?>"><?php echo htmlspecialchars($kecamatan); ?></td>
                                                <td>1. <?php echo htmlspecialchars($desas[0]); ?></td>
                                            </tr>
                                            <?php for ($i = 1; $i < $rowspan; $i++): ?>
                                                <tr>
                                                    <td><?php echo ($i + 1) . ". " . htmlspecialchars($desas[$i]); ?></td>
                                                </tr>
                                            <?php endfor; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </section>
        </div>
</div>

<?php
require_once 'footer.php';
?>