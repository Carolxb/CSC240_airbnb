<?php
// Start the session
session_start();
?>

<html>
        <center>
            <body>
                <div class="center for-style-8">
                    <img src="UR_logo.png" alt="'UR Logo" width="'498" height="101">
                    <h1> Borrow Book </h1>
    
                    
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
 $sql0="SELECT MAX(record_ID) AS max_v FROM loanrecord;";
 $result0=$conn->query($sql0)->fetch_assoc()['max_v'];
 $record_id=$result0+1;
 $book_id=$_POST['book_ID'];
 $book_id=!empty($book_id) ? "'$book_id'": "NULL";
 $copy_id=$_POST['copy_ID'];
 $copy_id=!empty($copy_id) ? "'$copy_id'": "NULL";
 $library_id=$_POST['library_ID'];
 $library_id=!empty($library_id) ? "'$library_id'": "NULL";
 $ssn=$_POST['ssn'];
 $ssn=!empty($ssn) ? "'$ssn'": "NULL";
 $borrow_d=$_POST['borrowed_date'];
 $borrow_d=!empty($borrow_d) ? "'$borrow_d'": "NULL";
 $due_d=$_POST['due_date'];
 $due_d=!empty($due_d) ? "'$due_d'": "NULL";
 $return_date="NULL";

 //SQL command
 $sql1="SELECT COUNT(*) AS cnt FROM copies WHERE book_ID=$book_id AND library_ID=$library_id AND copy_ID=$copy_id AND NOT EXISTS (SELECT book_ID, copy_ID FROM loanrecord WHERE book_ID = $book_id AND copy_ID = $copy_id AND return_date IS NULL);";
 $result1=$conn->query($sql1)->fetch_assoc()['cnt'];
 $sql_c_s="SELECT COUNT(*) AS cnt1 FROM borrower WHERE ssn=$ssn;";
 $check_ssn=$conn->query($sql_c_s)->fetch_assoc()['cnt1'];
 $dif=strcmp($due_d, $borrow_d);
  
    if ($check_ssn==1){
      if($dif>=0){
        if ($result1==1){
          $sql2="INSERT INTO loanrecord VALUES ($record_id,$book_id,$copy_id,$library_id,$ssn,$borrow_d,$due_d,$return_date);";
          $result2=$conn->query($sql2);
          if ($result2===TRUE){
            echo "New record created successfully! Your record ID for this loanrecord is $record_id, and your due date is $due_d."; 
          
          }else{
            echo "Failed to add new record.";
          }
        }else{
          echo "Sorry, you can't borrow this book since it's not available. Please check the information you input.";
          ?>
          <br>
          <?php
          echo "If the info you input are corresponding to the copy result you search, it means the book copy hasn't been returned.";
        }
      }else{
        echo "The borrowed_date and due_date you input are not reasonable. Please back to borrow book and input again.";
      }
    }else{
      echo "Sorry, your ssn is not in our account list. Please try again.";
    }
  // }else{
  //   echo "Sorry, the library you input does not have this copy. Please try another library again.";
  // }
 $conn->close();
?>

 

 <br>
 <br>
 <a href="landing.html">Back to main menu</a>
 <a href="borrow_book.html">Back to borrow book</a>
 <a href="return_book.html">Go to return book</a>
 <br>
 <br>   
  <br>
  <a href="signup_login.html">
      <button>Log out</button>
  </a>

 </body>
 </center>
 </html>

                 
