<?php

session_start();

if (isset($_POST['login-submit'])) {
	
	
// The require statment takes the dbhandler file and copies alll code within it into this file.
require 'dbhandler.php';

$mailuid = $_POST['mailuid'];
$password = $_POST['pwd'];

	
// If the input fields of both password and username are empty then error message with be shown in url. || = or.
if (empty($mailuid) || empty($password)) {
	header("location: ../index.php?error=emptyfields");
	exit();
}

	
// Users login in via using their username or email. The stmt string will initiate the connection to the database and then proceed to find the user id and email address.
    else {
	$sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
	$stmt = mysqli_stmt_init($conn);
    
		
// Looks for any errors within the $sql string.
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	header("location: ../index.php?error=sqlerror");
	exit();
	}
	
	else {
		mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if ($row = mysqli_fetch_assoc($result)) {
			
            
// This function will take the password that the user has typed in and take the password found in the database and try match them both together.
        $pwdCheck = password_verify($password, $row['pwdUsers']);
			
            
// The function below runs a password match/equal to check if password written in the input field matches the one in the database if not then a error message will show as shown below. 
          if ($pwdCheck == false) {
          header("location:../index.php?error=wrongpassword");
          exit();
        }
			
			
// If password is true then the user will be logged into the website and a session will be created. 
     else if ($pwdCheck == true) {
          session_start();
          $_SESSION['userId'] = $row['idUsers'];
          $_SESSION['userUid'] = $row['uidUsers'];
				
          header("location:../userpage.php?login=success");
          exit();	
     }
			
			
// Just in case password doesn't come up true or false it will indicate to the user that the password is wrong.
      else {
          header("location:../index.php?error=wrongpassword");
	      exit();	
      }
      }
		
		
// If neither the password or username is recognised within the database then an error will show stating to the user that details that have been input have not been found.
      else {
          header("location: ../index.php?error=nouser");
	      exit();
		}
	}
}
	
}

else {
		  header("location: ../index.php");
	      exit();
}