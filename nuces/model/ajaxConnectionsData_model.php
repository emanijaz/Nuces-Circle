<?php


require_once("DataAccessHelper.php"); 
if(!isset($_SESSION))  
    { 
        session_start(); 
    } 

class ajaxConnectionsData_model 
{ 

	public static function getConn()
	{
		$email = $_SESSION['email']; 
		$dbhandle=DataAccessHelper::getConnection();

		$userName = array();
		$userHeadline = array();
		$userGrad = array();
		$connData = array();
		$index= 0 ;
		$connections  = mysqli_query($dbhandle,"select * from connection WHERE uemail = '$email' ") or die("Failed to query database".mysqli_error($dbhandle));

		$connections1  = mysqli_query($dbhandle,"select * from connection WHERE friendMail ='$email'") or die("Failed to query database".mysqli_error($dbhandle));

		$count = 0;
		$traverse_col = array();
		$traverse_col[0] = 'friendMail';
		$traverse_col[1] = 'uemail';
		$conn_arr = array();
		$conn_arr[0] = $connections;
		$conn_arr[1] = $connections1;
		if ($conn_arr[0] ->num_rows > 0 || $conn_arr[1] ->num_rows > 0 ) {  // getting expereince content from db 

			while ($count<2) {
				$numrow=$conn_arr[$count]->num_rows ;

				while($numrow!=0)
	    		{
					$row1=mysqli_fetch_array($conn_arr[$count]);

					$friend_exp = mysqli_query($dbhandle,"select * from Users join experience on Users.email = experience.email where Users.email= '".$row1[$traverse_col[$count]]."';") or die("Failed to query database".mysqli_error($dbhandle));

					$friend_edu = mysqli_query($dbhandle,"select * from Users join education on Users.email = education.email where Users.email= '".$row1[$traverse_col[$count]]."';") or die("Failed to query database".mysqli_error($dbhandle));

					
					if($friend_edu->num_rows > 0){
						$row2=mysqli_fetch_array($friend_edu);
						$userGrad[$index] =  $row2['to_year'];
					}
					else{
						$userGrad[$index] =  "0";
					}

					if($friend_exp->num_rows > 0){  // friend has some experience added yet
						$row2=mysqli_fetch_array($friend_exp);
						$userHeadline[$index] =  $row2['headline'];
					
					}
					else{
						$userHeadline[$index] =  "";
					}
					
						$friend = mysqli_query($dbhandle,"select * from Users where Users.email= '".$row1[$traverse_col[$count]]."';") or die("Failed to query database".mysqli_error($dbhandle));

						$row2=mysqli_fetch_array($friend);
						$userName[$index] = $row2['firstName'].' '.$row2['lastName'];
						
						$index++;
					

					$numrow  = $numrow - 1;
				}
			$count = $count+1;
			}
			$connData['data_name'] = $userName;
			$connData['data_headline'] = $userHeadline;
			$connData['data_Grad'] = $userGrad;


		}


		return $connData;
	}
}

?>