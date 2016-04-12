<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";
    $tbl_name = "User";
    $trainer = "trainer";
    $ustatus;
   
    $link = mysql_connect($servername, $username, $password, $dbname);

    // Connect to server and select databse.
    mysql_connect("$servername", "$username", "$password")or die("cannot connect"); 
    mysql_select_db("$dbname")or die("cannot select DB");

    //username and password sent from form
   
  
  
       
        $myusername=$_POST['inputID'];
        $mypassword=$_POST['Password'];
       // echo "2";
   
        //To Protect MySQLinjection
        $myusername = stripslashes($myusername);
        $mypassword = stripslashes($mypassword);
        $myusername = mysql_real_escape_string($myusername);
        $mypassword = mysql_real_escape_string($mypassword);
        $sql="SELECT * FROM $tbl_name WHERE userID='$myusername' and password='$mypassword'";
        $result=mysql_query($sql);
      
        // Mysql_num_row is counting table row
        $count=mysql_num_rows($result);
        $sqlstatus = "SELECT userStatus FROM $tbl_name WHERE userID='$myusername' and password='$mypassword'";
            $status = mysql_query($sqlstatus);
            //$row = mysql_fetch_object($status);
            
        //echo $myusername;
        //echo $mypassword;
      
        // If result matched $myusername and $mypassword, table row must be 1 row
        if($count==1){

            // Register $myusername, $mypassword and redirect to file apporpiate home page
            $_session["userID"]= $myusername;
            $_session["mypassword"]= $mypassword; 
           
            while ($row = mysql_fetch_object($status )) {
                              
                    $ustatus= $row->userStatus;
                }
            
        
            if( $ustatus=="Trainer"){
                header("location:TrainerHome.php");
                }
            else{
                    header("location:Athletehome.php");
               
                }
//            else{
//                header("location:index.php");
//                
//            }
        //}
        }
//        else {
//            header("location:index.php");
//            echo "Wrong Username or Password";
//            }

?>
