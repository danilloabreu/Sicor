-- --------------------------------------------------------
-- Host:                         179.188.16.170
-- Server version:               5.6.35-81.0-log - Percona Server (GPL), Release 81.0, Revision c96c427
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for quilombosicor
DROP DATABASE IF EXISTS `quilombosicor`;
CREATE DATABASE IF NOT EXISTS `quilombosicor` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `quilombosicor`;

-- Dumping structure for table quilombosicor.contrato
CREATE TABLE IF NOT EXISTS `contrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lote` int(11) DEFAULT NULL,
  `data_venda` date DEFAULT NULL,
  `valor_venda` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table quilombosicor.contrato: ~1 rows (approximately)
DELETE FROM `contrato`;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` (`id`, `id_lote`, `data_venda`, `valor_venda`) VALUES
	(1, 27, '2017-07-20', 111600.00),
	(2, 28, '2017-07-20', 150000.00);
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;

-- Dumping structure for table quilombosicor.detalhe_contrato
CREATE TABLE IF NOT EXISTS `detalhe_contrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_contrato` int(11) DEFAULT NULL,
  `tipo` varchar(3) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'ENT OU FIN',
  `qtd_parcela_chamada` int(11) DEFAULT NULL,
  `valor_chamada` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table quilombosicor.detalhe_contrato: ~3 rows (approximately)
DELETE FROM `detalhe_contrato`;
/*!40000 ALTER TABLE `detalhe_contrato` DISABLE KEYS */;
INSERT INTO `detalhe_contrato` (`id`, `id_contrato`, `tipo`, `qtd_parcela_chamada`, `valor_chamada`) VALUES
	(1, 1, 'FIN', 5, 15971.38),
	(2, 1, 'ENT', 180, 209898.00),
	(3, 2, 'ENT', 1, 150000.00);
/*!40000 ALTER TABLE `detalhe_contrato` ENABLE KEYS */;

-- Dumping structure for table quilombosicor.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora` datetime NOT NULL,
  `ip` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `mensagem` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hora` (`hora`)
) ENGINE=MyISAM AUTO_INCREMENT=424 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table quilombosicor.logs: 0 rows
DELETE FROM `logs`;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Dumping structure for table quilombosicor.lote
CREATE TABLE IF NOT EXISTS `lote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quadra` int(11) NOT NULL DEFAULT '0',
  `lote` int(11) NOT NULL DEFAULT '0',
  `area` decimal(10,2) NOT NULL DEFAULT '0.00',
  `valor` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `comprador` varchar(50) DEFAULT NULL,
  `corretor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1 COMMENT='Tabela de lotes';

