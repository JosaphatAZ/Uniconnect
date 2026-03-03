SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS entite (
  id                 int(11)      NOT NULL AUTO_INCREMENT,
  universite         varchar(150) NOT NULL,
  type               enum('ecole','faculte') NOT NULL,
  nom                varchar(255) NOT NULL,
  sigle              varchar(50)  DEFAULT NULL,
  email              varchar(255) NOT NULL,
  password_hash      varchar(255) NOT NULL,
  site_web           varchar(255) DEFAULT NULL,
  telephone          varchar(20)  DEFAULT NULL,
  adresse            text         DEFAULT NULL,
  statut             enum('en_attente','actif','refuse') DEFAULT 'en_attente',
  token_verification varchar(255) DEFAULT NULL,
  date_inscription   timestamp    NULL DEFAULT current_timestamp(),
  date_validation    timestamp    NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY email (email),
  KEY idx_statut     (statut),
  KEY idx_universite (universite)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5;

COMMIT;