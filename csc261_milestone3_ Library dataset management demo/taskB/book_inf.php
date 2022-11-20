<?php
// Start the session
session_start();
?>
<html>
        <center>
            <body>
                <div class="center for-style-8">
                    <img src="UR_logo.png" alt="'UR Logo" width="'498" height="101">
                    <h1> The result of Book search </h1>
                    <h5> Book search result with unique book ID:</h5>
    
                    
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
 $book_name=$_POST['book_name'];
 $book_name=!empty($book_name) ? "'$book_name'": "NULL";
 $author=$_POST['author'];
 $author=!empty($author) ? "'$author'": "NULL";
 $pub_year=$_POST['pub_year'];
 $pub_year=!empty($pub_year) ? "'$pub_year'": "NULL";
 $expected_date=$_POST['expected_date'];
 $expected_date=!empty($expected_date) ? "'$expected_date'": "NULL";
 $_SESSION['exp_date']=$expected_date;
 
 //SQL command
 $sql="SELECT * FROM book WHERE book_name=$book_name and author=$author and pub_year=$pub_year;";
 $result=$conn->query($sql);
 $res_rows = $result->num_rows;

 ?>

<form method="post" action="copy_inf.php">
<?php

if($res_rows>0){
  ?>
  <select name="als">
  <?php
  while($row=$result->fetch_assoc()){
    $id=$row["book_ID"];
    $option = "<option value =\"" . $id . "\">" . $id . "--" . $row["book_name"] . "--" . $row["author"] .  "--" . $row["pub_year"] . "--" . $row["type_g"] . "--" . $row["langua"] ."</option>";
    echo $option;
  }
  ?>
  </select>
  <br>
  <br>
     <button type="submit" class="btn btn-primary">Go to see available copies</button>
  <br>
  
<?php
}else{
  echo "There's no matched book you search for. Please back to book search and reinput.";
}
$conn->close();
?>

</select>

 </form>
 

 <br>
  <a href="book_search.html">Back to book search</a>
 <br> 

 <br>
 <a href="landing.html">Back to main menu</a>
 <br>




 </body>
 </center>
 </html>

                 
