-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Nov-2024 às 21:06
-- Versão do servidor: 8.0.26
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `organizaacad`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `idAtividade` int NOT NULL,
  `matriculaUsuario` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fotoAtividade` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `materiaAtividade` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prazoAtividade` date NOT NULL,
  `instrucoesAtividade` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`idAtividade`, `matriculaUsuario`, `fotoAtividade`, `materiaAtividade`, `prazoAtividade`, `instrucoesAtividade`) VALUES
(1, '20223003388', 'img/banco-de-dados.webp', 'BancoDeDados', '2024-10-18', 'Teste'),
(2, '20223003388', 'img/programacao-web.jpg', 'programacaoWeb1', '2024-10-18', 'Programa para bla bla bla.'),
(3, '20223003388', 'img/geografia.avif', 'geografia1', '2024-10-10', 'opikooiool'),
(6, '20223003388', 'img/portugues.webp', 'portugues', '2024-10-21', 'Atividade de Português'),
(7, '20223003388', 'img/TRABALHO.png', 'BancoDeDados', '2024-11-14', 'krjfyhweruofyh');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `matriculaUsuario` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fotoUsuario` varchar(100) NOT NULL,
  `nomeUsuario` varchar(100) NOT NULL,
  `cursoUsuario` varchar(100) NOT NULL,
  `emailUsuario` varchar(100) NOT NULL,
  `senhaUsuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`matriculaUsuario`, `fotoUsuario`, `nomeUsuario`, `cursoUsuario`, `emailUsuario`, `senhaUsuario`) VALUES
('20223003388', 'img/ana.jpg', 'Ana Julia', 'informatica', 'canajulia916@gmail.com', '7382123c351ce7cd93831ece98c9a850'),
('20223054018', 'img/Samuel_site.png', 'anny', 'informatica', 'anny@gamil.com', '202cb962ac59075b964b07152d234b70'),
('20233456789', 'img/TRABALHO.png', 'banco', 'informatica', 'asddasd@dwsf', '202cb962ac59075b964b07152d234b70'),
('20243001234', 'img/Teu pai.jpg', 'Paulo Ricardo', 'informatica', 'paulo.silva@ifpr.edu.br', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`idAtividade`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`matriculaUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atividades`
--
ALTER TABLE `atividades`
  MODIFY `idAtividade` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
