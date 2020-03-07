<?php
include ('php/session.php');
include ('php/config.php');
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
      <li class="nav-item active">
      <a class="nav-link" href="ngo.php">NGOs</a>
    </li>';
              if(isset($_SESSION['phone'])){
                echo '<li class="nav-item"><a class="nav-link" href="account.php">My Account</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
              }
              else{
                echo '<li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
              }
              if($_SESSION['phone']==="9999999999"){
                echo '<li class="nav-item"><a class="nav-link" href="announcement.php">Send Alert</a></li>';
              }
            echo '</ul>';
          echo '</div>';
        echo'</nav>';
    ?>
    <div class="container">
    <h1 style="text-align: center;" class="low">Look up the NGOs near you!</h1>
    <p class="text-muted text-center" style="margin-bottom:2em">NGOs provide help to farmers in various ways. Look up the one which suits you the best!</p>
<form action="" method="post">
<div class="form-group col-md-12">
      <label for="season">Select State</label>
      <select id="season" class="form-control" name="state">
        <option selected>Choose...</option>
        <option >Andhra Pradesh</option>
        <option >Tamil Nadu</option>
        <option >ANDAMAN & NICOBAR ISLANDS</option>
        <option >CHANDIGARH</option>
        <option >UTTAR PRADESH</option>
        <option >MAHARASHTRA</option>
      </select>
</div>
<input type="submit" value="View NGOs" class="button" name="SubmitButton">
</form>
</div>

<div class="container">
<?php

if(isset($_POST['SubmitButton'])){
$statey="{$_POST['state']}";
$a = $mysqli->query("SELECT * from ngo WHERE statey='$statey'");
// $a_result=$a->fetch_object();
echo '<table class="table table-striped">';
echo' <thead>';
            echo '<tr>';
            echo '<th scope="col">State</th>';
            echo '<th scope="col">Name of NGO</th>';
            echo '<th scope="col">Address</th>';
            echo '</tr>';
            echo' </thead>';
  echo '<tbody>';
while($r=mysqli_fetch_row($a))
{
  echo'<tr>';
  echo'<td>';
  echo $r[0];
  echo'</td>';
  echo'<td>';
  echo $r[1];
  echo'</td>';
  echo'<td>';
  echo $r[2];
  echo'</td>';
echo'</tr>';
}
echo '</tbody>';
echo'</table>';
// echo $statey;
}
?>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
