
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>CAR RENTAL</title>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <link  rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
    <style>
        /* CSS for Car Rental Login Page */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
    background-color: #f0f0f0;
}
.main_container{

}
.navbar {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar .logo {
    font-size: 24px;
    font-weight: bold;
}
.menu{
    display: flex;
    align-items: center;
    grid-gap:50px;
}
.navbar .menu ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.navbar .menu ul li {
    margin: 0 15px;
}

.navbar .menu ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    transition: color 0.3s;
}

.navbar .menu ul li a:hover {
    color: #f0a500;
}

 .adminbtn {
    background-color: #f0a500;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 16px;
    color: #fff;
    cursor: pointer;
}

  .adminbtn a {
    color: #fff;
    text-decoration: none;
}

.content {
    text-align: center;
    padding: 60px 20px;
    background: url('path/to/your/image.jpg') no-repeat center center/cover;
    color: #fff;
    display:flex;
    justify-content: space-between;
    padding-left:150px;
    padding-right:150px;
}

.content h1 {
    font-size: 48px;
    margin: 0;
    font-weight: bold;
    color:black;
}

.content h1 span {
    color: #f0a500;
}

.content .par {
    font-size: 18px;
    margin-top: 10px;
    line-height: 1.6;
    color:black;
    
}

.content .btnn {
    background-color: #f0a500;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
}

.content .btnn a {
    color: #fff;
    text-decoration: none;
}
.description{

    
}
.joinbtn{
    text-decoration: none;
    list-style: none;
    border: none;
    border:2px solid #f0a500;
    background: transparent;
    padding: 15px 35px 15px 35px;
    border-radius: 50px;
    transition: 0.4s ease-in-out;


}
.joinbtn:hover{
    background: #f0a500;
    cursor:pointer;
}
.joinbtn:hover a{
    color:white;
    transition: 0.4s ease-in-out;
}
.joinbtn a{
    text-decoration:none;
    color:black;
    font-size:16px;
    font-weight:700;
}
.form {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;


   
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form h2 {
    margin-top: 0;
    font-size: 24px;
    margin-bottom: 20px;
}

.form input[type="email"],
.form input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.form .btnn {
    width: 100%;
    background-color: #f0a500;
    border: none;
    padding: 15px;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
}

.form .btnn:hover {
    background-color: #e09e00;
}

.form .link {
    margin-top: 15px;
}

.form .link a {
    color: #f0a500;
    text-decoration: none;
}

.form .link a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>



<?php
require_once('connection.php');
    if(isset($_POST['login']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        
        
        if(empty($email)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }

        else{
            $query="select *from users where EMAIL='$email'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['PASSWORD'];
                if(md5($pass)  == $db_password)
                {
                    header("location: cardetails.php");
                    session_start();
                    $_SESSION['email'] = $email;
                    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }



                



            }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }







?>
    <div class="hai">
        <div class="main_container">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">CaRs</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="aboutus.html">ABOUT</a></li>
                    <li><a href="#">SERVICES</a></li>   
                    <li><a href="contactus.html">CONTACT</a></li>
                </ul>
                <button class="adminbtn"><a href="adminlogin.php">ADMIN LOGIN</a></button>
            </div>
            
          
        </div>
        <div class="content">
            <div class="description">
            <h1>Rent Your <br><span>Dream Car</span></h1>
            <p class="par">Live the life of Luxury.<br>
                Just rent a car of your wish from our vast collection.<br>Enjoy every moment with your family<br>
                 Join us to make this family vast.  </p>
            <button class="joinbtn"><a href="register.php">JOIN US</a></button>
            </div>
          
            <div class="form">
                <h2 style="color:black;">Login Here</h2>
                <form method="POST"> 
                <input type="email" name="email" placeholder="Enter Email Here">
                <input type="password" name="pass" placeholder="Enter Password Here">
                <input class="btnn" type="submit" value="Login" name="login"></input>
                </form>
                <p class="link" style="color:black;">Don't have an account?<br>
                <a href="register.php">Sign up</a> here</a></p>
                <!-- <p class="liw">or<br>Log in with</p>
                <div class="icon">
                    &emsp;&emsp;&emsp;&ensp;<a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon> </a>&nbsp;&nbsp;
                    <a href="https://www.instagram.com/"><ion-icon name="logo-instagram"></ion-icon> </a>&ensp;
                    <a href="https://myaccount.google.com/"><ion-icon name="logo-google"></ion-icon> </a>&ensp;
                    
                </div> -->
            </div>
        </div>
        </div>
        
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
