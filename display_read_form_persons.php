<?php
session_start(); 
if (!isset($_SESSION['email'])) {
header("Location: login_persons.php");
}
# connect
require '../database/database.php';
$pdo = Database::connect();

# put the information for the chosen record into variable $results 
$id = $_GET['id'];
$sql = "SELECT * FROM persons WHERE id=" . $id;
$query=$pdo->prepare($sql);
$query->execute();
$result = $query->fetch();
error_reporting(0);
?>


  <div class = "container">
<h1>Register New Person</h1>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="stylesheet.css" />
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<form method='post' action='display_list_persons.php'>
<label for"role"> Select role: </label>
	<select class = "input_box" name = "role" id = "role" value='<?php echo $result['role']; ?>'>
		<option value = "user"selected > User</option>
		<option value = "admin" >Admin</option>
		
	</select><br>
	First Name: <input class = "input_box"  name='fname' type='text'id='fname' placeholder= 'Jane' value='<?php echo $result['fname']; ?>'> <br /><br>
	Last Name: <input class = "input_box"  name='lname' type='text' id='lname'  placeholder= 'Doe'value='<?php echo $result['lname']; ?>'><br /><br>
	Email:  <input class = "input_box" name='email' type='text'  placeholder= 'email@example.com'value='<?php echo $result['email']; ?>'><br /><br>
	Phone: <input class = "input_box" name='phone' type='text' placeholder= '555-555-5555' value='<?php echo $result['phone']; ?>' ><br /><br>
	Address: <input class = "input_box" name='address' type='text'  placeholder= '123 Main St.'value='<?php echo $result['address']; ?>'><br /><br>
	Address 2: <input class = "input_box"  name='address2' type='text' placeholder= 'Apt #1'value='<?php echo $result['address2']; ?>' ><br /><br>
	City: <input class = "input_box" name='city' type='text'  placeholder= 'Boston' value='<?php echo $result['city']; ?>'><br /><br>
	State: <input class = "input_box" name='state' type='text'  placeholder= 'MA'value='<?php echo $result['state']; ?>'><br /><br>
	Zip Code: <input class = "input_box" name='zip_code' type='text'  placeholder= '12345' value='<?php echo $result['zip_code']; ?>'><br /><br>
	Password: <input class = "input_box" name='password' type='password' placeholder= '****************' ><br /><br>
	Confirm Password: <input class = "input_box"  name='confirmPassword' type='password'  placeholder= '****************' ><br /><br>
	
	<button class ="button_primary btn-lg btn-primary btn-block"
			 onclick = "location.href = 'display_list_persons.php'"
                type="submit" name="submit"> Return to List </button>

</div>
</form>
