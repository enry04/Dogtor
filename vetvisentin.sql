-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Feb 09, 2023 alle 13:18
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
  `numero` int(11) NOT NULL,
  `idUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `tUtente`
--

CREATE TABLE `tUtente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `idIndirizzo` int(11) NOT NULL,
  `codiceFiscale` varchar(100) NOT NULL,
  `tipologia` varchar(100) NOT NULL,
  `numeroTelefonoPrincipale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD UNIQUE KEY `numeroTelefonoPrincipale` (`numeroTelefonoPrincipale`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tAnimale`
--
ALTER TABLE `tAnimale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `tUtente`
--
ALTER TABLE `tUtente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
