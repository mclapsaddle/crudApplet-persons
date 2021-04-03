<?php
error_reporting(0);
require '../database/database.php';
$pdo = Database::connect();

# 2. assign user info to a variable
$email = $_GET['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$sql = "SELECT fname FROM persons WHERE email = '$email'";
foreach ($pdo->query($sql) as $row) {
	$str = "";
    $str .= $row['fname'] . $row['lname'];
	}
	
$errMsg = "";
# This process inserts a record. There is no display.




# 2. assign user info to a variable
$role = $_POST['role'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip_code = $_POST['zip_code'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$role = htmlspecialchars($role);
$fname = htmlspecialchars($fname);
$lname = htmlspecialchars($lname);
$email = htmlspecialchars($email);
$phone = htmlspecialchars($phone);
$address = htmlspecialchars($address);
$address2 = htmlspecialchars($address2);
$city = htmlspecialchars($city);
$state = htmlspecialchars($state);
$zip_code = htmlspecialchars($zip_code);
$password = htmlspecialchars($password);
$confirmPassword = htmlspecialchars($confirmPassword);

$password_salt = MD5(microtime());
$password_hash = MD5($password . $password_salt);
//check username is not already used 
$sql = "SELECT id FROM persons WHERE email = '$email'";
$query = $pdo->prepare($sql);
$query->execute(Array($email));
$result = $query->fetch(PDO::FETCH_ASSOC);
if($result || !filter_var($email, FILTER_VALIDATE_EMAIL) ){
	 echo "Email $email Invaild <br><br>";
	echo "<a href='register_persons.php'>Back To register</a>";
	header("Location: register_persons.php?" 
			. "role=$role"
			."&" . "fname=$fname"
			."&" . "lname=$lname"
			."&" . "email=$email"
			."&" . "phone=$phone"
			."&" . "address=$address"
			."&" . "address2=$address2"
			."&" . "city=$city"
			."&" . "state=$state"
			."&" . "zip_code=$zip_code"
			);
	$role = $_POST['role'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = "";
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip_code = $_POST['zip_code'];


} else if (strcmp($password, $confirmPassword)){
	echo "Passward invaild <br>";
	echo "<a href='register_persons.php'>Back To register</a>";
		header("Location: register_persons.php?" 
					. "role=$role"
			."&" . "fname=$fname"
			."&" . "lname=$lname"
			."&" . "email=$email"
			."&" . "phone=$phone"
			."&" . "address=$address"
			."&" . "address2=$address2"
			."&" . "city=$city"
			."&" . "state=$state"
			."&" . "zip_code=$zip_code"
			);
			$role = $_POST['role'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$address2 = $_POST['address2'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip_code = $_POST['zip_code'];
} else if (strlen($password)>=16 && preg_match('@[A-Z]@', $password) && preg_match('@[a-z]@', $password) &&preg_match('@[^\w]@', $password)){

$sql = "INSERT INTO persons (role, fname, lname, email, phone, password_hash, password_salt, address, address2, city, state, zip_code) 
		VALUES ('$role', '$fname', '$lname', '$email', '$phone', '$password_hash', '$password_salt', '$address', '$address2', '$city', '$state', '$zip_code')";
echo "<p>Your info has been added, You can now login </p><br>";
echo "<a href='login_persons.php'>Back to login</a>";
$pdo->query($sql); # execute the query


}else {
	echo "Invaild Password, Must be at least 16 charcters, have 1 uppercase, 1 lowercase, and 1 spiecal character <br>";
	echo "<a href='register_persons.php'>Back To register</a>";
	header("Location: register_persons.php?" 
. "role=$role"
			."&" . "fname=$fname"
			."&" . "lname=$lname"
			."&" . "email=$email"
			."&" . "phone=$phone"
			."&" . "address=$address"
			."&" . "address2=$address2"
			."&" . "city=$city"
			."&" . "state=$state"
			."&" . "zip_code=$zip_code"
			);
			$role = $_POST['role'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$address2 = $_POST['address2'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip_code = $_POST['zip_code'];
}				





