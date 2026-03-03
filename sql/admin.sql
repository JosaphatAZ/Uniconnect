CREATE DATABASE IF NOT EXISTS administrateur
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE administrateur;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET FOREIGN_KEY_CHECKS = 0;

-- ADMINS 
CREATE TABLE IF NOT EXISTS admins (
    id                 INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom                VARCHAR(100)        NOT NULL,
    prenom             VARCHAR(100)        NOT NULL,
    email              VARCHAR(191) UNIQUE NOT NULL,
    password           VARCHAR(255)        NOT NULL,
    role               ENUM('super_admin','admin') DEFAULT 'admin',
    derniere_connexion DATETIME            NULL,
    created_at         DATETIME            DEFAULT CURRENT_TIMESTAMP,
    updated_at         DATETIME            DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ─── UNIVERSITÉS 
CREATE TABLE IF NOT EXISTS universites (
    id                 INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom                VARCHAR(200)  NOT NULL,
    pays               VARCHAR(100)  NOT NULL,
    ville              VARCHAR(100)  NOT NULL,
    code               VARCHAR(10)   NOT NULL,
    email_contact      VARCHAR(191)  NOT NULL,
    telephone          VARCHAR(30)   NULL,
    site_web           VARCHAR(255)  NULL,
    description        TEXT          NULL,
    couleur            VARCHAR(7)    DEFAULT '#dc2626',
    statut             ENUM('en_attente','validee','refusee','suspendue') DEFAULT 'en_attente',
    validee_par        INT UNSIGNED  NULL,
    validee_le         DATETIME      NULL,
    motif_refus        TEXT          NULL,
    expiration_demande DATETIME      NULL,
    nb_etudiants       INT UNSIGNED  DEFAULT 0,
    nb_publications    INT UNSIGNED  DEFAULT 0,
    created_at         DATETIME      DEFAULT CURRENT_TIMESTAMP,
    updated_at         DATETIME      DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (validee_par) REFERENCES admins(id) ON DELETE SET NULL,
    INDEX idx_statut (statut)
);

-- ENTITÉ (écoles / facultés — UniConnect)
CREATE TABLE IF NOT EXISTS entite (
    id                 INT(11)       NOT NULL AUTO_INCREMENT,
    universite         VARCHAR(150)  NOT NULL,
    type               ENUM('ecole','faculte') NOT NULL,
    nom                VARCHAR(255)  NOT NULL,
    sigle              VARCHAR(50)   DEFAULT NULL,
    email              VARCHAR(255)  NOT NULL,
    password_hash      VARCHAR(255)  NOT NULL,
    site_web           VARCHAR(255)  DEFAULT NULL,
    telephone          VARCHAR(20)   DEFAULT NULL,
    adresse            TEXT          DEFAULT NULL,
    statut             ENUM('en_attente','actif','refuse') DEFAULT 'en_attente',
    token_verification VARCHAR(255)  DEFAULT NULL,
    date_inscription   TIMESTAMP     NULL DEFAULT CURRENT_TIMESTAMP,
    date_validation    TIMESTAMP     NULL DEFAULT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY email (email),
    INDEX idx_email      (email),
    INDEX idx_statut     (statut),
    INDEX idx_universite (universite)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- LOGS D'ACTIVITÉ 
CREATE TABLE IF NOT EXISTS logs (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    admin_id    INT UNSIGNED NULL,
    type        ENUM('validation','refus','nouvelle_demande','config',
                     'connexion','deconnexion','info','alerte','erreur') NOT NULL,
    message     TEXT         NOT NULL,
    entite_type VARCHAR(50)  NULL,
    entite_id   INT UNSIGNED NULL,
    ip          VARCHAR(45)  NULL,
    user_agent  VARCHAR(255) NULL,
    created_at  DATETIME     DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE SET NULL,
    INDEX idx_type    (type),
    INDEX idx_created (created_at)
);

-- CONFIGURATION GLOBALE 
CREATE TABLE IF NOT EXISTS config_site (
    cle         VARCHAR(100) PRIMARY KEY,
    valeur      TEXT         NOT NULL,
    description VARCHAR(255) NULL,
    updated_at  DATETIME     DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

SET FOREIGN_KEY_CHECKS = 1;

-- Admin par défaut  ►  email : admin@plateforme.com  |  mdp : Admin@1234
INSERT IGNORE INTO admins (nom, prenom, email, password, role) VALUES
('Admin', 'Super', 'admin@plateforme.com',
 '$2y$12$F9QnPFtFYsD.1v3xH0R7LOOaNSQAXPHVX4HFM7bCaFSWXC.PW2x3G',
 'super_admin');

-- Universités
INSERT IGNORE INTO universites
    (nom, pays, ville, code, email_contact, statut, validee_le, validee_par,
     nb_etudiants, nb_publications, expiration_demande)
VALUES
('Université de Dakar',   'Sénégal',        'Dakar',   'UD', 'contact@univ-dakar.sn',
 'validee',    NOW() - INTERVAL 2 HOUR, 1, 1850, 320, NULL),

('Université de Cotonou', 'Bénin',          'Cotonou', 'UC', 'info@univ-cotonou.bj',
 'validee',    NOW() - INTERVAL 2 DAY,  1, 2100, 415, NULL),

('Université de Lomé',    'Togo',           'Lomé',    'UL', 'contact@univ-lome.tg',
 'en_attente', NULL, NULL, 0, 0, NOW() + INTERVAL 26 HOUR),

('Université d''Abidjan', 'Côte d''Ivoire', 'Abidjan', 'UA', 'info@univabidjan.ci',
 'en_attente', NULL, NULL, 0, 0, NOW() + INTERVAL 30 HOUR),

('Université de Bamako',  'Mali',           'Bamako',  'UB', 'admin@univ-bamako.ml',
 'en_attente', NULL, NULL, 0, 0, NOW() + INTERVAL 42 HOUR),

('Université fictive XY', 'Inconnu',        'Inconnu', 'XY', 'fake@example.com',
 'refusee',    NULL, 1, 0, 0, NULL);

-- Logs
INSERT IGNORE INTO logs (admin_id, type, message, entite_type, entite_id, created_at) VALUES
(1,    'validation',       'Université de Dakar validée par admin',            'universites', 1, NOW() - INTERVAL 2  HOUR),
(NULL, 'nouvelle_demande', 'Nouvelle demande : Université de Bamako',          'universites', 5, NOW() - INTERVAL 6  HOUR),
(1,    'refus',            'Université fictive XY refusée — données invalides', 'universites', 6, NOW() - INTERVAL 1  DAY),
(1,    'validation',       'Université de Cotonou validée par admin',           'universites', 2, NOW() - INTERVAL 2  DAY),
(1,    'config',           'Configuration site mise à jour',                    NULL, NULL,        NOW() - INTERVAL 3  DAY),
(NULL, 'nouvelle_demande', 'Nouvelle demande : Université d''Abidjan',          'universites', 4, NOW() - INTERVAL 18 HOUR),
(NULL, 'nouvelle_demande', 'Nouvelle demande : Université de Lomé',             'universites', 3, NOW() - INTERVAL 22 HOUR);

-- Configuration
INSERT IGNORE INTO config_site (cle, valeur, description) VALUES
('site_nom',               'Plateforme Universitaire', 'Nom du site'),
('delai_validation_heures','48',                        'Délai max de traitement (h)'),
('email_notifications',    'admin@plateforme.com',      'Email destinataire alertes'),
('maintenance',            '0',                         '1 = site en maintenance');