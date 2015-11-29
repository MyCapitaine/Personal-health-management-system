<?php

$createAdvices =<<<EOF
	create table ADVICES
		(
			posterId int NOT NULL,
			reciverId int NOT NULL,
			postTime int NOT NULL,
			recived bool NOT NULL,
			inner text NOT NULL
		);
EOF;

if($dbController->exec($createAdvices)) {
	echo "advices table created\n";
}
else {
	echo "advices table existed\n";
}


?>