
<?php
session_start(); 
if (!isset($_SESSION['email'])) {
header("Location: login_persons.php");
}

echo "<h1>Persons List</h1>";


# connect
require '../database/database.php';
$pdo = Database::connect();

# display link to "create" form
echo " <a style='color: orange;' href='logout_persons.php'>Logout</a><br><br>";

$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";
$email = 'user@user.com';
# display all records
$sql = "SELECT id FROM persons WHERE email = '$email'";
foreach ($pdo->query($sql) as $row) {
}
	$loginID = $row['id'];
$sql = 'SELECT * FROM persons';
foreach ($pdo->query($sql) as $row) {
	if ($row['id'] != $loginID ) {
		$str = "";
	$str .= "<a href='display_read_form_persons_user.php?id=" . $row['id'] . "'>Read</a> ";
    $str .= ' (' . $row['id'] . ') ' . $row['fname'] . ' ' . $row['lname'];
	$str .=  '<br>';
	echo $str;	
	}else {
		$str = "";
	$str .= "<a href='display_read_form_persons_user.php?id=" . $row['id'] . "'>Read</a> ";
	$str .= "<a href='display_update_form_persons_user.php?id=" . $row['id'] . "'>Update</a> ";
    $str .= ' (' . $row['id'] . ') ' . $row['fname'] . $row['lname'];
	$str .=  '<br>';
	echo $str;
}
}
echo '<br />';

