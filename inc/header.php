<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Session.php";


Session::init();


spl_autoload_register(function($classes){

  include 'classes/'.$classes.".php";

});


$users = new Users();

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Simple User Management</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/style.css">

      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

      <style>
          p.provider.provider-google a {
              background: #db4437;
          }
          p.provider a {
              color: #fff;
              border-radius: 5px;
              padding: 15px 10px;
              min-width: 60px;
              max-height: 45px;
              font-size: 18px;
              display: -webkit-box;
              display: -ms-flexbox;
              display: flex;
              -webkit-box-pack: center;
              -ms-flex-pack: center;
              justify-content: center;
              -webkit-box-align: center;
              -ms-flex-align: center;
              align-items: center;
              -webkit-transition: all .3s ease-in-out;
              transition: all .3s ease-in-out;
          }

          .log-in2 .or-wrapper {
              width: 100%;
              max-width: 325px;
              position: relative;
              display: block;
              margin: 0 auto;
              padding: 5px 0 15px;
          }

          .log-in2 .or-divider {
              display: -webkit-box;
              display: -ms-flexbox;
              display: flex;
              -ms-flex-pack: distribute;
              justify-content: space-around;
              vertical-align: middle;
              text-transform: uppercase;
              color: #9e9e9e;
          }
          .log-in2 .or-divider:after, .log-in2 .or-divider:before {
              content: " ";
              display: inline-block;
              border-top: 1px solid #ccc;
              width: 45%;
              vertical-align: middle;
              margin-top: 9px;
          }
          .log-in2 .or-divider:before {
              float: left;
          }
      </style>

  </head>
  <body>


<?php


if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  // Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  // <strong>Success !</strong> You are Logged Out Successfully !</div>');
  Session::destroy();
}



 ?>


    <div class="container">

      <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
        <a class="navbar-brand" href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav ml-auto">



          <?php if (Session::get('id') == TRUE) { ?>
            <?php if (Session::get('roleid') == '1') { ?>
              <li class="nav-item">

                  <a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i>User lists </span></a>
              </li>
              <li class="nav-item

              <?php

                          $path = $_SERVER['SCRIPT_FILENAME'];
                          $current = basename($path, '.php');
                          if ($current == 'addUser') {
                            echo " active ";
                          }

                         ?>">

                <a class="nav-link" href="addUser.php"><i class="fas fa-user-plus mr-2"></i>Add user </span></a>
              </li>
                  <li class="nav-item

              <?php

                  $path = $_SERVER['SCRIPT_FILENAME'];
                  $current = basename($path, '.php');
                  if ($current == 'addMultiUser') {
                      echo " active ";
                  }

                  ?>">

                      <a class="nav-link" href="addMultiUser.php"><i class="fas fa-users mr-2"></i>Add multi users </span></a>
                  </li>
            <?php  } ?>
            <li class="nav-item
            <?php

      				$path = $_SERVER['SCRIPT_FILENAME'];
      				$current = basename($path, '.php');
      				if ($current == 'profile') {
      					echo "active ";
      				}

      			 ?>

            ">

              <a class="nav-link" href="profile.php?id=<?php echo Session::get("id"); ?>"><i class="fab fa-500px mr-2"></i>Profile <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
            </li>
          <?php }else{ ?>

              <li class="nav-item

              <?php

                          $path = $_SERVER['SCRIPT_FILENAME'];
                          $current = basename($path, '.php');
                          if ($current == 'register') {
                            echo " active ";
                          }

                         ?>">
                <a class="nav-link" href="register.php"><i class="fas fa-user-plus mr-2"></i>Register</a>
              </li>
              <li class="nav-item
                <?php

                    				$path = $_SERVER['SCRIPT_FILENAME'];
                    				$current = basename($path, '.php');
                    				if ($current == 'login') {
                    					echo " active ";
                    				}

                    			 ?>">
                <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
              </li>

          <?php } ?>


          </ul>

        </div>
      </nav>
