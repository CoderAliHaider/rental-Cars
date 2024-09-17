<!-- <!DOCTYPE html>
<html lang="en">
<head>
    
    <title>REGISTRATION</title>
   <link rel="stylesheet" href="css/regs.css" type="text/css">
</head>
<body>
    
<?php

require_once('connection.php');
if (isset($_POST['regs'])) {
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $lic = mysqli_real_escape_string($con, $_POST['lic']);
  $ph = mysqli_real_escape_string($con, $_POST['ph']);

  $pass = mysqli_real_escape_string($con, $_POST['pass']);
  $cpass = mysqli_real_escape_string($con, $_POST['cpass']);
  $gender = mysqli_real_escape_string($con, $_POST['gender']);
  $Pass = md5($pass);
  if (empty($fname) || empty($lname) || empty($email) || empty($lic) || empty($ph) || empty($pass) || empty($gender)) {
    echo '<script>alert("please fill the place")</script>';
  } else {
    if ($pass == $cpass) {
      $sql2 = "SELECT *from users where EMAIL='$email'";
      $res = mysqli_query($con, $sql2);
      if (mysqli_num_rows($res) > 0) {
        echo '<script>alert("EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!")</script>';
        echo '<script> window.location.href = "index.php";</script>';

      } else {
        $sql = "insert into users (FNAME,LNAME,EMAIL,LIC_NUM,PHONE_NUMBER,PASSWORD,GENDER) values('$fname','$lname','$email','$lic',$ph,'$Pass','$gender')";
        $result = mysqli_query($con, $sql);


        // $to_email = $email;
        // $subject = "NO-REPLY";
        // $body = "THIS MAIL CONTAINS YOUR AUTHENTICATION DETAILS....\nYour Password is $pass and Your Registered email is $to_email"
        //          ;
        // $headers = "From: sender email";

        // if (mail($to_email, $subject, $body, $headers))

        // {
        //     echo "Email successfully sent to $to_email...";
        // }

        // else

        // {
        // echo "Email sending failed!";
        // }
        if ($result) {
          echo '<script>alert("Registration Successful Press ok to login")</script>';
          echo '<script> window.location.href = "index.php";</script>';
        } else {
          echo '<script>alert("please check the connection")</script>';
        }

      }

    } else {
      echo '<script>alert("PASSWORD DID NOT MATCH")</script>';
      echo '<script> window.location.href = "register.php";</script>';
    }
  }
}


?>



  <style>
      body{
        background:  #fdcd3b;
        background-size: auto;
         background-position:unset;
         /* background-repeat: ; */
      }
      input#psw{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}
input#cpsw{
    width:300px;
    border:1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow:inset 1px 1px 5px rgba(0,0,0,0.3);
}
  #message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  
  width: 400px;
  margin-left:1000px;
  margin-top: -500px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}</style> 

    <button id="back"><a href="index.php">HOME</a></button>
    <h1 id="fam">JOIN OUR FAMILY OF CARS!</h1>
 <div class="main">
        
        <div class="register">
        <h2>Register Here</h2>
        
        <form id="register" action="register.php" method="POST">    
            <label>First Name : </label>
            <br>
            <input type ="text" name="fname"
            id="name" placeholder="Enter Your First Name" required>
            <br><br>

            <label>Last Name : </label>
            <br>
            <input type ="text" name="lname"
            id="name" placeholder="Enter Your Last Name" required>
            <br><br>

            <label>Email : </label>
            <br>
            <input type="email" name="email"
            id="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex: example@ex.com"placeholder="Enter Valid Email" required>
            <br><br>
            
            <label>Your License number : </label>
            <br>
            <input type="text" name="lic"
            id="name" placeholder="Enter Your License number" required>
            <br><br>

            <label>Phone Number : </label>
            <br>
            <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)"
            id="name" placeholder="Enter Your Phone Number" required>
            <br><br>

            

            <label>Password : </label>
            <br>
            <input type="password" name="pass" maxlength="12"
            id="psw" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <br><br>
            <label>Confirm Password : </label>
            <br>
            <input type="password" name="cpass" 
            id="cpsw" placeholder="Renter the password" required>
            <br><br>
            <tr>
                <td><label">Gender : </label></td><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
                    <label for="one">Male</label>
                    <input type="radio" id="input_enabled" name="gender" value="male" style="width:200px">
                </td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                <td>
                    <label for="two">Female</label>
                    <input type="radio" id="input_disabled" name="gender" value="female" style="width:160px" />
                </td>
            </tr>
            <br><br>

            <input type="submit" class="btnn"  value="REGISTER" name="regs" style="background-color: #ff7200;color: white">
            
        
        
        </input>
            
        </form>
        </div> 
    </div>
    <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>  
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGISTRATION</title>
  <style>
    /* General body styling */
    body {
      font-family: Arial, sans-serif;
      background-color: ;
      margin: 0;
      padding: 0;
      background-color: #f0f0f0;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Button styling */
    button#back {
      background-color: #f0a500;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      position: absolute;
      top: 20px;
      left: 20px;
      text-decoration: none;
    }

    button#back a {
      text-decoration: none;
      color: white;
    }

    /* Heading styling */
    h1#fam {
      color: white;
      text-align: center;
      font-size: 36px;
      margin-top: 50px;
      color: black;
    }

    /* Main container styling */
    .main {
      margin-left: 150px;
      margin-right: 150px;

      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Register form heading */
    .register h2 {
      color: #333;
      text-align: center;
      margin-bottom: 20px;
    }

    /* Form input field styling */
    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="tel"] {
      width: 100%;
      padding: 10px;
      margin: 5px 0 15px 0;
      display: inline-block;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-sizing: border-box;
    }

    /* Radio button styling */
    input[type="radio"] {
      margin: 10px 10px 10px 0;
    }

    /* Submit button styling */
    input.btnn {
      width: 15%;
      background-color: #f0a500;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 18px;
    }

    input.btnn:hover {
      background-color: #e66900;
    }

    /* Password strength message styling */
    #message {
      display: none;
      background-color: #f1f1f1;
      padding: 20px;
      margin-top: 20px;
      border-radius: 5px;
    }

    #message p {
      font-size: 16px;
    }

    .valid {
      color: green;
    }

    .invalid {
      color: red;
    }

    .valid:before,
    .invalid:before {
      content: "✔";
      position: relative;
      left: -10px;
    }

    .invalid:before {
      content: "✖";
    }
  </style>
