-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 22 jun 2026 om 13:35
-- Serverversie: 8.4.8
-- PHP-versie: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `berichten`
--

CREATE TABLE `berichten` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `naam` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `bericht` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `berichten`
--

INSERT INTO `berichten` (`id`, `user_id`, `naam`, `email`, `bericht`) VALUES
(4, 1, 'jan', 'zdvfd@sdg.sdf', 'ik ben moe en wil eten');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boekingen`
--

CREATE TABLE `boekingen` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `reis_id` int NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'in behandeling'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='dit zijn de boeking van de users';

--
-- Gegevens worden geëxporteerd voor tabel `boekingen`
--

INSERT INTO `boekingen` (`id`, `user_id`, `reis_id`, `status`) VALUES
(7, 1, 3, 'Bevestigd'),
(25, 1, 2, 'in behandeling'),
(26, 1, 1, 'in behandeling');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recensies`
--

CREATE TABLE `recensies` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `reis_id` int NOT NULL,
  `opmerking` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='dit zijn de recensies van de users';

--
-- Gegevens worden geëxporteerd voor tabel `recensies`
--

INSERT INTO `recensies` (`id`, `user_id`, `reis_id`, `opmerking`) VALUES
(3, 1, 1, 'Wat een geweldig festival! De line-up was top, de organisatie liep gesmeerd en de sfeer was onbeschrijfelijk goed.'),
(4, 1, 1, 'Helaas was het erg druk bij de bar en moesten we lang wachten op drankjes, maar de muziek maakte alles goed.'),
(5, 2, 2, 'Mooie locatie met fantastisch uitzicht tijdens de zonsondergang. Zou zeker terugkomen volgend jaar!'),
(6, 2, 1, 'De artiesten waren super, maar het terrein had wel wat meer schaduwplekken kunnen gebruiken in de zon.'),
(7, 3, 3, 'Perfect georganiseerd evenement, vriendelijk personeel en een onvergetelijke avond met vrienden.'),
(8, 3, 2, 'Geluid was soms wat te hard, maar over het algemeen een topdag gehad. Aanrader voor volgend jaar.'),
(9, 4, 1, 'Eerste keer naar dit festival en ik ben meteen fan. De catering was lekker en betaalbaar.'),
(10, 4, 3, 'Tickets waren wat aan de prijzige kant, maar de ervaring was het zeker waard.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reizen`
--

CREATE TABLE `reizen` (
  `id` int NOT NULL,
  `naam` varchar(250) NOT NULL,
  `locatie` varchar(250) NOT NULL,
  `beschrijving` varchar(500) NOT NULL,
  `prijs` decimal(60,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='dit zijn de tickets/ reizen';

--
-- Gegevens worden geëxporteerd voor tabel `reizen`
--

INSERT INTO `reizen` (`id`, `naam`, `locatie`, `beschrijving`, `prijs`) VALUES
(1, 'Zomerfeesten Nijmegen', 'Nijmegen', 'Een stad vol met concerten en activiteiten voor iedereen!', 123),
(2, 'Amsterdam Music Festival', 'Amsterdam', 'Groot elektronisch muziekfestival in de Johan Cruijff ArenA', 4),
(3, 'Lowlands Festival', 'Biddinghuizen', 'Drie dagen lang muziek, kunst en cultuur op één plek', 215),
(4, 'Pinkpop Landgraaf', 'Landgraaf', 'Het oudste popfestival van Nederland met internationale topacts', 175),
(5, 'Down The Rabbit Hole', 'Ewijk', 'Sfeervol festival in het groen met indie en alternatieve muziek', 145),
(6, 'Rock Werchter', 'Brussel', 'Legendarisch Belgisch rockfestival vlak over de grens', 195),
(7, 'Glastonbury Festival', 'Londen', 'Het grootste muziekfestival ter wereld in Engeland', 340),
(8, 'Primavera Sound', 'Barcelona', 'Stijlvol muziekfestival aan de kust van Barcelona', 210),
(9, 'Lollapalooza', 'Berlijn', 'Wereldberoemd festival met honderden artiesten over 4 dagen', 185),
(10, 'Coachella', 'Los Angeles', 'Het iconische Amerikaanse woestijnfestival met de grootste namen', 450);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `naam` varchar(50) NOT NULL,
  `achternaam` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `wachtwoord` varchar(60) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='dit zijn de users en hun info';

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `naam`, `achternaam`, `email`, `wachtwoord`, `role`) VALUES
(1, 'Jan', 'Jansen', 'jan.jansen@example.com', 'password123', 'user'),
(2, 'Piet', 'de Vries', 'piet.devries@example.com', 'password123', 'user'),
(3, 'Sanne', 'Bakker', 'sanne.bakker@example.com', 'password123', 'user'),
(4, 'Lisa', 'Mulder', 'lisa.mulder@example.com', 'password123', 'user'),
(5, 'Mark', 'Visser', 'mark.visser@example.com', 'password123', 'admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wachtwoordvergeten`
--

CREATE TABLE `wachtwoordvergeten` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `code` varchar(600) NOT NULL,
  `verloopdatum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='dit zijn voor wachtwoord vergeten';

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `berichten`
--
ALTER TABLE `berichten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `boekingen`
--
ALTER TABLE `boekingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `recensies`
--
ALTER TABLE `recensies`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reizen`
--
ALTER TABLE `reizen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `wachtwoordvergeten`
--
ALTER TABLE `wachtwoordvergeten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `berichten`
--
ALTER TABLE `berichten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `boekingen`
--
ALTER TABLE `boekingen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT voor een tabel `recensies`
--
ALTER TABLE `recensies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `reizen`
--
ALTER TABLE `reizen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `wachtwoordvergeten`
--
ALTER TABLE `wachtwoordvergeten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
