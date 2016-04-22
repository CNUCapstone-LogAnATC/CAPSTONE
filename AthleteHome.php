<?php
            session_start();
     //if (isset($_SESSION['UserID'])){
        
    //}
   // else {
      //  echo 'Please Log in.';
   // }
            
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

    <title>Athlete Home</title>

    
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
                <li><a  href="AthleteHome.php">Home</a></li>
                <li><a  href="Athleteinjury.php">InjuryInfo</a></li>
                <li><a href="exercises.html">Exercises</a></li>
                <li><a  href="logout.php">Sign out</a></li>
            </ul>
        </nav>
    
    
        <div id="content">
          <h2>Injury</h2>
            <div id="injury">
          <form action="write.php" method="post">
  <fieldset>
    <legend>Injury information:</legend>

    Injury:<br>
    <!-- <input type="text" name="ID"> -->
    <textarea name="injury" cols="50" rows="5">
</textarea><br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form>
      </div>
            
    
          <h3>Team Information</h3>
          <p>Team meeting is scheduled for today </p>
       
        
          <h3>Health Tips</h3>
            <p>Avoid to much salt in your daily diet</p>
        

      <hr>
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
