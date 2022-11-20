<?php
// Start the session
session_start();
?>
<html>
            <body>
                <div class="center for-style-8">
                    <img src="UR_logo.png" alt="'UR Logo" width="'498" height="101">
                    <h4> These are the library information. Please check and remember the corresponding library ID. They would be used in your book search and borrowing procecss.</h4>
    
                    
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
 
 
 $sql="SELECT * FROM library;";
 $result=$conn->query($sql);
 ?>

 <!DOCTYPE html>
 <html>
   <title>
     <head>Release result
     </head>
   </title>
   <body>
     <table align="center" border="1px" style="width:700px; line-height:30px;">
     <tr>
       <t>
       
       <th>Library_ID</th>
       <th>Library Name</th>
       <th>Address</th>
       <th>Zipcode</th>

       </t>
       <?php
        while($row=$result->fetch_assoc()){
        ?>
        <tr>
        <td> <?php echo $row["library_ID"]; ?> </td>
        <td> <?php echo $row['library_name']; ?> </td>
        <td> <?php echo $row['address']; ?> </td>
        <td> <?php echo $row['zipcode']; ?> </td>
        </tr>
        <?php
        }
        // conn->close();
        ?>
    </table>
    </html>
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