***********************
Fonction prédéfinies
***********************

-- Une fonction prédéfinie est prévue par le langage et executée par le developpeur.

-- Fonctions sur les dates: (d=day, m=month, Y= sur 4 chiffres, y= sur 2 chiffres)
-- DATE_FORMAT met la date au format indiqué
SELECT *, DATE_FORMAT(date_rendu, '%d-%m-%Y') AS date_fr FROM emprunt;
SELECT *, DATE_FORMAT(date_rendu, '%d-%m-%y') AS date_fr FROM emprunt;

-- Affichage heure/date au moment de la requête.
INSERT INTO NOW(); -- pour un champ inscription par exemple
SELECT NOW();

SELECT DATE_FORMAT(NOW(), '%d-%m-%y');

SELECT CURDATE(); -- affiche la date du jour

SELECT CURTIME(); -- affiche l'heure

-- ******
-- Fonctions sur les chaînes de caractères:

SELECT CONCAT('a', 'b', 'c'); -- concatenation en 'abc'. Pratique, par exemple, pour réunir une adresse: adresse + ville + cp.

SELECT CONCAT_WS(' - ', 'premier prenom', 'second prenom');
-- WS=with separator

SELECT SUBSTRING('bonjour', 1, 3); -- affiche "bon" : coupe le string de la position 1 et sur 3 caractères.

SELECT SUBSTRING('bonjour prenom', 8); -- affiche prenom ( a partir de la position 8)

SELECT TRIM(' bonjour '); -- nettoie les informations rentrées et vire les espaces avant et après la chaîne de caractère.

-- Ressource internet pour trouver les fonctions prédéfinies:
-- http://sql.sh




