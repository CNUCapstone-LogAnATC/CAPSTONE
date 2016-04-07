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
echo $valueID;
 $sql = "INSERT INTO USER (userID, firstName, lastName, password, userStatus) VALUES ('$valueId', '$valueFN', '$valueLN', '$valueP', '$valueUS')";

//       if($result==0){
//           header("location:index.php");
//       }

if(!mysql_query($sql));
{
    die('Error: ' . mysql_error());
}
mysql_close();
?>
