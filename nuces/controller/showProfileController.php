<?php require_once("../model/showProfile_model.php") ?>
<?php


		getProfileContent();

?>


<?php


	function getProfileContent(){

   // echo '<script>alert("im in show profile controller")</script>';;

	$result=showProfile_model::getProfile();
	$_SESSION['profile'] = $result;
	
	header("Location: ../view/profile_view.php");


	}



?>