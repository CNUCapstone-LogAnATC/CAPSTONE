<?php
session_start();
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


$sql = "SELECT user.firstName, user.lastName, user.team FROM user WHERE user.team IS NOT NULL";
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
      <script src="sorttable.js"></script>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>List of Athletes</title>

    
    <!-- Custom styles for this template -->
<link href="show.css" type="text/css" rel="stylesheet"> 
    
  </head>

  <body>
      <div id="wrapper">
      <header>
       <h1>
            <?php
            echo "Hello, " .$_SESSION['UserID']; 
            ?> 
          </h1>
</header>
      <!-- <div class="container"> -->
        <nav>
            <ul>
                <li><a  href="Trainerhome.php">Home</a></li>
                <li><a  href="Injurylog.php">Injury Log</a></li>
                <li><a href="Listathletes.php">List of Athletes</a></li>
                <li><a  href="logout.php">Sign out</a></li>
            </ul>
        </nav>
     
<div id="content">
      <h2>List of Athletes</h2>
<table class="sortable" width="600" border="10" cellpadding="10" cellspacing="1">
   
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Team</th>
    </tr>  
    
       
 <!--   $(document).ready(function() 
    { 
        $("#myTable").tablesorter(); 
    } 
);  
    
    $(document).ready(function() 
    { 
        $("#myTable").tablesorter( {sortList: [[0,0], [1,0]]} ); 
    } 
); -->

 <?php
    
while ($Injury=mysql_fetch_array($records))
{
    echo "<form action=Listathlets.php method=post>";
    echo "<tr>";
    
echo "<td>"  . $Injury['firstName'] . " </td>";
echo "<td>"  . $Injury['lastName'] . " </td>";
echo "<td>"  . $Injury['team'] . " </td>";
    
    echo "</tr>";
    echo "</form>";
}
?>
        
        
        
        </table>

      </div>

    <footer>
        Copyright &copy; APPanATC<br>
          <a href="mailto:stevie.boose.12@cnu.edu" style="color:black">Stevie.boose.12@cnu.edu</a>
          <a href="mailto:ryan.stutzman.11@cnu.edu" style="color:black">Ryan.stutzman.11@cnu.edu</a>
      </footer>

      </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
