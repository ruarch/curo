<div class="row">
<?php include('left-menu.php');?>

<div class="span9">
<?php echo @$user_msg;?>
<div class="page-header" style="margin:0px 0px 5px 0px">
<?php if(isset($_GET['action'])){
			$action=$_GET['action'];
			if($action=='add-new'){
  				echo'<h4 style="margin:0px">Users - Add New</h4>';
			}elseif($action=='edit'){
				echo'<h4 style="margin:0px">Users - Edit</h4>';
				if(isset($_GET['id'])){
					$id=clean_input($_GET['id']);
					$res=mysql_query("SELECT * FROM cu_users WHERE userid ='$id'") or die(mysql_error());
					$row=mysql_fetch_array($res);
					$userid=$row['userid'];
					$fullname=$row['user_fullname'];
					$username=$row['username'];
					$user_type=$row['user_type'];
					$email=$row['user_email'];
					$activation=$row['activation'];
					
			
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
		echo '<input type="hidden" name="user_id" value="'.@$userid.'" />';
	
?>
<div class="row" > <div class="span2 pull-right"><input type="submit" name="user_btn" class="btn btn-info"  value="<?php if(@$action=='add-new'){echo 'Add';}elseif(@$action=='edit'){echo 'Update';}else{echo 'Add';}?>" /></div></div>

  <div class="row">
    <div class="span9" id="article-properties">
      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#home">Home</a></li>
        <li><a href="#others">Others</a></li>
      </ul>
      <div class="tab-content">
            <div class="tab-pane active" id="home">
            <div class="row">
             <div class="span4">
                          <label>Access Level: </label>
                          <select name="user_access" class="span2">
                            <?php @load_access_level($user_type);?>
                          </select>
                          <?php echo @$user_access_error;?>
            			</div>
                        <div class="span4">
                          <label>Activated:</label>
                          <select name="activation" class="span1">
                            <option value="active" <?php echo @($activation == "active" ? 'selected="selected"' : ''); ?>>Yes</option>
                            <option value="inactive" <?php echo @($activation == "inactive" ? 'selected="selected"' : ''); ?>>No</option>
                          </select>
                        </div>
            </div>
                  <div class="row">
                        <div class="span9">
                         <label >Full Name: </label>
                         <input type="text" name="full_name" placeholder="Full Name Here" class="input-xlarge" value="<?php echo @$fullname;?>"  />
                         <?php echo @$fullname_error;?>
                      	</div>
                       
                       
                  </div>
                  <div class="row">
                  <div class="span9">
                         <label >Email: </label>
                         <input type="text" name="email" placeholder="Email address Here" class="input-xlarge" autocomplete="off" value="<?php echo @$email;?>"  />
                         <?php echo @$email_error;?>
                    </div>
                  </div>
                  <div class="row">
                  <div class="span9">
                         <label >Username: </label>
                         <input type="text" name="username" placeholder="Username Here" class="input-large" value="<?php echo @$username;?>"  />
                         <?php echo @$username_error;?>
                    </div>
                  	
                  </div>
                  
                   <div class="row">
                  	<div class="span9">
                         <label >Password:</label>
                         <input type="password" name="password" placeholder="Password Here" autocomplete="off" class="input-large" value=""  />
                          <?php echo @$password_error;?>
                    </div>
                      
                  </div>
                  
                 <div class="row">
                 	<div class="span9">
                         <label >Password (Confirm): </label>
                         <input type="password" name="confirm_password" placeholder="Confirm Password Here" autocomplete="off" class="input-large" value=""  />
                         <?php echo @$password_confirm_error;?>
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