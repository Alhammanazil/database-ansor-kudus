<?php
require_once '../config/config.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_anggota WHERE anggota_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$anggota = $result->fetch_assoc();

if (!$anggota) {
    echo "Data anggota tidak ditemukan.";
    exit();
}

// Query untuk mendapatkan data Kecamatan
$kecamatan = [];
$result_kecamatan = $conn->query("SELECT * FROM tb_districts");

if ($result_kecamatan) {
    $kecamatan = $result_kecamatan->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Gagal memuat data kecamatan.";
    exit();
}

// Memuat desa awal berdasarkan kecamatan yang dipilih anggota
$desa = [];
if (!empty($anggota['anggota_domisili_kec'])) {
    $result_desa = $conn->query("SELECT * FROM tb_villages WHERE districts_id = '" . $anggota['anggota_domisili_kec'] . "'");
    if ($result_desa) {
        $desa = $result_desa->fetch_all(MYSQLI_ASSOC);
    }
}

// Query untuk mendapatkan data riwayat pelatihan kaderisasi
$riwayat_diklat = [];
$query_riwayat_diklat = "SELECT * FROM tb_riwayat_diklat WHERE anggota_id = ?";
$stmt_diklat = $conn->prepare($query_riwayat_diklat);
$stmt_diklat->bind_param("s", $id);
$stmt_diklat->execute();
$result_diklat = $stmt_diklat->get_result();

if ($result_diklat && $result_diklat->num_rows > 0) {
    while ($row = $result_diklat->fetch_assoc()) {
        $riwayat_diklat[$row['riwayat_diklat_item']] = $row;
    }
}

// Helper function untuk mengecek apakah diklat sudah pernah diambil
function isDiklatChecked($diklatItem, $riwayat_diklat)
{
    return isset($riwayat_diklat[$diklatItem]);
}

// Helper function untuk mendapatkan file terkait diklat
function getDiklatFile($diklatItem, $riwayat_diklat)
{
    return isset($riwayat_diklat[$diklatItem]) ? $riwayat_diklat[$diklatItem]['riwayat_diklat_file'] : null;
}

