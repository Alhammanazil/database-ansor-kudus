-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Okt 2024 pada 05.24
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
  `anggota_email` varchar(64) NOT NULL,
  `anggota_nama` varchar(256) NOT NULL,
  `anggota_nik` varchar(16) NOT NULL,
  `anggota_tempat_lahir` int(11) NOT NULL,
  `anggota_tanggal_lahir` date NOT NULL,
  `anggota_golongan_darah` int(11) NOT NULL,
  `anggota_tinggi_badan` int(11) NOT NULL,
  `anggota_berat_badan` int(11) NOT NULL,
  `anggota_ayah` int(128) NOT NULL,
  `anggota_ibu` varchar(128) NOT NULL,
  `anggota_pernikahan` int(11) NOT NULL,
  `anggota_istri` varchar(128) NOT NULL,
  `anggota_anak_lk` int(11) NOT NULL,
  `anggota_anak_pr` int(11) NOT NULL,
  `anggota_npwp` int(11) NOT NULL,
  `anggota_bpjs` int(11) NOT NULL,
  `anggota_domisili_kec` int(11) NOT NULL,
  `anggota_domisili_des` int(11) NOT NULL,
  `anggota_rt` int(11) NOT NULL,
  `anggota_rw` int(11) NOT NULL,
  `anggota_hp` int(11) NOT NULL,
  `anggota_fb` int(11) NOT NULL,
  `anggota_ig` int(11) NOT NULL,
  `anggota_tiktok` int(11) NOT NULL,
  `anggota_yt` int(11) NOT NULL,
  `anggota_twitter` int(11) NOT NULL,
  `anggota_pekerjaan` int(11) NOT NULL,
  `anggota_sistem_kerja` int(11) NOT NULL,
  `anggota_nama_tempat_kerja` varchar(255) NOT NULL,
  `anggota_alamat_tempat_kerja` int(255) NOT NULL,
  `anggota_pekerjaan_istri` int(11) NOT NULL,
  `anggota_pendapatan` int(11) NOT NULL,
  `anggota_pendapatan_istri` int(11) NOT NULL,
  `anggota_pendidikan` int(11) NOT NULL,
  `anggota_jurusan_smk` int(11) NOT NULL,
  `anggota_bidang_studi` int(11) NOT NULL,
  `anggota_nama_pendidikan` varchar(255) NOT NULL,
  `anggota_nama_pesantren` varchar(255) NOT NULL,
  `anggota_nama_madin` varchar(255) NOT NULL,
  `anggota_ipnu` int(11) NOT NULL,
  `anggota_pmii` int(11) NOT NULL,
  `anggota_dema_bem` int(11) NOT NULL,
  `anggota_organisasi_lain` varchar(255) NOT NULL,
  `anggota_parpol` int(11) NOT NULL,
  `anggota_pr_kec` int(11) NOT NULL,
  `anggota_pr_des` int(11) NOT NULL,
  `anggota_pr_jabatan` int(11) NOT NULL,
  `anggota_pr_mk` int(11) NOT NULL,
  `anggota_pac_kec` int(11) NOT NULL,
  `anggota_pac_jabatan` int(11) NOT NULL,
  `anggota_pac_mk` int(11) NOT NULL,
  `anggota_pc_jabatan` int(11) NOT NULL,
  `anggota_pc_mk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `districts_id` varchar(10) NOT NULL,
  `districts_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_districts`
--

INSERT INTO `tb_districts` (`districts_id`, `districts_name`) VALUES
('33.19.01', 'Kaliwungu'),
('33.19.02', 'Kota Kudus'),
('33.19.03', 'Jati'),
('33.19.04', 'Undaan'),
('33.19.05', 'Mejobo'),
('33.19.06', 'Jekulo'),
('33.19.07', 'Bae'),
('33.19.08', 'Gebog'),
('33.19.09', 'Dawe');

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
  `regencies_id` varchar(10) NOT NULL,
  `regencies_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_regencies`
--

INSERT INTO `tb_regencies` (`regencies_id`, `regencies_name`) VALUES
('11.01', 'ACEH SELATAN'),
('11.02', 'ACEH TENGGARA'),
('11.03', 'ACEH TIMUR'),
('11.04', 'ACEH TENGAH'),
('11.05', 'ACEH BARAT'),
('11.06', 'ACEH BESAR'),
('11.07', 'PIDIE'),
('11.08', 'ACEH UTARA'),
('11.09', 'SIMEULUE'),
('11.10', 'ACEH SINGKIL'),
('11.11', 'BIREUEN'),
('11.12', 'ACEH BARAT DAYA'),
('11.13', 'GAYO LUES'),
('11.14', 'ACEH JAYA'),
('11.15', 'NAGAN RAYA'),
('11.16', 'ACEH TAMIANG'),
('11.17', 'BENER MERIAH'),
('11.18', 'PIDIE JAYA'),
('11.71', 'KOTA BANDA ACEH'),
('11.72', 'KOTA SABANG'),
('11.73', 'KOTA LHOKSEUMAWE'),
('11.74', 'KOTA LANGSA'),
('11.75', 'KOTA SUBULUSSALAM'),
('12.01', 'TAPANULI TENGAH'),
('12.02', 'TAPANULI UTARA'),
('12.03', 'TAPANULI SELATAN'),
('12.04', 'NIAS'),
('12.05', 'LANGKAT'),
('12.06', 'KARO'),
('12.07', 'DELI SERDANG'),
('12.08', 'SIMALUNGUN'),
('12.09', 'ASAHAN'),
('12.10', 'LABUHANBATU'),
('12.11', 'DAIRI'),
('12.12', 'TOBA'),
('12.13', 'MANDAILING NATAL'),
('12.14', 'NIAS SELATAN'),
('12.15', 'PAKPAK BHARAT'),
('12.16', 'HUMBANG HASUNDUTAN'),
('12.17', 'SAMOSIR'),
('12.18', 'SERDANG BEDAGAI'),
('12.19', 'BATU BARA'),
('12.20', 'PADANG LAWAS UTARA'),
('12.21', 'PADANG LAWAS'),
('12.22', 'LABUHANBATU SELATAN'),
('12.23', 'LABUHANBATU UTARA'),
('12.24', 'NIAS UTARA'),
('12.25', 'NIAS BARAT'),
('12.71', 'KOTA MEDAN'),
('12.72', 'KOTA PEMATANGSIANTAR'),
('12.73', 'KOTA SIBOLGA'),
('12.74', 'KOTA TANJUNG BALAI'),
('12.75', 'KOTA BINJAI'),
('12.76', 'KOTA TEBING TINGGI'),
('12.77', 'KOTA PADANGSIDIMPUAN'),
('12.78', 'KOTA GUNUNGSITOLI'),
('13.01', 'PESISIR SELATAN'),
('13.02', 'SOLOK'),
('13.03', 'SIJUNJUNG'),
('13.04', 'TANAH DATAR'),
('13.05', 'PADANG PARIAMAN'),
('13.06', 'AGAM'),
('13.07', 'LIMA PULUH KOTA'),
('13.08', 'PASAMAN'),
('13.09', 'KEPULAUAN MENTAWAI'),
('13.10', 'DHARMASRAYA'),
('13.11', 'SOLOK SELATAN'),
('13.12', 'PASAMAN BARAT'),
('13.71', 'KOTA PADANG'),
('13.72', 'KOTA SOLOK'),
('13.73', 'KOTA SAWAHLUNTO'),
('13.74', 'KOTA PADANG PANJANG'),
('13.75', 'KOTA BUKITTINGGI'),
('13.76', 'KOTA PAYAKUMBUH'),
('13.77', 'KOTA PARIAMAN'),
('14.01', 'KAMPAR'),
('14.02', 'INDRAGIRI HULU'),
('14.03', 'BENGKALIS'),
('14.04', 'INDRAGIRI HILIR'),
('14.05', 'PELALAWAN'),
('14.06', 'ROKAN HULU'),
('14.07', 'ROKAN HILIR'),
('14.08', 'SIAK'),
('14.09', 'KUANTAN SINGINGI'),
('14.10', 'KEPULAUAN MERANTI'),
('14.71', 'KOTA PEKANBARU'),
('14.72', 'KOTA DUMAI'),
('15.01', 'KERINCI'),
('15.02', 'MERANGIN'),
('15.03', 'SAROLANGUN'),
('15.04', 'BATANGHARI'),
('15.05', 'MUARO JAMBI'),
('15.06', 'TANJUNG JABUNG BARAT'),
('15.07', 'TANJUNG JABUNG TIMUR'),
('15.08', 'BUNGO'),
('15.09', 'TEBO'),
('15.71', 'KOTA JAMBI'),
('15.72', 'KOTA SUNGAI PENUH'),
('16.01', 'OGAN KOMERING ULU'),
('16.02', 'OGAN KOMERING ILIR'),
('16.03', 'MUARA ENIM'),
('16.04', 'LAHAT'),
('16.05', 'MUSI RAWAS'),
('16.06', 'MUSI BANYUASIN'),
('16.07', 'BANYUASIN'),
('16.08', 'OGAN KOMERING ULU TIMUR'),
('16.09', 'OGAN KOMERING ULU SELATAN'),
('16.10', 'OGAN ILIR'),
('16.11', 'EMPAT LAWANG'),
('16.12', 'PENUKAL ABAB LEMATANG ILIR'),
('16.13', 'MUSI RAWAS UTARA'),
('16.71', 'KOTA PALEMBANG'),
('16.72', 'KOTA PAGAR ALAM'),
('16.73', 'KOTA LUBUK LINGGAU'),
('16.74', 'KOTA PRABUMULIH'),
('17.01', 'BENGKULU SELATAN'),
('17.02', 'REJANG LEBONG'),
('17.03', 'BENGKULU UTARA'),
('17.04', 'KAUR'),
('17.05', 'SELUMA'),
('17.06', 'MUKO MUKO'),
('17.07', 'LEBONG'),
('17.08', 'KEPAHIANG'),
('17.09', 'BENGKULU TENGAH'),
('17.71', 'KOTA BENGKULU'),
('18.01', 'LAMPUNG SELATAN'),
('18.02', 'LAMPUNG TENGAH'),
('18.03', 'LAMPUNG UTARA'),
('18.04', 'LAMPUNG BARAT'),
('18.05', 'TULANG BAWANG'),
('18.06', 'TANGGAMUS'),
('18.07', 'LAMPUNG TIMUR'),
('18.08', 'WAY KANAN'),
('18.09', 'PESAWARAN'),
('18.10', 'PRINGSEWU'),
('18.11', 'MESUJI'),
('18.12', 'TULANG BAWANG BARAT'),
('18.13', 'PESISIR BARAT'),
('18.71', 'KOTA BANDAR LAMPUNG'),
('18.72', 'KOTA METRO'),
('19.01', 'BANGKA'),
('19.02', 'BELITUNG'),
('19.03', 'BANGKA SELATAN'),
('19.04', 'BANGKA TENGAH'),
('19.05', 'BANGKA BARAT'),
('19.06', 'BELITUNG TIMUR'),
('19.71', 'KOTA PANGKAL PINANG'),
('21.01', 'BINTAN'),
('21.02', 'KARIMUN'),
('21.03', 'NATUNA'),
('21.04', 'LINGGA'),
('21.05', 'KEPULAUAN ANAMBAS'),
('21.71', 'KOTA BATAM'),
('21.72', 'KOTA TANJUNG PINANG'),
('31.01', 'ADM. KEP. SERIBU'),
('31.71', 'KOTA ADM. JAKARTA PUSAT'),
('31.72', 'KOTA ADM. JAKARTA UTARA'),
('31.73', 'KOTA ADM. JAKARTA BARAT'),
('31.74', 'KOTA ADM. JAKARTA SELATAN'),
('31.75', 'KOTA ADM. JAKARTA TIMUR'),
('32.01', 'BOGOR'),
('32.02', 'SUKABUMI'),
('32.03', 'CIANJUR'),
('32.04', 'BANDUNG'),
('32.05', 'GARUT'),
('32.06', 'TASIKMALAYA'),
('32.07', 'CIAMIS'),
('32.08', 'KUNINGAN'),
('32.09', 'CIREBON'),
('32.10', 'MAJALENGKA'),
('32.11', 'SUMEDANG'),
('32.12', 'INDRAMAYU'),
('32.13', 'SUBANG'),
('32.14', 'PURWAKARTA'),
('32.15', 'KARAWANG'),
('32.16', 'BEKASI'),
('32.17', 'BANDUNG BARAT'),
('32.18', 'PANGANDARAN'),
('32.71', 'KOTA BOGOR'),
('32.72', 'KOTA SUKABUMI'),
('32.73', 'KOTA BANDUNG'),
('32.74', 'KOTA CIREBON'),
('32.75', 'KOTA BEKASI'),
('32.76', 'KOTA DEPOK'),
('32.77', 'KOTA CIMAHI'),
('32.78', 'KOTA TASIKMALAYA'),
('32.79', 'KOTA BANJAR'),
('33.01', 'CILACAP'),
('33.02', 'BANYUMAS'),
('33.03', 'PURBALINGGA'),
('33.04', 'BANJARNEGARA'),
('33.05', 'KEBUMEN'),
('33.06', 'PURWOREJO'),
('33.07', 'WONOSOBO'),
('33.08', 'MAGELANG'),
('33.09', 'BOYOLALI'),
('33.10', 'KLATEN'),
('33.11', 'SUKOHARJO'),
('33.12', 'WONOGIRI'),
('33.13', 'KARANGANYAR'),
('33.14', 'SRAGEN'),
('33.15', 'GROBOGAN'),
('33.16', 'BLORA'),
('33.17', 'REMBANG'),
('33.18', 'PATI'),
('33.19', 'KUDUS'),
('33.20', 'JEPARA'),
('33.21', 'DEMAK'),
('33.22', 'SEMARANG'),
('33.23', 'TEMANGGUNG'),
('33.24', 'KENDAL'),
('33.25', 'BATANG'),
('33.26', 'PEKALONGAN'),
('33.27', 'PEMALANG'),
('33.28', 'TEGAL'),
('33.29', 'BREBES'),
('33.71', 'KOTA MAGELANG'),
('33.72', 'KOTA SURAKARTA'),
('33.73', 'KOTA SALATIGA'),
('33.74', 'KOTA SEMARANG'),
('33.75', 'KOTA PEKALONGAN'),
('33.76', 'KOTA TEGAL'),
('34.01', 'KULON PROGO'),
('34.02', 'BANTUL'),
('34.03', 'GUNUNGKIDUL'),
('34.04', 'SLEMAN'),
('34.71', 'KOTA YOGYAKARTA'),
('35.01', 'PACITAN'),
('35.02', 'PONOROGO'),
('35.03', 'TRENGGALEK'),
('35.04', 'TULUNGAGUNG'),
('35.05', 'BLITAR'),
('35.06', 'KEDIRI'),
('35.07', 'MALANG'),
('35.08', 'LUMAJANG'),
('35.09', 'JEMBER'),
('35.10', 'BANYUWANGI'),
('35.11', 'BONDOWOSO'),
('35.12', 'SITUBONDO'),
('35.13', 'PROBOLINGGO'),
('35.14', 'PASURUAN'),
('35.15', 'SIDOARJO'),
('35.16', 'MOJOKERTO'),
('35.17', 'JOMBANG'),
('35.18', 'NGANJUK'),
('35.19', 'MADIUN'),
('35.20', 'MAGETAN'),
('35.21', 'NGAWI'),
('35.22', 'BOJONEGORO'),
('35.23', 'TUBAN'),
('35.24', 'LAMONGAN'),
('35.25', 'GRESIK'),
('35.26', 'BANGKALAN'),
('35.27', 'SAMPANG'),
('35.28', 'PAMEKASAN'),
('35.29', 'SUMENEP'),
('35.71', 'KOTA KEDIRI'),
('35.72', 'KOTA BLITAR'),
('35.73', 'KOTA MALANG'),
('35.74', 'KOTA PROBOLINGGO'),
('35.75', 'KOTA PASURUAN'),
('35.76', 'KOTA MOJOKERTO'),
('35.77', 'KOTA MADIUN'),
('35.78', 'KOTA SURABAYA'),
('35.79', 'KOTA BATU'),
('36.01', 'PANDEGLANG'),
('36.02', 'LEBAK'),
('36.03', 'TANGERANG'),
('36.04', 'SERANG'),
('36.71', 'KOTA TANGERANG'),
('36.72', 'KOTA CILEGON'),
('36.73', 'KOTA SERANG'),
('36.74', 'KOTA TANGERANG SELATAN'),
('51.01', 'JEMBRANA'),
('51.02', 'TABANAN'),
('51.03', 'BADUNG'),
('51.04', 'GIANYAR'),
('51.05', 'KLUNGKUNG'),
('51.06', 'BANGLI'),
('51.07', 'KARANGASEM'),
('51.08', 'BULELENG'),
('51.71', 'KOTA DENPASAR'),
('52.01', 'LOMBOK BARAT'),
('52.02', 'LOMBOK TENGAH'),
('52.03', 'LOMBOK TIMUR'),
('52.04', 'SUMBAWA'),
('52.05', 'DOMPU'),
('52.06', 'BIMA'),
('52.07', 'SUMBAWA BARAT'),
('52.08', 'LOMBOK UTARA'),
('52.71', 'KOTA MATARAM'),
('52.72', 'KOTA BIMA'),
('53.01', 'KUPANG'),
('53.02', 'KAB TIMOR TENGAH SELATAN'),
('53.03', 'TIMOR TENGAH UTARA'),
('53.04', 'BELU'),
('53.05', 'ALOR'),
('53.06', 'FLORES TIMUR'),
('53.07', 'SIKKA'),
('53.08', 'ENDE'),
('53.09', 'NGADA'),
('53.10', 'MANGGARAI'),
('53.11', 'SUMBA TIMUR'),
('53.12', 'SUMBA BARAT'),
('53.13', 'LEMBATA'),
('53.14', 'ROTE NDAO'),
('53.15', 'MANGGARAI BARAT'),
('53.16', 'NAGEKEO'),
('53.17', 'SUMBA TENGAH'),
('53.18', 'SUMBA BARAT DAYA'),
('53.19', 'MANGGARAI TIMUR'),
('53.20', 'SABU RAIJUA'),
('53.21', 'MALAKA'),
('53.71', 'KOTA KUPANG'),
('61.01', 'SAMBAS'),
('61.02', 'MEMPAWAH'),
('61.03', 'SANGGAU'),
('61.04', 'KETAPANG'),
('61.05', 'SINTANG'),
('61.06', 'KAPUAS HULU'),
('61.07', 'BENGKAYANG'),
('61.08', 'LANDAK'),
('61.09', 'SEKADAU'),
('61.10', 'MELAWI'),
('61.11', 'KAYONG UTARA'),
('61.12', 'KUBU RAYA'),
('61.71', 'KOTA PONTIANAK'),
('61.72', 'KOTA SINGKAWANG'),
('62.01', 'KOTAWARINGIN BARAT'),
('62.02', 'KOTAWARINGIN TIMUR'),
('62.03', 'KAPUAS'),
('62.04', 'BARITO SELATAN'),
('62.05', 'BARITO UTARA'),
('62.06', 'KATINGAN'),
('62.07', 'SERUYAN'),
('62.08', 'SUKAMARA'),
('62.09', 'LAMANDAU'),
('62.10', 'GUNUNG MAS'),
('62.11', 'PULANG PISAU'),
('62.12', 'MURUNG RAYA'),
('62.13', 'BARITO TIMUR'),
('62.71', 'KOTA PALANGKARAYA'),
('63.01', 'TANAH LAUT'),
('63.02', 'KOTABARU'),
('63.03', 'BANJAR'),
('63.04', 'BARITO KUALA'),
('63.05', 'TAPIN'),
('63.06', 'HULU SUNGAI SELATAN'),
('63.07', 'HULU SUNGAI TENGAH'),
('63.08', 'HULU SUNGAI UTARA'),
('63.09', 'TABALONG'),
('63.10', 'TANAH BUMBU'),
('63.11', 'BALANGAN'),
('63.71', 'KOTA BANJARMASIN'),
('63.72', 'KOTA BANJARBARU'),
('64.01', 'PASER'),
('64.02', 'KUTAI KARTANEGARA'),
('64.03', 'BERAU'),
('64.07', 'KUTAI BARAT'),
('64.08', 'KUTAI TIMUR'),
('64.09', 'PENAJAM PASER UTARA'),
('64.11', 'MAHAKAM ULU'),
('64.71', 'KOTA BALIKPAPAN'),
('64.72', 'KOTA SAMARINDA'),
('64.74', 'KOTA BONTANG'),
('65.01', 'BULUNGAN'),
('65.02', 'MALINAU'),
('65.03', 'NUNUKAN'),
('65.04', 'TANA TIDUNG'),
('65.71', 'KOTA TARAKAN'),
('71.01', 'BOLAANG MONGONDOW'),
('71.02', 'MINAHASA'),
('71.03', 'KEPULAUAN SANGIHE'),
('71.04', 'KEPULAUAN TALAUD'),
('71.05', 'MINAHASA SELATAN'),
('71.06', 'MINAHASA UTARA'),
('71.07', 'MINAHASA TENGGARA'),
('71.08', 'BOLAANG MONGONDOW UTARA'),
('71.09', 'KEP. SIAU TAGULANDANG BIARO'),
('71.10', 'BOLAANG MONGONDOW TIMUR'),
('71.11', 'BOLAANG MONGONDOW SELATAN'),
('71.71', 'KOTA MANADO'),
('71.72', 'KOTA BITUNG'),
('71.73', 'KOTA TOMOHON'),
('71.74', 'KOTA KOTAMOBAGU'),
('72.01', 'BANGGAI'),
('72.02', 'POSO'),
('72.03', 'DONGGALA'),
('72.04', 'TOLI TOLI'),
('72.05', 'BUOL'),
('72.06', 'MOROWALI'),
('72.07', 'BANGGAI KEPULAUAN'),
('72.08', 'PARIGI MOUTONG'),
('72.09', 'TOJO UNA UNA'),
('72.10', 'SIGI'),
('72.11', 'BANGGAI LAUT'),
('72.12', 'MOROWALI UTARA'),
('72.71', 'KOTA PALU'),
('73.01', 'KEPULAUAN SELAYAR'),
('73.02', 'BULUKUMBA'),
('73.03', 'BANTAENG'),
('73.04', 'JENEPONTO'),
('73.05', 'TAKALAR'),
('73.06', 'GOWA'),
('73.07', 'SINJAI'),
('73.08', 'BONE'),
('73.09', 'MAROS'),
('73.10', 'PANGKAJENE KEPULAUAN'),
('73.11', 'BARRU'),
('73.12', 'SOPPENG'),
('73.13', 'WAJO'),
('73.14', 'SIDENRENG RAPPANG'),
('73.15', 'PINRANG'),
('73.16', 'ENREKANG'),
('73.17', 'LUWU'),
('73.18', 'TANA TORAJA'),
('73.22', 'LUWU UTARA'),
('73.24', 'LUWU TIMUR'),
('73.26', 'TORAJA UTARA'),
('73.71', 'KOTA MAKASSAR'),
('73.72', 'KOTA PARE PARE'),
('73.73', 'KOTA PALOPO'),
('74.01', 'KOLAKA'),
('74.02', 'KONAWE'),
('74.03', 'MUNA'),
('74.04', 'BUTON'),
('74.05', 'KONAWE SELATAN'),
('74.06', 'BOMBANA'),
('74.07', 'WAKATOBI'),
('74.08', 'KOLAKA UTARA'),
('74.09', 'KONAWE UTARA'),
('74.10', 'BUTON UTARA'),
('74.11', 'KOLAKA TIMUR'),
('74.12', 'KONAWE KEPULAUAN'),
('74.13', 'MUNA BARAT'),
('74.14', 'BUTON TENGAH'),
('74.15', 'BUTON SELATAN'),
('74.71', 'KOTA KENDARI'),
('74.72', 'KOTA BAU BAU'),
('75.01', 'GORONTALO'),
('75.02', 'BOALEMO'),
('75.03', 'BONE BOLANGO'),
('75.04', 'PAHUWATO'),
('75.05', 'GORONTALO UTARA'),
('75.71', 'KOTA GORONTALO'),
('76.01', 'PASANGKAYU'),
('76.02', 'MAMUJU'),
('76.03', 'MAMASA'),
('76.04', 'POLEWALI MANDAR'),
('76.05', 'MAJENE'),
('76.06', 'MAMUJU TENGAH'),
('81.01', 'MALUKU TENGAH'),
('81.02', 'MALUKU TENGGARA'),
('81.03', 'KEPULAUAN TANIMBAR'),
('81.04', 'BURU'),
('81.05', 'SERAM BAGIAN TIMUR'),
('81.06', 'SERAM BAGIAN BARAT'),
('81.07', 'KEPULAUAN ARU'),
('81.08', 'MALUKU BARAT DAYA'),
('81.09', 'BURU SELATAN'),
('81.71', 'KOTA AMBON'),
('81.72', 'KOTA TUAL'),
('82.01', 'HALMAHERA BARAT'),
('82.02', 'HALMAHERA TENGAH'),
('82.03', 'HALMAHERA UTARA'),
('82.04', 'HALMAHERA SELATAN'),
('82.05', 'KEPULAUAN SULA'),
('82.06', 'HALMAHERA TIMUR'),
('82.07', 'PULAU MOROTAI'),
('82.08', 'PULAU TALIABU'),
('82.71', 'KOTA TERNATE'),
('82.72', 'KOTA TIDORE KEPULAUAN'),
('91.01', 'MERAUKE'),
('91.02', 'JAYAWIJAYA'),
('91.03', 'JAYAPURA'),
('91.04', 'NABIRE'),
('91.05', 'KEPULAUAN YAPEN'),
('91.06', 'BIAK NUMFOR'),
('91.07', 'PUNCAK JAYA'),
('91.08', 'PANIAI'),
('91.09', 'MIMIKA'),
('91.10', 'SARMI'),
('91.11', 'KEEROM'),
('91.12', 'PEGUNUNGAN BINTANG'),
('91.13', 'YAHUKIMO'),
('91.14', 'TOLIKARA'),
('91.15', 'WAROPEN'),
('91.16', 'BOVEN DIGOEL'),
('91.17', 'MAPPI'),
('91.18', 'ASMAT'),
('91.19', 'SUPIORI'),
('91.20', 'MAMBERAMO RAYA'),
('91.21', 'MAMBERAMO TENGAH'),
('91.22', 'YALIMO'),
('91.23', 'LANNY JAYA'),
('91.24', 'NDUGA'),
('91.25', 'PUNCAK'),
('91.26', 'DOGIYAI'),
('91.27', 'INTAN JAYA'),
('91.28', 'DEIYAI'),
('91.71', 'KOTA JAYAPURA'),
('92.01', 'SORONG'),
('92.02', 'MANOKWARI'),
('92.03', 'FAK FAK'),
('92.04', 'SORONG SELATAN'),
('92.05', 'RAJA AMPAT'),
('92.06', 'TELUK BINTUNI'),
('92.07', 'TELUK WONDAMA'),
('92.08', 'KAIMANA'),
('92.09', 'TAMBRAUW'),
('92.10', 'MAYBRAT'),
('92.11', 'MANOKWARI SELATAN'),
('92.12', 'PEGUNUNGAN ARFAK'),
('92.71', 'KOTA SORONG');

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
-- Struktur dari tabel `tb_villages`
--

CREATE TABLE `tb_villages` (
  `villages_id` varchar(20) NOT NULL,
  `districts_id` varchar(10) NOT NULL,
  `villages_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_villages`
--

INSERT INTO `tb_villages` (`villages_id`, `districts_id`, `villages_name`) VALUES
('33.19.01.2001', '33.19.01', 'Bakalankrapyak'),
('33.19.01.2002', '33.19.01', 'Prambatan Kidul'),
('33.19.01.2003', '33.19.01', 'Prambatan Lor'),
('33.19.01.2004', '33.19.01', 'Garung Kidul'),
('33.19.01.2005', '33.19.01', 'Setrokalangan'),
('33.19.01.2006', '33.19.01', 'Banget'),
('33.19.01.2007', '33.19.01', 'Blimbing Kidul'),
('33.19.01.2008', '33.19.01', 'Sidorekso'),
('33.19.01.2009', '33.19.01', 'Gamong'),
('33.19.01.2010', '33.19.01', 'Kedungdowo'),
('33.19.01.2011', '33.19.01', 'Garung Lor'),
('33.19.01.2012', '33.19.01', 'Karangampel'),
('33.19.01.2013', '33.19.01', 'Mijen'),
('33.19.01.2014', '33.19.01', 'Kaliwungu'),
('33.19.01.2015', '33.19.01', 'Papringan'),
('33.19.02.1001', '33.19.02', 'Purwosari'),
('33.19.02.1004', '33.19.02', 'Sunggingan'),
('33.19.02.1005', '33.19.02', 'Panjunan'),
('33.19.02.1006', '33.19.02', 'Wergu Wetan'),
('33.19.02.1007', '33.19.02', 'Wergu Kulon'),
('33.19.02.1008', '33.19.02', 'Mlati Kidul'),
('33.19.02.1009', '33.19.02', 'Mlati Norowito'),
('33.19.02.1017', '33.19.02', 'Kerjasan'),
('33.19.02.1018', '33.19.02', 'Kajeksan'),
('33.19.02.2002', '33.19.02', 'Janggalan'),
('33.19.02.2003', '33.19.02', 'Demangan'),
('33.19.02.2010', '33.19.02', 'Mlati Lor'),
('33.19.02.2011', '33.19.02', 'Nganguk'),
('33.19.02.2012', '33.19.02', 'Kramat'),
('33.19.02.2013', '33.19.02', 'Demaan'),
('33.19.02.2014', '33.19.02', 'Langgardalem'),
('33.19.02.2015', '33.19.02', 'Kauman'),
('33.19.02.2016', '33.19.02', 'Damaran'),
('33.19.02.2019', '33.19.02', 'Krandon'),
('33.19.02.2020', '33.19.02', 'Singocandi'),
('33.19.02.2021', '33.19.02', 'Glantengan'),
('33.19.02.2022', '33.19.02', 'Kaliputu'),
('33.19.02.2023', '33.19.02', 'Barongan'),
('33.19.02.2024', '33.19.02', 'Burikan'),
('33.19.02.2025', '33.19.02', 'Rendeng'),
('33.19.03.2001', '33.19.03', 'Jetiskapuan'),
('33.19.03.2002', '33.19.03', 'Tanjungkarang'),
('33.19.03.2003', '33.19.03', 'Jati Wetan'),
('33.19.03.2004', '33.19.03', 'Pasuruhan Kidul'),
('33.19.03.2005', '33.19.03', 'Pasuruhan Lor'),
('33.19.03.2006', '33.19.03', 'Ploso'),
('33.19.03.2007', '33.19.03', 'Jati Kulon'),
('33.19.03.2008', '33.19.03', 'Getaspejaten'),
('33.19.03.2009', '33.19.03', 'Loram Kulon'),
('33.19.03.2010', '33.19.03', 'Loram Wetan'),
('33.19.03.2011', '33.19.03', 'Jepangpakis'),
('33.19.03.2012', '33.19.03', 'Megawon'),
('33.19.03.2013', '33.19.03', 'Ngembal Kulon'),
('33.19.03.2014', '33.19.03', 'Tumpangkrasak'),
('33.19.04.2001', '33.19.04', 'Wonosoco'),
('33.19.04.2002', '33.19.04', 'Lambangan'),
('33.19.04.2003', '33.19.04', 'Kalirejo'),
('33.19.04.2004', '33.19.04', 'Medini'),
('33.19.04.2005', '33.19.04', 'Sambung'),
('33.19.04.2006', '33.19.04', 'Glagahwaru'),
('33.19.04.2007', '33.19.04', 'Kutuk'),
('33.19.04.2008', '33.19.04', 'Undaan Kidul'),
('33.19.04.2009', '33.19.04', 'Undaan Tengah'),
('33.19.04.2010', '33.19.04', 'Karangrowo'),
('33.19.04.2011', '33.19.04', 'Larikrejo'),
('33.19.04.2012', '33.19.04', 'Undaan Lor'),
('33.19.04.2013', '33.19.04', 'Wates'),
('33.19.04.2014', '33.19.04', 'Ngemplak'),
('33.19.04.2015', '33.19.04', 'Terangmas'),
('33.19.04.2016', '33.19.04', 'Berugenjang'),
('33.19.05.2001', '33.19.05', 'Gulang'),
('33.19.05.2002', '33.19.05', 'Jepang'),
('33.19.05.2003', '33.19.05', 'Payaman'),
('33.19.05.2004', '33.19.05', 'Kirig'),
('33.19.05.2005', '33.19.05', 'Temulus'),
('33.19.05.2006', '33.19.05', 'Kesambi'),
('33.19.05.2007', '33.19.05', 'Jojo'),
('33.19.05.2008', '33.19.05', 'Hadiwarno'),
('33.19.05.2009', '33.19.05', 'Mejobo'),
('33.19.05.2010', '33.19.05', 'Golantepus'),
('33.19.05.2011', '33.19.05', 'Tenggeles'),
('33.19.06.2001', '33.19.06', 'Sadang'),
('33.19.06.2002', '33.19.06', 'Bulungcangkring'),
('33.19.06.2003', '33.19.06', 'Bulung Kulon'),
('33.19.06.2004', '33.19.06', 'Sidomulyo'),
('33.19.06.2005', '33.19.06', 'Gondoharum'),
('33.19.06.2006', '33.19.06', 'Terban'),
('33.19.06.2007', '33.19.06', 'Pladen'),
('33.19.06.2008', '33.19.06', 'Klaling'),
('33.19.06.2009', '33.19.06', 'Jekulo'),
('33.19.06.2010', '33.19.06', 'Hadipolo'),
('33.19.06.2011', '33.19.06', 'Honggosoco'),
('33.19.06.2012', '33.19.06', 'Tanjungrejo'),
('33.19.07.2001', '33.19.07', 'Dersalam'),
('33.19.07.2002', '33.19.07', 'Ngembalrejo'),
('33.19.07.2003', '33.19.07', 'Karangbener'),
('33.19.07.2004', '33.19.07', 'Gondangmanis'),
('33.19.07.2005', '33.19.07', 'Pedawang'),
('33.19.07.2006', '33.19.07', 'Bacin'),
('33.19.07.2007', '33.19.07', 'Panjang'),
('33.19.07.2008', '33.19.07', 'Peganjaran'),
('33.19.07.2009', '33.19.07', 'Purworejo'),
('33.19.07.2010', '33.19.07', 'Bae'),
('33.19.08.2001', '33.19.08', 'Gribig'),
('33.19.08.2002', '33.19.08', 'Klumpit'),
('33.19.08.2003', '33.19.08', 'Getassrabi'),
('33.19.08.2004', '33.19.08', 'Padurenan'),
('33.19.08.2005', '33.19.08', 'Karangmalang'),
('33.19.08.2006', '33.19.08', 'Besito'),
('33.19.08.2007', '33.19.08', 'Jurang'),
('33.19.08.2008', '33.19.08', 'Gondosari'),
('33.19.08.2009', '33.19.08', 'Kedungsari'),
('33.19.08.2010', '33.19.08', 'Menawan'),
('33.19.08.2011', '33.19.08', 'Rahtawu'),
('33.19.09.2001', '33.19.09', 'Samirejo'),
('33.19.09.2002', '33.19.09', 'Cendono'),
('33.19.09.2003', '33.19.09', 'Margorejo'),
('33.19.09.2004', '33.19.09', 'Rejosari'),
('33.19.09.2005', '33.19.09', 'Kandangmas'),
('33.19.09.2006', '33.19.09', 'Glagah Kulon'),
('33.19.09.2007', '33.19.09', 'Tergo'),
('33.19.09.2008', '33.19.09', 'Cranggang'),
('33.19.09.2009', '33.19.09', 'Lau'),
('33.19.09.2010', '33.19.09', 'Piji'),
('33.19.09.2011', '33.19.09', 'Puyoh'),
('33.19.09.2012', '33.19.09', 'Soco'),
('33.19.09.2013', '33.19.09', 'Ternadi'),
('33.19.09.2014', '33.19.09', 'Kajar'),
('33.19.09.2015', '33.19.09', 'Kuwukan'),
('33.19.09.2016', '33.19.09', 'Dukuhwaringin'),
('33.19.09.2017', '33.19.09', 'Japan'),
('33.19.09.2018', '33.19.09', 'Colo');

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
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

INSERT INTO `tb_users` (`id`, `nama_lengkap`, `username`, `password`, `akses`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Albert Einstein', 'alham', '$2y$10$1a.a.OfbIAtFyhTkmRHyZuG50d51KTF3CRL1W5WToOVzJJVHwRH/2', 1, 'master', '2024-08-20 05:37:37', '2024-08-20 05:51:54')

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`anggota_id`);

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
-- Indeks untuk tabel `tb_villages`
--
ALTER TABLE `tb_villages`
  ADD PRIMARY KEY (`villages_id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `pendapatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

--
-- AUTO_INCREMENT untuk tabel `tb_tinggi_badan`
--
ALTER TABLE `tb_tinggi_badan`
  MODIFY `tinggi_badan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
