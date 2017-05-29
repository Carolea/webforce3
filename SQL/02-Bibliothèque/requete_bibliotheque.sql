*********************
Création de la BDD
*********************

-- id ipk incrementation primary key
-- foreign key = primary key d'une autre table
-- id type integer/date type string donc quotes

CREATE DATABASE bibliotheque;

SHOW DATABASES -- affiche la liste des bdd disponibles

*********************
Exercices
*********************

-- 1. Afficher l'id_abonne de laura
SELECT id_abonne FROM abonne WHERE prenom = 'laura';

-- 2. L'abonné id_abonne 2 est venu emprunter le livre à quelle date (date_sortie)?
SELECT date_sortie FROM emprunt WHERE id_abonne = 2;

-- 3. Combien d'emprunt ont été effectués en tout?
SELECT COUNT(id_emprunt) FROM emprunt;

-- 4. Combien de livres sont sortis le 2011-12-19?
SELECT COUNT(id_emprunt) FROM emprunt WHERE date_sortie = '2011-12-19';

-- 5. Quel est l'auteur du livre "Une vie"?
SELECT auteur FROM livre WHERE titre = 'Une vie';

-- 6. De combien de livres d'Alexandre Dumas dispose-t-on?
SELECT COUNT(id_livre) FROM livre WHERE auteur = 'ALEXANDRE DUMAS';

-- 7. Quel id_livre est le plus emprunté?
SELECT id_livre, date_sortie FROM emprunt;
SELECT id_livre, COUNT(date_sortie) FROM emprunt GROUP BY id_livre;
-- affiche le nbr de sorties regroupées par id_livre
SELECT id_livre, COUNT(date_sortie) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre DESC;
-- ou
SELECT id_livre, COUNT(date_sortie) FROM emprunt GROUP BY id_livre ORDER BY COUNT(date_sortie) DESC;
-- ici on trie le nbr de sorties par ordre décroissant 

SELECT id_livre, COUNT(date_sortie) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre DESC LIMIT 0,1;

-- Version Lies-John 
SELECT id_livre FROM emprunt GROUP BY id_livre ORDER BY COUNT(id_livre) DESC LIMIT 0,1;


-- 8. Quel id_abonne emprunte le plus de livres?
SELECT id_abonne, COUNT(date_sortie) AS nombre FROM emprunt GROUP BY id_abonne ORDER BY nombre DESC LIMIT 0,1;

SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(date_sortie) DESC LIMIT 0,1;

*********************
Requête imbriquées
*********************

-- Une requête imbriquée permet de réaliser des requêtes sur 2 ou plusieurs tables à la fois.

-- Afin de réaliser une requête imbriquée il faut obligatoirement un champ commun entre les 2 tables.

-- Un champ NULL se teste avec l'instruction IS NULL :

SELECT id_livre FROM emprunt WHERE date_rendu IS NULL; -- affiche les id_livre non rendus

-- Affiche le titre de ces livres non rendus

SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

-- On affiche le titre de la table livre pour lequel l'id_livre est dans la liste donnée par la seconde requête entre parenthèses, soit 100 ou 105.

SELECT titre FROM livre WHERE id_livre IN (100, 105);

-- SELECT id_livre FROM emprunt WHERE date_rendu IS NULL) = 100,105 la 2eme imbriquation s'execute pour donner les titres.

-- On exécute d'abord la requête entre parenthèses, puis celle à l'extérieur.

-- Le IN de la seconde requête peut être remplacé par un "="  : IN pour plusieurs résultats, "=" quand on est sur de n'avoir qu'un résultat (sur id ou 0,1).

-- Exemple, afficher le numéro des livres que Chloé a emprunté:

SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe');

*********************
Exercices
*********************

-- 1. Afficher les prénoms des abonnés ayant emprunté un livre le '2011-12-19'.
SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie = '2011-12-19');

-- 2. Afficher le prénom des abonnés ayant emprunté un livre d'Alphonse Daudet.
SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN (SELECT id_livre FROM livre WHERE auteur = 'ALPHONSE DAUDET'));

-- 3. Nous aimerions savoir le titre des livres que chloé a empruntés.
SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe'));

-- 4. Nous aimerions savoir le titre des livres que chloé n'a pas empruntés.
SELECT titre FROM livre WHERE id_livre NOT IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe'));


-- 5. Combien de livres Benoit a emprunté à la bibliothèque.
SELECT COUNT(id_livre) FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'benoit');


-- 6. Qui (prénom) a emprunté le plus de livres à la bibliothèque.
SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC LIMIT 1);

-- ou ORDER BY COUNT(id_emprunt)


-- SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne, COUNT(date_sortie) AS nombre FROM emprunt GROUP BY id_abonne ORDER BY nombre DESC LIMIT 0,1); !!! Pas de requete sur 2 colonnes


***********************
Les jointures internes
***********************

-- Une jointure est possible dans tous les cas, alors qu'une requête imbriquée n'est possible que dans le cas ou les champs affichés (ceux qui sont dans le select) proviennent de la même table. Avec une jointure, ils pourront être affichés et issus de tables différentes. (requête moins lourde)

-- Pour connaître les dates de sortie et de rendu pour l'abonné Guillaume.
-- Donner alias aux tables: a=abonne, e=emprunt. Pour lier les 2 tables par leur joint commun ON a.id_abonne = e.id_abonne

