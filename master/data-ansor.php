<?php
require_once '../config/config.php';
require_once '../style/header.php';

// Query untuk mengambil semua data anggota tanpa filter berdasarkan kecamatan atau desa
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

// Siapkan statement dan eksekusi query tanpa kondisi tambahan
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Anggota Ansor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active">Data Anggota</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel List Anggota Ansor</h3>
                        </div>
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
                                        <?php while ($row = $result->fetch_assoc()):
                                            // Generate token untuk setiap anggota ID
                                            $token = generateToken($row['anggota_id']);
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo htmlspecialchars($row['anggota_nama']); ?></td>
                                                <td><?php echo strtoupper(htmlspecialchars($row['alamat'])); ?></td>
                                                <td><?php echo htmlspecialchars($row['pekerjaan']); ?></td>
                                                <td><?php echo htmlspecialchars($row['pendidikan']); ?></td>
                                                <td style="text-align: center;">
                                                    <button onclick="previewCard('<?php echo $token; ?>')" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-eye"></i> Preview
                                                    </button>
                                                </td>

                                                <td>
                                                    <a href="edit-anggota.php?token=<?php echo urlencode($token); ?>" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="hapus-anggota.php?token=<?php echo urlencode($token); ?>" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus data anggota?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data anggota.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require_once '../style/footer.php';
?>