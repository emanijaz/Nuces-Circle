<?php require_once("../model/showRecruiting_model.php") ?>
<?php


		showRecruiting();

?>


<?php


	function showRecruiting(){

//	echo '<script>alert("'.$_SESSION['email'].'")</script>';;

	$result= showRecruiting_model::getjobs();
//	$details['pageInfo']=$result;
	$_SESSION['jobs'] = $result;
	// $GLOBALS['jobs_data'] = $result;

	// setcookie("jobs_data", $result, time()+2*24*60*60);
	// if(isset($_COOKIE["jobs_data"])){
	// 			echo "cookie set in controller";
	// 	}
	// 	else{
	// 		echo "cookie not set";
	// 	}
		header("Location: ../view/recruiting_view.php");

	}



?>