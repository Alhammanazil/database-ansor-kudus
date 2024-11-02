<?php
require_once '../style/header.php';

// Setelah login berhasil, cek role pengguna
if ($_SESSION['user']['role'] === 'admin kecamatan') {
    // Ambil desa_id dan kecamatan_id dari database sesuai dengan admin kecamatan yang login
    $user_id = $_SESSION['user']['id'];
    $query = "SELECT anggota_domisili_des AS desa_id, anggota_domisili_kec AS kecamatan_id FROM tb_anggota WHERE anggota_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    // Simpan desa_id dan kecamatan_id ke dalam sesi
    $_SESSION['user']['desa_id'] = $user_data['desa_id'];
    $_SESSION['user']['kecamatan_id'] = $user_data['kecamatan_id'];
}

// Cek apakah variabel sesi desa_id dan kecamatan_id sudah di-set
$role = $_SESSION['user']['role'];
$user_kecamatan = isset($_SESSION['user']['kecamatan_id']) ? $_SESSION['user']['kecamatan_id'] : null;

// Query untuk mengambil data anggota dengan filter berdasarkan role
$query = "
SELECT
    a.*,
    t.regencies_name AS kabupaten,
    CONCAT(d.districts_name, ', ', v.villages_name) AS alamat,
    pe.pekerjaan_name AS pekerjaan,
    pt.pendidikan_name AS pendidikan
FROM
    tb_anggota a
LEFT JOIN
    tb_regencies t ON a.anggota_tempat_lahir = t.regencies_id
LEFT JOIN
    tb_districts d ON a.anggota_domisili_kec = d.districts_id
LEFT JOIN
    tb_villages v ON a.anggota_domisili_des = v.villages_id
LEFT JOIN
    tb_pekerjaan pe ON a.anggota_pekerjaan = pe.pekerjaan_id
LEFT JOIN
    tb_pendidikan pt ON a.anggota_pendidikan = pt.pendidikan_id";

// Tambahkan kondisi untuk admin kecamatan
if ($role === 'admin kecamatan' && $user_kecamatan) {
    $query .= " WHERE a.anggota_domisili_kec = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_kecamatan);
} else {
    // Jika role adalah master, tampilkan semua data tanpa filter
    $stmt = $conn->prepare($query);
}

// Eksekusi query
$stmt->execute();
$result = $stmt->get_result();
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
                        <li class="breadcrumb-item"><a href="#">Admin Kecamatan</a></li>
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
                                <thead class="text-center btn-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat</th>
                                        <th>Pekerjaan</th>
                                        <th>Pendidikan</th>
                                        <th>Kartu Anggota</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result->num_rows > 0): ?>
                                        <?php $no = 1; ?>
                                        <?php while ($row = $result->fetch_assoc()): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo htmlspecialchars($row['anggota_nama']); ?></td>
                                                <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                                                <td><?php echo htmlspecialchars($row['pekerjaan']); ?></td>
                                                <td><?php echo htmlspecialchars($row['pendidikan']); ?></td>
                                                <td style="text-align: center;">
                                                    <button onclick="previewCard(<?php echo $row['anggota_id']; ?>)" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-eye"></i> Preview
                                                    </button>
                                                </td>

                                                <td>
                                                    <a href="edit-anggota.php?id=<?php echo $row['anggota_id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="hapus-anggota.php?id=<?php echo $row['anggota_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data anggota?')"><i class="fas fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data anggota.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
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
require_once '../style/footer.php';
?>