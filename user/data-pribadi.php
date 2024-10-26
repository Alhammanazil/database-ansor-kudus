<?php
require '../config/config.php';
require '../config/cookies.php';

if (!check_login()) {
    header("Location: ../login.php");
    exit();
}

// Pastikan session 'id' tersedia
if (!isset($_SESSION['id'])) {
    echo "Error: Anda harus login untuk mengakses halaman ini.";
    exit();
}

// Mendapatkan user_id dari session login
$query = "
SELECT 
    a.*, 
    d.districts_name AS kecamatan,
    v.villages_name AS desa,
    rt.rt_name AS rt,
    rw.rw_name AS rw,
    g.golongan_darah_name AS gol_darah,
    p.pernikahan_name AS status_pernikahan,
    tb.tinggi_badan_name AS tinggi_badan,
    bb.berat_badan_name AS berat_badan,
    pe.pekerjaan_name AS pekerjaan,
    pi.pekerjaan_name AS pekerjaan_istri,
    ps.pendapatan_name AS pendapatan,
    pis.pendapatan_name AS pendapatan_istri,
    pt.pendidikan_name AS pendidikan,
    js.jurusan_smk_name AS jurusan_smk,
    bs.bidang_studi_name AS bidang_studi,
    ap.partai_name AS parpol,
    kpr.districts_name AS kecamatan_pr,
    dpr.villages_name AS desa_pr,
    jpr.jabatan_pr_name AS jabatan_pr,
    mpr.masa_khidmat_name AS masa_pr,
    kpac.districts_name AS kecamatan_pac,
    jpac.jabatan_pac_name AS jabatan_pac,
    mpac.masa_khidmat_name AS masa_pac,
    jpc.jabatan_pc_name AS jabatan_pc,
    mpc.masa_khidmat_name AS masa_pc
    
FROM 
    tb_anggota a
LEFT JOIN 
    tb_districts d ON a.anggota_domisili_kec = d.districts_id
LEFT JOIN 
    tb_villages v ON a.anggota_domisili_des = v.villages_id
LEFT JOIN 
    tb_rt rt ON a.anggota_rt = rt.rt_id
LEFT JOIN 
    tb_rw rw ON a.anggota_rw = rw.rw_id
LEFT JOIN 
    tb_golongan_darah g ON a.anggota_golongan_darah = g.golongan_darah_id
LEFT JOIN 
    tb_pernikahan p ON a.anggota_pernikahan = p.pernikahan_id
LEFT JOIN
    tb_tinggi_badan tb ON a.anggota_tinggi_badan = tb.tinggi_badan_id
LEFT JOIN
    tb_berat_badan bb ON a.anggota_berat_badan = bb.berat_badan_id
LEFT JOIN
    tb_pekerjaan pe ON a.anggota_pekerjaan = pe.pekerjaan_id
LEFT JOIN
    tb_pekerjaan pi ON a.anggota_pekerjaan_istri = pi.pekerjaan_id
LEFT JOIN
    tb_pendapatan ps ON a.anggota_pendapatan = ps.pendapatan_id
LEFT JOIN
    tb_pendapatan pis ON a.anggota_pendapatan_istri = pis.pendapatan_id
LEFT JOIN
    tb_pendidikan pt ON a.anggota_pendidikan = pt.pendidikan_id
LEFT JOIN
    tb_jurusan_smk js ON a.anggota_jurusan_smk = js.jurusan_smk_id
LEFT JOIN
    tb_bidang_studi bs ON a.anggota_bidang_studi = bs.bidang_studi_id
LEFT JOIN
    tb_partai ap ON a.anggota_parpol = ap.partai_id
LEFT JOIN
    tb_jabatan_pac jpac ON a.anggota_pac_jabatan = jpac.jabatan_pac_id
LEFT JOIN
    tb_masa_khidmat mpac ON a.anggota_pac_mk = mpac.masa_khidmat_id
LEFT JOIN
    tb_jabatan_pr jpr ON a.anggota_pr_jabatan = jpr.jabatan_pr_id
LEFT JOIN
    tb_masa_khidmat mpr ON a.anggota_pr_mk = mpr.masa_khidmat_id
LEFT JOIN
    tb_jabatan_pc jpc ON a.anggota_pc_jabatan = jpc.jabatan_pc_id
LEFT JOIN
    tb_masa_khidmat mpc ON a.anggota_pc_mk = mpc.masa_khidmat_id
