<?php 

include_once("../Model/db.php");

include_once("../Model/functions.php");

if ($_REQUEST['action_type']){

try {
    
	$BookTitle =!empty($_POST['BookTitle'])? test_user_input(($_POST['BookTitle'])):null;
 	$OriginalTitle =!empty($_POST['OriginalTitle'])? $_POST['OriginalTitle']:null;
    $YearofPublication =!empty($_POST['YearofPublication'])? test_user_input(($_POST['YearofPublication'])):0;
    $Genre =!empty($_POST['Genre'])? test_user_input(($_POST['Genre'])):null;
    $MillionsSold =!empty($_POST['MillionsSold'])? test_user_input(($_POST['MillionsSold'])):null;
    $LanguageWritten =!empty($_POST['LanguageWritten'])? test_user_input(($_POST['LanguageWritten'])):null;
    $BookCoverURL =!empty($_POST['BookCoverURL'])? $_POST['BookCoverURL']:null;

	if (!empty($_GET['BookID'])) {
		$data = array(
             'BookTitle' => $BookTitle,
             'OriginalTitle' => $OriginalTitle,
             //'AuthorID' => 'deafult',
             'YearofPublication' => $YearofPublication,
             'Genre' => $Genre,
             'MillionsSold' => $MillionsSold,
             'LanguageWritten' => $LanguageWritten,
             'BookCoverURL' => $BookCoverURL

            );
            $table = "book";

            $conditions = array('BookID' => $_GET['BookID']);
          updateData($table, $data, $conditions);

	}
             header('location:../View/html/displaybooks.php');
}
            catch(PDOException $e)
            {
                echo "Error: ...".$e -> getMessage();
                die();
            }
}



 ?>