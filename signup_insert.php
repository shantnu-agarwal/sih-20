<?php
include 'php/config.php';
$jump_prevent_send_back="login.html";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){ // Make sure that user comes only through a valid POST request.
  if($connected_successfully == true && isset($_POST['submit'])) // If we have connected to the database and the varaiable submit is set in the SESSIONS Array
  {
    //  Get the POST variables
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone'];
    $aadhaar = $_POST['aadhaar'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    //Error Flags
    $Empty_First_Name_error = false;
    $Empty_Last_Name_error = false;
    $Empty_Phone_Number_error = false;
    $Empty_aadhaar_error = false;
    $Empty_Pass_error = false;
    $success = false;

    // if(empty($pass) || empty($first_name) || empty($last_name) || empty($phone_number))
    // {
    //   echo '<span class="form-error">Please fill in all the fields.</span>';
    //   if(empty($first_name))
    //   {
    //       $Empty_First_Name_error = true;
    //   }
    //   if(empty($last_name))
    //   {
    //       $Empty_Last_Name_error = true;
    //   }
    //   if(empty($phone_number))
    //   {
    //       $Empty_Phone_Number_error = true;
    //   }
    //   if(empty($pass))
    //   {
    //       $Empty_Pass_error = true;
    //   }
    // }
    if(!preg_replace('/[^0-9]/', '', $phone_number))
    {
      echo '<span class="form-error" >Please enter a valid Phone Number</span>';
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$first_name))
    {
      echo '<span class="form-error" >Please enter a valid first name</span>';
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$last_name))
    {
      echo '<span class="form-error" >Please enter a valid last name</span>';
    }
    // else if(strlen($pass) <7)
    // {
    //   echo '<span class="form-error" > Password length must be greater than 6</span>';
    // }
    else if(strcmp($pass,$cpass)!=0)// If the two passwords missmatch
    {
      echo '<span class="form-error" > Password Missmatch</span>';
    }
    else if(strlen($phone_number)!=10)// Phone number must be 10 digits long
    {
      echo '<span class="form-error" >Enter a valid 10 digit Phone Number</span>';
    }
    else // All preliminary checks complete go to filter phase
    {
      // Filter the user inputs
      $hpwd = password_hash($pass,PASSWORD_BCRYPT);
      $hash = md5(rand(0,1000));
      

      //Check the user is already registered.
      $check=$mysqli->query("SELECT id FROM users WHERE aadhaar = '".$aadhaar."'"); // SQL Query.

      if($check->num_rows>0)// If a row is found the user is already registered.
      {
        echo '<span class="form-error">This Aadhaar Number is already registered.</span>';
        echo $aadhaar;
      }
      else
      {
        // Insert the new user details into the database.
        $q1=$mysqli->prepare("INSERT INTO users (fname,lname,phone_no,aadhaar,pswd) VALUES (?,?,?,?,?)");
        $q1->bind_param('sssss',$first_name, $last_name,$phone_number,$aadhaar,$hpwd);
        if($q1->execute())
        {
          $success = true; 

          echo '<span class="form-success">Thank you for registring! You can now log in!</span>';
        }
        else
        {
          echo '<span class="form-error">Oh no! We encountered a fatal error. Please try again later</span>';
        }
      }
    }
  }

  else // Database connection Error or Submit button press wasn't registered properly.
  {
    echo '<span class="form-error">The Server Failed to Respond</span>';
  }
}
// End of valid POST request processing by server.

else // Prevent a user to simply jump to this page.
{
  header('location: '.$jump_prevent_send_back);
}
?>

<!-- Response Ajax Script -->
<script>
  function custom_wait()
  {
    setTimeout(function(){window.location = 'login.html';}, 3000);
  }
  document.getElementById("form-submit").disabled = false;
  $("#form-password, #form-first-name, #form-last-name, #form-phone-number, #form-aadhaar").removeClass("input-error");

  var errorfirstname="<?php echo $Empty_First_Name_error; ?>";
  var errorlastname="<?php echo $Empty_Last_Name_error; ?>";
  var errorphonenumber="<?php echo $Empty_Phone_Number_error; ?>";
  var errorPass="<?php echo $Empty_Pass_error; ?>";
  var success ="<?php echo $success ?>";

  if(errorEmail == true)
  {
    $("#form-email").addClass("input-error");
  }
  if(errorPass == true)
  {
    $("#form-password").addClass("input-error");
    $("#form-password-confirm").addClass("input-error");
  }
  if(errorfirstname == true)
  {
    $("#form-first-name").addClass("input-error");
  }
  if(errorlastname == true)
  {
    $("#form-last-name").addClass("input-error");
  }
  if(errorphonenumber == true)
  {
    $("#form-phone-number").addClass("input-error");
  }
</script>
<noscript>
      <span style="color:red; text-align: center;">Hey! Javascript is disabled. Your Browser is no longer supported! Please enable Javascript.</span>
      <span> To learn how to enable javascript please <a href="https://www.whatismybrowser.com/guides/how-to-enable-javascript/chrome">click here</a></span>
      </div>
</noscript>