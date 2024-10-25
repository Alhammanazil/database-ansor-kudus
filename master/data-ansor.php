<?php
require '../config/config.php';
require '../config/cookies.php';

if (!check_login()) {
    header("Location: ../login.php");
    exit();
}

// Cek role
if ($_SESSION['user']['role'] !== 'master' && $_SESSION['user']['role'] !== 'admin') {
    header("Location: dashboard.php"); // atau halaman lain yang sesuai
    exit();
}

require_once 'header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Anggota Ansor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Data Anggota</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel List Anggota Ansor</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="data-ansor" class="table-bordered table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>No Registrasi</th>
                                        <th>Status Keanggotaan</th>
                                        <th>Diklat Kader</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>Anggota <?php echo $i; ?></td>
                                            <td>Nomor Registrasi <?php echo $i; ?></td>
                                            <td>
                                                <?php if ($i % 2 == 0) : ?>
                                                    <span class="badge bg-success">Aktif</span>
                                                <?php else : ?>
                                                    <span class="badge bg-danger">Tidak Aktif</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($i % 2 == 0) : ?>
                                                    <span class="badge bg-success">Sudah</span>
                                                <?php else : ?>
                                                    <span class="badge bg-danger">Belum</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="edit-anggota.php?id=<?php echo $i; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <a href="hapus-anggota.php?id=<?php echo $i; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data anggota?')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>No Registrasi</th>
                                        <th>Status Keanggotaan</th>
                                        <th>Diklat Kader</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php
require_once 'footer.php';
?>