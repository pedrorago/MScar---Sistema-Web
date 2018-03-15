-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Fev-2018 às 16:24
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis_mscar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros_modelos`
--

CREATE TABLE `carros_modelos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carros_modelos`
--

INSERT INTO `carros_modelos` (`id`, `nome`) VALUES
(1, 'Toyota Corolla Xli 1.6 16v 2007/2008'),
(2, 'Fiat Uno 2017');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `tipo_pessoa` tinyint(2) NOT NULL COMMENT 'PF - 1 /  PJ - 2',
  `cpf` varchar(20) DEFAULT NULL,
  `cnpj` varchar(22) DEFAULT NULL,
  `rg` varchar(15) NOT NULL,
  `cep` varchar(13) NOT NULL,
  `endereco` varchar(500) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(150) DEFAULT NULL,
  `bairro` varchar(150) NOT NULL,
  `cidade` varchar(120) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `telefone_1` varchar(20) NOT NULL,
  `telefone_2` varchar(20) DEFAULT NULL,
  `telefone_3` varchar(20) DEFAULT NULL,
  `data_nascimento_dia` varchar(2) NOT NULL,
  `data_nascimento_mes` varchar(2) NOT NULL,
  `data_nascimento_ano` varchar(4) NOT NULL,
  `como_conheceu` varchar(1000) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `tipo_pessoa`, `cpf`, `cnpj`, `rg`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `telefone_1`, `telefone_2`, `telefone_3`, `data_nascimento_dia`, `data_nascimento_mes`, `data_nascimento_ano`, `como_conheceu`, `status`, `created_at`, `updated_at`) VALUES
(1, 'anderson santana coelho', 'andersonsantana62@gmail.com', 1, NULL, NULL, '9229767', '52280-613', 'Travessa Monte Belo', '50', NULL, 'Vasco da Gama', 'Recife', 'PE', '18-9328-7164', '-', '-', '8', '9', '1993', 'aqui mesmo', 1, '2018-01-14 00:17:13', '2018-01-14 00:17:13'),
(4, 'anderson 2', 'andersonsantana_25@hotmail.com', 1, '111.651.074-06', NULL, '9229767', '52280-613', 'Travessa Monte Belo', '50', NULL, 'Vasco da Gama', 'Recife', 'PE', '13-9328-7164', '-', '-', '15', '9', '2005', 'dasd', 1, '2018-02-15 13:07:48', '2018-02-15 13:07:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes_carros`
--

CREATE TABLE `clientes_carros` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `modelo_id` int(10) UNSIGNED NOT NULL,
  `tipo_combustivel_id` int(10) UNSIGNED NOT NULL,
  `placa` varchar(20) NOT NULL,
  `n_chassis` varchar(30) NOT NULL,
  `km` int(11) NOT NULL,
  `cor` varchar(100) NOT NULL,
  `ano_modelo` varchar(100) NOT NULL,
  `ano_fabricacao` varchar(100) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes_carros`
--

INSERT INTO `clientes_carros` (`id`, `cliente_id`, `modelo_id`, `tipo_combustivel_id`, `placa`, `n_chassis`, `km`, `cor`, `ano_modelo`, `ano_fabricacao`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'KGU-1245', '12345', 20, 'Cinza', '2016', '2016', '2018-01-14 00:17:13', '2018-01-14 00:17:13'),
(4, 4, 2, 1, 'KFC-1212', '12345', 12, 'Preta', '2013', '2012', '2018-02-15 13:07:48', '2018-02-15 13:07:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_servico`
--

