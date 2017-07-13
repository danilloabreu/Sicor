-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sicor
CREATE DATABASE IF NOT EXISTS `sicor` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sicor`;

-- Dumping structure for table sicor.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora` datetime NOT NULL,
  `ip` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `mensagem` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hora` (`hora`)
) ENGINE=MyISAM AUTO_INCREMENT=424 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table sicor.logs: 0 rows
DELETE FROM `logs`;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Dumping structure for table sicor.lote
CREATE TABLE IF NOT EXISTS `lote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quadra` int(11) NOT NULL DEFAULT '0',
  `lote` int(11) NOT NULL DEFAULT '0',
  `area` decimal(10,2) NOT NULL DEFAULT '0.00',
  `valor` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1 COMMENT='Tabela de lotes';

-- Dumping data for table sicor.lote: ~176 rows (approximately)
DELETE FROM `lote`;
/*!40000 ALTER TABLE `lote` DISABLE KEYS */;
INSERT INTO `lote` (`id`, `quadra`, `lote`, `area`, `valor`, `status`) VALUES
	(1, 1, 1, 394.45, 177502.50, 2),
	(2, 1, 2, 300.00, 135000.00, 2),
	(3, 1, 3, 300.00, 135000.00, 0),
	(4, 1, 4, 300.00, 135000.00, 0),
	(5, 1, 5, 300.00, 135000.00, 0),
	(6, 1, 6, 300.00, 135000.00, 0),
	(7, 1, 7, 300.00, 135000.00, 0),
	(8, 1, 8, 300.00, 135000.00, 0),
	(9, 1, 9, 383.80, 172710.00, 0),
	(10, 1, 10, 300.00, 111600.00, 0),
	(11, 1, 11, 300.00, 111600.00, 0),
	(12, 1, 12, 300.00, 111600.00, 0),
	(13, 1, 13, 300.00, 111600.00, 0),
	(14, 1, 14, 300.00, 111600.00, 0),
	(15, 1, 15, 300.00, 111600.00, 0),
	(16, 1, 16, 300.00, 111600.00, 0),
	(17, 1, 17, 300.00, 111600.00, 0),
	(18, 1, 18, 575.20, 213974.40, 0),
	(19, 2, 1, 476.40, 177220.80, 0),
	(20, 2, 2, 300.00, 111600.00, 0),
	(21, 2, 3, 300.00, 111600.00, 0),
	(22, 2, 4, 300.00, 111600.00, 0),
	(23, 2, 5, 300.00, 111600.00, 0),
	(24, 2, 6, 300.00, 111600.00, 0),
	(25, 2, 7, 300.00, 111600.00, 0),
	(26, 2, 8, 300.00, 111600.00, 0),
	(27, 2, 9, 300.00, 111600.00, 0),
	(28, 2, 10, 300.00, 111600.00, 0),
	(29, 2, 11, 477.00, 177444.00, 0),
	(30, 3, 1, 572.10, 268887.00, 0),
	(31, 3, 2, 375.00, 176250.00, 0),
	(32, 3, 3, 300.00, 141000.00, 0),
	(33, 3, 4, 300.00, 141000.00, 0),
	(34, 3, 5, 300.00, 141000.00, 0),
	(35, 3, 6, 300.00, 141000.00, 0),
	(36, 3, 7, 300.00, 141000.00, 0),
	(37, 3, 8, 300.00, 141000.00, 0),
	(38, 3, 9, 300.00, 141000.00, 0),
	(39, 3, 10, 418.50, 196695.00, 0),
	(40, 3, 11, 300.00, 110400.00, 0),
	(41, 3, 12, 300.00, 110400.00, 0),
	(42, 3, 13, 300.00, 110400.00, 0),
	(43, 3, 14, 300.00, 110400.00, 0),
	(44, 3, 15, 300.00, 110400.00, 0),
	(45, 3, 16, 300.00, 110400.00, 0),
	(46, 3, 17, 300.00, 110400.00, 0),
	(47, 3, 18, 300.00, 110400.00, 0),
	(48, 3, 19, 300.00, 110400.00, 0),
	(49, 3, 20, 456.00, 167808.00, 0),
	(50, 4, 1, 576.15, 270790.50, 0),
	(51, 4, 2, 300.00, 141000.00, 0),
	(52, 4, 3, 300.00, 141000.00, 0),
	(53, 4, 4, 300.00, 141000.00, 0),
	(54, 4, 5, 300.00, 141000.00, 0),
	(55, 4, 6, 300.00, 141000.00, 0),
	(56, 4, 7, 300.00, 141000.00, 0),
	(57, 4, 8, 300.00, 141000.00, 0),
	(58, 4, 9, 300.00, 141000.00, 0),
	(59, 4, 10, 418.50, 196695.00, 0),
	(60, 4, 11, 300.00, 135000.00, 0),
	(61, 4, 12, 300.00, 135000.00, 0),
	(62, 4, 13, 300.00, 135000.00, 0),
	(63, 4, 14, 300.00, 135000.00, 0),
	(64, 4, 15, 300.00, 135000.00, 0),
	(65, 4, 16, 300.00, 135000.00, 0),
	(66, 4, 17, 300.00, 135000.00, 0),
	(67, 4, 18, 300.00, 135000.00, 0),
	(68, 4, 19, 300.00, 135000.00, 0),
	(69, 4, 20, 456.00, 205200.00, 0),
	(70, 5, 1, 470.10, 220947.00, 0),
	(71, 5, 2, 300.00, 141000.00, 0),
	(72, 5, 3, 300.00, 141000.00, 0),
	(73, 5, 4, 300.00, 141000.00, 0),
	(74, 5, 5, 300.00, 141000.00, 0),
	(75, 5, 6, 300.00, 141000.00, 0),
	(76, 5, 7, 300.00, 141000.00, 0),
	(77, 5, 8, 300.00, 141000.00, 0),
	(78, 5, 9, 300.00, 141000.00, 0),
	(79, 5, 10, 300.00, 141000.00, 0),
	(80, 5, 11, 483.75, 227362.50, 0),
	(81, 6, 1, 443.20, 199440.00, 0),
	(82, 6, 2, 300.00, 135000.00, 0),
	(83, 6, 3, 300.00, 135000.00, 0),
	(84, 6, 4, 300.00, 135000.00, 0),
	(85, 6, 5, 300.00, 135000.00, 0),
	(86, 6, 6, 300.00, 135000.00, 0),
	(87, 6, 7, 300.00, 135000.00, 0),
	(88, 6, 8, 300.00, 135000.00, 0),
	(89, 6, 9, 300.00, 135000.00, 0),
	(90, 6, 10, 300.00, 135000.00, 0),
	(91, 6, 11, 300.00, 135000.00, 0),
	(92, 6, 12, 300.00, 135000.00, 0),
	(93, 6, 13, 300.00, 135000.00, 0),
	(94, 6, 14, 300.00, 135000.00, 0),
	(95, 6, 15, 300.00, 135000.00, 0),
	(96, 6, 16, 482.60, 226822.00, 0),
	(97, 6, 17, 300.00, 141000.00, 0),
	(98, 6, 18, 300.00, 141000.00, 0),
	(99, 6, 19, 300.00, 141000.00, 0),
	(100, 6, 20, 300.00, 141000.00, 0),
	(101, 6, 21, 300.00, 141000.00, 0),
	(102, 6, 22, 300.00, 141000.00, 0),
	(103, 6, 23, 300.00, 141000.00, 0),
	(104, 6, 24, 300.00, 141000.00, 0),
	(105, 6, 25, 575.20, 270344.00, 0),
	(106, 8, 1, 482.60, 207518.00, 0),
	(107, 8, 2, 300.00, 129000.00, 0),
	(108, 8, 3, 300.00, 129000.00, 0),
	(109, 8, 4, 300.00, 129000.00, 0),
	(110, 8, 5, 300.00, 129000.00, 0),
	(111, 8, 6, 300.00, 129000.00, 0),
	(112, 8, 7, 300.00, 129000.00, 0),
	(113, 8, 8, 300.00, 129000.00, 0),
	(114, 8, 9, 300.00, 129000.00, 0),
	(115, 8, 10, 300.00, 129000.00, 0),
	(116, 8, 11, 300.00, 129000.00, 0),
	(117, 8, 12, 300.00, 129000.00, 0),
	(118, 8, 13, 300.00, 129000.00, 0),
	(119, 8, 14, 300.00, 129000.00, 0),
	(120, 8, 15, 300.00, 129000.00, 0),
	(121, 8, 16, 300.00, 129000.00, 0),
	(122, 8, 17, 482.60, 207518.00, 0),
	(123, 9, 1, 795.37, 292696.16, 0),
	(124, 10, 1, 405.15, 158818.80, 0),
	(125, 10, 2, 300.00, 117600.00, 0),
	(126, 10, 3, 300.00, 117600.00, 0),
	(127, 10, 4, 300.00, 117600.00, 0),
	(128, 10, 5, 300.00, 117600.00, 0),
	(129, 10, 6, 300.00, 117600.00, 0),
	(130, 10, 7, 300.00, 117600.00, 0),
	(131, 10, 8, 300.00, 117600.00, 0),
	(132, 10, 9, 300.00, 117600.00, 0),
	(133, 10, 10, 300.00, 117600.00, 0),
	(134, 10, 11, 300.00, 117600.00, 0),
	(135, 10, 12, 300.00, 117600.00, 0),
	(136, 10, 13, 300.00, 117600.00, 0),
	(137, 10, 14, 300.00, 117600.00, 0),
	(138, 10, 15, 406.50, 159348.00, 0),
	(139, 10, 16, 458.30, 187903.00, 0),
	(140, 10, 17, 300.00, 123000.00, 0),
	(141, 10, 18, 300.00, 123000.00, 0),
	(142, 10, 19, 300.00, 123000.00, 0),
	(143, 10, 20, 300.00, 123000.00, 0),
	(144, 10, 21, 300.00, 123000.00, 0),
	(145, 10, 22, 300.00, 123000.00, 0),
	(146, 10, 23, 300.00, 123000.00, 0),
	(147, 10, 24, 300.00, 123000.00, 0),
	(148, 10, 25, 300.00, 123000.00, 0),
	(149, 10, 26, 300.00, 123000.00, 0),
	(150, 10, 27, 300.00, 123000.00, 0),
	(151, 10, 28, 300.00, 123000.00, 0),
	(152, 10, 29, 300.00, 123000.00, 0),
	(153, 10, 30, 518.70, 212667.00, 0),
	(154, 11, 1, 489.30, 200613.00, 0),
	(155, 11, 2, 300.00, 123000.00, 0),
	(156, 11, 3, 300.00, 123000.00, 0),
	(157, 11, 4, 300.00, 123000.00, 0),
	(158, 11, 5, 300.00, 123000.00, 0),
	(159, 11, 6, 483.10, 198071.00, 0),
	(160, 12, 1, 482.12, 188991.04, 0),
	(161, 12, 2, 478.55, 187591.60, 0),
	(162, 12, 3, 390.80, 153193.60, 0),
	(163, 12, 4, 415.05, 162699.60, 0),
	(164, 12, 5, 300.00, 117600.00, 0),
	(165, 12, 6, 300.00, 117600.00, 0),
	(166, 12, 7, 300.00, 117600.00, 0),
	(167, 12, 8, 300.00, 117600.00, 0),
	(168, 12, 9, 300.00, 117600.00, 0),
	(169, 12, 10, 300.00, 117600.00, 0),
	(170, 12, 11, 300.00, 117600.00, 0),
	(171, 12, 12, 300.00, 117600.00, 0),
	(172, 12, 13, 300.00, 117600.00, 0),
	(173, 12, 14, 300.00, 117600.00, 0),
	(174, 12, 15, 300.00, 117600.00, 0),
	(175, 12, 16, 300.00, 117600.00, 0),
	(176, 12, 17, 411.20, 161190.40, 0);
/*!40000 ALTER TABLE `lote` ENABLE KEYS */;

-- Dumping structure for table sicor.reserva
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

-- Dumping data for table sicor.reserva: ~1 rows (approximately)
DELETE FROM `reserva`;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` (`id`, `quadra`, `lote`, `date_insert`, `data_update`, `status`, `is_finished`) VALUES
	(0, 1, 1, 0, NULL, 0, 0);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Dumping structure for table sicor.usuario
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1 COMMENT='Tabela de Registro de usurios';

-- Dumping data for table sicor.usuario: ~6 rows (approximately)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`, `nome`, `senha`, `email`, `deleted`, `nivel`) VALUES
	(47, 'Andre', '1234', 'andre@quilombonet.com.br', NULL, 0),
	(48, 'Carlos', '1234', 'carlos@quilombonet.com.br', NULL, 0),
	(49, 'Danilo', '1234', '', NULL, 5),
	(51, 'Zara', '', 'danilo', NULL, 1),
	(53, '123', 'ddas', 'dsds', NULL, 1),
	(55, 'corretor', '1234', 'd', NULL, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
