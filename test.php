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
    <!-- icheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <?php
    include 'config/config.php';
    include 'config/data.php';
    ?>

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
                            <form id="formPendaftaran" action="config/pendaftaran-test.php" method="POST" novalidate>

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
                                                <select name="tempat_lahir" class="form-control select2" required>
                                                    <option value="" disabled selected>Pilih Tempat Lahir</option>
                                                    <?php foreach ($kabupaten as $item) { ?>
                                                        <option value="<?= $item['regencies_id'] ?>"><?= $item['regencies_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">Harap masukkan Tempat Lahir.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir" required>
                                                <div class="invalid-feedback">Harap masukkan Tanggal Lahir.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Golongan Darah</label>
                                                <select class="form-control select2" name="golongan_darah" required>
                                                    <option value="" disabled selected>Pilih Golongan Darah</option>
                                                    <?php foreach ($gol_darah as $item) { ?>
                                                        <option value="<?= $item['golongan_darah_id'] ?>"><?= $item['golongan_darah_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih Golongan Darah.</div>
                                            </div>
                                            <div class="form-group">
                                                <label>Tinggi Badan (cm)</label>
                                                <select name="tinggi_badan" class="form-control select2" required>
                                                    <option value="" disabled selected>Pilih Tinggi Badan</option>
                                                    <?php foreach ($tb as $item) { ?>
                                                        <option value="<?= $item['tinggi_badan_id'] ?>"><?= $item['tinggi_badan_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Berat Badan (kg)</label>
                                                <select name="berat_badan" class="form-control select2" required>
                                                    <option value="" disabled selected>Pilih Berat Badan</option>
                                                    <?php foreach ($bb as $item) { ?>
                                                        <option value="<?= $item['berat_badan_id'] ?>"><?= $item['berat_badan_name'] ?></option>
                                                    <?php } ?>
                                                </select>
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

                                            <!-- Status Pernikahan -->
                                            <div class="form-group">
                                                <label>Status Pernikahan</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="status_pernikahan" value="1" required onclick="toggleMarriageFields()"> Belum Menikah
                                                    </label>
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="status_pernikahan" value="2" required onclick="toggleMarriageFields()"> Sudah Menikah
                                                    </label>
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="status_pernikahan" value="3" required onclick="toggleMarriageFields()"> Cerai (Mati/Hidup)
                                                    </label>
                                                </div>
                                                <div class="invalid-feedback">Harap pilih Status Pernikahan.</div>
                                            </div>

                                            <!-- Wrapper for Marriage Details -->
                                            <div id="marriageDetails" style="display: none;">
                                                <!-- Nama Istri -->
                                                <div class="form-group">
                                                    <label>Nama Istri</label>
                                                    <input type="text" class="form-control" name="nama_istri" placeholder="Masukkan Nama Istri">
                                                    <div class="invalid-feedback">Harap masukkan Nama Istri.</div>
                                                </div>

                                                <!-- Jumlah Anak Laki-laki -->
                                                <div class="form-group">
                                                    <label>Jumlah Anak Laki-laki</label>
                                                    <input type="number" class="form-control" name="anak_laki" placeholder="Masukkan Jumlah Anak Laki-laki">
                                                    <div class="invalid-feedback">Harap masukkan Jumlah Anak Laki-laki.</div>
                                                </div>

                                                <!-- Jumlah Anak Perempuan -->
                                                <div class="form-group">
                                                    <label>Jumlah Anak Perempuan</label>
                                                    <input type="number" class="form-control" name="anak_perempuan" placeholder="Masukkan Jumlah Anak Perempuan">
                                                    <div class="invalid-feedback">Harap masukkan Jumlah Anak Perempuan.</div>
                                                </div>
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
                                                    <option value="" disabled selected>Pilih RT</option>
                                                    <?php foreach ($rt as $item) { ?>
                                                        <option value="<?= $item['rt_id'] ?>">
                                                            <?= $item['rt_name'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih RT.</div>
                                            </div>

                                            <div class="form-group">
                                                <label for="rw">RW</label>
                                                <select class="form-control select2" id="rw" name="rw" required>
                                                    <option value="" disabled selected>Pilih RW</option>
                                                    <?php foreach ($rw as $item) { ?>
                                                        <option value="<?= $item['rw_id'] ?>">
                                                            <?= $item['rw_name'] ?>
                                                        </option>
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
                                            <button type="submit" class="btn btn-success">Selesai</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
    <!-- icheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.css" integrity="sha512-J5tsMaZISEmI+Ly68nBDiQyNW6vzBoUlNHGsH8T3DzHTn2h9swZqiMeGm/4WMDxAphi5LMZMNA30LvxaEPiPkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>
        function nextStep(current, next) {
            $('#' + current).collapse('hide');
            $('#' + next).collapse('show');
            document.getElementById(next).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        function prevStep(current, prev) {
            $('#' + current).collapse('hide');
            $('#' + prev).collapse('show');
        }

        // FIeld Data Anggota
        function toggleMarriageFields() {
            const marriageDetails = document.getElementById('marriageDetails');
            const selectedStatus = document.querySelector('input[name="nikah"]:checked').value;

            // Show the fields only if the user selects "Menikah"
            if (selectedStatus === '2') {
                marriageDetails.style.display = 'block';
            } else {
                marriageDetails.style.display = 'none';
            }
        }

        // Initialize the form on page load to check if a status is already selected
        document.addEventListener('DOMContentLoaded', toggleMarriageFields);

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
        document.getElementById('jenisPekerjaan').onchange = function() {
            document.getElementById('jobFields').style.display =
                this.value === '21' ? 'none' : 'block';
        };

        // Field Riwayat Pelatihan Kaderisasi
        function toggleUpload(uploadId, sectionClass) {
            // Sembunyikan semua upload-section pada kategori yang dipilih
            document.querySelectorAll(`.${sectionClass}`).forEach(el => el.style.display = 'none');
            // Tampilkan hanya elemen upload yang dipilih
            document.getElementById(uploadId).style.display = 'block';
        }

        // fungsi untuk menangani toggle radio button
        document.addEventListener('DOMContentLoaded', function() {
            let lastChecked = null; // Variabel untuk menyimpan radio button terakhir yang dipilih

            // Fungsi untuk menangani toggle radio button
            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener('click', function() {
                    if (lastChecked === this) {
                        // Jika radio yang sama diklik, batalkan pilihan
                        this.checked = false;
                        lastChecked = null; // Reset lastChecked
                        toggleUpload('', this.name); // Sembunyikan upload section
                    } else {
                        lastChecked = this; // Simpan radio yang baru dipilih
                    }
                });
            });

            // Fungsi untuk menampilkan atau menyembunyikan upload section
            function toggleUpload(uploadId, sectionClass) {
                // Sembunyikan semua upload-section berdasarkan kategori
                document.querySelectorAll(`.${sectionClass}`).forEach(el => el.style.display = 'none');

                if (uploadId) {
                    // Tampilkan hanya elemen yang dipilih
                    document.getElementById(uploadId).style.display = 'block';
                }
            }
        });

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