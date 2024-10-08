<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Khitan Umum YM3SK</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/ansor.png" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Theme style (AdminLTE) -->
    <link rel="stylesheet" href="assets/adminlte/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<?php
require 'config/config.php';

if (!check_login()) {
    header("Location: index.php");
    exit();
}

// Cek role pengguna
if ($_SESSION['user']['role'] !== 'master' && $_SESSION['user']['role'] !== 'admin') {
    header("Location: dashboard.php");
    exit();
}
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

        <!-- Form with step-by-step collapsible cards -->
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <!-- Kartu Data Diri -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Diri</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataDiri" aria-expanded="true">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataDiri" class="collapse show">
                        <div class="card-body">
                            <form id="formDataDiri">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="tglLahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tglLahir">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
                                </div>
                                <button type="button" class="btn btn-primary" onclick="nextStep('dataDiri', 'dataAlamat')">Lanjut</button>
                                <!-- Tombol Kembali tidak diperlukan di sini karena ini langkah pertama -->
                            </form>
                        </div>
                    </div>
                </div>

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
                            <form id="formDataAlamat">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="kodePos">Kode Pos</label>
                                    <input type="text" class="form-control" id="kodePos" placeholder="Masukkan Kode Pos">
                                </div>
                                <button type="button" class="btn btn-primary" onclick="nextStep('dataAlamat', 'dataPekerjaan')">Lanjut</button>
                                <button type="button" class="btn btn-secondary" onclick="nextStep('dataAlamat', 'dataDiri')">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>

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
                            <form id="formDataPekerjaan">
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" placeholder="Masukkan Pekerjaan">
                                </div>
                                <div class="form-group">
                                    <label for="perusahaan">Perusahaan</label>
                                    <input type="text" class="form-control" id="perusahaan" placeholder="Masukkan Perusahaan">
                                </div>
                                <button type="button" class="btn btn-primary" onclick="nextStep('dataPekerjaan', 'dataPendidikan')">Lanjut</button>
                                <button type="button" class="btn btn-secondary" onclick="nextStep('dataPekerjaan', 'dataAlamat')">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>

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
                            <form id="formDataPendidikan">
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" class="form-control" id="pendidikan" placeholder="Masukkan Pendidikan">
                                </div>
                                <button type="button" class="btn btn-primary" onclick="nextStep('dataPendidikan', 'dataPelatihan')">Lanjut</button>
                                <button type="button" class="btn btn-secondary" onclick="nextStep('dataPendidikan', 'dataPekerjaan')">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>

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
                            <form id="formDataPelatihan">
                                <div class="form-group">
                                    <label for="pelatihan">Pelatihan</label>
                                    <input type="text" class="form-control" id="pelatihan" placeholder="Masukkan Riwayat Pelatihan">
                                </div>
                                <button type="button" class="btn btn-success" onclick="submitForm()">Selesai</button>
                                <button type="button" class="btn btn-secondary" onclick="nextStep('dataPelatihan', 'dataPendidikan')">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/adminlte/dist/js/adminlte.min.js"></script>

<script>
    function nextStep(currentStep, nextStep) {
        $('#' + currentStep).collapse('hide');
        $('#' + nextStep).collapse('show');
    }

    function submitForm() {
        alert("Form berhasil dikirim!");
    }
</script>