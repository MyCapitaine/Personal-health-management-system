<?php

$createDatas =<<<EOF
	create table DATAS
		(
			uid int NOT NULL,
			time int NOT NULL,
			data text NOT NULL
		);
EOF;

if($dbController->exec($createDatas)) {
	echo "datas table created\n";
}
else {
	echo "datas table existed\n";
}


?>