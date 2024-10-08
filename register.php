<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/adminlte/plugins/fontawesome-free/css/all.min.css">

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="assets/adminlte/dist/css/adminlte.min.css?v=3.2.0">

    <!-- Favicon -->
    <link rel="icon" href="assets/logo.png" type="image/x-icon">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Register</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Daftarkan akun baru Anda</p>

                <!-- Tampilkan pesan sukses atau error -->
                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-success"><?= $_SESSION['message']; ?></div>
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <form action="config/register.php" method="POST" class="needs-validation" novalidate>
                    <!-- Nama Lengkap -->
                    <div class="input-group mb-3">
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">Nama lengkap harus diisi.</div>
                    </div>

                    <!-- Username -->
                    <div class="input-group mb-3">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">Username harus diisi minimal 4 karakter.</div>
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text" onclick="togglePasswordVisibility('password', this)">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">Password harus diisi minimal 8 karakter.</div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="input-group mb-3">
                        <input type="password" id="cPassword" class="form-control cPassword" placeholder="Konfirmasi Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text" onclick="togglePasswordVisibility('cPassword', this)">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">Password tidak cocok.</div>
                    </div>

                    <!-- Checkbox Term Agreement -->
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                                <label for="agreeTerms">
                                    Saya setuju dengan <a href="#">syarat dan ketentuan</a>
                                </label>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                    </div>
                </form>

                <p class="mt-3 text-center">
                    Sudah punya akun? <a href="index.php">Login</a>
                </p>
            </div>
        </div>
    </div>

    <script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script>
        // Validasi form
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })();

        // Fungsi untuk menampilkan/menyembunyikan password
        function togglePasswordVisibility(id, icon) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                icon.querySelector('span').classList.replace('fa-lock', 'fa-unlock');
            } else {
                input.type = "password";
                icon.querySelector('span').classList.replace('fa-unlock', 'fa-lock');
            }
        }

        // Validasi Konfirmasi Password
        document.querySelector("form").addEventListener("submit", function(e) {
            const password = document.getElementById("password").value;
            const cPassword = document.getElementById("cPassword").value;

            if (password !== cPassword) {
                e.preventDefault();
                document.getElementById("cPassword").classList.add("is-invalid");
            } else {
                document.getElementById("cPassword").classList.remove("is-invalid");
            }
        });
    </script>
</body>

</html>