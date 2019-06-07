<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 

class postStatus_model 
{ 
	
	public static function postStatus($post_text)
	{
		$email = $_SESSION['email'] ;

		$dbhandle=DataAccessHelper::getConnection();
		mysqli_query($dbhandle,"INSERT into newsFeed (postid, userEmail, postDescription) VALUES ('', '$email', '$post_text')") or die("Failed to query database".mysqli_error($dbhandle));
	}
}

?>