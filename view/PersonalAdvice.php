<?php 
	$partName = 'PersonalAdvice';
	require('./part/head.inc'); 
?>

<body>
<h1><label></label>
<a href="#">MainPage&gt;</a>PersonalAdvice</h1>

<table width="682" border="1">
	<tr>
		<th width="143" scope="col">教练/医生id</th>
		<th width="523" scope="col">意见摘要</th>=
	</tr>
	<tr>
		<th scope="col">&nbsp;</th>
		<th scope="col">&nbsp;</th>
	</tr>
	<tr>
		<th scope="col">&nbsp;</th>
		<th scope="col">&nbsp;</th>
	</tr>
	<tr>
		<th scope="col">&nbsp;</th>
		<th scope="col">&nbsp;</th>
	</tr>
	<tr>
		<th scope="col">&nbsp;</th>
		<th scope="col">&nbsp;</th>
	</tr>
</table>
<p>&nbsp;</p>
<h2>咨询建议</h2>
<form id="form1" name="form1" method="post" action="">
	<p>
		<label for="personal_advice_id"></label>
		id
		<input type="text" name="personal_advice_id" id="personal_advice_id" />
	</p>
	<p>内容
		<label for="personal_advice_text"></label>
		<input type="text" name="personal_advice_text" id="personal_advice_text" />
	</p>
	<p>
		<input type="submit" name="personal_advice_post" id="personal_advice_post" value="发送" />
	</p>
</form>
<p>&nbsp;</p>
</body>
</html>
