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
$fname = $_POST['fname'];
$sql = "SELECT fname FROM persons WHERE id = '$id'";
foreach ($pdo->query($sql) as $row) {
	$str = "";
    $str .= $row['fname'] . $row['lname'];
	}
echo $id;
echo $fname;
echo "<script> alert 'Are you sure you want to delete? <br>'";
	

# 2. assign user info to a variable
$id = $_GET['id'];

echo "id: " . $id;
# 3. assign MySQL query code to a variable
echo $id;
$sql = "DELETE FROM persons WHERE $id = id";

# 4. update the message in the database$pdo->query($sql); # execute the query*/
echo"<p>Your info has been deleted</p> <br>";
echo "<a href='display_list_persons.php'>Back to list</a>";




/*
#confirm delete 
	echo "<script> alert 'Are you sure you want to delete '. $str .'? <br>'";
	
	
?>
<div class = "container">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheet.css" />
<form method = "post">

	<input class ="button_primary btn-lg btn-primary btn-block"
			 onclick = "delete_user()"
                type="button" value = "Delete" name="delete_user">
                
	
	<button class ="button_secondary btn-lg btn-secondary btn-block"
			 onclick = "location.href = 'display_list_persons.php'"
                type="button" name="cancel"> Cancel </button>
				
</div>
<script> 
<?php 
function delete_user(){
/*if(array_key_exists('submit',$_POST)){
   $pdo = Database::connect();
$id = $_GET['id'];


$sql = "DELETE FROM persons WHERE $id = id";

# 4. update the message in the database
$pdo->query($sql); # execute the query
echo "<p>Your info has been deleted</p>";
echo "<a href='display_list_persons.php'>Back to list</a>";

}
?>
</script>
</form>*/



