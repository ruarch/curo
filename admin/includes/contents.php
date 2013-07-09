<div class="row">
<?php include('left-menu.php');?>

<div class="span9">
<?php echo @$content_add_success;?>
<div class="page-header" style="margin:0px 0px 5px 0px">
<?php if(isset($_GET['action'])){
			$action=$_GET['action'];
			if($action=='add-new'){
  				echo'<h4 style="margin:0px">Add New</h4>';
			}elseif($action=='edit'){
				echo'<h4 style="margin:0px">Edit</h4>';
				if(isset($_GET['id'])){
					$id=clean_input($_GET['id']);
					$res=mysql_query("SELECT * FROM cu_contents WHERE id ='$id'") or die(mysql_error());
			$row=mysql_fetch_array($res);
			$timestamp=date("d-m-Y", strtotime($row['created']));
			$pubished_date=$timestamp;
			$content_section=$row['section_id'];
      $content_source=$row['content_source'];
			$content_publish=$row['published'];
			$content_category=$row['category_id'];
			$content_access=$row['access'];
			$content_featured=$row['feature'];
			$content_title=$row['content_title'];
			$content_alias=$row['content_alias'];
			$full_content=$row['full_content'];
			$content_pic_desc=$row['image_desc'];
			$audio_desc=$row['audio_file_desc'];
			$video_desc=$row['video_file_desc'];
			$metakey=$row['metakey'];
			$metadesc=$row['metadesc'];
			$metadata=$row['metadata'];
			$introtext=$row['intro_text'];
			$excerpt=$row['excerpt'];
			$content_picture=$row['image'];
			$content_audio=$row['audio_file'];
			$content_video=$row['video_file'];
      $content_other_file_desc=$row['other_file_desc'];
      $content_other_file=$row['other_file'];
      $fo_res=mysql_query("SELECT * FROM cu_content_frontpage WHERE content_id='$id'") or die(mysql_error());
      $fo_row=mysql_fetch_array($fo_res);
      $frontp_order=$fo_row['ordering'];

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
		echo '<input type="hidden" name="content_id" value="'.@$content_id.'" />';
		echo '<input type="hidden" name="e_content_picture" value="'.@$content_picture.'" />';
		echo '<input type="hidden" name="e_content_audio" value="'.@$content_audio.'" />';
		echo '<input type="hidden" name="e_content_video" value="'.@$content_video.'" />';
    echo '<input type="hidden" name="e_content_other_file" value="'.@$content_other_file.'" />';
	
?>
<div class="row" > <div class="span2 pull-right"><input type="submit" name="content_btn" class="btn btn-info"  value="<?php if(@$action=='add-new'){echo 'Add';}elseif(@$action=='edit'){echo 'Update';}else{echo 'Add';}?>" /></div></div>

  <div class="row">
    <div class="span9" id="article-properties">
      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#home">Home</a></li>
        <li><a href="#media">Media <?php echo @$error_on_page2;?></a></li>
        <li><a href="#meta">Meta Info</a></li>
        <li><a href="#others">Others</a></li>
      </ul>
      <div class="tab-content">
        	<div class="tab-pane active" id="home"><!--home TAB-->
            		<div class="row">
            <div class="span2">
              <div class="input-append date " id="pdp1" data-date="<?php echo today_date();?>" data-date-format="dd-mm-yyyy">
                <label >Publish Date:</label>
                <input class="input-small" type="text" name="pubished_date" value="<?php if(@empty($pubished_date)){echo today_date();}else{ echo @$pubished_date;}?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span></div>
            </div>
            <div class="span3">
              <label>Section:</label>
              <select name="content_section">
                <?php @load_section($content_section);?>
              </select>
            </div>
            <div class="span3">
              <label>Category:</label>
              <select name="content_category">
                <?php @load_categories($content_category);?>
              </select>
            </div>
            <div class="span2">
              <label>Access Level: <?php echo @$content_access_error;?></label>
              <select name="content_access" class="span2">
                <?php @load_access_level($content_access);?>
              </select>
            </div>
            <div class="span1">
              <label>Featured:</label>
              <select name="content_featured" class="span1">
                <option value="0" <?php echo @($content_featured == "0" ? 'selected="selected"' : ''); ?>>No</option>
                <option value="1" <?php echo @($content_featured == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
              </select>
            </div>
            <div class="span3">
            <label>Alias:</label>
            	<input type="text" name="content_alias" class="input-large"  value="<?php echo @$content_alias;?>"/>
            </div>
            <div class="span2">
            <label>Publish:</label>
            <select name="content_publish" class="span2">
                <option value="published">Publish</option>
                <option value="unpublished">Unpublish</option>
                <option value="draft">Draft</option>
              </select>
            </div>
             <div class="span1">
            <label>Frontpage:</label>
            <select name="content_frontpage" class="span1">
                
                 <?php if($action=='add-new'){?>
               <option value="0">No</option>
                <option value="1">Yes</option>
                <?php }elseif($action=='edit'){?>
                 		<?php @load_frontpage($content_id);?>
                <?php }?>
              </select>
            </div>
            <div class="span*">
              <label>Front Ordering: <?php echo @$sectionorder_error;?></label>
              <select name="frontp_order" class="span1">
                <?php @list_frontpage_ordering($frontp_order,'content');?>
              </select>
            </div>
            <div class="span3" >
                  <label>Source:</label>
                    <input type="text" name="content_source" class="input-large" placeholder="Content source"  value="<?php echo @$content_source;?>"/>
              </div>

               <div class="span3" >
                  <label>Source:</label>
                    <input type="text" name="content_source" class="input-large" placeholder="Content source"  value="<?php echo @$content_source;?>"/>
              </div>
          </div>
       
          		<div class="control-group" >
                <label class="control-label" for="content-title">Title: <?php echo @$content_title_error;?></label>
                <div class="controls">
                  <div class="input-prepend"> <span class="add-on"><i class="icon-pencil"></i></span>
                    <input type="text" id="content-title" placeholder="Article Title" name="content_title" class="input-xxlarge" value="<?php echo @$content_title;?>" />
                  </div>
                 </div>
                 
               </div>
               
                  <div class="row">
              <div class="span9">
              <label class="control-label" for="content-title">Content:</label>
              <textarea rows="6" style="width:100%" class="ckeditor" id="word_count" name="editor1"><?php echo @htmlspecialchars($full_content,ENT_QUOTES);?></textarea>
            </div>
        </div>
              
             
            </div><!--//home TAB-->
            <div class="tab-pane " id="media"><!--Media TAB-->
            	<div class="row" style="overflow:hidden"> 
            <!--Image Section-->
            
            <div class="span3">
            <?php if(isset($_GET['id'])&&$_GET['id']!=''){content_image_thumbnail(@$content_id);}?>
              <label>Upload Image: <?php echo @$content_picture_error;?></label>
              <input type="file" name="content_picture" />
              <label>Description:</label>
              <textarea name="content_pic_desc" ><?php echo @$content_pic_desc;?></textarea>
            </div>
            <!--End Image Section--> 
            
            <!--Image Section-->
            <div class="span3">
             <?php if(isset($_GET['id'])&&$_GET['id']!=''){content_audio_link(@$content_id);}?>
              <label>Upload Audio: <?php echo @$content_audio_error;?></label>
              <input type="file" name="content_audio" />
              <label>Description:</label>
              <textarea name="audio_desc"><?php echo @$audio_desc;?></textarea>
            </div>
            <!--End Image Section--> 
            
            <!--video Section-->
            <div class="span2">
            <?php if(isset($_GET['id'])&&$_GET['id']!=''){content_video_link(@$content_id);}?>
              <label>Upload Video: <?php echo @$content_video_error;?></label>
              <input type="file" name="content_video" />
               <label>Description:</label>
              <textarea name="video_desc"><?php echo @$video_desc;?></textarea>
            </div>
            <!--End video Section--> 

            <!--other file Section-->
            <div class="span2">
            <?php if(isset($_GET['id'])&&$_GET['id']!=''){content_otherfile_link(@$content_id);}?>
              <label>Upload file: <?php echo @$content_other_file_error;?></label>
              <input type="file" name="content_other_file" />
               <label>Description:</label>
              <textarea name="content_other_file_desc"><?php echo @$content_other_file_desc;?></textarea>
            </div>
            <!--End other file  Section--> 
            
          </div>
        <!--End Media--> 
        
            </div><!--//Media TAB-->
            <div class="tab-pane " id="meta"><!--meta TAB-->

          <div class="row">
            <div class="span7">
              <label for="content-title">Meta Keywords:</label>
              <textarea rows="2" class="span7" name="metakey" ><?php echo @$metakey;?></textarea>
            </div>
            <div class="span7">
              <label for="content-title">Meta Description:</label>
              <textarea rows="4" class="span7" name="metadesc" ><?php echo @$metadesc;?></textarea>
            </div>
            <div class="span7">
              <label for="content-title">Meta Data:</label>
              <textarea rows="4" class="span7" name="metadata" ><?php echo @$metadata;?></textarea>
            </div>
          </div>
    
        
       
        
            </div><!--//meta TAB-->
            
            <div class="tab-pane " id="others"><!--others TAB-->
        <div class="row">
              <div class="span7">
                <label for="content-title">Intro Text:</label>
                <textarea rows="2" class="span7" name="introtext" ><?php echo @$introtext;?></textarea>
              </div>
              <div class="span7">
                <label for="content-title">Excerpt:</label>
                <textarea rows="2" class="span7" name="excerpt" ><?php echo @$excerpt;?></textarea>
              </div>
          </div>
            </div><!--//others TAB-->
         
      </div>
      
    </div>
  </div>
  <br />
  <div class="row" > <div class="span2 pull-right"><input type="submit" name="content_btn" class="btn btn-info"  value="<?php if(@$action=='add-new'){echo 'Add';}elseif(@$action=='edit'){echo 'Update';}else{echo 'Add';}?>" /></div></div>

</form>
</div></div>