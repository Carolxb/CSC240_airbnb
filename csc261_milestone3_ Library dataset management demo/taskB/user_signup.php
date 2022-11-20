<?php
// Start the session
session_start();
?>
<html>
        <center>
            <body>
                <div class="center for-style-8">
                    <img src="UR_logo.png" alt="'UR Logo" width="'498" height="101">
                    <h1> Sign up </h1>
    
                    
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
 $email=$_POST['email'];
 $email=!empty($email) ? "'$email'": "NULL";
 $phone=$_POST['phone'];
 $phone=!empty($phone) ? "'$phone'": "NULL";
 
 //SQL command
 $sql1="SELECT COUNT(*) AS cn FROM borrower WHERE ssn=$ssn;";
 $result1=$conn->query($sql1)->fetch_assoc()['cn'];
 if ($result1==0){
  $sql2="INSERT INTO borrower VALUES ($user_name,$ssn,$birthday,$email,$phone);";
  $result2=$conn->query($sql2);
  if ($result2===TRUE){
    echo "New record created successfully! You have been signed up a new account. You can log in with this new accuount."; 
    
   }else{
     echo "Failed to create this new account. Try again please.";
   }
 }else{
   echo "Sorry, there seems already exist an account with this ssn.";
 }
 $conn->close();
?>

 

 <br>
 <a href="signup_login.html">Back to sign_up and log_in menu</a>
 <br>

 </body>
 </center>
 </html>

                 
