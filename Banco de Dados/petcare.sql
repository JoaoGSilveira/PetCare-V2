-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/06/2025 às 01:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `petcare`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `tipo_servico` int(11) DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `data_ag` date DEFAULT NULL,
  `id_pet` int(11) DEFAULT NULL,
  `valor_servico` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria_produto`
--

CREATE TABLE `categoria_produto` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(50) DEFAULT NULL,
  `status_categoria` enum('Ativo','Inativo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria_produto`
--

INSERT INTO `categoria_produto` (`id_categoria`, `nome_categoria`, `status_categoria`) VALUES
(1, 'Ração', 'Ativo'),
(2, 'Brinquedo', 'Ativo'),
(3, 'Casinha', 'Ativo'),
(4, 'Pestiscos / Ossinhos', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `nome` varchar(150) DEFAULT NULL,
  `razao_social` varchar(100) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `cpf_fornecedor` varchar(50) NOT NULL,
  `status_fornecedor` enum('Ativo','Inativo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens`
--

CREATE TABLE `itens` (
  `id_itens` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco_unitario` float DEFAULT NULL,
  `id_venda` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `status_marca` enum('Ativo','Inativo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `nome`, `status_marca`) VALUES
(1, 'Diversos', 'Ativo'),
(2, 'Whiskas', 'Ativo'),
(3, 'True', 'Ativo'),
(4, 'Golden', 'Ativo'),
(5, 'GranPlus', 'Ativo'),
(6, 'Special Cat', 'Ativo'),
(7, 'Suprema', 'Ativo'),
(8, 'Petiscão', 'Ativo'),
(9, 'Mastig', 'Ativo'),
(10, 'Zooverti', 'Ativo'),
(11, 'Premier', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pet`
--

CREATE TABLE `pet` (
  `id_pet` int(11) NOT NULL,
  `idade` enum('Filhote','Adulto','Idoso') DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `raca` varchar(100) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `status_pet` enum('Ativo','Inativo') DEFAULT NULL,
  `tipo_pet` enum('Gato','Cachorro') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `imagem` varchar(200) NOT NULL,
  `estoque` int(11) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `animal` enum('Ambos','Gato','Cachorro') DEFAULT NULL,
  `descritivo` varchar(200) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `status_produto` enum('Ativo','Inativo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `imagem`, `estoque`, `preco`, `animal`, `descritivo`, `id_marca`, `id_categoria`, `status_produto`) VALUES
(1, 'Ração Seca True para Gatos Adultos Castrados - 1 KG', '31027532326_Ração_Seca_True_para_Gatos_Adultos_Castrados.webp', 100, 76.9, 'Gato', 'Inspirada no amor que sentimos por eles, a True foi desenvolvida para oferecer a melhor alimentação para os nossos pets. True é a escolha do seu gato.', 3, 1, 'Ativo'),
(2, 'Ração Seca PremieR Pet Golden Salmão para Gatos Adultos Castrados - 1 KG', 'Ração_Seca_PremieR_Pet_Golden_Salmão_para_Gatos_Adultos_Castrados_-_10_1_Kg_31022435-3_1.jpg', 100, 33.5, 'Gato', '- Sabor inigualável: promove máxima satisfação para paladares exigentes; - Trato urinário saudável: minerais balanceados e controle do pH urinário; - Intestino saudável: combinação de ingredientes de ', 4, 1, 'Ativo'),
(3, 'Ração GranPlus Frango e Arroz para Gatos Castrados Adultos', '31024006_Ração_GranPlus_Frango_e_Arroz_para_Gatos_Castrados_Adultos_(2).jpg', 100, 68.9, 'Gato', 'Ração GranPlus Frango e Arroz para Gatos Castrados Adultos', 5, 1, 'Ativo'),
(4, 'Ração Seca Suprema Sabor Carne para Cães Adultos', '7899973914956.jpg', 100, 111.92, 'Cachorro', 'Ração Seca Suprema Sabor Carne para Cães Adultos', 7, 1, 'Ativo'),
(5, 'Brinquedo The Pets Brasil Ratinho Real de Corda', 'Brinquedo_The_Pets_Brasil_Ratinho_Real_de_Corda_1962834.webp', 100, 19.99, 'Gato', 'Brinquedo The Pets Brasil Ratinho Real de Corda', 1, 2, 'Ativo'),
(6, 'Brinquedo Chalesco Bola de Tênis para Cães', 'Brinquedo_Chalesco_Bola_de_Tênis_para_Cães_31022417_1.webp', 100, 17.49, 'Cachorro', 'Brinquedo Chalesco Bola de Tênis para Cães', 1, 2, 'Ativo'),
(7, 'Casinha Iglu Ecológica Recriar Pet Natural - TAM Nº4', 'Casinha_Iglu_Ecológica_Recriar_Pet_Natural_1913262_3.jpg', 100, 195.99, 'Cachorro', 'Casinha Iglu Ecológica Recriar Pet Natural', 1, 3, 'Ativo'),
(8, 'Ração Seca True para Cães Adultos Raças Pequenas - 12,6 KG', '31027537305.webp', 100, 312.99, 'Cachorro', 'Ração Seca True para Cães Adultos Raças Pequenas', 3, 1, 'Ativo'),
(9, 'Ração Úmida True Mixer Carne, Batata Doce e Ervilha para Cães - 640 g', '31027529685_Ração_Úmida_True_Mixer_Carne__Batata_Doce_e_Ervilha_para_Cães_-_640_g.jpg', 100, 30.32, 'Cachorro', 'Ração Úmida True Mixer Carne, Batata Doce e Ervilha para Cães', 3, 1, 'Ativo'),
(10, 'Osso Petiscão Defumado Mini Fêmur Natural', '_7898396112130_PETISCAO_MINI_FEMUR_NATURAL_01.jpg', 100, 10.19, 'Cachorro', 'Osso Petiscão Defumado Mini Fêmur Natural', 8, 4, 'Ativo'),
(11, 'Kit de Brinquedos Furacão Pet para Raças Médias', 'Kit-de-Brinquedos-Furacão-Pet-para-Raças-Médias.jpg', 100, 62.77, 'Cachorro', 'Kit de Brinquedos Furacão Pet para Raças Médias', 1, 2, 'Ativo'),
(12, 'Palito Mastig para Cães Porte Pequeno Sabor Bacon - 200 g', '7898612670956_(1).webp', 100, 22.29, 'Cachorro', 'Palito Mastig para Cães Porte Pequeno Sabor Bacon', 9, 4, 'Ativo'),
(13, 'Alimento Natural Papapets Zooverti Só para Gatos - 300 g', 'Tratadas_0012_7898972246075_lata_300g_zooverti_so_para_gatos_01_reduzido.jpg', 100, 28.99, 'Gato', 'Alimento Natural Papapets Zooverti Só para Gatos', 10, 1, 'Ativo'),
(14, 'Ração Premier Nutrição Clínica Obesidade para Cães Adultos Pequeno Porte - 2 KG', 'Ração_Premier_Nutrição_Clínica_Obesidade_para_Cães_Adultos_Pequeno_Porte_1741241.jpg', 100, 99.9, 'Cachorro', 'Ração Premier Nutrição Clínica Obesidade para Cães Adultos Pequeno Porte', 11, 1, 'Ativo'),
(15, 'Ração Premier Nutrição Clínica Hipoalergênico para Cães Adultos Pequeno Porte - 2 KG', 'Ração_Premier_Nutrição_Clínica_Hipoalergênico_para_Cães_Pequeno_Porte_2536355.jpg', 100, 99.9, 'Cachorro', 'Ração Premier Nutrição Clínica Hipoalergênico para Cães Adultos Pequeno Porte', 11, 1, 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_fornecedor`
--

CREATE TABLE `produto_fornecedor` (
  `id_produto` int(11) DEFAULT NULL,
  `cpf_fornecedor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `servico_status` enum('Ativo','Inativo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos_realizados`
--

CREATE TABLE `servicos_realizados` (
  `id_servicos_realizados` int(11) NOT NULL,
  `id_servico` int(11) DEFAULT NULL,
  `id_agenda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_cliente` int(11) NOT NULL,
  `tipo` enum('ADM','Cliente') DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(50) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `status_cliente` enum('Ativo','Inativo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_cliente`, `tipo`, `nome`, `email`, `senha`, `telefone`, `cpf`, `logradouro`, `bairro`, `cep`, `cidade`, `uf`, `numero`, `status_cliente`) VALUES
(1, 'ADM', 'JOAO GUILHERME SILVEIRA', 'joao_gamer31@hotmail.com', 'c8837b23ff8aaa8a2dde915473ce0991', '(14)99617-7820', '988.822.930-21', 'Casa', 'Vila industrial', '17205-360', 'Jaú', 'SP', '506', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `data_venda` varchar(50) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_pet` (`id_pet`),
  ADD KEY `tipo_servico` (`tipo_servico`);

--
-- Índices de tabela `categoria_produto`
--
ALTER TABLE `categoria_produto`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cpf_fornecedor`);

--
-- Índices de tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id_itens`),
  ADD KEY `id_venda` (`id_venda`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Índices de tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id_pet`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices de tabela `produto_fornecedor`
--
ALTER TABLE `produto_fornecedor`
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `cpf_fornecedor` (`cpf_fornecedor`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- Índices de tabela `servicos_realizados`
--
ALTER TABLE `servicos_realizados`
  ADD PRIMARY KEY (`id_servicos_realizados`),
  ADD KEY `id_servico` (`id_servico`),
  ADD KEY `id_agenda` (`id_agenda`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria_produto`
--
ALTER TABLE `categoria_produto`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id_itens` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos_realizados`
--
ALTER TABLE `servicos_realizados`
  MODIFY `id_servicos_realizados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id_pet`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`tipo_servico`) REFERENCES `servico` (`id_servico`);

--
-- Restrições para tabelas `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `itens_ibfk_1` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id_venda`),
  ADD CONSTRAINT `itens_ibfk_2` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Restrições para tabelas `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuario` (`id_cliente`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_produto` (`id_categoria`);

--
-- Restrições para tabelas `produto_fornecedor`
--
ALTER TABLE `produto_fornecedor`
  ADD CONSTRAINT `produto_fornecedor_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `produto_fornecedor_ibfk_2` FOREIGN KEY (`cpf_fornecedor`) REFERENCES `fornecedor` (`cpf_fornecedor`);

--
-- Restrições para tabelas `servicos_realizados`
--
ALTER TABLE `servicos_realizados`
  ADD CONSTRAINT `servicos_realizados_ibfk_1` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`),
  ADD CONSTRAINT `servicos_realizados_ibfk_2` FOREIGN KEY (`id_agenda`) REFERENCES `agenda` (`id_agenda`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuario` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
