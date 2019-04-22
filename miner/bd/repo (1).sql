-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Abr-2019 às 19:35
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contribuidores`
--

CREATE TABLE `contribuidores` (
  `id` bigint(20) NOT NULL,
  `id_repositorio` bigint(20) NOT NULL,
  `login` varchar(255) NOT NULL,
  `avatar_url` varchar(500) DEFAULT NULL,
  `html_url` varchar(500) NOT NULL,
  `contributions` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cycle_issues_comments`
--

CREATE TABLE `cycle_issues_comments` (
  `id` bigint(20) NOT NULL,
  `valor` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `labels`
--

CREATE TABLE `labels` (
  `id` bigint(100) NOT NULL,
  `id_repositorio` bigint(100) NOT NULL,
  `nome` varchar(535) CHARACTER SET utf8 NOT NULL,
  `url` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `color` varchar(7) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linguagens`
--

CREATE TABLE `linguagens` (
  `id` int(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `language_id` int(20) DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `pagina` int(20) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `repositorios`
--

CREATE TABLE `repositorios` (
  `id` bigint(100) NOT NULL,
  `id_repo` bigint(100) DEFAULT NULL,
  `node_id` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `private` tinyint(1) DEFAULT NULL,
  `html_url` varchar(300) DEFAULT NULL,
  `description` text,
  `fork` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pushed_at` datetime DEFAULT NULL,
  `homepage` varchar(300) DEFAULT NULL,
  `size` int(20) DEFAULT NULL,
  `stargazers_count` int(20) DEFAULT NULL,
  `watchers_count` int(20) DEFAULT NULL,
  `language` varchar(50) NOT NULL,
  `has_issues` tinyint(1) DEFAULT NULL,
  `has_projects` tinyint(1) DEFAULT NULL,
  `has_downloads` tinyint(1) DEFAULT NULL,
  `has_wiki` tinyint(1) DEFAULT NULL,
  `has_pages` tinyint(1) DEFAULT NULL,
  `forks_count` int(20) DEFAULT NULL,
  `open_issues_count` int(20) DEFAULT NULL,
  `license_name` varchar(200) DEFAULT NULL,
  `license_key` varchar(100) DEFAULT NULL,
  `license_url` varchar(300) DEFAULT NULL,
  `forks` int(20) DEFAULT NULL,
  `open_issues` int(20) DEFAULT NULL,
  `watchers` int(20) DEFAULT NULL,
  `default_branch` varchar(30) DEFAULT NULL,
  `score` varchar(30) DEFAULT NULL,
  `data_sincronismo` datetime DEFAULT NULL,
  `aceita_contribuicao` tinyint(1) DEFAULT NULL,
  `analise_aceita_contribuicao` datetime DEFAULT NULL,
  `data_ultimo_comentario` datetime DEFAULT NULL,
  `analise_comunidade_ativa` datetime DEFAULT NULL,
  `cycle_issues_comments` bigint(20) DEFAULT NULL,
  `total_contribuidores` int(11) DEFAULT NULL,
  `analise_numero_contribuidores` datetime DEFAULT NULL,
  `code_lines_available` tinyint(1) DEFAULT NULL,
  `code_lines` varchar(50) DEFAULT NULL,
  `analise_code_lines` datetime DEFAULT NULL,
  `main_contributors` tinyint(1) DEFAULT NULL,
  `analise_principais_contribuidores` datetime DEFAULT NULL,
  `releases` int(20) DEFAULT NULL,
  `analise_maturidade` datetime DEFAULT NULL,
  `quantidade_commits` int(20) DEFAULT NULL,
  `analise_quantidade_commits` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contribuidores`
--
ALTER TABLE `contribuidores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cycle_issues_comments`
--
ALTER TABLE `cycle_issues_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linguagens`
--
ALTER TABLE `linguagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repositorios`
--
ALTER TABLE `repositorios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_repo` (`id_repo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contribuidores`
--
ALTER TABLE `contribuidores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `cycle_issues_comments`
--
ALTER TABLE `cycle_issues_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `linguagens`
--
ALTER TABLE `linguagens`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500;

--
-- AUTO_INCREMENT for table `repositorios`
--
ALTER TABLE `repositorios`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23697;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
