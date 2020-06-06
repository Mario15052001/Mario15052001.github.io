-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 12, 2020 alle 17:22
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ducati`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `credenziali`
--

CREATE TABLE `credenziali` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `credenziali`
--

INSERT INTO `credenziali` (`Username`, `Password`, `Tipo`) VALUES
('76bb849338db38e0ede3b8ae726373c42992152747c39e484f096b623946c8a265adde3a72c8177a70a8876694b9403f06d44decfcfe44be25f1078be0282239', '3ed4719b8a94527c599876624cc7c1f96d0ee04d154195369f8ad782946945f515bda594e8395536cbde5236ad767308b164953de47fef3b671e4adcef2baba1', 0),
('9aae6fe70ba8504c6c3a90e0157ae9d3eb61e10d23104f01d3dc78acda9752802ac853a5d10b8c61d795a08fe49b6528b4cb20a5b2958214f2f04ae5435bb70e', 'bb44b8f85cd43847d209b9cd143847a8b2705a55d068ae5e5d11f2bef3e1090747a241180f07adcfdc8823ab51b7b9311dcdd07b72e15fc5bd609df7a88b646e', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `moto`
--

CREATE TABLE `moto` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `potenza` varchar(255) NOT NULL,
  `coppia` varchar(255) NOT NULL,
  `peso` varchar(255) NOT NULL,
  `prezzo` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `moto`
--

INSERT INTO `moto` (`id`, `fm`, `nome`, `potenza`, `coppia`, `peso`, `prezzo`, `foto`) VALUES
(1, 'Panigale', 'V4R', '235CV', '11,4 kgm', '168kg', '39.900€', 'v4r.jpg'),
(3, 'Multistrada', '950', '113CV', '9.8 kgm', '204kg', '14.490€', '950.jpeg');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `credenziali`
--
ALTER TABLE `credenziali`
  ADD PRIMARY KEY (`Tipo`);

--
-- Indici per le tabelle `moto`
--
ALTER TABLE `moto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `moto`
--
ALTER TABLE `moto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
