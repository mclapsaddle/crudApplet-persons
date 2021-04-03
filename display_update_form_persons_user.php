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
<h1>Update existing person</h1>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<form method='post' action='update_record_persons_user.php?id=<?php echo $id ?>'>
	Role: <input name='role' type='text' value='<?php echo $result['role']; ?>'Disabled ><br />
	First Name: <input name='fname' type='text'value='<?php echo $result['fname']; ?>' ><br />
	Last Name: <input name='lname' type='text' value='<?php echo $result['lname']; ?>' ><br />
	Email: <input name='email' type='text' value='<?php echo $result['email']; ?>' ><br />
	Phone: <input name='phone' type='text' value='<?php echo $result['phone']; ?>' ><br />
	Address: <input name='address' type='text' value='<?php echo $result['address']; ?>' ><br />
	Address 2: <input name='address2' type='text' value='<?php echo $result['address2']; ?>' ><br />
	City: <input name='city' type='text' value='<?php echo $result['city']; ?>' ><br />
	State: <input name='state' type='text' value='<?php echo $result['state']; ?>' ><br />
	Zip Code: <input name='zip_code' type='text' value='<?php echo $result['zip_code']; ?>' ><br />
	Password: <input name='password' type='password' value='<?php echo $result['password']; ?>' ><br />  
	Confirm Password: <input class = "input_box"  name='confirmPassword' type='password'  placeholder= '****************' ><br /><br>
    <input type="submit" value="Submit">
	 <input type="submit" formaction= "display_list_persons_user.php" value="Cancel">
</form>