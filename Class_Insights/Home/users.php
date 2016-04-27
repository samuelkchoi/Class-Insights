<?php
include("database.php");
class Users extends Database{

    public function __construct() {
        parent::__construct();
        
    }
    
    public function save($username, $first_name, $last_name, $password) {
        // todo fill this out
        $this->sth = $this->pdo->prepare("INSERT INTO Users (username, password, first_name, last_name, avatar_id) 
        VALUES (:username, :password, :first_name, :last_name, 0)");
        $this->sth->bindParam(':username',$username);
        $this->sth->bindParam(":password",$password);
        $this->sth->bindParam(":first_name",$first_name);
        $this->sth->bindParam(":last_name",$last_name);
        try {
        	if ($this->sth->execute())
			return "success";
	} catch (Exception $e) {
		var_dump($e->getMessage());
	}
	
	return "Username already exists";
    }

	public function check($username, $password){
		$this->sth = $this->pdo->prepare("SELECT * FROM Users
		WHERE username = :username AND password = :password 			LIMIT 1");
		
		$this->sth->bindParam(':username', $username);
		$this->sth->bindParam(':password', $password);
		$this->sth->execute();

		$result = $this->sth->fetch(PDO::FETCH_ASSOC);
		
		return $result['id'];

	}
    
    /**
     * 
     */
    public function getOne($username) {
        $this->sth = $this->pdo->prepare("SELECT * FROM Users
        WHERE username = :username LIMIT 1");
        
        $this->sth->bindParam(':username', $username);
        $this->sth->execute();
        
        $result = $this->sth->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    
    }
}
