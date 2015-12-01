<?php 
	$partName = 'Coach';
	require('./part/head.inc'); 
?>

    <body>
        <h1>CoachPage</h1>
        <h2>unread questions</h2>
        <form>
       		<ul>
               	<li>user1 : fwrgergethrt</li>
               	<li>user2 : fwrgergethrt</li>
               	<li>user3 : fwrgergethrt</li>
            </ul>
        </form>
        <h2>history questions</h2>
       	<ul>
            <li>user1 : fwrgergethrt</li>
            <li>user1 : fwrgergethrt</li>
        </ul>
        <h2>history advices</h2>
        <ul>
            <li>TO user1 : fwrgergethrt</li>
            <li>TO user1 : fwrgergethrt</li>
        </ul>
        
        <h2>post advice</h2>
        <form id="coachPost" name="coachPost" method="post" action="">
            <p>
                to username
                <input type="text" name="CoachAdviceName" id="CoachAdviceName" />
            </p>
            <p>
                advice
                <input name="CoachAdvice" type="text" id="CoachAdvice"/>
            </p>
            <p>
                <input type="submit" name="CoachAdvicePost" id="CoachAdvicePost" value="发送" />
                <input type="button" name="CoachAdviceIgnore" id="CoachAdviceIgnore" value="取消" />      
            </p>
        </form>
    </body>
</html>
