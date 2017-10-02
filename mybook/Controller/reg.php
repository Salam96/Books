<?php
include_once("../Model/db.php");
include_once("../Model/functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username =!empty($_POST['username'])? test_user_input(($_POST['username'])):null;
  $password2 =!empty($_POST['password'])? test_user_input(($_POST['password'])):null;
  $role =!empty($_POST['role'])? test_user_input(($_POST['role'])):null;
  $_SERVER['QUERY_STRING'] = $username;
  
 $password =password_hash($password2, PASSWORD_DEFAULT);
try{
        if ($_REQUEST["action_type"] =="add") {
          $data = array(
             'username' => $username,
             'password' => $password,
             'role' => $role
            );
            $table = "admin";
          insertdata($table, $data);
            header('location:../view/html/displaybooks.php');
          # code...
        }
      }
catch(PDOException $e)
{
  echo "Erro: ".$e -> getMessage();
  die();
}}


 ?>
