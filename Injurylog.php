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

if (isset($_POST['update']))
{
    $UpdateQuery = "UPDATE injury SET treatment='$_POST[treatment]' WHERE injuryID='$_POST[hidden]'";
    mysql_query($UpdateQuery, $link);
};
$sql = "SELECT injury.injuryID, injury.description, injury.date, injury.treatment, user.firstName, user.lastName FROM injury INNER JOIN user on injury.UserID=user.UserID";
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

    <title>Injury Log</title>

    
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
                <li><a  href="logout.php">Sign out</a></li>
            </ul>
        </nav>
     
<div id="content">
      <h2>Injury log </h2>
        
<p>Search</p>
    <form name="searchDB" method="post" action="searchresults.php">
    <input name="search" type="text" size="40" maxlength="50"/>
    <input type="submit" name="submit" value="Search" />
    
    </form>
<table class="sortable" width="600" border="10" cellpadding="10" cellspacing="1">
   
    <tr>
    <th>injuryID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Description</th>
    <th>Date</th>
    <th>Treatment</th>
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
    echo "<form action=injurylog.php method=post>";
    echo "<tr>";
    
echo "<td>"  . $Injury['injuryID'] . " </td>";
echo "<td>"  . $Injury['firstName'] . " </td>";
echo "<td>"  . $Injury['lastName'] . " </td>";
echo "<td>"  . $Injury['description'] . " </td>";
echo "<td>"  . $Injury['date'] . " </td>";
echo "<td>" . "<input type=text name=treatment value= " . $Injury['treatment'] ." </td>";
echo "<td>" . "<input type=hidden name=hidden value=" . $Injury['injuryID'] . " </td>";
    echo "<td>" . "<input type=submit name=update value=update" . " </td>";
    echo "</tr>";
    echo "</form>";
}
?>
        
        
        
        </table>

        
            
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <ul><a href="#">2016</a></ul>
              <ul><a href="#">2015</a></ul>
              <ul><a href="#">2014</a></ul>
              <ul><a href="#">2013</a></ul>
              <ul><a href="#">2012</a></ul>
            </ol>
          </div> 
          
    

 

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

        
