-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Nov 2024 pada 05.48
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ansor_kudus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `anggota_id` int(11) NOT NULL,
  `anggota_foto` varchar(225) NOT NULL,
  `anggota_email` varchar(64) NOT NULL,
  `anggota_nama` varchar(256) NOT NULL,
  `anggota_nik` varchar(16) NOT NULL,
  `anggota_tempat_lahir` int(11) NOT NULL,
  `anggota_tanggal_lahir` date NOT NULL,
  `anggota_golongan_darah` int(11) NOT NULL,
  `anggota_tinggi_badan` int(11) NOT NULL,
  `anggota_berat_badan` int(11) NOT NULL,
  `anggota_ayah` varchar(128) NOT NULL,
  `anggota_ibu` varchar(128) NOT NULL,
  `anggota_pernikahan` int(11) NOT NULL,
  `anggota_istri` varchar(128) DEFAULT NULL,
  `anggota_anak_lk` int(11) DEFAULT NULL,
  `anggota_anak_pr` int(11) DEFAULT NULL,
  `anggota_npwp` int(11) NOT NULL,
  `anggota_foto_npwp` varchar(225) NOT NULL,
  `anggota_bpjs` int(11) NOT NULL,
  `anggota_foto_bpjs` varchar(225) NOT NULL,
  `anggota_domisili_kec` int(11) NOT NULL,
  `anggota_domisili_des` bigint(11) NOT NULL,
  `anggota_rt` int(11) NOT NULL,
  `anggota_rw` int(11) NOT NULL,
  `anggota_hp` varchar(16) NOT NULL,
  `anggota_fb` int(11) NOT NULL,
  `anggota_ig` int(11) NOT NULL,
  `anggota_tiktok` int(11) NOT NULL,
  `anggota_yt` int(11) NOT NULL,
  `anggota_twitter` int(11) NOT NULL,
  `anggota_pekerjaan` int(11) NOT NULL,
  `anggota_sistem_kerja` int(11) DEFAULT NULL,
  `anggota_nama_tempat_kerja` varchar(255) DEFAULT NULL,
  `anggota_alamat_tempat_kerja` varchar(255) DEFAULT NULL,
  `anggota_pekerjaan_istri` int(11) DEFAULT NULL,
  `anggota_pendapatan` int(11) DEFAULT NULL,
  `anggota_pendapatan_istri` int(11) DEFAULT NULL,
  `anggota_pendidikan` int(11) NOT NULL,
  `anggota_jurusan_smk` int(11) DEFAULT NULL,
  `anggota_bidang_studi` int(11) DEFAULT NULL,
  `anggota_nama_pendidikan` varchar(255) NOT NULL,
  `anggota_nama_pesantren` varchar(255) DEFAULT NULL,
  `anggota_nama_madin` varchar(255) DEFAULT NULL,
  `anggota_ipnu` int(11) NOT NULL,
  `anggota_pmii` int(11) NOT NULL,
  `anggota_dema_bem` int(11) NOT NULL,
  `anggota_organisasi_lain` varchar(255) DEFAULT NULL,
  `anggota_parpol` int(11) NOT NULL,
  `anggota_pr_kec` int(11) DEFAULT NULL,
  `anggota_pr_des` bigint(11) DEFAULT NULL,
  `anggota_pr_jabatan` int(11) DEFAULT NULL,
  `anggota_pr_mk` int(11) DEFAULT NULL,
  `anggota_pac_kec` int(11) DEFAULT NULL,
  `anggota_pac_jabatan` int(11) DEFAULT NULL,
  `anggota_pac_mk` int(11) DEFAULT NULL,
  `anggota_pc_jabatan` int(11) DEFAULT NULL,
  `anggota_pc_mk` int(11) DEFAULT NULL,
  `anggota_no_registrasi` varchar(64) NOT NULL,
  `anggota_keanggotaan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`anggota_id`, `anggota_foto`, `anggota_email`, `anggota_nama`, `anggota_nik`, `anggota_tempat_lahir`, `anggota_tanggal_lahir`, `anggota_golongan_darah`, `anggota_tinggi_badan`, `anggota_berat_badan`, `anggota_ayah`, `anggota_ibu`, `anggota_pernikahan`, `anggota_istri`, `anggota_anak_lk`, `anggota_anak_pr`, `anggota_npwp`, `anggota_foto_npwp`, `anggota_bpjs`, `anggota_foto_bpjs`, `anggota_domisili_kec`, `anggota_domisili_des`, `anggota_rt`, `anggota_rw`, `anggota_hp`, `anggota_fb`, `anggota_ig`, `anggota_tiktok`, `anggota_yt`, `anggota_twitter`, `anggota_pekerjaan`, `anggota_sistem_kerja`, `anggota_nama_tempat_kerja`, `anggota_alamat_tempat_kerja`, `anggota_pekerjaan_istri`, `anggota_pendapatan`, `anggota_pendapatan_istri`, `anggota_pendidikan`, `anggota_jurusan_smk`, `anggota_bidang_studi`, `anggota_nama_pendidikan`, `anggota_nama_pesantren`, `anggota_nama_madin`, `anggota_ipnu`, `anggota_pmii`, `anggota_dema_bem`, `anggota_organisasi_lain`, `anggota_parpol`, `anggota_pr_kec`, `anggota_pr_des`, `anggota_pr_jabatan`, `anggota_pr_mk`, `anggota_pac_kec`, `anggota_pac_jabatan`, `anggota_pac_mk`, `anggota_pc_jabatan`, `anggota_pc_mk`, `anggota_no_registrasi`, `anggota_keanggotaan`) VALUES
(1, 'fotodiri-1-2105.png', 'test@gmail.com', 'test', '3319030382103820', 1101, '2024-11-01', 1, 1, 1, 'Test', 'Test', 1, '', 0, 0, 1, 'npwp-1-1630.jpg', 1, 'bpjs-1-1403.jpg', 3319030, 3319030005, 1, 1, '08988335639', 0, 0, 0, 0, 0, 21, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Test', NULL, NULL, 0, 0, 0, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(2, 'fotodiri-2-4013.png', 'test@gmail.com', 'test', '3319030382103820', 1101, '2024-11-01', 1, 1, 1, 'Test', 'Test', 1, '', 0, 0, 1, 'npwp-2-6992.jpg', 1, 'bpjs-2-3661.jpg', 3319030, 3319030005, 1, 1, '089883356399', 0, 0, 0, 0, 0, 21, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Test', NULL, NULL, 0, 0, 0, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berat_badan`
--

