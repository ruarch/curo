<?php 
ob_start();
if(@$_GET['action']=='add-new' || @$_GET['action']=='edit'){
	$page='contents-add';
}else{
	$page='frontpage-contents';
}

require('../config.php');
require('includes/connect-dbase.php');
include('includes/functions.php');
include('includes/process.php');
 if(!isloggedin()){// check if user is logged in
		header("Location:.");
}

if(isset($_POST['content_search_btn'])){
	$search_url='frontpage-contents.php';
	if(isset($_POST['page'])){
	//$search_url.='?p='.$_POST['page'];
	}
	
	if(isset($_POST['q'])){
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
    <script type="text/javascript">
function checkall(){

for (var i = 0; i < document.frmaction.elements.length; i++) {

var e = document.frmaction.elements[i];

if ((e.name != 'chkall') && (e.type == 'checkbox')) {

e.checked = document.frmaction.chkall.checked;

}}}


</script>  
  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">
    <?php include('includes/top-menu.php');?>
    <div class="container">
    <?php
		if(isset($_GET['action'])){
			$action=$_GET['action'];
			
			if($action=='add-new' || $action=='edit'){
				include('includes/contents.php');				
			}else{
				include('includes/list-frontpage-contents.php');
			}
		}else{
				include('includes/list-frontpage-contents.php');
			}
	
	?>
  </div>
<?php include('includes/footer.php');?>
  <?php ob_flush();?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="includes/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
		$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
 
}) 
		$('#pdp1').datepicker();
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
	 $("a.confirm").click(function(e) {
                e.preventDefault();
                bootbox.confirm("Are you sure?", function(confirmed) {
                   return ;
                });
            });
	});
	</script>

    <script type="text/javascript">
	CKEDITOR.replace( 'editor1',
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
