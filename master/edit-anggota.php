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
            <form action="update-anggota.php" method="POST" enctype="multipart/form-data">
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
                    <div id="dataAlamat" class="collapse show">
                        <div class="card-body">
                            <!-- Kecamatan -->
                            <div class="form-group">
                                <label class="required-label">Kecamatan</label>
                                <select class="form-control" id="edit-kecamatan" name="edit-kecamatan" required>
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
                                <select class="form-control" id="edit-desa" name="edit-desa" required>
                                    <option value="" disabled>Pilih Desa</option>
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
                            <!-- Isi seluruh field untuk Riwayat Pendidikan dan Organisasi sesuai instruksi sebelumnya -->
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
                            <!-- Isi seluruh field untuk Riwayat Kepengurusan di Ansor sesuai instruksi sebelumnya -->
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
                            <!-- Isi seluruh field untuk Riwayat Pelatihan Kaderisasi sesuai instruksi sebelumnya -->
                        </div>
                    </div>
                </div>

                <!-- Tombol Simpan dan Navigasi -->
                <div class="mt-4 text-center">
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </section>
</div>

<?php require_once '../style/footer.php'; ?>