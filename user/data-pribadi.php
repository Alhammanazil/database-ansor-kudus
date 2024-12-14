<?php
require_once '../style/header.php';
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Pribadi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active">Data Pribadi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cards -->
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <!-- Kartu Data Diri -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Diri</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataDiri" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataDiri" class="collapse">
                        <div class="card-body">
                            <?php
                            $fotoFileName = $data['anggota_foto'];
                            $fotoFilePath = "../file/foto/" . $fotoFileName;
                            if ($fotoFileName && file_exists($fotoFilePath)) {
                                echo '<img src="' . $fotoFilePath . '" width="150px" class="rounded mb-3" alt="profile">';
                            } else {
                                echo '<img src="../assets/photo.jpg" width="150px" class="rounded mb-3" alt="profile">';
                            }
                            ?>
                            <p><b>Nama</b>: <?php echo htmlspecialchars($data['anggota_nama']); ?></p>
                            <p><b>Tanggal Lahir</b>: <?php echo htmlspecialchars($data['anggota_tanggal_lahir']); ?></p>
                            <p><b>Email</b>: <?php echo htmlspecialchars($data['anggota_email']); ?></p>
                            <p><b>NIK / KK</b>: <?php echo htmlspecialchars($data['anggota_nik']); ?></p>
                            <p><b>Tempat Lahir</b>: <?php echo htmlspecialchars($data['kabupaten']); ?></p>
                            <p><b>Gol. Darah</b>: <?php echo htmlspecialchars($data['gol_darah']); ?></p>
                            <p><b>Tinggi</b>: <?php echo htmlspecialchars($data['tinggi_badan']) . ' cm'; ?></p>
                            <p><b>Berat</b>: <?php echo htmlspecialchars($data['berat_badan']) . ' kg'; ?></p>
                            <p><b>Nama Ayah</b>: <?php echo htmlspecialchars($data['anggota_ayah']); ?></p>
                            <p><b>Nama Ibu</b>: <?php echo htmlspecialchars($data['anggota_ibu']); ?></p>
                            <p><b>Status Pernikahan</b>: <?php echo htmlspecialchars($data['status_pernikahan']); ?></p>
                            <p><b>KTP</b>:
                                <?php
                                $fotoFileName = $data['anggota_foto_ktp'];
                                if (!empty($fotoFileName)) {
                                    $fotoFilePath = "../file/ktp/" . $fotoFileName;
                                    if (file_exists($fotoFilePath)) {
                                        echo '<br><img src="' . $fotoFilePath . '" width="150px" class="rounded" alt="ktp">';
                                    }
                                } else {
                                    echo '-';
                                }
                                ?>
                            </p>
                            <p><b>NPWP</b>:
                                <?php
                                if ($data['anggota_npwp'] == '1') {
                                    $fotoFileName = $data['anggota_foto_npwp'];
                                    $fotoFilePath = "../file/npwp/" . $fotoFileName;
                                    if ($fotoFileName && file_exists($fotoFilePath)) {
                                        echo '<br><img src="' . $fotoFilePath . '" width="150px" class="rounded" alt="npwp">';
                                    }
                                } else {
                                    echo '-';
                                }
                                ?>
                            </p>
                            <p><b>Bpjs Kesehatan</b>:
                                <?php
                                if ($data['anggota_bpjs'] == '1') {
                                    $fotoFileName = $data['anggota_foto_bpjs'];
                                    $fotoFilePath = "../file/bpjs/" . $fotoFileName;
                                    if ($fotoFileName && file_exists($fotoFilePath)) {
                                        echo '<br><img src="' . $fotoFilePath . '" width="150px" class="rounded" alt="bpjs">';
                                    }
                                } else {
                                    echo '-';
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <!-- Kartu Data Alamat & Media Sosial -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Alamat & Media Sosial</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataAlamat" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataAlamat" class="collapse">
                        <div class="card-body">
                            <p><strong>Kecamatan:</strong> <?php echo htmlspecialchars($data['kecamatan']); ?></p>
                            <p><strong>Desa:</strong> <?php echo htmlspecialchars($data['desa']); ?></p>
                            <p><strong>RT/RW:</strong> <?php echo htmlspecialchars($data['rt']) . '/' . htmlspecialchars($data['rw']); ?></p>
                            <p><strong>Nomor Whatsapp:</strong> <?php echo htmlspecialchars($data['anggota_hp']); ?></p>
                            <p><strong>Facebook:</strong> <?php echo htmlspecialchars($data['anggota_fb'] == 1 ? '✅' : '-'); ?></p>
                            <p><strong>Instagram:</strong> <?php echo htmlspecialchars($data['anggota_ig'] == 1 ? '✅' : '-'); ?></p>
                            <p><strong>Tiktok:</strong> <?php echo htmlspecialchars($data['anggota_tiktok'] == 1 ? '✅' : '-'); ?></p>
                            <p><strong>Youtube:</strong> <?php echo htmlspecialchars($data['anggota_yt'] == 1 ? '✅' : '-'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Sections -->
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <!-- Kartu Data Pekerjaan -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Pekerjaan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataPekerjaan" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataPekerjaan" class="collapse">
                        <div class="card-body">
                            <p><strong>Pekerjaan:</strong> <?php echo htmlspecialchars($data['pekerjaan']); ?></p>
                            <p><strong>Sistem Kerja:</strong> <?php echo htmlspecialchars($data['anggota_sistem_kerja'] === null ? '-' : ($data['anggota_sistem_kerja'] == 0 ? 'Non Shift' : 'Shift')); ?></p>
                            <p><strong>Perusahaan:</strong> <?php echo htmlspecialchars($data['anggota_nama_tempat_kerja'] ?? '-'); ?></p>
                            <p><strong>Alamat Perusahaan:</strong> <?php echo htmlspecialchars($data['anggota_alamat_tempat_kerja'] ?? '-'); ?></p>
                            <p><strong>Pekerjaan Istri:</strong> <?php echo htmlspecialchars($data['pekerjaan_istri'] ?? '-'); ?></p>
                            <p><strong>Pendapatan Suami:</strong> <?php echo htmlspecialchars($data['pendapatan'] ?? '-'); ?></p>
                            <p><strong>Pendapatan Istri:</strong> <?php echo htmlspecialchars($data['pendapatan_istri'] ?? '-'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <!-- Kartu Data Riwayat Pendidikan & Organisasi -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Data Pendidikan & Organisasi</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataPendidikan" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataPendidikan" class="collapse">
                        <div class="card-body">
                            <p><strong>Pendidikan Terakhir:</strong> <?php echo htmlspecialchars($data['pendidikan']); ?></p>
                            <p><strong>Jurusan SMK:</strong> <?php echo htmlspecialchars($data['jurusan_smk'] ?? '-'); ?></p>
                            <p><strong>Bidang Studi:</strong> <?php echo htmlspecialchars($data['bidang_studi'] ?? '-'); ?></p>
                            <p><strong>Lembaga Pendidikan:</strong> <?php echo htmlspecialchars($data['anggota_nama_pendidikan']); ?></p>
                            <p><strong>Pesantren:</strong> <?php echo htmlspecialchars($data['anggota_nama_pesantren'] ?? '-'); ?></p>
                            <p><strong>MADRASAH DINIYAH:</strong> <?php echo htmlspecialchars($data['anggota_nama_madin'] ?? '-'); ?></p>
                            <p><strong>IPNU:</strong> <?php echo htmlspecialchars($data['anggota_ipnu'] == 1 ? '✅' : '-'); ?></p>
                            <p><strong>PMII:</strong> <?php echo htmlspecialchars($data['anggota_pmii'] == 1 ? '✅' : '-'); ?></p>
                            <p><strong>DEMA/BEM:</strong> <?php echo htmlspecialchars($data['anggota_dema_bem'] == 1 ? '✅' : '-'); ?></p>
                            <p><strong>Organisasi Lainnya:</strong> <?php echo htmlspecialchars($data['anggota_organisasi_lain']); ?></p>
                            <p><strong>Afiliasi Partai Politik:</strong> <?php echo htmlspecialchars($data['parpol']); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <!-- Kartu Riwayat Kepengurusan Ansor -->
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Riwayat Kepengurusan Ansor</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataKepengurusan" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataKepengurusan" class="collapse">
                        <div class="card-body">
                            <!-- Informasi Tingkat Pimpinan Rating (PR) -->
                            <p>A. Tingkat Pimpinan Rating (PR)</p>
                            <p><strong>Nama Kecamatan:</strong> <?php echo htmlspecialchars($data['kecamatan_pr']); ?></p>
                            <p><strong>Nama Desa:</strong> <?php echo htmlspecialchars($data['desa_pr']); ?></p>
                            <p><strong>Jabatan Tertinggi:</strong> <?php echo htmlspecialchars($data['jabatan_pr']); ?></p>
                            <p><strong>Masa Khidmat:</strong> <?php echo htmlspecialchars($data['masa_pr']); ?></p>
                            <br>

                            <!-- Informasi Tingkat Pimpinan Anak Cabang (PAC) -->
                            <p>B. Tingkat Pimpinan Anak Cabang (PAC)</p>
                            <p><strong>Nama Kecamatan:</strong> <?php echo htmlspecialchars($data['kecamatan_pac']); ?></p>
                            <p><strong>Jabatan Tertinggi:</strong> <?php echo htmlspecialchars($data['jabatan_pac']); ?></p>
                            <p><strong>Masa Khidmat:</strong> <?php echo htmlspecialchars($data['masa_pac']); ?></p>
                            <br>

                            <!-- Informasi Tingkat Pimpinan Cabang (PC) -->
                            <p>C. Tingkat Pimpinan Cabang (PC)</p>
                            <p><strong>Jabatan Tertinggi:</strong> <?php echo htmlspecialchars($data['jabatan_pc']); ?></p>
                            <p><strong>Masa Khidmat:</strong> <?php echo htmlspecialchars($data['masa_pc']); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Riwayat Pelatihan Kaderisasi -->
            <div class="col-md-4 col-sm-12">
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Riwayat Pelatihan Kaderisasi</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataPelatihan" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataPelatihan" class="collapse">
                        <div class="card-body">
                            <?php foreach ($sections as $section_title => $section_data): ?>
                                <h5><?php echo $section_title; ?></h5>
                                <?php foreach ($trainings as $training): ?>
                                    <?php
                                    // Check if the training item belongs to the current section
                                    if (in_array($training['riwayat_diklat_item'], $section_data['items'])):
                                        $folder = $section_data['folder'];
                                        $filePath = "../file/$folder/" . htmlspecialchars($training['riwayat_diklat_file']);
                                    ?>
                                        <div class="training-item mb-3">
                                            <p><b><?php echo htmlspecialchars($training['riwayat_diklat_item']); ?></b></p>
                                            <?php
                                            if (file_exists($filePath)) {
                                                echo '<img src="' . $filePath . '" width="150px" class="rounded mb-2" alt="' . htmlspecialchars($training['riwayat_diklat_item']) . '">';
                                            } else {
                                                echo '<p>Gambar tidak ditemukan</p>';
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <hr>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Tanda Anggota -->
            <div class="col-md-4 col-sm-12">
                <div class="card card-outline card-primary mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Kartu Tanda Registrasi</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataTanda" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataTanda" class="collapse">
                        <div class="card-body text-center">
                            <?php if ($anggota_id): ?>
                                <img id="memberCardImage" src="../kartu/card.php?id=<?php echo $anggota_id; ?>" alt="Kartu Anggota" class="img-fluid mb-3">
                                <!-- Tombol Download -->
                                <a href="../kartu/card.php?id=<?php echo $anggota_id; ?>&download=true" class="btn btn-primary mt-2">
                                    Download Kartu
                                </a>
                            <?php else: ?>
                                <p>Anda belum login atau ID anggota tidak ditemukan.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php
        require_once '../style/footer.php';
        ?>