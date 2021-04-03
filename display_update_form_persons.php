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

?>
<div class = "container">
<h1>Update existing person</h1>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="stylesheet.css" />
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<form method='post' action='update_record_persons.php?id=<?php echo $id ?>'>
	Role: <input class = "input_box" name='role' type='text' value='<?php echo $result['role']; ?>' ><br /><br>
	First Name: <input class = "input_box" name='fname' type='text'value='<?php echo $result['fname']; ?>' ><br /><br>
	Last Name: <input class = "input_box" name='lname' type='text' value='<?php echo $result['lname']; ?>' ><br /><br>
	Email: <input class = "input_box" name='email' type='text' value='<?php echo $result['email']; ?>' ><br /><br>
	Phone: <input class = "input_box" name='phone' type='text' value='<?php echo $result['phone']; ?>' ><br /><br>
	Address: <input class = "input_box" name='address' type='text' value='<?php echo $result['address']; ?>' ><br /><br>
	Address 2: <input class = "input_box" name='address2' type='text' value='<?php echo $result['address2']; ?>' ><br /><br>
	City: <input class = "input_box" name='city' type='text' value='<?php echo $result['city']; ?>' ><br /><br>
	State: <input class = "input_box" name='state' type='text' value='<?php echo $result['state']; ?>' ><br /><br>
	Zip Code: <input class = "input_box" name='zip_code' type='text' value='<?php echo $result['zip_code']; ?>' ><br /><br>
	Password: <input class = "input_box" name='password' type='password' value='<?php echo $result['password']; ?>' ><br /> <br> 
	Confirm Password: <input class = "input_box"  name='confirmPassword' type='password'  placeholder= '****************' ><br /><br>
	 
<button class ="button_primary btn-lg btn-primary btn-block"
			 onclick = "location.href = 'update_record_persons.php'"
                type="submit" name="submit"> Submit </button>
	
	<button class ="button_secondary btn-lg btn-secondary btn-block"
			 onclick = "location.href = 'display_list_persons.php'"
                type="button" name="cancel"> Cancel </button>
	</div>
</form>