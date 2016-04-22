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
              $valueId = $_POST['inputID'];
              $valueFN = $_POST['firstName'];
              $valueLN = $_POST['lastName'];
              $valueP = $_POST['Password'];
              $valueUS = $_POST['inputUserType'];
              $valueTM = $_POST['inputTeam'];


 $sql = "INSERT INTO USER (userID, firstName, lastName, password, userStatus, team) VALUES ('$valueId', '$valueFN', '$valueLN', '$valueP', '$valueUS', '$valueTM')";

echo header("location:index.php");
//       }
//       if($result==0){
           
if(!mysql_query($sql));
{
    die('Error: ' . mysql_error());
}
mysql_close();
?>
