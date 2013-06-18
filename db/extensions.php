<?php

$create = "DROP TABLE IF EXISTS `v155_extension`;
CREATE TABLE IF NOT EXISTS `v155_extension` (
	`extension_id` int(11) NOT NULL AUTO_INCREMENT,
	`type` varchar(32) NOT NULL,
	`code` varchar(32) NOT NULL,
	PRIMARY KEY (`extension_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
$pdo->query($create);

$rows = $pdo->query('SELECT * FROM extension');
foreach($rows as $row) {
	$sql  = "INSERT INTO v155_extension (extension_id,type,code)";
	$sql .= "VALUES (:extension_id,:type,:code)";
	$q = $pdo->prepare($sql);
	$q->execute(array(
		':extension_id' => $row['extension_id'],
		':type' => $row['type'],
		':code' => $row['key'],
	));
}

echo 'Extension Rows Copied.';
echo '<br />';