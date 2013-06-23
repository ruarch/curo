<div class="row">
<?php include('left-menu.php');?>

<div class="span9">
<?php echo @$image_add_success;?>
<div class="page-header" style="margin:0px 0px 5px 0px">
<?php if(isset($_GET['action'])){
			$action=$_GET['action'];
			if($action=='add-new'){
  				echo'<h4 style="margin:0px">Category Images - Add New</h4>';
			}elseif($action=='edit'){
				echo'<h4 style="margin:0px">Category Images - Edit</h4>';
				if(isset($_GET['id'])){
					$id=clean_input($_GET['id']);
					$res=mysql_query("SELECT * FROM cu_con_images WHERE image_id='$id'") or die(mysql_error());
    			$row=mysql_fetch_array($res);
    			$image_title=$row['image_title'];
    			$image=$row['image_file'];
    			$image_desc=$row['image_description'];
    			$image_id=$row['image_id'];
    			$image_access=$row['image_access'];
    			$image_featured=$row['image_feature'];
    			$image_show=$row['image_show'];
    			$image_order=$row['image_order'];
    			$image_con=$row['imageconid'];
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
    echo '<input type="hidden" name="module" value="'.@$module.'" />';
		echo '<input type="hidden" name="image_id" value="'.@$image_id.'" />';
		echo '<input type="hidden" name="e_sectionimage" value="'.@$image.'" />';
	
?>
<div class="row" > <div class="span2 pull-right"><input type="submit" name="con_images_btn" class="btn btn-info"  value="<?php if(@$action=='add-new'){echo 'Add';}elseif(@$action=='edit'){echo 'Update';}else{echo 'Add';}?>" /></div></div>

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
                         <label >Image Title: <?php echo @$image_title_error;?></label>
                         <input type="text" name="image_title" placeholder="Image Title Here" class="input-large" value="<?php echo @$image_title;?>"  />
                      	</div>
                        <div class="span2">
                          <label>Access Level: <?php echo @$image_access_error;?></label>
                          <select name="image_access" class="span2">
                            <?php @load_access_level($image_access);?>
                          </select>
            			</div>
                        <div class="span1">
                          <label>Show:</label>
                          <select name="image_show" class="span1">
                            <option value="1" <?php echo @($image_show == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
                            <option value="0" <?php echo @($image_show == "0" ? 'selected="selected"' : ''); ?>>No</option>
                          </select>
                        </div>
                        <div class="span1">
                          <label>Featured:</label>
                          <select name="image_featured" class="span1">
                            <option value="0" <?php echo @($image_featured == "0" ? 'selected="selected"' : ''); ?>>No</option>
                            <option value="1" <?php echo @($image_featured == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
                          </select>
                        </div>
                        <div class="span1">
                          <label>Ordering: <?php echo @$imageorder_error;?></label>
                          <select name="image_order" class="span1">
                            <?php @list_con_image_ordering($image_order,$module);?>
                          </select>
                        </div>
                        
                         <div class="span3">
                         <?php if(isset($_GET['id'])&&$_GET['id']!=''){con_section_image_thumbnail(@$image_id); }?>
                          <label>Upload Image(s): <?php echo @$image_picture_error;?></label>
                          <input type="file" name="<?php if($_GET['action']=='edit'){ echo 'image';}else{ echo 'image[]';}?>" multiple="multiple"/>
                        </div>
                        
                          <div class="span3" <?php if(@$action=='edit'){ echo 'pull-right';}?>>
                          <label>Category: <?php echo @$image_con_error;?></label>
                          <select name="image_con">
                            <?php @load_categories($image_con);?>
                          </select>
                        </div>

                        
                  </div>
                  <div class="row">
                     <div class="span6">
                     <label class="control-label" for="image-description">Description:</label>
                          <textarea rows="6" style="width:100%" class="textarea" name="image_desc"><?php echo @$image_desc;?></textarea>
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