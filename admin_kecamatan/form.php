<?php
require_once '../style/header.php';
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 justify-content-center">
            <div class="col-md-11">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Form Pendaftaran</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Admin Kecamatan</a></li>
                                    <li class="breadcrumb-item active">Form Pendaftaran</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Form with step-by-step collapsible cards -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <form id="formPendaftaran" action="../config/pendaftaran.php" method="POST" novalidate>

                            <!-- Step 1: Data Anggota -->
                            <div class="card card-outline card-primary mt-4">
                                <div class="card-header" data-toggle="collapse" data-target="#dataAnggota">
                                    <h5>1. Data Anggota</h5>
                                </div>
                                <div id="dataAnggota" class="collapse show">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="required-label" for="fotoDiri">Foto Diri</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="fotoDiri" id="fotoDiri" accept="image/*" required>
                                                    <label class="custom-file-label" for="fotoDiri">Pilih file</label>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">Harap pilih file foto diri.</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="required-label" for="fotoKTP">Upload Foto KTP</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="fotoKTP" id="fotoKTP" accept="image/*" required>
                                                    <label class="custom-file-label" for="fotoKTP">Pilih file</label>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">Harap pilih file foto KTP.</div>
                                        </div>
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

                                        <!-- NPWP -->
                                        <div class="form-group">
                                            <label class="required-label">Kepemilikan NPWP</label>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="npwp" value="1" required onclick="toggleUploadSection('npwp', true)"> Sudah Memiliki
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                    <input type="radio" name="npwp" value="0" required checked onclick="toggleUploadSection('npwp', false)"> Belum Memiliki
                                                </label>
                                            </div>
                                            <br>

                                            <!-- NPWP Upload -->
                                            <div id="npwpUpload" class="upload-section" style="display: none;">
                                                <label class="required-label" for="npwpFile">Upload Foto NPWP</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="npwpFile" name="npwpFile" accept="image/*">
                                                    <label class="custom-file-label" for="npwpFile">Pilih file</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- BPJS -->
                                        <div class="form-group">
                                            <label class="required-label">BPJS Kesehatan</label>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="bpjs" value="1" required onclick="toggleUploadSection('bpjs', true)"> Sudah Memiliki
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                    <input type="radio" name="bpjs" value="0" required checked onclick="toggleUploadSection('bpjs', false)"> Belum Memiliki
                                                </label>
                                            </div>
                                            <br>

                                            <!-- BPJS Upload -->
                                            <div id="bpjsUpload" class="upload-section" style="display: none;">
                                                <label class="required-label" for="bpjsFile">Upload Foto BPJS</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="bpjsFile" name="bpjsFile" accept="image/*">
                                                    <label class="custom-file-label" for="bpjsFile">Pilih file</label>
                                                </div>
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
                                            <label class="required-label">Kecamatan</label>
                                            <select class="form-control" id="kecamatan" name="kecamatan" required>
                                                <option value="">Pilih Kecamatan</option>
                                            </select>
                                            <div class="invalid-feedback">Harap pilih Kecamatan.</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="required-label">Desa</label>
                                            <select class="form-control" id="desa" name="desa" required>
                                                <option value="">Pilih Desa</option>
                                            </select>
                                            <div class="invalid-feedback">Harap pilih Desa.</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="required-label" for="rt">RT</label>
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
                                            <label class="required-label" for="rw">RW</label>
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
                                            <label class="required-label" for="no_telp">No. Telp / WA</label>
                                            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan No. Telp / WA" required>
                                            <div class="invalid-feedback">Nomor telepon ini sudah terdaftar. Gunakan nomor lain.</div>
                                        </div>

                                        <div class="form-group">
                                            <label class="required-label">Akun Facebook</label>
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
                                            <label class="required-label">Akun Instagram</label>
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
                                            <label class="required-label">Akun TikTok</label>
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
                                            <label class="required-label">Akun YouTube</label>
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
                                            <label class="required-label">Akun Twitter</label>
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
                                            <label class="required-label" for="jenisPekerjaan">Jenis Pekerjaan</label>
                                            <select class="form-control select2" id="jenisPekerjaan" name="jenisPekerjaan" required>
                                                <option value="" disabled selected>Pilih Jenis Pekerjaan</option>
                                                <?php foreach ($pekerjaan as $job) { ?>
                                                    <option value="<?= $job['pekerjaan_id'] ?>">
                                                        <?= $job['pekerjaan_name'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">Harap pilih Jenis Pekerjaan.</div>
                                        </div>

                                        <!-- Fields tambahan yang akan disembunyikan jika tidak bekerja -->
                                        <div id="jobFields" style="display: none;">
                                            <div class="form-group">
                                                <label id="pendapatanSuamiLabel">Pendapatan Perbulan</label>
                                                <select name="pendapatanSuami" class="form-control select2" id="pendapatanSuami">
                                                    <option value="" disabled selected>Pilih Pendapatan</option>
                                                    <?php foreach ($pendapatan as $item) { ?>
                                                        <option value="<?= $item['pendapatan_id'] ?>">
                                                            <?= $item['pendapatan_name'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih Pendapatan.</div>
                                            </div>
                                            <div class="form-group">
                                                <label id="sistemKerjaLabel">Sistem Kerja</label>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="sistemKerja" id="sistemKerja" value="0" autocomplete="off"> Non Shift
                                                    </label>
                                                    <label class="btn btn-outline-primary">
                                                        <input type="radio" name="sistemKerja" id="sistemKerja" value="1" autocomplete="off"> Shift
                                                    </label>
                                                </div>
                                                <div class="invalid-feedback">Harap pilih Sistem Kerja.</div>
                                            </div>

                                            <div class="form-group">
                                                <label for="namaInstansi" id="namaInstansiLabel">Nama Instansi / Tempat Bekerja</label>
                                                <input type="text" class="form-control" id="namaInstansi" name="namaInstansi" placeholder="Masukkan Nama Instansi">
                                                <div class="invalid-feedback">Harap isi Nama Instansi.</div>
                                            </div>

                                            <div class="form-group">
                                                <label for="alamatInstansi" id="alamatInstansiLabel">Alamat Instansi / Tempat Bekerja</label>
                                                <input type="text" class="form-control" id="alamatInstansi" name="alamatInstansi" placeholder="Masukkan Alamat Instansi">
                                            </div>
                                            <div class="invalid-feedback">Harap isi Alamat Instansi.</div>
                                        </div>

                                        <div id="pekerjaanIstriFields" style="display: none;">
                                            <div class="form-group">
                                                <label id="pekerjaanIstriLabel" for="jenisPekerjaanIstri">Jenis Pekerjaan Istri</label>
                                                <select class="form-control select2" id="pekerjaanIstri" name="jenisPekerjaanIstri">
                                                    <option value="" disabled selected>Pilih Jenis Pekerjaan</option>
                                                    <?php foreach ($pekerjaan as $job) { ?>
                                                        <option value="<?= $job['pekerjaan_id'] ?>">
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
                                                    <option value="" disabled selected>Pilih Pendapatan</option>
                                                    <?php foreach ($pendapatan as $item) { ?>
                                                        <option value="<?= $item['pendapatan_id'] ?>">
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
                                                <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                                <?php foreach ($pendidikan as $edu) { ?>
                                                    <option value="<?= $edu['pendidikan_id'] ?>">
                                                        <?= $edu['pendidikan_name'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">Harap pilih Pendidikan Terakhir.</div>
                                        </div>

                                        <!-- Jurusan SMK -->
                                        <div id="jurusanSmkField" style="display: none;">
                                            <div class="form-group">
                                                <label id="jurusanSmkLabel">Jurusan SMK</label>
                                                <select name="jurusanSmk" class="form-control select2" id="jurusanSmk">
                                                    <option value="" disabled selected>Pilih Jurusan</option>
                                                    <?php foreach ($smk as $item) { ?>
                                                        <option value="<?= $item['jurusan_smk_id'] ?>">
                                                            <?= $item['jurusan_smk_name'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <div class="invalid-feedback">Harap pilih Jurusan SMK.</div>
                                            </div>
                                        </div>

                                        <!-- Bidang Studi -->
                                        <div id="bidangStudiField" style="display: none;">
                                            <div class="form-group">
                                                <label id="bidangStudiLabel">Bidang Studi</label>
                                                <select name="bidangStudi" class="form-control select2" id="bidangStudi">
                                                    <option value="" disabled selected>Pilih Bidang Studi</option>
                                                    <?php foreach ($studi as $item) { ?>
                                                        <option value="<?= $item['bidang_studi_id'] ?>">
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
                                            <input type="text" class="form-control" id="lembagaPendidikan" name="lembagaPendidikan" placeholder="Masukkan Nama Lembaga" required>
                                            <div class="invalid-feedback">Harap masukkan Nama Lembaga Pendidikan Terakhir.</div>
                                        </div>

                                        <!-- Nama Pesantren -->
                                        <div class="form-group">
                                            <label for="namaPesantren">Nama Pesantren</label>
                                            <input type="text" class="form-control" name="namaPesantren" id="namaPesantren" placeholder="Masukkan Nama Pesantren">
                                        </div>

                                        <!-- Nama Madrasah Diniyah -->
                                        <div class="form-group">
                                            <label for="madrasahDiniyah">Nama Madrasah Diniyah</label>
                                            <input type="text" class="form-control" name="madrasahDiniyah" id="madrasahDiniyah" placeholder="Masukkan Nama Madrasah">
                                        </div>
                                        <br>

                                        <!-- Riwayat Organisasi -->
                                        <h6><b>Riwayat Organisasi</b></h6>

                                        <div class="form-group">
                                            <label class="required-label">IPNU</label>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="ipnu" value="1" required> Pernah
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="ipnu" value="0" required> Tidak Pernah
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="required-label">PMII</label>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="pmii" value="1" required> Pernah
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="pmii" value="0" required> Tidak Pernah
                                                </label>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="required-label">DEMA / BEM</label>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="dema" value="1" required> Pernah
                                                </label>
                                                <label class="btn btn-outline-primary">
                                                    <input type="radio" name="dema" value="0" required> Tidak Pernah
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="organisasiLainnya">Organisasi Lainnya</label>
                                            <input type="text" class="form-control" id="organisasiLainnya" name="organisasiLainnya" placeholder="Masukkan Nama Organisasi">
                                        </div>

                                        <div class="form-group">
                                            <label class="required-label" for="afiliasiPartai">Afiliasi Partai Politik Saat Ini</label>
                                            <select name="afiliasiPartai" id="afiliasiPartai" class="form-control select2" required>
                                                <!-- ambil data dari tb_partai -->
                                                <option value="" disabled selected>Pilih Partai</option>
                                                <?php foreach ($partai as $item) { ?>
                                                    <option value="<?= $item['partai_id'] ?>">
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
                                            <select class="form-control" id="namaKecamatanRanting" name="namaKecamatanRanting">
                                                <option value="">Pilih Kecamatan</option>
                                            </select>
                                            <div class="invalid-feedback">Harap pilih Kecamatan.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="namaDesaRanting">Desa</label>
                                            <select class="form-control" id="namaDesaRanting" name="namaDesaRanting">
                                                <option value="">Pilih Desa</option>
                                            </select>
                                            <div class="invalid-feedback">Harap pilih Desa.</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatanRanting">Jabatan Tertinggi di Ranting</label>
                                            <select name="jabatanRanting" class="form-control select2">
                                                <option value="" disabled selected>Pilih Jabatan</option>
                                                <?php foreach ($pr as $item) { ?>
                                                    <option value="<?= $item['jabatan_pr_id'] ?>">
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
                                                    <option value="<?= $item['masa_khidmat_id'] ?>">
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
                                                    <option value="<?= $item['districts_id'] ?>">
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
                                                    <option value="<?= $item['jabatan_pac_id'] ?>">
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
                                                    <option value="<?= $item['masa_khidmat_id'] ?>">
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
                                                    <option value="<?= $item['jabatan_pc_id'] ?>">
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
                                                    <option value="<?= $item['masa_khidmat_id'] ?>">
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

                                        <div class="row align-items-center">
                                            <!-- A. Pendidikan Kader -->
                                            <div class="col-md-6">
                                                <h6>A. Pendidikan Kader</h6>
                                                <div class="form-group">
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="pkd" name="pendidikanKader[]" value="PKD">
                                                        <label for="pkd">PKD</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="pkl" name="pendidikanKader[]" value="PKL">
                                                        <label for="pkl">PKL</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="pkn" name="pendidikanKader[]" value="PKN">
                                                        <label for="pkn">PKN</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Upload Sertifikat -->
                                            <div class="col-md-6">
                                                <div id="pkdUpload" class="upload-section pendidikanKader" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat PKD</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="pkdCertificate" name="pkdCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="pkdCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="pklUpload" class="upload-section pendidikanKader" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat PKL</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="pklCertificate" name="pklCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="pklCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="pknUpload" class="upload-section pendidikanKader" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat PKN</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="pknCertificate" name="pknCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="pknCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row" id="latihanInstrukturSection" style="display: none;">
                                            <!-- B. Latihan Instruktur -->
                                            <div class="col-md-6">
                                                <h6>B. Latihan Instruktur</h6>
                                                <div class="form-group">
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="li1" name="instruktur[]" value="LI I" onchange="toggleUploadInstruktur()">
                                                        <label for="li1">LI I</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="li2" name="instruktur[]" value="LI II" onchange="toggleUploadInstruktur()">
                                                        <label for="li2">LI II</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="li3" name="instruktur[]" value="LI III" onchange="toggleUploadInstruktur()">
                                                        <label for="li3">LI III</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Upload Sertifikat untuk Latihan Instruktur -->
                                            <div class="col-md-6">
                                                <div id="li1Upload" class="upload-section instruktur" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat LI I</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="li1Certificate" name="li1Certificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="li1Certificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="li2Upload" class="upload-section instruktur" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat LI II</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="li2Certificate" name="li2Certificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="li2Certificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="li3Upload" class="upload-section instruktur" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat LI III</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="li3Certificate" name="li3Certificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="li3Certificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row" id="dirosahPendidikanLatihanSection" style="display: none;">
                                            <!-- C. Dirosah -->
                                            <div class="col-md-6">
                                                <h6>C. Dirosah</h6>
                                                <div class="form-group">
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="dirosahUla" name="dirosah[]" value="Dirosah Ula" onchange="toggleUploadDirosah()">
                                                        <label for="dirosahUla">Dirosah Ula</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="dirosahWustho" name="dirosah[]" value="Dirosah Wustho" onchange="toggleUploadDirosah()">
                                                        <label for="dirosahWustho">Dirosah Wustho</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="dirosahUlya" name="dirosah[]" value="Dirosah Ulya" onchange="toggleUploadDirosah()">
                                                        <label for="dirosahUlya">Dirosah Ulya</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Upload Sertifikat untuk Dirosah -->
                                            <div class="col-md-6">
                                                <div id="dirosahUlaUpload" class="upload-section dirosah" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat Dirosah Ula</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="dirosahUlaCertificate" name="dirosahulaCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="dirosahUlaCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="dirosahWusthoUpload" class="upload-section dirosah" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat Dirosah Wustho</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="dirosahWusthoCertificate" name="dirosahwusthoCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="dirosahWusthoCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="dirosahUlyaUpload" class="upload-section dirosah" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat Dirosah Ulya</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="dirosahUlyaCertificate" name="dirosahulyaCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="dirosahUlyaCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row" id="diklatsarPendidikanLatihanSection" style="display: none;">
                                            <!-- D. Pendidikan & Latihan -->
                                            <div class="col-md-6">
                                                <h6>D. Pendidikan & Latihan</h6>
                                                <div class="form-group">
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="diklatsar" name="pendidikanLatihan[]" value="Diklatsar" onchange="toggleUploadLatihan()">
                                                        <label for="diklatsar">Diklatsar</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="susbalan" name="pendidikanLatihan[]" value="SUSBALAN" onchange="toggleUploadLatihan()">
                                                        <label for="susbalan">SUSBALAN</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="susbanpim" name="pendidikanLatihan[]" value="SUSBANPIM" onchange="toggleUploadLatihan()">
                                                        <label for="susbanpim">SUSBANPIM</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Upload Sertifikat untuk Pendidikan & Latihan -->
                                            <div class="col-md-6">
                                                <div id="diklatsarUpload" class="upload-section pendidikanLatihan" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat Diklatsar</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="diklatsarCertificate" name="diklatsarCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="diklatsarCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="susbalanUpload" class="upload-section pendidikanLatihan" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat SUSBALAN</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="susbalanCertificate" name="susbalanCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="susbalanCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="susbanpimUpload" class="upload-section pendidikanLatihan" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat SUSBANPIM</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="susbanpimCertificate" name="susbanpimCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="susbanpimCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row" id="kursusKepelatihanSection" style="display: none;">
                                            <!-- E. Kursus Kepelatihan -->
                                            <div class="col-md-6">
                                                <h6>E. Kursus Kepelatihan</h6>
                                                <div class="form-group">
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="suspelat1" name="kursus[]" value="SUSPELAT I" onchange="toggleUploadKursus()">
                                                        <label for="suspelat1">SUSPELAT I</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="suspelat2" name="kursus[]" value="SUSPELAT II" onchange="toggleUploadKursus()">
                                                        <label for="suspelat2">SUSPELAT II</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="suspelat3" name="kursus[]" value="SUSPELAT III" onchange="toggleUploadKursus()">
                                                        <label for="suspelat3">SUSPELAT III</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Upload Sertifikat untuk Kursus Kepelatihan -->
                                            <div class="col-md-6">
                                                <div id="suspelat1Upload" class="upload-section kursus" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat SUSPELAT I</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="suspelat1Certificate" name="suspelat1Certificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="suspelat1Certificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="suspelat2Upload" class="upload-section kursus" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat SUSPELAT II</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="suspelat2Certificate" name="suspelat2Certificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="suspelat2Certificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="suspelat3Upload" class="upload-section kursus" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat SUSPELAT III</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="suspelat3Certificate" name="suspelat3Certificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="suspelat3Certificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row" id="pendidikanLatihanKhususSection" style="display: none;">
                                            <!-- F. Pendidikan & Latihan Khusus -->
                                            <div class="col-md-6">
                                                <h6>F. Pendidikan & Latihan Khusus</h6>
                                                <div class="form-group">
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="diklatsusBagana" name="latihanKhusus[]" value="DIKLATSUS BAGANA" onchange="toggleUpload('latihanKhusus')">
                                                        <label for="diklatsusBagana">DIKLATSUS BAGANA</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="diklatsusProtokoler" name="latihanKhusus[]" value="DIKLATSUS PROTOKOLER" onchange="toggleUpload('latihanKhusus')">
                                                        <label for="diklatsusProtokoler">DIKLATSUS PROTOKOLER</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="diklatsusBalakar" name="latihanKhusus[]" value="DIKLATSUS BALAKAR" onchange="toggleUpload('latihanKhusus')">
                                                        <label for="diklatsusBalakar">DIKLATSUS BALAKAR</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="diklatsusBalantas" name="latihanKhusus[]" value="DIKLATSUS BALANTAS" onchange="toggleUpload('latihanKhusus')">
                                                        <label for="diklatsusBalantas">DIKLATSUS BALANTAS</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="diklatsusBaritim" name="latihanKhusus[]" value="DIKLATSUS BARITIM" onchange="toggleUpload('latihanKhusus')">
                                                        <label for="diklatsusBaritim">DIKLATSUS BARITIM</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="diklatsusDensus" name="latihanKhusus[]" value="DIKLATSUS DENSUS 99" onchange="toggleUpload('latihanKhusus')">
                                                        <label for="diklatsusDensus">DIKLATSUS DENSUS 99</label>
                                                    </div>
                                                    <div class="icheck-primary d-block">
                                                        <input type="checkbox" id="diklatsusProvost" name="latihanKhusus[]" value="DIKLATSUS PROVOST" onchange="toggleUpload('latihanKhusus')">
                                                        <label for="diklatsusProvost">DIKLATSUS PROVOST</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Upload Sertifikat untuk Pendidikan & Latihan Khusus -->
                                            <div class="col-md-6">
                                                <!-- Upload Section for DIKLATSUS BAGANA -->
                                                <div id="diklatsusBaganaUpload" class="upload-section latihanKhusus" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat DIKLATSUS BAGANA</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="diklatsusBaganaCertificate" name="diklatsusbaganaCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="diklatsusBaganaCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Upload Section for DIKLATSUS PROTOKOLER -->
                                                <div id="diklatsusProtokolerUpload" class="upload-section latihanKhusus" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat DIKLATSUS PROTOKOLER</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="diklatsusProtokolerCertificate" name="diklatsusprotokolerCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="diklatsusProtokolerCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Upload Section for DIKLATSUS BALAKAR -->
                                                <div id="diklatsusBalakarUpload" class="upload-section latihanKhusus" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat DIKLATSUS BALAKAR</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="diklatsusBalakarCertificate" name="diklatsusbalakarCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="diklatsusBalakarCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Upload Section for DIKLATSUS BALANTAS -->
                                                <div id="diklatsusBalantasUpload" class="upload-section latihanKhusus" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat DIKLATSUS BALANTAS</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="diklatsusBalantasCertificate" name="diklatsusbalantasCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="diklatsusBalantasCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Upload Section for DIKLATSUS BARITIM -->
                                                <div id="diklatsusBaritimUpload" class="upload-section latihanKhusus" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat DIKLATSUS BARITIM</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="diklatsusBaritimCertificate" name="diklatsusbaritimCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="diklatsusBaritimCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Upload Section for DIKLATSUS DENSUS 99 -->
                                                <div id="diklatsusDensusUpload" class="upload-section latihanKhusus" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat DIKLATSUS DENSUS 99</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="diklatsusDensusCertificate" name="diklatsusdensusCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="diklatsusDensusCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Upload Section for DIKLATSUS PROVOST -->
                                                <div id="diklatsusProvostUpload" class="upload-section latihanKhusus" style="display: none;">
                                                    <div class="form-group">
                                                        <label>Upload Sertifikat DIKLATSUS PROVOST</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="diklatsusProvostCertificate" name="diklatsusprovostCertificate" accept="image/*,application/pdf">
                                                                <label class="custom-file-label" for="diklatsusProvostCertificate">Pilih file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <button type="button" class="btn btn-secondary" onclick="prevStep('dataPelatihanKaderisasi', 'dataKepengurusan')">Kembali</button>
                                        <button type="submit" class="btn btn-success">Selesai</button>
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

<?php
require_once '../style/footer.php';
?>