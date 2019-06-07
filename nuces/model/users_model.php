<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 

class Users_model 
{ 

	public static function register($fname, $lname, $email, $password)
	{
		$dbhandle=DataAccessHelper::getConnection();

		$sql = "select * from `Users` WHERE `email` = ?";
		$stmt = 	mysqli_stmt_init($dbhandle);

		if(!mysqli_stmt_prepare($stmt, $sql)){

			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($result->num_rows > 0) {
				return "Email Already Exists!";
			}
			else
			{
				$sql = "insert into Users (firstName, lastName, email, password) values (?,?,?,?)";
				$stmt = mysqli_stmt_init($dbhandle);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					
					echo "SQL error";
				}
				else{
					// mysqli_query($dbhandle,"insert into Users (firstName, lastName, email, password) values ('$fname', '$lname', '$email', '$password')");
					mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $password);
					mysqli_stmt_execute($stmt);
					return "sign up successful";

				}
				
				
				
			}

		}
		// $result = mysqli_query($dbhandle,"select * from `Users` WHERE `email` = '$email'") or die("Failed to query database".mysqli_error($dbhandle));
		//echo $result->num_rows;
		
	}

	public static function login($email,$pw)
	{
		$dbhandle=DataAccessHelper::getConnection();
		$sql = "select * from `Users` WHERE `email` = ? AND password=?";
		$stmt = 	mysqli_stmt_init($dbhandle);

		if(!mysqli_stmt_prepare($stmt, $sql)){

			echo "SQL statement failed";
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $email, $pw);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($result->num_rows > 0){
				$row=mysqli_fetch_array($result);
				$_SESSION['fname']=$row['firstName'];
				$_SESSION['email']=$row['email'];
				$_SESSION['uid']=$row['uid'];
				return "Success";

			}
			else{
				return "Login Fail";
			}
		}
		
		// $result = mysqli_query($dbhandle,"select * from `Users` WHERE `email` = '$email' AND password='$pw'") or die("Failed to query database".mysqli_error($dbhandle));

		// if ($result->num_rows > 0) {
		// 	$row=mysqli_fetch_array($result);
		// 	$_SESSION['fname']=$row['firstName'];
		// 	$_SESSION['email']=$row['email'];
		// 	$_SESSION['uid']=$row['uid'];
			
		// 		return "Success";
			
		// }
		// else
		// {
		// 	return "Login Fail";
		// }
	}

	public static function logout()
	{
		
		$_SESSION['fname']=null;
		$_SESSION['email']=null;
		$_SESSION['uid']=null;
		session_destroy();
	}

	
	
}
?>