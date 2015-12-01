<?php 
	$partName = 'Doctor';
	require('./part/head.inc'); 
?>

    <body>
        <h1>DoctorPage</h1>
        
        
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
        <form id="doctorPost" name="doctorPost" method="post" action="">
            <p>
                to username
                <input type="text" name="doctorAdviceName" id="doctorAdviceName" />
            </p>
            <p>
                advice
                <input name="doctorAdvice" type="text" id="doctorAdvice"/>
            </p>
            <p>
                <input type="submit" name="doctorAdvicePost" id="doctorAdvicePost" value="发送" />
                <input type="button" name="doctorAdviceIgnore" id="doctorAdviceIgnore" value="取消" />      
            </p>
        </form>
    </body>
</html>
