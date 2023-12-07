<?php 
    include('config/constants.php');
    //Get the listid from URL
    
    $list_id_url = $_GET['list_id'];
?>

<?php

@include 'config.php';


if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<html>
    <head>
        <title>Task Manager</title>
        <link rel="stylesheet" href="<?php echo SITEURL; ?>css/style1.css" />
        <link rel="stylesheet" href="<?php echo SITEURL; ?>index_php.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

        <link rel="stylesheet" href="fonts/icomoon/style.css">

        <link rel="stylesheet" href="css/owl.carousel.min.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    
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
              <li ><a href="user_page.php"><span>Home</span></a></li>
                <li class="active"><a><span>Task Manager</span></a></li>
                <li><a href="about.html"><span>About</span></a></li>
                <li class="has-children">
                <a><span><?php echo $_SESSION['user_name'] ?></span></a>
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
        
        <div class="wrapper">
        
        <h1 class="text-center">Barangay Task Manager</h1>
        
        <!-- Menu Starts Here -->
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
    
            <a href="index_user.php" style="text-decoration: none;"><button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><b>Home</b></button></a>
            
            <?php 
                
                //Comment Displaying Lists From Database in ourMenu
                $conn2 = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                
                //SELECT DATABASE
                $db_select2 = mysqli_select_db($conn2, DB_NAME) or die(mysqli_error());
                
                //Query to Get the Lists from database
                $sql2 = "SELECT * FROM tbl_lists";
                
                //Execute Query
                $res2 = mysqli_query($conn2, $sql2);
                
                //CHeck whether the query executed or not
                if($res2==true)
                {
                    //Display the lists in menu
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $list_id = $row2['list_id'];
                        $list_name = $row2['list_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>list-task_user.php?list_id=<?php echo $list_id; ?>" style="text-decoration: none;"><button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><b><?php echo $list_name; ?></b></button></a>
                        
                        <?php
                        
                    }
                }
                
            ?>
            
            
            
            
        </div>
    </nav>
    <!-- Menu Ends Here -->
        
        
        <div class="all-task">
        
            
            
            <table class="tbl-full table table-condensed table-hover">
            
                <tr>
                    <th>NO.</th>
                    <th>Task Name</th>
                    <th>Priority</th>
                    <th>Deadline</th>
                </tr>
                
                <?php 
                
                    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
                    
                    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
                    
                    //SQL QUERY to display tasks by list selected
                    $sql = "SELECT * FROM tbl_tasks WHERE list_id=$list_id_url";
                    
                    //Execute Query
                    $res = mysqli_query($conn, $sql);
                    
                    if($res==true)
                    {
                        //Display the tasks based on list
                        //Count the Rows
                        $count_rows = mysqli_num_rows($res);
                        
                        if($count_rows>0)
                        {
                            //We have tasks on this list
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $task_id = $row['task_id'];
                                $task_name = $row['task_name'];
                                $priority = $row['priority'];
                                $deadline = $row['deadline'];
                                ?>
                                
                                <tr>
                                    <td>1. </td>
                                    <td><?php echo $task_name; ?></td>
                                    <td><?php echo $priority; ?></td>
                                    <td><?php echo $deadline; ?></td>
                                    
                                </tr>
                                
                                <?php
                            }
                        }
                        else
                        {
                            //NO Tasks on this list
                            ?>
                            
                            <tr>
                                <td colspan="5">No Tasks added on this list.</td>
                            </tr>
                            
                            <?php
                        }
                    }
                ?>
                
                
            
            </table>
        
        </div>
        
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/main.js"></script>
    </body>
    
</html>































