
<?php
session_start(); 
if (!isset($_SESSION['email'])) {
header("Location: login_persons.php");
}
//error_reporting(0);

# This process delete a record. There is no display

# 1. connect to database
require '../database/database.php';
$pdo = Database::connect();

# 2. assign user info to a variable
$id = $_GET['id'];
$sql = "SELECT * FROM persons WHERE id=" . $id;
$query=$pdo->prepare($sql);
$query->execute();
$result = $query->fetch();
$fname = $result['fname'];
$lname = $result['lname'];
	//echo '<script> confirm("Are you sure you want to delete")</script>'; 
	
echo "<script>";
 echo "confirm('Are you sure you want to delete $fname $lname?')";
  echo "</script>";



/*echo "<p id='demo'></p>";

echo"<script>";
echo "function myFunction() {";
echo  " var txt;";
 echo "var r = confirm('Press a button!');";
echo " if (r == true) {";
 echo  " txt = 'You pressed OK!';";
echo  "} else {";
  echo " txt = 'You pressed Cancel!';";
echo " }";
echo  "document.getElementById('demo').innerHTML = txt;";
echo "}";
echo "</script>";*/
# 3. assign MySQL query code to a variable
/*$sql = "DELETE FROM persons WHERE $id = id";*/

# 4. update the message in the database
$pdo->query($sql); # execute the query*/
echo "<p>Your info has been deleted</p><br>";
echo "<a href='display_list_persons.php'>Back to list</a>";
