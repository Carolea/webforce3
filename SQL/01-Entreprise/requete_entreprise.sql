-- ********************
-- Généralités
-- ********************

-- Pour faire les requêtes SQL nous utilisons la console sous XAMMP:
--  cd c:\xampp\mysql\bin
--  mysql.exe -u root --password

-- On met 2 tirets en SQL pour faire des commentaires
-- Le SQL n'est pas sensible à la casse, mais par convention on met tous les mots-clés en majuscule.

-- ********************
-- Requêtes Générales
-- ********************

-- Créer une bdd appelée "entreprise"

CREATE DATABASE entreprise;

-- Pour se connecter à la bdd "entreprise"

USE entreprise;

-- Affiche les bdd disponibles dans le SGBD

SHOW DATABASES;

-- Requêtes de destruction

-- Supprime la bdd "entreprise" (action irreversible)

DROP DATABASE entreprise;

-- Supprime la table "employes"

DROP TABLE employes;

-- Vide la table "employes"

TRUNCATE employes;

-- On va créer la table "employes" et la remplir via la console

CREATE TABLE employes (
  id_employes int(3) NOT NULL AUTO_INCREMENT,
  prenom varchar(20) DEFAULT NULL,
  nom varchar(20) DEFAULT NULL,
  sexe enum('m','f') NOT NULL,
  service varchar(30) DEFAULT NULL,
  date_embauche date DEFAULT NULL,
  salaire float DEFAULT NULL,
  PRIMARY KEY (id_employes)
) ENGINE=InnoDB ;

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES
(350, 'Jean-pierre', 'Laborde', 'm', 'direction', '1999-12-09', 5000),
(388, 'Clement', 'Gallet', 'm', 'commercial', '2000-01-15', 2300),
(415, 'Thomas', 'Winter', 'm', 'commercial', '2000-05-03', 3550),
(417, 'Chloe', 'Dubar', 'f', 'production', '2001-09-05', 1900),
(491, 'Elodie', 'Fellier', 'f', 'secretariat', '2002-02-22', 1600),
(509, 'Fabrice', 'Grand', 'm', 'comptabilite', '2003-02-20', 1900),
(547, 'Melanie', 'Collier', 'f', 'commercial', '2004-09-08', 3100),
(592, 'Laura', 'Blanchet', 'f', 'direction', '2005-06-09', 4500),
(627, 'Guillaume', 'Miller', 'm', 'commercial', '2006-07-02', 1900),
(655, 'Celine', 'Perrin', 'f', 'commercial', '2006-09-10', 2700),
(699, 'Julien', 'Cottet', 'm', 'secretariat', '2007-01-18', 1390),
(701, 'Mathieu', 'Vignal', 'm', 'informatique', '2008-12-03', 2000),
(739, 'Thierry', 'Desprez', 'm', 'secretariat', '2009-11-17', 1500),
(780, 'Amandine', 'Thoyer', 'f', 'communication', '2010-01-23', 1500),
(802, 'Damien', 'Durand', 'm', 'informatique', '2010-07-05', 2250),
(854, 'Daniel', 'Chevel', 'm', 'informatique', '2011-09-28', 1700),
(876, 'Nathalie', 'Martin', 'f', 'juridique', '2012-01-12', 3200),
(900, 'Benoit', 'Lagarde', 'm', 'production', '2013-01-03', 2550),
(933, 'Emilie', 'Sennard', 'f', 'commercial', '2014-09-11', 1800),
(990, 'Stephanie', 'Lafaye', 'f', 'assistant', '2015-06-02', 1775);

-- Liste les tables de la bdd sur laquelle on est connectés (ici "entreprise")

SHOW TABLES;

-- Décrire la table, affiche la structure de la table "employes"

DESC employes;

-- **********************
-- Requêtes de sélection
-- **********************

-- Pour sélectionner une information. Va afficher nom et prénom de tous les employés contenus dans la table.

SELECT nom, prenom FROM employes;
SELECT service FROM employes;


-- -- Nettoyer les doublons pour afficher la liste précise des services.

SELECT DISTINCT service FROM employes;

-- Affiche TOUS les champs des employes (nom, prenom,...), l'intégralité d'une table.

SELECT * FROM employes;

-- Sélectionner les informations pour un employé (clause WHERE qui remplace le if de js), informatique est une valeur placée entre quotes ' '.

SELECT nom, prenom FROM employes WHERE service = 'informatique';

-- BETWEEN affiche nom, prenom, date d'embauche des "employés" embauchés entre 2006/2010.

SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31';

-- LIKE, le % est un caractère joker qui remplace tous les autres caractères. On affiche donc les prénoms des employes qui commencent par s.

