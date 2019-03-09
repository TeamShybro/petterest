<?php 
  
	try{
		$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e) {
		print $e->getMessage();
	}
	
	//select
	/*
	$query=$db->query("SELECT * FROM users", PDO::FETCH_ASSOC);
	if($query->rowCount()){
		foreach($query as $row){
			print_r($row);
		}
	}
	
	$query=$db->query("SELECT * FROM sayfalar WHERE sayfa_id= ?");
	$query=execute(array(2));
	if($query){
		print_r($query->fetch(PDO::FETCH_ASSOC))
	}
	//INSERT
	
	
	*/
?>