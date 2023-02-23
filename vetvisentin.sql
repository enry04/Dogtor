-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 23, 2023 alle 08:36
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vetvisentin`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tAnimale`
--

CREATE TABLE `tAnimale` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dataNascita` date NOT NULL,
  `luogoNascita` varchar(100) NOT NULL,
  `luogoResidenza` varchar(100) NOT NULL,
  `specie` varchar(100) NOT NULL,
  `razza` varchar(100) NOT NULL,
  `idProprietario` int(11) NOT NULL,
  `nomeAccompagnatore` varchar(100) DEFAULT NULL,
  `cognomeAccompagnatore` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tAnimale`
--

INSERT INTO `tAnimale` (`id`, `nome`, `dataNascita`, `luogoNascita`, `luogoResidenza`, `specie`, `razza`, `idProprietario`, `nomeAccompagnatore`, `cognomeAccompagnatore`) VALUES
(1, 'fdf', '2023-02-22', 'd', 'cd', 'cd', 'cd', 16, 'cd', 'cd'),
(2, 'Vicky', '2014-03-22', 'Udine', 'Trieste', 'cane', 'flat coated retriver', 16, 'Enrico', 'Visentin'),
(3, 'ckosd', '1850-01-18', 'plvd', 'plcok', 'okcok', 'oko', 16, 'ovod', 'okc'),
(4, 'vd', '2023-02-17', 'fdij', 'jiv', 'vjn', 'ijvidj', 16, 'jiidj', 'ijv'),
(5, 'cdk', '2023-02-15', 'ck', 'mk', 'kck', 'kmck', 16, 'kcmk', 'kmc'),
(6, 'cdk', '2023-02-07', 'cdl', 'lvl', 'vl', 'lvcl', 16, 'lcl', 'lc'),
(7, 'csk', '2023-02-10', 'c', 'cd', 'vd', 'vd', 16, 'd', 'cd'),
(8, 'cms', '2023-02-18', 'cd', 'cd', 'cd', 'd', 16, 'd', 'dc'),
(9, 'vd', '1850-01-17', 'fe', 'fd', 'fds', 'fds', 16, 'fsd', 'fdfsf'),
(10, 'lc', '2023-02-09', 'cd', 'vd', 'vd', 'vd', 16, 'vd', 'vf'),
(11, 'cd', '2023-02-16', 'cd', 'c', 'cd', 'cd', 16, 'cd', 'cd'),
(12, 'cdij', '2023-02-08', 'vd', 'vd', 'cdvs', 'vd', 16, 'vd', 'cd'),
(13, 'vd', '2023-02-15', 'vd', 'vd', 'd', 'cd', 16, 'cd', 'cd'),
(14, 'dwdw', '2023-02-09', 'dwk', 'cd', 'idsji', 'ijcdj', 16, 'cjdij', 'cidij'),
(15, 'fijd', '2023-02-05', 'cs', 'cd', 'cd', 'cd', 16, 'cd', 'vv'),
(16, 'cod', '2023-02-15', 'csc', 'cs', 'cs', 'cs', 16, 'cd', 'cd');

-- --------------------------------------------------------

--
-- Struttura della tabella `tIndirizzo`
--

