
<?php
session_start(); 
if (!isset($_SESSION['email'])) {
header("Location: login_persons.php");
}
//error_reporting(0);
echo "<h1>Persons List</h1>";

# connect
require '../database/database.php';
$pdo = Database::connect();
echo "<a href='display_create_form_persons.php'>Create</a>";


# display link to "create" form
echo " <a style='color: orange;' href='logout_persons.php'>Logout</a><br><br>";

# display all records
$sql = 'SELECT * FROM persons';
foreach ($pdo->query($sql) as $row) {
	$str = "";
	$str .= "<a class = 'display_list' href='display_read_form_persons.php?id=" . $row['id'] . "'>Read</a>";
	$str .= "<a class = 'display_list' href='display_update_form_persons.php?id=" . $row['id'] . "'>Update</a>";
	$str .= "<a class = 'display_list' href='display_delete_form_persons.php?id=" . $row['id'] . "'>Delete</a> ";
    $str .= ' (' . $row['id'] . ') ' . $row['fname'] . " " .  $row['lname'];
	$str .= "<br>";
	echo $str;
}
echo '<br />';


