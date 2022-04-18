SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `mmtech`
--
CREATE DATABASE IF NOT EXISTS `mmtech` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mmtech`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios_tbl`
--

DROP TABLE IF EXISTS `funcionarios_tbl`;
CREATE TABLE `funcionarios_tbl` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `datacadastro` datetime DEFAULT NULL,
  `ativo` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario_setores_tbl`
--

DROP TABLE IF EXISTS `funcionario_setores_tbl`;
CREATE TABLE `funcionario_setores_tbl` (
  `id` int(11) NOT NULL,
  `id_funcionarios` int(11) NOT NULL,
  `id_setores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `setores_tbl`
--

DROP TABLE IF EXISTS `setores_tbl`;
CREATE TABLE `setores_tbl` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1,
  `datacadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_tbl`
--

DROP TABLE IF EXISTS `usuarios_tbl`;
CREATE TABLE `usuarios_tbl` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios_tbl`
--

INSERT INTO `usuarios_tbl` (`id`, `nome`, `senha`, `ativo`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `funcionarios_tbl`
--
ALTER TABLE `funcionarios_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionario_setores_tbl`
--
ALTER TABLE `funcionario_setores_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionario_setores_funcionarios_tbl_idx` (`id_funcionarios`),
  ADD KEY `fk_funcionario_setores_setores_tbl1_idx` (`id_setores`);

--
-- Índices de tabela `setores_tbl`
--
ALTER TABLE `setores_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios_tbl`
--
ALTER TABLE `usuarios_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios_tbl`
--
ALTER TABLE `funcionarios_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `funcionario_setores_tbl`
--
ALTER TABLE `funcionario_setores_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `setores_tbl`
--
ALTER TABLE `setores_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `usuarios_tbl`
--
ALTER TABLE `usuarios_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `funcionario_setores_tbl`
--
ALTER TABLE `funcionario_setores_tbl`
  ADD CONSTRAINT `fk_funcionario_setores_funcionarios_tbl` FOREIGN KEY (`id_funcionarios`) REFERENCES `funcionarios_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_funcionario_setores_setores_tbl1` FOREIGN KEY (`id_setores`) REFERENCES `setores_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;