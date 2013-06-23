<div class="row">
<?php include('left-menu.php');?>

<div class="span9">
<?php echo @$section_add_success;?>
<div class="page-header" style="margin:0px 0px 5px 0px">
<?php if(isset($_GET['action'])){
	if($action=='add-new'){
  				echo'<h4 style="margin:0px">Add New</h4>';
			}elseif($action=='edit'){
				if(isset($_GET['id'])){
					$id=clean_input($_GET['id']);
					$res=mysql_query("SELECT * FROM cu_sections WHERE id ='$id'") or die(mysql_error());
					$row=mysql_fetch_array($res);
					$sectionname=$row['name'];
					$sectiontitle=$row['title'];
					$sectionshow=$row['section_show'];
          $main_nav=$row['main_nav'];
					$sectionaccess=$row['access'];
					$sectionalias=$row['alias'];
					$sectiondesc=$row['description'];
					$section_picture=$row['image'];
					$section_banner=$row['banner'];
          $section_order=$row['ordering'];
          $sectionuniqueid=$row['uniqueid'];
          echo'<h4 style="margin:0px">Edit - '.$sectionname.'</h4>';
				}
			}
}
?>

<form class="form" action="" method="post" enctype="multipart/form-data">
<?php
	@$action=$_GET['action'];
		@$section_id=clean_input($_GET['id']);
		echo '<input type="hidden" name="action" value="'.@$action.'" />';
		echo '<input type="hidden" name="section_id" value="'.@$section_id.'" />';
		echo '<input type="hidden" name="e_section_picture" value="'.@$section_picture.'" />';
		echo '<input type="hidden" name="e_section_banner" value="'.@$section_banner.'" />';
	
?>

</div>
<div class="row" > <div class="span2 pull-right"><input type="submit" name="section_btn" class="btn btn-info"  value="<?php if(@$action=='add-new'){
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
            	<label >Name: <?php echo @$sectionname_error;?></label>
                <input class="input-large" type="text" name="section_name"  value="<?php echo @$sectionname;?>"/>
               
            </div>
            <div class="span3">
            	<label >Title: </label>
                <input class="input-xlarge" type="text" name="section_title" value="<?php echo @$sectiontitle;?>" />
            </div>
            <div class="span1">
              <label>Show:</label>
              <select name="section_show" class="span1">
                <option value="1" <?php echo @($sectionshow == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
                <option value="0" <?php echo @($sectionshow == "0" ? 'selected="selected"' : ''); ?>>No</option>
              </select>
            </div>
            <div class="span2">
              <label>Main Menu:</label>
              <select name="main_nav" class="span1">
                <option value="1" <?php echo @($main_nav == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
                <option value="0" <?php echo @($main_nav == "0" ? 'selected="selected"' : ''); ?>>No</option>
              </select>
            </div>
            <div class="span2">
              <label>Access Level: <?php echo @$sectionaccess_error;?></label>
              <select name="section_access" class="span2">
                <?php @load_access_level($sectionaccess);?>
              </select>
            </div>
            <div class="span1">
              <label>Ordering: <?php echo @$sectionorder_error;?></label>
              <select name="section_order" class="span1">
                <?php @list_section_ordering($section_order);?>
              </select>
            </div>
            <div class="span3">
            	<label >Alias:</label>
                <input class="input-xlarge" type="text" name="section_alias" value="<?php echo @$sectionalias;?>" />
            </div>
            <div class="span2">
              <label >Unique ID:</label>
                <input class="input-small" type="text" name="section_uniqueid" value="<?php echo @$sectionuniqueid;?>" />
            </div>
          </div>
         <div class="row">
             <div class="span*">
             <label class="control-label" for="content-title">Description:</label>
                  <textarea rows="6" style="width:100%" class="ckeditor" name="section_desc"><?php echo @htmlspecialchars($sectiondesc,ENT_QUOTES);?></textarea>
             </div>
         </div>
        </div>
        
        <!--Media-->
        <div class="tab-pane" id="media" >
          <div class="row" > 
           
           <div class="span3">
             <?php
			 if(isset($_GET['id'])&&$_GET['id']!=''){section_image_thumbnail(@$section_id); 
			 
			 }?>
              <label>Upload Image: <?php echo @$section_picture_error;?></label>
              <input type="file" name="section_picture" />
            </div>
            
            <div class="span3">
            <?php if(isset($_GET['id'])&&$_GET['id']!=''){section_banner_thumbnail(@$section_id);}?>
              <label>Banner: <?php echo @$section_banner_error;?></label>
              <input type="file" name="section_banner" />
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
