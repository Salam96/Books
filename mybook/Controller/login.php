<?php 
session_start();
include_once("../model/db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = !empty($_POST['username']) ? test_user_input(($_POST['username'])) : null;
	$password = !empty($_POST['password']) ? test_user_input(($_POST['password'])) : null;
		

	try {
			$stmt = $conn->prepare("SELECT password FROM admin WHERE username = :user");
			

			$stmt->bindParam(':user', $username);
			$stmt->execute();
			

			$rows = $stmt ->fetch(PDO::FETCH_ASSOC)['password'];
			
			//die();
				if (password_verify($password, $rows)) {
					//echo "string";
					$stmt = $conn->prepare("SELECT adminID, role FROM admin WHERE username = :user");
					$stmt->bindParam(':user', $username);
					$stmt->execute();
								$user = $stmt->fetch(PDO::FETCH_ASSOC);
								
									if ($user['role'] == '2') {
									
									$_SESSION['Login'] = $user['role'];
									header('location:sessions.php?role=' . $user['role']);
									//header('location:../view/html/displaybooks.php');
								}
								elseif ($user['role'] == '1') {
									$_SESSION['Login'] = $user['role'];
									header('location:sessions.php?role=' . $user['role']);
									//header('location:../view/html/clientspage.php');
								}
							}
						
					//header('location:../view/html/displaybooks.php');
					
					
				
		else{
			header('location:login.php');
		}
	} catch (Exception $e) {
		
	}
}



 ?>