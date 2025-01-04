-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 06/12/2023 às 11:57
-- Versão do servidor: 10.5.20-MariaDB
-- Versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id21312579_caagua`
--
CREATE DATABASE IF NOT EXISTS `id21312579_caagua` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id21312579_caagua`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fatura`
--

CREATE TABLE `fatura` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` double NOT NULL,
  `status` char(1) NOT NULL,
  `vencimento` date NOT NULL,
  `idleitura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fatura`
--

INSERT INTO `fatura` (`id`, `data`, `valor`, `status`, `vencimento`, `idleitura`) VALUES
(2, '2023-01-03', 0, 's', '2023-01-10', 2),
(3, '2023-01-03', 25.5, 's', '2023-01-10', 3),
(4, '2023-01-03', 21, 's', '2023-01-10', 4),
(5, '2023-01-03', 15, 's', '2023-01-10', 5),
(6, '2023-01-03', 0, 's', '2023-01-10', 6),
(7, '2023-01-03', 132.5, 's', '2023-01-10', 7),
(8, '2023-01-03', 61.5, 's', '2023-01-10', 8),
(9, '2023-01-03', 22.5, 's', '2023-01-10', 9),
(10, '2023-01-03', 30, 's', '2023-01-10', 10),
(11, '2023-01-03', 48, 's', '2023-01-10', 11),
(12, '2023-01-03', 77.5, 's', '2023-01-10', 12),
(13, '2023-01-03', 15, 's', '2023-01-10', 13),
(14, '2023-01-03', 61.5, 's', '2023-01-10', 14),
(15, '2023-01-03', 64.5, 's', '2023-01-10', 15),
(16, '2023-01-03', 25.5, 's', '2023-01-10', 16),
(17, '2023-01-03', 54, 's', '2023-01-10', 17),
(18, '2023-01-03', 67.5, 's', '2023-01-10', 18),
(27, '2023-01-03', 43.5, 'n', '2023-01-10', 19),
(28, '2023-04-03', 36, 's', '2023-04-10', 22),
(29, '2023-07-02', 37.5, 's', '2023-07-09', 23),
(30, '2023-10-02', 45, 's', '2023-10-09', 24),
(31, '2023-04-03', 36, 's', '2023-04-10', 25),
(32, '2023-07-02', 36, 's', '2023-07-09', 26),
(33, '2023-10-02', 45, 'n', '2023-10-09', 27),
(34, '2023-04-03', 0, 's', '2023-04-10', 28),
(35, '2023-04-03', 31.5, 's', '2023-04-10', 29),
(36, '2023-04-03', 19.5, 's', '2023-04-10', 30),
(37, '2023-04-03', 10.5, 's', '2023-04-10', 31),
(38, '2023-04-03', 15, 's', '2023-04-10', 32),
(39, '2023-04-03', 132.5, 's', '2023-04-10', 33),
(40, '2023-04-03', 63, 's', '2023-04-10', 34),
(41, '2023-04-03', 9, 's', '2023-04-10', 35),
(42, '2023-04-03', 31.5, 's', '2023-04-10', 36),
(43, '2023-04-03', 48, 's', '2023-04-10', 37),
(44, '2023-04-03', 0, 's', '2023-04-10', 38),
(45, '2023-04-03', 34.5, 's', '2023-04-10', 39),
(46, '2023-04-03', 37.5, 's', '2023-04-10', 40),
(47, '2023-04-03', 60, 's', '2023-04-10', 41),
(48, '2023-04-03', 27, 's', '2023-04-10', 42),
(49, '2023-04-03', 0, 'n', '2023-04-10', 43),
(50, '2023-01-03', 147.5, 's', '2023-01-10', 44),
(51, '2023-07-02', 13.5, 's', '2023-07-09', 45),
(52, '2023-07-02', 97.5, 's', '2023-07-09', 46),
(53, '2023-07-02', 16.5, 's', '2023-07-09', 47),
(54, '2023-07-02', 40.5, 's', '2023-07-09', 48),
(55, '2023-07-02', 15, 's', '2023-07-09', 49),
(56, '2023-07-02', 37.5, 's', '2023-07-09', 50),
(57, '2023-07-02', 39, 's', '2023-07-09', 51),
(58, '2023-07-02', 28.5, 's', '2023-07-09', 52),
(59, '2023-03-02', 507.5, 's', '2023-03-09', 53),
(60, '2023-10-02', 13.5, 's', '2023-10-09', 54),
(61, '2023-10-02', 152.5, 's', '2023-10-09', 55),
(62, '2023-10-02', 45, 's', '2023-10-09', 56),
(63, '2023-10-02', 12, 'n', '2023-10-09', 57),
(64, '2023-10-02', 37.5, 'n', '2023-10-09', 58),
(65, '2023-10-02', 82.5, 's', '2023-10-09', 59),
(66, '2023-10-02', 19.5, 's', '2023-10-09', 60),
(67, '2023-11-01', 15, 's', '2023-11-08', 61),
(68, '2023-01-02', 67.5, 's', '2023-01-09', 62),
(69, '2023-03-02', 37.5, 's', '2023-03-09', 63),
(71, '2023-03-02', 60, 's', '2023-03-09', 65);

