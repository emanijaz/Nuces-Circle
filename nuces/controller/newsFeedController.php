<?php require_once("../model/newsFeed_model.php") ?>
<?php


		showNewsFeed();

?>


<?php


	function showNewsFeed(){

	$result=newsFeed_model::getNewsFeed($_SESSION['email'] );

	$_SESSION['newsfeeds'] = $result;
	header("Location: ../view/newsFeed_view.php");

	}



?>