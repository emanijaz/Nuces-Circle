<?php

require_once("DataAccessHelper.php");

class User {
    
    private $username="";
    private $name="";
    
    public function __construct($username){
        $this->username = $username;
        $this->load();
    }
    
    public function getName(){
        return $this->name;
    }
    
    private function load(){
        $query = "select * from users where username='" . $this->username . "'";
        $rs = DataAccessHelper::executeQuery($query);
        
	  if (sizeof($rs) > 0){
		$this->name = $rs[0]["sname"];
	  }

    }
    
    
    
    public static function validate($username,$password){
        $query = "select * from users where username='" . $username . "'";
        $rs = DataAccessHelper::executeQuery($query);

	  if (sizeof($rs) > 0){

		if($rs[0]["password"] == $password){
                    return true;
            }
	  }
        
        return false;
    }

}


?>
