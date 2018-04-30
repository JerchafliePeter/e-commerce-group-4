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
<title>Member System - Sign up </title>
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/modern-business.css" rel="stylesheet">

</head>
<body>

<?php

$form ="<form action= './signup.php' method='post'>
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
            <li class='nav-item active'>
              <a class='nav-link' href='signup.html'>Sign Up</a>
            </li>
            <li class='nav-item'>
                    <a class='nav-link' href='signin.html'>Sign In</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='services.html'>Services</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='contact.html'>Contact</a>
            </li>
            <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownPortfolio' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Portfolio
              </a>
              <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownPortfolio'>
                <a class='dropdown-item' href='portfolio-1-col.html'>1 Column Portfolio</a>
                <a class='dropdown-item' href='portfolio-2-col.html'>2 Column Portfolio</a>
                <a class='dropdown-item' href='portfolio-3-col.html'>3 Column Portfolio</a>
                <a class='dropdown-item' href='portfolio-4-col.html'>4 Column Portfolio</a>
                <a class='dropdown-item' href='portfolio-item.html'>Single Portfolio Item</a>
              </div>
            </li>
            <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownBlog' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Blog
              </a>
              <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownBlog'>
                <a class='dropdown-item' href='blog-home-1.html'>Blog Home 1</a>
                <a class='dropdown-item' href='blog-home-2.html'>Blog Home 2</a>
                <a class='dropdown-item' href='blog-post.html'>Blog Post</a>
              </div>
            </li>
            <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownBlog' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Other Pages
              </a>
              <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownBlog'>
                <a class='dropdown-item' href='full-width.html'>Full Width Page</a>
                <a class='dropdown-item' href='sidebar.html'>Sidebar Page</a>
                <a class='dropdown-item' href='faq.html'>FAQ</a>
                <a class='dropdown-item' href='404.html'>404</a>
                <a class='dropdown-item' href='pricing.html'>Pricing Table</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<div class='col-lg-4 mb-4'>
<body>
    <h1>Create your PeerMe Account</h1>
    <hr>

    <div class='col-lg-4 mb-4'>
    <p>Email: <input type='text' name='email'></p>  
      
    <p>Username: <input type='text' name='user'></p>
        <p>Password: <input type='password' name='password'></p>
        <br>
        <td><input type='submit' name='submitbtn' value=Submit></td>
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

if ($_POST['submitbtn']){
    $user =$_POST['user'];
    $password =$_POST['password'];
    $email=$_POST['email'];

    if ($user){             //checks that a username was entered
        if ($password){     //checks that a password was entered
            if ($email){     //checks that an email was entered
                $link=new mysqli("localhost", "root", "password", "group4");    //connects to phpmyadmin and database
                if(!$link){
                die("Connection to database failed");
                }
            $password =md5("8Kdo9H3".$password);    //hashes the entered password with a salt
            $sql ="INSERT INTO `users` (`EMAIL`, `USERNAME`, `PASSWORD`) VALUES ('$email', '$user', '$password')";    //stores sql command in $sql
            mysqli_query($link, $sql);    //queries the database for a matching username
            
                            echo "$form You have created user: <b>$user</b>.";
            }
            else    
                echo "$form You must enter in an email. ";
        }
        else 
            echo "$form  You must enter in a password";
          
        
    }
    else 
        echo "$form You must enter in a username";
    
        
    
}
else 
    echo $form;

?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>