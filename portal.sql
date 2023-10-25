-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 18/04/2023 às 22h26min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `portal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`codigo`, `nome`) VALUES
(1, 'Educacao'),
(2, 'Economia'),
(3, 'Saude');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colunistas`
--

CREATE TABLE IF NOT EXISTS `colunistas` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `login` varchar(20) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `colunistas`
--

INSERT INTO `colunistas` (`codigo`, `nome`, `email`, `login`, `senha`) VALUES
(1, 'Marlon Pasini', 'marlonpasini@gmail.com', 'marlon1234', '1234'),
(2, 'Filipe Guizzo', 'filipeguizzo@gmail.com', 'filipe1234', '5678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `codigo` int(5) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `codregiao` int(5) NOT NULL,
  `codcategoria` int(5) NOT NULL,
  `codcolunista` int(5) NOT NULL,
  `chamada` varchar(100) CHARACTER SET latin1 NOT NULL,
  `resumo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `materia` longtext CHARACTER SET latin1 NOT NULL,
  `fotochamada` varchar(100) CHARACTER SET latin1 NOT NULL,
  `foto1` varchar(100) CHARACTER SET latin1 NOT NULL,
  `foto2` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codregiao` (`codregiao`),
  KEY `codcategoria` (`codcategoria`),
  KEY `codcolunista` (`codcolunista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `materias`
--

INSERT INTO `materias` (`codigo`, `data`, `hora`, `codregiao`, `codcategoria`, `codcolunista`, `chamada`, `resumo`, `materia`, `fotochamada`, `foto1`, `foto2`) VALUES
(1, '2023-04-05', '17:08:00', 1, 1, 1, 'frase de efeito', 'teste resumo', 'teste materia', 'fotos/bd2f7bee60c1f19981e7e0d1595ec702.png', 'fotos/f31e9034321ff3c4a118a9c9662f939b.png', 'fotos/856246f8d02d55788b396ce3372b100f.png'),
(2, '2023-04-12', '10:00:00', 2, 3, 1, 'HOSPITAL REGIONAL DE ARARANGUÃ BATE NOVOS RECORDES DE ATENDIMENTOS E COMEMORA RESULTADOS', 'O Hospital Regional de AraranguÃ¡ (HRA), Ãºnico 100% SUS da regiÃ£o, atingiu recordes histÃ³ricos de', 'O Hospital Regional de AraranguÃ¡ (HRA), Ãºnico 100% SUS da regiÃ£o, atingiu recordes histÃ³ricos de atendimentos no mÃªs de marÃ§o. Foram realizados 4.496 atendimentos ambulatoriais (consultas) e 4.899 exames, respectivamente, um aumento de 20% e 21% em relaÃ§Ã£o a meta contratada. Outro avanÃ§o foi o registro da marca de 499 cirurgias feitas no mesmo perÃ­odo. Os dados demonstram a alta produtividade do HRA, unidade da Secretaria de Estado da SaÃºde (SES), administrada pela organizaÃ§Ã£o social Instituto Maria Schmitt (IMAS).   A diretoria do hospital comemorou o feito, destacando o empenho da equipe mÃ©dica e dos demais funcionÃ¡rios em garantir o atendimento de qualidade aos pacientes. "Este resultado Ã© fruto de um trabalho conjunto, que envolveu desde a triagem na recepÃ§Ã£o atÃ© o atendimento mÃ©dico especializado. Estamos muito orgulhosos da nossa equipe e felizes por poder atender cada vez mais pessoas que necessitam de nossos serviÃ§os", disse o diretor-geral do hospital, Kristian Souza.  De acordo com os dados divulgados pelo IMAS, boa parte dos atendimentos realizados foram de emergÃªncia. AlÃ©m dos casos mais leves, foram atendidos pacientes com quadros mais graves, como fraturas, traumatismos e crises convulsivas.', 'fotos/ebc9df88d55c483aef2c05b001322f93.jpeg', 'fotos/5b55a68a9b6971bbc4e4c4fbd53ba5df.jpeg', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `regiao`
--

CREATE TABLE IF NOT EXISTS `regiao` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `regiao`
--

INSERT INTO `regiao` (`codigo`, `nome`) VALUES
(1, 'Criciúma'),
(2, 'Araranguá'),
(3, 'Içara');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`codregiao`) REFERENCES `regiao` (`codigo`),
  ADD CONSTRAINT `materias_ibfk_2` FOREIGN KEY (`codcategoria`) REFERENCES `categorias` (`codigo`),
  ADD CONSTRAINT `materias_ibfk_3` FOREIGN KEY (`codcolunista`) REFERENCES `colunistas` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
