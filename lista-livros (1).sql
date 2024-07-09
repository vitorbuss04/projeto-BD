-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/07/2024 às 12:44
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
-- Banco de dados: `lista-livros`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_item` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `quant` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`id_item`, `id_produto`, `valor`, `quant`, `nome_produto`, `id_user`) VALUES
(26, 7, 21.00, 1, 'Cinco semanas em um balão', 14),
(27, 3, 59.90, 1, 'O homem de giz', 1),
(28, 3, 59.90, 1, 'O homem de giz', 1),
(29, 3, 59.90, 1, 'O homem de giz', 1),
(30, 3, 59.90, 1, 'O homem de giz', 1),
(31, 3, 59.90, 1, 'O homem de giz', 1),
(32, 3, 59.90, 1, 'O homem de giz', 1),
(33, 7, 21.00, 1, 'Cinco semanas em um balão', 2),
(34, 1, 10.00, 1, 'A versão dos afogados', 15);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `isbn` bigint(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `capa` varchar(255) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `Sinopse` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `isbn`, `autor`, `genero`, `capa`, `valor`, `Sinopse`) VALUES
(1, 'A versão dos afogados', 9788525407856, 'Luis Fernando Verissimo', 'Crônica', 'https://d1pkzhm5uq4mnt.cloudfront.net/imagens/capas/_537469eb46bef9679cfc9e7141b3f8df0d852103.jpg', 10.00, 'Este é um livro sobre o Brasil real. Nele o escritor Luis Fernando Verissimo constrói o painel dos nossos dias, utilizando a linguagem que cativou seus milhares de leitores. A análise precisa dos fatos, o humor, o ceticismo e a generosidade se combinam ao abordar o cotidiano de um país cujos contornos imprecisos revelam contradições e uma normalidade crivada de excepcionalidades. Estes textos falam do mundo, do Brasil de Éfe Agá e dos brasileiros em geral.'),
(2, 'O código Da Vinci', 8575421131, 'Dan Brown', 'Ficção', 'https://m.media-amazon.com/images/I/91QSDmqQdaL._SL1500_.jpg', 49.90, 'O Código Da Vinci é um romance policial que tem como protagonista um simbologista norte-americano. Através da obra de Leonardo Da Vinci, onde encontra várias mensagens codificadas, tenta arranjar provas para desvendar um segredo com centenas de anos. No livro surgem instituições como a Opus Dei e o Priorado do Sião.'),
(3, 'O homem de giz', 8551002937, 'C. J. Tudor', 'Suspense', 'https://m.media-amazon.com/images/I/91o6FMAy8UL._SL1500_.jpg', 59.90, 'Em 2016, Eddie e seus amigos, já com certa idade, recebem uma carta com um desenho de um homem de giz enforcado. Ocorre, então, que um de seus amigos repentinamente aparece morto. Eddie não tem dúvidas de que precisa descobrir quem cometeu o crime e como isso se relaciona com o passado de 30 anos atrás.'),
(4, 'A volta ao mundo em 80 dias', 8594318146, 'Julio Verne', 'Aventura', 'https://m.media-amazon.com/images/I/71UKvlLXALL._SL1000_.jpg', 12.90, 'Phileas Fogg, um inglês rico, metódico e um tanto quanto solitário aposta com seus colegas do clube de jogos que conseguirá dar uma volta ao mundo em apenas 80 dias. Para tal feito, o excêntrico Fogg convida seu fiel empregado Jean Passepartout e juntos viverão muitas aventuras.'),
(5, 'Viagem ao centro da terra', 8594318154, 'Julio Verne', 'Aventura', 'https://m.media-amazon.com/images/I/71kEvJKILlL._SL1000_.jpg', 13.90, 'O cientista alemão Lidenbrock encontra um pergaminho criptografado dentro de um livro antigo. Ele decifra a mensagem e descobre que um alquimista do século XVI viajou ao centro da Terra. Acompanhado do sobrinho Axel, vai à Islândia para repetir a façanha.'),
(6, 'Vinte mil léguas submarinas', 8594318766, 'Julio Verne', 'Aventura', 'https://m.media-amazon.com/images/I/710+GKGEzGL._AC_UF1000,1000_QL80_.jpg', 17.00, 'Uma expedição parte em busca de respostas mas é atacada pela criatura e três homens são lançados ao mar. Aronnax, Conselho e Ned Land são resgatados pelo suposto monstro, que descobrem se tratar de um submarino, comandado pelo capitão Nemo. Ele os salva da morte, mas pede um preço alto: serão prisioneiros para sempre.'),
(7, 'Cinco semanas em um balão', 6555521724, 'Julio Verne', 'Aventura', 'https://m.media-amazon.com/images/I/71d2lVs2c9L._SL1100_.jpg', 21.00, 'A história narra a jornada de Samuel Fergusson, que, acompanhado de seu criado e de um caçador escocês, parte de Zanzibar em um balão. O trio busca chegar à outra costa da África e encontrar no caminho a nascente do rio Nilo.'),
(8, 'Anjos e Demônios', 8575421468, 'Dan Brown', 'Ficção', 'https://m.media-amazon.com/images/I/81SlD07DNZL._SL1500_.jpg', 46.56, 'Antes de decifrar O Código Da Vinci, Robert Langdon, o famoso professor de simbologia de Harvard, vive sua primeira aventura em Anjos e demônios, quando tenta impedir que uma antiga sociedade secreta destrua a Cidade do Vaticano.'),
(9, 'A montanha encantada', 9788508081776, 'Maria José Dupré', 'Ficção', 'https://d1pkzhm5uq4mnt.cloudfront.net/imagens/capas/7a4c855f63a8e8d7c63708d0eca4a3924ff813cc.jpg', 19.99, 'As crianças ficam intrigadas com um brilho incomum que surge no topo de uma montanha próxima. Curiosas e cheias de coragem, elas decidem explorar esse lugar misterioso e encantado. Ao se aproximarem, descobrem um mundo completamente diferente, repleto de criaturas mágicas e paisagens deslumbrantes.'),
(10, 'Nightbane: 2', 6555324376, 'Alex Aster', 'Ficção', 'https://m.media-amazon.com/images/I/81Dz4i2xgnL._SL1500_.jpg', 60.51, 'Isla Crown conquistou o amor de dois dos governantes mais poderosos de Lightlark e pôs fim às maldições que atormentaram os reinos por séculos, mas ainda assim poucas pessoas conhecem a origem de seus poderes.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USER` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `SENHA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`ID_USER`, `nome`, `SENHA`) VALUES
(1, 'Buss', 'Vitor'),
(2, 'Vitorbuss12', '12345'),
(3, 'Duda', '0710'),
(6, 'Bus', 'sfsçld'),
(7, 'Usuario livre', '12345'),
(13, 'teste', '1234'),
(14, 'Eduarda22', '1234qwer'),
(15, 'Eduarda23', 'dudinhadofrifas');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `livros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
