<?php
	session_start();
	include("config.php");
	class functions extends configuration{
		var $username;
		var $password;
		var $found = false;
		
		function __construct($username,$password){
			$this->username = $username;
			$this->password = $password;
		}
		
		
		function check_login(){
			$con = mysql_connect($this->dbHost,$this->dbUsername,$this->dbPassword) 
														or die("Database Connection Error!");
			mysql_select_db($this->dbName,$con);
			
			$result=mysql_query("SELECT * FROM users WHERE uname='$this->username' and pword='$this->password'") 
														or die(mysql_error());
			
			$count=mysql_num_rows($result);
			$row=mysql_fetch_array($result);
			
			if($count>0)
			{
				$_SESSION['id']=$row['id'];
				$this->found = true;
			}
			
			return $this->found;
		}
	
	}
?>