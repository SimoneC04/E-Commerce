-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 12, 2023 alle 11:53
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrelli`
--

CREATE TABLE `carrelli` (
  `IdCarrello` int(11) NOT NULL,
  `Creazione` date NOT NULL DEFAULT current_timestamp(),
  `IdUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `carrelli`
--

INSERT INTO `carrelli` (`IdCarrello`, `Creazione`, `IdUtente`) VALUES
(1, '2023-05-12', 1),
(2, '2023-05-12', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `IdCategoria` int(4) NOT NULL,
  `Tipo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `contiene`
--

CREATE TABLE `contiene` (
  `IdProdotto` int(11) NOT NULL,
  `IdCarrello` int(11) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `IdProdotto` int(4) NOT NULL,
  `Nome` varchar(128) NOT NULL,
  `IdCategoria` int(4) NOT NULL,
  `Descrizione` varchar(128) NOT NULL,
  `Quantita` int(4) NOT NULL,
  `Prezzo` float NOT NULL,
  `Immagine` varchar(128) NOT NULL,
  `Venditore` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`IdProdotto`, `Nome`, `IdCategoria`, `Descrizione`, `Quantita`, `Prezzo`, `Immagine`, `Venditore`) VALUES
(46, 'Ninfee', 1, 'Opera olio su tela - Monet', 1, 1888, 'images/img-3.jpg', 'Otto'),
(76, 'Cleasing of the Temple', 1, 'Dipinto olio su tela', 1, 1999, 'images/img-1.jpg', 'Otto');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensioni`
--

CREATE TABLE `recensioni` (
  `IdProdotto` int(11) NOT NULL,
  `IdUtente` int(11) NOT NULL,
  `Testo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `recensioni`
--

INSERT INTO `recensioni` (`IdProdotto`, `IdUtente`, `Testo`) VALUES
(1, 1, 'Bellissimo quadro'),
(46, 1, 'Bellissimo quadro');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `IdUtente` int(4) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Amministratore` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`IdUtente`, `Username`, `Password`, `Amministratore`) VALUES
(1, 'Otto', '6e6bc4e49dd477ebc98ef4046c067b5f', 1),
(2, 'Simone', '6e6bc4e49dd477ebc98ef4046c067b5f', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrelli`
--
ALTER TABLE `carrelli`
  ADD PRIMARY KEY (`IdCarrello`),
  ADD KEY `fk1` (`IdUtente`);

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indici per le tabelle `contiene`
--
ALTER TABLE `contiene`
  ADD KEY `fk2` (`IdCarrello`),
  ADD KEY `fk3` (`IdProdotto`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`IdProdotto`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`IdUtente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  MODIFY `IdCarrello` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `categorie`
--
ALTER TABLE `categorie`
  MODIFY `IdCategoria` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `IdProdotto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `IdUtente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`IdUtente`) REFERENCES `utenti` (`IdUtente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`IdCarrello`) REFERENCES `carrelli` (`IdCarrello`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk3` FOREIGN KEY (`IdProdotto`) REFERENCES `prodotti` (`IdProdotto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
