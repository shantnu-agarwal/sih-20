<?php
include ('php/session.php');
include ('php/config.php');
?>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm IT</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS Style Sheet-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style/index.css" />

      <!-- Custom Scripts -->
      <!-- <script type="text/JavaScript">
      $(document).ready(function(){
      $("form").submit(function(event){
        event.preventDefault();
        document.getElementById("form-submit").disabled = true;
        var first_name = $("#form-first-name").val();
        var last_name = $("#form-last-name").val();
        var phone = $("#form-phone").val();
        var aadhaar = $("#form-aadhaar").val();
        var pass = $("#form-password").val();
        var cpass = $("#form-password-confirm").val();
        var submit = $("#form-submit").val();

        $(".form-message").load("signup_insert1.php", {
          first_name: first_name,
          last_name: last_name,
          phone: phone,
          aadhaar: aadhaar,
          pass: pass,
          cpass: cpass,
          submit: submit
        });
      });
    });
    </script> -->

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
      <li class="nav-item">
        <a class="nav-link" href="ngo.php">NGOs</a>
      </li>
      <?php

              if(isset($_SESSION['phone'])){
                  ?>
                  <?php
                echo '<li class="nav-item"><a class="nav-link" href="account.php">My Account</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
              }
              else{
                echo '<li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>';
                echo '<li class="nav-item active"><a class="nav-link" href="register.php">Register</a></li>';
              }
              if($_SESSION['phone']==="9999999999"){
                echo '<li class="nav-item"><a class="nav-link" href="announcement.php">Send Alert</a></li>';
              }
              ?>
          </ul>
          </div>
        </nav>

<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <form class="form-container" action="signup_insert1.php" method="POST">
          <h1 style="text-align: center" class="low">Register</h1>
          <div class="form-group">
              <input type="text" class="form-control" name="first-name" id="form-first-name" placeholder="First Name">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="last-name" id="form-last-name" placeholder="Last Name">
          </div>
          <div class="form-group">
              <input type="tel" class="form-control" minlength="10" name="phone" id="form-phone" placeholder="Phone Number">
          </div>
          <div class="form-group">
              <input type="text" class="form-control"  minlength="12" name="aadhaar" id="form-aadhaar" placeholder="Aadhaar">
          </div>
          <div class="form-group">
              <input type="password" minlength="8" class="form-control" name="password" id="form-password" placeholder="Password">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" minlength="8" name="password_confirm" id="form-password-confirm" placeholder="Confirm Password">
          </div>
          <div class="form-group">
          <input type="checkbox" aria-label="Checkbox for following text input" style="margin-right:10px;" required>I agree to receive SMS alerts on my registered phone number.
          </div>
              <button id="form-submit" type="submit" name="submit" class="btn btn-success btn-block">Register</button>



<!--               
          <div class="form-group">
              <input type="text" class="form-control" name="first-name" id="form-first-name" placeholder="First Name">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="last-name" id="form-last-name" placeholder="Last Name">
          </div>
          <div class="form-group">
              <input type="tel" class="form-control" name="phone" id="form-phone" placeholder="Phone Number">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="aadhaar" id="form-aadhaar" placeholder="Aadhaar">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" name="password" id="form-password" placeholder="Password">
          </div>
          <div class="form-group">
              <input type="password" class="form-control" name="password_confirm" id="form-password-confirm" placeholder="Confirm Password">
          </div>
              <button id="form-submit" type="submit" name="submit" class="btn btn-success btn-block">Register</button> -->
              
      </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>