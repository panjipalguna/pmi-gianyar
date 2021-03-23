-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Mar 2021 pada 02.05
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apharesis`
--

CREATE TABLE `apharesis` (
  `apharesis_id` int(255) NOT NULL,
  `apharesis_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `butuh`
--

CREATE TABLE `butuh` (
  `butuh_id` int(255) NOT NULL,
  `butuh_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `butuh`
--

INSERT INTO `butuh` (`butuh_id`, `butuh_nama`) VALUES
(1, 'Ya'),
(2, 'Tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departmenttable`
--

CREATE TABLE `departmenttable` (
  `row_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `txt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departmenttable`
--

INSERT INTO `departmenttable` (`row_id`, `name`, `txt`) VALUES
(2, 'HRD', 'Take care all administration of Employee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `row_id` int(11) NOT NULL,
  `dokter_nama` varchar(255) DEFAULT NULL,
  `dokter_alamat` varchar(255) DEFAULT NULL,
  `dokter_alamatkantor` varchar(255) DEFAULT NULL,
  `dokter_instansi` varchar(255) DEFAULT NULL,
  `dokter_foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`row_id`, `dokter_nama`, `dokter_alamat`, `dokter_alamatkantor`, `dokter_instansi`, `dokter_foto`) VALUES
(2, 'dr. Gede Palgunadi', 'Desa Mas, Ubud', 'Jl. Ciung Wanara-Gianyar No.2, Gianyar, Kec. Gianyar, Kabupaten Gianyar, Bali 80511', 'RS Sanglah Denpasar', '20210317043232.png'),
(3, 'dr.Kris Sanjaya, S.Kom, M.Kom.', 'Jl. Gunung Sari IV No.9 Banjar Buana Kubu, Denpasar Barat, Denpasar', 'Jl. Ciung Wanara-Gianyar No.2, Gianyar, Kec. Gianyar, Kabupaten Gianyar, Bali 80511', 'RS Sanjiwani', '20210317060729.png'),
(4, 'dr. I Gusti Agung Ngurah Panji Palguna, S.Ked, M.Psi', 'Jl. Gunung Sari IV No.9 Banjar Buana Kubu, Denpasar Barat, Denpasar', 'Jl. Ciung Wanara-Gianyar No.2, Gianyar, Kec. Gianyar, Kabupaten Gianyar, Bali 80511', 'RS Sanglah Denpasar', '20210319030315.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employeetable`
--

CREATE TABLE `employeetable` (
  `row_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `hired_date` datetime DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employeetable`
--

INSERT INTO `employeetable` (`row_id`, `department_id`, `name`, `address`, `hired_date`, `age`, `salary`, `photo`) VALUES
(80, 2, 'aaa', 'tesss', '2020-04-30 00:00:00', 99, 12345, ''),
(88, 2, 'employeename', 'Address 1', '2010-01-07 00:00:00', 0, 12345698, '20201127070959.png'),
(93, 2, 'RRR', '', '2020-12-17 00:00:00', 33, 0, '20201204125400.jpg'),
(94, 2, 'RRR', 'hgj', '2020-12-11 00:00:00', 66, 567, '20201205094235.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `generatetable`
--

CREATE TABLE `generatetable` (
  `row_id` int(11) NOT NULL,
  `generate_controller` varchar(255) DEFAULT NULL,
  `generate_table` varchar(255) DEFAULT NULL,
  `generate_field` varchar(255) DEFAULT NULL,
  `generate_field_descr` varchar(255) DEFAULT NULL,
  `generate_type` varchar(255) DEFAULT NULL,
  `generate_field_index` varchar(255) DEFAULT NULL,
  `generate_field_mandatory` varchar(255) DEFAULT NULL,
  `generate_relation_table` varchar(255) DEFAULT NULL,
  `generate_relation_field` varchar(255) DEFAULT NULL,
  `generate_relation_fieldtxt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `goldar`
--

CREATE TABLE `goldar` (
  `row_id` int(11) NOT NULL,
  `goldar_nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `goldar`
--

INSERT INTO `goldar` (`row_id`, `goldar_nama`) VALUES
(2, 'A+'),
(9, 'A-'),
(7, 'AB+'),
(4, 'AB-'),
(6, 'B+'),
(3, 'B-'),
(5, 'O+'),
(1, 'O-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongandarah`
--

CREATE TABLE `golongandarah` (
  `goldar_id` int(11) NOT NULL,
  `goldar_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `instansi_id` int(11) NOT NULL,
  `instansi_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jeniskelamin`
--

CREATE TABLE `jeniskelamin` (
  `jeniskelamin_id` int(255) NOT NULL,
  `jeniskelamin_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jeniskelamin`
--

INSERT INTO `jeniskelamin` (`jeniskelamin_id`, `jeniskelamin_nama`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantong`
--

CREATE TABLE `kantong` (
  `kantong_id` int(255) NOT NULL,
  `kantong_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kecamatan_id` int(255) NOT NULL,
  `kecamatan_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kecamatan_id`, `kecamatan_nama`) VALUES
(1, 'Payangan'),
(2, 'Blahbatuh'),
(3, 'Gianyar Kota'),
(4, 'Tegallalang'),
(5, 'Tampaksiring'),
(6, 'Ubud');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `kelurahan_id` int(255) NOT NULL,
  `kelurahan_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`kelurahan_id`, `kelurahan_nama`) VALUES
(1, 'kelurahan 1'),
(2, 'kelurahan 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamapengambilan`
--

CREATE TABLE `lamapengambilan` (
  `lamapengambilan_id` int(255) NOT NULL,
  `lamapengambilan_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lengan`
--

CREATE TABLE `lengan` (
  `lengan_id` int(11) NOT NULL,
  `lengan_nama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `macamdonor`
--

CREATE TABLE `macamdonor` (
  `macamdonor_id` int(11) NOT NULL,
  `macamdonor_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_ambil_darah`
--

CREATE TABLE `metode_ambil_darah` (
  `metode_id` int(11) NOT NULL,
  `metode_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_ambil_darah`
--

INSERT INTO `metode_ambil_darah` (`metode_id`, `metode_nama`) VALUES
(1, 'Biasa'),
(2, 'Apharesis'),
(3, 'Autologus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `pekerjaan_id` int(11) NOT NULL,
  `pekerjaan_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`pekerjaan_id`, `pekerjaan_nama`) VALUES
(1, 'PNS'),
(2, 'POLRI'),
(3, 'Petani/Buruh'),
(4, 'Mahasiswa'),
(5, 'Pelajar'),
(6, 'BUMN'),
(7, 'TNI'),
(8, 'Pedagang'),
(9, 'Pegawai Swasta'),
(10, 'Wiraswasta'),
(11, 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghargaan`
--

CREATE TABLE `penghargaan` (
  `penghargaan_id` int(255) NOT NULL,
  `penghargaan_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penghargaan`
--

INSERT INTO `penghargaan` (`penghargaan_id`, `penghargaan_nama`) VALUES
(1, '10 kali'),
(2, '25 kali'),
(3, '50 kali'),
(4, '75 kali'),
(5, '100 kali'),
(6, 'Belum ada Penghargaan ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penusukanulang`
--

CREATE TABLE `penusukanulang` (
  `penusukanulang_id` int(255) NOT NULL,
  `penusukanulang_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugasadministrasi`
--

CREATE TABLE `petugasadministrasi` (
  `petugasadministrasi_id` int(255) NOT NULL,
  `petugasadministrasi_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugasaftar`
--

CREATE TABLE `petugasaftar` (
  `row_id` int(11) NOT NULL,
  `petugasaftar_nama` varchar(255) DEFAULT NULL,
  `petugasaftar_no_hp` int(11) DEFAULT NULL,
  `petugasaftar_alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugasaftar`
--

INSERT INTO `petugasaftar` (`row_id`, `petugasaftar_nama`, `petugasaftar_no_hp`, `petugasaftar_alamat`) VALUES
(1, 'Gus Wairagya', 2147483647, 'Denpasar, Bali'),
(2, 'Gus Imam', 2147483647, 'Jl. Kebo Iwa'),
(3, 'Gus Wairagya', 2147483647, 'dps, bali, indonesia'),
(4, 'Gus Wairagya', 2147483647, 'Denpasar, Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugashb`
--

CREATE TABLE `petugashb` (
  `row_id` int(11) NOT NULL,
  `petugashb_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugashb`
--

INSERT INTO `petugashb` (`row_id`, `petugashb_nama`) VALUES
(8, 'dr. Wahyu Guna Negara'),
(6, 'Putri Abyuda, S.Kep, Ns.'),
(5, 'Yupita Asri Wulandari,S.Kep');

-- --------------------------------------------------------

--
-- Struktur dari tabel `puasa`
--

CREATE TABLE `puasa` (
  `puasa_id` int(255) NOT NULL,
  `puasa_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `puasa`
--

INSERT INTO `puasa` (`puasa_id`, `puasa_nama`) VALUES
(1, 'Ya'),
(2, 'Tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_donor`
--

CREATE TABLE `ref_donor` (
  `row_id` int(11) NOT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `donor_no_ktp` int(11) DEFAULT NULL,
  `donor_nama` varchar(255) DEFAULT NULL,
  `donor_jenis_kelamin` int(11) DEFAULT NULL,
  `donor_telepon` varchar(255) DEFAULT NULL,
  `donor_kelurahan` int(11) DEFAULT NULL,
  `donor_kecamatan` int(11) DEFAULT NULL,
  `donor_wilayah` int(11) DEFAULT NULL,
  `donor_alamat` varchar(255) DEFAULT NULL,
  `donor_pekerjaan` int(11) DEFAULT NULL,
  `donor_tempat_lahir` varchar(255) DEFAULT NULL,
  `donor_tanggal_lahir` datetime DEFAULT NULL,
  `donor_penghargaan` int(11) DEFAULT NULL,
  `donor_puasa` int(11) DEFAULT NULL,
  `donor_butuh` int(11) DEFAULT NULL,
  `donor_tanggal` datetime DEFAULT current_timestamp(),
  `donor_kantong` varchar(256) NOT NULL,
  `donor_diambil sebanyak` varchar(256) NOT NULL,
  `donor_beratbadan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_donor`
--

INSERT INTO `ref_donor` (`row_id`, `donor_id`, `donor_no_ktp`, `donor_nama`, `donor_jenis_kelamin`, `donor_telepon`, `donor_kelurahan`, `donor_kecamatan`, `donor_wilayah`, `donor_alamat`, `donor_pekerjaan`, `donor_tempat_lahir`, `donor_tanggal_lahir`, `donor_penghargaan`, `donor_puasa`, `donor_butuh`, `donor_tanggal`, `donor_kantong`, `donor_diambil sebanyak`, `donor_beratbadan`) VALUES
(1, 1608561051, 2147483647, 'I Gusti Agung Ngurah Panji Palguna', 1, '082146149373', 1, 1, 1, 'Jl. Gunung Sari IV No.9 Br.Buana Kubu, Desa Tegal Harum, Kecamatan Denpasar Barat, Kota Denpasar', 1, 'Denpasar', '1998-07-05 00:00:00', 1, 1, 2, '2021-03-17 00:00:00', '', '', 0),
(2, 2147483647, 2147483647, 'I Gusti Agung Ngurah Panji Palguna', 1, '082146149373', 1, 1, 1, 'Jl. Gunung Sari IV No.9 Br.Buana Kubu, Desa Tegal Harum, Kecamatan Denpasar Barat, Kota Denpasar', 1, 'Denpasar', '1998-07-05 00:00:00', 2, 1, 2, '2021-03-16 00:00:00', '', '', 0),
(3, 2147483647, 2147483647, 'I Gusti Agung Ngurah Panji Palguna', 1, '082146149373', 1, 3, 1, 'Jl. Gunung Sari IV No.9 Br.Buana Kubu, Desa Tegal Harum, Kecamatan Denpasar Barat, Kota Denpasar', 2, 'Denpasar', '2021-03-17 00:00:00', 6, 1, 2, '2021-03-17 00:00:00', '', '', 0),
(4, 219, 2147483647, 'I Gusti Agung Ngurah Panji Palguna', 1, '082146149373', 1, 4, 2, 'Jl. Gunung Sari IV No.9 Br.Buana Kubu, Desa Tegal Harum, Kecamatan Denpasar Barat, Kota Denpasar', 1, 'Denpasar', '2021-03-18 00:00:00', 5, 1, 2, '2021-03-18 00:00:00', '', '', 0),
(5, 2147483647, 2147483647, 'I Gusti Agung Ngurah Panji Palhgna', 1, '082146149373', 1, 1, 1, 'Jalan Gunung Sari IV ', 1, 'Denpasar', '2021-03-25 00:00:00', 3, 1, 2, '2021-03-18 00:00:00', '', '', 0),
(6, 2147483647, 2147483647, 'I Gusti Agung Ngurah Panji Palguna', 2, '082146149373', 1, 3, 2, 'Jalan Gunung Sari IV No.9 Banjar Buana Kubu, Desa Tegal Harum, Kec.Denbar, Kota Denpasar', 2, 'Denpasar', '1998-07-05 00:00:00', 6, 2, 1, '2021-03-19 00:00:00', '', '', 0),
(7, 2147483647, 2147483647, 'I Gusti Agung Ngurah Panji Palguna', 1, '082146149373', 1, 1, 1, 'Jalan GUnung Sari IV No.9 Banjar Buana Kubu, Desa Tegal Harum, ', 2, 'Denpasar', '2021-03-22 00:00:00', 1, 1, 2, '2021-03-22 00:00:00', '', '', 0),
(8, 2147483647, 2147483647, 'I Gusti Ayu Noviantari', 1, '082146149373', 1, 1, 1, 'jewqhdshjklnh', 2, 'Denpasar', '2021-03-21 00:00:00', 1, 1, 2, '2021-03-22 00:00:00', '', '', 0),
(9, 2147483647, 2147483647, 'Indra Suryawan', 1, '082146149373', 1, 1, 2, 'Jalan Gunung Sari IV No.9 Banjar Buana Kubu, Desa Tegal Harum , Denbar, Denpasar', 1, 'Denpasar', '2021-03-22 00:00:00', 3, 2, 1, '2021-03-22 00:00:00', '', '', 0),
(10, 2147483647, 2147483647, 'Suci Widhi', 1, '082146149373', 1, 2, 2, 'Denpasar\r\nUniversitas Udayana', 1, 'Denpasar', '2021-03-15 00:00:00', 2, 2, 2, '2021-03-22 16:00:00', '', '', 0),
(11, 2147483647, 2147483647, 'Indrayana Suryawan', 1, '082146149373', 1, 1, 1, 'Jalan Gunung Sari IV No.9 Desa Tegal Harum, Kec.Denbar, Kota Denpasar, Provinsi Bali', 2, 'Denpasar', '2021-03-22 00:00:00', 3, 1, 2, '2021-03-22 10:58:00', '', '', 0),
(12, 2147483647, 2147483647, 'Indrayana Suryawan', 1, '082146149373', 1, 1, 1, 'Jalan Gunung Sari IV No.9 Desa Tegal Harum, Kec.Denbar, Kota Denpasar, Provinsi Bali', 2, 'Denpasar', '2021-03-22 00:00:00', 3, 1, 2, '2021-03-22 10:58:00', '', '', 0),
(13, 294090290, 2147483394, 'I Gusti Agung Ngurah Panji Palguna', 2, '082146149373', 1, 4, 2, 'JALAN GUNUNG SARI IV NO.9 BANJAR BUANA KUBU, DESA TEGAL HARUM, DENBAR, DENPASAR, BALI', 1, 'Denpasar', '2021-03-22 00:00:00', 4, 1, 1, '2021-03-22 15:21:00', '', '', 0),
(14, 2147483647, 2147483647, 'GUS DARMA , S.KOM., M.KOM.', 1, '082146149373', 1, 1, 2, 'Jl. Gunung Sari IV No.9 Br.Buana Kubu, Desa Tegal Harum, Kecamatan Denpasar Barat, Kota Denpasar', 5, 'Denpasar', '2021-03-22 00:00:00', 1, 1, 1, '2021-03-22 15:38:00', '', '', 0),
(15, 2147483647, 2147483647, 'I Gusti Agung Ngurah Panji Palguna', 1, '082146149373', 1, 2, 2, 'Jl. Gunung Sari IV No.9 Br.Buana Kubu, Desa Tegal Harum, Kecamatan Denpasar Barat, Kota Denpasar', 2, 'Denpasar', '2021-03-22 00:00:00', 2, 1, 2, '2021-03-22 15:45:00', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `status_id` int(255) NOT NULL,
  `status_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `usertable`
--

CREATE TABLE `usertable` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `pswrd` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usertable`
--

INSERT INTO `usertable` (`user_id`, `user_name`, `pswrd`, `full_name`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 'demo', 'd0970714757783e6cf17b26fb8e2298f', 'Demo User', '2019-05-31 10:44:25', 0, '0000-00-00 00:00:00', 0),
(56, 'sss1', 'bf9136d36da4f8a14d024f025586b5f2', 'aaaaaaaa', '2020-11-28 01:25:53', 1, '2020-12-05 09:44:57', 0),
(49, 'test1', 'e10adc3949ba59abbe56e057f20f883e', 'test1', '2020-09-11 21:55:55', 1, '2020-10-06 09:56:13', 1),
(57, 'ucik', '5cf05f6b3cc195a0aafac0a3522035fa', 'halo', '2021-03-17 06:37:40', 1, '0000-00-00 00:00:00', 0),
(58, 'Panji Palguna', '202cb962ac59075b964b07152d234b70', 'panji', '2021-03-22 07:47:26', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_employeetablelist`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_employeetablelist` (
`row_id` int(11)
,`department_id` int(11)
,`departmenttable_name` varchar(255)
,`name` varchar(255)
,`address` text
,`hired_date` datetime
,`age` int(11)
,`salary` double
,`photo` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_ref_donorlist`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_ref_donorlist` (
`row_id` int(11)
,`donor_id` int(11)
,`donor_no_ktp` int(11)
,`donor_nama` varchar(255)
,`donor_jenis_kelamin` int(11)
,`jeniskelamin_jeniskelamin_nama` varchar(256)
,`donor_telepon` varchar(255)
,`donor_kelurahan` int(11)
,`kelurahan_kelurahan_nama` varchar(256)
,`donor_kecamatan` int(11)
,`kecamatan_kecamatan_nama` varchar(256)
,`donor_wilayah` int(11)
,`wilayah_wilayah_nama` varchar(256)
,`donor_alamat` varchar(255)
,`donor_pekerjaan` int(11)
,`pekerjaan_pekerjaan_nama` varchar(256)
,`donor_tempat_lahir` varchar(255)
,`donor_tanggal_lahir` datetime
,`donor_penghargaan` int(11)
,`penghargaan_penghargaan_nama` varchar(256)
,`donor_puasa` int(11)
,`puasa_puasa_nama` varchar(256)
,`donor_butuh` int(11)
,`butuh_butuh_nama` varchar(256)
,`donor_tanggal` datetime
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `wilayah_id` int(255) NOT NULL,
  `wilayah_nama` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`wilayah_id`, `wilayah_nama`) VALUES
(1, 'Gianyar'),
(2, 'Luar Gianyar');

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_employeetablelist`
--
DROP TABLE IF EXISTS `vw_employeetablelist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_employeetablelist`  AS SELECT `employeetable`.`row_id` AS `row_id`, `employeetable`.`department_id` AS `department_id`, `departmenttable`.`name` AS `departmenttable_name`, `employeetable`.`name` AS `name`, `employeetable`.`address` AS `address`, `employeetable`.`hired_date` AS `hired_date`, `employeetable`.`age` AS `age`, `employeetable`.`salary` AS `salary`, `employeetable`.`photo` AS `photo` FROM (`employeetable` join `departmenttable` on(`departmenttable`.`row_id` = `employeetable`.`department_id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_ref_donorlist`
--
DROP TABLE IF EXISTS `vw_ref_donorlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ref_donorlist`  AS SELECT `ref_donor`.`row_id` AS `row_id`, `ref_donor`.`donor_id` AS `donor_id`, `ref_donor`.`donor_no_ktp` AS `donor_no_ktp`, `ref_donor`.`donor_nama` AS `donor_nama`, `ref_donor`.`donor_jenis_kelamin` AS `donor_jenis_kelamin`, `jeniskelamin`.`jeniskelamin_nama` AS `jeniskelamin_jeniskelamin_nama`, `ref_donor`.`donor_telepon` AS `donor_telepon`, `ref_donor`.`donor_kelurahan` AS `donor_kelurahan`, `kelurahan`.`kelurahan_nama` AS `kelurahan_kelurahan_nama`, `ref_donor`.`donor_kecamatan` AS `donor_kecamatan`, `kecamatan`.`kecamatan_nama` AS `kecamatan_kecamatan_nama`, `ref_donor`.`donor_wilayah` AS `donor_wilayah`, `wilayah`.`wilayah_nama` AS `wilayah_wilayah_nama`, `ref_donor`.`donor_alamat` AS `donor_alamat`, `ref_donor`.`donor_pekerjaan` AS `donor_pekerjaan`, `pekerjaan`.`pekerjaan_nama` AS `pekerjaan_pekerjaan_nama`, `ref_donor`.`donor_tempat_lahir` AS `donor_tempat_lahir`, `ref_donor`.`donor_tanggal_lahir` AS `donor_tanggal_lahir`, `ref_donor`.`donor_penghargaan` AS `donor_penghargaan`, `penghargaan`.`penghargaan_nama` AS `penghargaan_penghargaan_nama`, `ref_donor`.`donor_puasa` AS `donor_puasa`, `puasa`.`puasa_nama` AS `puasa_puasa_nama`, `ref_donor`.`donor_butuh` AS `donor_butuh`, `butuh`.`butuh_nama` AS `butuh_butuh_nama`, `ref_donor`.`donor_tanggal` AS `donor_tanggal` FROM ((((((((`ref_donor` join `jeniskelamin` on(`jeniskelamin`.`jeniskelamin_id` = `ref_donor`.`donor_jenis_kelamin`)) join `kelurahan` on(`kelurahan`.`kelurahan_id` = `ref_donor`.`donor_kelurahan`)) join `kecamatan` on(`kecamatan`.`kecamatan_id` = `ref_donor`.`donor_kecamatan`)) join `wilayah` on(`wilayah`.`wilayah_id` = `ref_donor`.`donor_wilayah`)) join `pekerjaan` on(`pekerjaan`.`pekerjaan_id` = `ref_donor`.`donor_pekerjaan`)) join `penghargaan` on(`penghargaan`.`penghargaan_id` = `ref_donor`.`donor_penghargaan`)) join `puasa` on(`puasa`.`puasa_id` = `ref_donor`.`donor_puasa`)) join `butuh` on(`butuh`.`butuh_id` = `ref_donor`.`donor_butuh`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apharesis`
--
ALTER TABLE `apharesis`
  ADD PRIMARY KEY (`apharesis_id`);

--
-- Indeks untuk tabel `butuh`
--
ALTER TABLE `butuh`
  ADD PRIMARY KEY (`butuh_id`);

--
-- Indeks untuk tabel `departmenttable`
--
ALTER TABLE `departmenttable`
  ADD PRIMARY KEY (`row_id`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `IDX` (`dokter_nama`);

--
-- Indeks untuk tabel `employeetable`
--
ALTER TABLE `employeetable`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `IDX` (`department_id`);

--
-- Indeks untuk tabel `goldar`
--
ALTER TABLE `goldar`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `IDX` (`goldar_nama`);

--
-- Indeks untuk tabel `golongandarah`
--
ALTER TABLE `golongandarah`
  ADD PRIMARY KEY (`goldar_id`);

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`instansi_id`);

--
-- Indeks untuk tabel `jeniskelamin`
--
ALTER TABLE `jeniskelamin`
  ADD PRIMARY KEY (`jeniskelamin_id`);

--
-- Indeks untuk tabel `kantong`
--
ALTER TABLE `kantong`
  ADD PRIMARY KEY (`kantong_id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`kelurahan_id`);

--
-- Indeks untuk tabel `lamapengambilan`
--
ALTER TABLE `lamapengambilan`
  ADD PRIMARY KEY (`lamapengambilan_id`);

--
-- Indeks untuk tabel `lengan`
--
ALTER TABLE `lengan`
  ADD PRIMARY KEY (`lengan_id`);

--
-- Indeks untuk tabel `macamdonor`
--
ALTER TABLE `macamdonor`
  ADD PRIMARY KEY (`macamdonor_id`);

--
-- Indeks untuk tabel `metode_ambil_darah`
--
ALTER TABLE `metode_ambil_darah`
  ADD PRIMARY KEY (`metode_id`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`pekerjaan_id`);

--
-- Indeks untuk tabel `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD PRIMARY KEY (`penghargaan_id`);

--
-- Indeks untuk tabel `penusukanulang`
--
ALTER TABLE `penusukanulang`
  ADD PRIMARY KEY (`penusukanulang_id`);

--
-- Indeks untuk tabel `petugasadministrasi`
--
ALTER TABLE `petugasadministrasi`
  ADD PRIMARY KEY (`petugasadministrasi_id`);

--
-- Indeks untuk tabel `petugasaftar`
--
ALTER TABLE `petugasaftar`
  ADD PRIMARY KEY (`row_id`);

--
-- Indeks untuk tabel `petugashb`
--
ALTER TABLE `petugashb`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `IDX` (`petugashb_nama`);

--
-- Indeks untuk tabel `puasa`
--
ALTER TABLE `puasa`
  ADD PRIMARY KEY (`puasa_id`);

--
-- Indeks untuk tabel `ref_donor`
--
ALTER TABLE `ref_donor`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `IDX` (`donor_id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeks untuk tabel `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`wilayah_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `apharesis`
--
ALTER TABLE `apharesis`
  MODIFY `apharesis_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `butuh`
--
ALTER TABLE `butuh`
  MODIFY `butuh_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `departmenttable`
--
ALTER TABLE `departmenttable`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `employeetable`
--
ALTER TABLE `employeetable`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `goldar`
--
ALTER TABLE `goldar`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `golongandarah`
--
ALTER TABLE `golongandarah`
  MODIFY `goldar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jeniskelamin`
--
ALTER TABLE `jeniskelamin`
  MODIFY `jeniskelamin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kantong`
--
ALTER TABLE `kantong`
  MODIFY `kantong_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `kecamatan_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `kelurahan_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lamapengambilan`
--
ALTER TABLE `lamapengambilan`
  MODIFY `lamapengambilan_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lengan`
--
ALTER TABLE `lengan`
  MODIFY `lengan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `macamdonor`
--
ALTER TABLE `macamdonor`
  MODIFY `macamdonor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `metode_ambil_darah`
--
ALTER TABLE `metode_ambil_darah`
  MODIFY `metode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `pekerjaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `penghargaan_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penusukanulang`
--
ALTER TABLE `penusukanulang`
  MODIFY `penusukanulang_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugasadministrasi`
--
ALTER TABLE `petugasadministrasi`
  MODIFY `petugasadministrasi_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugasaftar`
--
ALTER TABLE `petugasaftar`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `petugashb`
--
ALTER TABLE `petugashb`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `puasa`
--
ALTER TABLE `puasa`
  MODIFY `puasa_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ref_donor`
--
ALTER TABLE `ref_donor`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `usertable`
--
ALTER TABLE `usertable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `wilayah_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
