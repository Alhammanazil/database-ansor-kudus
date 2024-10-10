<?php
require '../config/config.php';

if (!check_login()) {
    header("Location: ../login.php");
    exit();
}

// Cek role pengguna
if ($_SESSION['user']['role'] !== 'master' && $_SESSION['user']['role'] !== 'admin desa') {
    header("Location: dashboard.php");
    exit();
}

require_once 'header.php';
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Pribadi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active">Data Pribadi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cards -->
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <!-- Kartu Data Diri -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Diri</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataDiri" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataDiri" class="collapse">
                        <div class="card-body">
                            <img src="../assets/photo.jpg" width="150px" class="rounded" alt="profile">
                            <p>Nama: Muhammad Ihsan</p>
                            <p>Tanggal Lahir: 09 Oktober 2000</p>
                            <p>Email: muhammad_ihsan@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <!-- Kartu Data Alamat -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Alamat</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataAlamat" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataAlamat" class="collapse">
                        <div class="card-body">
                            <p>Alamat: Jl. Mawar No. 10, Jakarta</p>
                            <p>Kode Pos: 59349</p>
                            <p>Kota: Jakarta</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-12">
                <!-- Kartu Data Pekerjaan -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Pekerjaan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataPekerjaan" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataPekerjaan" class="collapse">
                        <div class="card-body">
                            <p>Pekerjaan: Software Engineer</p>
                            <p>Perusahaan: ABC Tech</p>
                            <p>Durasi: 5 Tahun</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <!-- Kartu Data Pendidikan -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Pendidikan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataPendidikan" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataPendidikan" class="collapse">
                        <div class="card-body">
                            <p>SMA: SMA Negeri 1 Jakarta</p>
                            <p>S1: Teknik Informatika - Universitas Indonesia</p>
                            <p>S2: Ilmu Komputer - Universitas Gadjah Mada</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <!-- Kartu Riwayat Pelatihan -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Riwayat Pelatihan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataPelatihan" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataPelatihan" class="collapse">
                        <div class="card-body">
                            <p>Pelatihan 1: Machine Learning - Dicoding</p>
                            <p>Pelatihan 2: Web Development - Udemy</p>
                            <p>Pelatihan 3: DevOps - Coursera</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>