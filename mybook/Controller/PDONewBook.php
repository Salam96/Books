<?php 
include_once("../Model/db.php");
//include_once("../Model/functions.php");


if ($_SERVER["REQUEST_METHOD"]) 
				{
		      		include_once("PDOArray.php");


if ($_POST['action_type']){

	try
{
			$conn->beginTransaction();


			$sql ="INSERT INTO author (`AuthorID`, `Name`, `Surname`, `Nationality`, `BirthYear`, `DeathYear`) VALUES (DEFAULT,?,?,?,?,?);";		
													$res = $conn->prepare($sql);		
													$res->execute(array($Name,$Surname,$Nationality,$BirthYear,$DeathYear));
													$AuthorID = $conn-> lastInsertId();
													

			$sql2 ="INSERT INTO book (BookID,BookTitle,OriginalTitle,YearofPublication,Genre,MillionsSold,LanguageWritten,AuthorID,BookCoverURL) VALUES (DEFAULT,?,?,?,?,?,?,'$AuthorID',?);";		
													$res = $conn->prepare($sql2);
   													$res->execute(array($BookTitle,$OriginalTitle,$YearofPublication,$Genre,$MillionsSold,$LanguageWritten,$BookCoverURL));
   														
													$res->bindparam(':foregin_key',$AuthorID);	
														$conn->commit();
																header("location:../view/html/displaybooks.php");
																		     	

																		     	}							
														catch	(PDOException $e){
																			$conn->rollback();
																					echo $e;
																					die();}
																									}
																											}

?>