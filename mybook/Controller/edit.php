<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	 <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<nav>
				 <div class="nav-wrapper">
    					  <a href="#" class="brand-logo">Logo</a>
    						  <ul id="nav-mobile" class="right hide-on-med-and-down">
    							    <li><a href="sass.html">Sass</a></li>
    							    <li><a href="badges.html">Components</a></li>
    							    <li><a href="collapsible.html">JavaScript</a></li>
    						  </ul>
   				 </div>
  	</nav>
<?php 

include_once("../Model/db.php");
include_once("../Model/functions.php");
//include_once("../view/pages/topPages.php");
$userData = selectData('book', array('where'=>array('BookID'=>$_GET['BookID']),'return_type'=>'single'));

if (!empty($userData)) {
			
	?>
	<div class="container">
	 <div class="row">
      <form class="col s12" method="post" action="PDOUpdate.php?BookID=<?php echo $_GET['BookID'] ?>">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="BookTitle" type="text" class="validate" name="BookTitle" value="<?php echo $userData['BookTitle'];?>"/>
          <label for="BookTitle">BookTitle:</label>
        </div>
        </div>
        <div class="row">
        <div class="col s3">
          <div class="card">
            <div class="card-image">
              <img src="<?php echo $userData['BookCoverURL']; ?>">
            </div>
            
            <div class="card-action">
              <input type="text" name="BookCoverURL" value="<?php echo $userData["BookCoverURL"];?>"/>
            </div>
          </div>
        </div>
      </div>
        
          
       
      <div>
        <div class="input-field col s6">
          <input id="Original book title:" type="text" name="OriginalTitle" value="<?php echo $userData["OriginalTitle"];?>"/>
          <label for="Original book title:">Original book title:</label>
        </div>
      </div>
      
      
    
     
     <div class="input-field col s6">
          <input id="YearOfPublication" type="text" name="YearofPublication" class="validate" value="<?php echo $userData['YearofPublication'];?>"/>
          <label for="YearOfPublication">YearOfPublication:</label>
        </div>
      
      <div class="input-field col s6">
          <input id="Genre" type="text" class="validate" name="Genre" value="<?php echo $userData['Genre'];?>"/>
          <label for="Genre">Genre:</label>
        </div>
      
       <div class="input-field col s6">
          <input id="MillionsSold" type="text" class="validate" name="MillionsSold" value="<?php echo $userData['MillionsSold'];?>"/>
          <label for="MillionsSold">MillionsSold:</label>
        </div>
  
      <div class="input-field col s6">
          <input id="LanguageWritten" type="text" class="validate" name="LanguageWritten" value="<?php echo $userData['LanguageWritten'];?>"/>
          <label for="LanguageWritten">LanguageWritten:</label>
        </div>
        <div class="input-field col s6">
          <input id="Author ID" type="text" class="validate" name="AutorID" value="<?php echo $userData['AuthorID'];?>"/>
          <label for="Author ID">Author ID:</label>
        </div>
      
      <input type="hidden" name="BookID" value="<?php echo $userData['BookID'];?>"/>
        <input type="hidden" name="action_type" value="update"/>
     
        <input type="submit">
        </div>
    </form>
  </div>
   </div>
	
	<?php
}else{echo "nope";}?>

</body>
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</html>

   
