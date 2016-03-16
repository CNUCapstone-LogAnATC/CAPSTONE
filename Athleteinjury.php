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
$sql="SELECT * FROM injury";
$records = mysql_query($sql);

if(!mysql_query($sql))
{
    die('Error: ' . mysql_error());
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>AthleteInjuryLog</title>

    <link href="cover.css" rel="stylesheet">

    
  </head>
  <body>
      <h1>Hello, Username!</h1>
      <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="AthleteHome.html">Home</a>
          <a class="blog-nav-item" href="Athleteinjury">InjuryInfo</a>
          <a class="blog-nav-item" href="index.html">Sign out</a>
        </nav>
      </div>
    </div>
    
 <h2 class="sub-header">Injury log</h2>
 <table class="table-responsive" width="600" border="10" cellpadding="10" cellspacing="1">
   <tr>
    <th>injuryID</th>
    <th>Descritption</th>
    <th>Date</th>
    <th>Treatment</th>
    </tr>  
    
 <?php
    
while ($Injury=mysql_fetch_array($records))
{
    echo "<tr>";
echo "<td>" . $Injury['injuryID'] ."</td>";
echo "<td>" . $Injury['description'] ."</td>";
echo "<td>" . $Injury['date'] ."</td>";
echo "<td>" . $Injury['treatment'] ."</td>";

    echo "</tr>";
}
?>
        
        
        
        </table>
          
    
  </body>
</html>