SELECT prenom FROM employes WHERE prenom LIKE 's%';

-- Sélectionne les prénoms composés (n'importe tiret n'importe).

SELECT prenom FROM employes WHERE prenom LIKE '%-%';

-- Opérateurs de comparaison, affiche le nom, prénom des "employes" qui ne sont pas du service 'informatique'.

-- = 
-- <
-- >
-- <=
-- >=
-- != ou <> pour différent de 

SELECT nom, prenom FROM employes WHERE service !='informatique';

SELECT nom, prenom, salaire FROM employes WHERE salaire > 3000;


-- ORDER BY, affiche le nom, prénom et salaire par ordre croissant de salaire par défaut.

SELECT nom, prenom, salaire FROM employes ORDER BY salaire;

-- ordre ascendant/descendant si "doublon" dans chiffre 2eme valeurs sur prénom. Affiche les infos d'abord par ordre croissant des salaires puis par ordre décroissant des prénoms.

SELECT nom, prenom, salaire FROM employes ORDER BY salaire ASC, prenom DESC;

-- LIMIT, affiche nom, prenom, salaire de l'employé ayant le salaire le plus élevé. On ordonne les salaires par ordre décroissant avec ORDER BY puis on prend le 1er enregistrement avec LIMIT 0,1 (c'est à dire à partir de l'enregistrement 0 et sur 1 ligne). On peut ici écrire 1 directement le 0 est sous entendu. 0= à partir du debut de la liste pour 1,1 on demarre a 1 et on prend 1 ligne.

SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1;

-- L'alias avec AS (salaire annuel ne devient pas une variable) permet de donner une étiquette au calcul salaire * 12. Affiche salaire * 12 si on vire AS.

SELECT nom, prenom, salaire * 12 AS salaire_annuel FROM employes;

-- SUM, affiche la somme des salaires multipliés par 12 mois. ! coller sum et ()

SELECT SUM(salaire * 12) FROM employes;

-- MIN/MAX, ici afficher le plus petit salaire.

SELECT MIN(salaire) FROM employes;

-- ! affiche le 1er de la table + salaire min. Ne fonctionn pas !!! On obtient  le plus petit salaire mais les 1ers prénom et nom de la table! Pour afficher les infos du salaire le plus petit on fait un ORDER BY suivi d'un LIMIT (cf ci-dessus).

SELECT prenom, nom, MIN(salaire) FROM employes;

-- AVG (pour average) ici moyenne des salaires

SELECT AVG(salaire) FROM employes; 

-- ROUND il est possible d'arrondir a 0 décimale. Si 1, 1 après la virgule. 

SELECT ROUND(AVG(salaire),0) FROM employes;

-- COUNT compter le nbr d'éléments

SELECT COUNT(id_employes) FROM employes WHERE sexe = 'f';


-- IN affiche les employes dont le service est dans la liste 'comptabilité', 'informatique'.

SELECT nom, prenom, service FROM employes WHERE service IN ('comptabilite', 'informatique');

SELECT nom, prenom, service FROM employes WHERE service NOT IN ('comptabilite', 'informatique');

-- AND, OR affiche toutes les infos (*) des employés du service commercial et dont le salaire est inférieur ou égal à 2000.
-- on peut mélanger AND et OR mais la priorité est donnée à AND ou ()
-- tous les employes du service production avec un salaire = à 1900 sont affichés + les autres (non prod) dont salaire = 2300.


SELECT * FROM employes WHERE service = 'commercial' AND salaire <= 2000;

SELECT * FROM employes WHERE service = 'production' AND salaire = 1900 OR salaire = 2300;

SELECT * FROM employes WHERE (service = 'production' AND salaire = 1900) OR salaire = 2300;

-- GROUP BY 

    -- ici renvoie une erreur il prend le 1er service

SELECT service, COUNT(id_employes) FROM employes;

    -- on ajoute GROUP BY. affiche le nbr d'employés par service: GROUP BY est utilisé avec COUNT, SUM, AVG pour regrouper leur résultat selon le champ indiqué. Le count est groupé par service.

SELECT service, COUNT(id_employes) FROM employes GROUP BY service;

-- GROUP BY ... HAVING (remplacant de GROUP BY ... WHERE pas valide) HAVING remplace WHERE après un GROUP BY. Affiche les services ayant plus d'un employé.

SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING nombre > 1;

-- **********************
-- Requêtes d'insertion
-- **********************

-- On affiche un visuel de la table avant insertion de données.

SELECT * FROM employes;

-- INSERT ajoute un employé avec des données dans les champs indiqués dans les premières parenthèses, les valeurs insérées étant spécifiées dans le même ordre dans les secondes parenthèses.

