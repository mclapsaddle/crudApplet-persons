<?php
session_start(); 
if (!isset($_SESSION['email'])) {
header("Location: login_persons.php");
}
//error_reporting(0);
# connect
require '../database/database.php';
$pdo = Database::connect();

# put the information for the chosen record into variable $results 
$id = $_GET['id'];
$sql = "SELECT * FROM persons WHERE id=" . $id;
$query=$pdo->prepare($sql);
$query->execute();
$result = $query->fetch();
$fname = $result['fname'];
$lname = $result['lname'];
?>
<div class = "container">
<h1>Delete existing User</h1>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="stylesheet.css" />
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<form method='post' action='delete_record_persons.php?id=<?php echo $id ?>'>
	Role: <input class = "input_box" name='role' type='text' value='<?php echo $result['role']; ?>'disabled ><br /><br>
	First Name: <input class = "input_box" name='fname' type='text'value='<?php echo $result['fname']; ?>' disabled><br /><br>
	Last Name: <input class = "input_box" name='lname' type='text' value='<?php echo $result['lname']; ?>'disabled><br /><br>
	Email: <input class = "input_box" name='email' type='text' value='<?php echo $result['email']; ?>' disabled><br /><br>
	Phone: <input class = "input_box" name='phone' type='text' value='<?php echo $result['phone']; ?>' disabled><br /><br>
	Address: <input class = "input_box" name='address' type='text' value='<?php echo $result['address']; ?>'disabled ><br /><br>
	Address 2: <input class = "input_box" name='address2' type='text' value='<?php echo $result['address2']; ?>'disabled ><br /><br>
	City: <input class = "input_box" name='city' type='text' value='<?php echo $result['city']; ?>' disabled><br /><br>
	State: <input class = "input_box" name='state' type='text' value='<?php echo $result['state']; ?>'disabled ><br /><br>
	Zip Code: <input class = "input_box" name='zip_code' type='text' value='<?php echo $result['zip_code']; ?>' disabled><br /><br>
	
  <button class ="button_primary btn-lg btn-primary btn-block"
			 onclick = "location.href = 'delete_record_persons.php'"
               type = "submit" name="delete"> Delete </button>

	<button class ="button_secondary btn-lg btn-secondary btn-block"
			 onclick = "location.href = 'display_list_persons.php'"
                type="button" name="cancel"> Cancel </button>
</div>
</form>
<script> 
	/*function confirm_delete(){
		confirm("Are you sure you want to delete " +  " ?");
		/*if (confirm == true){
		 wdocument.getElementById("display_delete_form_persons.php").action= "delete_record_persons.php";
		 document.getElementById("display_delete_form_persons.php").submit();
	}else {
		
		 window.location.href = "display_list_persons.php";
	}*/
	
	</script>
