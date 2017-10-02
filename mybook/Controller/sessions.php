<?php 

session_start();
include('../Model/db.php');
if (isset($_SESSION['Login']) == true) {
 				if ($_GET['role'] == '1') {
  							client_portal();
  					}

  else if ($_GET['role'] == '2'){ 		
  		                    Admin_portal();
  					}
  }
 else {
 						    session_destroy();
 							header('location:../view/html/login.php');
 
}
 
 function client_portal(){
 							header('location:../view/html/clientspage.php');
 }
 function Admin_portal(){
 							header('location:../view/html/displaybooks.php');
 }
 ?>