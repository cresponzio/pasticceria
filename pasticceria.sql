-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Ago 03, 2020 alle 18:55
-- Versione del server: 5.7.30-0ubuntu0.18.04.1
-- Versione PHP: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasticceria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `dolce`
--

CREATE TABLE `dolce` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) DEFAULT NULL,
  `prezzo` float DEFAULT '0',
  `data_vendita` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto` varchar(200) DEFAULT NULL,
  `sconto_ott` tinyint(1) DEFAULT '0',
  `sconto_vent` tinyint(1) DEFAULT '0',
  `scaduto` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dolce`
--

INSERT INTO `dolce` (`id`, `nome`, `prezzo`, `data_vendita`, `foto`, `sconto_ott`, `sconto_vent`, `scaduto`) VALUES
(2, 'Torta al Cioccolato', 11.2, '2020-08-03 16:49:00', './assets/img/torta_cacao.jpg', 1, 0, 0),
(3, 'Torta ai Frutti di Bosco', 8, '2020-08-03 16:49:00', './assets/img/torta_cacao.jpg', 1, 0, 0),
(4, 'Tiramisù', 6.4, '2020-08-03 16:49:00', './assets/img/torta_cacao.jpg', 1, 0, 0),
(5, 'Panna Cotta', 4, '2020-08-03 11:10:21', './assets/img/background.jpeg', 0, 0, 0),
(6, 'Chescake2', 11, '2020-08-03 15:23:15', './assets/img/torta_cacao.jpg', 0, 0, 0),
(7, 'sadsda', 12, '2020-08-03 15:56:45', './assets/img/background.jpeg', 0, 0, 0),
(8, 'adssda', 12, '2020-08-03 15:57:49', './assets/img/background.jpeg', 0, 0, 0),
(9, 'sdaads', 1, '2020-08-03 16:00:47', './assets/img/mare-giappone.jpg', 0, 0, 0),
(10, 'sdaads', 1, '2020-08-03 16:09:38', './assets/img/mare-giappone.jpg', 0, 0, 0),
(11, 'dasdsa', 12, '2020-08-03 16:09:58', './assets/img/cart.jpg', 0, 0, 0),
(12, 'Frutti di Mare', 4, '2020-08-03 16:11:04', './assets/img/background.jpeg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `ingrediente`
--

CREATE TABLE `ingrediente` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ingrediente`
--

INSERT INTO `ingrediente` (`id`, `nome`) VALUES
(1, 'Panna'),
(2, 'Formaggio'),
(3, 'Cacao'),
(4, 'Zucchero'),
(5, 'Acqua'),
(6, 'Uova'),
(7, 'Lievito'),
(8, 'Farina'),
(9, 'Frutta');

-- --------------------------------------------------------

--
-- Struttura della tabella `ingr_dolce`
--

CREATE TABLE `ingr_dolce` (
  `dolce` int(11) NOT NULL,
  `ingrediente` int(11) NOT NULL,
  `qnt` int(11) DEFAULT NULL,
  `unita_misura` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ingr_dolce`
--

INSERT INTO `ingr_dolce` (`dolce`, `ingrediente`, `qnt`, `unita_misura`) VALUES
(1, 1, 10, 'grammi'),
(1, 2, 10, 'grammi'),
(2, 1, 10, 'grammi'),
(2, 2, 10, 'grammi'),
(3, 1, 10, 'grammi'),
(4, 1, 10, 'grammi'),
(5, 1, 10, 'grammi'),
(6, 1, 10, 'grammi'),
(6, 2, 20, 'grammi'),
(6, 3, 1, 'kilog'),
(6, 4, 5, 'unità'),
(11, 5, 2, 'litri'),
(12, 3, 10, 'gr'),
(12, 5, 2, 'litri'),
(12, 6, 6, 'unità'),
(12, 8, 1, 'Kg');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `email` varchar(100) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`email`, `nome`, `password`) VALUES
('luana@bakery.it', 'Luana', '$2y$10$9XzgUBs4cMgco86ZPtHs1Oy1eDLHytBk.uZwkIKDRhENEzzi8P4lO'),
('maria@bakery.it', 'Maria', '$2y$10$MkAgJSxaE.l8S.NGWs51DOEDIlcB9wNh87FbMcKJy/wX2/DJPCY3S');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dolce`
--
ALTER TABLE `dolce`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ingr_dolce`
--
ALTER TABLE `ingr_dolce`
  ADD PRIMARY KEY (`dolce`,`ingrediente`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `dolce`
--
ALTER TABLE `dolce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT per la tabella `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
