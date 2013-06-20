<div class="row">
<?php include('left-menu.php');?>
<div class="span9">
<?php echo @$category_add_success;?>
<div class="page-header" style="margin:0px 0px 5px 0px">
<?php if(isset($_GET['action'])){
	if($action=='add-new'){
  				echo'<h4 style="margin:0px">Add New</h4>';
			}elseif($action=='edit'){
				
				if(isset($_GET['id'])){
					$id=clean_input($_GET['id']);
					$res=mysql_query("SELECT * FROM cu_categories WHERE id ='$id'") or die(mysql_error());
					$row=mysql_fetch_array($res);
					$categoryname=$row['name'];
					$categorytitle=$row['title'];
					$categoryshow=$row['category_show'];
					$categoryaccess=$row['access'];
					$categoryfeatured=$row['feature'];
					$section=$row['section_id'];
					$categorydesc=$row['description'];
					$category_picture=$row['image'];
          $categoryalias=$row['alias'];
          $categoryuniqueid=$row['uniqueid'];
          echo'<h4 style="margin:0px">Edit - '.$categoryname.'</h4>';
				}
			}
}
?>

</div>
<form class="form" action="" method="post" enctype="multipart/form-data">
<?php
	@$action=$_GET['action'];
		@$category_id=clean_input($_GET['id']);
		echo '<input type="hidden" name="action" value="'.@$action.'" />';
		echo '<input type="hidden" name="category_id" value="'.@$category_id.'" />';
		echo '<input type="hidden" name="e_category_picture" value="'.@$category_picture.'" />';
	
?>
<div class="row" > <div class="span2 pull-right"><input type="submit" name="add_new_category_btn" class="btn"  value="<?php if(@$action=='add-new'){
	echo 'Add';
}elseif(@$action=='edit'){
	echo 'Update';
}else{
	echo 'Add';
}
?>" /></div></div>

  <div class="row">
    <div class="span9" id="article-properties">
      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#home">Home</a></li>
        <li><a href="#media">Media <?php echo @$error_on_page2;?></a></li>
        <li><a href="#settings">Settings</a></li>
      </ul>
      
      <div class="tab-content">
        <div class="tab-pane active" id="home">
          <div class="row">
            <div class="span3">
            	<label >Name: <?php echo @$categoryname_error;?></label>
                <input class="input-large" type="text" name="category_name"  value="<?php echo @$categoryname;?>"/>
            </div>
            <div class="span3">
            	<label >Title:</label>
                <input class="input-xlarge" type="text" name="category_title" value="<?php echo @$categorytitle;?>" />
            </div>
            <div class="span1">
              <label>Show:</label>
              <select name="category_show" class="span1">
                <option value="1" <?php echo @($categoryshow == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
                <option value="0" <?php echo @($categoryshow == "0" ? 'selected="selected"' : ''); ?>>No</option>
              </select>
            </div>
            <div class="span1">
              <label>Featured:</label>
              <select name="category_featured" class="span1">
                <option value="0" <?php echo @($categoryfeatured == "0" ? 'selected="selected"' : ''); ?>>No</option>
                 <option value="1" <?php echo @($categoryfeatured == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
              </select>
            </div>
            <div class="span2">
              <label>Access Level: <?php echo @$categoryaccess_error;?></label>
              <select name="category_access" class="span2">
                 <?php @load_access_level($categoryaccess);?>
              </select>
            </div>
             <div class="span*">
              <label>Section: <?php echo @$section_error;?></label>
              <select name="section" class="span*">
               <?php @load_section($section);?>
              </select>
            </div>
            <div class="span3">
              <label >Alias:</label>
                <input class="input-large" type="text" name="category_alias" value="<?php echo @$categoryalias;?>" />
            </div>
             <div class="span1">
              <label >Unique ID:</label>
                <input class="input-small" type="text" name="category_uniqueid" value="<?php echo @$categoryuniqueid;?>" />
            </div>
          </div>
         <div class="row">
             <div class="span*">
             <label class="control-label" for="content-title">Description:</label>
                  <textarea rows="6" style="width:100%" class="ckeditor" name="category_desc" id="category_desc"><?php echo @htmlspecialchars($categorydesc,ENT_QUOTES);?></textarea>
             </div>
         </div>
        </div>
        
        <!--Media-->
        <div class="tab-pane" id="media" >
          <div class="row" > 
           
           <div class="span3">
           <?php if(isset($_GET['id'])&&$_GET['id']!=''){section_category_image_thumbnail(@$category_id);}?>
              <label>Upload Image:</label>
              <input type="file" name="category_picture" />
            </div>
            
          </div>
        </div>
        <!--End Media-->
        
        <!--Settings-->
        <div class="tab-pane" id="settings" >
          <div class="row"> 
           
            
          </div>
        </div>
        <!--End Settings--> 
  
      </div>
    </div>
  </div>
</form>
