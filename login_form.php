<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5($_POST['password']);
  $cpass = md5($_POST['cpassword']);
  $user_type = $_POST['user_type'];

  $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_array($result);

    if($row['user_type'] == 'admin'){

      $_SESSION['admin_name'] = $row['name'];
      header('location:admin_page.php');

    }elseif($row['user_type'] == 'user'){

      $_SESSION['user_name'] = $row['name'];
      header('location:user_page.php');

    }

  } else {

    header('location:login_form.php?error=1');

  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="login_form.css">

    <title>Syncr</title>
  </head>
<body>
<div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <h1 class="mb-0 site-logo"><a class="text-white mb-0">Syncr</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.html"><span>Home</span></a></li>
                <li class="has-children" >
                  <a><span>Login</span></a>
                  <ul class="dropdown arrow-top">
                    <li class="active"><a href="#">Login</a></li>
                    <li><a href="register_form.php">Register</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>
   
<div class="form-container">
   <form action="" method="post">
      <h3>Good Day, Welcome User!</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Email">
      <input type="password" name="password" required placeholder="Password">
      <input type="submit" name="submit" value="login" class="form-btn">
      <p>Are New to Us? <a href="register_form.php">Register Here</a></p>
   </form>

</div>


<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
    <script>
    function disableScroll() {
    scrollTop =
          window.pageYOffset || document.documentElement.scrollTop;
 
    scrollLeft =
      window.pageXOffset || document.documentElement.scrollLeft;

    window.onscroll = function() {
     window.scrollTo(scrollLeft, scrollTop);
    };
   }
   
     function enableScroll() {
        window.onscroll = function() {};
    }

   </script>
   <script>
   if(window.location.search.indexOf('error') > -1) {
      var result = window.confirm('Username and Password do not match! Try Again');
      if(result) {
         window.location.href = 'login_form.php';
      }
   }
</script>

</body>
</html>