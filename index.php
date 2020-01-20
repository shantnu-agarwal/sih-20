<?php
include ('php/session.php');
include ('php/config.php');
?>
<!-- <noscript>
      <div style="border: 1px solid purple; padding: 10px; text-align: center;">
      <span style="color:red; text-align: center;">Hey! Javascript is disabled. Your Browser is no longer supported! Please enable Javascript.</span>
      <span> To learn how to enable javascript please <a href="https://www.whatismybrowser.com/guides/how-to-enable-javascript/chrome">click here</a></span>
      <p style="text-align:center"><img src="images/hack.jpg"></p>
      </div>
</noscript> -->
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
  <script src="js/cities.js"></script>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Farm IT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item active">
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



<?php
$apiKey = "e01c6e2b3f0163501998a65c5903e812";
$cityId = "1264527";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>


<div class="report-container">
        <h2><?php echo $data->name; ?> Weather Status</h2>
        <div class="time">
            <div><?php echo "Today is " . date("Y/m/d") . "<br>"; ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>



    <div class="container">
    <h1 style="text-align: center;" >Get Crop Suggestion</h1>
    <p class="text-muted text-center" style="margin-bottom:2em">Fill in the provided fields and we will give you a crop best suited for you.</p>
    <div class="row">
      <div class="col">
    <form>
    <div class="form-row">
    <select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" class="form-control col-md-6" required></select>
<select id ="state" class="form-control col-md-6" required></select>
<script language="javascript">print_state("sts");</script>
  <!-- <div class="form-group col-md-6">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state" aria-describedby="emailHelp">
  </div>
  <div class="form-group col-md-6">
    <label for="district">District</label>
    <input type="text" class="form-control" id="district" aria-describedby="emailHelp">
  </div> -->
            </div>
  <div class="form-group">
    <label for="budget">Budget</label>
    <input type="text" class="form-control" id="budget" aria-describedby="emailHelp">
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="season">Season</label>
      <select id="season" class="form-control">
        <option selected>Choose...</option>
        <option >Rabi</option>
        <option >Kharrif</option>
        <option >Summer</option>
        <option >All Year</option>
        
      </select>
    </div>
    <div class="form-group col-md-6">
    <label for="landsize">Land Size</label>
    <input type="text" class="form-control" id="landsize" aria-describedby="emailHelp">
  </div>
            </div>
  <button type="submit" class="btn btn-primary">Get Crop Suggestion!</button>
