# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `log_login`;

CREATE TABLE `log_login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_idx` varchar(20) DEFAULT NULL,
  `ip` varchar(16) DEFAULT '',
  `login_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