-- --------------------------------------------------------

--
-- Estrutura para tabela `leitura`
--

CREATE TABLE `leitura` (
  `id` int(11) NOT NULL,
  `dataleitura` date NOT NULL,
  `leituraanterior` decimal(6,1) NOT NULL,
  `leituraatual` decimal(6,1) NOT NULL,
  `idmedidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `leitura`
--

INSERT INTO `leitura` (`id`, `dataleitura`, `leituraanterior`, `leituraatual`, `idmedidor`) VALUES
(2, '2023-01-03', 484.0, 484.0, 2),
(3, '2023-01-03', 1748.0, 1765.0, 3),
(4, '2023-01-03', 1336.0, 1350.0, 4),
(5, '2023-01-03', 1036.0, 1046.0, 5),
(6, '2023-01-03', 0.0, 0.0, 6),
(7, '2023-01-03', 3418.0, 3476.0, 7),
(8, '2023-01-03', 2760.0, 2801.0, 8),
(9, '2023-01-03', 1435.0, 1450.0, 9),
(10, '2023-01-03', 1351.0, 1371.0, 10),
(11, '2023-01-03', 2429.0, 2461.0, 11),
(12, '2023-01-03', 3905.0, 3952.0, 12),
(13, '2023-01-03', 0.0, 10.0, 13),
(14, '2023-01-03', 2204.0, 2245.0, 14),
(15, '2023-01-03', 3178.0, 3221.0, 15),
(16, '2023-01-03', 0.0, 17.0, 16),
(17, '2023-01-03', 116.0, 152.0, 17),
(18, '2023-01-03', 1313.0, 1358.0, 18),
(19, '2023-01-03', 2410.0, 2439.0, 19),
(22, '2023-04-03', 2439.0, 2463.0, 19),
(23, '2023-07-02', 2463.0, 2488.0, 19),
(24, '2023-10-02', 2488.0, 2518.0, 19),
(25, '2023-04-03', 1358.0, 1382.0, 18),
(26, '2023-07-02', 1382.0, 1406.0, 18),
(27, '2023-10-02', 1406.0, 1436.0, 18),
(28, '2023-04-03', 484.0, 484.0, 2),
(29, '2023-04-03', 1765.0, 1786.0, 3),
(30, '2023-04-03', 1350.0, 1363.0, 4),
(31, '2023-04-03', 1046.0, 1053.0, 5),
(32, '2023-04-03', 0.0, 10.0, 6),
(33, '2023-04-03', 3476.0, 3534.0, 7),
(34, '2023-04-03', 2801.0, 2843.0, 8),
(35, '2023-04-03', 1450.0, 1456.0, 9),
(36, '2023-04-03', 1371.0, 1392.0, 10),
(37, '2023-04-03', 2461.0, 2493.0, 11),
(38, '2023-04-03', 3952.0, 3952.0, 12),
(39, '2023-04-03', 10.0, 33.0, 13),
(40, '2023-04-03', 2245.0, 2270.0, 14),
(41, '2023-04-03', 3221.0, 3261.0, 15),
(42, '2023-04-03', 17.0, 35.0, 16),
(43, '2023-04-03', 152.0, 152.0, 17),
(44, '2023-01-03', 3201.0, 3262.0, 21),
(45, '2023-07-02', 1053.0, 1062.0, 5),
(46, '2023-07-02', 3534.0, 3585.0, 7),
(47, '2023-07-02', 1392.0, 1403.0, 10),
(48, '2023-07-02', 2493.0, 2520.0, 11),
(49, '2023-07-02', 33.0, 43.0, 13),
(50, '2023-07-02', 2270.0, 2295.0, 14),
(51, '2023-07-02', 3261.0, 3287.0, 15),
(52, '2023-07-02', 35.0, 54.0, 16),
(53, '2023-03-02', 3262.0, 3366.0, 21),
(54, '2023-10-02', 1062.0, 1071.0, 5),
(55, '2023-10-02', 3585.0, 3647.0, 7),
(56, '2023-10-02', 2520.0, 2550.0, 11),
(57, '2023-10-02', 43.0, 51.0, 13),
(58, '2023-10-02', 2295.0, 2320.0, 14),
(59, '2023-10-02', 3287.0, 3335.0, 15),
(60, '2023-10-02', 54.0, 67.0, 16),
(61, '2023-11-01', 1071.0, 1081.0, 5),
(62, '2023-01-02', 1000.0, 1045.0, 22),
(63, '2023-03-02', 1045.0, 1070.0, 22),
(64, '2023-01-01', 1000.0, 1040.0, 23),
(65, '2023-03-02', 1040.0, 1080.0, 23);

--
-- Acionadores `leitura`
--
DELIMITER $$
CREATE TRIGGER `insere_fatura` AFTER INSERT ON `leitura` FOR EACH ROW BEGIN
    DECLARE consumo Float;
 		DECLARE valor_fatura DECIMAL(10, 2);
    SET consumo = NEW.leituraatual - NEW.leituraanterior;
    
    IF consumo <= 45 THEN
        SET valor_fatura = consumo * 1.50;
    ELSEIF consumo <= 75 THEN
        SET valor_fatura = 45 * 1.50 + (consumo - 45) * 5.00;
    ELSE
        SET valor_fatura = 45 * 1.50 + 30 * 5.00 + (consumo - 75) * 10.00;
    END IF;
    
    INSERT INTO fatura (data, valor, status, vencimento, idleitura)
    VALUES (NEW.dataleitura, valor_fatura, 'n', DATE_ADD(NEW.dataleitura, INTERVAL 7 DAY), NEW.id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `medidor`
--

CREATE TABLE `medidor` (
  `id` int(11) NOT NULL,
  `numserie` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `datainicio` date NOT NULL,
  `dataprevistatroca` date NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medidor`
--

INSERT INTO `medidor` (`id`, `numserie`, `marca`, `datainicio`, `dataprevistatroca`, `idusuario`) VALUES
(2, 789000, 'Unijato ', '2020-01-20', '2025-01-20', 3),
(3, 752151, 'Unijato ', '2020-01-20', '2025-01-20', 4),
(4, 164546, 'Unijato ', '2020-01-20', '2025-01-20', 5),
(5, 152151, 'Unijato ', '2020-05-20', '2025-05-20', 6),
(6, 921202, 'Unijato ', '2020-01-20', '2025-01-20', 7),
(7, 878918, 'Unijato ', '2020-01-20', '2025-01-20', 8),
(8, 941156, 'Unijato ', '2020-01-20', '2025-01-20', 9),
(9, 626251, 'Unijato ', '2020-01-20', '2025-01-20', 10),
(10, 620120, 'Unijato ', '2020-01-20', '2025-01-20', 11),
(11, 542621, 'Unijato ', '2020-01-20', '2025-01-20', 12),
(12, 23156, 'Unijato ', '2020-01-20', '2025-01-20', 13),
(13, 165615, 'Unijato ', '2020-01-20', '2020-01-20', 14),
(14, 548916, 'Unijato ', '2020-01-20', '2025-01-20', 15),
(15, 515616, 'Unijato ', '2020-01-20', '2020-01-20', 16),
(16, 884918, 'Unijato ', '2020-01-20', '2025-01-20', 17),
(17, 912613, 'Unijato ', '2020-01-20', '2020-01-20', 18),
(18, 519515, 'Unijato ', '2020-01-20', '2025-01-20', 19),
(19, 546165, 'Unijato ', '2020-01-20', '2025-01-20', 20),
(21, 516105, 'eliar', '2022-02-01', '2025-02-01', 22),
(22, 451616, 'Unijato', '2023-01-01', '2028-01-01', 24),
(23, 621611, 'Unijato ', '2023-01-01', '2028-01-01', 25);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `datanasc` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `status` char(1) NOT NULL,
  `admin` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `datanasc`, `email`, `telefone`, `senha`, `status`, `admin`) VALUES
