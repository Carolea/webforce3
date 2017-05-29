*************************
Tables virtuelles : vues
*************************

-- Les vues ou tables virtuelles sont des objets de la BDD, constitués d'un nom et d'une requête de sélection.

-- Une fois qu'une vue est définie, on peut l'utiliser comme n'importe quelle table.
-- Cette vue contient un sous-ensemble de données résultant de la requête de sélection.

-- travail sur la bdd entreprise
USE entreprise;

-- Création d'une vue: 
CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service FROM employes WHERE sexe = 'm';

-- Crée une vue remplie des données du select, à savoir les infos des employés masculins.

-- On peut ensuite faire n'importe quelle requête sur cette vue:
SELECT prenom FROM vue_homme; -- on slectionne les prenoms dans la vue.
SELECT * FROM vue_homme;

-- On peut voir la vue parmi les tables de la bdd:
SHOW TABLES;

-- la vue est dans la liste tant qu'elle n'est pas delete.

-- Si il y a un changement dans la table d'origine ou la vue elle se répercute dans l'autre. La vue est corrigée car elle pointe vers cette table grâce à la requête de sélection. Idem si il y a un changement dans la vue, il se répercute dans la table d'origine.

-- Il y a un intérêt à faire des vues en termes de gain de performances, ou quand il y a des requêtes complexes à exécuter. La vue sert dans ce cas à stocker les résultats d'une première requête sur laquelle sera executée une seconde requête.

- Pour supprimer une vue:
DROP VIEW vue_homme;

*************************
Tables temporaires 
*************************

-- Création d'une table temporaire
-- La table temporaire 'temp' avec les données du SELECT s'efface quand on quitte la session, ou la connexion à la bdd. Elle n'est pas visible dans la liste des tables avec SHOW TABLES.

CREATE TEMPORARY TABLE temp SELECT * FROM employes WHERE sexe = "f";

-- pratique pour éviter les modifications en cours et travailler sur un moment donné.

-- Utiliser une table temporaire:

SELECT prenom FROM temp;

-- Contrairement aux vues, si il y a un changement dans la table d'origine,  la table temporaire n'est pas impactée car elle est une copie à un instant T de celle-ci.





