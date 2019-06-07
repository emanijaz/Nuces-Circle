<?php


class DataAccessHelper {
	

	public static function executeQuery($sql)
	{
		$conn = DataAccessHelper::getConnection();
		$rs = array();

		// Performing SQL query
		$result = mysql_query($sql) or die('Query failed: ' . pg_last_error());

		// Preparing rs
		while ($record = mysql_fetch_array($result, MYSQL_ASSOC)) {

 		    $row = array();		

		    foreach ($record as $col => $value) {

			$row[$col] = $value;

		    }

		    $rs[] = $row;
		
		}

		//Free result-set
		mysql_free_result($result);

		// Closing connection
		mysql_close($conn);


		return $rs;		

	}
	

	public static function executePreparedQuery($sql,$param)
	{
		$conn = DataAccessHelper::getMysqliConnection();
		$rs = array();


		// Performing SQL query
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('s', $param);
		$stmt->execute();
		$stmt->bind_result($id,$title,$isbn);


		// Preparing rs
		while ($stmt->fetch()) {

 		    $row = array();		
		
			$row["id"] = $id;
			$row["title"] = $title;
			$row["isbn"] = $isbn;


		    $rs[] = $row;		
		}

		// Closing connection
		$stmt->close();
		$conn->close();


		return $rs;		

	}
	
	public static function getConnection()
	{
		// $conn = null;

		// $conn = mysql_connect('localhost', 'root', 'root');
		// mysql_select_db('myDB');


		
		// return $conn;
		$conn = null;

		$conn =mysqli_connect("localhost","root","");
		mysqli_select_db($conn,"myDB");


		
		return $conn;
	}

	private static function getMySqliConnection()
	{
/*		$conn = null;

		$conn = mysql_connect('localhost', 'root', 'root');
		mysql_select_db('mylibrary');
*/
		$conn = new mysqli("localhost", "root", "root", "myDB");
		
		return $conn;
	}

}


?>
