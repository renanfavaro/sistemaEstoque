-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Ago-2021 às 20:48
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cod` int(30) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `min_quantity` int(11) NOT NULL,
  `operacao` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `cod`, `name`, `price`, `quantity`, `min_quantity`, `operacao`) VALUES
(1, 123456, 'Teste versao 1.0', 180.6, 12, 12, ''),
(2, 654321, 'Teste 02', 270, 14, 2, ''),
(3, 103020, 'Teste 03', 540.1, 8, 2, ''),
(5, 603016, 'Blusa Analu', 598, 0, 1, ''),
(6, 112347, 'Blusa Anabeli M', 741, 2, 2, ''),
(8, 620398, 'Blusa Ravelina Azul P', 278.5, 3, 1, ''),
(9, 902547, 'Blusa Pandora M', 462, 7, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_report`
--

CREATE TABLE `product_report` (
  `id` int(11) NOT NULL,
  `user_number` int(11) NOT NULL,
  `cod_products` int(11) NOT NULL,
  `type_action` tinyint(5) NOT NULL,
  `date_report` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `operacao` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `product_report`
--

INSERT INTO `product_report` (`id`, `user_number`, `cod_products`, `type_action`, `date_report`, `quantity`, `operacao`) VALUES
(28, 123, 123456, 1, '2021-08-23 16:04:10', 2, 'devolução loja'),
(29, 123, 603016, 2, '2021-08-23 16:23:52', 13, 'Devolução Fornecedor'),
(30, 123, 123456, 2, '2021-08-24 07:38:34', 3, 'Envio para Site'),
(31, 123, 654321, 2, '2021-08-24 08:19:51', 3, 'Envio para Loja');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_number` int(10) NOT NULL,
  `user_pass` varchar(32) NOT NULL,
  `user_token` varchar(32) DEFAULT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `user_number`, `user_pass`, `user_token`, `name`) VALUES
(1, 123, '202cb962ac59075b964b07152d234b70', '1bb1adbbe743d2b984cf09c3a06d66b2', 'Renan'),
(3, 321, 'caf1a3dfb505ffed0d024130f58c5cfa', NULL, 'Admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `product_report`
--
ALTER TABLE `product_report`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `product_report`
--
ALTER TABLE `product_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
