<?php 
include'../../Model/db.php';

function selectauthor(){


$sql = "SELECT * FROM author, book WHERE book.AuthorID = author.AuthorID ORDER BY 'AuthorID'";
              $res = $conn->prepare($sql);
              $res->execute();}

 ?>