CREATE TABLE `tIndirizzo` (
  `id` int(11) NOT NULL,
  `CAP` int(11) NOT NULL,
  `via` varchar(100) NOT NULL,
  `numeroCivico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tIndirizzo`
--

INSERT INTO `tIndirizzo` (`id`, `CAP`, `via`, `numeroCivico`) VALUES
(1, 34121, 'Via della Cattedrale', 5),
(2, 34148, 'Via Sinigaglia', 12),
(3, 34120, 'Via Corsi', 43),
(4, 34321, 'Via Corsi', 43),
(5, 33412, 'Via Roma', 12),
(6, 2435, 'Via Trento', 234),
(7, 2321, 'Via Giustiniano', 4),
(8, 243234, 'Via Monte Grappa', 24),
(9, 2431, 'Via Cologna', 1),
(10, 2423, 'Via de Borgo', 353),
(11, 243, 'della ', 2),
(12, 43, 'cijsic', 43),
(13, 2435, 'Via dell\'Istria', 32),
(14, 343, 'via', 3),
(15, 43, 'vdv', 34),
(16, 314214, 'cok', 23),
(17, 23, 'e3mf', 32),
(18, 343, '43', 3),
(19, 432, 'dkksk', 342),
(20, 2431, 'okvdck', 2425),
(21, 324, '5435lkmm', 43),
(22, 2332, '2fd', 32),
(23, 42, 'fkdvk', 32),
(24, 1223, 'vjnfvj', 13),
(25, 23, 'cdlc', 2342),
(26, 231, 'fkmdmk', 12332),
(27, 432, 'dkmk', 13),
(28, 24, 'fkmdkmf', 23),
(29, 43, 'jndnj', 32),
(30, 23432, 'vikmvmid', 3242),
(31, 323, 'cdikc', 34),
(32, 3243, 'fd', 33223),
(33, 32, 'fe', 32);

-- --------------------------------------------------------

--
-- Struttura della tabella `tPrenotazione`
--

CREATE TABLE `tPrenotazione` (
  `id` int(11) NOT NULL,
  `idAnimale` int(11) NOT NULL,
  `motivazione` varchar(1000) NOT NULL,
  `descrizione` varchar(1000) NOT NULL,
  `nota` varchar(1000) DEFAULT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `stato` varchar(100) NOT NULL,
  `gravita` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tPrenotazione`
--

INSERT INTO `tPrenotazione` (`id`, `idAnimale`, `motivazione`, `descrizione`, `nota`, `data`, `ora`, `stato`, `gravita`) VALUES
(5, 13, 'cd', 'cd', NULL, '2023-02-25', '11:45:00', 'da confermare', 'non urgente'),
(6, 14, 'cdjciji', 'ijcdiji', NULL, '2023-02-25', '12:55:00', 'da confermare', 'non urgente');

-- --------------------------------------------------------

--
-- Struttura della tabella `tRisultato`
--

CREATE TABLE `tRisultato` (
  `id` int(11) NOT NULL,
  `idPrenotazione` int(11) NOT NULL,
  `motivazione` varchar(1000) NOT NULL,
  `diagnosi` varchar(100) NOT NULL,
  `cura` varchar(100) NOT NULL,
  `prezzo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `tTelefono`
--

CREATE TABLE `tTelefono` (
  `id` int(11) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `idUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tTelefono`
--

INSERT INTO `tTelefono` (`id`, `numero`, `idUtente`) VALUES
(1, '4234324324234', 10),
(2, '43242423', 11),
(3, '543535', 12),
(4, '534534534', 12),
(5, '25352525', 14),
(6, '5345345345', 15),
(7, '5353453535', 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `tUtente`
--

CREATE TABLE `tUtente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `codiceFiscale` varchar(100) NOT NULL,
  `nomeUtente` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `idIndirizzo` int(11) NOT NULL,
  `tipologia` varchar(100) NOT NULL,
  `numeroTelefonoPrincipale` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tUtente`
--

INSERT INTO `tUtente` (`id`, `nome`, `cognome`, `codiceFiscale`, `nomeUtente`, `email`, `password`, `idIndirizzo`, `tipologia`, `numeroTelefonoPrincipale`) VALUES
(1, 'Enrico', 'Visentin', '9400Vsncooo', 'enrico', 'enrico04v@gmail.com', 'ciao123', 9, 'medico', '2456454534346'),
(15, 'daniele', 'sanchez', 'dokid', 'sanci', 'sanchez@godo.com', 'ciao123', 30, 'admin', '53453453453'),
(16, 'utente', 'utente', 'utente', 'utente', 'utente@godo.com', 'ciao123', 31, 'utente', '435354353'),
(17, 'fijcdjn', 'vn dv', 'cmd mcdl', 'clkdmcd', 'cldmcd@o.c', 'cdmd', 32, 'utente', '23223233223');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tAnimale`
--
ALTER TABLE `tAnimale`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tIndirizzo`
--
ALTER TABLE `tIndirizzo`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tPrenotazione`
--
ALTER TABLE `tPrenotazione`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tRisultato`
--
ALTER TABLE `tRisultato`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tTelefono`
--
ALTER TABLE `tTelefono`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tUtente`
--
ALTER TABLE `tUtente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codiceFiscale` (`codiceFiscale`),
  ADD UNIQUE KEY `numeroTelefonoPrincipale` (`numeroTelefonoPrincipale`),
  ADD UNIQUE KEY `nomeUtente` (`nomeUtente`,`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tAnimale`
--
ALTER TABLE `tAnimale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `tIndirizzo`
--
ALTER TABLE `tIndirizzo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT per la tabella `tPrenotazione`
--
ALTER TABLE `tPrenotazione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `tTelefono`
--
ALTER TABLE `tTelefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `tUtente`
--
ALTER TABLE `tUtente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