SELECT a.prenom, e.date_sortie, e.date_rendu
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne -- champ commun mais peuvent avoir des noms différents
WHERE a.prenom = 'guillaume'; -- préciser la table même si qu'une seule fois

-- SELECT a.prenom, e.date_sortie, e.date_rendu FROM abonne a INNER JOIN emprunt e ON a.id_abonne = e.id_abonne WHERE a.prenom = 'guillaume'; -- sous php


-- 1ère ligne : ce que je souhaite afficher.
-- 2ème ligne : la 1ère table d'où viennent les informations.
-- 3ème ligne : on lie la 1ère table à la seconde d'où viennent les informations.
-- 4ème ligne : la jointure qui lie les deux champs en commun dans les 2 tables.
-- 5ème ligne : condition supplémentaire sur le prénom.

-- Lorsqu'il y a 3 tables à joindre, on fait suivre 2 INNER JOIN ... ON à la suite de l'autre.

-- inverse abo

***********************
Exercices
***********************

-- 1. Afficher les titres, date de sortie et date de rendu des livres écrits par Alphonse Daudet.

SELECT l.titre, e.date_sortie, e.date_rendu
FROM livre l
INNER JOIN emprunt e
ON l.id_livre = e.id_livre
WHERE l.auteur = 'alphonse daudet';

-- 2. Qui (prénom) a emprunté "Une Vie" sur 2011?

SELECT a.prenom
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
INNER JOIN livre l
ON l.id_livre = e.id_livre
WHERE l.titre = 'Une vie' AND e.date_sortie LIKE '2011%';

-- AND e.date_sortie >= '2011-12-31' AND e.date_sortie <= '2011-01-01';

-- 3. Afficher le nombre de livres empruntés par chaque abonné (prénom).
SELECT a.prenom, COUNT(e.id_abonne)
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
GROUP BY e.id_abonne;

-- Il faut penser à grouper les résultats agrégés tels que SUM, AVG, COUNT par un autre champ : ici on redistribue le COUNT par id_abonne.


-- 4. Qui (prénom) a emprunté quoi (titre) et à quelle date (date_sortie)?

SELECT a.prenom, l.titre, e.date_sortie
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
INNER JOIN livre l
ON l.id_livre = e.id_livre; 

******************

-- Afficher les prénoms des abonnés avec les id_livre qu'ils ont empruntés :

SELECT a.prenom, e.id_livre
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne;


***********************
Les jointures externes
***********************

-- Une requête sans correspondance exigée entre les valeurs affichées.
-- Exemple: 

INSERT INTO abonne (prenom) VALUES ('moi'); -- on s'insère dans la table abonne.

--SELECT * FROM abonne; -- pour vérifier.

-- Si on relance la dernière requête de jointure interne(SELECT a.prenom, e.id_livre FROM abonne a INNER JOIN emprunt e ON a.id_abonne = e.id_abonne;), la valeur entrée n'apparaît pas car pas d'emprunt de livre. Si on souhaite que la liste soit exhaustive on fait une jointure externe.

SELECT abonne.prenom, emprunt.id_livre
FROM abonne
LEFT JOIN emprunt
ON abonne.id_abonne = emprunt.id_abonne;

-- La clause LEFT JOIN permet de rapatrier TOUTES les données dans la table considérée comme étant à GAUCHE de l'instruction: abonne (gauche) LEFT JOIN emprunt (droite). Sans correspondance exigée dans l'autre table (ici emprunt).
-- Les valeurs n'ayant pas de correspondance apparaissent avec la mention NULL.

-- Avec un livre supprimé de la bibliothèque.
-- 1° on supprime le livre "Une vie" d'id_livre 100:
DELETE FROM livre WHERE id_livre = 100;

-- 2° On affiche la liste de tous les emprunts, y compris ceux pour lesquels il manque un livre:

SELECT emprunt.id_emprunt, livre.titre
FROM emprunt
LEFT JOIN livre
ON emprunt.id_livre = livre.id_livre;

-- On peut aussi écrire cette requête avec RIGHT JOIN, en inversant la position des tables:

SELECT emprunt.id_emprunt, livre.titre
FROM livre
RIGHT JOIN emprunt
ON emprunt.id_livre = livre.id_livre;

-- Ici RIGHT JOIN signifie que la table à droite de l'instruction, donc emprunt, sera complétement affichée.
-- Le livre manquant "Une vie" est remplacé par la mention NULL.


***********************
UNION
***********************

-- Union permet de fusionner le résultat de 2 requêtes dans la même liste de résultats
-- Si on désinscrit Guillaume par une suppression du profil de la table abonne, on peut afficher à la fois tous les livres empruntés y compris par des lecteurs désinscrits (on affiche NULL à la place de Guillaume) ET tous les abonnés y compris ceux qui n'ont rien emprunté (on affiche NULL dans id_livre pour 'moi').

-- Suppression du profil de l'abonne Guillaume.
DELETE FROM abonne WHERE id_abonne = 1;

-- Requête sur les livres empruntés

(SELECT abonne.prenom, emprunt.id_livre FROM abonne LEFT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne) UNION (SELECT abonne.prenom, emprunt.id_livre FROM abonne RIGHT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne);


/////////////////////////////
(SELECT prenom FROM abonne) UNION (SELECT titre FROM livre); -- on affiche 1 liste des livres et prénoms

SELECT abonne.prenom, livre.titre FROM abonne INNER JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne INNER JOIN livre ON livre.id_livre = emprunt.id_livre; -- on affiche sur 2 colonnes
/////////////////////////////





















