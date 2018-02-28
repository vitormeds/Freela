-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 28-Fev-2018 às 14:38
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

DROP TABLE IF EXISTS `anuncio`;
CREATE TABLE IF NOT EXISTS `anuncio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(300) NOT NULL,
  `conteudo` varchar(5000) NOT NULL,
  `valormedio` float NOT NULL,
  `contratante` varchar(50) NOT NULL,
  `resumo` varchar(200) NOT NULL,
  `empregado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`id`, `titulo`, `conteudo`, `valormedio`, `contratante`, `resumo`, `empregado`) VALUES
(16, 'Fazer um site', 'Fazer um site bom', 0, 'Usuario2', 'Fazer um site bom', ''),
(15, 'Criar Um APP', 'Criar Um APP Bom', 0, 'Usuario1', 'Criar Um APP Bom', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idanuncio` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id`, `idanuncio`, `usuario`, `comentario`) VALUES
(20, 16, 'Usuario1', 'Posso fazer isso'),
(19, 15, 'Usuario2', 'Posso fazer isso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarioperfil`
--

DROP TABLE IF EXISTS `comentarioperfil`;
CREATE TABLE IF NOT EXISTS `comentarioperfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idperfil` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `comentario` varchar(50) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentarioperfil`
--

INSERT INTO `comentarioperfil` (`id`, `idperfil`, `usuario`, `comentario`, `tipo`) VALUES
(64, 22, 'Usuario1', 'blablablabla', 'empregador'),
(63, 23, 'Usuario1', 'blablablabla', 'empregador'),
(62, 23, 'Usuario2', 'blablablabla', 'empregador'),
(61, 22, 'Usuario2', 'blablablabla', 'empregador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

DROP TABLE IF EXISTS `imagens`;
CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idimagem` int(11) NOT NULL,
  `caminho` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `idimagem`, `caminho`) VALUES
(11, 23, '2018-02-28-11-30-23.jpg'),
(10, 22, '2018-02-28-11-25-38.jpg'),
(9, 22, '2018-02-28-11-25-35.jpg'),
(12, 23, '2018-02-28-11-30-28.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linkgithub`
--

DROP TABLE IF EXISTS `linkgithub`;
CREATE TABLE IF NOT EXISTS `linkgithub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idlinkgithub` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idlinks` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `links`
--

INSERT INTO `links` (`id`, `idlinks`, `link`) VALUES
(4, 23, 'www.google.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linksdrive`
--

DROP TABLE IF EXISTS `linksdrive`;
CREATE TABLE IF NOT EXISTS `linksdrive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddrive` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linksyoutube`
--

DROP TABLE IF EXISTS `linksyoutube`;
CREATE TABLE IF NOT EXISTS `linksyoutube` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linksyoutube` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `linksyoutube`
--

INSERT INTO `linksyoutube` (`id`, `linksyoutube`, `link`) VALUES
(16, 23, 'https://www.youtube.com/embed/IYQAP5yhhZM'),
(7, 22, 'https://www.youtube.com/embed/IYQAP5yhhZM'),
(6, 22, 'https://www.youtube.com/embed/C5K-ZfIQJiQ'),
(14, 23, 'https://www.youtube.com/embed/C5K-ZfIQJiQ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

DROP TABLE IF EXISTS `notificacoes`;
CREATE TABLE IF NOT EXISTS `notificacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `site` varchar(20) DEFAULT NULL,
  `idportifolio` int(11) DEFAULT NULL,
  `nomeusuario` varchar(50) NOT NULL,
  `idcomentario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `nome`, `email`, `telefone`, `site`, `idportifolio`, `nomeusuario`, `idcomentario`) VALUES
(23, 'Usuario2', 'Insira seu email', 'Insira seu Telefone', 'Insira seu site', 52, 'Usuario2', 0),
(22, 'Usuario1', 'Insira seu email', 'Insira seu Telefone', 'Insira seu site', 51, 'Usuario1', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `portifolio`
--

DROP TABLE IF EXISTS `portifolio`;
CREATE TABLE IF NOT EXISTS `portifolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idimagens` int(11) NOT NULL,
  `idlinksyoutube` int(11) NOT NULL,
  `idlinks` int(11) NOT NULL,
  `linkgithub` varchar(50) NOT NULL,
  `nomeusuario` varchar(50) NOT NULL,
  `idportifolio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `portifolio`
--

INSERT INTO `portifolio` (`id`, `idimagens`, `idlinksyoutube`, `idlinks`, `linkgithub`, `nomeusuario`, `idportifolio`) VALUES
(5, 23, 23, 23, 'github.com/usuario2', 'Usuario2', 23),
(4, 22, 22, 22, 'github.com/usuario1', 'Usuario1', 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomedeusuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nomedeusuario`, `senha`, `email`) VALUES
(51, 'Usuario1', '122b738600a0f74f7c331c0ef59bc34c', 'usuario1@usuario1.com'),
(52, 'Usuario2', '2fb6c8d2f3842a5ceaa9bf320e649ff0', 'usuario2@usuario2.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
