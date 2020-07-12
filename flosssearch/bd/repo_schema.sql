-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12-Jul-2020 às 03:10
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `repo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacoes`
--

DROP TABLE IF EXISTS `classificacoes`;
CREATE TABLE IF NOT EXISTS `classificacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_repositorio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pontuacao` tinyint(1) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_repositorio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contribuidores`
--

DROP TABLE IF EXISTS `contribuidores`;
CREATE TABLE IF NOT EXISTS `contribuidores` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_repositorio` bigint(20) NOT NULL,
  `login` varchar(255) NOT NULL,
  `avatar_url` varchar(500) DEFAULT NULL,
  `html_url` varchar(500) NOT NULL,
  `contributions` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cycle_issues_comments`
--

DROP TABLE IF EXISTS `cycle_issues_comments`;
CREATE TABLE IF NOT EXISTS `cycle_issues_comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `valor` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `labels`
--

DROP TABLE IF EXISTS `labels`;
CREATE TABLE IF NOT EXISTS `labels` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `id_repositorio` bigint(100) NOT NULL,
  `nome` varchar(535) CHARACTER SET utf8 NOT NULL,
  `url` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `color` varchar(7) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linguagens`
--

DROP TABLE IF EXISTS `linguagens`;
CREATE TABLE IF NOT EXISTS `linguagens` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `language_id` int(20) DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `pagina` int(20) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rep`
--

DROP TABLE IF EXISTS `rep`;
CREATE TABLE IF NOT EXISTS `rep` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `id_repo` bigint(100) DEFAULT NULL,
  `node_id` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `private` tinyint(1) DEFAULT NULL,
  `html_url` varchar(300) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fork` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pushed_at` datetime DEFAULT NULL,
  `homepage` varchar(300) DEFAULT NULL,
  `size` int(20) DEFAULT NULL,
  `stargazers_count` int(20) DEFAULT NULL,
  `watchers_count` int(20) DEFAULT NULL,
  `language` int(20) NOT NULL,
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
  `code_lines` int(50) DEFAULT NULL,
  `analise_code_lines` datetime DEFAULT NULL,
  `main_contributors` tinyint(1) DEFAULT NULL,
  `analise_principais_contribuidores` datetime DEFAULT NULL,
  `releases` int(20) DEFAULT NULL,
  `analise_maturidade` datetime DEFAULT NULL,
  `quantidade_commits` int(20) DEFAULT NULL,
  `analise_quantidade_commits` datetime DEFAULT NULL,
  `insercao_base` varchar(500) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `atualizado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_repo` (`id_repo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `repositorios`
--

DROP TABLE IF EXISTS `repositorios`;
CREATE TABLE IF NOT EXISTS `repositorios` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `id_repo` bigint(100) DEFAULT NULL,
  `node_id` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `private` tinyint(1) DEFAULT NULL,
  `html_url` varchar(300) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fork` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `pushed_at` datetime DEFAULT NULL,
  `homepage` varchar(300) DEFAULT NULL,
  `size` int(20) DEFAULT NULL,
  `stargazers_count` int(20) DEFAULT NULL,
  `watchers_count` int(20) DEFAULT NULL,
  `language` int(20) NOT NULL,
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
  `code_lines` int(50) DEFAULT NULL,
  `analise_code_lines` datetime DEFAULT NULL,
  `main_contributors` tinyint(1) DEFAULT NULL,
  `analise_principais_contribuidores` datetime DEFAULT NULL,
  `releases` int(20) DEFAULT NULL,
  `analise_maturidade` datetime DEFAULT NULL,
  `quantidade_commits` int(20) DEFAULT NULL,
  `analise_quantidade_commits` datetime DEFAULT NULL,
  `insercao_base` varchar(500) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `classified` tinyint(1) NOT NULL DEFAULT 0,
  `commented` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `id_repo` (`id_repo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `rep`
--
ALTER TABLE `rep` ADD FULLTEXT KEY `description` (`description`);

--
-- Índices para tabela `repositorios`
--
ALTER TABLE `repositorios` ADD FULLTEXT KEY `description` (`description`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
