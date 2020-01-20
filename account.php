<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
if(!isset($_SESSION["phone"])) {
  header("location:index.php");
}
include 'php/config.php';
?>
<?php
echo '<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Farm IT</title>
 <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <link rel="stylesheet" href="style/index.css" />

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Farm IT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pesticides.php">Pesticides</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Helpers
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="govt.php">Government Agencies</a>
        <a class="dropdown-item" href="ngo.php">NGOs</a>
        <a class="dropdown-item" href="chemical.php">Chemical Factories</a>
        </li>';
        
        if(isset($_SESSION['phone'])){
            echo'<li class="nav-item"><a class="nav-link" href="loan.php">Loan</a></li>';}
              if(isset($_SESSION['phone'])){
                echo '<li class="nav-item active"><a class="nav-link" href="account.php">My Account</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
              }
              else{
                echo '<li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
              }
            echo '</ul>';
          echo '</div>';
        echo'</nav>';
    ?>
<div class="container">
    <div class="row" >
      <div class="small-12">
        <p><h4>Account Details</h4></p>
        <p>Below are your details in the database.</p>
      </div>
    </div>
      <div class="row" style="margin-left:10px;">
          <div class="scrollit">
              <?php
                $result = $mysqli->query('SELECT * FROM users WHERE phone_no='.$_SESSION['phone']);
                if($result === FALSE){
                  die(mysql_error());
                }
                if($result) {
                  $obj = $result->fetch_object();
                  echo'<div class="row"> <div class="small-3 columns">
              <label for="right-label" class="right inline">First Name: &nbsp;</label>
            </div>
            <div class="small-8 columns end">';
                  echo '<p>'.$obj->fname.'</p>';
                  echo '</div>';
                  echo '</div>';

                  echo'<div class="row"> <div class="small-3 columns">
              <label for="right-label" class="right inline">Last Name: &nbsp;</label>
            </div>
            <div class="small-8 columns end">';
                  echo '<p>'.$obj->lname.'</p>';
                  echo '</div>';
                  echo '</div>';

                  echo'<div class="row"> <div class="small-3 columns">
              <label for="right-label" class="right inline">Phone Number: &nbsp;</label>
            </div>
            <div class="small-8 columns end">';
                  echo '<p>'.$obj->phone_no.'</p>';
                  echo '</div>';
                  echo '</div>';

                  echo'<div class="row"> <div class="small-3 columns">
              <label for="right-label" class="right inline">Aadhaar Number:&nbsp; </label>
            </div>
            <div class="small-8 columns end">';
                  echo '<p>'.$obj->aadhaar.'</p>';
                  echo '</div>';
                  echo '</div>';
              }
          ?>
        </div>
      </div>
      <div class="alert alert-success" role="alert">
  You are currently enrolled for message updates.
</div>
      </div>
      
    <script>
      $(document).foundation();
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
