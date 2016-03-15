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

    <title>Jumbotron Template for Bootstrap</title>

    
    <link href="cover.css" rel="stylesheet">


  </head>

  <body>
<div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="AthleteHome.html">Home</a>
          <a class="blog-nav-item" href="Athleteinjury">InjuryInfo</a>
          <a class="blog-nav-item" href="index.html">Sign out</a>
        </nav>
      </div>
    </div>
    <div class="jumbotron">
      <div class="container">
        <h1>
          <?php
            $name = $_POST["username"];
            echo "Hello, " . $name;
          ?>
    
         </h1>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Injury</h2>
          <form action="write.php" method="post">
  <fieldset>
    <legend>Injury information:</legend>
    Date:<br>
    <input type="date" name="Date" value=""><br>
    Injury:<br>
    <textarea name="injury" cols="50" rows="5">
Enter Injury Information...</textarea><br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form>
        </div>
        <div class="col-md-4">
          <h2>Team Information</h2>
          <p>Team meeting is scheduled for today </p>
       </div>
        <div class="col-md-4">
          <h2>Health Tips</h2>
            <p>Avoid to much salt in your daily diet</p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


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
