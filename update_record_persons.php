<?php
session_start(); 
if (!isset($_SESSION['email'])) {
header("Location: login_persons.php");
}
# This process updates a record. There is no display.

# 1. connect to database
require '../database/database.php';
$pdo = Database::connect();

# 2. assign user info to a variable
$id = $_GET['id'];
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

# 3. assign MySQL query code to a variable
$sql = "UPDATE persons SET role = '$role', fname = '$fname',lname = '$lname',email = '$email',phone = '$phone',address = '$address',address2 = '$address2',
		city = '$city',state = '$state',zip_code = '$zip_code'
		WHERE id='$id'";


# 4. update the message in the database
$pdo->query($sql); # execute the query
echo "  <link rel='stylesheet' href='stylesheet.css' />";
echo "<p class = 'update'> Your info has been added</p><br>";
echo "<a lass'update' href='display_list_persons.php'>Back to list</a>";