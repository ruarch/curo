<div class="row">
<?php include('right-menu.php');?>

<div class="span9">
<?php echo @$slide_add_success;?>
<div class="page-header" style="margin:0px 0px 5px 0px">
<?php if(isset($_GET['action'])){
			$action=$_GET['action'];
			if($action=='add-new'){
  				echo'<h4 style="margin:0px">Slide - Add New</h4>';
			}elseif($action=='edit'){
				echo'<h4 style="margin:0px">Slide - Edit</h4>';
				if(isset($_GET['id'])){
					$id=clean_input($_GET['id']);
					$res=mysql_query("SELECT * FROM cu_slideshow WHERE slide_id ='$id'") or die(mysql_error());
			$row=mysql_fetch_array($res);
			$slide_title=$row['slide_title'];
			$slide_picture=$row['slide_file'];
			$slide_desc=$row['slide_description'];
			$slide_id=$row['slide_id'];
			$slide_access=$row['slide_access'];
			$slide_featured=$row['slide_feature'];
			$slide_show=$row['slide_show'];
			$slide_order=$row['slide_order'];
      $slide_link=$row['slide_link'];
			
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
		echo '<input type="hidden" name="slide_id" value="'.@$slide_id.'" />';
		echo '<input type="hidden" name="e_slide_picture" value="'.@$slide_picture.'" />';
	
?>
<div class="row" > <div class="span2 pull-right"><input type="submit" name="slide_btn" class="btn"  value="<?php if(@$action=='add-new'){echo 'Add';}elseif(@$action=='edit'){echo 'Update';}else{echo 'Add';}?>" /></div></div>

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
                         <label >Slide Title: <?php echo @$slide_title_error;?></label>
                         <input type="text" name="slide_title" placeholder="Slide Title Here" class="input-large" value="<?php echo @$slide_title;?>"  />
                      	</div>
                        <div class="span2">
                          <label>Access Level: <?php echo @$slide_access_error;?></label>
                          <select name="slide_access" class="span2">
                            <?php @load_access_level($slide_access);?>
                          </select>
            			</div>
                        <div class="span1">
                          <label>Show:</label>
                          <select name="slide_show" class="span1">
                            <option value="1" <?php echo @($slide_show == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
                            <option value="0" <?php echo @($slide_show == "0" ? 'selected="selected"' : ''); ?>>No</option>
                          </select>
                        </div>
                        <div class="span1">
                          <label>Featured:</label>
                          <select name="slide_featured" class="span1">
                            <option value="0" <?php echo @($slide_featured == "0" ? 'selected="selected"' : ''); ?>>No</option>
                            <option value="1" <?php echo @($slide_featured == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
                          </select>
                        </div>
                        <div class="span1">
                          <label>Ordering: <?php echo @$slideorder_error;?></label>
                          <select name="slide_order" class="span1">
                            <?php @list_slide_ordering($slide_order);?>
                          </select>
                        </div>
                         <div class="span3">
                         <label >Slide Link: <?php echo @$slide_link_error;?></label>
                         <input type="text" name="slide_link" placeholder="Slide Link Here" class="input-large" value="<?php echo @$slide_link;?>"  />
                        </div>
                         <div class="span3">
						 <?php if(isset($_GET['id'])&&$_GET['id']!=''){slide_thumbnail(@$slide_id); }?>
                          <label>Upload Slide: <?php echo @$slide_picture_error;?></label>
                          <input type="file" name="slide_picture" />
                        </div>
                       
                  </div>
                  <div class="row">
                     <div class="span6">
                     <label class="control-label" for="slide-description">Description:</label>
                          <textarea rows="6" style="width:100%" class="textarea" name="slide_desc"><?php echo @$slide_desc;?></textarea>
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