CREATE TABLE `tb_berat_badan` (
  `berat_badan_id` int(11) NOT NULL,
  `berat_badan_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_berat_badan`
--

INSERT INTO `tb_berat_badan` (`berat_badan_id`, `berat_badan_name`) VALUES
(1, 'Di bawah 40'),
(2, '40 - 60'),
(3, '61 - 70'),
(4, 'Di atas 71');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bidang_studi`
--

CREATE TABLE `tb_bidang_studi` (
  `bidang_studi_id` int(11) NOT NULL,
  `bidang_studi_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_bidang_studi`
--

INSERT INTO `tb_bidang_studi` (`bidang_studi_id`, `bidang_studi_name`) VALUES
(1, 'PENDIDIKAN AGAMA'),
(2, 'EKONOMI & BISNIS'),
(3, 'SOSIAL, HUKUM, & POLITIK'),
(4, 'KOMUNIKASI & PSIKOLOGI'),
(5, 'KOMPUTER & INFORMATIKA'),
(6, 'MESIN & INDUSTRI'),
(7, 'KEDOKTERAN & KESEHATAN'),
(8, 'PARIWISATA & PERHOTELAN'),
(9, 'PERTANIAN, PETERNAKAN & PERIKANAN'),
(10, 'KEDINASAN'),
(11, 'SCIENCE, KIMIA & MATEMATIKA'),
(12, 'SIPIL & BANGUNAN'),
(13, 'LAINNYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_districts`
--

CREATE TABLE `tb_districts` (
  `districts_id` int(11) NOT NULL,
  `districts_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_districts`
--

INSERT INTO `tb_districts` (`districts_id`, `districts_name`) VALUES
(3319010, 'Kaliwungu'),
(3319020, 'Kota Kudus'),
(3319030, 'Jati'),
(3319040, 'Undaan'),
(3319050, 'Mejobo'),
(3319060, 'Jekulo'),
(3319070, 'Bae'),
(3319080, 'Gebog'),
(3319090, 'Dawe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_golongan_darah`
--

CREATE TABLE `tb_golongan_darah` (
  `golongan_darah_id` int(11) NOT NULL,
  `golongan_darah_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_golongan_darah`
--

INSERT INTO `tb_golongan_darah` (`golongan_darah_id`, `golongan_darah_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'AB'),
(4, 'O'),
(5, 'Tidak Tahu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan_pac`
--

CREATE TABLE `tb_jabatan_pac` (
  `jabatan_pac_id` int(11) NOT NULL,
  `jabatan_pac_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jabatan_pac`
--

INSERT INTO `tb_jabatan_pac` (`jabatan_pac_id`, `jabatan_pac_name`) VALUES
(1, 'Ketua PAC'),
(2, 'Ketua Rijalul Ansor'),
(3, 'Kasatkoryon Banser'),
(4, 'Wakil Ketua / Kepala'),
(5, 'Sekretaris'),
(6, 'Wakil Sekretaris'),
(7, 'Bendahara'),
(8, 'Wakil Bendahara'),
(9, 'Koordinator Departemen / Biro / Unit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan_pc`
--

CREATE TABLE `tb_jabatan_pc` (
  `jabatan_pc_id` int(11) NOT NULL,
  `jabatan_pc_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jabatan_pc`
--

INSERT INTO `tb_jabatan_pc` (`jabatan_pc_id`, `jabatan_pc_name`) VALUES
(1, 'Ketua PC'),
(2, 'Ketua Rijalul Ansor'),
(3, 'Kasatkorcab Banser'),
(4, 'Wakil Ketua / Kepala'),
(5, 'Sekretaris'),
(6, 'Wakil Sekretaris'),
(7, 'Bendahara'),
(8, 'Wakil Bendahara'),
(9, 'Kepala Satuan / Corp'),
(10, 'Koordinator Departemen / Biro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan_pr`
--

CREATE TABLE `tb_jabatan_pr` (
  `jabatan_pr_id` int(11) NOT NULL,
  `jabatan_pr_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jabatan_pr`
--

INSERT INTO `tb_jabatan_pr` (`jabatan_pr_id`, `jabatan_pr_name`) VALUES
(1, 'Ketua Ranting'),
(2, 'Ketua Rijalul Ansor'),
(3, 'Kasatkorkel Banser'),
(4, 'Wakil Ketua / Kepala'),
(5, 'Sekretaris'),
(6, 'Wakil Sekretaris'),
(7, 'Bendahara'),
(8, 'Wakil Bendahara'),
(9, 'Koordinator Departemen / Biro / Unit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan_smk`
--

CREATE TABLE `tb_jurusan_smk` (
  `jurusan_smk_id` int(11) NOT NULL,
  `jurusan_smk_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jurusan_smk`
--

INSERT INTO `tb_jurusan_smk` (`jurusan_smk_id`, `jurusan_smk_name`) VALUES
(1, 'Administrasi & Akutansi'),
(2, 'Bisnis dan Pemasaran'),
(3, 'Desain Grafis/Multimedia'),
(4, 'Keperawatan & Farmasi'),
(5, 'Pariwisata & Perhotelan'),
(6, 'Pelayaran'),
(7, 'Mesin Industri'),
(8, 'Kendaraan & Otomotif'),
(9, 'Komputer & Elektronika'),
(10, 'Rekayasa Perangkat Lunak'),
(11, 'Bangunan'),
(12, 'Tata Rias & Busana'),
(13, 'Tata Boga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masa_khidmat`
--

CREATE TABLE `tb_masa_khidmat` (
  `masa_khidmat_id` int(11) NOT NULL,
  `masa_khidmat_name` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_masa_khidmat`
--

INSERT INTO `tb_masa_khidmat` (`masa_khidmat_id`, `masa_khidmat_name`) VALUES
(1, '2015'),
(2, '2016'),
(3, '2017'),
(4, '2018'),
(5, '2019'),
(6, '2020'),
(7, '2021'),
(8, '2022'),
(9, '2023'),
(10, '2024'),
(11, '2025');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_partai`
--

CREATE TABLE `tb_partai` (
  `partai_id` int(11) NOT NULL,
  `partai_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_partai`
--

INSERT INTO `tb_partai` (`partai_id`, `partai_name`) VALUES
(1, 'PKB'),
(2, 'Gerindra'),
(3, 'PDIP'),
(4, 'Golkar'),
(5, 'Nasdem'),
(6, 'Demokrat'),
(7, 'PAN'),
(8, 'PKS'),
(9, 'PPP'),
(10, 'PSI'),
(11, 'Hanura'),
(12, 'Partai Lain'),
(13, 'TIDAK BERAFILIASI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `pekerjaan_id` int(11) NOT NULL,
  `pekerjaan_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`pekerjaan_id`, `pekerjaan_name`) VALUES
(1, 'PEDAGANG'),
(2, 'KONTRAKTOR'),
(3, 'GURU'),
(4, 'DOSEN'),
(5, 'DOKTER'),
(6, 'BIDANG KESEHATAN'),
(7, 'BIDANG HUKUM'),
(8, 'BIDANG TEKNOLOGI'),
(9, 'BIDANG DESAIN GRAFIS'),
(10, 'BIDANG FOTOGRAFI'),
(11, 'BIDANG KULINER'),
(12, 'BIDANG FASHION'),
(13, 'BIDANG PERTANIAN'),
(14, 'BIDANG PETERNAKAN'),
(15, 'BIDANG PERIKANAN'),
(16, 'EVENT ORGANIZER'),
(17, 'WARTAWAN'),
(18, 'PNS'),
(19, 'PEGAWAI SWASTA'),
(20, 'BURUH / SERABUTAN'),
(21, 'TIDAK BEKERJA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendapatan`
--

CREATE TABLE `tb_pendapatan` (
  `pendapatan_id` int(11) NOT NULL,
  `pendapatan_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pendapatan`
--

INSERT INTO `tb_pendapatan` (`pendapatan_id`, `pendapatan_name`) VALUES
(0, ''),
(1, 'kurang dari 3 juta'),
(2, '3 juta - 5 juta'),
(3, '5 juta - 10 juta'),
(4, 'di atas 10 juta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `pendidikan_id` int(11) NOT NULL,
  `pendidikan_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`pendidikan_id`, `pendidikan_name`) VALUES
(1, 'SD/MI'),
(2, 'SMP/MTS'),
(3, 'SMA/MA'),
(4, 'SMK'),
(5, 'S1'),
(6, 'S2'),
(7, 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pernikahan`
--

CREATE TABLE `tb_pernikahan` (
  `pernikahan_id` int(11) NOT NULL,
  `pernikahan_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pernikahan`
--

INSERT INTO `tb_pernikahan` (`pernikahan_id`, `pernikahan_name`) VALUES
(1, 'BELUM MENIKAH'),
(2, 'MENIKAH'),
(3, 'CERAI (MATI/HIDUP)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_regencies`
--

CREATE TABLE `tb_regencies` (
  `regencies_id` int(11) NOT NULL,
  `regencies_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_regencies`
--

INSERT INTO `tb_regencies` (`regencies_id`, `regencies_name`) VALUES
(1101, 'ACEH SELATAN'),
(1102, 'ACEH TENGGARA'),
(1103, 'ACEH TIMUR'),
(1104, 'ACEH TENGAH'),
(1105, 'ACEH BARAT'),
(1106, 'ACEH BESAR'),
(1107, 'PIDIE'),
(1108, 'ACEH UTARA'),
(1109, 'SIMEULUE'),
(1110, 'ACEH SINGKIL'),
(1111, 'BIREUEN'),
(1112, 'ACEH BARAT DAYA'),
(1113, 'GAYO LUES'),
(1114, 'ACEH JAYA'),
(1115, 'NAGAN RAYA'),
(1116, 'ACEH TAMIANG'),
(1117, 'BENER MERIAH'),
(1118, 'PIDIE JAYA'),
(1171, 'KOTA BANDA ACEH'),
(1172, 'KOTA SABANG'),
(1173, 'KOTA LHOKSEUMAWE'),
(1174, 'KOTA LANGSA'),
(1175, 'KOTA SUBULUSSALAM'),
(1201, 'TAPANULI TENGAH'),
(1202, 'TAPANULI UTARA'),
(1203, 'TAPANULI SELATAN'),
(1204, 'NIAS'),
(1205, 'LANGKAT'),
(1206, 'KARO'),
(1207, 'DELI SERDANG'),
(1208, 'SIMALUNGUN'),
(1209, 'ASAHAN'),
(1210, 'LABUHANBATU'),
(1211, 'DAIRI'),
(1212, 'TOBA'),
(1213, 'MANDAILING NATAL'),
(1214, 'NIAS SELATAN'),
(1215, 'PAKPAK BHARAT'),
(1216, 'HUMBANG HASUNDUTAN'),
(1217, 'SAMOSIR'),
(1218, 'SERDANG BEDAGAI'),
(1219, 'BATU BARA'),
(1220, 'PADANG LAWAS UTARA'),
(1221, 'PADANG LAWAS'),
(1222, 'LABUHANBATU SELATAN'),
(1223, 'LABUHANBATU UTARA'),
(1224, 'NIAS UTARA'),
(1225, 'NIAS BARAT'),
(1271, 'KOTA MEDAN'),
(1272, 'KOTA PEMATANGSIANTAR'),
(1273, 'KOTA SIBOLGA'),
(1274, 'KOTA TANJUNG BALAI'),
(1275, 'KOTA BINJAI'),
(1276, 'KOTA TEBING TINGGI'),
(1277, 'KOTA PADANGSIDIMPUAN'),
(1278, 'KOTA GUNUNGSITOLI'),
(1301, 'PESISIR SELATAN'),
(1302, 'SOLOK'),
(1303, 'SIJUNJUNG'),
(1304, 'TANAH DATAR'),
(1305, 'PADANG PARIAMAN'),
(1306, 'AGAM'),
(1307, 'LIMA PULUH KOTA'),
(1308, 'PASAMAN'),
(1309, 'KEPULAUAN MENTAWAI'),
(1310, 'DHARMASRAYA'),
(1311, 'SOLOK SELATAN'),
(1312, 'PASAMAN BARAT'),
(1371, 'KOTA PADANG'),
(1372, 'KOTA SOLOK'),
(1373, 'KOTA SAWAHLUNTO'),
(1374, 'KOTA PADANG PANJANG'),
(1375, 'KOTA BUKITTINGGI'),
(1376, 'KOTA PAYAKUMBUH'),
(1377, 'KOTA PARIAMAN'),
(1401, 'KAMPAR'),
(1402, 'INDRAGIRI HULU'),
(1403, 'BENGKALIS'),
(1404, 'INDRAGIRI HILIR'),
(1405, 'PELALAWAN'),
(1406, 'ROKAN HULU'),
(1407, 'ROKAN HILIR'),
(1408, 'SIAK'),
(1409, 'KUANTAN SINGINGI'),
(1410, 'KEPULAUAN MERANTI'),
(1471, 'KOTA PEKANBARU'),
(1472, 'KOTA DUMAI'),
(1501, 'KERINCI'),
(1502, 'MERANGIN'),
(1503, 'SAROLANGUN'),
(1504, 'BATANGHARI'),
(1505, 'MUARO JAMBI'),
(1506, 'TANJUNG JABUNG BARAT'),
(1507, 'TANJUNG JABUNG TIMUR'),
(1508, 'BUNGO'),
(1509, 'TEBO'),
(1571, 'KOTA JAMBI'),
(1572, 'KOTA SUNGAI PENUH'),
(1601, 'OGAN KOMERING ULU'),
(1602, 'OGAN KOMERING ILIR'),
(1603, 'MUARA ENIM'),
(1604, 'LAHAT'),
(1605, 'MUSI RAWAS'),
(1606, 'MUSI BANYUASIN'),
(1607, 'BANYUASIN'),
(1608, 'OGAN KOMERING ULU TIMUR'),
(1609, 'OGAN KOMERING ULU SELATAN'),
(1610, 'OGAN ILIR'),
(1611, 'EMPAT LAWANG'),
(1612, 'PENUKAL ABAB LEMATANG ILIR'),
(1613, 'MUSI RAWAS UTARA'),
(1671, 'KOTA PALEMBANG'),
(1672, 'KOTA PAGAR ALAM'),
(1673, 'KOTA LUBUK LINGGAU'),
(1674, 'KOTA PRABUMULIH'),
(1701, 'BENGKULU SELATAN'),
(1702, 'REJANG LEBONG'),
(1703, 'BENGKULU UTARA'),
(1704, 'KAUR'),
(1705, 'SELUMA'),
(1706, 'MUKO MUKO'),
(1707, 'LEBONG'),
(1708, 'KEPAHIANG'),
(1709, 'BENGKULU TENGAH'),
(1771, 'KOTA BENGKULU'),
(1801, 'LAMPUNG SELATAN'),
(1802, 'LAMPUNG TENGAH'),
(1803, 'LAMPUNG UTARA'),
(1804, 'LAMPUNG BARAT'),
(1805, 'TULANG BAWANG'),
(1806, 'TANGGAMUS'),
(1807, 'LAMPUNG TIMUR'),
(1808, 'WAY KANAN'),
(1809, 'PESAWARAN'),
(1810, 'PRINGSEWU'),
(1811, 'MESUJI'),
(1812, 'TULANG BAWANG BARAT'),
(1813, 'PESISIR BARAT'),
(1871, 'KOTA BANDAR LAMPUNG'),
(1872, 'KOTA METRO'),
(1901, 'BANGKA'),
(1902, 'BELITUNG'),
(1903, 'BANGKA SELATAN'),
(1904, 'BANGKA TENGAH'),
(1905, 'BANGKA BARAT'),
(1906, 'BELITUNG TIMUR'),
(1971, 'KOTA PANGKAL PINANG'),
(2101, 'BINTAN'),
(2102, 'KARIMUN'),
(2103, 'NATUNA'),
(2104, 'LINGGA'),
(2105, 'KEPULAUAN ANAMBAS'),
(2171, 'KOTA BATAM'),
(2172, 'KOTA TANJUNG PINANG'),
(3101, 'ADM. KEP. SERIBU'),
(3171, 'KOTA ADM. JAKARTA PUSAT'),
(3172, 'KOTA ADM. JAKARTA UTARA'),
(3173, 'KOTA ADM. JAKARTA BARAT'),
(3174, 'KOTA ADM. JAKARTA SELATAN'),
(3175, 'KOTA ADM. JAKARTA TIMUR'),
(3201, 'BOGOR'),
(3202, 'SUKABUMI'),
(3203, 'CIANJUR'),
(3204, 'BANDUNG'),
(3205, 'GARUT'),
(3206, 'TASIKMALAYA'),
(3207, 'CIAMIS'),
(3208, 'KUNINGAN'),
(3209, 'CIREBON'),
(3210, 'MAJALENGKA'),
(3211, 'SUMEDANG'),
(3212, 'INDRAMAYU'),
(3213, 'SUBANG'),
(3214, 'PURWAKARTA'),
(3215, 'KARAWANG'),
(3216, 'BEKASI'),
(3217, 'BANDUNG BARAT'),
(3218, 'PANGANDARAN'),
(3271, 'KOTA BOGOR'),
(3272, 'KOTA SUKABUMI'),
(3273, 'KOTA BANDUNG'),
(3274, 'KOTA CIREBON'),
(3275, 'KOTA BEKASI'),
(3276, 'KOTA DEPOK'),
(3277, 'KOTA CIMAHI'),
(3278, 'KOTA TASIKMALAYA'),
(3279, 'KOTA BANJAR'),
(3301, 'CILACAP'),
(3302, 'BANYUMAS'),
(3303, 'PURBALINGGA'),
(3304, 'BANJARNEGARA'),
(3305, 'KEBUMEN'),
(3306, 'PURWOREJO'),
(3307, 'WONOSOBO'),
(3308, 'MAGELANG'),
(3309, 'BOYOLALI'),
(3310, 'KLATEN'),
(3311, 'SUKOHARJO'),
(3312, 'WONOGIRI'),
(3313, 'KARANGANYAR'),
(3314, 'SRAGEN'),
(3315, 'GROBOGAN'),
(3316, 'BLORA'),
(3317, 'REMBANG'),
(3318, 'PATI'),
(3319, 'KUDUS'),
(3320, 'JEPARA'),
(3321, 'DEMAK'),
(3322, 'SEMARANG'),
(3323, 'TEMANGGUNG'),
(3324, 'KENDAL'),
(3325, 'BATANG'),
(3326, 'PEKALONGAN'),
(3327, 'PEMALANG'),
(3328, 'TEGAL'),
(3329, 'BREBES'),
(3371, 'KOTA MAGELANG'),
(3372, 'KOTA SURAKARTA'),
(3373, 'KOTA SALATIGA'),
(3374, 'KOTA SEMARANG'),
(3375, 'KOTA PEKALONGAN'),
(3376, 'KOTA TEGAL'),
(3401, 'KULON PROGO'),
(3402, 'BANTUL'),
(3403, 'GUNUNGKIDUL'),
(3404, 'SLEMAN'),
(3471, 'KOTA YOGYAKARTA'),
(3501, 'PACITAN'),
(3502, 'PONOROGO'),
(3503, 'TRENGGALEK'),
(3504, 'TULUNGAGUNG'),
(3505, 'BLITAR'),
(3506, 'KEDIRI'),
(3507, 'MALANG'),
(3508, 'LUMAJANG'),
(3509, 'JEMBER'),
(3510, 'BANYUWANGI'),
(3511, 'BONDOWOSO'),
(3512, 'SITUBONDO'),
(3513, 'PROBOLINGGO'),
(3514, 'PASURUAN'),
(3515, 'SIDOARJO'),
(3516, 'MOJOKERTO'),
(3517, 'JOMBANG'),
(3518, 'NGANJUK'),
(3519, 'MADIUN'),
(3520, 'MAGETAN'),
(3521, 'NGAWI'),
(3522, 'BOJONEGORO'),
(3523, 'TUBAN'),
(3524, 'LAMONGAN'),
(3525, 'GRESIK'),
(3526, 'BANGKALAN'),
(3527, 'SAMPANG'),
(3528, 'PAMEKASAN'),
(3529, 'SUMENEP'),
(3571, 'KOTA KEDIRI'),
(3572, 'KOTA BLITAR'),
(3573, 'KOTA MALANG'),
(3574, 'KOTA PROBOLINGGO'),
(3575, 'KOTA PASURUAN'),
(3576, 'KOTA MOJOKERTO'),
(3577, 'KOTA MADIUN'),
(3578, 'KOTA SURABAYA'),
(3579, 'KOTA BATU'),
(3601, 'PANDEGLANG'),
(3602, 'LEBAK'),
(3603, 'TANGERANG'),
(3604, 'SERANG'),
(3671, 'KOTA TANGERANG'),
(3672, 'KOTA CILEGON'),
(3673, 'KOTA SERANG'),
(3674, 'KOTA TANGERANG SELATAN'),
(5101, 'JEMBRANA'),
(5102, 'TABANAN'),
(5103, 'BADUNG'),
(5104, 'GIANYAR'),
(5105, 'KLUNGKUNG'),
(5106, 'BANGLI'),
(5107, 'KARANGASEM'),
(5108, 'BULELENG'),
(5171, 'KOTA DENPASAR'),
(5201, 'LOMBOK BARAT'),
(5202, 'LOMBOK TENGAH'),
(5203, 'LOMBOK TIMUR'),
(5204, 'SUMBAWA'),
(5205, 'DOMPU'),
(5206, 'BIMA'),
(5207, 'SUMBAWA BARAT'),
(5208, 'LOMBOK UTARA'),
(5271, 'KOTA MATARAM'),
(5272, 'KOTA BIMA'),
(5301, 'KUPANG'),
(5302, 'KAB TIMOR TENGAH SELATAN'),
(5303, 'TIMOR TENGAH UTARA'),
(5304, 'BELU'),
(5305, 'ALOR'),
(5306, 'FLORES TIMUR'),
(5307, 'SIKKA'),
(5308, 'ENDE'),
(5309, 'NGADA'),
(5310, 'MANGGARAI'),
(5311, 'SUMBA TIMUR'),
(5312, 'SUMBA BARAT'),
(5313, 'LEMBATA'),
(5314, 'ROTE NDAO'),
(5315, 'MANGGARAI BARAT'),
(5316, 'NAGEKEO'),
(5317, 'SUMBA TENGAH'),
(5318, 'SUMBA BARAT DAYA'),
(5319, 'MANGGARAI TIMUR'),
(5320, 'SABU RAIJUA'),
(5321, 'MALAKA'),
(5371, 'KOTA KUPANG'),
(6101, 'SAMBAS'),
(6102, 'MEMPAWAH'),
(6103, 'SANGGAU'),
(6104, 'KETAPANG'),
(6105, 'SINTANG'),
(6106, 'KAPUAS HULU'),
(6107, 'BENGKAYANG'),
(6108, 'LANDAK'),
(6109, 'SEKADAU'),
(6110, 'MELAWI'),
(6111, 'KAYONG UTARA'),
(6112, 'KUBU RAYA'),
(6171, 'KOTA PONTIANAK'),
(6172, 'KOTA SINGKAWANG'),
(6201, 'KOTAWARINGIN BARAT'),
(6202, 'KOTAWARINGIN TIMUR'),
(6203, 'KAPUAS'),
(6204, 'BARITO SELATAN'),
(6205, 'BARITO UTARA'),
(6206, 'KATINGAN'),
(6207, 'SERUYAN'),
(6208, 'SUKAMARA'),
(6209, 'LAMANDAU'),
(6210, 'GUNUNG MAS'),
(6211, 'PULANG PISAU'),
(6212, 'MURUNG RAYA'),
(6213, 'BARITO TIMUR'),
(6271, 'KOTA PALANGKARAYA'),
(6301, 'TANAH LAUT'),
(6302, 'KOTABARU'),
(6303, 'BANJAR'),
(6304, 'BARITO KUALA'),
(6305, 'TAPIN'),
(6306, 'HULU SUNGAI SELATAN'),
(6307, 'HULU SUNGAI TENGAH'),
(6308, 'HULU SUNGAI UTARA'),
(6309, 'TABALONG'),
(6310, 'TANAH BUMBU'),
(6311, 'BALANGAN'),
(6371, 'KOTA BANJARMASIN'),
(6372, 'KOTA BANJARBARU'),
(6401, 'PASER'),
(6402, 'KUTAI KARTANEGARA'),
(6403, 'BERAU'),
(6407, 'KUTAI BARAT'),
(6408, 'KUTAI TIMUR'),
(6409, 'PENAJAM PASER UTARA'),
(6411, 'MAHAKAM ULU'),
(6471, 'KOTA BALIKPAPAN'),
(6472, 'KOTA SAMARINDA'),
(6474, 'KOTA BONTANG'),
(6501, 'BULUNGAN'),
(6502, 'MALINAU'),
(6503, 'NUNUKAN'),
(6504, 'TANA TIDUNG'),
(6571, 'KOTA TARAKAN'),
(7101, 'BOLAANG MONGONDOW'),
(7102, 'MINAHASA'),
(7103, 'KEPULAUAN SANGIHE'),
(7104, 'KEPULAUAN TALAUD'),
(7105, 'MINAHASA SELATAN'),
(7106, 'MINAHASA UTARA'),
(7107, 'MINAHASA TENGGARA'),
(7108, 'BOLAANG MONGONDOW UTARA'),
(7109, 'KEP. SIAU TAGULANDANG BIARO'),
(7110, 'BOLAANG MONGONDOW TIMUR'),
(7111, 'BOLAANG MONGONDOW SELATAN'),
(7171, 'KOTA MANADO'),
(7172, 'KOTA BITUNG'),
(7173, 'KOTA TOMOHON'),
(7174, 'KOTA KOTAMOBAGU'),
(7201, 'BANGGAI'),
(7202, 'POSO'),
(7203, 'DONGGALA'),
(7204, 'TOLI TOLI'),
(7205, 'BUOL'),
(7206, 'MOROWALI'),
(7207, 'BANGGAI KEPULAUAN'),
(7208, 'PARIGI MOUTONG'),
(7209, 'TOJO UNA UNA'),
(7210, 'SIGI'),
(7211, 'BANGGAI LAUT'),
(7212, 'MOROWALI UTARA'),
(7271, 'KOTA PALU'),
(7301, 'KEPULAUAN SELAYAR'),
(7302, 'BULUKUMBA'),
(7303, 'BANTAENG'),
(7304, 'JENEPONTO'),
(7305, 'TAKALAR'),
(7306, 'GOWA'),
(7307, 'SINJAI'),
(7308, 'BONE'),
(7309, 'MAROS'),
(7310, 'PANGKAJENE KEPULAUAN'),
(7311, 'BARRU'),
(7312, 'SOPPENG'),
(7313, 'WAJO'),
(7314, 'SIDENRENG RAPPANG'),
(7315, 'PINRANG'),
(7316, 'ENREKANG'),
(7317, 'LUWU'),
(7318, 'TANA TORAJA'),
(7322, 'LUWU UTARA'),
(7324, 'LUWU TIMUR'),
(7326, 'TORAJA UTARA'),
(7371, 'KOTA MAKASSAR'),
(7372, 'KOTA PARE PARE'),
(7373, 'KOTA PALOPO'),
(7401, 'KOLAKA'),
(7402, 'KONAWE'),
(7403, 'MUNA'),
(7404, 'BUTON'),
(7405, 'KONAWE SELATAN'),
(7406, 'BOMBANA'),
(7407, 'WAKATOBI'),
(7408, 'KOLAKA UTARA'),
(7409, 'KONAWE UTARA'),
(7410, 'BUTON UTARA'),
(7411, 'KOLAKA TIMUR'),
(7412, 'KONAWE KEPULAUAN'),
(7413, 'MUNA BARAT'),
(7414, 'BUTON TENGAH'),
(7415, 'BUTON SELATAN'),
(7471, 'KOTA KENDARI'),
(7472, 'KOTA BAU BAU'),
(7501, 'GORONTALO'),
(7502, 'BOALEMO'),
(7503, 'BONE BOLANGO'),
(7504, 'PAHUWATO'),
(7505, 'GORONTALO UTARA'),
(7571, 'KOTA GORONTALO'),
(7601, 'PASANGKAYU'),
(7602, 'MAMUJU'),
(7603, 'MAMASA'),
(7604, 'POLEWALI MANDAR'),
(7605, 'MAJENE'),
(7606, 'MAMUJU TENGAH'),
(8101, 'MALUKU TENGAH'),
(8102, 'MALUKU TENGGARA'),
(8103, 'KEPULAUAN TANIMBAR'),
(8104, 'BURU'),
(8105, 'SERAM BAGIAN TIMUR'),
(8106, 'SERAM BAGIAN BARAT'),
(8107, 'KEPULAUAN ARU'),
(8108, 'MALUKU BARAT DAYA'),
(8109, 'BURU SELATAN'),
(8171, 'KOTA AMBON'),
(8172, 'KOTA TUAL'),
(8201, 'HALMAHERA BARAT'),
(8202, 'HALMAHERA TENGAH'),
(8203, 'HALMAHERA UTARA'),
(8204, 'HALMAHERA SELATAN'),
(8205, 'KEPULAUAN SULA'),
(8206, 'HALMAHERA TIMUR'),
(8207, 'PULAU MOROTAI'),
(8208, 'PULAU TALIABU'),
(8271, 'KOTA TERNATE'),
(8272, 'KOTA TIDORE KEPULAUAN'),
(9101, 'MERAUKE'),
(9102, 'JAYAWIJAYA'),
(9103, 'JAYAPURA'),
(9104, 'NABIRE'),
(9105, 'KEPULAUAN YAPEN'),
(9106, 'BIAK NUMFOR'),
(9107, 'PUNCAK JAYA'),
(9108, 'PANIAI'),
(9109, 'MIMIKA'),
(9110, 'SARMI'),
(9111, 'KEEROM'),
(9112, 'PEGUNUNGAN BINTANG'),
(9113, 'YAHUKIMO'),
(9114, 'TOLIKARA'),
(9115, 'WAROPEN'),
(9116, 'BOVEN DIGOEL'),
(9117, 'MAPPI'),
(9118, 'ASMAT'),
(9119, 'SUPIORI'),
(9120, 'MAMBERAMO RAYA'),
(9121, 'MAMBERAMO TENGAH'),
(9122, 'YALIMO'),
(9123, 'LANNY JAYA'),
(9124, 'NDUGA'),
(9125, 'PUNCAK'),
(9126, 'DOGIYAI'),
(9127, 'INTAN JAYA'),
(9128, 'DEIYAI'),
(9171, 'KOTA JAYAPURA'),
(9201, 'SORONG'),
(9202, 'MANOKWARI'),
(9203, 'FAK FAK'),
(9204, 'SORONG SELATAN'),
(9205, 'RAJA AMPAT'),
(9206, 'TELUK BINTUNI'),
(9207, 'TELUK WONDAMA'),
(9208, 'KAIMANA'),
(9209, 'TAMBRAUW'),
(9210, 'MAYBRAT'),
(9211, 'MANOKWARI SELATAN'),
(9212, 'PEGUNUNGAN ARFAK'),
(9271, 'KOTA SORONG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayat_diklat`
--

CREATE TABLE `tb_riwayat_diklat` (
  `riwayat_diklat_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `riwayat_diklat_item` varchar(64) NOT NULL,
  `riwayat_diklat_file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rt`
--

CREATE TABLE `tb_rt` (
  `rt_id` int(11) NOT NULL,
  `rt_name` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_rt`
--

INSERT INTO `tb_rt` (`rt_id`, `rt_name`) VALUES
(1, '001'),
(2, '002'),
(3, '003'),
(4, '004'),
(5, '005'),
(6, '006'),
(7, '007'),
(8, '008'),
(9, '009'),
(10, '010'),
(11, '011'),
(12, '012'),
(13, '013'),
(14, '014'),
(15, '015'),
(16, '016'),
(17, '017'),
(18, '018'),
(19, '019'),
(20, '020'),
(21, '021'),
(22, '022'),
(23, '023'),
(24, '024'),
(25, '025'),
(26, '026'),
(27, '027'),
(28, '028'),
(29, '029'),
(30, '030');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rw`
--

CREATE TABLE `tb_rw` (
  `rw_id` int(11) NOT NULL,
  `rw_name` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_rw`
--

INSERT INTO `tb_rw` (`rw_id`, `rw_name`) VALUES
(1, '001'),
(2, '002'),
(3, '003'),
(4, '004'),
(5, '005'),
(6, '006'),
(7, '007'),
(8, '008'),
(9, '009'),
(10, '010'),
(11, '011'),
(12, '012'),
(13, '013'),
(14, '014'),
(15, '015'),
(16, '016'),
(17, '017'),
(18, '018'),
(19, '019'),
(20, '020'),
(21, '021'),
(22, '022'),
(23, '023'),
(24, '024'),
(25, '025'),
(26, '026'),
(27, '027'),
(28, '028'),
(29, '029'),
(30, '030');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tinggi_badan`
--

CREATE TABLE `tb_tinggi_badan` (
  `tinggi_badan_id` int(11) NOT NULL,
  `tinggi_badan_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_tinggi_badan`
--

INSERT INTO `tb_tinggi_badan` (`tinggi_badan_id`, `tinggi_badan_name`) VALUES
(1, 'Di bawah 145'),
(2, '146 - 160'),
(3, '161 - 175'),
(4, 'Di atas 176');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` tinyint(1) DEFAULT 0,
  `role` enum('master','admin kecamatan','admin desa','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `anggota_id`, `nama_lengkap`, `username`, `password`, `akses`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', '08988335639', '$2y$10$dL.4zVVqUscrTyQwvo7GcefWVgtZ0SBdlaN5GHjHMo2JgjzIgfIUm', 1, 'user', '2024-11-07 04:29:20', '2024-11-07 04:29:20'),
(2, 2, 'test', '089883356399', '$2y$10$2UJxloNoanf/LzAJmA/mGuNhCo382nRroXqf7iyB1got0mI8fWTr6', 1, 'user', '2024-11-07 04:35:23', '2024-11-07 04:35:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_villages`
--

CREATE TABLE `tb_villages` (
  `villages_id` bigint(11) NOT NULL,
  `districts_id` int(11) NOT NULL,
  `districts_name` varchar(64) NOT NULL,
  `villages_name` varchar(128) NOT NULL,
  `villages_code` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_villages`
--

INSERT INTO `tb_villages` (`villages_id`, `districts_id`, `districts_name`, `villages_name`, `villages_code`) VALUES
(3319010001, 3319010, 'KALIWUNGU', 'BAKALANKRAPYAK', 'X-11-04-01'),
(3319010002, 3319010, 'KALIWUNGU', 'BANGET', 'X-11-04-09'),
(3319010003, 3319010, 'KALIWUNGU', 'PRAMBATAN LOR', 'X-11-04-03'),
(3319010004, 3319010, 'KALIWUNGU', 'GARUNG KIDUL', 'X-11-04-06'),
(3319010005, 3319010, 'KALIWUNGU', 'SETROKALANGAN', 'X-11-04-08'),
(3319010006, 3319010, 'KALIWUNGU', 'GAMONG', 'X-11-04-14'),
(3319010007, 3319010, 'KALIWUNGU', 'BLIMBING KIDUL', 'X-11-04-15'),
(3319010008, 3319010, 'KALIWUNGU', 'SIDOREKSO', 'X-11-04-13'),
(3319010009, 3319010, 'KALIWUNGU', 'KALIWUNGU', 'X-11-04-11'),
(3319010010, 3319010, 'KALIWUNGU', 'KEDUNGDOWO', 'X-11-04-07'),
(3319010011, 3319010, 'KALIWUNGU', 'GARUNG LOR', 'X-11-04-05'),
(3319010012, 3319010, 'KALIWUNGU', 'KARANGAMPEL', 'X-11-04-04'),
(3319010013, 3319010, 'KALIWUNGU', 'MIJEN', 'X-11-04-10'),
(3319010014, 3319010, 'KALIWUNGU', 'PRAMBATAN KIDUL', 'X-11-04-02'),
(3319010015, 3319010, 'KALIWUNGU', 'PAPRINGAN', 'X-11-04-12'),
(3319020001, 3319020, 'KOTA KUDUS', 'PURWOSARI', 'X-11-03-20'),
(3319020002, 3319020, 'KOTA KUDUS', 'JANGGALAN', 'X-11-03-07'),
(3319020003, 3319020, 'KOTA KUDUS', 'DEMANGAN', 'X-11-03-05'),
(3319020004, 3319020, 'KOTA KUDUS', 'SUNGGINGAN', 'X-11-03-23'),
(3319020005, 3319020, 'KOTA KUDUS', 'PANJUNAN', 'X-11-03-19'),
(3319020006, 3319020, 'KOTA KUDUS', 'WERGU KULON', 'X-11-03-24'),
(3319020007, 3319020, 'KOTA KUDUS', 'WERGU WETAN', 'X-11-03-25'),
(3319020008, 3319020, 'KOTA KUDUS', 'MLATI KIDUL', 'X-11-03-15'),
(3319020009, 3319020, 'KOTA KUDUS', 'MLATI NOROWITO', 'X-11-03-16'),
(3319020010, 3319020, 'KOTA KUDUS', 'MLATI LOR', 'X-11-03-17'),
(3319020011, 3319020, 'KOTA KUDUS', 'NGANGUK', 'X-11-03-18'),
(3319020012, 3319020, 'KOTA KUDUS', 'KRAMAT', 'X-11-03-12'),
(3319020013, 3319020, 'KOTA KUDUS', 'DEMAAN', 'X-11-03-04'),
(3319020014, 3319020, 'KOTA KUDUS', 'LANGGARDALEM', 'X-11-03-14'),
(3319020015, 3319020, 'KOTA KUDUS', 'KAUMAN', 'X-11-03-09'),
(3319020016, 3319020, 'KOTA KUDUS', 'DAMARAN', 'X-11-03-03'),
(3319020017, 3319020, 'KOTA KUDUS', 'KERJASAN', 'X-11-03-11'),
(3319020018, 3319020, 'KOTA KUDUS', 'KAJEKSAN', 'X-11-03-08'),
(3319020019, 3319020, 'KOTA KUDUS', 'KRANDON', 'X-11-03-13'),
(3319020020, 3319020, 'KOTA KUDUS', 'SINGOCANDI', 'X-11-03-22'),
(3319020021, 3319020, 'KOTA KUDUS', 'GLANTENGAN', 'X-11-03-06'),
(3319020022, 3319020, 'KOTA KUDUS', 'BARONGAN', 'X-11-03-01'),
(3319020023, 3319020, 'KOTA KUDUS', 'KALIPUTU', 'X-11-03-10'),
(3319020024, 3319020, 'KOTA KUDUS', 'BURIKAN', 'X-11-03-02'),
(3319020025, 3319020, 'KOTA KUDUS', 'RENDENG', 'X-11-03-21'),
(3319030001, 3319030, 'JATI', 'JETISKAPUAN', 'X-11-02-05'),
(3319030002, 3319030, 'JATI', 'TANJUNGKARANG', 'X-11-02-09'),
(3319030003, 3319030, 'JATI', 'JATI WETAN', 'X-11-02-03'),
(3319030004, 3319030, 'JATI', 'PASURUHAN KIDUL', 'X-11-02-11'),
(3319030005, 3319030, 'JATI', 'PASURUHAN LOR', 'X-11-02-12'),
(3319030006, 3319030, 'JATI', 'PLOSO', 'X-11-02-13'),
(3319030007, 3319030, 'JATI', 'JATI KULON', 'X-11-02-02'),
(3319030008, 3319030, 'JATI', 'GETASPEJATEN', 'X-11-02-01'),
(3319030009, 3319030, 'JATI', 'LORAM KULON', 'X-11-02-06'),
(3319030010, 3319030, 'JATI', 'LORAM WETAN', 'X-11-02-07'),
(3319030011, 3319030, 'JATI', 'JEPANGPAKIS', 'X-11-02-04'),
(3319030012, 3319030, 'JATI', 'MEGAWON', 'X-11-02-08'),
(3319030013, 3319030, 'JATI', 'NGEMBAL KULON', 'X-11-02-10'),
(3319030014, 3319030, 'JATI', 'TUMPANGKRASAK', 'X-11-02-14'),
(3319040001, 3319040, 'UNDAAN', 'WONOSOCO', 'X-11-01-19'),
(3319040002, 3319040, 'UNDAAN', 'LAMBANGAN', 'X-11-01-09'),
(3319040003, 3319040, 'UNDAAN', 'KALIREJO', 'X-11-01-08'),
(3319040004, 3319040, 'UNDAAN', 'MEDINI', 'X-11-01-07'),
(3319040005, 3319040, 'UNDAAN', 'SAMBUNG', 'X-11-01-06'),
(3319040006, 3319040, 'UNDAAN', 'GLAGAHWARU', 'X-11-01-16'),
(3319040007, 3319040, 'UNDAAN', 'KUTUK', 'X-11-01-17'),
(3319040008, 3319040, 'UNDAAN', 'UNDAAN KIDUL', 'X-11-01-05'),
(3319040009, 3319040, 'UNDAAN', 'UNDAAN TENGAH', 'X-11-01-04'),
(3319040010, 3319040, 'UNDAAN', 'KARANGROWO', 'X-11-01-10'),
(3319040011, 3319040, 'UNDAAN', 'LARIKREJO', 'X-11-01-11'),
(3319040012, 3319040, 'UNDAAN', 'UNDAAN LOR', 'X-11-01-03'),
(3319040013, 3319040, 'UNDAAN', 'WATES', 'X-11-01-02'),
(3319040014, 3319040, 'UNDAAN', 'NGEMPLAK', 'X-11-01-01'),
(3319040015, 3319040, 'UNDAAN', 'TERANGMAS', 'X-11-01-15'),
(3319040016, 3319040, 'UNDAAN', 'BERUGENJANG', 'X-11-01-18'),
(3319040017, 3319040, 'UNDAAN', 'NGELO', 'X-11-01-12'),
(3319040018, 3319040, 'UNDAAN', 'KALIYOSO', 'X-11-01-13'),
(3319040019, 3319040, 'UNDAAN', 'GATET', 'X-11-01-14'),
(3319050001, 3319050, 'MEJOBO', 'GULANG', 'X-11-05-01'),
(3319050002, 3319050, 'MEJOBO', 'JEPANG', 'X-11-05-03'),
(3319050003, 3319050, 'MEJOBO', 'PAYAMAN', 'X-11-05-02'),
(3319050004, 3319050, 'MEJOBO', 'KIRIG', 'X-11-05-06'),
(3319050005, 3319050, 'MEJOBO', 'TEMULUS', 'X-11-05-07'),
(3319050006, 3319050, 'MEJOBO', 'KESAMBI', 'X-11-05-09'),
(3319050007, 3319050, 'MEJOBO', 'JOJO', 'X-11-05-11'),
(3319050008, 3319050, 'MEJOBO', 'HADIWARNO', 'X-11-05-10'),
(3319050009, 3319050, 'MEJOBO', 'MEJOBO', 'X-11-05-04'),
(3319050010, 3319050, 'MEJOBO', 'GOLANTEPUS', 'X-11-05-05'),
(3319052011, 3319050, 'MEJOBO', 'TENGGELES', 'X-11-05-08'),
(3319060001, 3319060, 'JEKULO', 'SADANG', 'X-11-06-09'),
(3319060002, 3319060, 'JEKULO', 'BULUNGCANGKRING', 'X-11-06-02'),
(3319060003, 3319060, 'JEKULO', 'BULUNG KULON', 'X-11-06-01'),
(3319060004, 3319060, 'JEKULO', 'SIDOMULYO', 'X-11-06-10'),
(3319060005, 3319060, 'JEKULO', 'GONDOHARUM', 'X-11-06-03'),
(3319060006, 3319060, 'JEKULO', 'TERBAN', 'X-11-06-12'),
(3319060007, 3319060, 'JEKULO', 'PLADEN', 'X-11-06-08'),
(3319060008, 3319060, 'JEKULO', 'KLALING', 'X-11-06-07'),
(3319060009, 3319060, 'JEKULO', 'JEKULO', 'X-11-06-06'),
(3319060010, 3319060, 'JEKULO', 'HADIPOLO', 'X-11-06-04'),
(3319060011, 3319060, 'JEKULO', 'HONGGOSOCO', 'X-11-06-05'),
(3319060012, 3319060, 'JEKULO', 'TANJUNGREJO', 'X-11-06-11'),
(3319070001, 3319070, 'BAE', 'DERSALAM', 'X-11-07-03'),
(3319070002, 3319070, 'BAE', 'NGEMBALREJO', 'X-11-07-06'),
(3319070003, 3319070, 'BAE', 'KARANGBENER', 'X-11-07-05'),
(3319070004, 3319070, 'BAE', 'GONDANGMANIS', 'X-11-07-04'),
(3319070005, 3319070, 'BAE', 'PEDAWANG', 'X-11-07-08'),
(3319070006, 3319070, 'BAE', 'BACIN', 'X-11-07-01'),
(3319070007, 3319070, 'BAE', 'PANJANG', 'X-11-07-07'),
(3319070008, 3319070, 'BAE', 'PEGANJARAN', 'X-11-07-09'),
(3319070009, 3319070, 'BAE', 'PURWOREJO', 'X-11-07-10'),
(3319070010, 3319070, 'BAE', 'BAE', 'X-11-07-02'),
(3319080001, 3319080, 'GEBOG', 'GRIBIG', 'X-11-08-08'),
(3319080002, 3319080, 'GEBOG', 'KLUMPIT', 'X-11-08-09'),
(3319080003, 3319080, 'GEBOG', 'GETASSRABI', 'X-11-08-11'),
(3319080004, 3319080, 'GEBOG', 'PADURENAN', 'X-11-08-10'),
(3319080005, 3319080, 'GEBOG', 'KARANGMALANG', 'X-11-08-07'),
(3319080006, 3319080, 'GEBOG', 'BESITO', 'X-11-08-06'),
(3319080007, 3319080, 'GEBOG', 'JURANG', 'X-11-08-05'),
(3319080008, 3319080, 'GEBOG', 'GONDOSARI', 'X-11-08-04'),
(3319080009, 3319080, 'GEBOG', 'KEDUNGSARI', 'X-11-08-03'),
(3319080010, 3319080, 'GEBOG', 'MENAWAN', 'X-11-08-02'),
(3319080011, 3319080, 'GEBOG', 'RAHTAWU', 'X-11-08-01'),
(3319090001, 3319090, 'DAWE', 'SAMIREJO', 'X-11-09-15'),
(3319090002, 3319090, 'DAWE', 'CENDONO', 'X-11-09-01'),
(3319090003, 3319090, 'DAWE', 'MARGOREJO', 'X-11-09-11'),
(3319090004, 3319090, 'DAWE', 'REJOSARI', 'X-11-09-14'),
(3319090005, 3319090, 'DAWE', 'KANDANGMAS', 'X-11-09-08'),
(3319090006, 3319090, 'DAWE', 'LAU', 'X-11-09-10'),
(3319090007, 3319090, 'DAWE', 'PIJI', 'X-11-09-12'),
(3319090008, 3319090, 'DAWE', 'PUYOH', 'X-11-09-13'),
(3319090009, 3319090, 'DAWE', 'SOCO', 'X-11-09-16'),
(3319090010, 3319090, 'DAWE', 'TERNADI', 'X-11-09-18'),
(3319090011, 3319090, 'DAWE', 'KAJAR', 'X-11-09-07'),
(3319090012, 3319090, 'DAWE', 'CRANGGANG', 'X-11-09-03'),
(3319090013, 3319090, 'DAWE', 'TERGO', 'X-11-09-17'),
(3319090014, 3319090, 'DAWE', 'GLAGAH KULON', 'X-11-09-05'),
(3319090015, 3319090, 'DAWE', 'KUWUKAN', 'X-11-09-09'),
(3319090016, 3319090, 'DAWE', 'DUKUHWARINGIN', 'X-11-09-04'),
(3319090017, 3319090, 'DAWE', 'COLO', 'X-11-09-02'),
(3319090018, 3319090, 'DAWE', 'JAPAN', 'X-11-09-06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`anggota_id`),
  ADD KEY `anggota_tempat_lahir` (`anggota_tempat_lahir`),
  ADD KEY `anggota_golongan_darah` (`anggota_golongan_darah`),
  ADD KEY `anggota_tinggi_badan` (`anggota_tinggi_badan`),
  ADD KEY `anggota_berat_badan` (`anggota_berat_badan`),
  ADD KEY `anggota_pernikahan` (`anggota_pernikahan`),
  ADD KEY `anggota_domisili_kec` (`anggota_domisili_kec`),
  ADD KEY `anggota_rt` (`anggota_rt`),
  ADD KEY `anggota_rw` (`anggota_rw`),
  ADD KEY `anggota_domisili_des` (`anggota_domisili_des`),
  ADD KEY `anggota_pekerjaan` (`anggota_pekerjaan`),
  ADD KEY `anggota_pekerjaan_istri` (`anggota_pekerjaan_istri`),
  ADD KEY `anggota_pendapatan` (`anggota_pendapatan`),
  ADD KEY `anggota_pendapatan_istri` (`anggota_pendapatan_istri`),
  ADD KEY `anggota_pendidikan` (`anggota_pendidikan`),
  ADD KEY `anggota_jurusan_smk` (`anggota_jurusan_smk`),
  ADD KEY `anggota_bidang_studi` (`anggota_bidang_studi`),
  ADD KEY `anggota_parpol` (`anggota_parpol`),
  ADD KEY `anggota_pr_kec` (`anggota_pr_kec`),
  ADD KEY `anggota_pr_jabatan` (`anggota_pr_jabatan`),
  ADD KEY `anggota_pr_mk` (`anggota_pr_mk`),
  ADD KEY `anggota_pr_des` (`anggota_pr_des`),
  ADD KEY `anggota_pac_kec` (`anggota_pac_kec`),
  ADD KEY `anggota_pac_jabatan` (`anggota_pac_jabatan`),
  ADD KEY `anggota_pac_mk` (`anggota_pac_mk`),
  ADD KEY `anggota_pc_jabatan` (`anggota_pc_jabatan`),
  ADD KEY `anggota_pc_mk` (`anggota_pc_mk`);

--
-- Indeks untuk tabel `tb_berat_badan`
--
ALTER TABLE `tb_berat_badan`
  ADD PRIMARY KEY (`berat_badan_id`);

--
-- Indeks untuk tabel `tb_bidang_studi`
--
ALTER TABLE `tb_bidang_studi`
  ADD PRIMARY KEY (`bidang_studi_id`);

--
-- Indeks untuk tabel `tb_districts`
--
ALTER TABLE `tb_districts`
  ADD PRIMARY KEY (`districts_id`);

--
-- Indeks untuk tabel `tb_golongan_darah`
--
ALTER TABLE `tb_golongan_darah`
  ADD PRIMARY KEY (`golongan_darah_id`);

--
-- Indeks untuk tabel `tb_jabatan_pac`
--
ALTER TABLE `tb_jabatan_pac`
  ADD PRIMARY KEY (`jabatan_pac_id`);

--
-- Indeks untuk tabel `tb_jabatan_pc`
--
ALTER TABLE `tb_jabatan_pc`
  ADD PRIMARY KEY (`jabatan_pc_id`);

--
-- Indeks untuk tabel `tb_jabatan_pr`
--
ALTER TABLE `tb_jabatan_pr`
  ADD PRIMARY KEY (`jabatan_pr_id`);

--
-- Indeks untuk tabel `tb_jurusan_smk`
--
ALTER TABLE `tb_jurusan_smk`
  ADD PRIMARY KEY (`jurusan_smk_id`);

--
-- Indeks untuk tabel `tb_masa_khidmat`
--
ALTER TABLE `tb_masa_khidmat`
  ADD PRIMARY KEY (`masa_khidmat_id`);

--
-- Indeks untuk tabel `tb_partai`
--
ALTER TABLE `tb_partai`
  ADD PRIMARY KEY (`partai_id`);

--
-- Indeks untuk tabel `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`pekerjaan_id`);

--
-- Indeks untuk tabel `tb_pendapatan`
--
ALTER TABLE `tb_pendapatan`
  ADD PRIMARY KEY (`pendapatan_id`);

--
-- Indeks untuk tabel `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`pendidikan_id`);

--
-- Indeks untuk tabel `tb_pernikahan`
--
ALTER TABLE `tb_pernikahan`
  ADD PRIMARY KEY (`pernikahan_id`);

--
-- Indeks untuk tabel `tb_regencies`
--
ALTER TABLE `tb_regencies`
  ADD PRIMARY KEY (`regencies_id`);

--
-- Indeks untuk tabel `tb_riwayat_diklat`
--
ALTER TABLE `tb_riwayat_diklat`
  ADD PRIMARY KEY (`riwayat_diklat_id`);

--
-- Indeks untuk tabel `tb_rt`
--
ALTER TABLE `tb_rt`
  ADD PRIMARY KEY (`rt_id`);

--
-- Indeks untuk tabel `tb_rw`
--
ALTER TABLE `tb_rw`
  ADD PRIMARY KEY (`rw_id`);

--
-- Indeks untuk tabel `tb_tinggi_badan`
--
ALTER TABLE `tb_tinggi_badan`
  ADD PRIMARY KEY (`tinggi_badan_id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_id` (`anggota_id`);

--
-- Indeks untuk tabel `tb_villages`
--
ALTER TABLE `tb_villages`
  ADD PRIMARY KEY (`villages_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_berat_badan`
--
ALTER TABLE `tb_berat_badan`
  MODIFY `berat_badan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_bidang_studi`
--
ALTER TABLE `tb_bidang_studi`
  MODIFY `bidang_studi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_golongan_darah`
--
ALTER TABLE `tb_golongan_darah`
  MODIFY `golongan_darah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan_pac`
--
ALTER TABLE `tb_jabatan_pac`
  MODIFY `jabatan_pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan_pc`
--
ALTER TABLE `tb_jabatan_pc`
  MODIFY `jabatan_pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan_pr`
--
ALTER TABLE `tb_jabatan_pr`
  MODIFY `jabatan_pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan_smk`
--
ALTER TABLE `tb_jurusan_smk`
  MODIFY `jurusan_smk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_masa_khidmat`
--
ALTER TABLE `tb_masa_khidmat`
  MODIFY `masa_khidmat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_partai`
--
ALTER TABLE `tb_partai`
  MODIFY `partai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_pendapatan`
--
ALTER TABLE `tb_pendapatan`
  MODIFY `pendapatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `pendidikan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pernikahan`
--
ALTER TABLE `tb_pernikahan`
  MODIFY `pernikahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayat_diklat`
--
ALTER TABLE `tb_riwayat_diklat`
  MODIFY `riwayat_diklat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_rt`
--
ALTER TABLE `tb_rt`
  MODIFY `rt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_rw`
--
ALTER TABLE `tb_rw`
  MODIFY `rw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_tinggi_badan`
--
ALTER TABLE `tb_tinggi_badan`
  MODIFY `tinggi_badan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`anggota_tempat_lahir`) REFERENCES `tb_regencies` (`regencies_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_10` FOREIGN KEY (`anggota_pekerjaan`) REFERENCES `tb_pekerjaan` (`pekerjaan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_11` FOREIGN KEY (`anggota_pekerjaan_istri`) REFERENCES `tb_pekerjaan` (`pekerjaan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_12` FOREIGN KEY (`anggota_pendapatan`) REFERENCES `tb_pendapatan` (`pendapatan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_13` FOREIGN KEY (`anggota_pendapatan_istri`) REFERENCES `tb_pendapatan` (`pendapatan_id`),
  ADD CONSTRAINT `tb_anggota_ibfk_14` FOREIGN KEY (`anggota_pendidikan`) REFERENCES `tb_pendidikan` (`pendidikan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_15` FOREIGN KEY (`anggota_jurusan_smk`) REFERENCES `tb_jurusan_smk` (`jurusan_smk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_16` FOREIGN KEY (`anggota_bidang_studi`) REFERENCES `tb_bidang_studi` (`bidang_studi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_17` FOREIGN KEY (`anggota_parpol`) REFERENCES `tb_partai` (`partai_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_18` FOREIGN KEY (`anggota_pr_kec`) REFERENCES `tb_districts` (`districts_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_19` FOREIGN KEY (`anggota_pr_jabatan`) REFERENCES `tb_jabatan_pr` (`jabatan_pr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`anggota_golongan_darah`) REFERENCES `tb_golongan_darah` (`golongan_darah_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_20` FOREIGN KEY (`anggota_pr_mk`) REFERENCES `tb_masa_khidmat` (`masa_khidmat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_22` FOREIGN KEY (`anggota_pac_kec`) REFERENCES `tb_districts` (`districts_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_23` FOREIGN KEY (`anggota_pac_jabatan`) REFERENCES `tb_jabatan_pac` (`jabatan_pac_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_24` FOREIGN KEY (`anggota_pac_mk`) REFERENCES `tb_masa_khidmat` (`masa_khidmat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_25` FOREIGN KEY (`anggota_pc_jabatan`) REFERENCES `tb_jabatan_pc` (`jabatan_pc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_26` FOREIGN KEY (`anggota_pc_mk`) REFERENCES `tb_masa_khidmat` (`masa_khidmat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_3` FOREIGN KEY (`anggota_tinggi_badan`) REFERENCES `tb_tinggi_badan` (`tinggi_badan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_4` FOREIGN KEY (`anggota_berat_badan`) REFERENCES `tb_berat_badan` (`berat_badan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_5` FOREIGN KEY (`anggota_pernikahan`) REFERENCES `tb_pernikahan` (`pernikahan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_6` FOREIGN KEY (`anggota_domisili_kec`) REFERENCES `tb_districts` (`districts_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_7` FOREIGN KEY (`anggota_rt`) REFERENCES `tb_rt` (`rt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_8` FOREIGN KEY (`anggota_rw`) REFERENCES `tb_rw` (`rw_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_9` FOREIGN KEY (`anggota_domisili_des`) REFERENCES `tb_villages` (`villages_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `tb_anggota` (`anggota_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
