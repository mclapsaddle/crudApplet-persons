 <?php
session_start(); 
if (!isset($_SESSION['email'])) {
header("Location: login_persons.php");
error_reporting(0);
}
?>
<!DOCTYPE html>
<html lang="en">
  <div class = "container">
<h1>Register New Person</h1>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="stylesheet.css" />
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<form method='post' action='register_new_user_persons_admin.php'>
<?php error_reporting(0);?>
<label for"role"> Select role: </label>
	<select class = "input_box" name = "role" id = "role"value='<?php echo $_GET["role"];?>'>
		<option value = "user"selected > User</option>
		<option value = "admin" >Admin</option>
		
	</select><br>
    <!--Role: <input name='role' type='text' ><br />-->
	First Name: <input class = "input_box"  name='fname' type='text'id='fname' placeholder= 'Jane' value='<?php echo $_GET["fname"];?>'> <br /><br>
	Last Name: <input class = "input_box"  name='lname' type='text' id='lname'  placeholder= 'Doe'value='<?php echo $_GET["lname"];?>'><br /><br>
	Email:  <input class = "input_box" name='email' type='text'  placeholder= 'email@example.com'value='<?php echo $_GET["email"];?>'><br /><br>
	Phone: <input class = "input_box" name='phone' type='text' placeholder= '555-555-5555' value='<?php echo $_GET["phone"];?>' ><br /><br>
	Address: <input class = "input_box" name='address' type='text'  placeholder= '123 Main St.'value='<?php echo $_GET["address"];?>'><br /><br>
	Address 2: <input class = "input_box"  name='address2' type='text' placeholder= 'Apt #1'value='<?php echo $_GET["address2"];?>' ><br /><br>
	City: <input class = "input_box" name='city' type='text'  placeholder= 'Boston' value='<?php echo $_GET["city"];?>'><br /><br>
	State: <input class = "input_box" name='state' type='text'  placeholder= 'MA'value='<?php echo $_GET["state"];?>'><br /><br>
	Zip Code: <input class = "input_box" name='zip_code' type='text'  placeholder= '12345' value='<?php echo $_GET["zip_code"];?>'><br /><br>
	Password: <input class = "input_box" name='password' type='password' placeholder= '****************' ><br /><br>
	Confirm Password: <input class = "input_box"  name='confirmPassword' type='password'  placeholder= '****************' ><br /><br>
	
	<button class ="btn btn-lg btn-primary btn-block"
			 onclick = "location.href = 'register_new_user_persons_admin.php'"
                type="submit" name="submit"> Submit </button>
	
	<button class ="btn btn-lg btn-secondary btn-block"
			 onclick = "location.href = 'display_list_persons.php'"
                type="button" name="cancel"> Cancel </button>
</div>
</form>