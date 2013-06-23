<div class="row">
<?php include('left-menu.php');?>

<div class="span9">
<?php echo @$event_add_success;?>
<div class="page-header" style="margin:0px 0px 5px 0px">
<?php if(isset($_GET['action'])){
			$action=$_GET['action'];
			if($action=='add-new'){
  				echo'<h4 style="margin:0px">Event - Add New</h4>';
			}elseif($action=='edit'){
				echo'<h4 style="margin:0px">Event - Edit</h4>';
				if(isset($_GET['id'])){
					$id=clean_input($_GET['id']);
					$res=mysql_query("SELECT * FROM cu_events WHERE event_id ='$id'") or die(mysql_error());
					$row=mysql_fetch_array($res);
					$event_title=$row['event_title'];
					$event_picture=$row['event_image'];
					$event_details=$row['event_details'];
					$event_venue=$row['event_venue'];
					$event_id=$row['event_id'];
					$event_date=date("d-m-Y", strtotime($row['event_date']));
					$event_access=$row['event_access'];
					$event_featured=$row['event_feature'];
					$event_show=$row['event_show'];
			
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
		echo '<input type="hidden" name="event_id" value="'.@$event_id.'" />';
		echo '<input type="hidden" name="e_event_picture" value="'.@$event_picture.'" />';
	
?>
<div class="row" > <div class="span2 pull-right"><input type="submit" name="event_btn" class="btn btn-info"  value="<?php if(@$action=='add-new'){echo 'Add';}elseif(@$action=='edit'){echo 'Update';}else{echo 'Add';}?>" /></div></div>

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
                         <label >Event Title: <?php echo @$event_title_error;?></label>
                         <input type="text" name="event_title" placeholder="Event Title Here" class="input-large" value="<?php echo @$event_title;?>"  />
                      	</div>
                         <div class="span2">
              <div class="input-append date " id="pdp1" data-date="<?php echo today_date();?>" data-date-format="dd-mm-yyyy">
                <label >Event Date:</label>
                <input class="input-small" type="text" name="event_date" value="<?php if(@empty($event_date)){echo today_date();}else{ echo @$event_date;}?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span></div>
            </div>
                        <div class="span3">
                         <label >Event Venue: <?php echo @$event_venue_error;?></label>
                         <input type="text" name="event_venue" placeholder="Event Venue Here" class="input-large" value="<?php echo @$event_venue;?>"  />
                      	</div>
                        <div class="span2">
                          <label>Access Level: <?php echo @$event_access_error;?></label>
                          <select name="event_access" class="span2">
                            <?php @load_access_level($event_access);?>
                          </select>
            			</div>
                        <div class="span1">
                          <label>Show:</label>
                          <select name="event_show" class="span1">
                            <option value="1" <?php echo @($event_show == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
                            <option value="0" <?php echo @($event_show == "0" ? 'selected="selected"' : ''); ?>>No</option>
                          </select>
                        </div>
                        <div class="span1">
                          <label>Featured:</label>
                          <select name="event_featured" class="span1">
                            <option value="0" <?php echo @($event_featured == "0" ? 'selected="selected"' : ''); ?>>No</option>
                            <option value="1" <?php echo @($event_featured == "1" ? 'selected="selected"' : ''); ?>>Yes</option>
                          </select>
                        </div>
                      
                         <div class="span3">
						 <?php if(isset($_GET['id'])&&$_GET['id']!=''){event_thumbnail(@$event_id); }?>
                          <label>Event Picture: <?php echo @$event_picture_error;?></label>
                          <input type="file" name="event_picture" />
                        </div>
                  </div>
                  <div class="row">
                     <div class="span6">
                     <label class="control-label" for="gallery-description">Description:</label>
                          <textarea rows="6" style="width:100%" class="textarea" name="event_details"><?php echo @$event_details;?></textarea>
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