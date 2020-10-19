<?php

session_start();

if (isset($_POST['signup-submit'])){
	

// The require statment takes the dbhandler file and copies alll code within it into this file.
require 'dbhandler.php';
	
$username = $_POST['uid'];
$email = $_POST['mail'];
$password = $_POST['pwd'];
$passwordRepeat = $_POST['pwd-repeat'];
	
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
	header("location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
	exit();
    }
	
	
// Doesn't send anyhting back to the user.
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("location: ../signup.php?error=invalidmail&uid");
		exit();
	}
	
	
// Error message if email is not valid.
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}
	
	
// Error message if username is not valid.
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("location: ../signup.php?error=invaliduid&mail=".$email);
		exit();
	}
	
	
// Check if both passwords the user has typed in match each other.
// ! = does this password input match the passwordrepeat input.
	else if($password !== $passwordRepeat){
		header("location: ../signup.php?error=passwordcheck&uid=".$username."&mail".$email);
		exit();
	}
	
	
	else {
// Dont put the ( ? ) placeholder within quotation marks.
	$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        
		
// init = initialise the statment.
	$stmt = mysqli_stmt_init($conn);
		 if (!mysqli_stmt_prepare($stmt, $sql)){
         header("location: ../signup.php?error=sqlerror");	
         exit();
    }
	
		
     else {
// Take information from the user and then relay it to the statment that has been created.
			mysqli_stmt_bind_param($stmt, "s", $username);
			
// This will run the information through the database to find a match within the usernames stored.
			mysqli_stmt_execute($stmt);
			
// Takes the result from the database and stores it back to the statment - 'stmt'.
			mysqli_stmt_store_result($stmt);
			
// Data that is returned will come back as rows from database.
			$resultCheck = mysqli_stmt_num_rows($stmt);
			
// If the number of rows is greater than 0 then it will direct user back to the form with a user taken message.
			if ($resultCheck > 0){
				header("location: ../signup.php?error=usertaken&mail=",$email);
				exit();
			}
			
		 
      else {
// idUsers is not here because when creating the database I already set an auto increment which means that when another username is created it will create another row. This below allows for the other parameter to follow the same rule.
             $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
             $stmt = mysqli_stmt_init($conn);
		     if (!mysqli_stmt_prepare($stmt, $sql)){
		     header("location: ../signup.php?error=sqlerror");	
			 exit();
      }
				
		  
// HashedPwd causes the password to be hidden in case a hacker gets into the site, therefore with hash they can't see the password. The PASSWORD_DEFAULT is a method that allows for the hashed password to be secure. 
      else {
             $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					
// The triple s is there to reprsent the amount of paramters which is 3 as there are 3 placholders within the sql above.
             mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
             mysqli_stmt_execute($stmt);
             header("location:../index.php?signup=success");
             exit();
       }
     }
  }
}
		     mysqli_stmt_close($stmt);
		     mysqli_close($conn);
}

      else{
	         header("location: ../signup.php");
	         exit();
}
