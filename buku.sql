SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `kuliahweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `isbn` varchar(15) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `abstrak` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`isbn`, `judul`, `pengarang`, `jumlah`, `tanggal`, `abstrak`) VALUES
('1', 'Dasar pemrograman web ', 'Pengarang buku', 10, '2014-06-10', 'Abstrak'),
('2', 'Dasar Pemrograman 2', 'Pengarang buku', 2, '2014-06-10', 'Ini adalah lanjutan dari buku pertama'),
('3', 'Dasar Pemrograman 3', 'Pengarang buku', 2, '2014-06-10', 'Ini adalah lanjutan dari buku kedua'),
('4', 'Dasar pemrograman web 4', 'Pengarang buku', 9, '2014-06-10', 'Abstrak'),
('5', 'Dasar pemrograman web 5', 'Pengarang buku', 9, '2014-06-10', 'Abstrak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`);
COMMIT;