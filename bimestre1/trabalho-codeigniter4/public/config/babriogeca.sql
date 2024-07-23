-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 23-Jul-2024 às 17:37
-- Versão do servidor: 8.0.37-0ubuntu0.22.04.3
-- versão do PHP: 7.3.33-8+ubuntu22.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `babriogeca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id` int NOT NULL,
  `id_livro` int NOT NULL,
  `id_nerd` int NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` bigint UNSIGNED NOT NULL,
  `autores` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `editora` varchar(255) NOT NULL,
  `locatario` varchar(255) DEFAULT NULL,
  `disponiveis` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `autores`, `titulo`, `ano`, `editora`, `locatario`, `disponiveis`) VALUES
(1, 'J. R. R. Tolkien', 'O Hobbit (Ou Lá e De Volta Outra Vez)', '2019', 'Harper Collins Brasil', NULL, 42),
(2, 'Vitor Brauer', 'Festa', '2022', 'Independente', NULL, 999);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nerds`
--

CREATE TABLE `nerds` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adm` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `nerds`
--

INSERT INTO `nerds` (`id`, `username`, `email`, `password`, `adm`) VALUES
(1, 'admin', 'admin', '$2y$10$V1KpNLKlGQvQaRBuU6iWIOktNNJizGUAosbcfQGcp2H5AKqMaULjO', 1),
(2, 'user', 'user', '$2y$10$oUe2OXxqJO2vCFjr7dNyiu.egnGpDfuVN4Xz0t9i3V9Zca37iL8Ja', NULL),
(5, 'juan', 'juan', '$2y$10$62y2kHcW5oSwVIiN/EoT..Vflf94lYiodJ8olXMpLQxRvxuB/WkEG', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `nerds`
--
ALTER TABLE `nerds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `nerds`
--
ALTER TABLE `nerds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