LEFT JOIN
    tb_districts kpr ON a.anggota_pr_kec = kpr.districts_id
LEFT JOIN
    tb_villages dpr ON a.anggota_pr_des = dpr.villages_id
LEFT JOIN
    tb_districts kpac ON a.anggota_pac_kec = kpac.districts_id 
WHERE 
    a.anggota_id = 1;
";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Memeriksa apakah data ditemukan
if (!$data) {
    echo "Data tidak ditemukan.";
    exit();
}

require_once 'header.php';
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
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
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
                            <img src="../assets/photo.jpg" width="150px" class="rounded mb-3" alt="profile">
                            <p><b>Nama</b>: <?php echo htmlspecialchars($data['anggota_nama']); ?></p>
                            <p><b>Tanggal Lahir</b>: <?php echo htmlspecialchars($data['anggota_tanggal_lahir']); ?></p>
                            <p><b>Email</b>: <?php echo htmlspecialchars($data['anggota_email']); ?></p>
                            <p><b>NIK / KK</b>: <?php echo htmlspecialchars($data['anggota_nik']); ?></p>
                            <p><b>Tempat Lahir</b>: <?php echo htmlspecialchars($data['kecamatan']); ?></p>
                            <p><b>Gol. Darah</b>: <?php echo htmlspecialchars($data['gol_darah']); ?></p>
                            <p><b>Tinggi</b>: <?php echo htmlspecialchars($data['tinggi_badan']) . ' cm'; ?></p>
                            <p><b>Berat</b>: <?php echo htmlspecialchars($data['berat_badan']) . ' kg'; ?></p>
                            <p><b>Nama Ayah</b>: <?php echo htmlspecialchars($data['anggota_ayah']); ?></p>
                            <p><b>Nama Ibu</b>: <?php echo htmlspecialchars($data['anggota_ibu']); ?></p>
                            <p><b>Status Pernikahan</b>: <?php echo htmlspecialchars($data['status_pernikahan']); ?></p>
                            <p><b>Kepemilikan NPWP</b>: <?php echo htmlspecialchars($data['anggota_npwp'] == '1' ? '✅' : '-'); ?></p>
                            <p><b>Bpjs Kesehatan</b>: <?php echo htmlspecialchars($data['anggota_bpjs'] == '1' ? '✅' : '-'); ?></p>
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
            <div class="col-md-4 col-sm-12">
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
                            <p><strong>Sistem Kerja:</strong> <?php echo htmlspecialchars($data['anggota_sistem_kerja'] == 0 ? 'Non Shift' : 'Shift'); ?></p>
                            <p><strong>Perusahaan:</strong> <?php echo htmlspecialchars($data['anggota_nama_tempat_kerja']); ?></p>
                            <p><strong>Alamat Perusahaan:</strong> <?php echo htmlspecialchars($data['anggota_alamat_tempat_kerja']); ?></p>
                            <p><strong>Pekerjaan Istri:</strong> <?php echo htmlspecialchars($data['pekerjaan_istri']); ?></p>
                            <p><strong>Pendapatan Suami:</strong> <?php echo htmlspecialchars($data['pendapatan']); ?></p>
                            <p><strong>Pendapatan Istri:</strong> <?php echo htmlspecialchars($data['pendapatan_istri']); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
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
                            <!-- pendidikan terakhir, jurusan smk, bidang studi, nama lembaga pendidikan, nama pesantren, nama madrasah diniyah, ipnu, pmii, dema/bem, organisasi lainnya, afiliasi partai politik -->
                            <p><strong>Pendidikan Terakhir:</strong> <?php echo htmlspecialchars($data['pendidikan']); ?></p>
                            <p><strong>Jurusan SMK:</strong> <?php echo htmlspecialchars($data['jurusan_smk']); ?></p>
                            <p><strong>Bidang Studi:</strong> <?php echo htmlspecialchars($data['bidang_studi']); ?></p>
                            <p><strong>Lembaga Pendidikan:</strong> <?php echo htmlspecialchars($data['anggota_nama_pendidikan']); ?></p>
                            <p><strong>Pesantren:</strong> <?php echo htmlspecialchars($data['anggota_nama_pesantren']); ?></p>
                            <p><strong>MADRASAH DINIYAH:</strong> <?php echo htmlspecialchars($data['anggota_nama_madin']); ?></p>
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
                            <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#dataPelatihan" aria-expanded="false">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div id="dataPelatihan" class="collapse">
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
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>