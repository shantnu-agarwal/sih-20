<?php
include ('php/session.php');
include ('php/config.php');
//include ('php/head.php');
?>
<?php
if(isset($_POST['submit']))
{
}
?>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farm IT</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS Style Sheet-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style/index.css" />

</head>

<!--Body Begins-->
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
        </li>
      <?php
        if(isset($_SESSION['phone'])){
            echo'<li class="nav-item"><a class="nav-link" href="loan.php">Loan</a></li>';}
              if(isset($_SESSION['phone'])){
                  ?>
                  <?php
                echo '<li class="nav-item"><a class="nav-link" href="account.php">My Account</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
              }
              else{
                echo '<li class="nav-item active"><a class="nav-link" href="login.php">Log In</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
              }
              ?>
          </ul>
          </div>
        </nav>



  <!-- Login Form Begins-->
  <div class="container">
  <div class="login-temp mx-auto">
  <div class="card">
        <div class="card-header p-0 mx-auto">
            <nav class="login-nav">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active p-0" id="nav-login-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-login" aria-selected="true">Login with Password</a>
                    <a class="nav-item nav-link p-0" id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-register" aria-selected="false">Login with OTP</a>
                </div>
            </nav>
        </div>
        <!-- end card header -->
        <div class="card-body p-0">
            <div class="tab-content" id="nav-tabContent">
            <!-- start login -->
            <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
            <form class="form-container" action="verify1.php" method="POST">
          <div class="form-group">
           
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" id="form-phone" name="phone" aria-describedby="emailHelp"
              placeholder="Enter Phone Number" style="border-radius: 10px;">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" onkeypress="capLock(event)" id="form-password"
              placeholder="Password" style="border-radius: 10px;">
          </div>
          <br>
          <button id="form-submit" type="submit" name="submit" class="btn btn-success btn-block">Login</button>
          <br>
          
          
          <a href = "register.php"style="font-size: 17px; text-align:left;">Sign Up </a><a style="font-size: 17px; text-align:left;">|</a>
          <a href = "forgot.php" style="font-size: 17px; text-align:right;">Forgot Password</a>

        </form>
        </div>
        <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
        <form class="form-container" action="verify1.php" method="POST">
          <div class="form-group">

          </div>
          <div class="form-group">
            <input type="tel" class="form-control" id="form-phone" name="phone" aria-describedby="emailHelp"
              placeholder="Enter Phone Number" style="border-radius: 10px;">
          </div>
          <br>
          <button id="form-submit" type="submit" name="submit" class="btn btn-success btn-block">Send OTP</button>
          <br>
          
          
          <a href = "register.php"style="font-size: 17px; text-align:left;">Sign Up </a><a style="font-size: 17px; text-align:left;"></a>

        </form>
                </div>
            </div>
            
            </div>
            <div>
            </div>




<!-- 
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6">
          <form class="form-container" action="verify1.php" method="POST">
          <div class="form-group">
            <h1 style="text-align: center">Login</h1>
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" id="form-phone" name="phone" aria-describedby="emailHelp"
              placeholder="Enter Phone Number" style="border-radius: 10px;">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" onkeypress="capLock(event)" id="form-password"
              placeholder="Password" style="border-radius: 10px;">
          </div>
          <br>
          <button id="form-submit" type="submit" name="submit" class="btn btn-success btn-block">Login</button>
          <br>
          
          
          <a href = "register.php"style="font-size: 17px; text-align:left;">Sign Up </a><a style="font-size: 17px; text-align:left;">|</a>
          <a href = "forgot.php" style="font-size: 17px; text-align:right;">Forgot Password</a>

        </form>
      </div>
      <div class="col-sm-3"></div>
    </div>
</div> -->
  <!-- Login Form Ends-->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
