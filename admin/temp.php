<?php 
ob_start();
require('../config.php');
include('includes/functions.php');
 if(!isloggedin()){// check if user is logged in
		header("Location:.");
}
$page='articles';
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
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">
    <?php include('includes/top-menu.php');?>
    <div class="container">
<div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          <li><a href="#overview"><i class="icon-chevron-right"></i> Overview</a></li>
          <li><a href="#transitions"><i class="icon-chevron-right"></i> Transitions</a></li>
        </ul>
      </div>
      
      <div class="span9">
        <section id="pagename">
          <div class="page-header">
            <h1>Pagename <small></small></h1>
          </div>
           </section>

      
      </div></div>
  </div>

  <?php ob_flush();?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
	 var $window = $(window)

    // Disable certain links in docs
    $('section [href^=#]').click(function (e) {
      e.preventDefault()
    })

    // side bar
    $('.bs-docs-sidenav').affix({
      offset: {
        top: function () { return $window.width() <= 980 ? 290 : 210 }
      , bottom: 270
      }
    })
	
	});
	</script>
    
  </body>
</html>