</head>

<body>

  <?php

  require_once('connection.php');
  if (isset($_POST['regs'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $lic = mysqli_real_escape_string($con, $_POST['lic']);
    $ph = mysqli_real_escape_string($con, $_POST['ph']);

    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $cpass = mysqli_real_escape_string($con, $_POST['cpass']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $Pass = md5($pass);
    if (empty($fname) || empty($lname) || empty($email) || empty($lic) || empty($ph) || empty($pass) || empty($gender)) {
      echo '<script>alert("please fill the place")</script>';
    } else {
      if ($pass == $cpass) {
        $sql2 = "SELECT *from users where EMAIL='$email'";
        $res = mysqli_query($con, $sql2);
        if (mysqli_num_rows($res) > 0) {
          echo '<script>alert("EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!")</script>';
          echo '<script> window.location.href = "index.php";</script>';

        } else {
          $sql = "insert into users (FNAME,LNAME,EMAIL,LIC_NUM,PHONE_NUMBER,PASSWORD,GENDER) values('$fname','$lname','$email','$lic',$ph,'$Pass','$gender')";
          $result = mysqli_query($con, $sql);

          if ($result) {
            echo '<script>alert("Registration Successful Press ok to login")</script>';
            echo '<script> window.location.href = "index.php";</script>';
          } else {
            echo '<script>alert("please check the connection")</script>';
          }

        }

      } else {
        echo '<script>alert("PASSWORD DID NOT MATCH")</script>';
        echo '<script> window.location.href = "register.php";</script>';
      }
    }
  }


  ?>

  <button id="back"><a href="index.php">HOME</a></button>
  <h1 id="fam">JOIN OUR FAMILY OF CARS!</h1>
  <div class="main">
    <div class="register">
      <h2>Register Here</h2>

      <form id="register" action="register.php" method="POST">
        <div style="display:flex; justify-content:space-between;">
          <div style="width:48%">
            <label>First Name : </label>
            <input type="text" name="fname" id="name" placeholder="Enter Your First Name" required>
          </div>

          <div style="width:48%">
            <label>Last Name : </label>
            <input type="text" name="lname" id="name" placeholder="Enter Your Last Name" required>
          </div>
        </div>
        <div style="display:flex; justify-content:space-between;">
          <div style="width:48%">
          <label>Email : </label>
          <input type="email" name="email" id="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
          title="ex: example@ex.com" placeholder="Enter Valid Email" required>
          </div>

          <div style="width:48%">
          <label>Phone Number : </label>
          <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)" id="name"
          placeholder="Enter Your Phone Number" required>
          </div>
        </div>
    

    
  

    

  
    <div style="display:flex; justify-content:space-between;">
          <div style="width:48%">
          <label>Password : </label>
          <input type="password" name="pass" maxlength="12" id="psw" placeholder="Enter Password"
      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
      title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
      required>
          </div>

          <div style="width:48%">
          <label>Confirm Password : </label>
          <input type="password" name="cpass" id="cpsw" placeholder="Renter the password" required>
          </div>
        </div>


   

    <div style="display:flex; justify-content:space-between;">
          <div style="width:48%">
          <label>Gender : </label>
    <label for="one">Male</label>
    <input type="radio" id="input_enabled" name="gender" value="male" style="">
    <label for="two">Female</label>
    <input type="radio" id="input_disabled" name="gender" value="female" style="" />
          </div>

          <div style="width:48%">
          <label>Your License number : </label>
    
    <input type="text" name="lic" id="name" placeholder="Enter Your License number" required>
    
          </div>
        </div>


  
  

    <input type="submit" class="btnn" value="REGISTER" name="regs">
    </form>
  </div>
  </div>

  <div id="message">
    <h3>Password must contain the following:</h3>
    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
    <p id="number" class="invalid">A <b>number</b></p>
    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
  </div>

  <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    myInput.onfocus = function () {
      document.getElementById("message").style.display = "block";
    }

    myInput.onblur = function () {
      document.getElementById("message").style.display = "none";
    }

    myInput.onkeyup = function () {
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }

    function onlyNumberKey(evt) {
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
        return false;
      }
      return true;
    }
  </script>

</body>

</html>