require_once '../style/header.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Anggota</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="data-ansor.php">Data Anggota</a></li>
                        <li class="breadcrumb-item active">Edit Data Anggota</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="../config/update_anggota.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $anggota['anggota_id']; ?>">

                <!-- Step 1: Data Anggota -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header" data-toggle="collapse" data-target="#dataAnggota">
                        <h5>1. Data Anggota</h5>
                    </div>
                    <div id="dataAnggota" class="collapse show">
                        <div class="card-body">
                            <!-- Alamat Email -->
                            <div class="form-group">
                                <label class="required-label" for="email">Alamat Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($anggota['anggota_email']); ?>" required>
                            </div>
                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label class="required-label" for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo htmlspecialchars($anggota['anggota_nama']); ?>" required>
                            </div>
                            <!-- No. KTP / NIK -->
                            <div class="form-group">
                                <label class="required-label" for="nik">No. KTP / NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="<?php echo htmlspecialchars($anggota['anggota_nik']); ?>" required>
                            </div>
                            <!-- Tempat Lahir -->
                            <div class="form-group">
                                <label class="required-label">Tempat Lahir</label>
                                <select name="tempat_lahir" class="form-control select2" required>
                                    <option value="" disabled>Pilih Tempat Lahir</option>
                                    <?php foreach ($kabupaten as $item) { ?>
                                        <option value="<?= $item['regencies_id'] ?>" <?= $item['regencies_id'] == $anggota['anggota_tempat_lahir'] ? 'selected' : '' ?>><?= $item['regencies_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- Tanggal Lahir -->
                            <div class="form-group">
                                <label class="required-label" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo htmlspecialchars($anggota['anggota_tanggal_lahir']); ?>" required>
                            </div>
                            <!-- Golongan Darah -->
                            <div class="form-group">
                                <label class="required-label">Golongan Darah</label>
                                <select class="form-control select2" name="golongan_darah" required>
                                    <option value="" disabled>Pilih Golongan Darah</option>
                                    <?php foreach ($gol_darah as $item) { ?>
                                        <option value="<?= $item['golongan_darah_id'] ?>" <?= $item['golongan_darah_id'] == $anggota['anggota_golongan_darah'] ? 'selected' : '' ?>><?= $item['golongan_darah_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- Tinggi Badan -->
                            <div class="form-group">
                                <label class="required-label">Tinggi Badan (cm)</label>
                                <select name="tinggi_badan" class="form-control select2" required>
                                    <option value="" disabled>Pilih Tinggi Badan</option>
                                    <?php foreach ($tb as $item) { ?>
                                        <option value="<?= $item['tinggi_badan_id'] ?>" <?= $item['tinggi_badan_id'] == $anggota['anggota_tinggi_badan'] ? 'selected' : '' ?>><?= $item['tinggi_badan_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- Berat Badan -->
                            <div class="form-group">
                                <label class="required-label">Berat Badan (kg)</label>
                                <select name="berat_badan" class="form-control select2" required>
                                    <option value="" disabled>Pilih Berat Badan</option>
                                    <?php foreach ($bb as $item) { ?>
                                        <option value="<?= $item['berat_badan_id'] ?>" <?= $item['berat_badan_id'] == $anggota['anggota_berat_badan'] ? 'selected' : '' ?>><?= $item['berat_badan_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- Ayah Kandung -->
                            <div class="form-group">
                                <label class="required-label" for="ayah">Nama Ayah Kandung</label>
                                <input type="text" class="form-control" name="ayah" id="ayah" value="<?php echo htmlspecialchars($anggota['anggota_ayah']); ?>" required>
                            </div>
                            <!-- Ibu Kandung -->
                            <div class="form-group">
                                <label class="required-label" for="ibu">Nama Ibu Kandung</label>
                                <input type="text" class="form-control" name="ibu" id="ibu" value="<?php echo htmlspecialchars($anggota['anggota_ibu']); ?>" required>
                            </div>
                            <!-- Status Pernikahan -->
                            <div class="form-group">
                                <label class="required-label">Status Pernikahan</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_pernikahan'] == '1' ? 'active' : '' ?>">
                                        <input type="radio" name="status_pernikahan" value="1" <?= $anggota['anggota_pernikahan'] == '1' ? 'checked' : '' ?> required> Belum Menikah
                                    </label>
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_pernikahan'] == '2' ? 'active' : '' ?>">
                                        <input type="radio" name="status_pernikahan" value="2" <?= $anggota['anggota_pernikahan'] == '2' ? 'checked' : '' ?> required> Sudah Menikah
                                    </label>
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_pernikahan'] == '3' ? 'active' : '' ?>">
                                        <input type="radio" name="status_pernikahan" value="3" <?= $anggota['anggota_pernikahan'] == '3' ? 'checked' : '' ?> required> Cerai (Mati/Hidup)
                                    </label>
                                </div>
                            </div>
                            <!-- kepemilikan npwp -->
                            <div class="form-group">
                                <label class="required-label">Kepemilikan NPWP</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_npwp'] == '1' ? 'active' : '' ?>">
                                        <input type="radio" name="npwp" value="1" <?= $anggota['anggota_npwp'] == '1' ? 'checked' : '' ?> required> Sudah Memiliki
                                    </label>
                                    <label class="btn btn-outline-secondary <?= $anggota['anggota_npwp'] == '0' ? 'active' : '' ?>">
                                        <input type="radio" name="npwp" value="0" <?= $anggota['anggota_npwp'] == '0' ? 'checked' : '' ?> required> Belum Memiliki
                                    </label>
                                </div>
                            </div>
                            <!-- bpjs kesehatan -->
                            <div class="form-group">
                                <label class="required-label">BPJS Kesehatan</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_bpjs'] == '1' ? 'active' : '' ?>">
                                        <input type="radio" name="bpjs" value="1" <?= $anggota['anggota_bpjs'] == '1' ? 'checked' : '' ?> required> Sudah Memiliki
                                    </label>
                                    <label class="btn btn-outline-secondary <?= $anggota['anggota_bpjs'] == '0' ? 'active' : '' ?>">
                                        <input type="radio" name="bpjs" value="0" <?= $anggota['anggota_bpjs'] == '0' ? 'checked' : '' ?> required> Belum Memiliki
                                    </label>
                                </div>
                            </div>

                            <!-- button -->
                            <button type="button" class="btn btn-primary" onclick="nextStep('dataAnggota', 'dataPekerjaan')">Lanjut</button>
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
                            <!-- Kecamatan -->
                            <div class="form-group">
                                <label class="required-label">Kecamatan</label>
                                <select class="form-control select2" id="edit-kecamatan" name="edit-kecamatan" required>
                                    <option value="" disabled>Pilih Kecamatan</option>
                                    <?php foreach ($kecamatan as $item) { ?>
                                        <option value="<?= $item['districts_id'] ?>" <?= $item['districts_id'] == $anggota['anggota_domisili_kec'] ? 'selected' : '' ?>>
                                            <?= $item['districts_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap pilih Kecamatan.</div>
                            </div>

                            <!-- Desa -->
                            <div class="form-group">
                                <label class="required-label">Desa</label>
                                <select class="form-control select2" id="edit-desa" name="edit-desa" required>
                                    <option value="" disabled selected>Pilih Desa</option>
                                    <?php foreach ($desa as $item) { ?>
                                        <option value="<?= $item['villages_id'] ?>" <?= $item['villages_id'] == $anggota['anggota_domisili_des'] ? 'selected' : '' ?>>
                                            <?= $item['villages_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap pilih Desa.</div>
                            </div>

                            <!-- RT -->
                            <div class="form-group">
                                <label class="required-label" for="rt">RT</label>
                                <select class="form-control select2" id="rt" name="rt" required>
                                    <option value="" disabled selected>Pilih RT</option>
                                    <?php foreach ($rt as $item) { ?>
                                        <option value="<?= $item['rt_id'] ?>" <?= $item['rt_id'] == $anggota['anggota_rt'] ? 'selected' : '' ?>>
                                            <?= $item['rt_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap pilih RT.</div>
                            </div>

                            <!-- RW -->
                            <div class="form-group">
                                <label class="required-label" for="rw">RW</label>
                                <select class="form-control select2" id="rw" name="rw" required>
                                    <option value="" disabled selected>Pilih RW</option>
                                    <?php foreach ($rw as $item) { ?>
                                        <option value="<?= $item['rw_id'] ?>" <?= $item['rw_id'] == $anggota['anggota_rw'] ? 'selected' : '' ?>>
                                            <?= $item['rw_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap pilih RW.</div>
                            </div>

                            <!-- No. Telp / WA -->
                            <div class="form-group">
                                <label class="required-label" for="no_telp">No. Telp / WA</label>
                                <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?php echo htmlspecialchars($anggota['anggota_hp']); ?>" required>
                                <div class="invalid-feedback">Nomor telepon ini sudah terdaftar. Gunakan nomor lain.</div>
                            </div>

                            <!-- Media Sosial: Facebook -->
                            <div class="form-group">
                                <label class="required-label">Akun Facebook</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_fb'] == '1' ? 'active' : '' ?>">
                                        <input type="radio" name="facebook" value="1" <?= $anggota['anggota_fb'] == '1' ? 'checked' : '' ?> required> Punya
                                    </label>
                                    <label class="btn btn-outline-secondary <?= $anggota['anggota_fb'] == '0' ? 'active' : '' ?>">
                                        <input type="radio" name="facebook" value="0" <?= $anggota['anggota_fb'] == '0' ? 'checked' : '' ?> required> Tidak
                                    </label>
                                </div>
                            </div>

                            <!-- Media Sosial: Instagram -->
                            <div class="form-group">
                                <label class="required-label">Akun Instagram</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_ig'] == '1' ? 'active' : '' ?>">
                                        <input type="radio" name="instagram" value="1" <?= $anggota['anggota_ig'] == '1' ? 'checked' : '' ?> required> Punya
                                    </label>
                                    <label class="btn btn-outline-secondary <?= $anggota['anggota_ig'] == '0' ? 'active' : '' ?>">
                                        <input type="radio" name="instagram" value="0" <?= $anggota['anggota_ig'] == '0' ? 'checked' : '' ?> required> Tidak
                                    </label>
                                </div>
                            </div>

                            <!-- Media Sosial: TikTok -->
                            <div class="form-group">
                                <label class="required-label">Akun TikTok</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_tiktok'] == '1' ? 'active' : '' ?>">
                                        <input type="radio" name="tiktok" value="1" <?= $anggota['anggota_tiktok'] == '1' ? 'checked' : '' ?> required> Punya
                                    </label>
                                    <label class="btn btn-outline-secondary <?= $anggota['anggota_tiktok'] == '0' ? 'active' : '' ?>">
                                        <input type="radio" name="tiktok" value="0" <?= $anggota['anggota_tiktok'] == '0' ? 'checked' : '' ?> required> Tidak
                                    </label>
                                </div>
                            </div>

                            <!-- Media Sosial: YouTube -->
                            <div class="form-group">
                                <label class="required-label">Akun YouTube</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_yt'] == '1' ? 'active' : '' ?>">
                                        <input type="radio" name="youtube" value="1" <?= $anggota['anggota_yt'] == '1' ? 'checked' : '' ?> required> Punya
                                    </label>
                                    <label class="btn btn-outline-secondary <?= $anggota['anggota_yt'] == '0' ? 'active' : '' ?>">
                                        <input type="radio" name="youtube" value="0" <?= $anggota['anggota_yt'] == '0' ? 'checked' : '' ?> required> Tidak
                                    </label>
                                </div>
                            </div>

                            <!-- Media Sosial: Twitter -->
                            <div class="form-group">
                                <label class="required-label">Akun Twitter</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_twitter'] == '1' ? 'active' : '' ?>">
                                        <input type="radio" name="twitter" value="1" <?= $anggota['anggota_twitter'] == '1' ? 'checked' : '' ?> required> Punya
                                    </label>
                                    <label class="btn btn-outline-secondary <?= $anggota['anggota_twitter'] == '0' ? 'active' : '' ?>">
                                        <input type="radio" name="twitter" value="0" <?= $anggota['anggota_twitter'] == '0' ? 'checked' : '' ?> required> Tidak
                                    </label>
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary" onclick="prevStep('dataAlamat', 'dataAnggota')">Kembali</button>
                            <button type="button" class="btn btn-primary" onclick="nextStep('dataAlamat', 'dataPekerjaan')">Lanjut</button>
                        </div>
                    </div>
                </div>


                <!-- Step 3: Data Pekerjaan -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header" data-toggle="collapse" data-target="#dataPekerjaan">
                        <h5>3. Data Pekerjaan</h5>
                    </div>
                    <div id="dataPekerjaan" class="collapse">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required-label" for="jenisPekerjaan">Jenis Pekerjaan</label>
                                <select class="form-control select2" id="jenisPekerjaan" name="jenisPekerjaan" required>
                                    <option value="" disabled>Pilih Jenis Pekerjaan</option>
                                    <?php foreach ($pekerjaan as $job) { ?>
                                        <option value="<?= $job['pekerjaan_id'] ?>" <?= $job['pekerjaan_id'] == $anggota['anggota_pekerjaan'] ? 'selected' : '' ?>>
                                            <?= $job['pekerjaan_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap pilih Jenis Pekerjaan.</div>
                            </div>

                            <div id="jobFields" style="display: none;">
                                <div class="form-group">
                                    <label id="pendapatanSuamiLabel">Pendapatan Perbulan</label>
                                    <select name="pendapatanSuami" class="form-control select2" id="pendapatanSuami">
                                        <option value="" disabled>Pilih Pendapatan</option>
                                        <?php foreach ($pendapatan as $item) { ?>
                                            <option value="<?= $item['pendapatan_id'] ?>" <?= $item['pendapatan_id'] == $anggota['anggota_pendapatan'] ? 'selected' : '' ?>>
                                                <?= $item['pendapatan_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">Harap pilih Pendapatan.</div>
                                </div>

                                <div class="form-group">
                                    <label id="sistemKerjaLabel">Sistem Kerja</label>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-primary <?= $anggota['anggota_sistem_kerja'] == 0 ? 'active' : '' ?>">
                                            <input type="radio" name="sistemKerja" value="0" <?= $anggota['anggota_sistem_kerja'] == 0 ? 'checked' : '' ?>> Non Shift
                                        </label>
                                        <label class="btn btn-outline-primary <?= $anggota['anggota_sistem_kerja'] == 1 ? 'active' : '' ?>">
                                            <input type="radio" name="sistemKerja" value="1" <?= $anggota['anggota_sistem_kerja'] == 1 ? 'checked' : '' ?>> Shift
                                        </label>
                                    </div>
                                    <div class="invalid-feedback">Harap pilih Sistem Kerja.</div>
                                </div>

                                <div class="form-group">
                                    <label for="namaInstansi" id="namaInstansiLabel">Nama Instansi / Tempat Bekerja</label>
                                    <input type="text" class="form-control" id="namaInstansi" name="namaInstansi" placeholder="Masukkan Nama Instansi" value="<?php echo htmlspecialchars($anggota['anggota_nama_tempat_kerja']); ?>">
                                    <div class="invalid-feedback">Harap isi Nama Instansi.</div>
                                </div>

                                <div class="form-group">
                                    <label for="alamatInstansi" id="alamatInstansiLabel">Alamat Instansi / Tempat Bekerja</label>
                                    <input type="text" class="form-control" id="alamatInstansi" name="alamatInstansi" placeholder="Masukkan Alamat Instansi" value="<?php echo htmlspecialchars($anggota['anggota_alamat_tempat_kerja']); ?>">
                                    <div class="invalid-feedback">Harap isi Alamat Instansi.</div>
                                </div>
                            </div>

                            <div id="pekerjaanIstriFields" style="display: none;">
                                <div class="form-group">
                                    <label id="pekerjaanIstriLabel" for="jenisPekerjaanIstri">Jenis Pekerjaan Istri</label>
                                    <select class="form-control select2" id="pekerjaanIstri" name="jenisPekerjaanIstri">
                                        <option value="" disabled>Pilih Jenis Pekerjaan</option>
                                        <?php foreach ($pekerjaan as $job) { ?>
                                            <option value="<?= $job['pekerjaan_id'] ?>" <?= $job['pekerjaan_id'] == $anggota['anggota_pekerjaan_istri'] ? 'selected' : '' ?>>
                                                <?= $job['pekerjaan_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">Harap pilih Jenis Pekerjaan.</div>
                                </div>
                            </div>

                            <div id="pendapatanIstriFields" style="display: none;">
                                <div class="form-group">
                                    <label for="pendapatanIstri" id="pendapatanIstriLabel">Pendapatan Perbulan Istri</label>
                                    <select name="pendapatanIstri" class="form-control select2" id="pendapatanIstri">
                                        <option value="" disabled>Pilih Pendapatan</option>
                                        <?php foreach ($pendapatan as $item) { ?>
                                            <option value="<?= $item['pendapatan_id'] ?>" <?= $item['pendapatan_id'] == $anggota['anggota_pendapatan_istri'] ? 'selected' : '' ?>>
                                                <?= $item['pendapatan_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">Harap pilih Pendapatan.</div>
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
                                <label class="required-label" for="pendidikanTerakhir">Pendidikan Terakhir</label>
                                <select class="form-control select2" id="pendidikanTerakhir" name="pendidikanTerakhir" required>
                                    <option value="" disabled>Pilih Pendidikan Terakhir</option>
                                    <?php foreach ($pendidikan as $edu) { ?>
                                        <option value="<?= $edu['pendidikan_id'] ?>"
                                            <?= $edu['pendidikan_id'] == $anggota['anggota_pendidikan'] ? 'selected' : '' ?>>
                                            <?= $edu['pendidikan_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap pilih Pendidikan Terakhir.</div>
                            </div>

                            <!-- Jurusan SMK -->
                            <div id="jurusanSmkField" style="<?= $anggota['anggota_pendidikan'] == '4' ? '' : 'display: none;' ?>">
                                <div class="form-group">
                                    <label id="jurusanSmkLabel">Jurusan SMK</label>
                                    <select name="jurusanSmk" class="form-control select2" id="jurusanSmk">
                                        <option value="" disabled selected>Pilih Jurusan</option>
                                        <?php foreach ($smk as $item) { ?>
                                            <option value="<?= $item['jurusan_smk_id'] ?>"
                                                <?= $item['jurusan_smk_id'] == $anggota['anggota_jurusan_smk'] ? 'selected' : '' ?>>
                                                <?= $item['jurusan_smk_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">Harap pilih Jurusan SMK.</div>
                                </div>
                            </div>

                            <!-- Bidang Studi -->
                            <div id="bidangStudiField" style="<?= in_array($anggota['anggota_pendidikan'], ['5', '6', '7']) ? '' : 'display: none;' ?>">
                                <div class="form-group">
                                    <label id="bidangStudiLabel">Bidang Studi</label>
                                    <select name="bidangStudi" class="form-control select2" id="bidangStudi">
                                        <option value="" disabled selected>Pilih Bidang Studi</option>
                                        <?php foreach ($studi as $item) { ?>
                                            <option value="<?= $item['bidang_studi_id'] ?>"
                                                <?= $item['bidang_studi_id'] == $anggota['anggota_bidang_studi'] ? 'selected' : '' ?>>
                                                <?= $item['bidang_studi_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">Harap pilih Bidang Studi.</div>
                                </div>
                            </div>

                            <!-- Nama Lembaga Pendidikan -->
                            <div class="form-group">
                                <label class="required-label" for="lembagaPendidikan">Nama Lembaga Pendidikan Terakhir</label>
                                <input type="text" class="form-control" id="lembagaPendidikan" name="lembagaPendidikan"
                                    placeholder="Masukkan Nama Lembaga"
                                    value="<?= htmlspecialchars($anggota['anggota_nama_pendidikan']) ?>" required>
                                <div class="invalid-feedback">Harap masukkan Nama Lembaga Pendidikan Terakhir.</div>
                            </div>

                            <!-- Nama Pesantren -->
                            <div class="form-group">
                                <label for="namaPesantren">Nama Pesantren</label>
                                <input type="text" class="form-control" name="namaPesantren" id="namaPesantren"
                                    placeholder="Masukkan Nama Pesantren"
                                    value="<?= htmlspecialchars($anggota['anggota_nama_pesantren']) ?>">
                            </div>

                            <!-- Nama Madrasah Diniyah -->
                            <div class="form-group">
                                <label for="madrasahDiniyah">Nama Madrasah Diniyah</label>
                                <input type="text" class="form-control" name="madrasahDiniyah" id="madrasahDiniyah"
                                    placeholder="Masukkan Nama Madrasah"
                                    value="<?= htmlspecialchars($anggota['anggota_nama_madin']) ?>">
                            </div>
                            <br>

                            <!-- Riwayat Organisasi -->
                            <h6><b>Riwayat Organisasi</b></h6>

                            <div class="form-group">
                                <label class="required-label">IPNU</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_ipnu'] == '1' ? 'active' : '' ?>">
                                        <input type="radio" name="ipnu" value="1" <?= $anggota['anggota_ipnu'] == '1' ? 'checked' : '' ?> required> Pernah
                                    </label>
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_ipnu'] == '0' ? 'active' : '' ?>">
                                        <input type="radio" name="ipnu" value="0" <?= $anggota['anggota_ipnu'] == '0' ? 'checked' : '' ?> required> Tidak Pernah
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="required-label">PMII</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_pmii'] == '1' ? 'active' : '' ?>">
                                        <input type="radio" name="pmii" value="1" <?= $anggota['anggota_pmii'] == '1' ? 'checked' : '' ?> required> Pernah
                                    </label>
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_pmii'] == '0' ? 'active' : '' ?>">
                                        <input type="radio" name="pmii" value="0" <?= $anggota['anggota_pmii'] == '0' ? 'checked' : '' ?> required> Tidak Pernah
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="required-label">DEMA / BEM</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_dema_bem'] == '1' ? 'active' : '' ?>">
                                        <input type="radio" name="dema" value="1" <?= $anggota['anggota_dema_bem'] == '1' ? 'checked' : '' ?> required> Pernah
                                    </label>
                                    <label class="btn btn-outline-primary <?= $anggota['anggota_dema_bem'] == '0' ? 'active' : '' ?>">
                                        <input type="radio" name="dema" value="0" <?= $anggota['anggota_dema_bem'] == '0' ? 'checked' : '' ?> required> Tidak Pernah
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="organisasiLainnya">Organisasi Lainnya</label>
                                <input type="text" class="form-control" id="organisasiLainnya" name="organisasiLainnya"
                                    placeholder="Masukkan Nama Organisasi"
                                    value="<?= htmlspecialchars($anggota['anggota_organisasi_lain']) ?>">
                            </div>

                            <div class="form-group">
                                <label class="required-label" for="afiliasiPartai">Afiliasi Partai Politik Saat Ini</label>
                                <select name="afiliasiPartai" id="afiliasiPartai" class="form-control select2" required>
                                    <option value="" disabled>Pilih Partai</option>
                                    <?php foreach ($partai as $item) { ?>
                                        <option value="<?= $item['partai_id'] ?>"
                                            <?= $item['partai_id'] == $anggota['anggota_parpol'] ? 'selected' : '' ?>>
                                            <?= $item['partai_name'] ?>
                                        </option>
                                    <?php } ?>
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
                                <label for="namaKecamatanRanting">Kecamatan</label>
                                <select class="form-control select2" id="namaKecamatanRanting" name="namaKecamatanRanting">
                                    <option value="">Pilih Kecamatan</option>
                                    <?php foreach ($kecamatan as $item) { ?>
                                        <option value="<?= $item['districts_id'] ?>"
                                            <?= $item['districts_id'] == $anggota['anggota_pr_kec'] ? 'selected' : '' ?>>
                                            <?= $item['districts_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap pilih Kecamatan.</div>
                            </div>
                            <div class="form-group">
                                <label for="namaDesaRanting">Desa</label>
                                <select class="form-control select2" id="namaDesaRanting" name="namaDesaRanting">
                                    <option value="">Pilih Desa</option>
                                    <?php foreach ($desa as $item) { ?>
                                        <option value="<?= $item['villages_id'] ?>"
                                            <?= $item['villages_id'] == $anggota['anggota_pr_des'] ? 'selected' : '' ?>>
                                            <?= $item['villages_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap pilih Desa.</div>
                            </div>
                            <div class="form-group">
                                <label for="jabatanRanting">Jabatan Tertinggi di Ranting</label>
                                <select name="jabatanRanting" class="form-control select2">
                                    <option value="" disabled selected>Pilih Jabatan</option>
                                    <?php foreach ($pr as $item) { ?>
                                        <option value="<?= $item['jabatan_pr_id'] ?>"
                                            <?= $item['jabatan_pr_id'] == $anggota['anggota_pr_jabatan'] ? 'selected' : '' ?>>
                                            <?= $item['jabatan_pr_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="masaRanting">Masa Khidmat di Ranting</label>
                                <select name="masaRanting" class="form-control select2">
                                    <option value="" disabled selected>Pilih Masa</option>
                                    <?php foreach ($masa_khidmat as $item) { ?>
                                        <option value="<?= $item['masa_khidmat_id'] ?>"
                                            <?= $item['masa_khidmat_id'] == $anggota['anggota_pr_mk'] ? 'selected' : '' ?>>
                                            <?= $item['masa_khidmat_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br>

                            <!-- Tingkat Pimpinan Anak Cabang -->
                            <h6>B. Tingkat Pimpinan Anak Cabang (PAC)</h6>
                            <div class="form-group">
                                <label for="kecamatanPAC">Kecamatan (PAC)</label>
                                <select id="kecamatanPAC" name="kecamatanPAC" class="form-control select2">
                                    <option value="" disabled selected>Pilih Kecamatan</option>
                                    <?php foreach ($kecamatan as $item) { ?>
                                        <option value="<?= $item['districts_id'] ?>"
                                            <?= $item['districts_id'] == $anggota['anggota_pac_kec'] ? 'selected' : '' ?>>
                                            <?= $item['districts_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jabatanPAC">Jabatan Tertinggi di PAC</label>
                                <select name="jabatanPAC" class="form-control select2">
                                    <option value="" disabled selected>Pilih Jabatan</option>
                                    <?php foreach ($pac as $item) { ?>
                                        <option value="<?= $item['jabatan_pac_id'] ?>"
                                            <?= $item['jabatan_pac_id'] == $anggota['anggota_pac_jabatan'] ? 'selected' : '' ?>>
                                            <?= $item['jabatan_pac_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="masaPAC">Masa Khidmat di PAC</label>
                                <select name="masaPAC" class="form-control select2">
                                    <option value="" disabled selected>Pilih Masa</option>
                                    <?php foreach ($masa_khidmat as $item) { ?>
                                        <option value="<?= $item['masa_khidmat_id'] ?>"
                                            <?= $item['masa_khidmat_id'] == $anggota['anggota_pac_mk'] ? 'selected' : '' ?>>
                                            <?= $item['masa_khidmat_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br>

                            <!-- Tingkat Pimpinan Cabang -->
                            <h6>C. Tingkat Pimpinan Cabang (PC)</h6>
                            <div class="form-group">
                                <label for="jabatanPC">Jabatan Tertinggi di PC</label>
                                <select name="jabatanPC" class="form-control select2">
                                    <option value="" disabled selected>Pilih Jabatan</option>
                                    <?php foreach ($pc as $item) { ?>
                                        <option value="<?= $item['jabatan_pc_id'] ?>"
                                            <?= $item['jabatan_pc_id'] == $anggota['anggota_pc_jabatan'] ? 'selected' : '' ?>>
                                            <?= $item['jabatan_pc_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="masaPC">Masa Khidmat di PC</label>
                                <select name="masaPC" class="form-control select2">
                                    <option value="" disabled selected>Pilih Masa</option>
                                    <?php foreach ($masa_khidmat as $item) { ?>
                                        <option value="<?= $item['masa_khidmat_id'] ?>"
                                            <?= $item['masa_khidmat_id'] == $anggota['anggota_pc_mk'] ? 'selected' : '' ?>>
                                            <?= $item['masa_khidmat_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
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
                            <!-- A. Pendidikan Kader -->
                            <h5 style="font-weight: bold;">A. Pendidikan Kader</h5>
                            <div class="form-group">
                                <?php
                                $pendidikanKaderItems = ['PKD', 'PKL', 'PKN'];
                                foreach ($pendidikanKaderItems as $item):
                                    $isChecked = isDiklatChecked($item, $riwayat_diklat);
                                    $diklatFile = getDiklatFile($item, $riwayat_diklat);
                                ?>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="icheck-primary d-block">
                                                <input type="checkbox" id="<?= strtolower($item) ?>" name="pendidikanKader[]" value="<?= $item ?>" <?= $isChecked ? 'checked' : '' ?>>
                                                <label for="<?= strtolower($item) ?>"><?= $item ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <?php if ($isChecked && $diklatFile): ?>
                                                <p>
                                                    File saat ini:
                                                    <a href="javascript:void(0);" onclick="previewImage('../file/a.pendidikan_kader/<?= $diklatFile ?>')">
                                                        <?= $diklatFile ?>
                                                    </a>
                                                </p>
                                            <?php endif; ?>

                                            <div class="form-group">
                                                <label>Upload Ulang Sertifikat <?= $item ?> (Opsional)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="<?= strtolower($item) ?>Certificate" name="<?= strtolower($item) ?>Certificate" accept="image/*,application/pdf">
                                                        <label class="custom-file-label" for="<?= strtolower($item) ?>Certificate">Pilih file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <br>

                            <!-- B. Latihan Instruktur -->
                            <h5 style="font-weight: bold;">B. Latihan Instruktur</h6>
                                <div class="form-group">
                                    <?php
                                    $latihanInstrukturItems = ['LI I', 'LI II', 'LI III'];
                                    foreach ($latihanInstrukturItems as $item):
                                        $isChecked = isDiklatChecked($item, $riwayat_diklat);
                                        $diklatFile = getDiklatFile($item, $riwayat_diklat);
                                    ?>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <div class="icheck-primary d-block">
                                                    <input type="checkbox" id="<?= strtolower(str_replace(' ', '_', $item)) ?>" name="latihanInstruktur[]" value="<?= $item ?>" <?= $isChecked ? 'checked' : '' ?>>
                                                    <label for="<?= strtolower(str_replace(' ', '_', $item)) ?>"><?= $item ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <?php if ($isChecked && $diklatFile): ?>
                                                    <p>
                                                        File saat ini:
                                                        <a href="javascript:void(0);" onclick="previewImage('../file/b.instruktur/<?= $diklatFile ?>')">
                                                            <?= $diklatFile ?>
                                                        </a>
                                                    </p>
                                                <?php endif; ?>

                                                <div class="form-group">
                                                    <label>Upload Ulang Sertifikat <?= $item ?> (Opsional)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate" name="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate" accept="image/*,application/pdf">
                                                            <label class="custom-file-label" for="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate">Pilih file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <br>

                                <!-- C. Dirosah -->
                                <h6 style="font-weight: bold;">C. Dirosah</h6>
                                <div class="form-group">
                                    <?php
                                    $dirosahItems = ['Dirosah Ula', 'Dirosah Wustho', 'Dirosah Ulya'];
                                    foreach ($dirosahItems as $item):
                                        $isChecked = isDiklatChecked($item, $riwayat_diklat);
                                        $diklatFile = getDiklatFile($item, $riwayat_diklat);
                                    ?>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <div class="icheck-primary d-block">
                                                    <input type="checkbox" id="<?= strtolower(str_replace(' ', '_', $item)) ?>" name="dirosah[]" value="<?= $item ?>" <?= $isChecked ? 'checked' : '' ?>>
                                                    <label for="<?= strtolower(str_replace(' ', '_', $item)) ?>"><?= $item ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <?php if ($isChecked && $diklatFile): ?>
                                                    <p>
                                                        File saat ini:
                                                        <a href="javascript:void(0);" onclick="previewImage('../file/c.dirosah/<?= $diklatFile ?>')">
                                                            <?= $diklatFile ?>
                                                        </a>
                                                    </p>
                                                <?php endif; ?>

                                                <div class="form-group">
                                                    <label>Upload Ulang Sertifikat <?= $item ?> (Opsional)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate" name="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate" accept="image/*,application/pdf">
                                                            <label class="custom-file-label" for="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate">Pilih file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <br>

                                <!-- D. Pendidikan dan Latihan -->
                                <h6 style="font-weight: bold;">D. Pendidikan dan Latihan</h6>
                                <div class="form-group">
                                    <?php
                                    $pendidikanLatihanItems = ['Diklatsar', 'SUSBALAN', 'SUSBANPIM'];
                                    foreach ($pendidikanLatihanItems as $item):
                                        $isChecked = isDiklatChecked($item, $riwayat_diklat);
                                        $diklatFile = getDiklatFile($item, $riwayat_diklat);
                                    ?>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <div class="icheck-primary d-block">
                                                    <input type="checkbox" id="<?= strtolower(str_replace(' ', '_', $item)) ?>" name="pendidikanLatihan[]" value="<?= $item ?>" <?= $isChecked ? 'checked' : '' ?>>
                                                    <label for="<?= strtolower(str_replace(' ', '_', $item)) ?>"><?= $item ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <?php if ($isChecked && $diklatFile): ?>
                                                    <p>
                                                        File saat ini:
                                                        <a href="javascript:void(0);" onclick="previewImage('../file/d.pendidikan_latihan/<?= $diklatFile ?>')">
                                                            <?= $diklatFile ?>
                                                        </a>
                                                    </p>
                                                <?php endif; ?>

                                                <div class="form-group">
                                                    <label>Upload Ulang Sertifikat <?= $item ?> (Opsional)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate" name="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate" accept="image/*,application/pdf">
                                                            <label class="custom-file-label" for="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate">Pilih file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <br>

                                <!-- E. Kursus Kepelatihan -->
                                <h6 style="font-weight: bold;">E. Kursus Kepelatihan</h6>
                                <div class="form-group">
                                    <?php
                                    $kursusItems = ['SUSPELAT I', 'SUSPELAT II', 'SUSPELAT III'];
                                    foreach ($kursusItems as $item):
                                        $isChecked = isDiklatChecked($item, $riwayat_diklat);
                                        $diklatFile = getDiklatFile($item, $riwayat_diklat);
                                    ?>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <div class="icheck-primary d-block">
                                                    <input type="checkbox" id="<?= strtolower(str_replace(' ', '_', $item)) ?>" name="kursus[]" value="<?= $item ?>" <?= $isChecked ? 'checked' : '' ?>>
                                                    <label for="<?= strtolower(str_replace(' ', '_', $item)) ?>"><?= $item ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <?php if ($isChecked && $diklatFile): ?>
                                                    <p>
                                                        File saat ini:
                                                        <a href="javascript:void(0);" onclick="previewImage('../file/e.kursus/<?= $diklatFile ?>')">
                                                            <?= $diklatFile ?>
                                                        </a>
                                                    </p>
                                                <?php endif; ?>

                                                <div class="form-group">
                                                    <label>Upload Ulang Sertifikat <?= $item ?> (Opsional)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate" name="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate" accept="image/*,application/pdf">
                                                            <label class="custom-file-label" for="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate">Pilih file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <br>

                                <!-- F. Pendidikan dan Latihan Khusus -->
                                <h6 style="font-weight: bold;">F. Pendidikan dan Latihan Khusus</h6>
                                <div class="form-group">
                                    <?php
                                    $pendidikanKhususItems = ['DIKLATSUS BAGANA', 'DIKLATSUS PROTOKOLER', 'DIKLATSUS BALAKAR', 'DIKLATSUS BALANTAS', 'DIKLATSUS BARITIM'];
                                    foreach ($pendidikanKhususItems as $item):
                                        $isChecked = isDiklatChecked($item, $riwayat_diklat);
                                        $diklatFile = getDiklatFile($item, $riwayat_diklat);
                                    ?>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <div class="icheck-primary d-block">
                                                    <input type="checkbox" id="<?= strtolower(str_replace(' ', '_', $item)) ?>" name="pendidikanKhusus[]" value="<?= $item ?>" <?= $isChecked ? 'checked' : '' ?>>
                                                    <label for="<?= strtolower(str_replace(' ', '_', $item)) ?>"><?= $item ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <?php if ($isChecked && $diklatFile): ?>
                                                    <p>
                                                        File saat ini:
                                                        <a href="javascript:void(0);" onclick="previewImage('../file/f.pendidikan_latihan_khusus/<?= $diklatFile ?>')">
                                                            <?= $diklatFile ?>
                                                        </a>
                                                    </p>
                                                <?php endif; ?>

                                                <div class="form-group">
                                                    <label>Upload Ulang Sertifikat <?= $item ?> (Opsional)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate" name="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate" accept="image/*,application/pdf">
                                                            <label class="custom-file-label" for="<?= strtolower(str_replace(' ', '_', $item)) ?>Certificate">Pilih file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                        </div>

                    </div>

                </div>

                <!-- Tombol Simpan dan Navigasi -->
                <div class="mt-4 text-center">
                    <button type="button" class="btn btn-secondary mb-4" onclick="window.history.back()">Kembali</button>
                    <button type="submit" class="btn btn-success mb-4">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </section>
</div>

<!-- Modal untuk preview gambar -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Preview Gambar Sertifikat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalPreviewImage" src="" alt="Gambar Sertifikat" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(imagePath) {
        document.getElementById('modalPreviewImage').src = imagePath;
        $('#previewModal').modal('show');
    }
</script>

<?php require_once '../style/footer.php'; ?>