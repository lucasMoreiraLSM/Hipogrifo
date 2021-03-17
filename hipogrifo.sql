-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Mar-2021 às 20:55
-- Versão do servidor: 10.5.3-MariaDB
-- versão do PHP: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hipogrifo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `carga_horaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matrizes`
--

CREATE TABLE `matrizes` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `ano` int(11) NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_disciplinas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `valida` varchar(255) DEFAULT NULL,
  `data_criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cpf`, `email`, `senha`, `tipo`, `status`, `valida`, `data_criado`, `data_atualizado`) VALUES
(2, 'Chrysller Candido Santos', '026.622.323-07', 'chrysllercs@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 'h72HeYca!X%JjZ%', '2021-03-06 00:02:09', '2021-03-06 19:14:06'),
(3, 'asdas dasdasd 2222', '000.000.000-00', 'admin@admin2.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1, 'DoFCgiovcS49ecg', '2021-03-06 19:19:03', '2021-03-06 19:55:06');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `matrizes`
--
ALTER TABLE `matrizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_disciplina` (`id_disciplinas`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `matrizes`
--
ALTER TABLE `matrizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `matrizes`
--
ALTER TABLE `matrizes`
  ADD CONSTRAINT `fk_disciplina` FOREIGN KEY (`id_disciplinas`) REFERENCES `disciplina` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