-- pour un INSERT avec auto-incrément de l'id, on ne spécifie pas le champ id_employes

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (8059, 'alexis', 'richy', 'm', 'informatique', '2011-12-28', 1800);


-- Une requête qui ne fonctionne pas : 1 donnée en plus. VALUES permet de ne pas spécifier id, prenom, nom.... Tout ou rien, toutes les infos doivent être informées.
-- On peut ne pas spécifier les champs lors d'une insertion, à condition de spécifier une valeur pour tous  et dans l'ordre de présence dans la table. Ici, 'en trop' ne correspond à aucun champ, la requête est donc inopérante.

INSERT INTO employes VALUES(8061, 'test', 'test', 'm', 'informatique', '2012-01-28', 1800, 'en trop');


-- **************************
-- Requêtes de modification
-- **************************

SELECT * FROM employes;

-- UPDATE modifie le salaire à 1870 pour l'employé spécifié
UPDATE employes SET salaire = 1870 WHERE nom = 'cottet'; 

-- Dans la réalité, on passe par l'id_employes pour être certain de ne modifier que l'enregistrement concerné (cas des homonymes):

UPDATE employes SET salaire = 1871 WHERE id_employes = 699;

-- line tager = chiffre = pas de quotes. On peut modifier plusieurs champs dans la même requête.

-- Sans clause WHERE update toute la table !!

UPDATE employes SET salaire = 1872, service = 'autre' WHERE id_employes = 699; 

-- A ne pas faire donc, sinon on update tous les salaires sans pouvoir la récuperer.

UPDATE employes SET salaire = 0; 

-- REPLACE (= un delete + 1 insert donc 2 ajouts) sur la 1ère requête il se comporte comme un insert car l'id_employes 2000 n'existe pas. Pour la 2ème, le REPLACE se comporte comme un UPDATE car l'id_employes 2000 existe.
    
    
REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test', 'test', 'm', 'marketing', '2010-07-05', 2600);

REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test', 'test', 'm', 'marketing', '2010-07-05', 2601);


-- **************************
-- Requêtes de suppression
-- **************************

-- DELETE (par l'id pour éviter un souci d'homonymie)

DELETE FROM employes WHERE nom = 'lagarde';

DELETE FROM employes WHERE service = 'informatique' AND id_employes != 802;

-- Pour supprimer 2 id on met OR. AND permet de mettre 2 conditions ici delete quand id=388 ou quand id=990. AND cumulatif/OR selectif

DELETE FROM employes WHERE id_employes = 388 OR id_employes = 990;

-- ou, on supprime les id de la liste

DELETE FROM employes WHERE id_employes IN (388, 990); 

-- !! A ne pas faire sans clause WHERE, revient à faire un TRUNCATE de table (vider la table). Irréversible sans transaction.

-- **************************
-- Exercice
-- **************************

-- 1.  Afficher le service de l'employé 547
SELECT service FROM employes WHERE id_employes = 547;

-- 2.  Afficher la date d'embauche d'amandine
SELECT date_embauche FROM employes WHERE prenom = 'amandine';

-- 3.  Afficher le nbr d'employé du service commercial
SELECT COUNT(id_employes) FROM employes WHERE service = 'commercial';

-- 4.  Afficher la somme des salaires annuels des commerciaux
SELECT SUM(salaire * 12) AS salaire_annuel_des_commerciaux FROM employes WHERE service = 'commercial';

-- 5.  Afficher le salaire moyen par service
SELECT service, AVG(salaire) FROM employes GROUP BY service;

-- 6.  Afficher le nbr de recrutements sur l'année 2010 (1 solution parmi 3)
SELECT COUNT(id_employes) FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';

-- ou

SELECT COUNT(id_employes) FROM employes WHERE date_embauche >= '2010-01-01' AND date_embauche <= '2010-12-31';

-- ou

SELECT COUNT(id_employes) FROM employes WHERE date_embauche LIKE '2010%';

-- 7.  Augmenter le salaire de tous les employés de +100
UPDATE employes SET salaire = salaire + 100;

-- 8.  Afficher le nombre de services différents
SELECT COUNT (DISTINCT service) FROM employes;

-- 9.  Afficher le nombre d'employés par service
SELECT service, COUNT(id_employes) FROM employes GROUP BY service;

-- 10. Afficher toutes les infos de l'employé du service commercial le mieux payé
SELECT * FROM employes WHERE service = 'commercial' ORDER BY salaire DESC LIMIT 0,1;

-- 11. Afficher l'employé ayant été embauché en dernier
SELECT * FROM employes ORDER BY date_embauche DESC LIMIT 0,1;








































