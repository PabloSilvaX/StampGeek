-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Dez-2020 às 19:30
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stampgeek`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrin`
--

CREATE TABLE `carrin` (
  `id` int(11) NOT NULL,
  `idcara` varchar(300) NOT NULL,
  `nomecara` varchar(300) NOT NULL,
  `emailcara` varchar(300) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `preco` varchar(300) NOT NULL,
  `Qtd` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `linkprod` varchar(150) NOT NULL,
  `tamanho` varchar(20) NOT NULL,
  `estampa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrousel`
--

CREATE TABLE `carrousel` (
  `id` int(11) NOT NULL,
  `titulo_img` varchar(200) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carrousel`
--

INSERT INTO `carrousel` (`id`, `titulo_img`, `link`) VALUES
(3, '05122020_231648', 'http://localhost/projeto/index.php/page/lista_queridinhos'),
(4, '05122020_234107', 'http://localhost/projeto/index.php/loja/produtos/vestuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estampa`
--

CREATE TABLE `estampa` (
  `id` int(11) NOT NULL,
  `titulo_img` varchar(200) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estampa`
--

INSERT INTO `estampa` (`id`, `titulo_img`, `nome`, `categoria`, `estado`) VALUES
(1, '05122020_225737', 'Stranger Things Logo', 'Séries', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `idcara` varchar(200) NOT NULL,
  `idproduto` varchar(200) NOT NULL,
  `nomeproduto` varchar(200) NOT NULL,
  `precoproduto` varchar(200) NOT NULL,
  `titulo_img` varchar(200) NOT NULL,
  `linkprod` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `favoritos`
--

INSERT INTO `favoritos` (`id`, `idcara`, `idproduto`, `nomeproduto`, `precoproduto`, `titulo_img`, `linkprod`) VALUES
(3, '1', '4', 'Camiseta Cavaleiros do Zodiaco', '39.90', '05122020_235452', 'http://localhost/projeto/index.php/loja/ver_produto/4'),
(4, '1', '1', 'Boné DC Comics', '29.90', '05122020_223747', 'http://localhost/projeto/index.php/loja/ver_produto/1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens_contatos`
--

CREATE TABLE `mensagens_contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `assunto` varchar(220) NOT NULL,
  `mensagem` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` varchar(200) NOT NULL,
  `idcara` varchar(50) NOT NULL,
  `nomecara` varchar(200) NOT NULL,
  `referencia` varchar(200) NOT NULL,
  `nomereferencia` varchar(200) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `data` varchar(200) NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `local` varchar(200) NOT NULL,
  `estadoadm` varchar(200) NOT NULL,
  `destino` varchar(200) NOT NULL,
  `estadoenvio` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `ncasa` varchar(200) NOT NULL,
  `veiculoentrega` int(11) NOT NULL,
  `motivocli` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagens_contatos`
--

INSERT INTO `mensagens_contatos` (`id`, `nome`, `email`, `assunto`, `mensagem`, `created`, `estado`, `idcara`, `nomecara`, `referencia`, `nomereferencia`, `valor`, `data`, `motivo`, `local`, `estadoadm`, `destino`, `estadoenvio`, `cidade`, `bairro`, `rua`, `ncasa`, `veiculoentrega`, `motivocli`) VALUES
(1, 'Pablo da Silva', 'pablo@adm', 'Camisa regata CDZ', 'Desejo uma regata preta com a estampa dos dois lados.', '2020-12-06 13:55:43', '<i class=\"fas fa-envelope text-success\">Pedido enviado</i>', '1', 'Pablo da Silva', 'http://localhost/projeto/index.php/loja/ver_produto/4', 'Camiseta Cavaleiros do Zodiaco', '60.00', '2020-12-06', '', '', '<i class=\"far fa-credit-card text-warning\"> Aguardando o pagamento</i>', '', '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `idcliente` varchar(200) NOT NULL,
  `nomecliente` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `complemento` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `cep` varchar(200) NOT NULL,
  `produtos` longtext NOT NULL,
  `quantidades` longtext NOT NULL,
  `valores` longtext NOT NULL,
  `tamanhos` longtext NOT NULL,
  `estampas` longtext NOT NULL,
  `cores` longtext NOT NULL,
  `images` longtext NOT NULL,
  `valortotal` varchar(200) NOT NULL,
  `frete` varchar(200) NOT NULL,
  `desconto` varchar(200) NOT NULL,
  `links` longtext NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `numerocasa` varchar(100) NOT NULL,
  `etapa` varchar(80) NOT NULL,
  `datapago` varchar(80) NOT NULL,
  `parcelas` varchar(50) NOT NULL,
  `veiculoentrega` varchar(50) NOT NULL,
  `etapaloja` varchar(200) NOT NULL,
  `motivo` varchar(200) NOT NULL,
  `motivocli` varchar(200) NOT NULL,
  `data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `idcliente`, `nomecliente`, `email`, `telefone`, `endereco`, `complemento`, `bairro`, `cidade`, `cep`, `produtos`, `quantidades`, `valores`, `tamanhos`, `estampas`, `cores`, `images`, `valortotal`, `frete`, `desconto`, `links`, `cpf`, `numerocasa`, `etapa`, `datapago`, `parcelas`, `veiculoentrega`, `etapaloja`, `motivo`, `motivocli`, `data`) VALUES
(1, '1', 'Pablo da Silva', 'Pablo@adm', '40028922', 'xxxxxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxx', 'xxxxxxxxx', 'Guarulhos', '0000000000000', 'Produto 1: Caneca Marvel<br><br><br><br>', '1<br><br><br><br>', '18.90<br><br><br><br>', 'PP<br><br><br><br>', 'Estampa Padrão<br><br><br><br>', '', 'img 1:<img src=\'http://localhost/projeto/uploads/05122020_234606.jpg\' alt=\'thumbnail\' class=\'img-thumbnail\'\r\n        style=\'width: 220px\'><br>', '18.90', 'Grátis', '0.00', '<a href=\'http://localhost/projeto/index.php/loja/ver_produto/2\'>Ver</a><br><br><br><br>', '000000000000000', '000', 'Pedido pago <i class=\'far fa-credit-card text-success\'></i>', '06-12-2020 18:16:15', 'Parcelar em 7x', 'DLOG', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `preco` varchar(20) NOT NULL,
  `descricao` longtext NOT NULL,
  `titulo_img` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `favoritados` varchar(220) NOT NULL,
  `visao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `descricao`, `titulo_img`, `categoria`, `favoritados`, `visao`) VALUES
(1, 'Boné DC Comics', '29.90', 'Boné da DC Comics, confortável, não solta tinta na lavagem.', '05122020_223747', 'acessorios', '1', '1'),
(2, 'Caneca Marvel', '18.90', 'A Caneca Tom Marvel Clássica é ideal para colencionar e presentear em grande est', '05122020_234606', 'canecas', '0', '1'),
(3, 'Chaveiro Baby Yoda', '5.00', 'O Chaveiro Star Wars - Baby Yoda é um produto original e licenciado, exclusivo P', '05122020_235400', 'outros', '0', '1'),
(4, 'Camiseta Cavaleiros do Zodiaco', '39.90', 'A camiseta Cavaleiros de Bronze é um produto original, licenciado e exclusivo Pi', '05122020_235452', 'vestuario', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `titulo_img` varchar(120) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel` int(1) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `complemento` varchar(200) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `identificacao` varchar(200) NOT NULL,
  `nomecompra` varchar(200) NOT NULL,
  `telefonecompra` varchar(100) NOT NULL,
  `nascimento` varchar(50) NOT NULL,
  `cpfcompra` varchar(70) NOT NULL,
  `numerocasa` varchar(50) NOT NULL,
  `estadocompra` varchar(70) NOT NULL,
  `emailcompra` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `titulo_img`, `nome`, `email`, `telefone`, `senha`, `nivel`, `endereco`, `complemento`, `bairro`, `cidade`, `cep`, `identificacao`, `nomecompra`, `telefonecompra`, `nascimento`, `cpfcompra`, `numerocasa`, `estadocompra`, `emailcompra`) VALUES
(1, 'primeira_img', 'Pablo da Silva', 'Pablo@adm', '40028922', '202cb962ac59075b964b07152d234b70', 1, 'xxxxxxxxxxxxxxxxxxx', 'xxxxxxxxxxxxx', 'xxxxxxxxx', 'Guarulhos', '0000000000000', 'pabloxavier@uninove.com', 'Pablo da Silva', '40028922', '', '000000000000000', '000', 'São Paulo (SP)', 'Pablo@adm'),
(2, 'primeira_img', 'Emanuela', 'emanuela@adm', '40028922', 'ea4d513b2d5332a2776b0b350812c224', 1, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'primeira_img', 'Fanzin', 'fanzin@adm', '40028922', 'bb7c9d93217f64ab5dfbe2b316e29ce2', 1, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'primeira_img', 'Leonardo', 'leonardo@adm', '40028922', 'b912454ffa4389ea1d05cc10d3ea73e5', 1, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'primeira_img', 'Lucas', 'lucas@adm', '40028922', '1308dfed71297a652cc42a390e211489', 1, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'primeira_img', 'Pedro', 'pedro@adm', '40028922', 'd3ce9efea6244baa7bf718f12dd0c331', 1, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'primeira_img', 'Michelle', 'michelle@adm', '40028922', '06ee2d4b9ce7961f4718f66da1851ed4', 1, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'primeira_img', 'Luanna', 'luanna@adm', '40028922', '09d9ab6ca714046b01fc7c946fdf5564', 1, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'primeira_img', 'Victoria', 'victoria@adm', '40028922', 'c3601ad2286a4293868ec2a4bc606ba3', 1, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 'primeira_img', 'Pedro Victor', 'pedrovictor@adm', '40028922', '7ccad3dd9a68c74a9d6ec47ff19534c1', 1, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'primeira_img', 'Pablo da Silva', 'pablo@cliente', '40028922', '08d73df56eabed0bb5dec9346fd8570b', 2, '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrin`
--
ALTER TABLE `carrin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrousel`
--
ALTER TABLE `carrousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estampa`
--
ALTER TABLE `estampa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensagens_contatos`
--
ALTER TABLE `mensagens_contatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrin`
--
ALTER TABLE `carrin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carrousel`
--
ALTER TABLE `carrousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estampa`
--
ALTER TABLE `estampa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mensagens_contatos`
--
ALTER TABLE `mensagens_contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
