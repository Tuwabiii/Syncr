<?php
//That connects into the databasee
@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    
    <link rel="stylesheet" href="https://pyscript.net/releases/2023.05.1/pyscript.css" />
    <script defer src="https://pyscript.net/releases/2023.05.1/pyscript.js"></script>


    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="admin_page.css">
    <link rel="stylesheet" href="login_form.css">

    <title>Syncr</title>
  </head>
  <body onload = "disableScroll()">
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
                <li class="active"><a href="admin_page.php"><span>Home</span></a></li>
                <li ><a href="index.php"><span>Task Manager</span></a></li>
                <li><a href="forumadmin.php"><span>Forum</span></a></li>
                <li class="has-children">
                  <a><span><?php echo $_SESSION['admin_name'] ?></span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="adreg.php">Add a Admin</a></li>
                    <li><a href="logout.php">Logout</a></li>
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



<video autoplay muted loop class="bgvid">
  <source src="Philippines.mp4" type="video/mp4">
</video>
<div class="text1" id="text1">
  <!-- This is The python Script that executes everytime you refresh the webpage-->
    <py-script>
        import random

        texts = (["''In every barangay, let's work together for \n a brighter future by embracing the Sustainable Development Goals.''", "''Small steps in barangays lead to big \n changes for our world—let's support the SDGs for a better tomorrow.''", "''Barangays are the grassroots of change; let's unite to achieve \n the Sustainable Development Goals for a sustainable community.''", "''In each barangay, let's turn the SDGs into action, creating a ripple effect \n of positive change throughout our communities.''"])
        random_text = random.choice(texts)
        pyscript.write("text1", random_text)
        
    </py-script>
  


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
  </body>
</html>