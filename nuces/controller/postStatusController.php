<?php require_once("../model/postStatus_model.php") ?>
<?php

	 postStatus();
?>

<?php

function postStatus(){

		if(isset($_POST['postStatus_btn']))
		{
			$post_text =  $_POST['postStatusText'];
			// echo $post_text;

			if($post_text != ""){
				$result=postStatus_model::postStatus($post_text);
			}
			
			echo "status posted";
			header("Location: ../controller/newsFeedController.php");

		}

}

?>