<?php
error_reporting(0);
    session_start();
	$errMsg = '';
    if (isset($_POST['login'])
        && !empty($_POST['email'])
        && !empty($_POST['password'])) {
        
//		$_POST['username'] = htmlspecialchars($_POST['username']);
//		$_POST['password'] = htmlspecialchars($_POST['password']);
			$email = $_POST['email'];
			$password = $_POST['password'];
			$id = $_POST['id'];
			$email = htmlspecialchars($email);
			$password = htmlspecialchars($password);
			$role = $_POST['role'];
			
			
			$passwordError = "";
			$emailError = "";		
		
    //check user input when submit button clicked 
         if ($_POST['email'] == 'admin@admin.com'
            && $_POST['password'] == 'admin') {
				
                $_SESSION ['email'] = 'admin@admin.com';
				header("Location: display_list_persons.php");
			
			}else {
				#check database for legit username and password 
				require '../database/database.php';
				$pdo = Database::connect();
				$sql = "SELECT * FROM persons " 
				    . " WHERE email=? " 
					. " LIMIT 1"
					;
				$query=$pdo->prepare($sql);
				$query->execute(Array($email));
				$result = $query->fetch(PDO::FETCH_ASSOC);
				
				# if user typed legit username, verify SALTED password
				if ($result) {
					
					$password_hash_db = $result['password_hash'];
					$password_salt_db = $result['password_salt'];
					$password_hash    = MD5($password . $password_salt_db);
					$role = $result['role'];

					// if password id correct, redirect
					if (!strcmp($password_hash, $password_hash_db)) {
						$_SESSION['email'] = $result['email'];
						if(!strcmp($role, "admin")){
						header('Location: display_list_persons.php'); // redirect
						}else {
							
						header('Location: display_list_persons_user.php');

						}
					}
					// otherwise redisplay login screen
					else {
						$errMsg='Login failure: wrong password'; // '<a 
						
					
					}

				}
				
			else 
				$errMsg='Login failure: wrong Email or Password';
				//. '<a href="login_persons.php">Back to Login</a>';
				//	echo $errMsg;
			
					/*if($result) {
						header("Location: login_persons.php?" 
						. 	"username=$username");}*/
					
						/*."&" . "usernameError=$username");*/
			}
		}

?>
<!DOCTYPE html>
<html lang "en-US">
      <head>
    <title> Crud Applet With Login </title>
        <meta charset="utf-8" />
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		     <link rel="stylesheet" href="stylesheet.css" />
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style >

  </style>
  </head>
    
    <body>
	    <div class = "container">
        <h1>Crud Applet With Login</h1>
        <h2> Login </h2>
    
		
        <form action="" method="post">
            <p style="color: red;"><?php echo $errMsg; ?></p>
			
            Email: <input value = '<?php echo $_GET["email"];?>' type="input_box" class="text"
            name="email" placeholder="admin@admin.com"
            required autofocus />  <br>
            
            Password: <input type="password" class="text"
            name="password" placeholder="admin"
            required /><br /><br>
            
            <button class ="button_primary btn-lg btn-primary btn-block"
               class = "button" type="submit" name="login"> Login</button>
				
			<button class ="button_secondary btn-lg btn-secondary btn-block"
			 onclick = "location.href = 'register_persons.php'"
                type="button" name="join"> Join </button>
            
        </form>
		</div>
    </body>
</html>