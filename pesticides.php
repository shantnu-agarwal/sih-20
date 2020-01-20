<?php
include ('php/session.php');
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
      <li class="nav-item active">
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
                echo '<li class="nav-item"><a class="nav-link" href="account.php">My Account</a></li>';
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




<div class="container crops-pests" style="margin-top:50px;">
<h1 style="text-align: center" class="low">Pesticide Prevention</h1>
<p class="text-muted text-center">Data provided by government of India</p>
  <div class="row">
    <div class="col">
              <a href="https://farmer.gov.in/imagedefault/Other_Pulses/Arhar.pdf"><img src="images/arhar.jpg"></a><br>
              <span>Arhar</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/Other_Pulses/Arhar.pdf"><img src="images/bajra.jpg"></a><br>
              <span>Bajra</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/ipm/coconut.pdf"><img src="images/coconut.jpeg"></a><br>
              <span>Coconut</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/ipm/cotton.pdf"><img src="images/cotton.jpg"></a><br>
              <span>Cotton</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/ipm/groundnut.pdf"><img src="images/groundnut.jpg"></a><br>
              <span>Groundnut</span>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <a href=https://farmer.gov.in/imagedefault/Other_Pulses/Masoor.pdf""><img src="images/jowar.jpeg"></a><br>
              <span>Jowar</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/ipm/maize.pdf"><img src="images/maize.jpg"></a><br>
              <span>Maize</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/Other_Pulses/Moong.pdf"><img src="images/moong.jpg"></a><br>
              <span>Moong</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/Other_Pulses/Moong.pdf"><img src="images/niger.jpg"></a><br>
              <span>Niger</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/Other_Pulses/Moong.pdf"><img src="images/paddy.jpg"></a><br>
              <span>Paddy</span>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/Other_Pulses/Arhar.pdf"><img src="images/ragi.jpg"></a><br>
              <span>Ragi</span>
    </div>
    <div class="col">
    <a href="http://www.drricar.org/"><img src="images/rice.jpg"></a><br>
              <span>Rice</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/ipm/sesame.pdf"><img src="images/sesamum.jpg"></a><br>
              <span>Sesamun</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/ipm/sesame.pdf"><img src="images/soybean.jpg"></a><br>
              <span>Soybean</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/ipm/sugarcane.pdf"><img src="images/sugarcane.jpg"></a><br>
              <span>Sugarcane</span>
    </div>
  </div>
  <div class="row text-center">
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/ipm/sunflower.pdf"><img src="images/sunflower.jpg"></a><br>
              <span class="bottom-crop">Sunflower</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/Other_Pulses/Urad.pdf"><img src="images/urad.jpg"></a><br>
              <span class="bottom-crop">Urad</span>
    </div>
    <div class="col">
    <a href="https://farmer.gov.in/imagedefault/ipm/wheat.pdf"><img src="images/wheat.jpg"></a><br>
              <span class="bottom-crop">Wheat</span>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
