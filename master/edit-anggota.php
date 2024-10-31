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
            <form action="update-anggota.php" method="POST">

                <!-- Step 1: Data Anggota -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header" data-toggle="collapse" data-target="#dataAnggota">
                        <h5>1. Data Anggota</h5>
                    </div>
                    <div id="dataAnggota" class="collapse show">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required-label" for="email">Alamat Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Alamat Email" required>
                                <div class="invalid-feedback">Harap masukkan email yang valid.</div>
                            </div>
                            <div class="form-group">
                                <label class="required-label" for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" required>
                                <div class="invalid-feedback">Harap masukkan Nama Lengkap.</div>
                            </div>
                            <div class="form-group">
                                <label class="required-label" for="nik">No. KTP / NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan No. KTP / NIK" required>
                                <div class="invalid-feedback">Harap masukkan No. KTP / NIK.</div>
                            </div>
                            <div class="form-group">
                                <label class="required-label">Tempat Lahir</label>
                                <select name="tempat_lahir" class="form-control select2" required>
                                    <option value="" disabled selected>Pilih Tempat Lahir</option>
                                    <?php foreach ($kabupaten as $item) { ?>
                                        <option value="<?= $item['regencies_id'] ?>"><?= $item['regencies_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap masukkan Tempat Lahir.</div>
                            </div>
                            <div class="form-group">
                                <label class="required-label" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                                <div class="invalid-feedback">Harap masukkan Tanggal Lahir.</div>
                            </div>
                            <div class="form-group">
                                <label class="required-label">Golongan Darah</label>
                                <select class="form-control select2" name="golongan_darah" required>
                                    <option value="" disabled selected>Pilih Golongan Darah</option>
                                    <?php foreach ($gol_darah as $item) { ?>
                                        <option value="<?= $item['golongan_darah_id'] ?>"><?= $item['golongan_darah_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap pilih Golongan Darah.</div>
                            </div>
                            <div class="form-group">
                                <label class="required-label">Tinggi Badan (cm)</label>
                                <select name="tinggi_badan" class="form-control select2" required>
                                    <option value="" disabled selected>Pilih Tinggi Badan</option>
                                    <?php foreach ($tb as $item) { ?>
                                        <option value="<?= $item['tinggi_badan_id'] ?>"><?= $item['tinggi_badan_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap pilih Tinggi Badan.</div>
                            </div>
                            <div class="form-group">
                                <label class="required-label">Berat Badan (kg)</label>
                                <select name="berat_badan" class="form-control select2" required>
                                    <option value="" disabled selected>Pilih Berat Badan</option>
                                    <?php foreach ($bb as $item) { ?>
                                        <option value="<?= $item['berat_badan_id'] ?>"><?= $item['berat_badan_name'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Harap pilih Berat Badan.</div>
                            </div>
                            <div class="form-group">
                                <label class="required-label" for="ayah">Nama Ayah Kandung</label>
                                <input type="text" class="form-control" name="ayah" id="ayah" placeholder="Masukkan Nama Ayah Kandung" required>
                                <div class="invalid-feedback">Harap masukkan Nama Ayah Kandung.</div>
                            </div>

                            <div class="form-group">
                                <label class="required-label" for="ibu">Nama Ibu Kandung</label>
                                <input type="text" class="form-control" name="ibu" id="ibu" placeholder="Masukkan Nama Ibu Kandung" required>
                                <div class="invalid-feedback">Harap masukkan Nama Ibu Kandung.</div>
                            </div>

                            <!-- Status Pernikahan -->
                            <div class="form-group">
                                <label class="required-label">Status Pernikahan</label>
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
                                    <label id="nama_istriLabel" for="nama_istri">Nama Istri</label>
                                    <input type="text" class="form-control" name="nama_istri" id="nama_istri" placeholder="Masukkan Nama Istri">
                                    <div class="invalid-feedback">Harap masukkan Nama Istri.</div>
                                </div>

                                <!-- Jumlah Anak Laki-laki -->
                                <div class="form-group">
                                    <label id="anak_lakiLabel" for="anak_laki">Jumlah Anak Laki-laki</label>
                                    <input type="number" class="form-control" name="anak_laki" id="anak_laki" placeholder="Masukkan Jumlah Anak Laki-laki">
                                    <div class="invalid-feedback">Harap masukkan Jumlah Anak Laki-laki.</div>
                                </div>

                                <!-- Jumlah Anak Perempuan -->
                                <div class="form-group">
                                    <label id="anak_perempuanLabel" for="anak_perempuan">Jumlah Anak Perempuan</label>
                                    <input type="number" class="form-control" name="anak_perempuan" id="anak_perempuan" placeholder="Masukkan Jumlah Anak Perempuan">
                                    <div class="invalid-feedback">Harap masukkan Jumlah Anak Perempuan.</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="required-label">Kepemilikan NPWP</label>
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
                                <label class="required-label">BPJS Kesehatan</label>
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
                
                <input type="hidden" name="id" value="<?php echo $anggota['anggota_id']; ?>">

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_email']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_nama']); ?>" required>
                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_nik']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_tempat_lahir']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_tanggal_lahir']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Golongan Darah</label>
                    <input type="text" name="golongan_darah" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_golongan_darah']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Tinggi Badan</label>
                    <input type="text" name="tinggi_badan" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_tinggi_badan']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Berat Badan</label>
                    <input type="text" name="berat_badan" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_berat_badan']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Nama Ayah</label>
                    <input type="text" name="ayah" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_ayah']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Nama Ibu</label>
                    <input type="text" name="ibu" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_ibu']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Status Pernikahan</label>
                    <input type="text" name="status_pernikahan" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_pernikahan']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Nama Istri</label>
                    <input type="text" name="nama_istri" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_istri']); ?>">
                </div>

                <div class="form-group">
                    <label>Jumlah Anak Laki-laki</label>
                    <input type="number" name="anak_laki" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_anak_lk']); ?>">
                </div>

                <div class="form-group">
                    <label>Jumlah Anak Perempuan</label>
                    <input type="number" name="anak_perempuan" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_anak_pr']); ?>">
                </div>

                <div class="form-group">
                    <label>NPWP</label>
                    <input type="text" name="npwp" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_npwp']); ?>">
                </div>

                <div class="form-group">
                    <label>BPJS Kesehatan</label>
                    <input type="text" name="bpjs" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_bpjs']); ?>">
                </div>

                <div class="form-group">
                    <label>Alamat (Kecamatan)</label>
                    <input type="text" name="kecamatan" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_domisili_kec']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Alamat (Desa)</label>
                    <input type="text" name="desa" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_domisili_des']); ?>" required>
                </div>

                <div class="form-group">
                    <label>RT</label>
                    <input type="text" name="rt" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_rt']); ?>" required>
                </div>

                <div class="form-group">
                    <label>RW</label>
                    <input type="text" name="rw" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_rw']); ?>" required>
                </div>

                <div class="form-group">
                    <label>No. Telp / WA</label>
                    <input type="text" name="no_telp" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_hp']); ?>" required>
                </div>

                <!-- Media Sosial -->
                <div class="form-group">
                    <label>Akun Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_fb']); ?>">
                </div>

                <div class="form-group">
                    <label>Akun Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_ig']); ?>">
                </div>

                <div class="form-group">
                    <label>Akun TikTok</label>
                    <input type="text" name="tiktok" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_tiktok']); ?>">
                </div>

                <div class="form-group">
                    <label>Akun YouTube</label>
                    <input type="text" name="youtube" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_yt']); ?>">
                </div>

                <div class="form-group">
                    <label>Akun Twitter</label>
                    <input type="text" name="twitter" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_twitter']); ?>">
                </div>

                <!-- Pekerjaan -->
                <div class="form-group">
                    <label>Jenis Pekerjaan</label>
                    <input type="text" name="jenis_pekerjaan" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_pekerjaan']); ?>">
                </div>

                <div class="form-group">
                    <label>Sistem Kerja</label>
                    <input type="text" name="sistem_kerja" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_sistem_kerja']); ?>">
                </div>

                <div class="form-group">
                    <label>Nama Instansi / Tempat Kerja</label>
                    <input type="text" name="nama_instansi" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_nama_tempat_kerja']); ?>">
                </div>

                <div class="form-group">
                    <label>Alamat Instansi / Tempat Kerja</label>
                    <input type="text" name="alamat_instansi" class="form-control" value="<?php echo htmlspecialchars($anggota['anggota_alamat_tempat_kerja']); ?>">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="data-ansor.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </section>
</div>

<?php require_once '../style/footer.php'; ?>