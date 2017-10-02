<?php
$dbusername ="root";
$dbpassword ="root";
try{
        $conn = new PDO("mysql:host=localhost;dbname=mybook",$dbusername,$dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}

    catch(PDOException $e)
    {
      $error_message =$e->getMessage();
      die();
    }

    function test_user_input($data)
    {
      $data =trim($data);
      $data =stripslashes($data);
      $data =htmlspecialchars($data);
      return $data;
    }
 ?>
