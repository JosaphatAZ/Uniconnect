SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS etudiant (
  id                 int(11)      NOT NULL AUTO_INCREMENT,
  email              varchar(255) NOT NULL,
  password_hash      varchar(255) NOT NULL,
  prenom             varchar(100) NOT NULL,
  nom                varchar(100) NOT NULL,
  universite         varchar(150) NOT NULL,
  entite_id          int(11)      NOT NULL,
  niveau_etude       varchar(50)  NOT NULL,
  statut             enum('en_attente','actif','refuse') DEFAULT 'en_attente',
  email_verifie      tinyint(1)   DEFAULT 0,
  token_verification varchar(255) DEFAULT NULL,
  telephone          varchar(20)  DEFAULT NULL,
  photo_profil       varchar(255) DEFAULT NULL,
  date_inscription   timestamp    NULL DEFAULT current_timestamp(),
  date_verification  timestamp    NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY email (email),
  KEY idx_entite  (entite_id),
  KEY idx_statut  (statut),
  KEY idx_verifie (email_verifie),
  CONSTRAINT fk_etudiant_entite FOREIGN KEY (entite_id) REFERENCES entite(id) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4;

COMMIT;