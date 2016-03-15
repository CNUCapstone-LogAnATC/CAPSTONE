<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$link = mysql_connect($servername, $username, $password, $dbname);

if (!$link) {
    die('Could not Connect: ' . mysql_error());
}

$db_selected = mysql_select_db($dbname, $link); 

if (!$db_selected) {
    die('Can not use ' . $dbname . ': ' . mysql_error());
}
echo 'Thank You!';
$value = $_POST['injury'];

$sql = "INSERT INTO injury (description) VALUES ('$value')";
$sql = "INSERT INTO injury (date) VALUES ('$value')"; 

if(!mysql_query($sql))
{
    die('Error: ' . mysql_error());
}

mysql_close();
?>
