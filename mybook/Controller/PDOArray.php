<?php 
include_once("../Model/db.php");
					$BirthYear = !empty($_POST['BirthYear'])? test_user_input(($_POST['BirthYear'])):null;
					$DeathYear = !empty($_POST['DeathYear'])? test_user_input(($_POST['DeathYear'])):null;
					$Name = !empty($_POST['Name'])? test_user_input(($_POST['Name'])):0;
					$Nationality = !empty($_POST['Nationality'])? test_user_input(($_POST['Nationality'])):null;
					$Surname = !empty($_POST['Surname'])? test_user_input(($_POST['Surname'])):null;
		            $BookTitle = !empty($_POST['BookTitle'])? test_user_input(($_POST['BookTitle'])):null;
		            $OriginalTitle = !empty($_POST['OriginalTitle'])? test_user_input(($_POST['OriginalTitle'])):null;
		            $YearofPublication = !empty($_POST['YearofPublication'])? test_user_input(($_POST['YearofPublication'])):null;
		            $Genre = !empty($_POST['Genre'])? test_user_input(($_POST['Genre'])):null;
					$MillionsSold = !empty($_POST['MillionsSold'])? test_user_input(($_POST['MillionsSold'])):null;
					$LanguageWritten = !empty($_POST['LanguageWritten'])? test_user_input(($_POST['LanguageWritten'])):null;
					$BookCoverURL = !empty($_POST['BookCoverURL'])? test_user_input(($_POST['BookCoverURL'])):null;
 ?>