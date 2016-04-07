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

    <title>AppAnATC! New User</title>

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">

    
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="#">Features</a></li>
                  
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">CREATE USER</h1>
         
            
     

      <form class="form-createUser" method='post' action= 'newuserwrite.php'>
        <h2 class="form-createUser-heading">Please Create New User</h2>
        <label for="inputIDnumber" class="sr-only">ID</label>
        <input type="text"  name="inputID" required autofocus>
          <br>
          <br>
        <label for="firstName" class="sr-only">First Name</label>
        <input type="text"  name="firstName" required>
          <br>
          <br>
        <label for="lastName" class="sr-only">Last Name</label>
        <input type="text"  name="lastName" required>
          <br>
          <br>
        <label for="Password" class="sr-only">Password</label>
        <input type="password" name="Password" required>
          <br>
          <br>
        <label for="inputUserType" class="sr-only">UserType</label>
        <input type="text"  name="inputUserType" required>
          <br> 
          <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" value="Login">Sign in</button>
      </form>
         
              
           


     <?php
        if (isset($_POST['submit'])) {
            include 'php/login.php';
        }
              
              
            
        ?>
          </div>

          

        </div>

      </div>

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
