<?php
error_reporting (E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<title>Member System - Login</title>
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/modern-business.css" rel="stylesheet">

</head>
<body>

<?php

$form ="<form action= './login.php' method='post'>
<!-- Navigation -->
    <nav class='navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top'>
      <div class='container'>
        <a class='navbar-brand' href='index.html'>PeerME</a>
        <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarResponsive'>
          <ul class='navbar-nav ml-auto'>
            <li class='nav-item'>
              <a class='nav-link' href='about.html'>About</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='signup.html'>Sign Up</a>
            </li>
            <li class='nav-item active'>
                    <a class='nav-link' href='signin.html'>Sign In</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='contact.html'>Contact</a>
            </li>
            <li class='nav-item'>
            <a class='nav-link' href='portfolio-4-col.html'>Courses</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='faq.html'>FAQ</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='pricing.html'>Pricing</a>
        </li>
          </ul>
        </div>
      </div>
    </nav>
<div class='col-lg-4 mb-4'>
<body>
    <h1>Sign into your PeerMe Account</h1>
    <hr>

    <div class='col-lg-4 mb-4'>
        <p>Username: <input type='text' name='user'></p>
        <p>Password: <input type='password' name='password'></p>
        <br>
        <td><input type='submit' name='loginbtn' value=Login></td>
    </div>
        <br>
        <hr>
</div>

<!-- /.container -->

<!-- Footer -->
<footer class='py-5 bg-dark'>
    <div class='container'>
        <p class='m-0 text-center text-white'>Copyright &copy; PeerME 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src='vendor/jquery/jquery.min.js'></script>
<script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>
</form>";

if ($_POST['loginbtn']){
    $user =$_POST['user'];
    $password =$_POST['password'];


    if ($user){             //checks that a username was entered
        if ($password){     //checks that a password was entered
            $link=new mysqli("localhost", "root", "password", "group4");    //connects to phpmyadmin and database
            if(!$link){
                die("Connection to database failed");
            }
            $password =md5("8Kdo9H3".$password);    //hashes the entered password with a salt
            $sql ="SELECT * FROM users WHERE USERNAME='$user'";    //stores sql command in $sql
            
            $result = mysqli_query($link, $sql);    //queries the database for a matching username
            
            
            if (mysqli_num_rows($result) > 0){      //checks if a matching username is found
                while($row = mysqli_fetch_assoc($result)){
               // $row=$result->fetch_assoc();    //stores the row of the matching username in $row
                $dbuser =$row['USERNAME'];      //stores username from database in $dbuser
                $dbpass =$row['PASSWORD'];      //stores the password from the database in $dbpass
           
          
                if($password== $dbpass){
                    //set session info

                    echo "$form You have been logged in as: <b>$dbuser</b>.";
                }
                else    
                    echo "$form You did not enter in correct password. ";
            }//end while
        }
            else {
                echo "$form The username: $user was not found. ";
                if($link) 
                mysqli_close($link);
            }
        }
        else    
            echo "$form You must enter in a password. ";
    }
    else echo"$form You must enter your username.";
}
else 
    echo $form;

?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>