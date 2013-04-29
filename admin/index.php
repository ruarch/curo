<?php 
ob_start();
require('../config.php');
include('includes/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo SITE_NAME;?> - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
   <?php include('includes/head.php');?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
      #modalsettings {
    border: 1px solid #CCC;
    box-shadow: 0 1px 5px #CCC;
    border-radius: 5px;
    font-family: verdana;
    overflow: hidden;
  }
  #modalsettings header {
    background: #f1f1f1;
    background-image: -webkit-linear-gradient( top, #f1f1f1, #CCC );
    background-image: -ms-linear-gradient( top, #f1f1f1, #CCC );
    background-image: -moz-linear-gradient( top, #f1f1f1, #CCC );
    background-image: -o-linear-gradient( top, #f1f1f1, #CCC );
    box-shadow: 0 1px 2px #888;
    padding: 0px;
  }
  #modalsettings h1 {
    padding: 0px;
    margin: 0px;
    font-size: 14px;
    font-weight: normal;
    text-shadow: 0 1px 2px white;
    color: #888;
    text-align: center;
  }
  #modalsettings section {
    padding: 5px 10px; 
    font-size: 12px;
    line-height: 175%;
    color: #333;
  }
    </style>
  </head>

  <body>
    <?php include('includes/top-menu.php');?>
    <div class="container">
    <?php if(isloggedin()){
		include('includes/dashboard.php');
    }else{
		include('includes/admin-login.php');
	}
	?>
  </div>
  <?php ob_flush();?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <?php include('includes/footer.php');?>
  </body>
</html>
