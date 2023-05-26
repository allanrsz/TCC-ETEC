-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Maio-2023 às 02:30
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `registrar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `pergunta` varchar(255) NOT NULL,
  `opcao_a` varchar(255) NOT NULL,
  `opcao_b` varchar(255) NOT NULL,
  `opcao_c` varchar(255) NOT NULL,
  `opcao_d` varchar(255) NOT NULL,
  `resposta_correta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta`, `opcao_a`, `opcao_b`, `opcao_c`, `opcao_d`, `resposta_correta`) VALUES
(1, '1 - Qual das seguintes linguagens de programação é amplamente usada para desenvolvimento web?', 'Java', 'C++', 'JavaScript', 'Python', 'C'),
(2, '2 - Qual dos seguintes é um ambiente de desenvolvimento integrado (IDE) popular para programação em Java?', 'Eclipse', 'Visual Studio Code', 'Sublime Text', 'Atom', 'A'),
(3, '3 - O que significa a sigla \"SQL\" em termos de bancos de dados?', 'Structured Query Language', 'Simple Query Language', 'System Query Logic', 'Standard Query Level', 'A'),
(4, '4 - Qual dos seguintes é um sistema de controle de versão amplamente utilizado?', 'Git', 'FTP', 'HTTP', 'DNS', 'A'),
(5, '5 - Qual dos seguintes é um framework popular para desenvolvimento de aplicativos móveis?', 'Angular', 'Django', 'React Native', 'Laravel', 'C'),
(6, '6 - O que é um \"bug\" no contexto do desenvolvimento de software?', 'Um erro ou defeito em um programa de computador', 'Um recurso adicional em um software', 'Uma linguagem de programação específica', 'Um dispositivo de armazenamento de dados', 'A'),
(7, '7 - O que é \"frontend\" no desenvolvimento web?', 'A parte do servidor responsável por processar solicitações do cliente', 'A interface do usuário visível e interativa em um site ou aplicativo', 'Um tipo de linguagem de programação', 'Um protocolo de comunicação entre servidores', 'B'),
(8, '8 - Qual dos seguintes é um paradigma de programação orientado a objetos?', 'Java', 'SQL', 'PHP', 'Bash', 'A'),
(9, '9 - O que é um \"framework\" em desenvolvimento de software?', 'Um conjunto de ferramentas e bibliotecas que ajudam no desenvolvimento de aplicativos', 'Uma linguagem de programação específica', 'Um banco de dados relacional', 'Um programa de edição de imagens', 'A'),
(10, '10 - Qual dos seguintes é um conceito fundamental em desenvolvimento ágil de software?', ' Iterações curtas e frequentes', 'Hierarquia rígida de gerenciamento', 'Entrega de software em um único lançamento final', 'Documentação extensa e detalhada', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `email`, `senha`) VALUES
('admin', 'admin@schevron.com', '$2y$10$6LCEOcGWQ5HCrFHY4erEYuZfNFbHbpzNBqS4q3TWTjtLAaHleMQ1C'),
('Allan', 'allan759@gmail.com', '$2y$10$jq5sAEvCD.1i/0K7dgusPu4vggDRbxR1uRsg9rpiZH8GRbdOpX8ke'),
('Beatriz', 'biacapuanolopes@gmail.com', '$2y$10$/DVUazSnUNUpQ6ElA8l/Iux.BocfixuOPPbKn81jbZP6vyAjqva.u'),
('Bruno', 'nobrulg21@gmail.com', '$2y$10$xUH1yV1oCMIl6ezHYOSmy.oFKBGTjDRMa8rcGJJyWQdk01fellgAm');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nome`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
