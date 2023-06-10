-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2023 às 22:56
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prontuariobd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `armazena`
--

CREATE TABLE `armazena` (
  `ID_arquivos` int(11) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `arquivo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `ID_consulta` int(11) NOT NULL,
  `dt_consulta` date DEFAULT NULL,
  `ID_medico` int(11) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`ID_consulta`, `dt_consulta`, `ID_medico`, `cpf`) VALUES
(1, '2023-06-08', 1, '3456456456'),
(3, '2023-06-08', 1, '3456456456'),
(5, '2023-06-11', 1, '52374589632');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospital`
--

CREATE TABLE `hospital` (
  `ID_hospital` int(11) NOT NULL,
  `nome_hospital` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `responsavel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `hospital`
--

INSERT INTO `hospital` (`ID_hospital`, `nome_hospital`, `endereco`, `telefone`, `responsavel`) VALUES
(1, 'Hospital Cruz Verde', 'Rua Lucinda de Matos', '(13) 2793-8452', 'João Neves'),
(3, 'Hospital Força', 'Rua Joaçaba', '(12) 3963-7345', 'Jorge Lucas'),
(4, 'Hospital São Luiz', 'Rua Alvaro Feijão', '(14) 3909-2968', 'Pietra Nina'),
(5, 'Hospital Serrado', 'Parque das luzes', '(14) 3909-2968', 'João Pedro'),
(6, 'Hospital São Luiz', 'Rua Oito de abril, 98 - Centro', '1935472145', 'Maria Aparecida'),
(7, 'Sao Luiz', 'Rua Maria odette, 99 - Centro', '1935421254', 'Alberto Gomes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `ID_medico` int(11) NOT NULL,
  `nomemedico` varchar(50) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `sexo` enum('Masculino','Feminino','Outro','Prefiro não informar') DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `crm` varchar(20) NOT NULL,
  `especializacao` varchar(50) DEFAULT NULL,
  `naturalidade` varchar(50) DEFAULT NULL,
  `unidade_op` varchar(50) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`ID_medico`, `nomemedico`, `dt_nasc`, `sexo`, `telefone`, `crm`, `especializacao`, `naturalidade`, `unidade_op`, `endereco`, `cpf`, `senha`) VALUES
(1, 'Emily da Cruz', '1979-02-07', 'Feminino', '(11) 98795-6135', '3711', 'Dermatologia', 'São Paulo', 'Hospital Serraria', 'Rua Crescente', '909.968.688-95', '123'),
(2, 'Luiz Machado', '1988-06-15', 'Masculino', '(11) 98566-0711', '8888', 'Oftalmologia', 'Rio de Janeiro', 'Hospital São Luiz', 'Avenida Ângelo Batista Rampasso', '524.719.698-87', ''),
(3, 'Mario Henrique', '1975-09-08', 'Masculino', '(11) 98591-9900', '789', 'Oncologia', 'São Paulo', 'Hospital Cruz Verde', 'Rua Cascavel', '843.670.578-52', ''),
(4, 'Wilson Casa', '1982-09-02', 'Masculino', '(12) 99221-4145', '123', 'Infectologia', 'Bahia', 'Hospital Cruz Verde', 'Vila Santa Marta', '021.720.808-88', ''),
(5, 'Helena Silva', '1982-05-06', 'Feminino', '(11) 99854-8973', '741', 'Dermatologia', 'São Paulo', 'Hospital Força', 'Parque Santa Delfa', '421.977.598-68', ''),
(6, 'Monica Souza', '1979-05-01', 'Feminino', '(11) 98835-2408', '321', 'Oftalmologia', 'Rio de Janeiro', 'Hospital Serraria', 'Parque Guaianazes', '199.173.368-26', ''),
(7, 'Jose Joaquim', '0000-00-00', '', '19985231425', '1408', NULL, 'Santa catarina', '3', 'Rua maria delgado, 56 - JD floral', '33355522211198', '1408');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `ID_paciente` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `sexo` enum('Masculino','Feminino','Outro','Prefiro não informar') DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `nome_mae` varchar(50) DEFAULT NULL,
  `naturalidade` varchar(50) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cpf` varchar(15) NOT NULL,
  `observacoes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`ID_paciente`, `nome`, `dt_nasc`, `sexo`, `telefone`, `nome_mae`, `naturalidade`, `endereco`, `cpf`, `observacoes`) VALUES
(2, 'João Francisco', '1969-11-15', 'Masculino', '(11) 99899-3767', 'Alice Lara ', 'São Paulo', 'Rua Doutora Idelma ', '2346578', 'Paciente esta bem'),
(11, 'Thiago barros', '1985-09-16', 'Masculino', '19998256825', 'Thiago barros', 'bahia', 'Rua Lazaro guedes, 15', '3453455', 'teste envio'),
(10, 'Thiago barros2', '2023-06-20', 'Feminino', '19998256825', 'Thiago barros', 'bahia', 'Rua Lazaro guedes, 15', '3456456456', ''),
(7, 'julia', '2023-06-14', 'Feminino', '435345345', 'maria', 'japonesa', 'rua amarantes, 55', '345672345', ''),
(6, 'João Carpinteiro', '1989-07-11', 'Masculino', '(16) 99527-9187', 'Aline Lara', 'Rio de Janeiro', 'Rua Marci José', '52374589632', ''),
(1, 'Jorge Maia', '1997-03-18', 'Masculino', '(16) 99872-6431', 'Vanessa Isadora Melissa', 'Bahia', 'Avenida Francisco de Paula', '78995674', ''),
(5, 'Andreia Carolina', '1999-03-01', 'Feminino', '(13) 98659-1019', 'Isabela Alana', 'São Paulo', 'Caminho São Lázaro', '89078865', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ID_medico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `usuario`, `senha`, `ID_medico`) VALUES
(1, 'thiago', 'thiago', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `armazena`
--
ALTER TABLE `armazena`
  ADD PRIMARY KEY (`ID_arquivos`),
  ADD KEY `cpf` (`cpf`);

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`ID_consulta`),
  ADD KEY `FK_consulta_medico` (`ID_medico`),
  ADD KEY `FK_consulta_pacientes` (`cpf`);

--
-- Índices para tabela `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`ID_hospital`);

--
-- Índices para tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`ID_medico`),
  ADD UNIQUE KEY `crm` (`crm`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `senha` (`senha`),
  ADD KEY `fk_ID_medico` (`ID_medico`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `ID_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `hospital`
--
ALTER TABLE `hospital`
  MODIFY `ID_hospital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `ID_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `armazena`
--
ALTER TABLE `armazena`
  ADD CONSTRAINT `armazena_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `pacientes` (`cpf`);

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `FK_consulta_medico` FOREIGN KEY (`ID_medico`) REFERENCES `medico` (`ID_medico`),
  ADD CONSTRAINT `FK_consulta_pacientes` FOREIGN KEY (`cpf`) REFERENCES `pacientes` (`cpf`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_ID_medico` FOREIGN KEY (`ID_medico`) REFERENCES `medico` (`ID_medico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
