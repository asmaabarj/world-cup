

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `nomEquipe` varchar(255) NOT NULL,
  `entraineur` varchar(255) DEFAULT NULL,
  `idGroupe` int(11) DEFAULT NULL,
  `drapeau` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`nomEquipe`, `entraineur`, `idGroupe`, `drapeau`) VALUES
(' Arabie saoudite', 'Hervé Renard', 3, './images/arabie-saoudite.png'),
(' Pays-Bas', 'Louis Van Gaal ', 1, './images/pays-bas.png'),
('Allemagne', 'Hans-Dieter Flick', 5, './images/allemagne.png'),
('Angleterre', 'Gareth Southgate', 2, './images/angleterre.png\r\n'),
('Argentine', 'Lionel Scaloni', 3, './images/argentine.png'),
('Australie', 'Graham Arnold', 4, './images/australie-.png'),
('Belgique', 'Roberto Martinez', 6, './images/belgique.png'),
('Brésil', 'Tite', 7, './images/brésil.png'),
('Cameroun', 'Rigobert Song', 7, './images/cameroun.png'),
('Canada', 'John Herdman', 6, './images/canada.png'),
('Costa Rica', 'Luis Fernando Suárez', 5, './images/casta-rica.png'),
('Croatie', 'Zlatko Dalic', 6, './images/croatie.png'),
('Danemark', 'Kasper Hjulmand', 4, './images/danemark.png'),
('Equateur', 'Gustavo Alfaro', 1, './images/equateur.png'),
('Espagne', 'Luis Enrique', 5, './images/espagne.png'),
('États-Unis de Amérique', 'Gregg Berhalter', 2, './images/usa.png'),
('France', 'Didier Deschamps', 4, './images/france.png'),
('Ghana', 'Otto Addo', 8, './images/ghana.png'),
('Iran', 'Carlos Queiroz', 2, './images/iran.png'),
('Japon', 'Hajime Moriyasu', 5, './images/japon.png'),
('Maroc', 'Walid Regragui', 6, './images/maroc.png'),
('Mexique', 'Gerardo Martinor', 3, './images/mexique.png'),
('Pays de Galles', 'Robert Page', 2, './images/pays-de-galles.png'),
('Pologne', 'Czesław Michniewicz', 3, './images/pologne.png'),
('Portugal', 'Fernando Santos', 8, './images/portugal.png'),
('Qatar', ' Félix Sanchez Bas ', 1, './images/qatar.png'),
('République de Corée', 'Paulo Bento', 8, './images/coree.png'),
('Sénégal', 'Aliou Cissé', 1, './images/sénégal.png'),
('Serbie', 'Dragan Stojkovic', 7, './images/serbie.png'),
('Suisse', 'Murat Yakin', 7, './images/suisse.png'),
('Tunisie', 'Jalel Kadri', 4, './images/tunisie.png'),
('Uruguay', 'Diego Alonso', 8, './images/uruguay.png');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `idGroupe` int(11) NOT NULL,
  `nomGroupe` varchar(255) NOT NULL,
  `stadeGroupe` varchar(255) DEFAULT NULL
);

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`idGroupe`, `nomGroupe`, `stadeGroupe`) VALUES
(1, 'A', 'Rabat'),
(2, 'B', 'casablanca'),
(3, 'C', 'tanger'),
(4, 'D', 'marrakech'),
(5, 'E', 'el jadida'),
(6, 'F', 'fes'),
(7, 'G', 'Kenitra'),
(8, 'H', 'agadir');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`nomEquipe`),
  ADD KEY `idGroupe` (`idGroupe`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idGroupe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`);
COMMIT;


