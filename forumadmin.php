<?php


@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

// Set the default time zone to Manila
date_default_timezone_set('Asia/Manila');

$conn = mysqli_connect("localhost", "root", "", "data");


if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $date = date('F d Y, h:i:s A');
    $reply_id = $_POST['reply_id'];

    $query = "INSERT INTO tb_data VALUES ('', '$name', '$comment', '$date', '$reply_id')";
    mysqli_query($conn, $query);
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">



    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Syncr</title>
</head>
<style>
    * {
        margin: 0px;
        padding: 0px;
    }

    .form-popup {
        display: none;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #131419;
        padding: 20px;
        border: 1px solid #ccc;
    }

    .form-popup input[type="text"],
    .form-popup textarea {
        align-items: center;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
    }

    .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px;
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }

    .form-popup button {
        padding: 10px 20px;
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    body {
        margin: 0px;
        padding: 0px;
        font-family: Poppins;
        background: #131419;
        color : #fff;
    }

    .container {
        width: 100%;
        max-width: 1100px;
        margin: 0px auto;
        border-radius: 105px;
        padding: 20px;
    }

    .comment {
        margin-bottom: 20px;
        border-radius: 20px;
        padding: 20px;
        margin: 25px;
        border: 1px solid #ccc;
    }

    .reply {
        margin-bottom: 20px;
        border-radius: 20px;
        padding: 20px;
        margin: 25px;
        border: 1px solid #ccc;
    }

    .repz{
      margin: -10px;
    }



    

    p{
        margin-bottom: 5px;
        margin-top: 5px;
    }

    form{
        margin: 20px;
    }

    form h3{
        margin-bottom: 10px;
    }

    form input, form textarea{
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
    }

    form button.submit, button{
      border-radius: 25px;
      border-color: black;
background: #131419;
box-shadow:  7px 7px 22px #08080a,
             -7px -7px 22px #1e2028;
          

        height: 40px;
        width: 100px;
        color : #fff;
    }
    .site-navbar {
  margin-bottom: 0px;
  z-index: 1999;
  position: relative;
  top: 1rem;
  width: 100%; }
  .site-navbar.transparent {
    background: transparent; }
  .site-navbar.absolute {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%; }
  .site-navbar .site-logo {
    position: relative;
    left: 0;
    font-size: 24px !important; }
  .site-navbar .site-navigation .site-menu {
    margin-bottom: 0; }
    .site-navbar .site-navigation .site-menu .active > a span {
      background: #007bff;
      color: #fff;
      border-radius: 30px;
      display: inline-block;
      padding: 5px 20px; }
    .site-navbar .site-navigation .site-menu a {
      text-decoration: none !important;
      display: inline-block; }
    .site-navbar .site-navigation .site-menu > li {
      display: inline-block; }
      .site-navbar .site-navigation .site-menu > li > a {
        padding: 10px 0px;
        color: #fff;
        font-size: 16px;
        text-decoration: none !important; }
        .site-navbar .site-navigation .site-menu > li > a > span {
          padding: 5px 20px;
          display: inline-block;
          -webkit-transition: .3s all ease;
          -o-transition: .3s all ease;
          transition: .3s all ease;
          border-radius: 30px; }
        .site-navbar .site-navigation .site-menu > li > a:hover > span {
          background: #007bff;
          color: #fff;
          border-radius: 30px;
          display: inline-block; }
    .site-navbar .site-navigation .site-menu .has-children {
      position: relative; }
      .site-navbar .site-navigation .site-menu .has-children > a span {
        position: relative;
        padding-right: 30px; }
        .site-navbar .site-navigation .site-menu .has-children > a span:before {
          position: absolute;
          content: "\e313";
          font-size: 16px;
          top: 50%;
          right: 10px;
          -webkit-transform: translateY(-50%);
          -ms-transform: translateY(-50%);
          transform: translateY(-50%);
          font-family: 'icomoon'; }
      .site-navbar .site-navigation .site-menu .has-children .dropdown {
        visibility: hidden;
        opacity: 0;
        top: 100%;
        position: absolute;
        text-align: left;
        border-top: 2px solid #007bff;
        -webkit-box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.1);
        box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.1);
        padding: 0px 0;
        margin-top: 20px;
        margin-left: 0px;
        background: #fff;
        -webkit-transition: 0.2s 0s;
        -o-transition: 0.2s 0s;
        transition: 0.2s 0s; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top {
          position: absolute; }
          .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top:before {
            bottom: 100%;
            left: 20%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none; }
          .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top:before {
            border-color: rgba(136, 183, 213, 0);
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown a {
          text-transform: none;
          letter-spacing: normal;
          -webkit-transition: 0s all;
          -o-transition: 0s all;
          transition: 0s all;
          color: #343a40; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown .active > a {
          color: #007bff !important; }
        .site-navbar .site-navigation .site-menu .has-children .dropdown > li {
          list-style: none;
          padding: 0;
          margin: 0;
          min-width: 200px; }
          .site-navbar .site-navigation .site-menu .has-children .dropdown > li > a {
            padding: 9px 20px;
            display: block; }
            .site-navbar .site-navigation .site-menu .has-children .dropdown > li > a:hover {
              background: #fafafb; }
          .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children > a {
            position: relative; }
            .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children > a:after {
              position: absolute;
              right: 0;
              content: "\e315";
              right: 20px;
              font-family: 'icomoon'; }
          .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children > .dropdown, .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children > ul {
            left: 100%;
            top: 0; }
          .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children:hover > a, .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children:active > a, .site-navbar .site-navigation .site-menu .has-children .dropdown > li.has-children:focus > a {
            background: #fafafb; }
      .site-navbar .site-navigation .site-menu .has-children:hover > a, .site-navbar .site-navigation .site-menu .has-children:focus > a, .site-navbar .site-navigation .site-menu .has-children:active > a {
        color: #007bff; }
        .site-navbar .site-navigation .site-menu .has-children:hover > a span, .site-navbar .site-navigation .site-menu .has-children:focus > a span, .site-navbar .site-navigation .site-menu .has-children:active > a span {
          background: #007bff;
          color: #fff; }
      .site-navbar .site-navigation .site-menu .has-children:hover, .site-navbar .site-navigation .site-menu .has-children:focus, .site-navbar .site-navigation .site-menu .has-children:active {
        cursor: pointer; }
        .site-navbar .site-navigation .site-menu .has-children:hover > .dropdown, .site-navbar .site-navigation .site-menu .has-children:focus > .dropdown, .site-navbar .site-navigation .site-menu .has-children:active > .dropdown {
          -webkit-transition-delay: 0s;
          -o-transition-delay: 0s;
          transition-delay: 0s;
          margin-top: 0px;
          visibility: visible;
          opacity: 1; }

.site-mobile-menu {
  width: 300px;
  position: fixed;
  right: 0;
  z-index: 2000;
  padding-top: 20px;
  background: #fff;
  height: calc(100vh);
  -webkit-transform: translateX(110%);
  -ms-transform: translateX(110%);
  transform: translateX(110%);
  -webkit-box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
  box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
  -webkit-transition: .3s all ease-in-out;
  -o-transition: .3s all ease-in-out;
  transition: .3s all ease-in-out; }
  .offcanvas-menu .site-mobile-menu {
    -webkit-transform: translateX(0%);
    -ms-transform: translateX(0%);
    transform: translateX(0%); }
  .site-mobile-menu .site-mobile-menu-header {
    width: 100%;
    float: left;
    padding-left: 20px;
    padding-right: 20px; }
    .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close {
      float: right;
      margin-top: 8px; }
      .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span {
        font-size: 30px;
        display: inline-block;
        padding-left: 10px;
        padding-right: 0px;
        line-height: 1;
        cursor: pointer;
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span:hover {
          color: #f8f9fa; }
    .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo {
      float: left;
      margin-top: 10px;
      margin-left: 0px; }
      .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a {
        display: inline-block;
        text-transform: uppercase; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a img {
          max-width: 70px; }
        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a:hover {
          text-decoration: none; }
  .site-mobile-menu .site-mobile-menu-body {
    overflow-y: scroll;
    -webkit-overflow-scrolling: touch;
    position: relative;
    padding: 0 20px 20px 20px;
    height: calc(100vh - 52px);
    padding-bottom: 150px; }
  .site-mobile-menu .site-nav-wrap {
    padding: 0;
    margin: 0;
    list-style: none;
    position: relative; }
    .site-mobile-menu .site-nav-wrap a {
      padding: 10px 20px;
      display: block;
      position: relative;
      color: #212529; }
      .site-mobile-menu .site-nav-wrap a:hover {
        color: #007bff; }
    .site-mobile-menu .site-nav-wrap li {
      position: relative;
      display: block; }
      .site-mobile-menu .site-nav-wrap li.active > a {
        color: #007bff; }
    .site-mobile-menu .site-nav-wrap .arrow-collapse {
      position: absolute;
      right: 0px;
      top: 10px;
      z-index: 20;
      width: 36px;
      height: 36px;
      text-align: center;
      cursor: pointer;
      border-radius: 50%; }
      .site-mobile-menu .site-nav-wrap .arrow-collapse:hover {
        background: #f8f9fa; }
      .site-mobile-menu .site-nav-wrap .arrow-collapse:before {
        font-size: 12px;
        z-index: 20;
        font-family: "icomoon";
        content: "\f078";
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%) rotate(-180deg);
        -ms-transform: translate(-50%, -50%) rotate(-180deg);
        transform: translate(-50%, -50%) rotate(-180deg);
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease; }
      .site-mobile-menu .site-nav-wrap .arrow-collapse.collapsed:before {
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%); }
    .site-mobile-menu .site-nav-wrap > li {
      display: block;
      position: relative;
      float: left;
      width: 100%; }
      .site-mobile-menu .site-nav-wrap > li > a {
        padding-left: 20px;
        font-size: 20px; }
      .site-mobile-menu .site-nav-wrap > li > ul {
        padding: 0;
        margin: 0;
        list-style: none; }
        .site-mobile-menu .site-nav-wrap > li > ul > li {
          display: block; }
          .site-mobile-menu .site-nav-wrap > li > ul > li > a {
            padding-left: 40px;
            font-size: 16px; }
          .site-mobile-menu .site-nav-wrap > li > ul > li > ul {
            padding: 0;
            margin: 0; }
            .site-mobile-menu .site-nav-wrap > li > ul > li > ul > li {
              display: block; }
              .site-mobile-menu .site-nav-wrap > li > ul > li > ul > li > a {
                font-size: 16px;
                padding-left: 60px; }
    .site-mobile-menu .site-nav-wrap[data-class="social"] {
      float: left;
      width: 100%;
      margin-top: 30px;
      padding-bottom: 5em; }
      .site-mobile-menu .site-nav-wrap[data-class="social"] > li {
        width: auto; }
        .site-mobile-menu .site-nav-wrap[data-class="social"] > li:first-child a {
          padding-left: 15px !important; }

</style>
<body>

<header class="site-navbar" role="banner">

<div class="container">
  <div class="row align-items-center">
    
    <div class="col-11 col-xl-2">
      <h1 class="mb-0 site-logo"><a class="text-white mb-0">Syncr</a></h1>
    </div>
    <div class="col-12 col-md-10 d-none d-xl-block">
    <nav class="site-navigation position-relative text-right" role="navigation">

<ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
  <li ><a href="admin_page.php"><span>Home</span></a></li>
  <li ><a href="index.php"><span>Task Manager</span></a></li>
  <li class="active"><a href="forumadmin.php"><span>Forum</span></a></li>
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
    
    <div class="container">
        <?php
        $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id = 0");
        foreach($datas as $data) {
            require 'comment.php';
        }
        ?>
    
    


    <div class="container">
        <button onclick="openForm(); scrollToTop()"  class="open-form">Add New</button>
        <div class="form-popup" id="comment-form">
            <button onclick="closeForm()" class="close-button">X</button>
            <form action="" method="post">
                <h3 id="title">Leave a Comment</h3>
                <input type="hidden" name="reply_id" id="reply_id">
                <input type="text" name="name" placeholder="<?php echo $_SESSION['admin_name'] ?>" value="<?php echo $_SESSION['admin_name'] ?>" readonly>
                <textarea name="comment" placeholder="Your Comment"></textarea>
                <button type="submit" name="submit" class="submit">Submit</button>
            </form>
        </div>
    </div>

    </div>
    
    <script>
        function reply(id, name) {
            title = document.getElementById('title');
            title.innerHTML = "Reply for " + name;
            document.getElementById('reply_id').value = id;
        }
    </script>

    <script>
        function comment(id, name) {
            document.getElementById('reply_id').value = id;
        }
    </script>

    <script>
        function openForm() {
            var form = document.getElementById("comment-form");
            form.style.display = "block";
        }

        function closeForm() {
            var form = document.getElementById("comment-form");
            form.style.display = "none";
        }
    </script>

    <script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>



</body>
</html>