</form>
</div>
<div class="col"></div>
</div>
</div>
<div class="container">
<h1 style="text-align: center">State Based Information</h1>
<p class="text-muted text-center">Data provided by government of India</p>
<p class="text-muted text-center">Click on a state to know more about the services available.</p>
    <div class="mx-auto">
            <table style="width: 80%; height: 434px; clear: both; margin: 0; padding: 0;" border="0">
                <tbody>
                    <tr>
                        <td>
                            <p align="center" style="padding: 0px 0px 0px 50px">
                                <img style="margin-left:250px;" src="india.png" usemap="#Map" border="0" alt=" " width="494" height="529" />
                                <map name="Map" id="Map1">
                                    <area href="	http://www.apagrisnet.gov.in" alt="ANDHRA PRADESH" shape="poly" coords="154,384,165,385,180,380,191,374,201,369,214,371,222,363,225,354,243,347,256,337,265,329,280,331,274,343,263,352,254,359,245,366,239,370,239,377,230,379,221,385,217,387,210,395,206,406,211,417,211,426,201,431,188,435,182,439,174,443,177,434,170,427,169,421,162,423,153,422,149,419,148,410,146,401,150,394" />
                                    <area href="http://agri.telangana.gov.in/" alt="TELANGANA" shape="poly" coords="158,382,159,366,160,351,159,340,166,331,177,320,190,323,201,324,202,338,210,339,217,342,222,353,224,361,219,371,210,372,200,373,193,377,188,382,182,385,168,389,163,384" />
                                    <area href="https://agri-horti.assam.gov.in/" alt="ASSAM" shape="poly" coords="357, 206, 355, 198, 356, 186, 363, 184, 369, 186, 382, 184, 389, 182, 392, 178, 398, 177, 403, 178, 410, 177, 416, 169, 421, 164, 429, 162, 436, 157, 443, 154, 442, 159, 445, 165, 437, 169, 434, 173, 424, 181, 420, 185, 417, 194, 411, 199, 410, 205, 408, 220, 403, 224, 400, 228, 396, 228, 394, 221, 397, 216, 396, 211, 398, 207, 395, 203, 392, 199, 388, 197, 387, 194, 373, 200, 365, 199, 360, 201" />
                                    <area href="http://krishi.bih.nic.in" alt="BIHAR" shape="poly" coords="266, 179, 272, 180, 276, 183, 280, 187, 289, 191, 295, 192, 301, 192, 306, 196, 311, 193, 315, 197, 325, 196, 327, 200, 328, 205, 330, 209, 327, 211, 327, 219, 321, 221, 319, 229, 315, 231, 311, 235, 306, 231, 302, 229, 298, 231, 290, 234, 284, 235, 278, 236, 274, 232, 266, 232, 261, 230, 260, 223, 267, 216, 276, 210, 278, 209, 274, 205, 269, 202, 272, 198, 269, 195, 273, 192" />
                                    <area href="	https://agri.gujarat.gov.in/" alt="GUJARAT" shape="poly" coords="58, 233, 56, 228, 67, 226, 80, 228, 87, 233, 90, 231, 92, 236, 95, 238, 97, 244, 100, 248, 103, 250, 105, 252, 111, 256, 112, 261, 109, 264, 108, 268, 106, 272, 107, 278, 104, 280, 104, 283, 110, 285, 104, 289, 100, 292, 103, 296, 101, 302, 97, 299, 95, 305, 93, 308, 90, 304, 86, 301, 82, 298, 80, 288, 84, 284, 80, 283, 82, 280, 79, 276, 80, 273, 76, 272, 75, 282, 73, 290, 66, 293, 61, 297, 57, 293, 52, 294, 52, 298, 46, 298, 37, 288, 33, 284, 26, 278, 22, 273, 19, 268, 25, 267, 31, 267, 38, 266, 46, 257, 41, 256, 37, 259, 33, 261, 24, 260, 19, 254, 13, 250, 14, 243, 16, 240, 10, 243, 8, 239, 12, 238, 19, 237, 19, 231, 28, 234, 34, 236, 36, 237, 44, 233, 51, 232" />
                                    <area href="	http://agriharyana.gov.in/" alt="HARYANA" shape="poly" coords="159, 122, 162, 126, 165, 126, 163, 130, 159, 136, 160, 153, 157, 157, 156, 161, 160, 164, 164, 164, 164, 171, 160, 174, 156, 174, 155, 168, 151, 170, 147, 167, 144, 172, 141, 171, 140, 165, 135, 159, 132, 150, 129, 146, 123, 145, 119, 144, 120, 139, 119, 134, 124, 132, 130, 138, 140, 136, 150, 129" />
                                    <area href="http://www.hpagriculture.com/" alt="HIMACHAL PRADESH" shape="poly" coords="185, 110, 185, 101, 181, 94, 180, 89, 179, 84, 173, 85, 170, 79, 164, 80, 157, 77, 151, 76, 144, 77, 139, 79, 140, 83, 141, 87, 137, 91, 137, 96, 141, 100, 142, 106, 146, 109, 149, 110, 152, 115, 154, 117, 159, 121, 162, 124, 168, 125, 169, 119, 173, 113, 178, 109" />
                                    <area href="http://www.jkapd.nic.in/" alt="JAMMU AND KASHMIR" shape="poly" coords="130, 92, 120, 89, 120, 85, 116, 84, 110, 81, 105, 76, 105, 63, 103, 51, 110, 45, 114, 43, 111, 39, 108, 37, 107, 33, 102, 33, 99, 29, 92, 29, 91, 20, 102, 11, 112, 11, 110, 8, 115, 9, 120, 5, 122, 7, 127, 5, 134, 6, 141, 14, 148, 19, 153, 24, 155, 28, 163, 30, 167, 35, 177, 32, 186, 28, 192, 27, 196, 27, 200, 29, 205, 32, 209, 36, 205, 44, 203, 52, 199, 56, 195, 61, 188, 61, 188, 64, 189, 66, 187, 71, 190, 74, 195, 74, 195, 80, 196, 84, 195, 89, 188, 93, 183, 89, 179, 88, 179, 83, 174, 85, 170, 78, 163, 80, 155, 75, 148, 75, 142, 78, 139, 78, 141, 84, 137, 90" />
                                    <area href="http://raitamitra.kar.nic.in/KAN/index.asp" alt="KARNATAKA" shape="poly" coords="160, 340, 163, 344, 165, 349, 161, 354, 166, 356, 161, 362, 161, 369, 159, 374, 163, 376, 162, 382, 156, 382, 154, 386, 152, 390, 155, 395, 149, 398, 149, 404, 153, 412, 162, 412, 164, 420, 169, 420, 175, 425, 180, 429, 176, 436, 170, 437, 165, 441, 162, 446, 165, 450, 162, 453, 155, 455, 148, 457, 143, 456, 136, 451, 128, 449, 123, 444, 119, 438, 114, 435, 111, 426, 108, 410, 103, 400, 105, 394, 105, 386, 109, 379, 109, 370, 119, 366, 130, 364, 131, 358, 142, 358" />
                                    <area href="http://www.keralaagriculture.gov.in/" alt="KERALA" shape="poly" coords="113, 436, 124, 445, 135, 452, 141, 460, 144, 462, 148, 468, 150, 475, 151, 481, 157, 483, 156, 493, 158, 497, 155, 505, 155, 516, 145, 511, 140, 499, 135, 482, 131, 470, 135, 463, 130, 459, 127, 459, 120, 451, 117, 444" />
                                    <area href="http://mpkrishi.mp.gov.in/" alt="MADHYA PRADESH" shape="poly" coords="108, 280, 108, 271, 112, 264, 113, 256, 118, 255, 116, 251, 121, 245, 120, 236, 119, 232, 123, 225, 127, 224, 128, 228, 134, 228, 136, 234, 135, 239, 130, 239, 131, 244, 137, 242, 143, 237, 151, 237, 154, 239, 154, 233, 159, 228, 156, 225, 160, 223, 163, 221, 161, 216, 156, 217, 152, 217, 149, 210, 153, 206, 159, 199, 165, 197, 172, 193, 176, 191, 183, 190, 187, 193, 189, 199, 185, 207, 180, 214, 177, 220, 176, 225, 176, 229, 181, 235, 187, 235, 187, 230, 184, 224, 185, 218, 190, 219, 196, 223, 202, 222, 209, 218, 213, 221, 219, 222, 225, 224, 229, 222, 233, 224, 238, 227, 244, 231, 249, 231, 251, 239, 250, 245, 250, 248, 246, 248, 241, 248, 238, 245, 233, 247, 234, 251, 238, 255, 241, 257, 239, 262, 238, 263, 236, 267, 228, 272, 227, 270, 222, 277, 219, 287, 216, 289, 213, 284, 204, 285, 195, 283, 188, 286, 181, 286, 173, 289, 165, 287, 166, 281, 155, 283, 147, 289, 142, 293, 141, 288, 133, 287, 125, 288, 118, 281, 113, 277" />
                                    <area href="http://krishi.maharashtra.gov.in" alt="MAHARASHTRA" shape="poly" coords="93, 387, 88, 374, 88, 361, 84, 346, 82, 335, 84, 330, 80, 328, 80, 318, 80, 311, 86, 312, 94, 309, 97, 301, 101, 302, 103, 299, 101, 293, 109, 287, 105, 284, 107, 279, 113, 279, 116, 282, 122, 287, 130, 290, 140, 290, 144, 293, 151, 287, 161, 283, 164, 288, 172, 289, 185, 286, 194, 283, 203, 284, 213, 285, 216, 291, 215, 296, 218, 304, 214, 308, 214, 313, 215, 317, 219, 322, 216, 326, 212, 333, 206, 335, 205, 325, 199, 319, 193, 321, 185, 320, 182, 317, 174, 324, 170, 325, 168, 331, 165, 337, 162, 342, 159, 339, 153, 345, 149, 349, 146, 351, 141, 356, 143, 358, 139, 358, 134, 357, 131, 359, 129, 363, 124, 364, 119, 364, 117, 367, 110, 370, 106, 370, 108, 377, 105, 384" />
                                    <area href="http://agrimanipur.gov.in/" alt="MANIPUR" shape="poly" coords="411, 209, 420, 206, 425, 203, 432, 201, 430, 208, 432, 215, 429, 223, 425, 231, 418, 232, 412, 230, 407, 228, 405, 221, 409, 215" />
                                    <area href="http://www.megagriculture.gov.in/" alt="MEGHALAYA" shape="poly" coords="358, 208, 359, 203, 362, 200, 368, 199, 376, 201, 383, 198, 385, 195, 388, 202, 392, 202, 396, 208, 395, 212, 388, 214, 382, 216, 372, 215, 365, 216, 357, 214" />
                                    <area href="http://agringl.nic.in/" alt="NAGALAND" shape="poly" coords="411, 208, 411, 200, 416, 194, 420, 187, 425, 179, 433, 174, 438, 180, 436, 186, 436, 195, 431, 204, 431, 199, 427, 203, 422, 201, 416, 208" />
                                    <area href="http://agriodisha.nic.in/" alt="ORISSA" shape="poly" coords="273, 269, 282, 271, 290, 269, 290, 275, 296, 276, 303, 277, 304, 270, 313, 273, 320, 275, 328, 279, 327, 283, 320, 289, 319, 293, 317, 301, 312, 309, 299, 315, 292, 316, 289, 324, 279, 331, 267, 328, 263, 332, 258, 337, 253, 341, 248, 339, 247, 344, 235, 348, 233, 348, 237, 340, 246, 331, 244, 326, 240, 316, 249, 317, 252, 317, 249, 312, 247, 302, 249, 295, 256, 293, 264, 284, 268, 276" />
                                    <area href="http://agripb.gov.in/" alt="PUNJAB" shape="poly" coords="131, 93, 128, 97, 124, 98, 118, 103, 118, 111, 115, 121, 109, 126, 108, 132, 114, 134, 119, 134, 122, 131, 126, 133, 129, 136, 130, 138, 133, 135, 139, 134, 143, 136, 146, 131, 148, 127, 151, 129, 152, 124, 151, 116, 150, 112, 143, 108, 142, 99, 137, 94, 134, 91" />
                                    <area href="http://agriculture.rajasthan.gov.in/" alt="RAJASTHAN" shape="poly" coords="108, 132, 117, 134, 120, 139, 119, 145, 127, 148, 132, 151, 135, 158, 139, 164, 140, 170, 146, 174, 147, 169, 151, 170, 155, 169, 157, 175, 163, 175, 165, 180, 169, 186, 172, 191, 166, 196, 156, 200, 150, 206, 148, 212, 153, 217, 161, 216, 162, 220, 155, 225, 158, 229, 153, 231, 154, 239, 150, 235, 145, 236, 142, 236, 135, 242, 131, 241, 137, 237, 138, 230, 133, 228, 129, 228, 129, 225, 125, 223, 121, 224, 121, 228, 117, 232, 119, 236, 121, 242, 120, 246, 115, 250, 116, 255, 111, 257, 107, 252, 102, 250, 99, 245, 96, 241, 95, 237, 91, 236, 91, 229, 86, 232, 78, 227, 68, 226, 60, 226, 57, 226, 53, 221, 51, 213, 51, 211, 47, 210, 41, 204, 43, 198, 43, 195, 38, 191, 35, 185, 37, 180, 44, 173, 50, 167, 58, 171, 69, 170, 92, 150, 82, 157, 97, 143, 100, 136" />
                                    <area href="http://www.tn.gov.in/department/2" alt="TAMILNADU" shape="poly" coords="209, 425, 212, 434, 208, 441, 204, 448, 201, 452, 198, 456, 201, 460, 203, 466, 199, 470, 200, 475, 204, 476, 203, 480, 195, 480, 190, 488, 188, 493, 188, 499, 179, 499, 174, 504, 171, 510, 165, 517, 158, 518, 156, 510, 157, 501, 159, 493, 157, 491, 156, 482, 152, 480, 150, 473, 145, 464, 137, 452, 145, 457, 157, 458, 166, 450, 163, 446, 166, 439, 178, 442, 184, 434, 193, 434, 197, 430" />
                                    <area href="http://agri.tripura.gov.in/" alt="TRIPURA" shape="poly" coords="393, 227, 389, 230, 382, 234, 379, 240, 381, 248, 382, 253, 384, 249, 388, 253, 390, 246, 392, 239, 396, 239" />
                                    <area href="http://upagripardarshi.gov.in/StaticPages/UttarPradesh4.aspx" alt="UTTAR PRADESH" shape="poly" coords="167, 127, 168, 138, 170, 144, 172, 145, 177, 141, 183, 146, 187, 152, 197, 157, 204, 160, 205, 158, 212, 159, 217, 163, 222, 167, 222, 166, 229, 171, 238, 174, 244, 177, 251, 179, 261, 180, 267, 181, 268, 185, 272, 189, 272, 193, 267, 195, 271, 198, 268, 200, 277, 207, 274, 210, 269, 211, 265, 215, 262, 218, 258, 222, 261, 228, 261, 236, 258, 242, 252, 243, 251, 237, 251, 229, 246, 229, 243, 229, 240, 225, 232, 222, 226, 221, 223, 225, 219, 222, 214, 222, 210, 217, 205, 219, 200, 223, 195, 222, 194, 221, 191, 221, 188, 215, 182, 218, 184, 226, 186, 234, 181, 234, 176, 230, 178, 222, 181, 213, 188, 202, 189, 195, 185, 190, 179, 190, 174, 190, 169, 189, 168, 182, 164, 179, 162, 173, 164, 163, 161, 155, 161, 144, 161, 135" />
                                    <area href="https://wb.gov.in/portal/web/guest/agriculture" alt="WEST BENGAL" shape="poly" coords="316, 273, 314, 263, 307, 257, 301, 255, 302, 248, 312, 244, 321, 238, 328, 229, 329, 220, 327, 214, 330, 207, 329, 200, 329, 189, 337, 187, 346, 186, 353, 188, 354, 193, 353, 200, 349, 200, 344, 197, 340, 197, 336, 197, 333, 199, 333, 206, 337, 209, 341, 210, 344, 214, 340, 215, 337, 218, 334, 222, 332, 223, 333, 229, 337, 231, 341, 234, 339, 240, 342, 246, 343, 250, 346, 252, 346, 257, 347, 263, 347, 271, 346, 277, 341, 278, 334, 276, 331, 280, 322, 275" />
                                    <area href="http://www.sikkimagrisnet.org" alt="SIKKIM" shape="poly" coords="329, 188, 326, 182, 328, 176, 329, 172, 328, 168, 330, 166, 336, 163, 338, 167, 338, 171, 339, 176, 340, 183, 349, 186, 338, 188, 333, 187" />
                                    <area href="http://agridept.cg.gov.in" alt="CHATTISHGARH" shape="poly" coords="221, 321, 215, 318, 216, 312, 214, 309, 218, 306, 216, 302, 216, 299, 214, 296, 216, 290, 221, 287, 223, 279, 227, 274, 231, 271, 237, 264, 244, 259, 242, 254, 239, 252, 234, 248, 242, 249, 251, 248, 252, 243, 257, 243, 261, 240, 267, 245, 270, 249, 271, 255, 273, 258, 271, 264, 273, 268, 271, 273, 266, 275, 263, 281, 262, 286, 257, 292, 253, 289, 245, 299, 247, 306, 249, 312, 252, 317, 246, 315, 239, 312, 240, 318, 244, 324, 245, 329, 240, 336, 235, 341, 230, 348, 225, 352, 221, 344, 217, 339, 211, 334, 212, 327, 217, 326, 220, 326" />
                                    <area href="http://www.jharkhand.gov.in/agri" alt="JHARKAND" shape="poly" coords="264, 232, 276, 233, 281, 237, 288, 234, 299, 231, 304, 230, 309, 234, 317, 230, 320, 221, 327, 219, 328, 224, 324, 233, 319, 239, 309, 244, 306, 247, 301, 248, 300, 254, 307, 255, 311, 257, 314, 265, 314, 273, 305, 270, 303, 276, 291, 275, 290, 269, 280, 271, 273, 268, 275, 261, 271, 253, 269, 246, 263, 241, 261, 238" />
                                    <area href="http://agriculture.uk.gov.in/" alt="UTTARKHAND" shape="poly" coords="167, 127, 169, 120, 176, 113, 180, 110, 186, 110, 191, 110, 195, 117, 200, 118, 207, 120, 207, 124, 214, 126, 218, 129, 217, 133, 212, 137, 210, 142, 208, 147, 206, 154, 203, 159, 200, 158, 196, 157, 194, 155, 188, 152, 186, 146, 180, 144, 179, 139, 176, 141, 171, 144, 168, 136" />
                                    <area href="http://agri.and.nic.in" alt="A_AND_N_ISLANDS" shape="poly" coords="407, 378, 401, 395, 398, 400, 396, 406, 394, 410, 393, 418, 393, 425, 389, 433, 385, 435, 389, 451, 394, 454, 397, 469, 402, 481, 412, 499, 422, 515, 429, 516, 422, 504, 421, 495, 421, 486, 410, 480, 403, 471, 400, 454, 403, 434, 414, 428, 419, 421, 422, 400, 417, 388" />
                                    <area href="http://arunachalpradesh.nic.in" alt="ARUNACHAL_PRADESH" shape="poly" coords="389, 178, 386, 173, 381, 171, 380, 164, 384, 166, 390, 165, 394, 163, 397, 157, 404, 154, 404, 149, 411, 147, 413, 145, 418, 139, 424, 134, 434, 137, 442, 131, 448, 132, 448, 137, 452, 138, 453, 147, 464, 150, 464, 158, 461, 163, 464, 169, 457, 167, 443, 179, 434, 177, 437, 171, 445, 167, 444, 161, 444, 154, 422, 164, 414, 172, 409, 176" />
                                    <area href="http://dnh.nic.in/Departments/Agriculture.aspx" alt="DADRA_AND_NAGAR_HAVELI" shape="poly" coords="82, 308, 87, 304, 93, 308, 88, 311, 83, 310" />
                                    <area href="http://agricoop.nic.in/" alt="DELHI" shape="poly" coords="158, 156, 160, 160, 159, 163, 162, 162, 162, 158, 160, 155" />
                                    <area href="http://lakagri.nic.in/" alt="LAKSHADWEEP" shape="poly" coords="59, 439, 55, 449, 58, 459, 61, 468, 62, 478, 64, 487, 74, 509, 81, 513, 78, 503, 76, 487, 74, 473, 88, 472, 86, 482, 92, 484, 93, 470, 84, 459, 81, 449, 71, 444" />
                                    <area href="http://agriculturemizoram.nic.in/" alt="MIZORAM" shape="poly" coords="408, 273, 413, 269, 413, 259, 411, 251, 415, 250, 414, 232, 409, 230, 405, 225, 402, 229, 396, 227, 396, 235, 396, 239, 398, 246, 399, 252, 401, 259, 403, 269" />
                                    <area href="http://agri.puducherry.gov.in/" alt="PUDUCHERRY" shape="poly" coords="241, 374, 241, 364, 246, 366, 247, 372" />
                                    <area href="http://agri.puducherry.gov.in/" alt="PUDUCHERRY" shape="poly" coords="205, 451, 198, 457, 202, 461, 205, 453" />
                                    <area href="http://agri.puducherry.gov.in/" alt="PUDUCHERRY" shape="poly" coords="204, 466, 199, 472, 202, 475, 205, 473" />
                                    <area href="http://agri.puducherry.gov.in/" alt="PUDUCHERRY" shape="poly" coords="126, 459, 133, 462, 132, 469, 128, 465" />
                                    <area href="http://agri.goa.gov.in" alt="GOA" shape="poly" coords="95, 387, 103, 386, 104, 391, 104, 399, 101, 399, 97, 392" />
                                    <area href="State.aspx?SCode=20" alt="" shape="poly" coords="413, 182, 415, 182, 417, 183, 419, 185, 419, 187, 419, 190, 419, 191, 417, 191" />
                                    <area href="#" alt="" coords="233, 94, 238, 90" />
                                    <area href="http://www.daman.nic.in/websites/zonal_agriculture_daman/index.asp" alt="Daman &amp; Diu" shape="poly" coords="53, 299, 54, 294, 59, 295, 57, 297, 54, 298" />
                                    <area href="http://agripb.gov.in" alt="CHANDIGARH" coords="151,118,156,116,158,121,154,126,152,121" />

                                </map>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            </div>
<script>
      $(document).foundation();
    </script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  <!-- <script>
    window.onload = function() {
  var startPos;
  var geoSuccess = function(position) {
    startPos = position;
    document.getElementById('startLat').innerHTML = startPos.coords.latitude;
    document.getElementById('startLon').innerHTML = startPos.coords.longitude;
  };
  navigator.geolocation.getCurrentPosition(geoSuccess);
};
    </script> -->
  </body>
</html>
