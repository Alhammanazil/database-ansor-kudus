<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Pendaftaran</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/logo.png" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/adminlte/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="assets/ansor.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Ansor Kudus</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Form Pendaftaran -->
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-file-signature"></i>
                                <p>Form Pendaftaran</p>
                            </a>
                        </li>

                        <!-- Informasi -->
                        <li class="nav-item">
                            <a href="info.php" class="nav-link">
                                <i class="nav-icon fas fa-info"></i>
                                <p>Informasi</p>
                            </a>
                        </li>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- /.sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Form Pendaftaran</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
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
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Versi 1.0
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2024 Ansor Kudus</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/adminlte/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>

    <script>
        function nextStep(currentStep, nextStep) {
            $('#' + currentStep).collapse('hide');
            $('#' + nextStep).collapse('show');
        }

        function submitForm() {
            Swal.fire({
                title: 'Submit Formulir?',
                text: 'Pastikan semua data yang anda masukkan benar',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Form Berhasil Dikirim',
                        text: 'Terima kasih telah mengisi form pendaftaran',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    </script>
</body>

</html>