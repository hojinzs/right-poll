# Dump of table user
# ------------------------------------------------------------

ALTER TABLE user
CHANGE id idx int(11) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE user_guest
ADD user_id varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL;

ALTER TABLE user_guest
CHANGE id idx int(11) unsigned NOT NULL AUTO_INCREMENT;

ALTER TABLE log_login
CHANGE user_idx user_id varchar(20);