CREATE TABLE `ordens_servico` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `cliente_carro_id` int(10) UNSIGNED NOT NULL,
  `modelo_id` int(11) UNSIGNED NOT NULL COMMENT 'foi necessário guardar por causa de uma busca',
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `id_servicos_tipo` int(10) NOT NULL DEFAULT '1' COMMENT 'categoria de tipos de servicos que essa ordem de serviço pertence',
  `previsao_entrega` varchar(20) NOT NULL,
  `acessorio_antena` tinyint(1) UNSIGNED NOT NULL,
  `acessorio_gps` tinyint(1) UNSIGNED NOT NULL,
  `acessorio_carregador_celular` tinyint(1) UNSIGNED NOT NULL,
  `acessorio_radio` tinyint(1) UNSIGNED NOT NULL,
  `acessorio_documentos` tinyint(1) UNSIGNED NOT NULL,
  `acessorio_calota` tinyint(1) UNSIGNED NOT NULL,
  `acessorio_manual` tinyint(1) UNSIGNED NOT NULL,
  `acessorio_estepe` tinyint(1) UNSIGNED NOT NULL,
  `acessorio_pertences` tinyint(1) UNSIGNED NOT NULL,
  `status_pedido` tinyint(2) UNSIGNED NOT NULL COMMENT '0 - aguardando | 1 - concluido',
  `status_orcamento` tinyint(4) UNSIGNED NOT NULL,
  `status_estoque` tinyint(3) UNSIGNED NOT NULL COMMENT '0 - aguardando orçamento | 1-  em andamento | 2-  atrasado | 3-  feito',
  `status_processamento` tinyint(4) UNSIGNED NOT NULL COMMENT '0- aguardando estoque | 1-  em andamento | 2-  atrasado | 3- concluído | 4- entregue',
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ordens_servico`
--

INSERT INTO `ordens_servico` (`id`, `cliente_id`, `cliente_carro_id`, `modelo_id`, `usuario_id`, `id_servicos_tipo`, `previsao_entrega`, `acessorio_antena`, `acessorio_gps`, `acessorio_carregador_celular`, `acessorio_radio`, `acessorio_documentos`, `acessorio_calota`, `acessorio_manual`, `acessorio_estepe`, `acessorio_pertences`, `status_pedido`, `status_orcamento`, `status_estoque`, `status_processamento`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, '2019-02-22T22:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, '2018-02-14 12:00:00', '2018-02-15 18:34:50'),
(7, 4, 4, 4, 7, 1, '2019-02-19T19:50', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, '2018-02-17 07:39:04', '2018-02-17 07:39:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_servico_c_seguranca`
--

