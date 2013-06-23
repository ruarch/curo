<?php 
ob_start();
if(@$_GET['action']=='add-new' || @$_GET['action']=='edit'){
	$page='categories-add';
}else{
	$page='categories';
}

require('../config.php');
require('includes/connect-dbase.php');
include('includes/functions.php');
include('includes/process.php');
 if(!isloggedin()){// check if user is logged in
		header("Location:.");
}
if(isset($_POST['category_search_btn'])){
	$search_url='categories.php';
	if(isset($_POST['page'])){
	//$search_url.='?p='.$_POST['page'];
	}
	
	if(isset($_POST['p'])){
			$search_url.='?q='.$_POST['q'];
	}
	else{
		$search_url.='?q='.$_POST['search_q'];
	}
	
	header("Location:$search_url");
	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo SITE_NAME;?> - Admin | <?php echo  ucwords($page);?></title>
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
    <?php
		if(isset($_GET['action'])){
			$action=$_GET['action'];
			
			if($action=='add-new'){
				include('includes/categories.php');				
			}elseif($action=='edit'){
				include('includes/categories.php');
			}else{
				include('includes/list-categories.php');
			}
		}else{
				include('includes/list-categories.php');
			}
	
	?>
  </div>
<?php include('includes/footer.php');?>
  <?php ob_flush();?>
   <!--<script type="text/javascript" src="js/wysihtml5-0.3.0.min.js"></script>-->
    <script type="text/javascript" src="includes/ckeditor/ckeditor.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
   <script src="js/bootstrap-wysihtml5-0.0.2.min.js"></script>
   <script>
	$('.section_desc').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
	$(prettyPrint);
</script>
    <script type="text/javascript">
	$(document).ready(function() {
		$('.textarea').wysihtml5();
		$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})
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
      <script type="text/javascript">
  CKEDITOR.replace( 'category_desc',
    {
        filebrowserBrowseUrl : 'includes/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : 'includes/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : 'includes/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : 'includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : 'includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : 'includes/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
  
  </script>
  </body>
</html>
