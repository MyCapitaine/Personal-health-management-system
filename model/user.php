<?php

$createUsers =<<<EOF
	create table USERS
		(
			uid int primary key NOT NULL,
			type text NOT NULL,
			userName text NOT NULL,
			info text NOT NULL
		);
EOF;

if($dbController->exec($createUsers)) {
	echo "users table created\n";
}
else {
	echo "users table existed\n";
}


?>