CREATE TABLE `ordens_servico_c_seguranca` (
  `id` int(10) UNSIGNED NOT NULL,
  `ordem_servico_id` int(10) UNSIGNED NOT NULL,
  `item_1` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_2` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_3` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_4` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_5` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_6` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_7` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_8` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_9` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_10` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_11` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_12` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_13` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_14` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_15` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_16` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_17` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_18` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_19` tinyint(1) UNSIGNED DEFAULT NULL,
  `item_20` tinyint(1) UNSIGNED DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ordens_servico_c_seguranca`
--

INSERT INTO `ordens_servico_c_seguranca` (`id`, `ordem_servico_id`, `item_1`, `item_2`, `item_3`, `item_4`, `item_5`, `item_6`, `item_7`, `item_8`, `item_9`, `item_10`, `item_11`, `item_12`, `item_13`, `item_14`, `item_15`, `item_16`, `item_17`, `item_18`, `item_19`, `item_20`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-17 19:35:47', '2018-02-17 19:35:47'),
(3, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-17 19:39:04', '2018-02-17 19:39:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_servico_fotos`
--

CREATE TABLE `ordens_servico_fotos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ordem_servico_id` int(10) UNSIGNED NOT NULL,
  `tipo` tinyint(5) UNSIGNED NOT NULL,
  `imagem` varchar(150) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_servico_servicos`
--

CREATE TABLE `ordens_servico_servicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ordem_servico_id` int(10) UNSIGNED NOT NULL,
  `servico_id` int(10) UNSIGNED DEFAULT NULL,
  `item_comprado` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ordens_servico_servicos`
--

INSERT INTO `ordens_servico_servicos` (`id`, `ordem_servico_id`, `servico_id`, `item_comprado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, NULL, '2018-02-15 04:04:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `servico_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(120) NOT NULL,
  `fabricante` varchar(120) NOT NULL,
  `preco` double(50,2) NOT NULL,
  `descricao` varchar(300) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `servico_id`, `nome`, `fabricante`, `preco`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bobina ', 'Volkswagen', 119.90, 'bobina para volks', NULL, NULL),
(2, 1, 'Pneu', 'Michelin', 300.00, 'um pneu', '2018-02-13 02:29:38', '2018-02-13 02:29:38'),
(3, 2, 'novo produto', 'teste', 19.90, 'teste', '2018-02-17 19:02:34', '2018-02-17 19:02:34'),
(4, 1, 'Pneu 2', 'Pirelli', 199.90, 'teste', '2018-02-17 19:03:10', '2018-02-17 19:03:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `nome`) VALUES
(1, 'Administrador Geral'),
(2, 'Assistente administrativo'),
(3, 'Estoquista'),
(4, 'Mecânico'),
(5, 'Suporte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `servico_tipo_id` int(10) UNSIGNED NOT NULL,
  `modelo_id` int(10) UNSIGNED DEFAULT NULL,
  `nome` varchar(120) NOT NULL,
  `preco` double(50,2) NOT NULL,
  `estimativa_hora` varchar(20) NOT NULL,
  `estimativa_minuto` varchar(20) NOT NULL,
  `garantia` varchar(110) NOT NULL,
  `manutencao` varchar(20) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `servico_tipo_id`, `modelo_id`, `nome`, `preco`, `estimativa_hora`, `estimativa_minuto`, `garantia`, `manutencao`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Alinhamento', 19.90, '09', '01', '6 meses', '2019-02-11', '2018-02-12 02:35:08', '2018-02-12 02:35:08'),
(2, 1, 2, 'Serviço 2', 199.90, '09', '12', '6 meses', '2018-02-28', '2018-02-15 17:35:40', '2018-02-15 17:35:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos_tipos`
--

CREATE TABLE `servicos_tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(120) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos_tipos`
--

INSERT INTO `servicos_tipos` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Categoria 1', '', ''),
(2, 'Categoria 2', '', ''),
(3, 'Categoria 3', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_combustivel`
--

CREATE TABLE `tipo_combustivel` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_combustivel`
--

INSERT INTO `tipo_combustivel` (`id`, `nome`) VALUES
(1, 'Etanol'),
(2, 'Gasolina'),
(3, 'Flex'),
(4, 'Diesel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` smallint(5) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `token` varchar(150) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `role_id`, `nome`, `email`, `password`, `remember_token`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Anderson', 'andersonsantana62@gmail.com', '$2y$10$JCFUEfrsIrpEVWs5RnM4i.VeVnzrQS3vzHXvgK7IiHcBH1EoToVRW', 'LlBghhjGmnsyNNEdHRjVz0wYKD3qmt7fk6iRWa7W2lUBuiBcxYTdojYiBQmB', '$2y$10$/x900OpUH/pWGvb3Q0Tz2uvJLy2QEGx6Xhl7z06k72MF2qX33tUv.', 1, '', '2018-01-03 21:18:01'),
(2, 2, 'Josilene', 'josilene@manguetecnologia.com.br', '$2y$10$JCFUEfrsIrpEVWs5RnM4i.VeVnzrQS3vzHXvgK7IiHcBH1EoToVRW', 'GygFvFwsE1ffqVtnJlFZfqRNTtJ7Y2LzcvAUENQlwd1rFJiILnUgqni0hjPy', NULL, 1, '', ''),
(3, 1, 'Teste Mangue', 'testemangue@gmail.com', '$2y$10$JCFUEfrsIrpEVWs5RnM4i.VeVnzrQS3vzHXvgK7IiHcBH1EoToVRW', '', '$2y$10$JCFUEfrsIrpEVWs5RnM4i.VeVnzrQS3vzHXvgK7IiHcBH1EoToVRW', 1, '', ''),
(4, 2, 'anderson assistente', 'andersonsantana_25@hotmail.com', '$2y$10$hZEqOKR.VaAF06YLd7EyiOY1dYGru2XRv4Ar37Qr5.AA.cpywkaO2', NULL, NULL, 1, '2018-02-12 00:52:11', '2018-02-12 00:52:11'),
(5, 2, 'anderson', 'andersonsantana62@gmail.com', '$2y$10$Fjl2SO9033uVn.8ovTqLweOSOQmfw25SrpcRqPtVGWNDCvgUt78JS', NULL, NULL, 1, '2018-02-12 17:33:50', '2018-02-12 17:33:50'),
(6, 4, 'teste mangue', 'testemangue@gmail.com', '$2y$10$nnGwT8J3fBo4tV/4LQv/6euyJGmrBFNnPljOzUnpdQV2KoR7Tp3DG', NULL, NULL, 1, '2018-02-15 14:11:11', '2018-02-15 14:11:11'),
(7, 4, 'Teste mangue 2', 'testemangue2@gmail.com', '$2y$10$y27jXEnrqkiKJrXIZtQovewHS2bQkbO4VHjelsmKfO4j5IhZ.Wceu', NULL, NULL, 1, '2018-02-15 17:30:31', '2018-02-15 17:30:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carros_modelos`
--
ALTER TABLE `carros_modelos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes_carros`
--
ALTER TABLE `clientes_carros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordens_servico`
--
ALTER TABLE `ordens_servico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordens_servico_c_seguranca`
--
ALTER TABLE `ordens_servico_c_seguranca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordens_servico_fotos`
--
ALTER TABLE `ordens_servico_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordens_servico_servicos`
--
ALTER TABLE `ordens_servico_servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicos_tipos`
--
ALTER TABLE `servicos_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_combustivel`
--
ALTER TABLE `tipo_combustivel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carros_modelos`
--
ALTER TABLE `carros_modelos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clientes_carros`
--
ALTER TABLE `clientes_carros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ordens_servico`
--
ALTER TABLE `ordens_servico`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ordens_servico_c_seguranca`
--
ALTER TABLE `ordens_servico_c_seguranca`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordens_servico_fotos`
--
ALTER TABLE `ordens_servico_fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordens_servico_servicos`
--
ALTER TABLE `ordens_servico_servicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `servicos_tipos`
--
ALTER TABLE `servicos_tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_combustivel`
--
ALTER TABLE `tipo_combustivel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
