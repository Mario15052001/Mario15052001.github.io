-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 06, 2020 alle 10:32
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
-- Struttura della tabella `carrelli`
--

CREATE TABLE `carrelli` (
  `ordineID` int(255) NOT NULL,
  `quantita` int(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id` int(255) DEFAULT NULL,
  `cf` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `carrelli`
--

INSERT INTO `carrelli` (`ordineID`, `quantita`, `status`, `id`, `cf`) VALUES
(1, 4, 0, 3, 'DLLSRRANGL2001'),
(17, 4, 0, 3, 'jdjdhdjdj');

-- --------------------------------------------------------

--
-- Struttura della tabella `moto`
--

CREATE TABLE `moto` (
  `id` int(255) NOT NULL,
  `fm` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `potenza` int(5) DEFAULT NULL,
  `coppia` int(5) DEFAULT NULL,
  `peso` int(5) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `prezzo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `moto`
--

INSERT INTO `moto` (`id`, `fm`, `nome`, `potenza`, `coppia`, `peso`, `foto`, `prezzo`) VALUES
(1, 'Panigale', 'V4R', 235, 11, 168, 'v4r.jpg', 39900),
(3, 'Multistrada', '950', 113, 10, 204, '950.jpeg', 14490),
(5, 'Diavel', '1260', 159, 13, 218, 'Diavel-1260-MY20-02-Gallery-1920x1080.jpg', 20290),
(6, 'Diavel', '1260 S', 159, 13, 2018, 'ducati-diavel-1260-s-2019-07.jpg', 23190),
(9, 'Hypermotard', '950', 114, 10, 178, '02_hypermotard-950_uc69117_mid.jpg', 12750),
(10, 'Hypermotard', '950 SP', 114, 10, 176, 'ducati-hypermotard-950-sp-01.jpg', 16790),
(11, 'Monster', '797', 73, 7, 175, 'Monster-797-Plus-Studio-MY19-04-Gallery-1920x1080.jpg', 8990);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `cf` varchar(16) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `tipo_ind` varchar(255) DEFAULT NULL,
  `indirizzo` varchar(255) DEFAULT NULL,
  `citta` varchar(255) DEFAULT NULL,
  `provincia` varchar(2) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`cf`, `nome`, `cognome`, `tipo_ind`, `indirizzo`, `citta`, `provincia`, `username`, `password`, `tipo`) VALUES
('admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'ad', '76bb849338db38e0ede3b8ae726373c42992152747c39e484f096b623946c8a265adde3a72c8177a70a8876694b9403f06d44decfcfe44be25f1078be0282239', '3ed4719b8a94527c599876624cc7c1f96d0ee04d154195369f8ad782946945f515bda594e8395536cbde5236ad767308b164953de47fef3b671e4adcef2baba1', 0),
('DLLSRRANGL2001', 'Angelo', 'Delle Serre', 'Contrada', 'Imperatore', 'Benevento', 'BN', '9aae6fe70ba8504c6c3a90e0157ae9d3eb61e10d23104f01d3dc78acda9752802ac853a5d10b8c61d795a08fe49b6528b4cb20a5b2958214f2f04ae5435bb70e', 'bb44b8f85cd43847d209b9cd143847a8b2705a55d068ae5e5d11f2bef3e1090747a241180f07adcfdc8823ab51b7b9311dcdd07b72e15fc5bd609df7a88b646e', 1),
('jdjdhdjdj', 'Elio', 'Pica', '', 'C/via', 'Fragneto', 'BN', '283a391e2a3a55b266b3d8fd365075549b64fb4680dc4ae9e885be7aadaf7de9d45525d27f7d63d23383c50e3fb6e67daf919750f43514fdc14f5e733de12f6e', '2ac075bae756e56e6bae84f7f836cfe4efbc211d38748d352b4dc689373a2fee170909567a9436042157d94d49466866b59d9e1da6fd46b4a50705d3df74fc5f', 1),
('LAKDRGHFD', 'Elio', 'Pica', 'Via', 'Cione', 'Miao', 'DB', '1f40fc92da241694750979ee6cf582f2d5d7d28e18335de05abc54d0560e0f5302860c652bf08d560252aa5e74210546f369fbbbce8c12cfc7957b2652fe9a75', '5267768822ee624d48fce15ec5ca79cbd602cb7f4c2157a516556991f22ef8c7b5ef7b18d1ff41c59370efb0858651d44a936c11b7b144c48fe04df3c6a3e8da', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrelli`
--
ALTER TABLE `carrelli`
  ADD PRIMARY KEY (`ordineID`),
  ADD KEY `id` (`id`),
  ADD KEY `cf` (`cf`);

--
-- Indici per le tabelle `moto`
--
ALTER TABLE `moto`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`cf`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  MODIFY `ordineID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `moto`
--
ALTER TABLE `moto`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  ADD CONSTRAINT `carrelli_ibfk_1` FOREIGN KEY (`id`) REFERENCES `moto` (`id`),
  ADD CONSTRAINT `carrelli_ibfk_2` FOREIGN KEY (`cf`) REFERENCES `utenti` (`cf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
