<?php
// Start the session
session_start();
?>
<html>
        <center>
            <body>
                <div class="center for-style-8">
                    <img src="UR_logo.png" alt="'UR Logo" width="'498" height="101">
                    <h1> The result of Book Return </h1>
    
                    
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
 $record_id=$_POST['record_ID'];
 $record_id=!empty($record_id) ? "'$record_id'": "NULL";

 $return_d=$_POST['return_date'];
 $return_d=!empty($return_d) ? "'$return_d'": "NULL";
 
 
 //SQL command

 $sql_null1="SELECT count(*) AS ct1 from loanrecord where record_ID=$record_id;";
 $result_null1=$conn->query($sql_null1)->fetch_assoc()['ct1'];
 if($result_null1>0){

 $sql0="SELECT book_ID, copy_ID, ssn, library_ID, borrowed_date, due_date, DATEDIFF($return_d,due_date)AS date_diff, DATEDIFF($return_d,borrowed_date) AS date_diff1 from loanrecord WHERE record_ID=$record_id;";
 
 $result_bookid=$conn->query($sql0)->fetch_assoc()['book_ID'];
 $result_copyid=$conn->query($sql0)->fetch_assoc()['copy_ID'];
 $date_diff=$conn->query($sql0)->fetch_assoc()['date_diff'];
 $date_diff1=$conn->query($sql0)->fetch_assoc()['date_diff1'];
 $sql1="SELECT late_return_fine from copies WHERE book_ID=$result_bookid AND copy_ID=$result_copyid;";
//  $result0=$conn->query($sql0)->fetch_assoc()['due_date'];
 $result1=$conn->query($sql1)->fetch_assoc()['late_return_fine'];
//  $date_diff=DIFFDATE($return_d,$result0);
//  echo $date_diff;
 $total_fine=$result1*$date_diff;
 $sql_null="SELECT count(*) AS ct from loanrecord where record_ID=$record_id AND return_date IS NULL;";
 $result_null=$conn->query($sql_null)->fetch_assoc()['ct'];
 
    if($date_diff1>=0){
        if($result_null==1){
            $sql="UPDATE loanrecord SET return_date = $return_d WHERE record_ID=$record_id AND return_date IS NULL;";
            $result=$conn->query($sql);
            echo "The record updated successfully!"; 
            if($date_diff<0){
                echo "Thank you for returning the book earlier than the due date. Have a wonderful day! ";
            }else if($date_diff==0){
                echo "Thank you for returning the book on time. Have a wonderful day!";
            }else{
                echo "Sorry you return this book late for $date_diff days, please pay for $total_fine.";
            }
        }else{
            echo "Failed to update the record. The book may have been returned. Please check.";
        }

    }else{
        echo "You input an unreasonable return date. Please reinput.";
    }
}else{
    echo " Your record ID does not exist. Please check and reinput.";
}

 $conn->close();
?>


 <br>
 <br>
 <a href="landing.html">Back to main menu</a>
 <a href="borrow_book.html">Go to borrow book</a>
 <a href="return_book.html">Back to return book</a>
 <br>

 <br>
 <br>
 <a href="signup_login.html">
     <button>Log out</button>
 </a>

 </body>
 </center>
 </html>

                 
