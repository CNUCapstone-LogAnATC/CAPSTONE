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
 
$sql = "SELECT injury.description, injury.date, injury.treatment, user.firstName, user.lastName FROM injury INNER JOIN user on injury.UserID=user.UserID ORDER BY date DESC LIMIT 10";
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
    <title>Home</title>

    <link href="cover.css" rel="stylesheet">
  </head>
  <body>
      
      <center>
    <h1>
          <?php
            $name = $_POST["username"];
            echo "Hello, " . $name;
          ?>
          </h1>
          <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="Trainerhome.php">Home</a>
          <a class="blog-nav-item" href="Injurylog.php">Injury Log</a>
          <a class="blog-nav-item" href="index.php">Sign out</a>
        </nav>
      </div>
    </div>

      <h2><a href="Injurylog.php">Recent Injuries</a></h2>
          
          
<table class="sortable" width="600" border="10" cellpadding="10" cellspacing="1">
   
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Description</th>
    <th>Date</th>
    
    </tr>  
              
              
<?php
    
while ($Injury=mysql_fetch_array($records))
{
    echo "<form action=injurylog.php method=post>";
    echo "<tr>";
    
echo "<td>"  . $Injury['firstName'] . " </td>";
echo "<td>"  . $Injury['lastName'] . " </td>";
echo "<td>"  . $Injury['description'] . " </td>";
echo "<td>"  . $Injury['date'] . " </td>";
    echo "</tr>";
    echo "</form>";
}
?>
          </table>
      
      <h2>Calender</h2>

<script language="javascript" type="text/javascript">
var day_of_week = new Array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
var month_of_year = new Array('January','February','March','April','May','June','July','August','September','October','November','December');

//  DECLARE AND INITIALIZE VARIABLES
var Calendar = new Date();

var year = Calendar.getFullYear();     // Returns year
var month = Calendar.getMonth();    // Returns month (0-11)
var today = Calendar.getDate();    // Returns day (1-31)
var weekday = Calendar.getDay();    // Returns day (1-31)

var DAYS_OF_WEEK = 7;    // "constant" for number of days in a week
var DAYS_OF_MONTH = 31;    // "constant" for number of days in a month
var cal;    // Used for printing

Calendar.setDate(1);    // Start the calendar day at '1'
Calendar.setMonth(month);    // Start the calendar month at now


/* VARIABLES FOR FORMATTING
NOTE: You can format the 'BORDER', 'BGCOLOR', 'CELLPADDING', 'BORDERCOLOR'
      tags to customize your caledanr's look. */

var TR_start = '<TR>';
var TR_end = '</TR>';
var highlight_start = '<TD WIDTH="30"><TABLE CELLSPACING=0 BORDER=1 BGCOLOR=DEDEFF BORDERCOLOR=CCCCCC><TR><TD WIDTH=20><B><CENTER>';
var highlight_end   = '</CENTER></TD></TR></TABLE></B>';
var TD_start = '<TD WIDTH="30"><CENTER>';
var TD_end = '</CENTER></TD>';

/* BEGIN CODE FOR CALENDAR
NOTE: You can format the 'BORDER', 'BGCOLOR', 'CELLPADDING', 'BORDERCOLOR'
tags to customize your calendar's look.*/

cal =  '<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 BORDERCOLOR=BBBBBB><TR><TD>';
cal += '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=2>' + TR_start;
cal += '<TD COLSPAN="' + DAYS_OF_WEEK + '" BGCOLOR="#EFEFEF"><CENTER><B>';
cal += month_of_year[month]  + '   ' + year + '</B>' + TD_end + TR_end;
cal += TR_start;

//   DO NOT EDIT BELOW THIS POINT  //

// LOOPS FOR EACH DAY OF WEEK
for(index=0; index < DAYS_OF_WEEK; index++)
{

// BOLD TODAY'S DAY OF WEEK
if(weekday == index)
cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;

// PRINTS DAY
else
cal += TD_start + day_of_week[index] + TD_end;
}

cal += TD_end + TR_end;
cal += TR_start;

// FILL IN BLANK GAPS UNTIL TODAY'S DAY
for(index=0; index < Calendar.getDay(); index++)
cal += TD_start + '  ' + TD_end;

// LOOPS FOR EACH DAY IN CALENDAR
for(index=0; index < DAYS_OF_MONTH; index++)
{
if( Calendar.getDate() > index )
{
  // RETURNS THE NEXT DAY TO PRINT
  week_day =Calendar.getDay();

  // START NEW ROW FOR FIRST DAY OF WEEK
  if(week_day == 0)
  cal += TR_start;

  if(week_day != DAYS_OF_WEEK)
  {

  // SET VARIABLE INSIDE LOOP FOR INCREMENTING PURPOSES
  var day  = Calendar.getDate();

  // HIGHLIGHT TODAY'S DATE
  if( today==Calendar.getDate() )
  cal += highlight_start + day + highlight_end + TD_end;

  // PRINTS DAY
  else
  cal += TD_start + day + TD_end;
  }

  // END ROW FOR LAST DAY OF WEEK
  if(week_day == DAYS_OF_WEEK)
  cal += TR_end;
  }

  // INCREMENTS UNTIL END OF THE MONTH
  Calendar.setDate(Calendar.getDate()+1);

}// end for loop

cal += '</TD></TR></TABLE></TABLE>';

//  PRINT CALENDAR
document.write(cal);

//  End -->
          </script>
    <h2>Treatment</h2>
    <h2>Schedule</h2>
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
</center>
<br/><div style="clear:both"></div><div><a target="_blank" href="http://www.htmlbestcodes.com/"><span style="font-size: 8pt; text-decoration: none">HTML Best Codes</span></a></div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

        
