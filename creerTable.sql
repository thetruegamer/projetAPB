CREATE TABLE fichier_FI_en_entree
(
    code_groupe int,
    numero int PRIMARY KEY,
    classement varchar(5),
    nom varchar(80),
    prenom varchar(30),
    libelle_groupe varchar(50),
    sexe varchar(2),
    date_naissance varchar(15),
    profil_candidat varchar(20),
    type_etablissement varchar(20),
    UAI_etablissement varchar(10),
    libelle_etablissement varchar(100),
    commune_etablissement varchar(60),
    departement_etablissement int,
    pays_etablissement varchar(20),
    type_formation_suivie varchar(50),
    serie varchar(10),
    classe varchar(10),
    option_europeenne varchar(20),
    dominante varchar(50),
    spécialité varchar(80),
    LV1 varchar(20),
    LV2 varchar(20),
    option_1 varchar(50),
    option_2 varchar(50),
    annee_entree_seconde int,
    diplome_obtenu varchar(70),
    serie_diplome varchar(70),
    dominante_diplome varchar(50),
    specialite_diplome varchar(50),
    mention_diplome varchar(50),
    mois_et_annee_obtention varchar(10),
    niveau_classe varchar(20),
    avis_du_CE varchar(20)
);

CREATE TABLE fichier_FA_en_entree
(
    code_groupe int,
    numero int PRIMARY KEY,
    classement varchar(5),
    nom varchar(80),
    prenom varchar(80),
    libelle_groupe varchar(50),
    sexe varchar(2),
	date_naissance varchar(15),
    profil_candidat varchar(20),
    type_etablissement varchar(20),
    UAI_etablissement varchar(10),
    libelle_etablissement varchar(100),
    commune_etablissement varchar(60),
    departement_etablissement int,
    pays_etablissement varchar(20),
    type_formation_suivie varchar(50),
    serie varchar(10),
    classe varchar(10),
    option_europeenne varchar(20),
    dominante varchar(50),
    spécialité varchar(80),
    LV1 varchar(20),
    LV2 varchar(20),
    option_1 varchar(50),
    option_2 varchar(50),
    annee_entree_seconde int,
    diplome_obtenu varchar(70),
    serie_diplome varchar(70),
    dominante_diplome varchar(50),
    specialite_diplome varchar(50),
    mention_diplome varchar(50),
    mois_et_annee_obtention varchar(10),
    niveau_classe varchar(20),
    avis_du_CE varchar(20)
);

CREATE TABLE moyennes_FI_en_entree
(
    rang_provisoire int,
    numero int PRIMARY KEY,
    nom varchar(80),
    prenom varchar(80),
    infos_diplome varchar(100),
    exament_dossier varchar(20),
    notes_recruteur int,
    moyenne float,
    moyenne_forcee varchar(20),
    cumul_coefficients int,
    date_dernier_calcul varchar(30),
    nombre_bonus_malus_appliques int,
    nombre_erreurs_calcul int,
    marqueurs_dossier int
);

CREATE TABLE moyennes_FA_en_entree
(
    rang_provisoire int,
    numero int PRIMARY KEY,
    nom varchar(80),
    prenom varchar(80),
    infos_diplome varchar(100),
    exament_dossier varchar(20),
    notes_recruteur int,
    moyenne float,
    moyenne_forcee varchar(20),
    cumul_coefficients int,
    date_dernier_calcul varchar(30),
    nombre_bonus_malus_appliques int,
    nombre_erreurs_calcul int,
    marqueurs_dossier int
);

CREATE TABLE redoub_FI_en_entree
(
    rang_provisoire int,
    numero int PRIMARY KEY,
    nom varchar(80),
    prenom varchar(80),
    infos_diplome varchar(100),
    exament_dossier varchar(20),
    notes_recruteur int,
    moyenne float,
    moyenne_forcee varchar(20),
    cumul_coefficients int,
    date_dernier_calcul varchar(30),
    nombre_bonus_malus_appliques int,
    nombre_erreurs_calcul int,
    marqueurs_dossier int
);

CREATE TABLE moyennes_FA_en_entree
(
    rang_provisoire int,
    numero int PRIMARY KEY,
    nom varchar(80),
    prenom varchar(80),
    infos_diplome varchar(100),
    exament_dossier varchar(20),
    notes_recruteur int,
    moyenne float,
    moyenne_forcee varchar(20),
    cumul_coefficients int,
    date_dernier_calcul varchar(30),
    nombre_bonus_malus_appliques int,
    nombre_erreurs_calcul int,
    marqueurs_dossier int
);