-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.21-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para sicor
CREATE DATABASE IF NOT EXISTS `sicor` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sicor`;

-- Copiando estrutura para tabela sicor.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora` datetime NOT NULL,
  `ip` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `mensagem` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hora` (`hora`)
) ENGINE=MyISAM AUTO_INCREMENT=424 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Copiando dados para a tabela sicor.logs: 0 rows
DELETE FROM `logs`;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Copiando estrutura para tabela sicor.lote
CREATE TABLE IF NOT EXISTS `lote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` int(11) NOT NULL DEFAULT '0',
  `quadra` int(11) NOT NULL DEFAULT '0',
  `lote` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1 COMMENT='Tabela de lotes';

-- Copiando dados para a tabela sicor.lote: ~176 rows (aproximadamente)
DELETE FROM `lote`;
/*!40000 ALTER TABLE `lote` DISABLE KEYS */;
INSERT INTO `lote` (`id`, `area`, `quadra`, `lote`, `status`) VALUES
	(1, 394, 1, 1, 2),
	(2, 300, 1, 2, 0),
	(3, 300, 1, 3, 0),
	(4, 300, 1, 4, 0),
	(5, 300, 1, 5, 0),
	(6, 300, 1, 6, 0),
	(7, 300, 1, 7, 0),
	(8, 300, 1, 8, 0),
	(9, 383, 1, 9, 0),
	(10, 300, 1, 10, 0),
	(11, 300, 1, 11, 0),
	(12, 300, 1, 12, 0),
	(13, 300, 1, 13, 0),
	(14, 300, 1, 14, 0),
	(15, 300, 1, 15, 0),
	(16, 300, 1, 16, 0),
	(17, 300, 1, 17, 0),
	(18, 575, 1, 18, 0),
	(19, 476, 2, 1, 0),
	(20, 300, 2, 2, 0),
	(21, 300, 2, 3, 0),
	(22, 300, 2, 4, 2),
	(23, 300, 2, 5, 2),
	(24, 300, 2, 6, 0),
	(25, 300, 2, 7, 0),
	(26, 300, 2, 8, 0),
	(27, 300, 2, 9, 0),
	(28, 300, 2, 10, 0),
	(29, 477, 2, 11, 0),
	(30, 572, 3, 1, 0),
	(31, 375, 3, 2, 0),
	(32, 300, 3, 3, 0),
	(33, 300, 3, 4, 0),
	(34, 300, 3, 5, 0),
	(35, 300, 3, 6, 0),
	(36, 300, 3, 7, 0),
	(37, 300, 3, 8, 0),
	(38, 300, 3, 9, 0),
	(39, 418, 3, 10, 0),
	(40, 300, 3, 11, 0),
	(41, 300, 3, 12, 0),
	(42, 300, 3, 13, 0),
	(43, 300, 3, 14, 0),
	(44, 300, 3, 15, 0),
	(45, 300, 3, 16, 0),
	(46, 300, 3, 17, 0),
	(47, 300, 3, 18, 0),
	(48, 300, 3, 19, 0),
	(49, 456, 3, 20, 0),
	(50, 576, 4, 1, 0),
	(51, 300, 4, 2, 0),
	(52, 300, 4, 3, 0),
	(53, 300, 4, 4, 0),
	(54, 300, 4, 5, 0),
	(55, 300, 4, 6, 0),
	(56, 300, 4, 7, 0),
	(57, 300, 4, 8, 0),
	(58, 300, 4, 9, 0),
	(59, 418, 4, 10, 0),
	(60, 300, 4, 11, 0),
	(61, 300, 4, 12, 0),
	(62, 300, 4, 13, 0),
	(63, 300, 4, 14, 0),
	(64, 300, 4, 15, 0),
	(65, 300, 4, 16, 0),
	(66, 300, 4, 17, 0),
	(67, 300, 4, 18, 0),
	(68, 300, 4, 19, 0),
	(69, 456, 4, 20, 0),
	(70, 470, 5, 1, 0),
	(71, 300, 5, 2, 0),
	(72, 300, 5, 3, 0),
	(73, 300, 5, 4, 0),
	(74, 300, 5, 5, 0),
	(75, 300, 5, 6, 0),
	(76, 300, 5, 7, 0),
	(77, 300, 5, 8, 0),
	(78, 300, 5, 9, 0),
	(79, 300, 5, 10, 0),
	(80, 483, 5, 11, 0),
	(81, 443, 6, 1, 0),
	(82, 300, 6, 2, 0),
	(83, 300, 6, 3, 0),
	(84, 300, 6, 4, 2),
	(85, 300, 6, 5, 0),
	(86, 300, 6, 6, 0),
	(87, 300, 6, 7, 0),
	(88, 300, 6, 8, 0),
	(89, 300, 6, 9, 0),
	(90, 300, 6, 10, 0),
	(91, 300, 6, 11, 0),
	(92, 300, 6, 12, 0),
	(93, 300, 6, 13, 0),
	(94, 300, 6, 14, 0),
	(95, 300, 6, 15, 0),
	(96, 482, 6, 16, 0),
	(97, 300, 6, 17, 0),
	(98, 300, 6, 18, 0),
	(99, 300, 6, 19, 0),
	(100, 300, 6, 20, 0),
	(101, 300, 6, 21, 0),
	(102, 300, 6, 22, 0),
	(103, 300, 6, 23, 0),
	(104, 300, 6, 24, 0),
	(105, 575, 6, 25, 0),
	(106, 482, 8, 1, 0),
	(107, 300, 8, 2, 0),
	(108, 300, 8, 3, 0),
	(109, 300, 8, 4, 0),
	(110, 300, 8, 5, 0),
	(111, 300, 8, 6, 0),
	(112, 300, 8, 7, 0),
	(113, 300, 8, 8, 0),
	(114, 300, 8, 9, 0),
	(115, 300, 8, 10, 0),
	(116, 300, 8, 11, 0),
	(117, 300, 8, 12, 0),
	(118, 300, 8, 13, 0),
	(119, 300, 8, 14, 0),
	(120, 300, 8, 15, 0),
	(121, 300, 8, 16, 0),
	(122, 482, 8, 17, 0),
	(123, 795, 9, 1, 0),
	(124, 405, 10, 1, 0),
	(125, 300, 10, 2, 0),
	(126, 300, 10, 3, 0),
	(127, 300, 10, 4, 0),
	(128, 300, 10, 5, 0),
	(129, 300, 10, 6, 0),
	(130, 300, 10, 7, 0),
	(131, 300, 10, 8, 0),
	(132, 300, 10, 9, 0),
	(133, 300, 10, 10, 0),
	(134, 300, 10, 11, 0),
	(135, 300, 10, 12, 0),
	(136, 300, 10, 13, 0),
	(137, 300, 10, 14, 0),
	(138, 406, 10, 15, 0),
	(139, 458, 10, 16, 0),
	(140, 300, 10, 17, 0),
	(141, 300, 10, 18, 0),
	(142, 300, 10, 19, 0),
	(143, 300, 10, 20, 0),
	(144, 300, 10, 21, 0),
	(145, 300, 10, 22, 0),
	(146, 300, 10, 23, 0),
	(147, 300, 10, 24, 0),
	(148, 300, 10, 25, 0),
	(149, 300, 10, 26, 0),
	(150, 300, 10, 27, 0),
	(151, 300, 10, 28, 0),
	(152, 300, 10, 29, 0),
	(153, 518, 10, 30, 0),
	(154, 489, 11, 1, 0),
	(155, 300, 11, 2, 0),
	(156, 300, 11, 3, 0),
	(157, 300, 11, 4, 0),
	(158, 300, 11, 5, 0),
	(159, 483, 11, 6, 0),
	(160, 482, 12, 1, 0),
	(161, 478, 12, 2, 0),
	(162, 390, 12, 3, 0),
	(163, 415, 12, 4, 0),
	(164, 300, 12, 5, 0),
	(165, 300, 12, 6, 0),
	(166, 300, 12, 7, 0),
	(167, 300, 12, 8, 0),
	(168, 300, 12, 9, 0),
	(169, 300, 12, 10, 0),
	(170, 300, 12, 11, 0),
	(171, 300, 12, 12, 0),
	(172, 300, 12, 13, 0),
	(173, 300, 12, 14, 0),
	(174, 300, 12, 15, 0),
	(175, 300, 12, 16, 0),
	(176, 411, 12, 17, 0);
/*!40000 ALTER TABLE `lote` ENABLE KEYS */;

-- Copiando estrutura para tabela sicor.reserva
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

-- Copiando dados para a tabela sicor.reserva: ~1 rows (aproximadamente)
DELETE FROM `reserva`;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` (`id`, `quadra`, `lote`, `date_insert`, `data_update`, `status`, `is_finished`) VALUES
	(0, 1, 1, 0, NULL, 0, 0);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

-- Copiando estrutura para tabela sicor.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT COMMENT '###Chave Primária ###',
  `nome` varchar(45) NOT NULL COMMENT 'Nome do Usuário',
  `senha` varchar(45) NOT NULL COMMENT 'Senha do Usuario',
  `email` varchar(45) NOT NULL COMMENT 'E-mail do Usuário',
  `deleted` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `nome_UNIQUE` (`nome`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 COMMENT='Tabela de Registro de usurios';

-- Copiando dados para a tabela sicor.usuario: ~2 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`, `nome`, `senha`, `email`, `deleted`) VALUES
	(47, 'Andre', '1234', 'andre@quilombonet.com.br', NULL),
	(48, 'Carlos', '1234', 'carlos@quilombonet.com.br', NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
