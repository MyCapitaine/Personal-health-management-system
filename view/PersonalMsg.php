<?php 
	$partName = 'PersonalMsg';
	require('./part/head.inc'); 
?>

	<body>
        <h1><a href="#">MainPage></a>PersonalMsg</h1>
        <h2>unread advices</h2>
        <form>
       		<ul>
               	<li>user1 : fwrgergethrt</li>
               	<li>user2 : fwrgergethrt</li>
               	<li>user3 : fwrgergethrt</li>
            </ul>
        </form>
        <h2>history advices</h2>
       	<ul>
            <li>user1 : fwrgergethrt</li>
            <li>user1 : fwrgergethrt</li>
        </ul>
        <h2>history questions</h2>
        <ul>
            <li>TO coach1 : fwrgergethrt</li>
            <li>TO doctor1 : fwrgergethrt</li>
        </ul>
        <h2>post question</h2>
        <form id="personalPost" name="personalPost" method="post" action="">
            <p>
                coach/doctor name
                <input type="text" name="personalQuestionName" id="personalQuestionName" />
            </p>
            <p>
            	question
                <input type="text" name="personalQuestion" id="personalQuestion" />
            </p>
            <p>
                <input type="submit" name="personalQuestionPost" id="personalQuestionPost" value="发送" />
                <input type="button" name="personalQuestionIgnore" id="personalQuestionIgnore" value="取消" />
            </p>
        </form>
	</body>
</html>
