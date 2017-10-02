<?php 
session_start();

if(!isset($_SESSION['Login'])){
  logout();
 session_destroy();
  
}

function logout(){
  header('location:login.php');
  }
 ?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="../CSS/style.css">
       

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
      <?php include('header.php'); ?>
        <nav class="nav-extended">
          <div class="nav-wrapper">
            <a href="logout.php" data-activates="mobile-demo" class="button-collapse"><i>Logout</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="logout.php">Logout</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
          <div class="nav-content">
            <ul class="tabs tabs-transparent">
              <li class="tab"><a lass="active" href="#test1">Books</a></li>
              <li class="tab"><a href="#test2">Authors</a></li>
              <li class="tab"><a href="#test3">Add new book</a></li>
            </ul>
          </div>
        </nav>
        <div id="test1" class="col s12">
<?php 
        include'../../Model/db.php';
        include'../../Model/functions.php';
  $table = selectData('book',array('order_by' => 'BookID' ) );
      if ( !empty($table)) {
           $count = 0;
            foreach ($table as $user) {
             $count++;
?>
<div class="imageContainer">
        <div class="imageHolder">
          <img class="imageItself" src="<?php echo $user['BookCoverURL']; ?>">

        </div>
        <div class="imagebuttons">
            <div class="title"><?php echo $user['BookTitle']; ?>
              
            </div>
            <div class="buttons">
            <a class="btn-large waves-effect waves-light red" href='../../Controller/edit.php?BookID=<?php echo $user['BookID'];?>'>Edit</a>
            <a class="btn-large waves-effect waves-light red" href='../../Controller/pdoDelete.php?action_type=delete&BookID=<?php echo $user['BookID'];?>' onclick="return confirm('Are you sure?')">Delete</a>
            </div>
        </div>  
</div>
<?php
  }
}

 ?>
  </div>
  <div id="test2" class="col s12">
              <?php 
            
                GLOBAL $conn;
              $sql = "SELECT * FROM author, book WHERE book.AuthorID = author.AuthorID ORDER BY 'AuthorID'";
              $res = $conn->prepare($sql);
              $res->execute();
              while ($result = $res->fetch(PDO::FETCH_ASSOC)):{  

?>
    <div class="cols">
    <div class="card-action">
          <h4><?php echo $result['BookTitle']; ?></h4></br>
        </div>
    <div class="card horizontal">

      <div class="card-image">
        <img src="<?php echo $result['BookCoverURL']; ?>">
      </div>

      <div class="card-stacked">
        <div class="card-content">
          <p>Name : <?php echo $result['Name']; ?></p></br>
          <p>Surname : <?php echo $result['Surname']; ?></p></br>
          <p>Nationality : <?php echo $result['Nationality']; ?></p></br>
          <p>BirthYear : <?php echo $result['BirthYear']; ?></p></br>
          <p>DeathYear : <?php echo $result['DeathYear']; ?></p></br>
        </div>
      
      </div>
    </div>
  </div>
  
 <?php }
                    endwhile;  ?></div>

  <div id="test3" class="col s12">
          <div class="container">
   <div class="row">
              <form class="col s12" method="post" action="../../controller/PDONewBook.php">
                 <div class="row">
                          <div class="input-field col s10">
          <input id="BookTitle" type="text" class="validate" name="BookTitle" value=""/>
          <label for="BookTitle">BookTitle:</label>
                          </div>
                 </div>
                 <div class="row">
        <div class="input-field col s10">
          <input id="BookCoverURL:" type="text" name="BookCoverURL" value=""/>
          <label for="Original book title:">BookCoverURL:</label>
                </div>
                </div>
                <div class="row">
        <div class="input-field col s10">
          <input id="Original book title:" type="text" name="OriginalTitle" value=""/>
          <label for="Original book title:">Original book title:</label>
        </div>
                </div> 
                <div class="row">
       <div class="input-field col s10">
          <input id="YearOfPublication" type="number" name="YearofPublication" class="validate" value=""/>
          <label for="YearOfPublication">YearOfPublication:</label>
        </div>
                </div> 
                <div class="row">      
      <div class="input-field col s10">
          <input id="Genre" type="text" class="validate" name="Genre" value=""/>
          <label for="Genre">Genre:</label>
        </div>
                </div>
                <div class="row">   
       <div class="input-field col s10">
          <input id="MillionsSold" type="number" class="validate" name="MillionsSold" value="" required/>
          <label for="MillionsSold">MillionsSold:</label>
       </div> 
               </div>
               <div class="row">  
      <div class="input-field col s10">
          <input id="LanguageWritten" type="text" class="validate" name="LanguageWritten" value="" required/>
          <label for="LanguageWritten">LanguageWritten:</label>
      </div>
              </div>
              <div class="row">
        <div class="input-field col s10">
          <input id="Surname" type="text" class="validate" name="Surname" value="" required/>
          <label for="Surname">Author Surname:</label>
        </div>
              </div>
              <div class="row">
        <div class="input-field col s10">
          <input id="Nationality" type="text" class="validate" name="Nationality" value="" required/>
          <label for="Nationality">Author Nationality:</label>
        </div>
              </div>
              <div class="row">
        <div class="input-field col s10">
          <input id="BirthYear" type="number" class="validate" name="BirthYear" value="" required/>
          <label for="BirthYear">Author BirthYear:</label>
        </div>
              </div>
              <div class="row">
        <div class="input-field col s10">
          <input id="DeathYear" type="number" class="validate" name="DeathYear" value="" required/>
          <label for="DeathYear">Author DeathYear:</label>
        </div>
              </div>
      </div>
      <div class="row">
   <button class="btn waves-effect waves-light" type="submit" name="action">Send
     <input type="hidden" name="action_type" value="add"/>
   <i class="material-icons right" type="submit" name="button">send</i>
 </button>
   </div>
        
    </form>
  </div>
  </div>
  </div>

 <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>

    $(document).ready(function() {
$('select').material_select();
});

    </script>
    </body>
    <?php include('footer.php'); ?>
  </html>