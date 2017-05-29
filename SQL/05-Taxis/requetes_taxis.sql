*************************
Exercices
*************************

USE taxis;

-- 1. Qui conduit la voiture d'id_vehicule 503?
SELECT conducteur.nom, conducteur.prenom FROM conducteur INNER JOIN association_vehicule_conducteur ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur WHERE id_vehicule = '503';

-- ou

SELECT a.prenom FROM conducteur a LEFT JOIN association_vehicule_conducteur e ON a.id_conducteur = e.id_conducteur WHERE id_vehicule = 503;

-- ou

SELECT prenom FROM conducteur WHERE id_conducteur = (SELECT id_conducteur FROM association_vehicule_conducteur WHERE id_vehicule = 503);

-- 2. Qui (prenom) conduit quel modèle?
SELECT conducteur.prenom, vehicule.modele FROM conducteur INNER JOIN association_vehicule_conducteur ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur INNER JOIN vehicule ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule;


-- 3. Ajoutez-vous dans la liste des conducteurs. Puis afficher tous les conducteurs (y compris ceux qui n'ont pas de véhicule affecté, ainsi que les modèles de véhicule)
INSERT INTO conducteur (id_conducteur, prenom, nom) VALUES (' ', 'Carole', 'A');

-- ou

INSERT INTO conducteur VALUES(NULL, 'John', 'Doe');

-- ou 

INSERT INTO conducteur (prenom, nom) VALUES('Rudy', 'Test') -- !!! mieux

SELECT conducteur.nom, conducteur.prenom, vehicule.modele FROM conducteur LEFT JOIN association_vehicule_conducteur ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur LEFT JOIN vehicule ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule; 

-- ou

SELECT prenom, nom, modele FROM conducteur c LEFT JOIN association_vehicule_conducteur a ON c.id_conducteur = a.id_conducteur LEFT JOIN vehicule v ON a.id_vehicule = v.id_vehicule;

-- pas de doublon dans les noms donc pas obligé de préciser la table dans SELECT

-- 4. Ajoutez un nouvel enregistrement dans la table vehicule. Puis affichez tous les modèles de véhicule, y compris ceux qui n'ont pas de chauffeur affecté et le prénom des conducteurs.
INSERT INTO vehicule VALUES (' ', 'Dodge', 'Viper', 'bleu', 'AC-476-RO');

SELECT vehicule.modele, conducteur.prenom FROM conducteur RIGHT JOIN association_vehicule_conducteur ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur RIGHT JOIN vehicule ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule; 

-- 5. Affichez les prénoms des conducteurs (y compris ceux qui n'ont pas de véhicule) ET tous les véhicules (même ceux qui n'ont pas de chauffeur affecté).

(SELECT conducteur.prenom, vehicule.modele FROM conducteur LEFT JOIN association_vehicule_conducteur ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur LEFT JOIN vehicule ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule) UNION (SELECT conducteur.prenom, vehicule.modele FROM conducteur RIGHT JOIN association_vehicule_conducteur ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur RIGHT JOIN vehicule ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule);






















