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
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<style>
    /* Pastikan tampilan Select2 sesuai dengan Bootstrap */
    .select2-container--default .select2-selection--single {
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 1.5rem;
    }
</style>


<body class="hold-transition sidebar-mini">
    <?php include 'config/rt_rw.php'; ?>

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
                            <form id="formPendaftaran" action="config/pendaftaran.php" method="POST" novalidate>

                                <!-- Step 1: Data Anggota -->
                                <div class="card card-outline card-primary mt-4">
                                    <div class="card-header" data-toggle="collapse" data-target="#dataAnggota">
                                        <h5>1. Data Anggota</h5>
                                    </div>
                                    <div id="dataAnggota" class="collapse show">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Alamat Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Masukkan Alamat Email" required>
                                                <div class="invalid-feedback">Harap masukkan email yang valid.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required>
                                                <div class="invalid-feedback">Harap masukkan Nama Lengkap.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>No. KTP / NIK</label>
                                                <input type="text" class="form-control" name="nik" placeholder="Masukkan No. KTP / NIK" required>
                                                <div class="invalid-feedback">Harap masukkan No. KTP / NIK.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
                                                <div class="invalid-feedback">Harap masukkan Tempat Lahir.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir" required>
                                                <div class="invalid-feedback">Harap masukkan Tanggal Lahir.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Golongan Darah</label>
                                                <select class="form-control" name="golongan_darah" required>
                                                    <option value="">Pilih Golongan Darah</option>
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>AB</option>
                                                    <option>O</option>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih Golongan Darah.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Tinggi Badan (cm)</label>
                                                <input type="number" class="form-control" name="tinggi_badan" placeholder="Masukkan Tinggi Badan" required>
                                                <div class="invalid-feedback">Harap masukkan Tinggi Badan.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Berat Badan (kg)</label>
                                                <input type="number" class="form-control" name="berat_badan" placeholder="Masukkan Berat Badan" required>
                                                <div class="invalid-feedback">Harap masukkan Berat Badan.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Ayah Kandung</label>
                                                <input type="text" class="form-control" name="ayah" placeholder="Masukkan Nama Ayah Kandung" required>
                                                <div class="invalid-feedback">Harap masukkan Nama Ayah Kandung.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Ibu Kandung</label>
                                                <input type="text" class="form-control" name="ibu" placeholder="Masukkan Nama Ibu Kandung" required>
                                                <div class="invalid-feedback">Harap masukkan Nama Ibu Kandung.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Status Pernikahan</label>
                                                <select class="form-control" name="status_pernikahan" required>
                                                    <option value="">Pilih Status Pernikahan</option>
                                                    <option>Belum Menikah</option>
                                                    <option>Menikah</option>
                                                    <option>Cerai</option>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih Status Pernikahan.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Kepemilikan NPWP</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="npwp" value="1" required> Sudah Memiliki
                                                    </label>
                                                    <label class="btn btn-outline-secondary">
                                                        <input type="radio" name="npwp" value="0" required checked> Belum Memiliki
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>BPJS Kesehatan</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="bpjs" value="1" required> Sudah Memiliki
                                                    </label>
                                                    <label class="btn btn-outline-secondary">
                                                        <input type="radio" name="bpjs" value="0" required checked> Belum Memiliki
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" onclick="nextStep('dataAnggota', 'dataAlamat')">Lanjut</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 2: Alamat dan Media Sosial -->
                                <div class="card card-outline card-primary mt-4">
                                    <div class="card-header" data-toggle="collapse" data-target="#dataAlamat">
                                        <h5>2. Alamat dan Media Sosial</h5>
                                    </div>
                                    <div id="dataAlamat" class="collapse">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="kecamatan">Kecamatan</label>
                                                <select class="form-control" id="kecamatan" name="kecamatan" required>
                                                    <option value="">Pilih Kecamatan</option>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih Kecamatan.</div>
                                            </div>

                                            <div class="form-group">
                                                <label for="desa">Desa</label>
                                                <select class="form-control" id="desa" name="desa" required>
                                                    <option value="">Pilih Desa</option>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih Desa.</div>
                                            </div>

                                            <div class="form-group">
                                                <label for="rt">RT</label>
                                                <select class="form-control select2" id="rt" name="rt" required>
                                                    <option value="">Pilih RT</option>
                                                    <?php while ($row = mysqli_fetch_assoc($rt_result)) { ?>
                                                        <option value="<?= $row['rt_id'] ?>"><?= $row['rt_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih RT.</div>
                                            </div>

                                            <div class="form-group">
                                                <label for="rw">RW</label>
                                                <select class="form-control select2" id="rw" name="rw" required>
                                                    <option value="">Pilih RW</option>
                                                    <?php while ($row = mysqli_fetch_assoc($rw_result)) { ?>
                                                        <option value="<?= $row['rw_id'] ?>"><?= $row['rw_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih RW.</div>
                                            </div>


                                            <div class="form-group">
                                                <label>No. Telp / WA</label>
                                                <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No. Telp / WA" required>
                                                <div class="invalid-feedback">Harap masukkan No. Telp / WA.</div>
                                            </div>

                                            <div class="form-group">
                                                <label>Akun Facebook</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="facebook" value="1" required> Punya
                                                    </label>
                                                    <label class="btn btn-outline-secondary active">
                                                        <input type="radio" name="facebook" value="0" required checked> Tidak
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Akun Instagram</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="instagram" value="1" required> Punya
                                                    </label>
                                                    <label class="btn btn-outline-secondary active">
                                                        <input type="radio" name="instagram" value="0" required checked> Tidak
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Akun TikTok</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="tiktok" value="1" required> Punya
                                                    </label>
                                                    <label class="btn btn-outline-secondary active">
                                                        <input type="radio" name="tiktok" value="0" required checked> Tidak
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Akun YouTube</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="youtube" value="1" required> Punya
                                                    </label>
                                                    <label class="btn btn-outline-secondary active">
                                                        <input type="radio" name="youtube" value="0" required checked> Tidak
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Akun Twitter</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="twitter" value="1" required> Punya
                                                    </label>
                                                    <label class="btn btn-outline-secondary active">
                                                        <input type="radio" name="twitter" value="0" required checked> Tidak
                                                    </label>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-secondary" onclick="prevStep('dataAlamat', 'dataAnggota')">Kembali</button>
                                            <button type="button" class="btn btn-primary" onclick="nextStep('dataAlamat', 'dataPekerjaan')">Lanjut</button>
                                            <button type="submit" class="btn btn-success" onclick="validateForm()">Selesai</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 3: Pekerjaan -->
                                <div class="card card-outline card-primary mt-4">
                                    <div class="card-header" data-toggle="collapse" data-target="#dataPekerjaan">
                                        <h5>3. Data Pekerjaan</h5>
                                    </div>
                                    <div id="dataPekerjaan" class="collapse">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="jenisPekerjaan">Jenis Pekerjaan</label>
                                                <select class="form-control" id="jenisPekerjaan" onchange="toggleJobFields()" required>
                                                    <option value="" disabled selected>Pilih Jenis Pekerjaan</option>
                                                    <option value="tidak_bekerja">Tidak Bekerja</option>
                                                    <option value="pedagang">Pedagang</option>
                                                    <option value="pegawai">Pegawai</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih Jenis Pekerjaan.</div>
                                            </div>

                                            <!-- Fields tambahan yang akan disembunyikan jika tidak bekerja -->
                                            <div id="jobFields" style="display: none;">
                                                <div class="form-group">
                                                    <label for="sistemKerja">Sistem Kerja</label>
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary">
                                                            <input type="radio" name="sistemKerja" value="non_shift" autocomplete="off"> Non Shift
                                                        </label>
                                                        <label class="btn btn-outline-primary">
                                                            <input type="radio" name="sistemKerja" value="shift" autocomplete="off"> Shift
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="namaInstansi">Nama Instansi / Tempat Bekerja</label>
                                                    <input type="text" class="form-control" id="namaInstansi" placeholder="Masukkan Nama Instansi">
                                                </div>

                                                <div class="form-group">
                                                    <label for="alamatInstansi">Alamat Instansi / Tempat Bekerja</label>
                                                    <input type="text" class="form-control" id="alamatInstansi" placeholder="Masukkan Alamat Instansi">
                                                </div>

                                                <div class="form-group">
                                                    <label>Pendapatan Perbulan Suami</label>
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-outline-primary">
                                                            <input type="radio" name="pendapatan" value="<3juta" autocomplete="off"> Kurang dari 3 juta
                                                        </label>
                                                        <label class="btn btn-outline-primary">
                                                            <input type="radio" name="pendapatan" value="3-5juta" autocomplete="off"> 3-5 juta
                                                        </label>
                                                        <label class="btn btn-outline-primary">
                                                            <input type="radio" name="pendapatan" value="5-10juta" autocomplete="off"> 5-10 juta
                                                        </label>
                                                        <label class="btn btn-outline-primary">
                                                            <input type="radio" name="pendapatan" value=">10juta" autocomplete="off"> Di atas 10 juta
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-secondary" onclick="prevStep('dataPekerjaan', 'dataAlamat')">Kembali</button>
                                            <button type="button" class="btn btn-primary" onclick="nextStep('dataPekerjaan', 'dataPendidikan')">Lanjut</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 4: Riwayat Pendidikan dan Organisasi -->
                                <div class="card card-outline card-primary mt-4">
                                    <div class="card-header" data-toggle="collapse" data-target="#dataPendidikan">
                                        <h5>4. Riwayat Pendidikan dan Organisasi</h5>
                                    </div>
                                    <div id="dataPendidikan" class="collapse">
                                        <div class="card-body">
                                            <!-- Pendidikan Terakhir -->
                                            <div class="form-group">
                                                <label for="pendidikanTerakhir">Pendidikan Terakhir</label>
                                                <select id="pendidikanTerakhir" class="form-control" required>
                                                    <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma">SMA/SMK</option>
                                                    <option value="diploma">Diploma</option>
                                                    <option value="sarjana">Sarjana</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih Pendidikan Terakhir.</div>
                                            </div>

                                            <!-- Nama Lembaga Pendidikan -->
                                            <div class="form-group">
                                                <label for="lembagaPendidikan">Nama Lembaga Pendidikan Terakhir</label>
                                                <input type="text" class="form-control" id="lembagaPendidikan" placeholder="Masukkan Nama Lembaga" required>
                                                <div class="invalid-feedback">Harap masukkan Nama Lembaga Pendidikan Terakhir.</div>
                                            </div>

                                            <!-- Nama Pesantren -->
                                            <div class="form-group">
                                                <label for="namaPesantren">Nama Pesantren</label>
                                                <input type="text" class="form-control" id="namaPesantren" placeholder="Masukkan Nama Pesantren" required>
                                            </div>

                                            <!-- Nama Madrasah Diniyah -->
                                            <div class="form-group">
                                                <label for="madrasahDiniyah">Nama Madrasah Diniyah</label>
                                                <input type="text" class="form-control" id="madrasahDiniyah" placeholder="Masukkan Nama Madrasah" required>
                                            </div>

                                            <!-- Riwayat Organisasi -->
                                            <h6>Riwayat Organisasi</h6>

                                            <div class="form-group">
                                                <label>IPNU</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="ipnu" value="pernah"> Pernah
                                                    </label>
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="ipnu" value="tidak_pernah"> Tidak Pernah
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>PMII</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="pmii" value="pernah"> Pernah
                                                    </label>
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="pmii" value="tidak_pernah"> Tidak Pernah
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>DEMA / BEM</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="dema" value="pernah"> Pernah
                                                    </label>
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="dema" value="tidak_pernah"> Tidak Pernah
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="organisasiLainnya">Organisasi Lainnya</label>
                                                <input type="text" class="form-control" id="organisasiLainnya" placeholder="Masukkan Nama Organisasi">
                                            </div>

                                            <div class="form-group">
                                                <label for="afiliasiPartai">Afiliasi Partai Politik Saat Ini</label>
                                                <select id="afiliasiPartai" class="form-control" required>
                                                    <option value="" disabled selected>Pilih Afiliasi</option>
                                                    <option value="tidak_berafiliasi">Tidak Berafiliasi</option>
                                                    <option value="partai_a">Partai A</option>
                                                    <option value="partai_b">Partai B</option>
                                                    <option value="partai_c">Partai C</option>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih Afiliasi Partai Politik Saat Ini.</div>
                                            </div>

                                            <button type="button" class="btn btn-secondary" onclick="prevStep('dataPendidikan', 'dataPekerjaan')">Kembali</button>
                                            <button type="button" class="btn btn-primary" onclick="nextStep('dataPendidikan', 'dataKepengurusan')">Lanjut</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 5: Riwayat Kepengurusan di Ansor -->
                                <div class="card card-outline card-primary mt-4">
                                    <div class="card-header" data-toggle="collapse" data-target="#dataKepengurusan">
                                        <h5>5. Riwayat Kepengurusan di Ansor</h5>
                                    </div>
                                    <div id="dataKepengurusan" class="collapse">
                                        <div class="card-body">
                                            <!-- Tingkat Pimpinan Ranting -->
                                            <h6>A. Tingkat Pimpinan Ranting</h6>
                                            <div class="form-group">
                                                <label for="namaKecamatanRanting">Nama Kecamatan</label>
                                                <select id="namaKecamatanRanting" class="form-control">
                                                    <option value="" disabled selected>Pilih Kecamatan</option>
                                                    <option value="kecamatan1">Kecamatan 1</option>
                                                    <option value="kecamatan2">Kecamatan 2</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatanRanting">Jabatan Tertinggi di Ranting</label>
                                                <input type="text" class="form-control" id="jabatanRanting" placeholder="Masukkan Jabatan di Ranting">
                                            </div>
                                            <div class="form-group">
                                                <label for="masaRanting">Masa Khidmat di Ranting</label>
                                                <input type="text" class="form-control" id="masaRanting" placeholder="Contoh: 2020 - 2022">
                                            </div>
                                            <br>

                                            <!-- Tingkat Pimpinan Anak Cabang -->
                                            <h6>B. Tingkat Pimpinan Anak Cabang (PAC)</h6>
                                            <div class="form-group">
                                                <label for="kecamatanPAC">Kecamatan (PAC)</label>
                                                <select id="kecamatanPAC" class="form-control">
                                                    <option value="" disabled selected>Pilih Kecamatan</option>
                                                    <option value="kecamatan1">Kecamatan 1</option>
                                                    <option value="kecamatan2">Kecamatan 2</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatanPAC">Jabatan Tertinggi di PAC</label>
                                                <input type="text" class="form-control" id="jabatanPAC" placeholder="Masukkan Jabatan di PAC">
                                            </div>
                                            <div class="form-group">
                                                <label for="masaPAC">Masa Khidmat di PAC</label>
                                                <input type="text" class="form-control" id="masaPAC" placeholder="Contoh: 2020 - 2022">
                                            </div>
                                            <br>

                                            <!-- Tingkat Pimpinan Cabang -->
                                            <h6>C. Tingkat Pimpinan Cabang (PC)</h6>
                                            <div class="form-group">
                                                <label for="jabatanPC">Jabatan Tertinggi di PC</label>
                                                <input type="text" class="form-control" id="jabatanPC" placeholder="Masukkan Jabatan di PC">
                                            </div>
                                            <div class="form-group">
                                                <label for="masaPC">Masa Khidmat di PC</label>
                                                <input type="text" class="form-control" id="masaPC" placeholder="Contoh: 2020 - 2022">
                                            </div>

                                            <button type="button" class="btn btn-secondary" onclick="prevStep('dataKepengurusan', 'dataPendidikan')">Kembali</button>
                                            <button type="button" class="btn btn-primary" onclick="nextStep('dataKepengurusan', 'dataPelatihanKaderisasi')">Lanjut</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 6: Riwayat Pelatihan Kaderisasi -->
                                <div class="card card-outline card-primary mt-4">
                                    <div class="card-header" data-toggle="collapse" data-target="#dataPelatihanKaderisasi">
                                        <h5>6. Riwayat Pelatihan Kaderisasi</h5>
                                    </div>
                                    <div id="dataPelatihanKaderisasi" class="collapse">
                                        <div class="card-body">
                                            <!-- PKD -->
                                            <div class="form-group">
                                                <label for="pkd">PKD</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary" onclick="toggleUploadField('pkd', true)">
                                                        <input type="radio" name="pkd" value="belum" required> Belum
                                                    </label>
                                                    <label class="btn btn-outline-primary" onclick="toggleUploadField('pkd', false)">
                                                        <input type="radio" name="pkd" value="lulus" required> Lulus
                                                    </label>
                                                </div>
                                                <div id="pkdUpload" class="mt-2" style="display: none;">
                                                    <label for="pkdCertificate" class="form-label">Upload Sertifikat PKD</label>
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="pkdCertificate" accept="image/*,application/pdf">
                                                            <label class="custom-file-label" for="pkdCertificate">Pilih File</label>
                                                        </div>
                                                        <div class="invalid-feedback">Harap upload sertifikat PKD jika memilih Lulus.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Dirosah Ula -->
                                            <div class="form-group">
                                                <label for="dirosahUla">Dirosah Ula</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary" onclick="toggleUploadField('dirosahUla', true)">
                                                        <input type="radio" name="dirosahUla" value="belum" required> Belum
                                                    </label>
                                                    <label class="btn btn-outline-primary" onclick="toggleUploadField('dirosahUla', false)">
                                                        <input type="radio" name="dirosahUla" value="lulus" required> Lulus
                                                    </label>
                                                </div>
                                                <div id="dirosahUlaUpload" class="mt-2" style="display: none;">
                                                    <label for="dirosahUlaCertificate" class="form-label">Upload Sertifikat Dirosah Ula</label>
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="dirosahUlaCertificate" accept="image/*,application/pdf">
                                                            <label class="custom-file-label" for="dirosahUlaCertificate">Pilih File</label>
                                                        </div>
                                                        <div class="invalid-feedback">Harap upload sertifikat Dirosah Ula jika memilih Lulus.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Diklatsar -->
                                            <div class="form-group">
                                                <label for="diklatsar">Diklatsar</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary" onclick="toggleUploadField('diklatsar', true)">
                                                        <input type="radio" name="diklatsar" value="belum" required> Belum
                                                    </label>
                                                    <label class="btn btn-outline-primary" onclick="toggleUploadField('diklatsar', false)">
                                                        <input type="radio" name="diklatsar" value="lulus" required> Lulus
                                                    </label>
                                                </div>
                                                <div id="diklatsarUpload" class="mt-2" style="display: none;">
                                                    <label for="diklatsarCertificate" class="form-label">Upload Sertifikat Diklatsar</label>
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="diklatsarCertificate" accept="image/*,application/pdf">
                                                            <label class="custom-file-label" for="diklatsarCertificate">Pilih File</label>
                                                        </div>
                                                        <div class="invalid-feedback">Harap upload sertifikat Diklatsar jika memilih Lulus.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-secondary" onclick="prevStep('dataPelatihanKaderisasi', 'dataKepengurusan')">Kembali</button>
                                            <button type="submit" class="btn btn-success" onclick="validateForm()">Selesai</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
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

    <!--  REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/adminlte/dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

    <script>
        function nextStep(current, next) {
            $('#' + current).collapse('hide');
            $('#' + next).collapse('show');
        }

        function prevStep(current, prev) {
            $('#' + current).collapse('hide');
            $('#' + prev).collapse('show');
        }

        // Field Alamat
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch data kecamatan saat halaman dimuat
            fetch('config/districts.php')
                .then(response => response.json())
                .then(data => {
                    const kecamatanSelect = document.getElementById('kecamatan');
                    kecamatanSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';

                    if (data.status === "success") {
                        data.data.forEach(district => {
                            const option = document.createElement('option');
                            option.value = district.districts_id;
                            option.textContent = district.districts_name;
                            kecamatanSelect.appendChild(option);
                        });
                    } else {
                        alert('Tidak ada data kecamatan ditemukan.');
                    }
                })
                .catch(error => console.error('Error:', error));

            // Fetch data desa saat kecamatan berubah
            document.getElementById('kecamatan').addEventListener('change', function() {
                const districtsId = this.value;
                const desaSelect = document.getElementById('desa');

                if (!districtsId) {
                    desaSelect.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';
                    return;
                }

                // Fetch desa berdasarkan kecamatan yang dipilih
                fetch(`config/villages.php?districts_id=${districtsId}`)
                    .then(response => response.json())
                    .then(data => {
                        desaSelect.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';

                        if (data.status === "success") {
                            data.data.forEach(village => {
                                const option = document.createElement('option');
                                option.value = village.villages_id;
                                option.textContent = village.villages_name;
                                desaSelect.appendChild(option);
                            });
                        } else {
                            alert('Tidak ada data desa ditemukan.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });


        // Field Pekerjaan
        function toggleJobFields() {
            const jobType = document.getElementById('jenisPekerjaan').value;
            const jobFields = document.getElementById('jobFields');

            if (jobType === 'tidak_bekerja') {
                jobFields.style.display = 'none';
            } else {
                jobFields.style.display = 'block';
            }
        }

        // Field Riwayat Pelatihan Kaderisasi
        function toggleUploadField(field, isHidden) {
            const uploadField = document.getElementById(`${field}Upload`);
            const uploadInput = document.getElementById(`${field}Certificate`);

            if (isHidden) {
                uploadField.style.display = 'none';
                uploadInput.removeAttribute('required');
                uploadInput.classList.remove('is-invalid');
            } else {
                uploadField.style.display = 'block';
                uploadInput.setAttribute('required', 'required');
            }
        }

        function validateForm() {
            const inputs = ['pkd', 'dirosahUla', 'diklatsar'];

            inputs.forEach(input => {
                const uploadInput = document.getElementById(`${input}Certificate`);
                const radioValue = document.querySelector(`input[name="${input}"]:checked`).value;

                if (radioValue === 'lulus' && !uploadInput.value) {
                    uploadInput.classList.add('is-invalid');
                } else {
                    uploadInput.classList.remove('is-invalid');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            bsCustomFileInput.init();
        });

        // Validasi form
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const formSuccess = urlParams.get('form_success');

            if (formSuccess) {
                Swal.fire({
                    title: 'Form Berhasil Dikirim',
                    text: 'Terima kasih telah mengisi form pendaftaran',
                    icon: 'success',
                    confirmButtonText: 'OK',
                }).then(() => {
                    // Hapus parameter dari URL setelah popup ditutup
                    window.history.replaceState({}, document.title, window.location.pathname);
                });
            }

            const forms = document.querySelectorAll('form');

            forms.forEach((form) => {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault(); // Hentikan submit jika ada kesalahan
                        event.stopPropagation();

                        // Tambahkan kelas Bootstrap untuk menunjukkan error
                        form.classList.add('was-validated');

                        // Scroll ke elemen pertama yang invalid
                        const firstInvalidField = form.querySelector(':invalid');
                        if (firstInvalidField) {
                            firstInvalidField.focus();
                            firstInvalidField.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                        }

                        // Tampilkan SweetAlert jika ada error
                        Swal.fire({
                            title: 'Data belum lengkap!',
                            text: 'Pastikan semua data telah terisi dengan benar!',
                            icon: 'warning',
                            confirmButtonText: 'OK',
                        });

                    } else {
                        // Jika validasi lolos, jalankan submit form dan SweetAlert konfirmasi
                        event.preventDefault(); // Mencegah submit asli
                        Swal.fire({
                            title: 'Submit Formulir?',
                            text: 'Pastikan semua data yang anda masukkan benar',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya',
                            cancelButtonText: 'Tidak',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit(); // Kirim form setelah konfirmasi
                            }
                        });
                    }
                }, false);
            });
        });
    </script>

    <!-- select2 -->
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 pada semua elemen dengan kelas 'select2'
            $('.select2').select2({
                placeholder: "Pilih",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
</body>

</html>