-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 02:07 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pesantren`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `code_auth` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(11) NOT NULL,
  `tgl_join` date NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`code_auth`, `nama`, `username`, `password`, `level`, `tgl_join`, `gender`) VALUES
('1', 'Admin Pesantren', 'admin', '$2y$10$w8qvAcjkW1Jkrn7RiPpafO/kiCSRLKeJCDVMOiaKoRoiKg.Vog0Yq', 1, '2021-04-01', 'L'),
('55', 'Staffnye Pengasuhanz', 'staff', '$2y$10$3192CBAEg6vr2qm6CGEDN.NtvqQkAvNk4ZMG59OQOH5fKfr.dQu2W', 2, '2021-04-05', 'P'),
('606be0e4d10cd', 'Staff Pengajaran', 'pengajaran', '$2y$10$6vtixbL0JY7T2cmaaM6mnutTlz5OtE3Ko1BVvVTh9YuDxrDBntqUq', 3, '2021-04-06', 'L'),
('606be1a307236', 'Organisasi Santri', 'organtri', '$2y$10$A5TmQD69BJq4zELpfoKBDe6x2tesYDVsaa/HI5samtv7jOuZTHq66', 4, '2021-04-06', 'P'),
('61ef0763657c1', 'Poskestren  AL-Mashduqiah', 'poskestren', '$2y$10$rzqxunOLl3NRE/UxxKNmCe/GEXAphj9z0R705Wej.9Qa2EYHvOA.K', 5, '2022-01-24', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `detaile`
--

CREATE TABLE `detaile` (
  `id_detaile` int(11) NOT NULL,
  `nis` varchar(125) NOT NULL,
  `code_extra` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detaile`
--

INSERT INTO `detaile` (`id_detaile`, `nis`, `code_extra`) VALUES
(2, '3543643523', '607aba789b59b'),
(4, '3543643523', '60a9e1de24199'),
(6, '098765432112', '60856162cf670'),
(7, '3543643523', '60856162cf670');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id_details` varchar(123) NOT NULL,
  `niss` varchar(125) NOT NULL,
  `id_ortu` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id_details`, `niss`, `id_ortu`) VALUES
('21qe3qadsadc2', '098765432112', '605dc7822c102'),
('3weq23r41qae', '3543643523', '60bbae1436557'),
('6122530895342', '45453442', '60bba395779f4'),
('61e91d886d8f9', '12345678999', '61e91b8cad027'),
('esdfw24rwe', '384239742893', '60bba395779f4'),
('esqwdqw3e231sw', '111213141516', '60840c8695860');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_alarm`
--

CREATE TABLE `jadwal_alarm` (
  `code_ja` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(15) NOT NULL,
  `jam_asli` varchar(22) NOT NULL,
  `jam` int(11) NOT NULL,
  `menit` varchar(11) NOT NULL,
  `keterangan` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_alarm`
--

INSERT INTO `jadwal_alarm` (`code_ja`, `tanggal`, `hari`, `jam_asli`, `jam`, `menit`, `keterangan`) VALUES
(99, '2022-01-20', 'selasa', '1345', 13, '45', 'pelajaran mengaji'),
(100, '2022-01-21', 'selasa', '1444', 14, '44', 'olahraga'),
(101, '2022-01-22', 'selasa', '1543', 15, '43', 'hafalan Qur\'an'),
(102, '2022-01-23', 'selasa', '1643', 16, '43', 'kerja bakti'),
(103, '2022-01-24', 'selasa', '1743', 17, '43', 'hehe');

-- --------------------------------------------------------

--
-- Table structure for table `perizinan`
--

