<?php 

include_once("../Model/db.php");

include_once("../Model/functions.php");


if ($_REQUEST['action_type'] =='delete'){
	if (!empty($_GET['BookID'])) {
		$table="book";
		$conditions =  array('BookID' => $_GET['BookID'] );
		try {
			//function call
			deleteData($table,$conditions);
			header('location:../view/html/displaybooks.php');
			
		} catch (Exception $e) {
			echo "Error: ".$e -> getMessage();
			die();
		}
	}
}

 ?>