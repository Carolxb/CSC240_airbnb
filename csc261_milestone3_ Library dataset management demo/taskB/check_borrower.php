<?php
// Start the session
session_start();
?>
<html>
            <body>
                <div class="center for-style-8">
                    <img src="UR_logo.png" alt="'UR Logo" width="'498" height="101">
                    <h3> This is the whole existed user information list. </h3>
    
                    
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
 
 
 $sql="SELECT * FROM borrower;";
 $result=$conn->query($sql);
 ?>

 <!DOCTYPE html>
 <html>
   <title>
     <head>Release result
     </head>
   </title>
   <body>
     <table align="center" border="1px" style="width:600px; line-height:40px;">
     <tr>
       <t>
       
       <th>SSN</th>
       <th>Borrowed_Name</th>
       <th>Birthday</th>
       <th>Email</th>
       <th>phone</th>
       </t>
       <?php
        while($row=$result->fetch_assoc()){
        ?>
        <tr>
        
        <td> <?php echo $row['ssn']; ?> </td>
        <td> <?php echo $row['borrower_name']; ?> </td>
        <td> <?php echo $row['birthday']; ?> </td>
        <td> <?php echo $row['email']; ?> </td>
        <td> <?php echo $row['phone']; ?> </td>
        </tr>
        <?php
        }
        // conn->close();
        ?>
    </table>
    <br>
    <br>
    <a href="Manage_record.html">Back to resource view</a>
    <br>
    <br>
    <a href="landing.html">Back to main menu</a>
    <br>
    <br>
    <br>
    <a href="signup_login.html">
        <button>Log out</button>
    </a>

    
    <br>
   </body>
 </html>

 