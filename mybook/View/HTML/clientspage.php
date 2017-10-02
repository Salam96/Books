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

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="../CSS/style.css">
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
              <li class="tab"><a href="#test2">Books</a></li>
          
            </ul>
          </div>
        </nav>

  <div id="test2" class="col s12">
              <?php 
           
            
            include'../../Model/db.php';
        include'../../Model/functions.php';
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