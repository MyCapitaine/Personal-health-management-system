<?php

$createQuestions =<<<EOF
	create table QUESTIONS
		(
			posterId int NOT NULL,
			reciverId int NOT NULL,
			postTime int NOT NULL,
			recived bool NOT NULL,
			inner text NOT NULL
		);
EOF;

if($dbController->exec($createQuestions)) {
	echo "questions table created\n";
}
else {
	echo "questions table existed\n";
}


?>