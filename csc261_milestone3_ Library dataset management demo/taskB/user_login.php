<?php
// Start the session

session_start();
?>
<html>
        <center>
            <body>
                <div class="center for-style-8">
                    <img src="UR_logo.png" alt="'UR Logo" width="'498" height="101">
                    <h1> Log in </h1>
    
                    
                </div>
            



<?php


$server = "localhost";
$user = "xlou5";
$password = "ZAZrmATB";
$db = "xlou5_1";

$conn = new mysqli($server, $user, $password, $db);

 if($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 else{}
 
 //loading the input book info
 $user_name=$_POST['name'];
 $user_name=!empty($user_name) ? "'$user_name'": "NULL";
 $ssn=$_POST['ssn'];
 $ssn=!empty($ssn) ? "'$ssn'": "NULL";
 $birthday=$_POST['birthday'];
 $birthday=!empty($birthday) ? "'$birthday'": "NULL";
 
 //SQL command
 $sql1="SELECT COUNT(*) AS cou FROM borrower WHERE borrower_name=$user_name AND ssn=$ssn AND birthday=$birthday;";
//  echo $sql1;
 $result1=$conn->query($sql1)->fetch_assoc()['cou'];
 if ($result1==1){
    echo "You've successfully logged in..."; 
    ?>

    <br>
    <a href="landing.html" >Enter main page</a>
    <br>
    <?php
 }else{
   echo "Sorry, there's something wrong with your input information. Please try again or sign up first.";
   ?>
   <br>
   <a href="signup_login.html">Back to sign up and log in menu</a>
   <br>

   <?php
 }
 $conn->close();
?>

 

 </body>
 </center>
 </html>

                 
