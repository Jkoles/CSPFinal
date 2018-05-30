<?php
require_once 'login1.php'; //uses the info to access the database
$db_server = mysql_connect($host, $username, $password);
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
mysql_select_db($dbname)
	or die("Unable to select database: " . mysql_error());
	
$query = "SELECT * FROM student WHERE class='" . $_POST['food'] . "'";
//$result = mysql_query($query) or die($query."<br/><br/>".mysql_error());//Use this line to debug any database errors
$result = mysql_query($query);
$row = mysql_fetch_row($result);
$costomerID = $row[0];
$firstname = $row[1];
$food = $row[2];
$HowMany = $row[3];
$roster_table = mysql_query($query);
/*
// Call a function defined later in this file, with six arguments
display_table($studentID, $roster_table, $dbname, $studentName, $class, $year);

// HTML to display the form on this page.

function display_table($customerID, $roster_table, $dbname, $firstname,$food, $yearHowMany)
{
*/
echo nl2br("Here is the roster for "." ". $_POST['className']);
$num_names = mysql_num_rows($roster_table);
if ($roster_table)//will only do this if there is something to be returned from the aboe line
	{echo "<TABLE><TR><TD>Customer ID</TD><TD>first name</TD><TD>Grade</TD></TR>";
		// Iterate through all of the returned images, placing them in a table for easy viewing
	for ($count = 0; $count < $num_names; $count++)
		{
			// The following few lines store information from specific cells in the data about an image
			$name_row = mysql_fetch_row($roster_table); // Advances a row each time it is called
			echo "<TR>";
			//$domain = $_SERVER['SERVER_NAME'];
			echo "<TD>$customerID </TD><TD> $firstname </TD><TD>$year </TD>";
			echo "</TR>";
		}
	echo "</TABLE>";	
	}
?>