CREATE TABLE `perizinan` (
  `code_perizinan` varchar(125) NOT NULL,
  `nis_perizinan` varchar(125) NOT NULL,
  `status_perizinan` varchar(125) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `keterangan_izin` varchar(225) NOT NULL,
  `stat` int(1) NOT NULL,
  `verif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perizinan`
--

INSERT INTO `perizinan` (`code_perizinan`, `nis_perizinan`, `status_perizinan`, `tgl_mulai`, `tgl_selesai`, `keterangan_izin`, `stat`, `verif`) VALUES
('61e9255ed6bea', '12345678999', 'Sakit', '2022-01-20', '2022-01-23 12:15:00', 'Sakit Perut', 1, 0),
('61eafedc49a56', '111213141516', 'Keluar Pondok', '2022-01-22', '2022-01-29 22:49:00', 'xczxz', 0, 0),
('61ef0f3fa0755', '12345678999', 'Sakit', '2022-01-25', '2022-01-27 14:42:00', 'sakit di Acc oleh poskestren', 0, 1),
('dq1qw3q3qd', '3543643523', 'Keluar Pondok', '2021-08-24', '2021-08-26 20:11:00', 'Keluar pondok untuk beli perlengkapan mandi', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `code_prestasi` varchar(35) NOT NULL,
  `nis_prestasi` varchar(25) NOT NULL,
  `prestasi` varchar(145) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`code_prestasi`, `nis_prestasi`, `prestasi`, `tgl`) VALUES
('61e9267a48b0b', '12345678999', 'Juara makan kerupuk', '2022-01-20'),
('sefwr3232w', '384239742893', 'Mbohz', '2021-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `tahfidz`
--

CREATE TABLE `tahfidz` (
  `code_tahfidz` varchar(125) NOT NULL,
  `nis_tahfidz` varchar(125) NOT NULL,
  `pembimbing` varchar(50) NOT NULL,
  `status_tahfidz` varchar(125) NOT NULL,
  `ayat` varchar(5) NOT NULL,
  `surat` varchar(15) NOT NULL,
  `juz` varchar(5) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahfidz`
--

INSERT INTO `tahfidz` (`code_tahfidz`, `nis_tahfidz`, `pembimbing`, `status_tahfidz`, `ayat`, `surat`, `juz`, `tgl_input`) VALUES
('61e922d6032bb', '12345678999', 'Tauhid Sa`dullah, LC', 'TAHFIZH', '50-82', 'Yasin', '26', '2022-01-24'),
('61e9ccfb6a330', '12345678999', 'Tauhid Sa`dullah, LC', 'TAHFIZH', '1-20', 'yasinn', '17', '2022-01-23'),
('61ec409868c60', '12345678999', 'Tauhid Sa`dullah, LC', 'TAHFIZH', '1-21', 'TESTER', '1', '2022-01-22'),
('61ec6a44340a7', '12345678999', 'Tauhid Sa`dullah, LC', 'TAHFIZH', '2-44', 'COBA', '1', '2022-01-21'),
('61edd2c19564e', '3543643523', 'H. Imam Zarkasi, S.E', 'TAHFIZH', '1-4', 'MENCOBA', '10', '2022-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dsantri`
--

CREATE TABLE `tb_dsantri` (
  `nis` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(455) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `code_kamar` varchar(225) NOT NULL,
  `kelas` varchar(45) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(125) NOT NULL,
  `tempat_abituren` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dsantri`
--

INSERT INTO `tb_dsantri` (`nis`, `nama`, `alamat`, `jk`, `tempat_lahir`, `tgl_lahir`, `code_kamar`, `kelas`, `keterangan`, `foto`, `status`, `tempat_abituren`) VALUES
('098765432112', 'Qomariyah', 'Jl.Bumi Datar Negeri no.92 kraksaan ', 'perempuan', 'Probolinggo', '2001-07-24', '60654c980f1e4', '606c508462fb8', 'Santriwati di PP.AL-Mashduqiah ', '8e00cef0369aec8415c6190436cba52f.jpg', 'Santri Aktif', ''),
('111213141516', 'Solehudin', 'Jl. Apa saja yang penting oke no.38 Kraksaan Wetan', 'laki-laki', 'Probolinggo', '2000-02-16', '-', '-', 'Santri di PP.AL-Mashduqiah ', '3b6eaaaee5be48548d1c3d728c8ef566.jpg', 'Alumni', ''),
('12345678999', 'Zahwa', 'Kraksaan Wetan', 'Perempuan', 'Probolinggo', '2020-02-18', '61e91d2508245', '60b1b61fe5be8', 'Santriwati di PP.AL-Mashduqiah ', '79aaa12c32e697de9d5393840faf1962.png', 'Santri aktif', '-'),
('3543643523', 'Fendik ', 'Jl.Kraksaan no 003', 'laki-laki', 'Probolinggo', '2001-03-01', '60845e0ac639a', '60b1b50452ec8', 'Santri di PP.Al-Mashduqiah', 'e057c482606db1badf755efbd8922f57.PNG', 'Santri Aktif', ''),
('384239742893', 'Setianingsih', 'Jl. Apa saja deh no.38 Kraksaan Wetan', 'Perempuan', 'Probolinggo', '2005-04-04', '60654c980f1e4', '60b1b61fe5be8', 'Santriwati di PP.AL-Mashduqiah ', '394b862b8dafba066a6546745dae23c7.png', 'Santri aktif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_extra`
--

CREATE TABLE `tb_extra` (
  `code_extra` varchar(126) NOT NULL,
  `nama_extra` varchar(255) NOT NULL,
  `nama_pembimbing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_extra`
--

INSERT INTO `tb_extra` (`code_extra`, `nama_extra`, `nama_pembimbing`) VALUES
('607aba789b59b', 'Sepak Bola', 'Moh. Sahlan Ali Wafa, S.Pd.I'),
('60856162cf670', 'Qasidah', 'Asmopur, LC'),
('60a9e1de24199', 'Videografi', 'Eko Budianto,M. Pd.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `code_kamar` varchar(55) NOT NULL,
  `wali_kamar` varchar(255) NOT NULL,
  `ruang_kamar` varchar(255) NOT NULL,
  `rayon` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`code_kamar`, `wali_kamar`, `ruang_kamar`, `rayon`, `gender`) VALUES
('60654c980f1e4', 'Septiyaningsih', '1', 'Asean', 'P'),
('60845e0ac639a', 'H. Imam Zarkasi, S.E', '1', 'AL-Kautsar Utara', 'L'),
('61e91d2508245', 'Taufiqur Rahman', '5', 'AT-Taubah', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `code_kelas` varchar(122) NOT NULL,
  `nama_kelas` varchar(125) NOT NULL,
  `no_kls` varchar(11) NOT NULL,
  `kelass` varchar(12) NOT NULL,
  `wali_kelas` varchar(122) NOT NULL,
  `asisten` varchar(122) NOT NULL,
  `marhalah` varchar(128) NOT NULL,
  `lembaga` varchar(128) NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`code_kelas`, `nama_kelas`, `no_kls`, `kelass`, `wali_kelas`, `asisten`, `marhalah`, `lembaga`, `gender`) VALUES
('606c508462fb8', 'AL-Ikhlas', '102', '1B', 'Kofifah', 'Yantii', 'SMP', '1', 'P'),
('60b1b50452ec8', 'AL-Kautsar Selatan bawah', '101', '1B', 'Moh. Sahlan Ali Wafa, S.Pd.I', 'H. Mahfud Yusuf, S.Pd.I', 'SMP', '1', 'L'),
('60b1b61fe5be8', 'AL-Kautsar Selatan bawah', '104', '2D', 'Munawar Nawawi, S.Pd', 'H. Mahfud Yusuf, S.Pd.I', 'SMP', '1', 'P'),
('60bbcd20e1e41', 'AL-Ikhlas', '005', '2B', 'Moh. Adi Putra, S.Pd.I', 'H. Mahfud Yusuf, S.Pd.I', 'MA', '1', 'L'),
('61e91cf8352a5', 'AL-Kautsar Selatan bawah', '007', '2C', 'Taufiqur Rahman', 'H. Mahfud Yusuf, S.Pd.I', 'SMP', '1', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kode_ppdb`
--

CREATE TABLE `tb_kode_ppdb` (
  `id_kode_ppdb` int(11) NOT NULL,
  `kode_pendaftaran` varchar(50) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `dibuat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kode_ppdb`
--

INSERT INTO `tb_kode_ppdb` (`id_kode_ppdb`, `kode_pendaftaran`, `nama_pengirim`, `dibuat`) VALUES
(12, 'PPMDQ214820525', '', '06-03-2021 13:07:11'),
(13, 'PPMDQ2124115186', '', '06-03-2021 13:19:51'),
(14, 'PPMDQ1639487019', '', '06-03-2021 13:30:04'),
(15, 'PPMDQ1658867719', '[object HTMLInputElement]', '06-03-2021 13:31:02'),
(16, 'PPMDQ906114423', '[object HTMLInputElement]', '06-03-2021 13:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsulat`
--

CREATE TABLE `tb_konsulat` (
  `code_konsulat` varchar(55) NOT NULL,
  `pembimbing` varchar(255) NOT NULL,
  `ketua_konsulat` varchar(255) NOT NULL,
  `nis` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_konsulat`
--

INSERT INTO `tb_konsulat` (`code_konsulat`, `pembimbing`, `ketua_konsulat`, `nis`) VALUES
('605e0ff01fa35', 'Mustofa', 'Setya Nugraha', '3543643523');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lembaga`
--

CREATE TABLE `tb_lembaga` (
  `id_lembaga` int(11) NOT NULL,
  `lembagaa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lembaga`
--

INSERT INTO `tb_lembaga` (`id_lembaga`, `lembagaa`) VALUES
(1, 'MTI'),
(2, 'KMI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_marhalah`
--

CREATE TABLE `tb_marhalah` (
  `id_marhalah` int(11) NOT NULL,
  `marhalah` varchar(25) NOT NULL,
  `id_lembaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_marhalah`
--

INSERT INTO `tb_marhalah` (`id_marhalah`, `marhalah`, `id_lembaga`) VALUES
(1, 'SMP', 1),
(2, 'MA', 1),
(3, 'Wustha', 2),
(4, '\'Ulya', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ortu`
--

CREATE TABLE `tb_ortu` (
  `id_ortu` varchar(128) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `agama_ayah` varchar(15) NOT NULL,
  `tetala_ayah` varchar(100) NOT NULL,
  `pend_terakhir_ayah` varchar(25) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `penghasilan_ayah` varchar(50) NOT NULL,
  `no_hp_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `agama_ibu` varchar(15) NOT NULL,
  `tetala_ibu` varchar(100) NOT NULL,
  `pend_akhir_ibu` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `penghasilan_ibu` varchar(50) NOT NULL,
  `no_hp_ibu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ortu`
--

INSERT INTO `tb_ortu` (`id_ortu`, `nama_ayah`, `agama_ayah`, `tetala_ayah`, `pend_terakhir_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `no_hp_ayah`, `nama_ibu`, `agama_ibu`, `tetala_ibu`, `pend_akhir_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_hp_ibu`) VALUES
('605dc7822c102', 'Syarifudin', 'islam', 'Probolinggo,2021-03-01', 'SMP', 'Petani', '500000', '089237846273', 'Maryam', 'islam', 'Probolinggo,2021-03-01', 'SMP', 'Petani', '500000', '089237846273'),
('60840c8695860', 'Suratno', 'islam', 'Probolinggo,03-02-1970', 'SMA', 'PNS', '2000000', '087857642333', 'Suratni', 'islam', 'Probolinggo,03-02-1970', 'SMA', 'PNS', '2000000', '087585761233'),
('60bba395779f4', 'Rahmat', 'islam', 'Probolinggo,1969-02-12', 'SMA', 'Polisi', '2000000', '081982734888', 'Lesty', 'islam', 'Probolinggo,1969-02-12', 'SMA', 'Polisi', '2000000', '081982734888'),
('60bbae1436557', 'Husen', 'islam', 'Jayapura,1970-02-26', 'SMP', 'Petani', '1000000', '085847523665', 'Sumiati', 'islam', 'Jayapura,1970-02-26', 'SMP', 'Petani', '1000000', '085847523665'),
('61e91b8cad027', 'saifi', 'islam', 'Probolinggo,1998-12-18', 'SMA', 'PNS', '5000000', '081853868777', 'laily', 'islam', 'Probolinggo,1998-12-18', 'SMA', 'PNS', '5000000', '081853868777');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ortu_ppdb`
--

CREATE TABLE `tb_ortu_ppdb` (
  `id_ayah` int(11) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `agama_ayah` varchar(15) NOT NULL,
  `tetala_ayah` varchar(100) NOT NULL,
  `pend_terakhir_ayah` varchar(25) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `penghasilan_ayah` varchar(50) NOT NULL,
  `no_hp_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `agama_ibu` varchar(15) NOT NULL,
  `tetala_ibu` varchar(100) NOT NULL,
  `pend_akhir_ibu` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `penghasilan_ibu` varchar(50) NOT NULL,
  `no_hp_ibu` varchar(15) NOT NULL,
  `nisn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ortu_ppdb`
--

INSERT INTO `tb_ortu_ppdb` (`id_ayah`, `nama_ayah`, `agama_ayah`, `tetala_ayah`, `pend_terakhir_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `no_hp_ayah`, `nama_ibu`, `agama_ibu`, `tetala_ibu`, `pend_akhir_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_hp_ibu`, `nisn`) VALUES
(1, '', '', ', 01-01-1950', '', '', '', '', '', 'Islam', ', 01-01-1950', '', '', '', '', '1'),
(2, '', '', ', 01-01-1950', '', '', '', '', '', 'Islam', ', 01-01-1950', '', '', '', '', '2'),
(3, '', '', ', 01-01-1950', '', '', '', '', '', 'Islam', ', 01-01-1950', '', '', '', '', '667676767');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggaran`
--

CREATE TABLE `tb_pelanggaran` (
  `code_pelanggaran` varchar(125) NOT NULL,
  `pelanggaran` varchar(255) NOT NULL,
  `hari` varchar(125) NOT NULL,
  `tgl` date NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `sanksi` varchar(255) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `sort` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggaran`
--

INSERT INTO `tb_pelanggaran` (`code_pelanggaran`, `pelanggaran`, `hari`, `tgl`, `waktu`, `sanksi`, `tingkat`, `nis`, `sort`) VALUES
('606ae40cbe7f1', 'makan saat jam Pelajaran', 'Senin', '2021-04-01', '17:18:15', 'Membersihkan Kamar Mandi', 'Berat', '3543643523', 'kmi'),
('606ae67392998', 'Tidak mengikuti jadwal sholat Subuh', 'Senin', '2021-03-05', '17:27:49', 'Membersihkan Halaman Rumah Kyai', 'Ringan', '3543643523', 'peribadatan'),
('606ae6b3e96c0', 'Menggunakan kata kata tidak pantas saat berada dalam lingkungan Pondok', 'Senin', '2021-01-05', '17:29:20', 'Membersihkan Area lapangan selama 7 Hari', 'Sedang', '3543643523', 'bahasa'),
('6082c7c51a154', 'Tidur saat jam ibadah', 'Jum\'at', '2021-04-23', '20:12:26', 'Lari memutari lapangan 1000x', 'Sedang', '3543643523', 'pengasuhan'),
('60b1ac2480196', 'membuang sampah sembarangan', 'Sabtu', '2021-05-29', '09:50:21', 'membersihkan lapangan selama 2 minggu', 'Ringan', '3543643523', 'kebersihan'),
('60b1af1d30754', 'Memanjat pagar kabur dari pondok', 'Sabtu', '2021-05-29', '10:03:29', 'Membantu jaga malam', 'Sedang', '3543643523', 'keamanan'),
('60b1af3a8acf8', 'Tidak menggunakan seragam traiining', 'Sabtu', '2021-05-29', '10:04:02', 'Lari memutari lapangan 10000x', 'Berat', '3543643523', 'olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `code_pengajar` int(11) NOT NULL,
  `nama_pengajar` text NOT NULL,
  `alamat_pengajar` varchar(225) NOT NULL,
  `jk_pengajar` varchar(15) NOT NULL,
  `tempat_lahir_pengajar` varchar(225) NOT NULL,
  `tgl_lahir_pengajar` varchar(115) NOT NULL,
  `id_ortu_pengajar` varchar(25) NOT NULL,
  `foto_pengajar` varchar(125) NOT NULL,
  `status_pengajar` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`code_pengajar`, `nama_pengajar`, `alamat_pengajar`, `jk_pengajar`, `tempat_lahir_pengajar`, `tgl_lahir_pengajar`, `id_ortu_pengajar`, `foto_pengajar`, `status_pengajar`) VALUES
(1, 'H. Mahfud Yusuf, S.Pd.I', '', '', '', '', '', '', ''),
(2, 'Tauhid Sa`dullah, LC', '', '', '', '', '', '', ''),
(3, 'H. Imam Zarkasi, S.E', '', '', '', '', '', '', ''),
(4, 'Munawar Nawawi, S.Pd', '', '', '', '', '', '', ''),
(5, 'Masduqi, S.Kom.I', '', '', '', '', '', '', ''),
(6, 'Jamiluddien Rifa`ie, S.Kom.I', '', '', '', '', '', '', ''),
(7, 'Eko Budianto,M. Pd.', '', '', '', '', '', '', ''),
(8, 'Ust. Akhmad Bashori, M.Pd', '', '', '', '', '', '', ''),
(9, 'Asmopur, LC', '', '', '', '', '', '', ''),
(10, 'Moh. Sahlan Ali Wafa, S.Pd.I', '', '', '', '', '', '', ''),
(11, 'Arif Rahman Hakim, M.Hum', '', '', '', '', '', '', ''),
(12, 'Tofan Arifan, S.Pd.I', '', '', '', '', '', '', ''),
(13, 'Basri Arianto, M.Pd.', '', '', '', '', '', '', ''),
(14, 'Nasrullah, M.H', '', '', '', '', '', '', ''),
(15, 'Feri Ferdiyanto, M.Pd', '', '', '', '', '', '', ''),
(16, 'Syamsuri, S.H.I', '', '', '', '', '', '', ''),
(17, 'Ilmu Zekri, S.T', '', '', '', '', '', '', ''),
(18, 'Anita Widyawati, S.Pd.I', '', '', '', '', '', '', ''),
(19, 'Surahman, M. Pd.I', '', '', '', '', '', '', ''),
(20, 'Inayatul Maula, S.Pd', '', '', '', '', '', '', ''),
(21, 'Muti`ah Ratna Ningrum, S.Pd', '', '', '', '', '', '', ''),
(22, 'Syifa`uddin, M.Pd', '', '', '', '', '', '', ''),
(23, 'Dwi Endah Sulistyowati, S.Pd', '', '', '', '', '', '', ''),
(24, 'Hasbiah', '', '', '', '', '', '', ''),
(25, 'Ahmad Taufik, S.Pd.I', '', '', '', '', '', '', ''),
(26, 'Ummi Azizah, S.Pd', '', '', '', '', '', '', ''),
(27, 'Bachtiar Rifa`i, S.Pd', '', '', '', '', '', '', ''),
(28, 'Dafir Munawwar Sadat, M.H', '', '', '', '', '', '', ''),
(29, 'Turmudi, SE', '', '', '', '', '', '', ''),
(30, 'Idris Amar', '', '', '', '', '', '', ''),
(31, 'Qurratul Aini, S.Pd.I', '', '', '', '', '', '', ''),
(32, 'Ira Yeni Ratnadewi, S.Pd', '', '', '', '', '', '', ''),
(33, 'Rudiyanto, S.Pd', '', '', '', '', '', '', ''),
(34, 'Ika Vera Rahmawati, M.Pd.I', '', '', '', '', '', '', ''),
(35, 'Moh. Rifa`i. M.Pd', '', '', '', '', '', '', ''),
(36, 'Fatimah Az Zahra, M.Kn', '', '', '', '', '', '', ''),
(37, 'Nikmatul Mubarokah, S.Pd', '', '', '', '', '', '', ''),
(38, 'Munawwar Hamidi S,Pd', '', '', '', '', '', '', ''),
(39, 'Ria Febriana, S.Pd', '', '', '', '', '', '', ''),
(40, 'Ahmad Habibi, Lc', '', '', '', '', '', '', ''),
(41, 'Tinwarotunnafilah, S.Pd.I', '', '', '', '', '', '', ''),
(42, 'Siti Nikmah Hidayatul Fitri, S.Pd', '', '', '', '', '', '', ''),
(43, 'Siti Jamilah, S.Pd.', '', '', '', '', '', '', ''),
(44, 'Ustdh. Luluk Masliha, S.Si', '', '', '', '', '', '', ''),
(45, 'Samsiatun Hoiriyah, S.Si', '', '', '', '', '', '', ''),
(46, 'Rif`atul Mahfudhoh, S.Pd', '', '', '', '', '', '', ''),
(47, 'Nanda Ain Annisa, S.Pd', '', '', '', '', '', '', ''),
(48, 'Rizki Indah, S.Pd', '', '', '', '', '', '', ''),
(49, 'Wardah Sholihah, S.Pd', '', '', '', '', '', '', ''),
(50, 'Siti Khodijah', '', '', '', '', '', '', ''),
(51, 'Suryati, S.Pd', '', '', '', '', '', '', ''),
(52, 'Nur Ahmad Silsilah, S.Sy', '', '', '', '', '', '', ''),
(53, 'Lutfi Maulana, S.Sy', '', '', '', '', '', '', ''),
(54, 'Zainuddin, S.Pd', '', '', '', '', '', '', ''),
(55, 'Rusmawati, S.Pd', '', '', '', '', '', '', ''),
(56, 'Nurma Novi Hikmatul Ummah, S.Pd', '', '', '', '', '', '', ''),
(57, 'Moh. Adi Putra, S.Pd.I', '', '', '', '', '', '', ''),
(58, 'Ahmad Tijani, S.Pd.I', '', '', '', '', '', '', ''),
(59, 'Ustdh. Hadiatul Maula', '', '', '', '', '', '', ''),
(60, 'Ahmad Mukhlis, S.Com', '', '', '', '', '', '', ''),
(61, 'Abd. Rosyid, S.Sy', '', '', '', '', '', '', ''),
(62, 'Fakhrur Rosi, S.Pd', '', '', '', '', '', '', ''),
(63, 'Fathor Rozi', '', '', '', '', '', '', ''),
(64, 'Nur Syamsiah, S.Pd', '', '', '', '', '', '', ''),
(65, 'Sholihin, S.Pd', '', '', '', '', '', '', ''),
(66, 'Syaichul Mu`min, S.Pd.', '', '', '', '', '', '', ''),
(67, 'Sri Endang Rahayu, S.Pd.', '', '', '', '', '', '', ''),
(68, 'Rini Hidayati', '', '', '', '', '', '', ''),
(69, 'Lailatul Masruroh', '', '', '', '', '', '', ''),
(70, ' Abd. Hafidz Riyadi', '', '', '', '', '', '', ''),
(71, ' Syamsul Ma`arif', '', '', '', '', '', '', ''),
(72, 'Wahyuni', '', '', '', '', '', '', ''),
(73, 'Nurul Fitria Anwar', '', '', '', '', '', '', ''),
(74, 'Wahyu Evi Damayanti', '', '', '', '', '', '', ''),
(75, 'Hairunnisak', '', '', '', '', '', '', ''),
(76, 'Nida Ishlah Kamelia', '', '', '', '', '', '', ''),
(77, 'Frisky Ervansyah', '', '', '', '', '', '', ''),
(78, 'Abdus Salam', '', '', '', '', '', '', ''),
(79, 'Qoidy', '', '', '', '', '', '', ''),
(80, 'Ikhsan', '', '', '', '', '', '', ''),
(81, 'M. Saifillah', '', '', '', '', '', '', ''),
(82, 'Malikul Habsyi', '', '', '', '', '', '', ''),
(83, 'Moh. Ainul Yaqin', '', '', '', '', '', '', ''),
(84, 'Ahmad Rasidi', '', '', '', '', '', '', ''),
(85, 'Sugiono', '', '', '', '', '', '', ''),
(86, 'Mukhlis Rahmatullah', '', '', '', '', '', '', ''),
(87, 'Irfan Wahyudi', '', '', '', '', '', '', ''),
(88, 'Sayyidana Syamsiah', '', '', '', '', '', '', ''),
(89, 'Zulfa Jannatul Firdaus', '', '', '', '', '', '', ''),
(90, 'Taufiqur Rahman', '', '', '', '', '', '', ''),
(91, 'Riska Hasanah', '', '', '', '', '', '', ''),
(92, 'Siti Ardianis', '', '', '', '', '', '', ''),
(93, 'Mar`atus Sholihah', '', '', '', '', '', '', ''),
(94, 'Robiatul Adawiyah', '', '', '', '', '', '', ''),
(95, 'Laily Rahmatillah', '', '', '', '', '', '', ''),
(96, 'Ustdh. Hilda Nia A', '', '', '', '', '', '', ''),
(97, 'Laila Hasanah', '', '', '', '', '', '', ''),
(98, 'Zahrotil Humairoh', '', '', '', '', '', '', ''),
(99, 'Ustdh. Ulfa Qomariatul J', '', '', '', '', '', '', ''),
(100, 'Sri Wahyuni Dwi Putri', '', '', '', '', '', '', ''),
(101, 'Nafis Thoriqul F A', '', '', '', '', '', '', ''),
(102, 'Abd. Rahman Wahid', '', '', '', '', '', '', ''),
(103, 'M. Fajar A', '', '', '', '', '', '', ''),
(104, 'Agung Rianto', '', '', '', '', '', '', ''),
(105, 'M. Zakaria Ali', '', '', '', '', '', '', ''),
(106, 'Mu`tasim Billah', '', '', '', '', '', '', ''),
(107, 'Hadist Miftah', '', '', '', '', '', '', ''),
(108, 'Tubagus M Fahmi', '', '', '', '', '', '', ''),
(109, 'Rajabi Syahrullah', '', '', '', '', '', '', ''),
(110, 'M. Risky Firdaus', '', '', '', '', '', '', ''),
(111, 'M. Imam Abrori', '', '', '', '', '', '', ''),
(112, 'M. Iqbal Amrullah', '', '', '', '', '', '', ''),
(113, 'Ust. Hudallah', '', '', '', '', '', '', ''),
(114, 'M. Ilham Hidayah', '', '', '', '', '', '', ''),
(115, 'M. Syarif Hidayatullah', '', '', '', '', '', '', ''),
(116, 'Halimatus Sa`diyah', '', '', '', '', '', '', ''),
(117, 'Noer Aida F', '', '', '', '', '', '', ''),
(118, 'Ulin Bailana', '', '', '', '', '', '', ''),
(119, 'Elisa Andyra E', '', '', '', '', '', '', ''),
(120, 'Inayatul M', '', '', '', '', '', '', ''),
(121, 'Ulfatul Hasiniyah', '', '', '', '', '', '', ''),
(122, 'Hamdah Marzuqotun K', '', '', '', '', '', '', ''),
(123, 'Nor Fadilah Wahyu W', '', '', '', '', '', '', ''),
(124, 'Shofiyatul Sholehah', '', '', '', '', '', '', ''),
(125, 'Risalatul Mu`awanah', '', '', '', '', '', '', ''),
(126, 'Rizka Amalia', '', '', '', '', '', '', ''),
(127, 'Rizkiyatul Fajriyah', '', '', '', '', '', '', ''),
(128, 'Rike Masruroh', '', '', '', '', '', '', ''),
(129, 'Khusnul Khotimah', '', '', '', '', '', '', ''),
(130, 'Rosyidah', '', '', '', '', '', '', ''),
(131, 'Uswatun Hasanah', '', '', '', '', '', '', ''),
(132, 'Rofiatul Masyruroh', '', '', '', '', '', '', ''),
(133, 'Innany Kholidatul J', '', '', '', '', '', '', ''),
(134, 'Ayu Fatmawati', '', '', '', '', '', '', ''),
(135, 'Faiqotul Jannah', '', '', '', '', '', '', ''),
(136, 'Madinatul M', '', '', '', '', '', '', ''),
(137, 'Khoirotul Imamah', '', '', '', '', '', '', ''),
(6084043, 'tes', 'Jl.Bumi Bulat Nusantara no.99 kraksaan', 'laki-laki', 'Probolinggo', '2021-08-02', '60bba395779f4', '8c9bef707f8802282320974dba5f4054.PNG', 'Pengabdian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjab_ppdb`
--

CREATE TABLE `tb_penjab_ppdb` (
  `id_penjab` int(11) NOT NULL,
  `nama_penjab` varchar(50) NOT NULL,
  `no_hp_penjab` varchar(15) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat_penjab` varchar(70) NOT NULL,
  `nisn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjab_ppdb`
--

INSERT INTO `tb_penjab_ppdb` (`id_penjab`, `nama_penjab`, `no_hp_penjab`, `pekerjaan`, `alamat_penjab`, `nisn`) VALUES
(1, '', '', '', '', '1'),
(2, '', '', '', '', '2'),
(3, '', '', '', '', '667676767');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ppdb`
--

CREATE TABLE `tb_ppdb` (
  `no_pendaftaran` varchar(60) NOT NULL,
  `angkatan` varchar(15) NOT NULL,
  `nisn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ppdb`
--

INSERT INTO `tb_ppdb` (`no_pendaftaran`, `angkatan`, `nisn`) VALUES
('0303211', '2021', '1'),
('0303212', '2021', '2'),
('060321667676767', '2021', '667676767');

-- --------------------------------------------------------

--
-- Table structure for table `tb_santri_ppdb`
--

CREATE TABLE `tb_santri_ppdb` (
  `nisn` varchar(30) NOT NULL,
  `nama_santri` varchar(50) NOT NULL,
  `binbinti` varchar(50) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `lahir` varchar(30) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `bulan` varchar(5) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `umur` varchar(5) NOT NULL,
  `bahasa_daerah` varchar(25) NOT NULL,
  `sekolah_asal` varchar(50) NOT NULL,
  `ijazah_terakhir_tahun` varchar(15) NOT NULL,
  `no_ijazah` varchar(50) NOT NULL,
  `no_skhu` varchar(50) NOT NULL,
  `pengalaman_pendidikan` varchar(50) NOT NULL,
  `tamat_tahun` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_santri_ppdb`
--

INSERT INTO `tb_santri_ppdb` (`nisn`, `nama_santri`, `binbinti`, `jk`, `lahir`, `tanggal`, `bulan`, `tahun`, `umur`, `bahasa_daerah`, `sekolah_asal`, `ijazah_terakhir_tahun`, `no_ijazah`, `no_skhu`, `pengalaman_pendidikan`, `tamat_tahun`, `alamat`) VALUES
('1', 'DEWA', '', 'Laki-Laki', '', '01', '01', '1980', '', '', '', '', '', '', '', '', ''),
('2', 'DEWI', '', 'Perempuan', '', '01', '01', '1980', '', '', '', '', '', '', '', '', ''),
('667676767', 'JOEL', '', 'Laki-Laki', '', '01', '01', '1980', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sdr_ppdb`
--

CREATE TABLE `tb_sdr_ppdb` (
  `id_sdr` int(11) NOT NULL,
  `nama_sdr` varchar(100) NOT NULL,
  `jk_sdr` varchar(20) NOT NULL,
  `umur_sdr` int(11) NOT NULL,
  `hub_sdr` varchar(100) NOT NULL,
  `pend_sdr` varchar(100) NOT NULL,
  `ket_sdr` varchar(100) NOT NULL,
  `nisn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'ADMIN P2SB');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wali_ppdb`
--

CREATE TABLE `tb_wali_ppdb` (
  `id_wali` int(11) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `agama_wali` varchar(15) NOT NULL,
  `umur_wali` varchar(20) NOT NULL,
  `pend_terakhir_wali` varchar(25) NOT NULL,
  `pekerjaan_wali` varchar(100) NOT NULL,
  `hubungan` varchar(50) NOT NULL,
  `jumlah_keluarga` varchar(50) NOT NULL,
  `alamat_wali` varchar(15) NOT NULL,
  `nisn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_wali_ppdb`
--

INSERT INTO `tb_wali_ppdb` (`id_wali`, `nama_wali`, `agama_wali`, `umur_wali`, `pend_terakhir_wali`, `pekerjaan_wali`, `hubungan`, `jumlah_keluarga`, `alamat_wali`, `nisn`) VALUES
(1, '', '', '', '', '', '', '', '', '1'),
(2, '', '', '', '', '', '', '', '', '2'),
(3, '', '', '', '', '', '', '', '', '667676767');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`code_auth`);

--
-- Indexes for table `detaile`
--
ALTER TABLE `detaile`
  ADD PRIMARY KEY (`id_detaile`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id_details`);

--
-- Indexes for table `jadwal_alarm`
--
ALTER TABLE `jadwal_alarm`
  ADD PRIMARY KEY (`code_ja`);

--
-- Indexes for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD PRIMARY KEY (`code_perizinan`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`code_prestasi`);

--
-- Indexes for table `tahfidz`
--
ALTER TABLE `tahfidz`
  ADD PRIMARY KEY (`code_tahfidz`);

--
-- Indexes for table `tb_dsantri`
--
ALTER TABLE `tb_dsantri`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_extra`
--
ALTER TABLE `tb_extra`
  ADD PRIMARY KEY (`code_extra`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`code_kamar`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`code_kelas`);

--
-- Indexes for table `tb_kode_ppdb`
--
ALTER TABLE `tb_kode_ppdb`
  ADD PRIMARY KEY (`id_kode_ppdb`);

--
-- Indexes for table `tb_konsulat`
--
ALTER TABLE `tb_konsulat`
  ADD PRIMARY KEY (`code_konsulat`);

--
-- Indexes for table `tb_lembaga`
--
ALTER TABLE `tb_lembaga`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indexes for table `tb_marhalah`
--
ALTER TABLE `tb_marhalah`
  ADD PRIMARY KEY (`id_marhalah`);

--
-- Indexes for table `tb_ortu`
--
ALTER TABLE `tb_ortu`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indexes for table `tb_ortu_ppdb`
--
ALTER TABLE `tb_ortu_ppdb`
  ADD PRIMARY KEY (`id_ayah`);

--
-- Indexes for table `tb_pelanggaran`
--
ALTER TABLE `tb_pelanggaran`
  ADD PRIMARY KEY (`code_pelanggaran`);

--
-- Indexes for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD PRIMARY KEY (`code_pengajar`);

--
-- Indexes for table `tb_penjab_ppdb`
--
ALTER TABLE `tb_penjab_ppdb`
  ADD PRIMARY KEY (`id_penjab`);

--
-- Indexes for table `tb_ppdb`
--
ALTER TABLE `tb_ppdb`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indexes for table `tb_santri_ppdb`
--
ALTER TABLE `tb_santri_ppdb`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `tb_sdr_ppdb`
--
ALTER TABLE `tb_sdr_ppdb`
  ADD PRIMARY KEY (`id_sdr`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_wali_ppdb`
--
ALTER TABLE `tb_wali_ppdb`
  ADD PRIMARY KEY (`id_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detaile`
--
ALTER TABLE `detaile`
  MODIFY `id_detaile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal_alarm`
--
ALTER TABLE `jadwal_alarm`
  MODIFY `code_ja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tb_kode_ppdb`
--
ALTER TABLE `tb_kode_ppdb`
  MODIFY `id_kode_ppdb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_lembaga`
--
ALTER TABLE `tb_lembaga`
  MODIFY `id_lembaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_marhalah`
--
ALTER TABLE `tb_marhalah`
  MODIFY `id_marhalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_ortu_ppdb`
--
ALTER TABLE `tb_ortu_ppdb`
  MODIFY `id_ayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `code_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6084044;

--
-- AUTO_INCREMENT for table `tb_penjab_ppdb`
--
ALTER TABLE `tb_penjab_ppdb`
  MODIFY `id_penjab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sdr_ppdb`
--
ALTER TABLE `tb_sdr_ppdb`
  MODIFY `id_sdr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_wali_ppdb`
--
ALTER TABLE `tb_wali_ppdb`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