(1, 'João Vitor Santi Valvassori', '22123116561', '2002-01-27', 'vitorvalvassori@gmail.com', '22558449884', '$2y$10$8Q2qpIsnuexj20KHZmvUHu/VUMMYp.ctBXhv6WdEAeO8edZbQEBDC', 's', 's'),
(3, 'Delmi Delevati', '65516561616', '1998-05-24', 'delmi@gmail.com', '56456156174', '$2y$10$hOO.tQufJXdA6EOB6d33x.X4/B2rvBijeULFnt3DpNzOfsK8Z3hbe', 's', 'n'),
(4, 'Ivori Guasso', '15423151202', '1988-01-26', 'ivori@gmail.com', '51551202208', '$2y$10$KXS4YCg6k1PlTXFJ.iQsLuNloLqgAFrNcXAVsfeSjgrZTey5mBs2W', 's', 'n'),
(5, 'Vilson Guasso', '51878941133', '1985-06-02', 'vilso@gmail.com', '15613515132', '$2y$10$1Ta71KRR6uKTQzoTKH8ql.Hsll20afM/kBFo2ja60YV8FPhmLgNpe', 's', 'n'),
(6, 'Marlei Scaramussa', '74612352131', '1988-01-25', 'marlei@gmail.com', '15634132185', '$2y$10$tn9jwPKdrLQLfGNsXE3ILeAYO2oJ0aSpE0Zkk2ZvhZ0FqegSfwFki', 's', 'n'),
(7, 'Vivaldino ', '11254888889', '1988-02-05', 'vivaldino@gmail.com', '56132544444', '$2y$10$9D4OfD5usL6KTOqQXqyCb.Ud8nbI7O./KqNfQfCVX3Q.3MPYBhKBi', 's', 'n'),
(8, 'José Bortolo Cogo', '54891633154', '1960-08-15', 'jose@gmail.com', '87465432156', '$2y$10$4aMtQBV1ENZntOte.TdNjeSvS829lVO/raeaGu8x/fTSr4GrGSmQ.', 's', 'n'),
(9, 'Bepe Cogo', '56515615605', '1945-06-12', 'bepe@gmail.com', '45166516511', '$2y$10$StuiCc0qjLIgj5OcCKleVOVeD/5erd0M6TICQbb9B8ZjhfM0PiYLy', 's', 'n'),
(10, 'Chico Cogo', '42692191192', '1975-03-31', 'chico@gmail.com', '56651321231', '$2y$10$v.Ybm6UXpKb0YNnqCewII..HDoof6CDEikIECkl2elx3EVwnHt0Zi', 's', 'n'),
(11, 'Luís Cogo', '56156184816', '1980-02-24', 'luis@gmail.com', '46861556131', '$2y$10$R90es.BJd6Zeis/PnTGeV.83BRaFhbf.FLLUxUUDis/MQCJz8n4Kq', 's', 'n'),
(12, 'Valdoci Cogo', '46548616813', '1980-07-17', 'valdoci@gmail.com', '45615565156', '$2y$10$RHkBmuRXJMAm9Iirbp8bge4lJhoYCkRQakFLp9dSweX4sXggQtwkq', 's', 'n'),
(13, 'Ciep', '56156165165', '1960-03-05', 'ciep@gmail.com', '15619844419', '$2y$10$DcFijNt2zdIurcKReBwnrOrq5zsoqRkevfeUWnWJ7tyjFWTolDybG', 's', 'n'),
(14, 'José Almadir Guasso', '15648919916', '1985-12-05', 'josealmadir@gmail.com', '78948198461', '$2y$10$6J85gz.i/GMoC20JYLC9tuyNO28Fe9vaPWjCARqP3cSBJ6Ajzlz.y', 's', 'n'),
(15, 'Rubem Durgante Cogo', '78949461615', '1992-06-05', 'rubem@gmail.com', '48949161231', '$2y$10$.StQ.PywRauAW.fI1.4dZe0plHZmm3T/Q6XI.hZwwIryIVXXLnOx2', 's', 'n'),
(16, 'Gilmar Munaretto ', '48841811111', '1980-03-21', 'gilmar@gmail.com', '48161001200', '$2y$10$ZqN6MMCPM4UgGcyJYAx5KeTylnRvCO/i52s/sumia9jqc9uB/u6R.', 's', 'n'),
(17, 'Valtair Munareto', '78789481891', '1960-10-25', 'valtair@gmail.com', '55999897451', '$2y$10$zbj/TK5yFyXGPuGidfPtre6Ffj/aKIfu.bqRxVbNb3YImVXxu0Ez.', 's', 'n'),
(18, 'Associação Concórdia', '84186161651', '1952-05-24', 'concordia@gmail.com', '66565161611', '$2y$10$suRMUf7qgvW1Px5bM6po/u/Ln1/8lUUMRxery3yUN1luRCTqTSNA2', 's', 'n'),
(19, 'João Airton Carloto Valvassori', '65416516065', '2000-02-02', 'joaoairtonv@gmail.com', '51561515165', '$2y$10$VEU3Zz0a0cBYJiNSHXmbHOkkjw2WI7fyt5kVGKBi.r/rTfxWGSfpS', 's', 'n'),
(20, 'Cleber Oliveira', '87498189161', '1995-07-06', 'cleberoliveira@gmail.com', '55669794642', '$2y$10$HJQvzCPAispMCqznGV2h/eyUMMmk4/TykTu1nAmCDzsXWopO38Qze', 's', 'n'),
(22, 'Joce Nardo', '56461561561', '2000-02-25', 'joce@gmail.com', '54156894454', '$2y$10$kr.aTJHXbgUkDyANIMvoAe765I/vw/M0ClOllVDGCTRlTABr4yI9a', 's', 'n'),
(23, 'Administrador', '56451561516', '1988-06-27', 'admin@gmail.com', '31651551615', '$2y$10$uv7aTiYXhzZOBrTuZOx1GOtA67Dosi8RHMPTO/jaNGIo.u6deSh4.', 's', 's'),
(24, 'Eliana Zen', '78984898198', '2002-08-08', 'eliana@gmail.com', '54165165156', '$2y$10$BaVtbCkl0mvjG.ZS.sTKZ.j9XiOsypskhC3RENfrkfEgBSyeQtUzq', 's', 'n'),
(25, 'Rogério Cassanta Rosado', '18541891919', '2002-08-08', 'rogerio@gmail.com', '87984891998', '$2y$10$Huff5GmY1NOBpcWZQrNYeuNI4OJgZVqcC38L7nCtDz6OD/v1iy8wO', 's', 'n');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idleitura` (`idleitura`);

--
-- Índices de tabela `leitura`
--
ALTER TABLE `leitura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idmedidor` (`idmedidor`);

--
-- Índices de tabela `medidor`
--
ALTER TABLE `medidor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idusuario` (`idusuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fatura`
--
ALTER TABLE `fatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `leitura`
--
ALTER TABLE `leitura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `medidor`
--
ALTER TABLE `medidor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `fatura`
--
ALTER TABLE `fatura`
  ADD CONSTRAINT `fk_idleitura` FOREIGN KEY (`idleitura`) REFERENCES `leitura` (`id`);

--
-- Restrições para tabelas `leitura`
--
ALTER TABLE `leitura`
  ADD CONSTRAINT `fk_idmedidor` FOREIGN KEY (`idmedidor`) REFERENCES `medidor` (`id`);

--
-- Restrições para tabelas `medidor`
--
ALTER TABLE `medidor`
  ADD CONSTRAINT `fk_idusuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