-- Dumping data for table quilombosicor.lote: ~176 rows (approximately)
DELETE FROM `lote`;
/*!40000 ALTER TABLE `lote` DISABLE KEYS */;
INSERT INTO `lote` (`id`, `quadra`, `lote`, `area`, `valor`, `status`, `comprador`, `corretor`) VALUES
	(1, 1, 1, 394.45, 177502.50, 0, NULL, NULL),
	(2, 1, 2, 300.00, 135000.00, 0, '', ''),
	(3, 1, 3, 300.00, 135000.00, 0, NULL, NULL),
	(4, 1, 4, 300.00, 135000.00, 0, NULL, NULL),
	(5, 1, 5, 300.00, 135000.00, 0, NULL, NULL),
	(6, 1, 6, 300.00, 135000.00, 0, '', ''),
	(7, 1, 7, 300.00, 135000.00, 0, NULL, NULL),
	(8, 1, 8, 300.00, 135000.00, 0, NULL, NULL),
	(9, 1, 9, 383.80, 172710.00, 0, '', ''),
	(10, 1, 10, 300.00, 111600.00, 1, NULL, NULL),
	(11, 1, 11, 300.00, 111600.00, 0, '', ''),
	(12, 1, 12, 300.00, 111600.00, 0, '', ''),
	(13, 1, 13, 300.00, 111600.00, 1, NULL, NULL),
	(14, 1, 14, 300.00, 111600.00, 1, NULL, NULL),
	(15, 1, 15, 300.00, 111600.00, 1, NULL, NULL),
	(16, 1, 16, 300.00, 111600.00, 0, NULL, NULL),
	(17, 1, 17, 300.00, 111600.00, 0, NULL, NULL),
	(18, 1, 18, 575.20, 213974.40, 0, NULL, NULL),
	(19, 2, 1, 476.40, 177220.80, 0, NULL, NULL),
	(20, 2, 2, 300.00, 111600.00, 0, NULL, NULL),
	(21, 2, 3, 300.00, 111600.00, 1, NULL, NULL),
	(22, 2, 4, 300.00, 111600.00, 1, NULL, NULL),
	(23, 2, 5, 300.00, 111600.00, 1, NULL, NULL),
	(24, 2, 6, 300.00, 111600.00, 0, NULL, NULL),
	(25, 2, 7, 300.00, 111600.00, 0, NULL, NULL),
	(26, 2, 8, 300.00, 111600.00, 1, NULL, NULL),
	(27, 2, 9, 300.00, 111600.00, 1, 'Danilo', 'Neli/Rose'),
	(28, 2, 10, 300.00, 111600.00, 0, NULL, NULL),
	(29, 2, 11, 477.00, 177444.00, 0, NULL, NULL),
	(30, 3, 1, 572.10, 268887.00, 0, NULL, NULL),
	(31, 3, 2, 375.00, 176250.00, 1, NULL, NULL),
	(32, 3, 3, 300.00, 141000.00, 0, NULL, NULL),
	(33, 3, 4, 300.00, 141000.00, 0, NULL, NULL),
	(34, 3, 5, 300.00, 141000.00, 0, NULL, NULL),
	(35, 3, 6, 300.00, 141000.00, 0, NULL, NULL),
	(36, 3, 7, 300.00, 141000.00, 0, NULL, NULL),
	(37, 3, 8, 300.00, 141000.00, 0, NULL, NULL),
	(38, 3, 9, 300.00, 141000.00, 0, NULL, NULL),
	(39, 3, 10, 418.50, 196695.00, 0, NULL, NULL),
	(40, 3, 11, 300.00, 110400.00, 1, NULL, NULL),
	(41, 3, 12, 300.00, 110400.00, 1, NULL, NULL),
	(42, 3, 13, 300.00, 110400.00, 1, NULL, NULL),
	(43, 3, 14, 300.00, 110400.00, 0, NULL, NULL),
	(44, 3, 15, 300.00, 110400.00, 1, NULL, NULL),
	(45, 3, 16, 300.00, 110400.00, 1, NULL, NULL),
	(46, 3, 17, 300.00, 110400.00, 0, NULL, NULL),
	(47, 3, 18, 300.00, 110400.00, 1, NULL, NULL),
	(48, 3, 19, 300.00, 110400.00, 0, '', ''),
	(49, 3, 20, 456.00, 167808.00, 0, NULL, NULL),
	(50, 4, 1, 576.15, 270790.50, 0, NULL, NULL),
	(51, 4, 2, 300.00, 141000.00, 0, NULL, NULL),
	(52, 4, 3, 300.00, 141000.00, 0, NULL, NULL),
	(53, 4, 4, 300.00, 141000.00, 0, NULL, NULL),
	(54, 4, 5, 300.00, 141000.00, 1, NULL, NULL),
	(55, 4, 6, 300.00, 141000.00, 0, NULL, NULL),
	(56, 4, 7, 300.00, 141000.00, 0, NULL, NULL),
	(57, 4, 8, 300.00, 141000.00, 0, NULL, NULL),
	(58, 4, 9, 300.00, 141000.00, 0, NULL, NULL),
	(59, 4, 10, 418.50, 196695.00, 0, NULL, NULL),
	(60, 4, 11, 300.00, 135000.00, 1, NULL, NULL),
	(61, 4, 12, 300.00, 135000.00, 0, NULL, NULL),
	(62, 4, 13, 300.00, 135000.00, 0, NULL, NULL),
	(63, 4, 14, 300.00, 135000.00, 0, NULL, NULL),
	(64, 4, 15, 300.00, 135000.00, 0, NULL, NULL),
	(65, 4, 16, 300.00, 135000.00, 0, NULL, NULL),
	(66, 4, 17, 300.00, 135000.00, 0, NULL, NULL),
	(67, 4, 18, 300.00, 135000.00, 0, NULL, NULL),
	(68, 4, 19, 300.00, 135000.00, 0, NULL, NULL),
	(69, 4, 20, 456.00, 205200.00, 0, NULL, NULL),
	(70, 5, 1, 470.10, 220947.00, 0, NULL, NULL),
	(71, 5, 2, 300.00, 141000.00, 0, NULL, NULL),
	(72, 5, 3, 300.00, 141000.00, 0, NULL, NULL),
	(73, 5, 4, 300.00, 141000.00, 0, NULL, NULL),
	(74, 5, 5, 300.00, 141000.00, 0, NULL, NULL),
	(75, 5, 6, 300.00, 141000.00, 0, NULL, NULL),
	(76, 5, 7, 300.00, 141000.00, 1, NULL, NULL),
	(77, 5, 8, 300.00, 141000.00, 0, NULL, NULL),
	(78, 5, 9, 300.00, 141000.00, 0, NULL, NULL),
	(79, 5, 10, 300.00, 141000.00, 0, '', ''),
	(80, 5, 11, 483.75, 227362.50, 0, NULL, NULL),
	(81, 6, 1, 443.20, 199440.00, 1, NULL, NULL),
	(82, 6, 2, 300.00, 135000.00, 1, NULL, NULL),
	(83, 6, 3, 300.00, 135000.00, 0, NULL, NULL),
	(84, 6, 4, 300.00, 135000.00, 1, NULL, NULL),
	(85, 6, 5, 300.00, 135000.00, 1, NULL, NULL),
	(86, 6, 6, 300.00, 135000.00, 0, NULL, NULL),
	(87, 6, 7, 300.00, 135000.00, 0, NULL, NULL),
	(88, 6, 8, 300.00, 135000.00, 1, NULL, NULL),
	(89, 6, 9, 300.00, 135000.00, 0, NULL, NULL),
	(90, 6, 10, 300.00, 135000.00, 0, NULL, NULL),
	(91, 6, 11, 300.00, 135000.00, 0, NULL, NULL),
	(92, 6, 12, 300.00, 135000.00, 0, NULL, NULL),
	(93, 6, 13, 300.00, 135000.00, 0, NULL, NULL),
	(94, 6, 14, 300.00, 135000.00, 0, NULL, NULL),
	(95, 6, 15, 300.00, 135000.00, 0, NULL, NULL),
	(96, 6, 16, 482.60, 226822.00, 0, NULL, NULL),
	(97, 6, 17, 300.00, 141000.00, 0, NULL, NULL),
	(98, 6, 18, 300.00, 141000.00, 0, NULL, NULL),
	(99, 6, 19, 300.00, 141000.00, 0, NULL, NULL),
	(100, 6, 20, 300.00, 141000.00, 0, NULL, NULL),
	(101, 6, 21, 300.00, 141000.00, 0, NULL, NULL),
	(102, 6, 22, 300.00, 141000.00, 0, '', ''),
	(103, 6, 23, 300.00, 141000.00, 1, NULL, NULL),
	(104, 6, 24, 300.00, 141000.00, 0, NULL, NULL),
	(105, 6, 25, 575.20, 270344.00, 0, NULL, NULL),
	(106, 8, 1, 482.60, 207518.00, 0, NULL, NULL),
	(107, 8, 2, 300.00, 129000.00, 0, NULL, NULL),
	(108, 8, 3, 300.00, 129000.00, 0, NULL, NULL),
	(109, 8, 4, 300.00, 129000.00, 0, NULL, NULL),
	(110, 8, 5, 300.00, 129000.00, 0, NULL, NULL),
	(111, 8, 6, 300.00, 129000.00, 0, NULL, NULL),
	(112, 8, 7, 300.00, 129000.00, 0, NULL, NULL),
	(113, 8, 8, 300.00, 129000.00, 0, NULL, NULL),
	(114, 8, 9, 300.00, 129000.00, 0, NULL, NULL),
	(115, 8, 10, 300.00, 129000.00, 0, NULL, NULL),
	(116, 8, 11, 300.00, 129000.00, 0, NULL, NULL),
	(117, 8, 12, 300.00, 129000.00, 0, NULL, NULL),
	(118, 8, 13, 300.00, 129000.00, 0, NULL, NULL),
	(119, 8, 14, 300.00, 129000.00, 0, NULL, NULL),
	(120, 8, 15, 300.00, 129000.00, 0, NULL, NULL),
	(121, 8, 16, 300.00, 129000.00, 0, NULL, NULL),
	(122, 8, 17, 482.60, 207518.00, 0, NULL, NULL),
	(123, 9, 1, 795.37, 292696.16, 0, NULL, NULL),
	(124, 10, 1, 405.15, 158818.80, 0, NULL, NULL),
	(125, 10, 2, 300.00, 117600.00, 0, NULL, NULL),
	(126, 10, 3, 300.00, 117600.00, 0, NULL, NULL),
	(127, 10, 4, 300.00, 117600.00, 0, NULL, NULL),
	(128, 10, 5, 300.00, 117600.00, 0, NULL, NULL),
	(129, 10, 6, 300.00, 117600.00, 0, NULL, NULL),
	(130, 10, 7, 300.00, 117600.00, 1, NULL, NULL),
	(131, 10, 8, 300.00, 117600.00, 1, NULL, NULL),
	(132, 10, 9, 300.00, 117600.00, 1, NULL, NULL),
	(133, 10, 10, 300.00, 117600.00, 1, NULL, NULL),
	(134, 10, 11, 300.00, 117600.00, 0, '', ''),
	(135, 10, 12, 300.00, 117600.00, 1, NULL, NULL),
	(136, 10, 13, 300.00, 117600.00, 1, NULL, NULL),
	(137, 10, 14, 300.00, 117600.00, 1, NULL, NULL),
	(138, 10, 15, 406.50, 159348.00, 1, NULL, NULL),
	(139, 10, 16, 458.30, 187903.00, 1, NULL, NULL),
	(140, 10, 17, 300.00, 123000.00, 0, NULL, NULL),
	(141, 10, 18, 300.00, 123000.00, 0, NULL, NULL),
	(142, 10, 19, 300.00, 123000.00, 0, NULL, NULL),
	(143, 10, 20, 300.00, 123000.00, 0, NULL, NULL),
	(144, 10, 21, 300.00, 123000.00, 0, NULL, NULL),
	(145, 10, 22, 300.00, 123000.00, 0, NULL, NULL),
	(146, 10, 23, 300.00, 123000.00, 0, NULL, NULL),
	(147, 10, 24, 300.00, 123000.00, 0, '', ''),
	(148, 10, 25, 300.00, 123000.00, 1, NULL, NULL),
	(149, 10, 26, 300.00, 123000.00, 0, '', ''),
	(150, 10, 27, 300.00, 123000.00, 1, NULL, NULL),
	(151, 10, 28, 300.00, 123000.00, 0, NULL, NULL),
	(152, 10, 29, 300.00, 123000.00, 1, NULL, NULL),
	(153, 10, 30, 518.70, 212667.00, 0, NULL, NULL),
	(154, 11, 1, 489.30, 200613.00, 1, NULL, NULL),
	(155, 11, 2, 300.00, 123000.00, 0, '', ''),
	(156, 11, 3, 300.00, 123000.00, 1, '', ''),
	(157, 11, 4, 300.00, 123000.00, 0, NULL, NULL),
	(158, 11, 5, 300.00, 123000.00, 0, NULL, NULL),
	(159, 11, 6, 483.10, 198071.00, 0, NULL, NULL),
	(160, 12, 1, 482.12, 188991.04, 0, NULL, NULL),
	(161, 12, 2, 478.55, 187591.60, 0, NULL, NULL),
	(162, 12, 3, 390.80, 153193.60, 0, NULL, NULL),
	(163, 12, 4, 415.05, 162699.60, 0, NULL, NULL),
	(164, 12, 5, 300.00, 117600.00, 0, NULL, NULL),
	(165, 12, 6, 300.00, 117600.00, 1, NULL, NULL),
	(166, 12, 7, 300.00, 117600.00, 0, NULL, NULL),
	(167, 12, 8, 300.00, 117600.00, 0, NULL, NULL),
	(168, 12, 9, 300.00, 117600.00, 1, NULL, NULL),
	(169, 12, 10, 300.00, 117600.00, 1, NULL, NULL),
	(170, 12, 11, 300.00, 117600.00, 1, NULL, NULL),
	(171, 12, 12, 300.00, 117600.00, 1, NULL, NULL),
	(172, 12, 13, 300.00, 117600.00, 1, NULL, NULL),
	(173, 12, 14, 300.00, 117600.00, 1, NULL, NULL),
	(174, 12, 15, 300.00, 117600.00, 1, NULL, NULL),
	(175, 12, 16, 300.00, 117600.00, 0, NULL, NULL),
	(176, 12, 17, 411.20, 161190.40, 0, NULL, NULL);
