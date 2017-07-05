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
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Dumping structure for table sicor.lote
CREATE TABLE IF NOT EXISTS `lote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` int(11) NOT NULL DEFAULT '0',
  `quadra` int(11) NOT NULL DEFAULT '0',
  `lote` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `valor` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1 COMMENT='Tabela de lotes';

-- Dumping data for table sicor.lote: ~176 rows (approximately)
/*!40000 ALTER TABLE `lote` DISABLE KEYS */;
INSERT IGNORE INTO `lote` (`id`, `area`, `quadra`, `lote`, `status`, `valor`) VALUES
	(1, 394, 1, 1, 0, 147000),
	(2, 300, 1, 2, 0, 30000),
	(3, 300, 1, 3, 2, 15000),
	(4, 300, 1, 4, 2, 35000),
	(5, 300, 1, 5, 2, 0),
	(6, 300, 1, 6, 2, 0),
	(7, 300, 1, 7, 2, 0),
	(8, 300, 1, 8, 2, 0),
	(9, 383, 1, 9, 2, 0),
	(10, 300, 1, 10, 2, 0),
	(11, 300, 1, 11, 2, 0),
	(12, 300, 1, 12, 2, 0),
	(13, 300, 1, 13, 2, 0),
	(14, 300, 1, 14, 2, 0),
	(15, 300, 1, 15, 2, 0),
	(16, 300, 1, 16, 2, 0),
	(17, 300, 1, 17, 2, 0),
	(18, 575, 1, 18, 2, 0),
	(19, 476, 2, 1, 0, 0),
	(20, 300, 2, 2, 0, 0),
	(21, 300, 2, 3, 0, 0),
	(22, 300, 2, 4, 2, 0),
	(23, 300, 2, 5, 2, 0),
	(24, 300, 2, 6, 0, 0),
	(25, 300, 2, 7, 0, 0),
	(26, 300, 2, 8, 0, 0),
	(27, 300, 2, 9, 0, 0),
	(28, 300, 2, 10, 0, 0),
	(29, 477, 2, 11, 0, 0),
	(30, 572, 3, 1, 0, 0),
	(31, 375, 3, 2, 0, 0),
	(32, 300, 3, 3, 0, 0),
	(33, 300, 3, 4, 0, 0),
	(34, 300, 3, 5, 0, 0),
	(35, 300, 3, 6, 0, 0),
	(36, 300, 3, 7, 0, 0),
	(37, 300, 3, 8, 0, 0),
	(38, 300, 3, 9, 0, 0),
	(39, 418, 3, 10, 0, 0),
	(40, 300, 3, 11, 0, 0),
	(41, 300, 3, 12, 0, 0),
	(42, 300, 3, 13, 0, 0),
	(43, 300, 3, 14, 0, 0),
	(44, 300, 3, 15, 0, 0),
	(45, 300, 3, 16, 0, 0),
	(46, 300, 3, 17, 0, 0),
	(47, 300, 3, 18, 0, 0),
	(48, 300, 3, 19, 0, 0),
	(49, 456, 3, 20, 0, 0),
	(50, 576, 4, 1, 0, 0),
	(51, 300, 4, 2, 0, 0),
	(52, 300, 4, 3, 0, 0),
	(53, 300, 4, 4, 0, 0),
	(54, 300, 4, 5, 0, 0),
	(55, 300, 4, 6, 0, 0),
	(56, 300, 4, 7, 0, 0),
	(57, 300, 4, 8, 0, 0),
	(58, 300, 4, 9, 0, 0),
	(59, 418, 4, 10, 0, 0),
	(60, 300, 4, 11, 0, 0),
	(61, 300, 4, 12, 0, 0),
	(62, 300, 4, 13, 0, 0),
	(63, 300, 4, 14, 0, 0),
	(64, 300, 4, 15, 0, 0),
	(65, 300, 4, 16, 0, 0),
	(66, 300, 4, 17, 0, 0),
	(67, 300, 4, 18, 0, 0),
	(68, 300, 4, 19, 0, 0),
	(69, 456, 4, 20, 0, 0),
	(70, 470, 5, 1, 0, 0),
	(71, 300, 5, 2, 0, 0),
	(72, 300, 5, 3, 0, 0),
	(73, 300, 5, 4, 0, 0),
	(74, 300, 5, 5, 0, 0),
	(75, 300, 5, 6, 0, 0),
	(76, 300, 5, 7, 0, 0),
	(77, 300, 5, 8, 0, 0),
	(78, 300, 5, 9, 0, 0),
	(79, 300, 5, 10, 0, 0),
	(80, 483, 5, 11, 0, 0),
	(81, 443, 6, 1, 0, 0),
	(82, 300, 6, 2, 0, 0),
	(83, 300, 6, 3, 0, 0),
	(84, 300, 6, 4, 2, 0),
	(85, 300, 6, 5, 0, 0),
	(86, 300, 6, 6, 0, 0),
	(87, 300, 6, 7, 0, 0),
	(88, 300, 6, 8, 0, 0),
	(89, 300, 6, 9, 0, 0),
	(90, 300, 6, 10, 0, 0),
	(91, 300, 6, 11, 0, 0),
	(92, 300, 6, 12, 0, 0),
	(93, 300, 6, 13, 0, 0),
	(94, 300, 6, 14, 0, 0),
	(95, 300, 6, 15, 0, 0),
	(96, 482, 6, 16, 0, 0),
	(97, 300, 6, 17, 0, 0),
	(98, 300, 6, 18, 0, 0),
	(99, 300, 6, 19, 0, 0),
	(100, 300, 6, 20, 0, 0),
	(101, 300, 6, 21, 0, 0),
	(102, 300, 6, 22, 0, 0),
	(103, 300, 6, 23, 0, 0),
	(104, 300, 6, 24, 0, 0),
	(105, 575, 6, 25, 0, 0),
	(106, 482, 8, 1, 0, 0),
	(107, 300, 8, 2, 0, 0),
	(108, 300, 8, 3, 0, 0),
	(109, 300, 8, 4, 0, 0),
	(110, 300, 8, 5, 0, 0),
	(111, 300, 8, 6, 0, 0),
	(112, 300, 8, 7, 0, 0),
	(113, 300, 8, 8, 0, 0),
	(114, 300, 8, 9, 0, 0),
	(115, 300, 8, 10, 0, 0),
	(116, 300, 8, 11, 0, 0),
	(117, 300, 8, 12, 0, 0),
	(118, 300, 8, 13, 0, 0),
	(119, 300, 8, 14, 0, 0),
	(120, 300, 8, 15, 0, 0),
	(121, 300, 8, 16, 0, 0),
	(122, 482, 8, 17, 0, 0),
	(123, 795, 9, 1, 0, 0),
	(124, 405, 10, 1, 0, 0),
	(125, 300, 10, 2, 0, 0),
	(126, 300, 10, 3, 0, 0),
	(127, 300, 10, 4, 0, 0),
	(128, 300, 10, 5, 0, 0),
	(129, 300, 10, 6, 0, 0),
	(130, 300, 10, 7, 0, 0),
	(131, 300, 10, 8, 0, 0),
	(132, 300, 10, 9, 0, 0),
	(133, 300, 10, 10, 0, 0),
	(134, 300, 10, 11, 0, 0),
	(135, 300, 10, 12, 0, 0),
	(136, 300, 10, 13, 0, 0),
	(137, 300, 10, 14, 0, 0),
	(138, 406, 10, 15, 0, 0),
	(139, 458, 10, 16, 0, 0),
	(140, 300, 10, 17, 0, 0),
	(141, 300, 10, 18, 0, 0),
	(142, 300, 10, 19, 0, 0),
	(143, 300, 10, 20, 0, 0),
	(144, 300, 10, 21, 0, 0),
	(145, 300, 10, 22, 0, 0),
	(146, 300, 10, 23, 0, 0),
	(147, 300, 10, 24, 0, 0),
	(148, 300, 10, 25, 0, 0),
	(149, 300, 10, 26, 0, 0),
	(150, 300, 10, 27, 0, 0),
	(151, 300, 10, 28, 0, 0),
	(152, 300, 10, 29, 0, 0),
	(153, 518, 10, 30, 0, 0),
	(154, 489, 11, 1, 0, 0),
	(155, 300, 11, 2, 0, 0),
	(156, 300, 11, 3, 0, 0),
	(157, 300, 11, 4, 0, 0),
	(158, 300, 11, 5, 0, 0),
	(159, 483, 11, 6, 0, 0),
	(160, 482, 12, 1, 0, 0),
	(161, 478, 12, 2, 0, 0),
	(162, 390, 12, 3, 0, 0),
	(163, 415, 12, 4, 0, 0),
	(164, 300, 12, 5, 0, 0),
	(165, 300, 12, 6, 0, 0),
	(166, 300, 12, 7, 0, 0),
	(167, 300, 12, 8, 0, 0),
	(168, 300, 12, 9, 0, 0),
	(169, 300, 12, 10, 0, 0),
	(170, 300, 12, 11, 0, 0),
	(171, 300, 12, 12, 0, 0),
	(172, 300, 12, 13, 0, 0),
	(173, 300, 12, 14, 0, 0),
	(174, 300, 12, 15, 0, 0),
	(175, 300, 12, 16, 0, 0),
	(176, 411, 12, 17, 0, 0);
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
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT IGNORE INTO `reserva` (`id`, `quadra`, `lote`, `date_insert`, `data_update`, `status`, `is_finished`) VALUES
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
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT IGNORE INTO `usuario` (`idusuario`, `nome`, `senha`, `email`, `deleted`, `nivel`) VALUES
	(47, 'Andre', '1234', 'andre@quilombonet.com.br', NULL, 0),
	(48, 'Carlos', '1234', 'carlos@quilombonet.com.br', NULL, 0),
	(49, 'Danilo', '1234', '', NULL, 0),
	(51, 'Zara', '', 'danilo', NULL, 1),
	(53, '123', 'ddas', 'dsds', NULL, 1),
	(55, '1', '', 'd', NULL, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
