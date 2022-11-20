<?php
// Start the session

session_start();
?>
<html>
        <center>
            <body>
                <div class="center for-style-8">
                    <img src="UR_logo.png" alt="'UR Logo" width="'498" height="101">
                    <h1> The result of sign out </h1>
    
                    
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
 $user_name=$_POST['user_name'];
 $user_name=!empty($user_name) ? "'$user_name'": "NULL";
 $ssn=$_POST['ssn'];
 $ssn=!empty($ssn) ? "'$ssn'": "NULL";
 
 
 //SQL command
 $sql1="SELECT COUNT(*) AS cou FROM borrower WHERE borrower_name=$user_name AND ssn=$ssn;";
//  echo $sql1;
 $result1=$conn->query($sql1)->fetch_assoc()['cou'];
 $sql0="SELECT COUNT(*) AS u FROM loanrecord WHERE ssn=$ssn AND return_date IS NULL;";
//  echo $sql1;
 $result0=$conn->query($sql0)->fetch_assoc()['u'];
 if ($result1==1){
    if ($result0==0){
    $sql2="DELETE FROM borrower WHERE borrower_name=$user_name AND ssn=$ssn;";
    $result2=$conn->query($sql2);
    echo "You've successfully signed out this account."; 
    ?>

    <br>
    <a href="signup_login.html" >Out the system</a>
    <br>
    <?php
    }else{
        echo "Sorry. Since you haven't returned the book you borrowed, you cannot sign out this account.";
    ?>
        <br>
        <br>
        <a href="landing.html">Back to main menu</a>
        <br>
        <br>
        <br>
        <a href="signup_login.html">
            <button>Log out</button>
        </a>
    <?php
    }
 }else{
   echo "Sorry, There's something wrong with your input information. Please try again or sign up first.";
   ?>
   <br>
   <a href="sign_out.html">Back to sign out page</a>
   <br>

   <?php
 }
 $conn->close();
?>

 


 </body>
 </center>
 </html>

                 