/*!40000 ALTER TABLE `lote` ENABLE KEYS */;

-- Dumping structure for table quilombosicor.parcela
CREATE TABLE IF NOT EXISTS `parcela` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_contrato` int(11) DEFAULT NULL,
  `num_parcela` int(11) DEFAULT NULL,
  `tipo` varchar(3) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'ENT OU FIN',
  `vencimento` date DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Tabela de Parcelas\r\n';

-- Dumping data for table quilombosicor.parcela: ~186 rows (approximately)
DELETE FROM `parcela`;
/*!40000 ALTER TABLE `parcela` DISABLE KEYS */;
INSERT INTO `parcela` (`id`, `id_contrato`, `num_parcela`, `tipo`, `vencimento`, `valor`) VALUES
	(1, 1, 1, 'ENT', '2017-07-18', 5000.00),
	(2, 1, 2, 'ENT', '2017-08-18', 5000.00),
	(3, 1, 3, 'ENT', '2017-09-18', 5000.00),
	(4, 1, 4, 'ENT', '2017-10-18', 5000.00),
	(5, 1, 5, 'ENT', '2017-11-18', 5000.00),
	(6, 1, 1, 'FIN', '2017-12-18', 1166.10),
	(7, 1, 2, 'FIN', '2018-01-18', 1166.10),
	(8, 1, 3, 'FIN', '2018-02-18', 1166.10),
	(9, 1, 4, 'FIN', '2018-03-18', 1166.10),
	(10, 1, 5, 'FIN', '2018-04-18', 1166.10),
	(11, 1, 6, 'FIN', '2018-05-18', 1166.10),
	(12, 1, 7, 'FIN', '2018-06-18', 1166.10),
	(13, 1, 8, 'FIN', '2018-07-18', 1166.10),
	(14, 1, 9, 'FIN', '2018-08-18', 1166.10),
	(15, 1, 10, 'FIN', '2018-09-18', 1166.10),
	(16, 1, 11, 'FIN', '2018-10-18', 1166.10),
	(17, 1, 12, 'FIN', '2018-11-18', 1166.10),
	(18, 1, 13, 'FIN', '2018-12-18', 1166.10),
	(19, 1, 14, 'FIN', '2019-01-18', 1166.10),
	(20, 1, 15, 'FIN', '2019-02-18', 1166.10),
	(21, 1, 16, 'FIN', '2019-03-18', 1166.10),
	(22, 1, 17, 'FIN', '2019-04-18', 1166.10),
	(23, 1, 18, 'FIN', '2019-05-18', 1166.10),
	(24, 1, 19, 'FIN', '2019-06-18', 1166.10),
	(25, 1, 20, 'FIN', '2019-07-18', 1166.10),
	(26, 1, 21, 'FIN', '2019-08-18', 1166.10),
	(27, 1, 22, 'FIN', '2019-09-18', 1166.10),
	(28, 1, 23, 'FIN', '2019-10-18', 1166.10),
	(29, 1, 24, 'FIN', '2019-11-18', 1166.10),
	(30, 1, 25, 'FIN', '2019-12-18', 1166.10),
	(31, 1, 26, 'FIN', '2020-01-18', 1166.10),
	(32, 1, 27, 'FIN', '2020-02-18', 1166.10),
	(33, 1, 28, 'FIN', '2020-03-18', 1166.10),
	(34, 1, 29, 'FIN', '2020-04-18', 1166.10),
	(35, 1, 30, 'FIN', '2020-05-18', 1166.10),
	(36, 1, 31, 'FIN', '2020-06-18', 1166.10),
	(37, 1, 32, 'FIN', '2020-07-18', 1166.10),
	(38, 1, 33, 'FIN', '2020-08-18', 1166.10),
	(39, 1, 34, 'FIN', '2020-09-18', 1166.10),
	(40, 1, 35, 'FIN', '2020-10-18', 1166.10),
	(41, 1, 36, 'FIN', '2020-11-18', 1166.10),
	(42, 1, 37, 'FIN', '2020-12-18', 1166.10),
	(43, 1, 38, 'FIN', '2021-01-18', 1166.10),
	(44, 1, 39, 'FIN', '2021-02-18', 1166.10),
	(45, 1, 40, 'FIN', '2021-03-18', 1166.10),
	(46, 1, 41, 'FIN', '2021-04-18', 1166.10),
	(47, 1, 42, 'FIN', '2021-05-18', 1166.10),
	(48, 1, 43, 'FIN', '2021-06-18', 1166.10),
	(49, 1, 44, 'FIN', '2021-07-18', 1166.10),
	(50, 1, 45, 'FIN', '2021-08-18', 1166.10),
	(51, 1, 46, 'FIN', '2021-09-18', 1166.10),
	(52, 1, 47, 'FIN', '2021-10-18', 1166.10),
	(53, 1, 48, 'FIN', '2021-11-18', 1166.10),
	(54, 1, 49, 'FIN', '2021-12-18', 1166.10),
	(55, 1, 50, 'FIN', '2022-01-18', 1166.10),
	(56, 1, 51, 'FIN', '2022-02-18', 1166.10),
	(57, 1, 52, 'FIN', '2022-03-18', 1166.10),
	(58, 1, 53, 'FIN', '2022-04-18', 1166.10),
	(59, 1, 54, 'FIN', '2022-05-18', 1166.10),
	(60, 1, 55, 'FIN', '2022-06-18', 1166.10),
	(61, 1, 56, 'FIN', '2022-07-18', 1166.10),
	(62, 1, 57, 'FIN', '2022-08-18', 1166.10),
	(63, 1, 58, 'FIN', '2022-09-18', 1166.10),
	(64, 1, 59, 'FIN', '2022-10-18', 1166.10),
	(65, 1, 60, 'FIN', '2022-11-18', 1166.10),
	(66, 1, 61, 'FIN', '2022-12-18', 1166.10),
	(67, 1, 62, 'FIN', '2023-01-18', 1166.10),
	(68, 1, 63, 'FIN', '2023-02-18', 1166.10),
	(69, 1, 64, 'FIN', '2023-03-18', 1166.10),
	(70, 1, 65, 'FIN', '2023-04-18', 1166.10),
	(71, 1, 66, 'FIN', '2023-05-18', 1166.10),
	(72, 1, 67, 'FIN', '2023-06-18', 1166.10),
	(73, 1, 68, 'FIN', '2023-07-18', 1166.10),
	(74, 1, 69, 'FIN', '2023-08-18', 1166.10),
	(75, 1, 70, 'FIN', '2023-09-18', 1166.10),
	(76, 1, 71, 'FIN', '2023-10-18', 1166.10),
	(77, 1, 72, 'FIN', '2023-11-18', 1166.10),
	(78, 1, 73, 'FIN', '2023-12-18', 1166.10),
	(79, 1, 74, 'FIN', '2024-01-18', 1166.10),
	(80, 1, 75, 'FIN', '2024-02-18', 1166.10),
	(81, 1, 76, 'FIN', '2024-03-18', 1166.10),
	(82, 1, 77, 'FIN', '2024-04-18', 1166.10),
	(83, 1, 78, 'FIN', '2024-05-18', 1166.10),
	(84, 1, 79, 'FIN', '2024-06-18', 1166.10),
	(85, 1, 80, 'FIN', '2024-07-18', 1166.10),
	(86, 1, 81, 'FIN', '2024-08-18', 1166.10),
	(87, 1, 82, 'FIN', '2024-09-18', 1166.10),
	(88, 1, 83, 'FIN', '2024-10-18', 1166.10),
	(89, 1, 84, 'FIN', '2024-11-18', 1166.10),
	(90, 1, 85, 'FIN', '2024-12-18', 1166.10),
	(91, 1, 86, 'FIN', '2025-01-18', 1166.10),
	(92, 1, 87, 'FIN', '2025-02-18', 1166.10),
	(93, 1, 88, 'FIN', '2025-03-18', 1166.10),
	(94, 1, 89, 'FIN', '2025-04-18', 1166.10),
	(95, 1, 90, 'FIN', '2025-05-18', 1166.10),
	(96, 1, 91, 'FIN', '2025-06-18', 1166.10),
	(97, 1, 92, 'FIN', '2025-07-18', 1166.10),
	(98, 1, 93, 'FIN', '2025-08-18', 1166.10),
	(99, 1, 94, 'FIN', '2025-09-18', 1166.10),
	(100, 1, 95, 'FIN', '2025-10-18', 1166.10),
	(101, 1, 96, 'FIN', '2025-11-18', 1166.10),
	(102, 1, 97, 'FIN', '2025-12-18', 1166.10),
	(103, 1, 98, 'FIN', '2026-01-18', 1166.10),
	(104, 1, 99, 'FIN', '2026-02-18', 1166.10),
	(105, 1, 100, 'FIN', '2026-03-18', 1166.10),
	(106, 1, 101, 'FIN', '2026-04-18', 1166.10),
	(107, 1, 102, 'FIN', '2026-05-18', 1166.10),
	(108, 1, 103, 'FIN', '2026-06-18', 1166.10),
	(109, 1, 104, 'FIN', '2026-07-18', 1166.10),
	(110, 1, 105, 'FIN', '2026-08-18', 1166.10),
	(111, 1, 106, 'FIN', '2026-09-18', 1166.10),
	(112, 1, 107, 'FIN', '2026-10-18', 1166.10),
	(113, 1, 108, 'FIN', '2026-11-18', 1166.10),
	(114, 1, 109, 'FIN', '2026-12-18', 1166.10),
	(115, 1, 110, 'FIN', '2027-01-18', 1166.10),
	(116, 1, 111, 'FIN', '2027-02-18', 1166.10),
	(117, 1, 112, 'FIN', '2027-03-18', 1166.10),
	(118, 1, 113, 'FIN', '2027-04-18', 1166.10),
	(119, 1, 114, 'FIN', '2027-05-18', 1166.10),
	(120, 1, 115, 'FIN', '2027-06-18', 1166.10),
	(121, 1, 116, 'FIN', '2027-07-18', 1166.10),
	(122, 1, 117, 'FIN', '2027-08-18', 1166.10),
	(123, 1, 118, 'FIN', '2027-09-18', 1166.10),
	(124, 1, 119, 'FIN', '2027-10-18', 1166.10),
	(125, 1, 120, 'FIN', '2027-11-18', 1166.10),
	(126, 1, 121, 'FIN', '2027-12-18', 1166.10),
	(127, 1, 122, 'FIN', '2028-01-18', 1166.10),
	(128, 1, 123, 'FIN', '2028-02-18', 1166.10),
	(129, 1, 124, 'FIN', '2028-03-18', 1166.10),
	(130, 1, 125, 'FIN', '2028-04-18', 1166.10),
	(131, 1, 126, 'FIN', '2028-05-18', 1166.10),
	(132, 1, 127, 'FIN', '2028-06-18', 1166.10),
	(133, 1, 128, 'FIN', '2028-07-18', 1166.10),
	(134, 1, 129, 'FIN', '2028-08-18', 1166.10),
	(135, 1, 130, 'FIN', '2028-09-18', 1166.10),
	(136, 1, 131, 'FIN', '2028-10-18', 1166.10),
	(137, 1, 132, 'FIN', '2028-11-18', 1166.10),
	(138, 1, 133, 'FIN', '2028-12-18', 1166.10),
	(139, 1, 134, 'FIN', '2029-01-18', 1166.10),
	(140, 1, 135, 'FIN', '2029-02-18', 1166.10),
	(141, 1, 136, 'FIN', '2029-03-18', 1166.10),
	(142, 1, 137, 'FIN', '2029-04-18', 1166.10),
	(143, 1, 138, 'FIN', '2029-05-18', 1166.10),
	(144, 1, 139, 'FIN', '2029-06-18', 1166.10),
	(145, 1, 140, 'FIN', '2029-07-18', 1166.10),
	(146, 1, 141, 'FIN', '2029-08-18', 1166.10),
	(147, 1, 142, 'FIN', '2029-09-18', 1166.10),
	(148, 1, 143, 'FIN', '2029-10-18', 1166.10),
	(149, 1, 144, 'FIN', '2029-11-18', 1166.10),
	(150, 1, 145, 'FIN', '2029-12-18', 1166.10),
	(151, 1, 146, 'FIN', '2030-01-18', 1166.10),
	(152, 1, 147, 'FIN', '2030-02-18', 1166.10),
	(153, 1, 148, 'FIN', '2030-03-18', 1166.10),
	(154, 1, 149, 'FIN', '2030-04-18', 1166.10),
	(155, 1, 150, 'FIN', '2030-05-18', 1166.10),
	(156, 1, 151, 'FIN', '2030-06-18', 1166.10),
	(157, 1, 152, 'FIN', '2030-07-18', 1166.10),
	(158, 1, 153, 'FIN', '2030-08-18', 1166.10),
	(159, 1, 154, 'FIN', '2030-09-18', 1166.10),
	(160, 1, 155, 'FIN', '2030-10-18', 1166.10),
	(161, 1, 156, 'FIN', '2030-11-18', 1166.10),
	(162, 1, 157, 'FIN', '2030-12-18', 1166.10),
	(163, 1, 158, 'FIN', '2031-01-18', 1166.10),
	(164, 1, 159, 'FIN', '2031-02-18', 1166.10),
	(165, 1, 160, 'FIN', '2031-03-18', 1166.10),
	(166, 1, 161, 'FIN', '2031-04-18', 1166.10),
	(167, 1, 162, 'FIN', '2031-05-18', 1166.10),
	(168, 1, 163, 'FIN', '2031-06-18', 1166.10),
	(169, 1, 164, 'FIN', '2031-07-18', 1166.10),
	(170, 1, 165, 'FIN', '2031-08-18', 1166.10),
	(171, 1, 166, 'FIN', '2031-09-18', 1166.10),
	(172, 1, 167, 'FIN', '2031-10-18', 1166.10),
	(173, 1, 168, 'FIN', '2031-11-18', 1166.10),
	(174, 1, 169, 'FIN', '2031-12-18', 1166.10),
	(175, 1, 170, 'FIN', '2032-01-18', 1166.10),
	(176, 1, 171, 'FIN', '2032-02-18', 1166.10),
	(177, 1, 172, 'FIN', '2032-03-18', 1166.10),
	(178, 1, 173, 'FIN', '2032-04-18', 1166.10),
	(179, 1, 174, 'FIN', '2032-05-18', 1166.10),
	(180, 1, 175, 'FIN', '2032-06-18', 1166.10),
	(181, 1, 176, 'FIN', '2032-07-18', 1166.10),
	(182, 1, 177, 'FIN', '2032-08-18', 1166.10),
	(183, 1, 178, 'FIN', '2032-09-18', 1166.10),
	(184, 1, 179, 'FIN', '2032-10-18', 1166.10),
	(185, 1, 180, 'FIN', '2032-11-18', 1166.10),
	(186, 2, 1, 'FIN', '2017-08-20', 150000.00);
/*!40000 ALTER TABLE `parcela` ENABLE KEYS */;

-- Dumping structure for table quilombosicor.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL,
  `quadra` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  `date_insert` int(11) NOT NULL,
  `data_update` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 - aguardando ; 1-aceita; 2-rejeitada',
  `is_finished` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Reservas de lotes';

-- Dumping data for table quilombosicor.reserva: ~0 rows (approximately)
DELETE FROM `reserva`;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` (`id`, `quadra`, `lote`, `date_insert`, `data_update`, `status`, `is_finished`) VALUES
	(0, 1, 1, 0, NULL, 0, 0);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Dumping structure for table quilombosicor.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '###Chave Primária ###',
  `nome` varchar(45) NOT NULL COMMENT 'Nome do Usuário',
  `senha` varchar(45) NOT NULL COMMENT 'Senha do Usuario',
  `email` varchar(45) NOT NULL COMMENT 'E-mail do Usuário',
  `deleted` tinyint(4) unsigned DEFAULT NULL,
  `nivel` int(11) unsigned NOT NULL DEFAULT '1' COMMENT '1- corretor; 5 - administrador',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `nome_UNIQUE` (`nome`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1 COMMENT='Tabela de Registro de usurios';

-- Dumping data for table quilombosicor.usuario: ~7 rows (approximately)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`, `nome`, `senha`, `email`, `deleted`, `nivel`) VALUES
	(47, 'Andre', '1234', 'andre@quilombonet.com.br', NULL, 5),
	(48, 'Carlos', '1234', 'carlos@quilombonet.com.br', NULL, 5),
	(49, 'Danilo', '1234', 'danilo@quilombonet.com.br', NULL, 5),
	(53, 'Ana', '1302', 'anaclaudia@quilombonet.br', NULL, 5),
	(55, 'Valencio', 'Rose', 'corretor@quilombonet.com.br', NULL, 1),
	(56, 'Localizza', 'Neli', 'neli@quilombonet.com.br', NULL, 1),
	(57, 'Zara', '1234', 'atendimento@zaramkt.com.br', NULL, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Dumping structure for view quilombosicor.viewparcela
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `viewparcela` (
	`quadra` INT(11) NOT NULL,
	`lote` INT(11) NOT NULL,
	`Valor do Lote` DECIMAL(10,2) NOT NULL,
	`valor_venda` DECIMAL(10,2) NULL,
	`data_venda` DATE NULL,
	`comprador` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`corretor` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`num_parcela` INT(11) NULL,
	`tipo` VARCHAR(3) NULL COMMENT 'ENT OU FIN' COLLATE 'latin1_general_ci',
	`vencimento` DATE NULL,
	`Valor da Parcela` DECIMAL(10,2) NULL
) ENGINE=MyISAM;

-- Dumping structure for view quilombosicor.viewparcela
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `viewparcela`;
CREATE ALGORITHM=UNDEFINED DEFINER=`quilombosicor`@`%%` SQL SECURITY DEFINER VIEW `viewparcela` AS select `lote`.`quadra` AS `quadra`,`lote`.`lote` AS `lote`,`lote`.`valor` AS `Valor do Lote`,`contrato`.`valor_venda` AS `valor_venda`,`contrato`.`data_venda` AS `data_venda`,`lote`.`comprador` AS `comprador`,`lote`.`corretor` AS `corretor`,`parcela`.`num_parcela` AS `num_parcela`,`parcela`.`tipo` AS `tipo`,`parcela`.`vencimento` AS `vencimento`,`parcela`.`valor` AS `Valor da Parcela` from (`parcela` join (`lote` join `contrato` on((`lote`.`id` = `contrato`.`id_lote`))) on((`parcela`.`id_contrato` = `contrato`.`id`)));

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
