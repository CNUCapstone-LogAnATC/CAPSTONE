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
      
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Injury Log</title>

    
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">

    
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="Trainerhome.php">Home</a>
          <a class="blog-nav-item" href="Injurylog.php">Injury Log</a>
          <a class="blog-nav-item" href="index.php">Sign out</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Injury Log</h1>
        <p class="lead blog-description">Log of injuries.</p>
      </div>

      <h2 class="sub-header">Section title</h2>
        
<form name="filter_form" method="post" action="Injurylog.php">
    
Filter:     <input type="text" name="valueToFilter" ><br><br>
            <input type="submit" name="filter" value="Filter"><br><br>
               
               
               
               
               </form>
        <script>
        $(function() {
            $( "#sortable" ).sortable();
            $( "#sortbale" ).disableSelection();
        });
        
        </script>
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
              <ul><a href="#">March 2014</a></ul>
              <ul><a href="#">February 2014</a></ul>
              <ul><a href="#">January 2014</a></ul>
              <ul><a href="#">December 2013</a></ul>
              <ul><a href="#">November 2013</a></ul>
              <ul><a href="#">October 2013</a></ul>
              <ul><a href="#">September 2013</a></ul>
              <ul><a href="#">August 2013</a></ul>
              <ul><a href="#">July 2013</a></ul>
              <ul><a href="#">June 2013</a></ul>
              <ul><a href="#">May 2013</a></ul>
              <ul><a href="#">April 2013</a></ul>
            </ol>
          </div> 
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div>

 

    

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


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

        
