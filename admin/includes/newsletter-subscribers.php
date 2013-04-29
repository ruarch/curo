<div class="row">
<?php include('right-menu.php');?>

<div class="span9">
<?php echo @$subscriber_add_success;?>
<div class="page-header" style="margin:0px 0px 5px 0px">
<?php if(isset($_GET['action'])){
			$action=$_GET['action'];
			if($action=='add-subscriber'){
  				echo'<h4 style="margin:0px">Newsletter - Add New</h4>';
			}elseif($action=='edit-subscriber'){
				echo'<h4 style="margin:0px">Newsletter  - Edit</h4>';
				if(isset($_GET['id'])){

					$id=clean_input($_GET['id']);
					$res=mysql_query("SELECT * FROM cu_newsletter_users WHERE id ='$id'") or die(mysql_error());
					$row=mysql_fetch_array($res);
					$id=$row['id'];
					$email=$row['email'];
					$sub_date=$row['sub_date'];
					$status=$row['status'];
					
			
				}
			}
}
  
 ?>
</div>
<form class="form" action="" method="post" enctype="multipart/form-data">
<?php
	@$action=$_GET['action'];
		@$id=clean_input($_GET['id']);
		echo '<input type="hidden" name="action" value="'.@$action.'" />';
		echo '<input type="hidden" name="sub_id" value="'.@$id.'" />';
	
?>
<div class="row" > <div class="span2 pull-right"><input type="submit" name="subscribe_newsletter_btn" class="btn"  value="<?php if(@$action=='add-subscriber'){echo 'Add';}elseif(@$action=='edit-subscriber'){echo 'Update';}else{echo 'Add';}?>" /></div></div>

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
                         <label >Email: <?php echo @$email_error;?></label>
                         <input type="text" name="sub_email" placeholder="Subscriber Email" class="input-large" value="<?php echo @$email;?>"  />
                      	</div>
                         <div class="span2">
              <div class="input-append date " id="pdp1" data-date="<?php echo today_date();?>" data-date-format="dd-mm-yyyy">
                <label >Subscribtion Date:</label>
                <input class="input-small" type="text" name="sub_date" value="<?php if(@empty($sub_date)){echo today_date();}else{ echo @$sub_date;}?>" readonly />
                <span class="add-on"><i class="icon-calendar"></i></span></div>
            </div>
                     
                        <div class="span1">
                          <label>Status:</label>
                          <select name="sub_status" class="span2">
                            <option value="1" <?php echo @($status == "1" ? 'selected="selected"' : ''); ?>>Activated</option>
                            <option value="0" <?php echo @($status == "0" ? 'selected="selected"' : ''); ?>>Deactivated</option>
                          </select>
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