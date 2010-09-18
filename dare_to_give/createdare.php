<?php

if (isset($_POST['darer'])) { 
	$dbhost = 'localhost:3306';
	$dbuser = 'root';
	$dbpass = '';
	
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql'.mysql_error());
	
	$dbname = 'dare_to_give';
	mysql_select_db($dbname);
	
	
	$darer = $_POST["darer"];
	$victim = $_POST["victim"];
	$shortdesc = $_POST["shortdesc"];
	$description = $_POST["description"];
	$initialcontribution = $_POST["initialcontribution"];
	$enddate = $_POST["enddate"];
	$charity_id = 1;
	
	$insertSql = "INSERT INTO dare (darer, victim, shortdesc, description, initialcontribution, enddate, charity_id) VALUES ";
	$insertSql .= "('$darer', '$victim', '$shortdesc', '$description', '$initialcontribution', '$enddate', '$charity_id')";
	mysql_query($insertSql); 
	
	$insertedId = mysql_insert_id();
	
	echo "Row inserted with id $insertedId<br/>";
	
	$query  = "SELECT * FROM dare";
	$result = mysql_query($query) or die("Query to get blah failed with error: ".mysql_error());;
	
	
	/*
	while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
	    echo "Name :{$row['dare_id']} <br>" .
	         "Subject : {$row['shortdesc']} <br>" . 
	         "Message : {$row['description']} <br><br>";
	} 
	*/
	mysql_free_result($result);
	
	include 'closedb.php';

}
?>

<html>
<body>

<form action="input.php" method="post">
	<input type="hidden" name="darer" value="853925393"/>
	Choose a friend to dare <input type="text" name="victim" value="534550735" /><br/>
	Dare <input type="text" name="shortdesc" value="Kiss a stranger" /><br/>
	Details <input type="text" name="description" value="I dare you to kiss a stranger." /><br/>
	
	Amount £ <input type="text" name="initialcontribution" value="2.00" /><br/>
	Completed by <input type="text" name="enddate" value="2010-09-08" /><br/>
	<input type="submit" />
</form>
</body>