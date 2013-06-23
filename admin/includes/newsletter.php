<div class="row">
<?php include('left-menu.php');?>

<div class="span9">
<?php echo @$newsletter_add_success;?>
<div class="page-header" style="margin:0px 0px 5px 0px">
<?php if(isset($_GET['action'])){
			$action=$_GET['action'];
			if($action=='add-newsletter'){
  				echo'<h4 style="margin:0px">Newsletter - Add New</h4>';
			}elseif($action=='edit-newsletter'){
				echo'<h4 style="margin:0px">Newsletter - Edit</h4>';
				if(isset($_GET['id'])){
					$id=clean_input($_GET['id']);
					$res=mysql_query("SELECT * FROM cu_newsletters WHERE id ='$id'") or die(mysql_error());
					$row=mysql_fetch_array($res);
          $newsletter_id=$row['id'];
					$newsletter_title=$row['title'];
					$newsletter_content=$row['content'];
					$newsletter_sent=$row['sent'];
					$newsletter_sent_by=$row['sent_by'];
					$newsletter_created=date("d-m-Y", strtotime($row['created']));
			
				}
			}
}
  
 ?>
</div>
<form class="form" action="" method="post" enctype="multipart/form-data">
<?php
	@$action=$_GET['action'];
		@$content_id=clean_input($_GET['id']);
		echo '<input type="hidden" name="action" value="'.@$action.'" />';
		echo '<input type="hidden" name="newsletter_id" value="'.@$newsletter_id.'" />';
	
?>
<div class="row" > <div class="span2 pull-right"><input type="submit" name="newsletter_btn" class="btn btn-info"  value="<?php if(@$action=='add-newsletter'){echo 'Add';}elseif(@$action=='edit-newsletter'){echo 'Update';}else{echo 'Add';}?>" /></div></div>

  <div class="row">
    <div class="span9" id="article-properties">
      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#home">Home</a></li>
        <li><a href="#others">Others</a></li>
      </ul>
      <div class="tab-content">
            <div class="tab-pane active" id="home">
                  <div class="row">
                        <div class="span3">
                         <label >Title: <?php echo @$newsletter_title_error;?></label>
                         <input type="text" name="newsletter_title" placeholder="Newsletter Title Here" class="input-large" value="<?php echo @$newsletter_title;?>"  />
                      	</div>
                         <div class="span2">
              <div class="input-append date " id="pdp1" data-date="<?php echo today_date();?>" data-date-format="dd-mm-yyyy">
                <label >Created Date:</label>
                <input class="input-small" type="text" name="newsletter_created" value="<?php if(@empty($newsletter_created)){echo today_date();}else{ echo @$newsletter_created;}?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span></div>
            </div>
                        
                        
                        
                        
                         
                  </div>
                  <div class="row">
                     <div class="span9">
                     <label class="control-label" for="newsletter-description">Content:</label>
                          <textarea rows="6" style="width:100%" class="ckeditor" name="editor1"><?php echo @htmlspecialchars($newsletter_content,ENT_QUOTES);?></textarea>
                     </div>
                 </div>
              </div>
              <div class="tab-pane" id="others">
                  <div class="row">
                        <div class="span2">
                         
                      
                      </div>
                  </div>
              </div>
         
        </div>
   
        
       
    </div>
  </div>
</form>
</div></div>