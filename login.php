<?php
session_start();

// Cek apakah user sudah login
if (isset($_SESSION['user'])) {
    // Redirect berdasarkan role
    switch ($_SESSION['user']['role']) {
        case 'master':
            header("Location: master/dashboard.php");
            break;

        case 'admin kecamatan':
            header("Location: admin_kecamatan/dashboard.php");
            break;

        case 'admin desa':
            header("Location: admin_desa/dashboard.php");
            break;

        case 'user':
            header("Location: user/data-pribadi.php");
            break;

        default:
            $_SESSION['error'] = "Role tidak dikenali.";
            header("Location: login.php");
            break;
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/logo.png" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/adminlte/plugins/fontawesome-free/css/all.min.css">

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="assets/adminlte/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Login</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Masukkan username & password</p>

                <!-- Alert untuk pesan sukses/error -->
                <?php
                if (isset($_GET['message'])) {
                    echo "<div class='alert alert-success'>" . htmlspecialchars($_GET['message']) . "</div>";
                }

                if (isset($_GET['error'])) {
                    echo "<div class='alert alert-danger'>" . htmlspecialchars($_GET['error']) . "</div>";
                }
                ?>

                <!-- Tampilkan pesan sukses atau error -->
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <form action="config/login.php" method="POST" class="needs-validation" novalidate>
                    <!-- Username -->
                    <div class="input-group mb-3">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">Masukkan username.</div>
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control password" placeholder="Masukkan password" required>
                        <div class="input-group-append">
                            <div class="input-group-text" onclick="togglePasswordVisibility('password', this)">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">Password harus diisi minimal 8 karakter.</div>
                    </div>

                    <!-- Checkbox Remember Me -->
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="rememberMe" name="rememberMe">
                                <label for="rememberMe">Ingat Saya</label>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>

                <!-- <p class="mb-0 text-center">Belum punya akun?
                    <a href="register.php" class="text-center">Daftar</a> -->
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
    </script>
</body>

</html>