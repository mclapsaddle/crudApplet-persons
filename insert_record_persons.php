<?php
session_start(); 
if (!isset($_SESSION['email'])) {
header("Location: login_persons.php");
}
//error_reporting(0);
# This process inserts a record. There is no display.

# 1. connect to database
require '../database/database.php';
$pdo = Database::connect();

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
//$password = $_POST['password'];

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
//$password = htmlspecialchars($password);


# 3. assign MySQL query code to a variable
$sql = "INSERT INTO persons (role, fname,lname, email, phone, password_hash, password_salt, address, address2, city, state, zip_code) 
		VALUES ('$role', '$fname', '$lname', '$email', '$phone', '$password_hash', '$password_salt', '$address', '$address2', '$city', '$state', '$zip_code')";

# 4. insert the message into the database
$pdo->query($sql); # execute the query
echo "<p>Your info has been added</p><br>";
echo "<a href='display_list_persons.php'>Back to list</a>";