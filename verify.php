<?php
include_once('php/config.php');
include_once('php/session.php');


if($connected_successfully == true && isset($_POST['submit']))
{
  $phone = $_POST['phone'];
  $pass = $_POST['pass'];
  $Empty_phone_error = false;
  $Empty_Pass_error = false;
  $user="";
  $success = false;

  if(empty($phone) || empty($pass))
  {
    echo '<span class="form-error">Please fill in all fields.</span>';
    $Empty_phone_error = true;
    $Empty_Pass_error = true;
  }
  else
  {
    // Now its time to connect query the database and find the user and check his/her password.
    $q1=$mysqli->query("SELECT id,fname,lname,phone_no,aadhaar,pswd,type FROM users WHERE phone_no='$phone'");
    if($q1)
    {
      $q1_res=$q1->fetch_object();
      if(password_verify($pass,$q1_res->pwd) && $q1_res->email == $email)
      {
              $phone_verified_flag = true;
              $admin_approved_flag = false;

              if($phone_verified_flag == true )
              {
                $_SESSION['user_id']=$q1_res->id;
                $_SESSION['first_name']=$q1_res->first_name;
                $_SESSION['last_name']=$q1_res->last_name;
                $_SESSION['id']=$q1_res->id;
                $success = true;
              }
      } 
      else
      {
        echo '<span class="form-error">Wrong Password or Phone</span>';
      }
    }
    else
    {
      echo '<span class="form-error">Oh no! We encountered a fatal error. Please try again later</span>';
    }
}
}
else
{
  echo '<span class="form-error">The Server Failed to Respond</span>';
}
 ?>
<script>

  $("#from-phone, #form-password").removeClass("input-error");

  var errorphone="<?php echo $Empty_phone_error; ?>";
  var errorPass="<?php echo $Empty_Pass_error; ?>";
  var user ="<?php echo $user ?>";
  var success ="<?php echo $success ?>";

//   if(errorPhone == true)
//   {
//     $("#form-phone").addClass("input-error");
//   }
//   if(errorPass == true)
//   {
//     $("#form-password").addClass("input-error");
//   }
//   if(errorEmail == false  && errorPass == false)
//   {
//     $("#from-email, #form-password").val("");
//   }
//   if(user == true)
//   {
//     if(success == true)
//     {
//       window.location = 'index.php';
//     }
//   }
//   if(user == false)
//   {
//     if(success == true)
//     {
//       window.location = 'bookingdata.php';
//     } 
//   }
//   else
//   {
//     window.location = 'contact.php';
//   }
</script>

<noscript>
      <div style="border: 1px solid purple; padding: 10px; text-align: center;">
      <span style="color:red; text-align: center;">Hey! Javascript is disabled. Your Browser is no longer supported! Please enable Javascript.</span>
      <span> To learn how to enable javascript please <a href="https://www.whatismybrowser.com/guides/how-to-enable-javascript/chrome">click here</a></span>
      <p style="text-align:center"><img src="images/hack.jpg"></p>
      </div>
</noscript>