
<?php

		Logout();

	
?>
<?php

	function Logout(){


		$_SESSION["email"] = null;
		$msg = "Logout successfully";
		header("Location: ../view/index.php?msg=" . $msg);
	}