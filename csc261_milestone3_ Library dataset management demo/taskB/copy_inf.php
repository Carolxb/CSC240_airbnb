<?php
// Start the session
session_start();
?>
<html>
    <head>
        <center>
            <body>
                <div class="center for-style-8">
                    <img src="UR_logo.png" alt="'UR Logo" width="'498" height="101">
                    <h2> The available copies of the book you're looking for: </h2>

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
 
 $b_id=$_POST['als'];
 $expect_date=$_SESSION['exp_date'];
 session_abort();
 $sql="SELECT * FROM copies WHERE book_ID=$b_id AND copy_ID NOT IN (SELECT copy_ID FROM loanrecord WHERE book_ID=$b_id AND return_date IS NULL AND DATEDIFF(due_date,$expect_date)>=0);";
 $result=$conn->query($sql);
 $sql_m="SELECT count(*) AS cont FROM copies WHERE book_ID=$b_id AND copy_ID NOT IN (SELECT copy_ID FROM loanrecord WHERE book_ID=$b_id AND return_date IS NULL AND DATEDIFF(due_date,$expect_date)>=0);";
 $result_m=$conn->query($sql_m)->fetch_assoc()['cont'];

 if($result_m>0){
 ?>

 <!DOCTYPE html>
 <html>
   <body>
     <table align="center" border="1px" style="width:600px; line-height:40px;">
     <tr>
       
       <th>Book_ID</th>
       <th>Copy_ID</th>
       <th>Library_ID</th>
       <th>Price</th>
       <th>Late return fine(per day)</th>
       
     </tr>
       <?php

        while($row=$result->fetch_assoc()){
        ?>
        <tr>
        <td> <?php echo $row["book_ID"]; ?> </td>
        <td> <?php echo $row["copy_ID"]; ?> </td>
        <td> <?php echo $row["library_ID"]; ?> </td>
        <td> <?php echo $row["price"]; ?> </td>
        <td> <?php echo $row["late_return_fine"]; ?> </td>
        </tr>
        <?php
        }
        ?>
    </table>
    <?php
    }else{
      echo "Sorry, according to the expected borrow date you input, there's no corresponding copy available of the book you search for. Please check if it will available on other date.";

    }
    ?>

    <br>
    <br>
    <a href="borrow_book.html">Go to borrow book</a>
    <a href="return_book.html">Go to return book</a>
    
    <br>
    <br>
    <a href="landing.html">Back to main menu</a>
    <a href="book_search.html">Back to book search</a>

    <br>
    <br>
    <br>
    <a href="signup_login.html">
        <button>Log out</button>
    </a>
  <br> 
    <br>
   </body>
 </html>

 </div>
            </body>
        </center>
    </head>
</html>

 