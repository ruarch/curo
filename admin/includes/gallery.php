<div class="row">
<?php include('left-menu.php');?>

<div class="span9">
<?php echo @$gallery_add_success;?>
<div class="page-header" style="margin:0px 0px 5px 0px">
<?php if(isset($_GET['action'])){
			$action=$_GET['action'];
			if($action=='add-new'){
  				echo'<h4 style="margin:0px">Gallery - Add New</h4>';
			}elseif($action=='edit'){
				echo'<h4 style="margin:0px">Gallery - Edit</h4>';
				if(isset($_GET['id'])){
					$id=clean_input($_GET['id']);
					$res=mysql_query("SELECT * FROM cu_gallery WHERE gallery_id ='$id'") or die(mysql_error());
			$row=mysql_fetch_array($res);
			$gallery_name=$row['gallery_name'];
			$gallery_picture=$row['gallery_image'];
			$gallery_desc=$row['gallery_description'];
			$gallery_id=$row['gallery_id'];
			$gallery_access=$row['gallery_access'];
			$gallery_featured=$row['gallery_feature'];
			$gallery_show=$row['gallery_show'];
			$gallery_order=$row['gallery_order'];
			
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
		echo '<input type="hidden" name="gallery_id" value="'.@$gallery_id.'" />';
		echo '<input type="hidden" name="e_gallery_picture" value="'.@$gallery_picture.'" />';
	
?>
<div class="row" > <div class="span2 pull-right"><input type="submit" name="gallery_btn" class="btn btn-info"  value="<?php if(@$action=='add-new'){echo 'Add';}elseif(@$action=='edit'){echo 'Update';}else{echo 'Add';}?>" /></div></div>

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
                         <label >Gallery Title: <?php echo @$gallery_title_error;?></label>
                         <input type="text" name="gallery_name" placeholder="Gallery Title Here" class="input-large" value="<?php echo @$gallery_name;?>"  />
                      	</div>
                        <div class="span2">
                          <label>Access Level: <?php echo @$gallery_access_error;?></label>
                          <select name="gallery_access" class="span2">
                            <?php @load_access_level($gallery_access);?>
                          </select>
            			</div>
                        <div class="span1">
                          <label>Show:</label>
                          <select name="gallery_show" class="span1">
                            <option value="1" <?php echo @($gallery_show == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
                            <option value="0" <?php echo @($gallery_show == "0" ? 'selected="selected"' : ''); ?>>No</option>
                          </select>
                        </div>
                        <div class="span1">
                          <label>Featured:</label>
                          <select name="gallery_featured" class="span1">
                            <option value="0" <?php echo @($gallery_featured == "0" ? 'selected="selected"' : ''); ?>>No</option>
                            <option value="1" <?php echo @($gallery_featured == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
                          </select>
                        </div>
                        <div class="span1">
                          <label>Ordering: <?php echo @$galleryorder_error;?></label>
                          <select name="gallery_order" class="span1">
                            <?php @list_gallery_ordering($gallery_order);?>
                          </select>
                        </div>
                        
                         <div class="span3">
						 <?php if(isset($_GET['id'])&&$_GET['id']!=''){gallery_thumbnail(@$gallery_id); }?>
                          <label>Upload Slide: <?php echo @$gallery_picture_error;?></label>
                          <input type="file" name="gallery_picture" />
                        </div>
                  </div>
                  <div class="row">
                     <div class="span6">
                     <label class="control-label" for="gallery-description">Description:</label>
                          <textarea rows="6" style="width:100%" class="textarea" name="gallery_desc"><?php echo @$gallery_desc;?></textarea>
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