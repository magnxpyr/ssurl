/*
* @copyright  Copyright (C) 2006 - 2013 Magnxpyr Network. All rights reserved.
* @license    GNU General Public License version 3; see LICENSE
*/

DROP TABLE IF EXISTS shorturl;
CREATE TABLE shorturl
(
	id				int unsigned NOT NULL auto_increment,
	shorturl		varchar(10) NOT NULL COLLATE utf8_bin,
	longurl			varchar(255) NOT NULL COLLATE utf8_general_ci,
	date			TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	counter			int unsigned NOT NULL DEFAULT 0,

	PRIMARY KEY		(id)
);