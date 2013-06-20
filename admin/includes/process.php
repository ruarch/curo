<?php //

if(isset($_POST['send_newsletter_to_subscriber'])){
	include('class.phpmailer.php');
	$mail = new PHPMailer(); // defaults to using php "mail()"
	if(isset($_POST['nslid'])){
			foreach($_POST['nslid'] as $send_newsletter_item){
				$send_newsletter_res_chk=mysql_query("SELECT * FROM cu_newsletters WHERE id='$send_newsletter_item'") or die(mysql_error());
				$send_newsletter_row=mysql_fetch_array($send_newsletter_res_chk);
				$newsletter_sub_res=mysql_query("SELECT * FROM cu_newsletter_users") or die(mysql_error());
				$subject=$send_newsletter_row['title'];
				$body=htmlentities($send_newsletter_row['content']);

				while ($newsletter_sub_row=mysql_fetch_array($newsletter_sub_res)) {
					
				
				$mail->SetFrom(INFO_EMAIL, SITE_NAME);
										
				$mail->AddReplyTo($newsletter_sub_row['email'],'');				
				$mail->AddAddress($newsletter_sub_row['email'], $subject);
				$mail->Subject    = $subject;
				$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
				$mail->MsgHTML($body);
			}
		}
		if($mail->Send()) {
			@session_start();
			$sent_by=$_SESSION['userid_admin'];
			$timestamp=date("Y-m-d H:i:s", time());
			$update_sent=mysql_query("UPDATE cu_newsletters SET sent='1', sent_date='$timestamp', sent_by='$sent_by' WHERE id='$send_newsletter_item' ")or die(mysql_error());
				$del_nsl_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Newsletter(s) successfully sent!</div>';
		
		}else{
			
			

					$del_nsl_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select newsletter(s) couldn\'t be sent!</div>';
			}
	
	}else{
		$del_nsl_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select newsletter(s) to be sent!</div>';

	}

}

//////////////BATCH DELETE PROCESSESS///////////////////
if(isset($_POST['delete_newsletter'])){//batch delete newsletter subscriber
if(isset($_POST['nslid'])){
	foreach($_POST['nslid'] as $del_item){
		$del_res_chk=mysql_query("DELETE FROM cu_newsletters WHERE id='$del_item'") or die(mysql_error());
	}
	if($del_res_chk){
		$del_nsl_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Newsletter(s) successfully Deleted!</div>';
		}else{
			$del_nsl_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Newsletter(s) couldn\'t  Deleted!</div>';
		}
}else{
			$del_nsl_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select newsletter(s) to delete!</div>';
}
}

if(isset($_POST['delete_subscriber'])){//batch delete newsletter subscriber
if(isset($_POST['subid'])){
	foreach($_POST['subid'] as $del_item){
		$del_res_chk=mysql_query("DELETE FROM cu_newsletter_users WHERE id='$del_item'") or die(mysql_error());
	}
	if($del_res_chk){
		$del_sub_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Subscriber(s) successfully Deleted!</div>';
		}else{
			$del_sub_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Subscriber(s) couldn\'t  Deleted!</div>';
		}
}else{
			$del_sub_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select subscriber(s) to delete!</div>';
}
}

if(isset($_POST['delete_user'])){//batch delete user
if(isset($_POST['userid'])){
	foreach($_POST['userid'] as $del_item){
		$del_res_chk=mysql_query("DELETE FROM cu_users WHERE userid='$del_item'") or die(mysql_error());
	}
	if($del_res_chk){
		$del_user_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>User(s) successfully Deleted!</div>';
		}else{
			$del_user_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>User(s) couldn\'t  Deleted!</div>';
		}
}else{
			$del_user_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select user(s) to delete!</div>';

}
}


if(isset($_POST['delete_event'])){//batch delete events
if(isset($_POST['eventid'])){
	foreach($_POST['eventid'] as $del_item){
		$del_res_chk=mysql_query("DELETE FROM cu_events WHERE event_id='$del_item'") or die(mysql_error());
	}
	if($del_res_chk){
		$del_event_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Event(s) successfully Deleted!</div>';
		}else{
			$del_event_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Event(s) couldn\'t  Deleted!</div>';
		}
}else{
			$del_event_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select event(s) to delete!</div>';

}
}


if(isset($_POST['delete_con_images'])){//batch delete con images
if(isset($_POST['imageid'])){
	foreach($_POST['imageid'] as $del_item){
		$del_res_chk=mysql_query("DELETE FROM cu_con_images WHERE image_id='$del_item'") or die(mysql_error());
	}
	if($del_res_chk){
		$del_images_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Image(s) successfully Deleted!</div>';
		}else{
			$del_images_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Image(s) couldn\'t  Deleted!</div>';
		}
}else{
			$del_images_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select images(s) to delete!</div>';

}
}

if(isset($_POST['delete_images'])){//batch delete images
if(isset($_POST['imageid'])){
	foreach($_POST['imageid'] as $del_item){
		$del_res_chk=mysql_query("DELETE FROM cu_images WHERE image_id='$del_item'") or die(mysql_error());
	}
	if($del_res_chk){
		$del_images_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Image(s) successfully Deleted!</div>';
		}else{
			$del_images_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Image(s) couldn\'t  Deleted!</div>';
		}
}else{
			$del_images_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select images(s) to delete!</div>';

}
}

if(isset($_POST['delete_gallery'])){//batch delete gallery
if(isset($_POST['galleryid'])){
	foreach($_POST['galleryid'] as $del_item){
		$del_res_chk=mysql_query("DELETE FROM cu_gallery WHERE gallery_id='$del_item'") or die(mysql_error());
	}
	if($del_res_chk){
		$del_gallery_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Gallery successfully Deleted!</div>';
		}else{
			$del_gallery_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Gallery couldn\'t  Deleted!</div>';
		}
}else{
			$del_gallery_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select gallery(s) to delete!</div>';

}
}


if(isset($_POST['delete_slide'])){//batch delete slides
if(isset($_POST['slideid'])){
	foreach($_POST['slideid'] as $del_item){
		$del_res_chk=mysql_query("DELETE FROM cu_slideshow WHERE slide_id='$del_item'") or die(mysql_error());
	}
	if($del_res_chk){
		$del_slide_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Slide successfully Deleted!</div>';
		}else{
			$del_slide_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Slide couldn\'t  Deleted!</div>';
		}
}else{
			$del_slide_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select slide(s) to delete!</div>';

}
}


if(isset($_POST['delete_content'])){//batch delete contents
if(isset($_POST['contentid'])){
	foreach($_POST['contentid'] as $del_item){
		$del_res_chk=mysql_query("DELETE FROM cu_contents WHERE id='$del_item'") or die(mysql_error());
	}
	if($del_res_chk){
		$del_content_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Content successfully Deleted!</div>';
		}else{
			$del_content_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Content couldn\'t  deleted!</div>';
		}
}else{
		$del_content_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select content(s) to delete!</div>';

}
}
if(isset($_POST['delete_category'])){//batch delete categories
if(isset($_POST['categoryid'])){
	foreach($_POST['categoryid'] as $del_item){
		$del_res_chk=mysql_query("DELETE FROM cu_categories WHERE id='$del_item'") or die(mysql_error());
	}
	if($del_res_chk){
		$del_category_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Categories successfully deleted!</div>';
		}else{
			$del_category_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Category couldn\'t  Deleted!</div>';
		}
}else{
	$del_category_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select category(s) delete!</div>';
}
}

if(isset($_POST['delete_section'])){//batch delete sections
if(isset($_POST['sectionid'])){
	foreach($_POST['sectionid'] as $del_item){
		$del_res_chk=mysql_query("DELETE FROM cu_sections WHERE id='$del_item'") or die(mysql_error());
	}
	if($del_res_chk){
		$del_section_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Section successfully deleted!</div>';
		}else{
			$del_section_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Section couldn\'t  Deleted!</div>';
		}
}else{
	$del_section_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select section(s) deleted!</div>';
}
}



if(isset($_GET['action'])){//Delete a particular(...)

	if($_GET['action']=='delete-sub' && $page=='newsletter'){//Delete a particular  users

$del_id=clean_input($_GET['id']);
		$del_res=mysql_query("DELETE FROM cu_newsletter_users WHERE id='$del_id'") or die(mysql_error());
		if($del_res){
			$del_sub_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Subscriber successfully Deleted!</div>';
		}else{
			$del_sub_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Subscriber couldn\'t  Deleted!</div>';
		}
	}

	if(isset($_GET['subaction']) && $_GET['subaction']=='delete-nsl' && $page=='newsletter'){//Delete a particular  users

		$del_id=clean_input($_GET['id']);
		$del_res=mysql_query("DELETE FROM cu_newsletters WHERE id='$del_id'") or die(mysql_error());
		if($del_res){
			$del_nsl_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Newsletter successfully Deleted!</div>';
		}else{
			$del_nsl_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Newsletter couldn\'t  Deleted!</div>';
		}
	}

if($_GET['action']=='delete' && $page=='users'){//Delete a particular  users

$del_id=clean_input($_GET['id']);
		$del_res=mysql_query("DELETE FROM cu_users WHERE userid='$del_id'") or die(mysql_error());
		if($del_res){
			$del_user_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>User successfully Deleted!</div>';
		}else{
			$del_user_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>User couldn\'t  Deleted!</div>';
		}
	}

if($_GET['action']=='delete' && $page=='events'){//Delete a particular  event

$del_id=clean_input($_GET['id']);
		$del_res=mysql_query("DELETE FROM cu_events WHERE event_id='$del_id'") or die(mysql_error());
		if($del_res){
			$del_event_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Event successfully Deleted!</div>';
		}else{
			$del_event_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Event couldn\'t  Deleted!</div>';
		}
	}


if($_GET['action']=='delete' && ($page=='section-images'|| $page=='category-images' || $page=='content-images')){//Delete a particular  image

$del_id=clean_input($_GET['id']);
		$del_res=mysql_query("DELETE FROM cu_con_images WHERE image_id='$del_id'") or die(mysql_error());
		if($del_res){
			$del_images_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Image successfully Deleted!</div>';
		}else{
			$del_images_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Image couldn\'t  Deleted!</div>';
		}
	}

if($_GET['action']=='delete' && $page=='gallery'){//Delete a particular  gallery

$del_id=clean_input($_GET['id']);
		$del_res=mysql_query("DELETE FROM cu_gallery WHERE gallery_id='$del_id'") or die(mysql_error());
		if($del_res){
			$del_gallery_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Gallery successfully Deleted!</div>';
		}else{
			$del_gallery_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Gallery couldn\'t  Deleted!</div>';
		}
	}

if($_GET['action']=='delete' && $page=='images'){//Delete a particular  gallery

$del_id=clean_input($_GET['id']);
		$del_res=mysql_query("DELETE FROM cu_images WHERE image_id='$del_id'") or die(mysql_error());
		if($del_res){
			$del_images_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Image(s) successfully Deleted!</div>';
		}else{
			$del_images_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Image(s) couldn\'t  Deleted!</div>';
		}
	}


if($_GET['action']=='delete' && $page=='slideshow'){//Delete a particular  slide

$del_id=clean_input($_GET['id']);
		$del_res=mysql_query("DELETE FROM cu_slideshow WHERE slide_id='$del_id'") or die(mysql_error());
		if($del_res){
			$del_slide_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Slide successfully Deleted!</div>';
		}else{
			$del_slide_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Slide couldn\'t  Deleted!</div>';
		}
	}


	if($_GET['action']=='delete' && $page=='contents'){// content delete
		$del_id=clean_input($_GET['id']);
		$del_res=mysql_query("DELETE FROM cu_contents WHERE id='$del_id'") or die(mysql_error());
		if($del_res){
			$del_content_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Content successfully Deleted!</div>';
		}else{
			$del_content_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Content couldn\'t  Deleted!</div>';
		}
	}
	
	if($_GET['action']=='delete' && $page=='sections'){//Delete a particular  section

$del_id=clean_input($_GET['id']);
		$del_res=mysql_query("DELETE FROM cu_sections WHERE id='$del_id'") or die(mysql_error());
		if($del_res){
			$del_content_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Sections successfully Deleted!</div>';
		}else{
			$del_content_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Sections couldn\'t  Deleted!</div>';
		}
	}
	
	
	if($_GET['action']=='delete' && $page=='categories'){//Delete a particular  category

$del_id=clean_input($_GET['id']);
		$del_res=mysql_query("DELETE FROM cu_categories WHERE id='$del_id'") or die(mysql_error());
		if($del_res){
			$del_content_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Category successfully Deleted!</div>';
		}else{
			$del_content_msg='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a><strong>Error:</strong>Category couldn\'t  Deleted!</div>';
		}
	}
}
/////////////////////////////////////////////End of delete for lists/////////////////////////////////////////////////////////////////////////
if(isset($_POST['newsletter_btn'])){// Process Add New Newsletter Subscriber
	$validated=true; 
	$newsletter_title=clean_input($_POST['newsletter_title']);
	$newsletter_created=date("Y-m-d H:i:s", strtotime($_POST['newsletter_created']));
	$newsletter_content=$_POST['editor1'];
	$action=$_POST['action'];
	$newsletter_id=$_POST['newsletter_id'];

	if(empty($newsletter_content)){
		$validated=false;
		$newsletter_title_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Enter newsletter title!</div>';
	}

	if($validated==true){
		if($action=='add-newsletter'){
			$res=mysql_query("INSERT INTO cu_newsletters(title,content,created) VALUES('$newsletter_title','$newsletter_content','$newsletter_created')") or die(mysql_error());

		}elseif ($action=='edit-newsletter') {
			$res=mysql_query("UPDATE cu_newsletters SET title='$newsletter_title',content='$newsletter_content',created='$newsletter_created' WHERE id='$newsletter_id' ") or die(mysql_error());

		}
		if($res){
		
			if($action=='add-newsletter'){
				$newsletter_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Newsletter successfully added!</div>';
			}elseif($action=='edit-newsletter'){
				$newsletter_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Newsletter successfully updated!</div>';
			}
			
			$newsletter_title='';
			$newsletter_content='';
		}
	}

	}
if(isset($_POST['subscribe_newsletter_btn'])){// Process Add New Newsletter Subscriber  
	$validated=true;
	$pattern = "/^[-_a-z0-9\'+*$^&%=~!?{}]++(?:\.[-_a-z0-9\'+*$^&%=~!?{}]+)*+@(?:(?![-.])[-a-z0-9.]+(?<![-.])\.[a-z]{2,6}|\d{1,3}(?:\.\d{1,3}){3})(?::\d++)?$/iD";
	$email=$_POST['sub_email'];
	$action=$_POST['action'];
	$status=$_POST['sub_status'];
	$sub_date=date("Y-m-d H:i:s", strtotime($_POST['sub_date']));
	$sub_id=$_POST['sub_id'];

	if(empty($email)){
		$validated=false;
		$email_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Enter an email address!</div>';
	}

	if(!empty($email)){
		if(!preg_match($pattern, $email)){
				$validated=false;
				$email_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Enter a valid e-mail address!</div>';

		}
	}

	if($validated==true){
		if($action=='add-subscriber'){
			$res=mysql_query("INSERT INTO cu_newsletter_users(email,sub_date,status) VALUES('$email','$sub_date','$status')") or die(mysql_error());

		}elseif ($action=='edit-subscriber') {
			$res=mysql_query("UPDATE cu_newsletter_users SET email='$email',sub_date='$sub_date',status='$status' WHERE id='$sub_id' ") or die(mysql_error());

		}
		if($res){
		
			if($action=='add-subscriber'){
				$subscriber_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Subscriber successfully added!</div>';
			}elseif($action=='edit-subscriber'){
				$subscriber_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Subscriber successfully updated!</div>';
			}
			
			$email='';
			$status='';
		}
	}

}
if(isset($_POST['event_btn'])){// Process Category Add New
	$validated=true;
	$event_title=clean_input($_POST['event_title']);
	$event_date=date("Y-m-d",strtotime(clean_input($_POST['event_date'])));
	$event_venue=clean_input($_POST['event_venue']);
	$event_access=clean_input($_POST['event_access']);
	$event_show=clean_input($_POST['event_show']);
	$event_featured=clean_input($_POST['event_featured']);
	$event_details=clean_input($_POST['event_details']);
	$event_picture='';
	$modified=date("Y-m-d H:i:s", time());
	@session_start();
	$modified_by=$_SESSION['userid_admin'];
	$added_by=$_SESSION['userid_admin'];
	if(empty($event_title)){
		$validated=false;
		$event_title_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Enter event title!</div>';
	}
	
		if(!empty($_FILES["event_picture"]['name'])&&($_FILES["event_picture"]['size']>2097152)){
			$validated=false;
			$error_on_page2='<div class="not-icon"></div>';
			$category_picture_error='<div class="help-inline alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Picture size must be 2 Megabyte or less!</div>';
		}
		if(empty($event_access)){
				$validated=false;
				$event_access_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select access level!</div>';
			}
		if(!empty($_FILES["event_picture"]['name'])){
			$extension = substr($_FILES['event_picture']['name'], strpos($_FILES['event_picture']['name'],'.'), strlen($_FILES['event_picture']['name'])-1); 
			$filetypes = array('.jpg', '.JPG', '.gif', '.GIF', '.png', '.PNG', '.jpeg', '.JPEG', '.jpe', '.bmp');
 				if(!in_array($extension, $filetypes)){
					$validated=false;
					$error_on_page2='<div class="not-icon"></div>';
					$event_picture_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an image file!</div>';
					}
				}
				
	if($validated==true){
		$event_picture=$_FILES["event_picture"]['name'];
		if(empty($event_picture)){
			$event_picture=$_POST['e_event_picture'];
		}else{
			@unlink(EVENTS_FOLDER.$_POST['e_event_picture']);
		}
		if(isset($_POST['remove_event_image'])){
			$event_picture=NULL;
			@unlink(EVENTS_FOLDER.$_POST['e_event_picture']);
		}
		$action='';
		$action=$_POST['action'];
		if($action=='add-new'){
				$res=mysql_query("INSERT INTO cu_events (event_title,event_venue,event_date,event_show,event_access,event_feature,event_details,event_image,added_by)VALUES('$event_title','$event_venue','$event_date','$event_show','$event_access','$event_featured','$event_details','$event_picture','$added_by')") or die(mysql_error());
			}elseif($action=='edit'){
				$event_id=clean_input($_POST['event_id']);
				$res=mysql_query("UPDATE cu_events SET event_title='$event_title', event_venue='$event_venue', event_date='$event_date', event_show='$event_show', event_access='$event_access', event_feature='$event_featured',modified_date='$modified', event_details='$event_details',modified_by='$modified_by',event_image='$event_picture' WHERE event_id='$event_id'")or die(mysql_error());
			}
		
		
		if($res){
			$uploadpath=EVENTS_FOLDER.$event_picture;
        	@move_uploaded_file($_FILES["event_picture"]['tmp_name'],$uploadpath);
			if($action=='add-new'){
				$event_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Event successfully added!</div>';
			}elseif($action=='edit'){
				$event_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Event successfully updated!</div>';
			}
			
			$event_title='';
			$event_date='';
			$event_venue='';
			$event_access='';
			$event_show='';
			$event_featured='';
			$event_details='';
			$event_picture='';
		}
	}
}//End of adding new event 

if(isset($_POST['user_btn'])){// Process users
	$validated=true;
	$action='';
	$action=$_POST['action'];
	$pattern = "/^[-_a-z0-9\'+*$^&%=~!?{}]++(?:\.[-_a-z0-9\'+*$^&%=~!?{}]+)*+@(?:(?![-.])[-a-z0-9.]+(?<![-.])\.[a-z]{2,6}|\d{1,3}(?:\.\d{1,3}){3})(?::\d++)?$/iD";
	$fullname=clean_input($_POST['full_name']);
	$user_access=clean_input($_POST['user_access']);
	$username=clean_input($_POST['username']);
	$activation=clean_input($_POST['activation']);
	$email=clean_input($_POST['email']);
	$password=clean_input($_POST['password']);
	$confirm_password=clean_input($_POST['confirm_password']);
	@session_start();
	if(empty($fullname)){
				$validated=false;
				$fullname_error='<span for="fullname" generated="true" class="help-inline alert alert-error" style="">Enter Full Name</span>';
			}
			if(empty($username)){
				$validated=false;
				$username_error='<span for="username" generated="true" class="help-inline alert alert-error" style="">Enter username</span>';
			}
			if(!empty($username)){
				if($action=='add-new'){
					if(chk_username($username)){
					$validated=false;
					$username_error='<span for="username" generated="true" class="help-inline alert alert-info" style="">Username already exist, try another username</span>';
					}
				}elseif($action=='edit'){
					if(!chk_username($username,$_POST['user_id'])){
						if(chk_username($username)){
						$validated=false;
					$username_error='<span for="username" generated="true" class="help-inline alert alert-info" style="">Username already exist, try another username</span>';
						}
					}
				}
			}
			if(empty($user_access)){
				$validated=false;
				$user_access_error='<span for="acesslevel" generated="true" class="help-inline alert alert-error" style="">Select access level</span>';
			}
			
	if(empty($email)){
		$validated=false;
		$email_error='<span for="email" generated="true" class="help-inline alert alert-error" style="">Enter your email address</span>';
	}
	
	if(!empty($email)){
		if(!preg_match($pattern, $email)){
			$validated=false;
			$email_error='<span for="email" generated="true" class="help-inline alert alert-error" style="">Enter a valid email address</span>';
		}
	}
	if(!empty($email)){
		if($action=='add-new'){
			if(chk_email($email)){
				$validated=false;
				$email_error='<span for="email" generated="true" class="help-inline alert alert-info" style="">Email already exist, use another email address</span>';
			}
		}elseif($action=='edit'){
			if(!chk_email($email,$_POST['user_id'])){
				if(chk_email($email)){
				$validated=false;
				$email_error='<span for="email" generated="true" class="help-inline alert alert-info" style="">Email already exist, use another email address</span>';
				}
			}
				
		}
	}
	if(empty($password)&& $action=='add-new'){
		$validated=false;
		$password_error='<span for="password" generated="true" class="help-inline alert alert-error" style="">Enter your password</span>';
	}
	if(!empty($password)){
		if(strlen($password)<6){
			$validated=false;
			$password_error='<span for="password" generated="true" class="help-inline alert alert-error" style="">Password must be minimum 6 characters</span>';
		}
		
		if(empty($confirm_password) ){
			$validated=false;
			$password_confirm_error='<span for="confirm password" generated="true" class="help-inline alert alert-error" style="">Enter confirm password</span>';
		}elseif(!empty($confirm_password)){
			if($password!=$confirm_password){
			$validated=false;
			$password_confirm_error='<span for="password" generated="true" class="help-inline alert alert-error" style="">Password and Confirm Password must match</span>';
			}
		}
	}
			
			if($validated==true){
				$hash_password=md5($password);
				if($action=='add-new'){
					$res=mysql_query("INSERT INTO cu_users(user_fullname,username,user_email,user_password,user_type,activation) VALUES('$fullname','$username','$email','$hash_password','$user_access','$activation')") or die(mysql_error());
					if($res){
						$user_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>User successfully added!</div>';	
						$fullname='';
						$user_access='';
						$username='';
						$activation='';
						$email='';
						$password='';
						$confirm_password='';
					}
				}
				if($action=='edit'){
					$uid=$_POST['user_id'];
					if(empty($password)){
						$sql="UPDATE cu_users SET user_fullname='$fullname',username='$username',user_email='$email',user_type='$user_access',activation='$activation' WHERE userid='$uid'";
					}elseif(!empty($password)){
						$hash_password=md5($password);
						$sql="UPDATE cu_users SET user_fullname='$fullname',username='$username',user_email='$email',user_password='$hash_password',user_type='$user_access',activation='$activation' WHERE userid='$uid'";
						
					}
					$res=mysql_query($sql);
					if($res){
						$user_msg='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>User successfully updated!</div>';	

					}
				}
				
			}

}


if(isset($_POST['images_btn'])){// Process Images
			$validated=true;
			$image_title=clean_input($_POST['image_title']);
			$image_access=clean_input($_POST['image_access']);
			$image_show=clean_input($_POST['image_show']);
			$image_featured=clean_input($_POST['image_featured']);
			$image_desc=clean_input($_POST['image_desc']);
			$image_gallery='';
			$image_gallery=clean_input($_POST['image_gallery']);
			$image='';
			$image_order=clean_input($_POST['image_order']);
			@session_start();
			$added_by=$_SESSION['userid_admin'];
				$action='';
				$action=$_POST['action'];
			
			if(empty($image_title)){
				$validated=false;
				$image_title_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Enter Image(s) title!</div>';
			}
			if(empty($image_access)){
				$validated=false;
				$image_access_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select access level!</div>';
			}
			
			
			if(!empty($_FILES["image"]['name']) && $action=='edit'){
			$extension = substr($_FILES['image']['name'], strpos($_FILES['image']['name'],'.'), strlen($_FILES['image']['name'])-1); 
			$filetypes = array('.jpg', '.JPG', '.gif', '.GIF', '.png', '.PNG', '.jpeg', '.JPEG', '.jpe', '.bmp');
 				if(!in_array($extension, $filetypes)){
					$validate=false;
					$image_picture_error='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an image(s) file!</div>';
					}
				}
				
			if(!empty($_FILES["image"]['name']) && $action=='add-new'){
				for($j=0; $j < count($_FILES["image"]['name']); $j++) {
			$extension = substr($_FILES['image']['name']["$j"], strpos($_FILES['image']['name']["$j"],'.'), strlen($_FILES['image']['name']["$j"])-1); 
			$filetypes = array('.jpg', '.JPG', '.gif', '.GIF', '.png', '.PNG', '.jpeg', '.JPEG', '.jpe', '.bmp');
				}
 				if(!in_array($extension, $filetypes)){
					$validated=false;
					$image_picture_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an image(s) file!</div>';
					}
				}
			
			if(empty($_FILES["image"]['name'])&& $action!='edit'){
				$validated=false;
				$image_picture_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Choose Image(s)</div>';
			}
			
			if($validated==true){//if fields have been validated
					$image=$_FILES["image"]['name'];
					if(empty($image)){
						$image=$_POST['e_image'];
					}else{
						@unlink(GALLERY_FOLDER.$_POST['e_image']);
					}
					if(isset($_POST['remove_image'])){
						$image=NULL;
						@unlink(GALLERY_FOLDER.$_POST['e_image']);
					}
				
					if($action=='edit'){
						$uploadpath=GALLERY_FOLDER.$image;
						$image_id=$_POST['image_id'];
						if(move_uploaded_file($_FILES["image"]['tmp_name'],$uploadpath) || !empty($image)){
						$res=mysql_query("UPDATE cu_images SET image_title='$image_title', image_description='$image_desc', image_file='$image', added_by='$added_by',image_access='$image_access',image_feature='$image_featured',image_show='$image_show',image_order='$image_order',image_gallery='$image_gallery'  WHERE image_id='$image_id'") or die(mysql_error());
						if($res){
							$image_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Images successfully updated!</div>';
						}
					}
					}elseif($action=='add-new'){
						for($j=0; $j < count($_FILES["image"]['name']); $j++) { //loop the uploaded file array
						$uploadpath=GALLERY_FOLDER.$_FILES["image"]['name']["$j"];
							if(move_uploaded_file($_FILES["image"]['tmp_name']["$j"],$uploadpath)) { //upload the file
							$image=$_FILES["image"]['name']["$j"];
								$res=mysql_query("INSERT INTO cu_images(image_title,image_description,image_file,added_by,image_access,image_feature,image_show,image_order,image_gallery)VALUES('$image_title','$image_desc','$image','$added_by','$image_access','$image_featured','$image_show','$image_order','$image_gallery')") or die(mysql_error());
							}
						
						}//end of loop
						if($res){// process successful
							$image_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Image successfully added!</div>';				
								$image_title='';
							$image_access='';
							$image_show='';
							$image_featured='';
							$image_desc='';
							$image_gallery='';
							$image='';
							$image_order='';
							}
					}
					
					
					
			}///end of validated
}


if(isset($_POST['con_images_btn'])){// Process Con Images
			$validated=true;
			$image_title=clean_input($_POST['image_title']);
			$image_access=clean_input($_POST['image_access']);
			$image_show=clean_input($_POST['image_show']);
			$image_featured=clean_input($_POST['image_featured']);
			$image_desc=clean_input($_POST['image_desc']);
			$image_con=clean_input($_POST['image_con']);
			$image='';
			$image_order=clean_input($_POST['image_order']);
			$moduleinput=clean_input($_POST['module']);
			@session_start();
			$added_by=$_SESSION['userid_admin'];
				$action='';
				$action=$_POST['action'];
			
			if(empty($image_title)){
				$validated=false;
				$image_title_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Enter Image(s) title!</div>';
			}
			if(empty($image_access)){
				$validated=false;
				$image_access_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select access level!</div>';
			}
			if(empty($image_con)){
				$validated=false;
				$image_con_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select section!</div>';
			}
			
			
			if(!empty($_FILES["image"]['name']) && $action=='edit'){
			$extension = substr($_FILES['image']['name'], strpos($_FILES['image']['name'],'.'), strlen($_FILES['image']['name'])-1); 
			$filetypes = array('.jpg', '.JPG', '.gif', '.GIF', '.png', '.PNG', '.jpeg', '.JPEG', '.jpe', '.bmp');
 				if(!in_array($extension, $filetypes)){
					$validate=false;
					$image_picture_error='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an image(s) file!</div>';
					}
				}
				
			if(!empty($_FILES["image"]['name']) && $action=='add-new'){
				for($j=0; $j < count($_FILES["image"]['name']); $j++) {
			$extension = substr($_FILES['image']['name']["$j"], strpos($_FILES['image']['name']["$j"],'.'), strlen($_FILES['image']['name']["$j"])-1); 
			$filetypes = array('.jpg', '.JPG', '.gif', '.GIF', '.png', '.PNG', '.jpeg', '.JPEG', '.jpe', '.bmp');
				}
 				if(!in_array($extension, $filetypes)){
					$validated=false;
					$image_picture_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an image(s) file!</div>';
					}
				}
			
			if(empty($_FILES["image"]['name'])&& $action!='edit'){
				$validated=false;
				$image_picture_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Choose Image(s)</div>';
			}
			
			if($validated==true){//if fields have been validated
					$image=$_FILES["image"]['name'];
					if(empty($image)){
						$image=$_POST['e_sectionimage'];
					}else{
						@unlink(CON_IMAGES_FOLDER.$_POST['e_sectionimage']);
					}
					if(isset($_POST['remove_section_image'])){
						$image=NULL;	
						@unlink(CON_IMAGES_FOLDER.$_POST['e_sectionimage']);
					}
				
					if($action=='edit'){
						$uploadpath=CON_IMAGES_FOLDER.$image;
						$image_id=$_POST['image_id'];
						if(move_uploaded_file($_FILES["image"]['tmp_name'],$uploadpath) || !empty($_POST['e_sectionimage'])){
		
						$res=mysql_query("UPDATE cu_con_images SET image_title='$image_title', image_description='$image_desc', image_file='$image', added_by='$added_by',image_access='$image_access',image_feature='$image_featured',image_show='$image_show',image_order='$image_order',imageconid='$image_con', image_module='$moduleinput'  WHERE image_id='$image_id'") or die(mysql_error());
						if($res){
							$image_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Images successfully updated!</div>';
						}
					}
					}elseif($action=='add-new'){
						for($j=0; $j < count($_FILES["image"]['name']); $j++) { //loop the uploaded file array
						$uploadpath=CON_IMAGES_FOLDER.$_FILES["image"]['name']["$j"];
							if(move_uploaded_file($_FILES["image"]['tmp_name']["$j"],$uploadpath)) { //upload the file
							$image=$_FILES["image"]['name']["$j"];
								$res=mysql_query("INSERT INTO cu_con_images(image_title,image_description,image_file,added_by,image_access,image_feature,image_show,image_order,imageconid,image_module)VALUES('$image_title','$image_desc','$image','$added_by','$image_access','$image_featured','$image_show','$image_order','$image_con','$moduleinput')") or die(mysql_error());
							}
						
						}//end of loop
						if($res){// process successful
							$image_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Image successfully added!</div>';				
								$image_title='';
							$image_access='';
							$image_show='';
							$image_featured='';
							$image_desc='';
							$image_gallery='';
							$image='';
							$image_order='';
							}
					}
					
					
					
			}///end of validated
}



if(isset($_POST['gallery_btn'])){// Process Gallery
			$validated=true;
			$gallery_name=clean_input($_POST['gallery_name']);
			$gallery_access=clean_input($_POST['gallery_access']);
			$gallery_show=clean_input($_POST['gallery_show']);
			$gallery_featured=clean_input($_POST['gallery_featured']);
			$gallery_desc=clean_input($_POST['gallery_desc']);
			$gallery_picture='';
			$gallery_order=clean_input($_POST['gallery_order']);
			@session_start();
			$added_by=$_SESSION['userid_admin'];
			if(empty($gallery_name)){
				$validated=false;
				$gallery_title_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Enter gallery title!</div>';
			}
			if(empty($gallery_access)){
				$validated=false;
				$gallery_access_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select access level!</div>';
			}
			if(!empty($_FILES["gallery_picture"]['name'])){
			$extension = substr($_FILES['gallery_picture']['name'], strpos($_FILES['gallery_picture']['name'],'.'), strlen($_FILES['gallery_picture']['name'])-1); 
			$filetypes = array('.jpg', '.JPG', '.gif', '.GIF', '.png', '.PNG', '.jpeg', '.JPEG', '.jpe', '.bmp');
 				if(!in_array($extension, $filetypes)){
					$validated=false;
					$gallery_picture_error='<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an image file!</div>';
					}
				}
			
			
			if($validated==true){//if fields have been validated
					$gallery_picture=$_FILES["gallery_picture"]['name'];
					if(empty($gallery_picture)){
						$gallery_picture=$_POST['e_gallery_picture'];
					}else{
						@unlink(GALLERY_FOLDER.$_POST['e_gallery_picture']);
					}
					if(isset($_POST['remove_gallery'])){
						$gallery_picture=NULL;
						@unlink(GALLERY_FOLDER.$_POST['e_gallery_picture']);
					}
					$action='';
				$action=$_POST['action'];
					if($action=='edit'){
						$gallery_id=$_POST['gallery_id'];
						$res=mysql_query("UPDATE cu_gallery SET gallery_name='$gallery_name', gallery_description='$gallery_desc', gallery_image='$gallery_picture', added_by='$added_by',gallery_access='$gallery_access',gallery_feature='$gallery_featured',gallery_show='$gallery_show',gallery_order='$gallery_order'  WHERE gallery_id='$gallery_id'") or die(mysql_error());
					}elseif($action=='add-new'){
						$res=mysql_query("INSERT INTO cu_gallery(gallery_name,gallery_description,gallery_image,added_by,gallery_access,gallery_feature,gallery_show,gallery_order)VALUES('$gallery_name','$gallery_desc','$gallery_picture','$added_by','$gallery_access','$gallery_featured','$gallery_show','$gallery_order')") or die(mysql_error());
					}
					
					if($res){// process successful
								$uploadpath=GALLERY_FOLDER.$gallery_picture;
						 @move_uploaded_file($_FILES["gallery_picture"]['tmp_name'],$uploadpath);
						
						if($action=='add-new'){
							$gallery_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Gallery successfully added!</div>';							
							$gallery_name='';
							$gallery_access='';
							$gallery_show='';
							$gallery_featured='';
							$gallery_desc='';
							$gallery_picture='';
							$gallery_order='';
							
						}elseif($action=='edit'){
							$gallery_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Gallery successfully updated!</div>';
						}
					}
					
			}///end of validated
}




if(isset($_POST['slide_btn'])){// Process Slide show
			$validated=true;
			$slide_title=clean_input($_POST['slide_title']);
			$slide_link=$_POST['slide_link'];
			$slide_access=clean_input($_POST['slide_access']);
			$slide_show=clean_input($_POST['slide_show']);
			$slide_featured=clean_input($_POST['slide_featured']);
			$slidedesc=clean_input($_POST['slide_desc']);
			$slide_order='';
			$slide_picture='';
			$slide_order=clean_input($_POST['slide_order']);
			$action='';
				$action=$_POST['action'];
			@session_start();
			$added_by=$_SESSION['userid_admin'];
			if(empty($slide_title)){
				$validated=false;
				$slide_title_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Enter slide title!</div>';
			}
			if(empty($slide_access)){
				$validated=false;
				$slide_access_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select access level!</div>';
			}
			if(empty($_FILES["slide_picture"]['name']) && $action!='edit'){
				$validated=false;
				$slide_picture_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select picture for slide!</div>';

			}
			if(!empty($_FILES["slide_picture"]['name'])){
			$extension = substr($_FILES['slide_picture']['name'], strpos($_FILES['slide_picture']['name'],'.'), strlen($_FILES['slide_picture']['name'])-1); 
			$filetypes = array('.jpg', '.JPG', '.gif', '.GIF', '.png', '.PNG', '.jpeg', '.JPEG', '.jpe', '.bmp');
 				if(!in_array($extension, $filetypes)){
					$validated=false;
					$slide_picture_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an image file!</div>';
					}
				}
			
			
			if($validated==true){//if fields have been validated
					$slide_picture=$_FILES["slide_picture"]['name'];
					if(empty($slide_picture)){
						$slide_picture=$_POST['e_slide_picture'];
					}else{
						@unlink(SLIDES_FOLDER.$_POST['e_slide_picture']);
					}
					if(isset($_POST['remove_slide'])){
						$slide_picture=NULL;
						@unlink(SLIDES_FOLDER.$_POST['e_slide_picture']);
					}
				
					if($action=='edit'){
						$slide_id=$_POST['slide_id'];
						$res=mysql_query("UPDATE cu_slideshow SET slide_title='$slide_title', slide_link='$slide_link', slide_description='$slidedesc', slide_file='$slide_picture', slide_added_by='$added_by',slide_access='$slide_access',slide_feature='$slide_featured',slide_show='$slide_show',slide_order='$slide_order'  WHERE slide_id='$slide_id'") or die(mysql_error());
					}elseif($action=='add-new'){
						$res=mysql_query("INSERT INTO cu_slideshow(slide_title,slide_link,slide_description,slide_file,slide_added_by,slide_access,slide_feature,slide_show,slide_order)VALUES('$slide_title','$slide_link','$slidedesc','$slide_picture','$added_by','$slide_access','$slide_featured','$slide_show','$slide_order')") or die(mysql_error());
					}
					
					if($res){// process successful
								$uploadpath=SLIDES_FOLDER.$slide_picture;
						 @move_uploaded_file($_FILES["slide_picture"]['tmp_name'],$uploadpath);
						
						if($action=='add-new'){
							$slide_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Slide successfully added!</div>';
							$slide_title='';
							$slide_access='';
							$slide_show='';
							$slide_featured='';
							$slidedesc='';
							$slide_order='';
							$slide_picture='';
							
						}elseif($action=='edit'){
							$slide_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Slide successfully updated!</div>';
						}
					}
					
			}///end of validated
}

if(isset($_POST['section_btn'])){// Process Section
	$validated=true;
	$sectionname=clean_input($_POST['section_name']);
	$sectiontitle=clean_input($_POST['section_title']);
	$sectionshow=$_POST['section_show'];
	$main_nav=$_POST['main_nav'];
	$sectionaccess=$_POST['section_access'];
	$sectionalias=clean_input($_POST['section_alias']);
	$sectionuniqueid=clean_input($_POST['section_uniqueid']);
	$sectiondesc=$_POST['section_desc'];
	$section_picture='';
	$section_banner='';
	$section_order='';
	$section_order=$_POST['section_order'];
	$section_picture=$_FILES["section_picture"]['name'];
	if(empty($sectionname)){
		$validated=false;
		$sectionname_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Enter section name!</div>';
	}
	if(empty($sectionaccess)){
		$validated=false;
		$sectionaccess_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select access level!</div>';
	}
	if(!empty($sectionname) && empty($sectionalias)){
		$sectionalias=create_slug($sectionname);
	}
	if(create_slug($sectionname)!=$sectionalias){
		$sectionalias=create_slug($sectionname);
	}
	if(!empty($_FILES["section_picture"]['name'])&&($_FILES["section_picture"]['size']>2097152)){
			$validated=false;
			$error_on_page2='<div  class="t not-icon"></div>';
			$section_banner_error='<div class="help-inline alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Picture size must be 2 Megabyte or less!</div>';
		}
		if(!empty($_FILES["section_banner"]['name'])&&($_FILES["section_banner"]['size']>2097152)){
			$validated=false;
			$error_on_page2='<div class="not-icon"></div>';
			$section_picture_error='<div class="help-inline  alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Picture size must be 2 Megabyte or less!</div>';
		}
		if(!empty($_FILES["section_picture"]['name'])){
			$extension = substr($_FILES['section_picture']['name'], strpos($_FILES['section_picture']['name'],'.'), strlen($_FILES['section_picture']['name'])-1); 
			$filetypes = array('.jpg', '.JPG', '.gif', '.GIF', '.png', '.PNG', '.jpeg', '.JPEG', '.jpe', '.bmp');
 				if(!in_array($extension, $filetypes)){
					$validated=false;
					$error_on_page2='<div class="not-icon"></div>';
					$section_picture_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an image file!</div>';
					}
				}
				if(!empty($_FILES["section_banner"]['name'])){
			$extension = substr($_FILES['section_banner']['name'], strpos($_FILES['section_banner']['name'],'.'), strlen($_FILES['section_banner']['name'])-1); 
			$filetypes = array('.jpg', '.JPG', '.gif', '.GIF', '.png', '.PNG', '.jpeg', '.JPEG', '.jpe', '.bmp');
 				if(!in_array($extension, $filetypes)){
					$validated=false;
					$error_on_page2='<div class="not-icon"></div>';
					$section_banner_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an image file!</div>';
					}
				}
	if($validated==true){
		$section_picture=$_FILES["section_picture"]['name'];
		$section_banner=$_FILES["section_banner"]['name'];
		if(empty($section_picture)){
			$section_picture=$_POST['e_section_picture'];
		}else{
			@unlink(SECTION_IMAGES_FOLDER.$_POST['e_section_picture']);
		}
		if(empty($section_banner)){
			$section_banner=$_POST['e_section_banner'];
		}else{
			@unlink(SECTION_BANNERS_FOLDER.$_POST['e_section_banner']);
		}
		if(isset($_POST['remove_section_image'])){
			$section_picture=NULL;
			@unlink(SECTION_IMAGES_FOLDER.$_POST['e_section_picture']);
		}
		if(isset($_POST['remove_section_banner'])){
			$section_banner=NULL;
			@unlink(SECTION_BANNERS_FOLDER.$_POST['e_section_banner']);
		}
		$action='';
		$action=$_POST['action'];
		if($action=='edit'){
			$section_id=$_POST['section_id'];
			$res=mysql_query("UPDATE cu_sections SET title='$sectiontitle',name='$sectionname',alias='$sectionalias',section_show='$sectionshow',description='$sectiondesc',access='$sectionaccess',image='$section_picture',banner='$section_banner',ordering='$section_order', main_nav='$main_nav', uniqueid='$sectionuniqueid' WHERE id='$section_id'") or die(mysql_error());
		}elseif($action=='add-new'){
			$res=mysql_query("INSERT INTO cu_sections(title,name,alias,section_show,description,access,image,banner,ordering,main_nav,uniqueid)VALUES('$sectiontitle','$sectionname','$sectionalias','$sectionshow','$sectiondesc','$sectionaccess','$section_picture','$section_banner','$section_order','$main_nav','$sectionuniqueid')") or die(mysql_error());
		}
		
		
		if($res){
			$uploadpath=SECTION_IMAGES_FOLDER.$section_picture;
        	@move_uploaded_file($_FILES["section_picture"]['tmp_name'],$uploadpath);
			$uploadpath=SECTION_BANNERS_FOLDER.$section_banner;
        	@move_uploaded_file($_FILES["section_banner"]['tmp_name'],$uploadpath);
			
			if($action=='add-new'){
				$section_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Sections successfully added!</div>';
			}elseif($action=='edit'){
				$section_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Sections successfully updated!</div>';
			}
			
			$sectionname='';
			$sectiontitle='';
			$sectionshow='';
			$main_nav='';
			$sectionaccess='';
			$sectionalias='';
			$sectiondesc='';
			$section_picture='';
			$section_banner='';
		}
	}
}//End of add new section process


if(isset($_POST['add_new_category_btn'])){// Process Category Add New
	$validated=true;
	$categoryname=clean_input($_POST['category_name']);
	$categorytitle=clean_input($_POST['category_title']);
	$categoryshow=$_POST['category_show'];
	$categoryaccess=$_POST['category_access'];
	$categoryfeatured=$_POST['category_featured'];
	$section=$_POST['section'];
	$categorydesc=$_POST['category_desc'];
	$categoryalias=clean_input($_POST['category_alias']);
	$categoryuniqueid=clean_input($_POST['category_uniqueid']);

	$category_picture='';
	if(!empty($categoryname) && empty($sectionalias)){
		$categoryalias=create_slug($categoryname);
	}
	if(create_slug($categoryname)!=$categoryalias){
		$categoryalias=create_slug($categoryname);
	}
	if(empty($categoryname)){
		$validated=false;
		$categoryname_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Enter category name!</div>';
	}
	if(empty($section)){
		$validated=false;
		$section_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select Section!</div>';
	}
	if(empty($categoryaccess)){
		$validated=false;
		$categoryaccess_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select access level!</div>';
	}
		if(!empty($_FILES["category_picture"]['name'])&&($_FILES["category_picture"]['size']>2097152)){
			$validated=false;
			$error_on_page2='<div class="not-icon"></div>';
			$category_picture_error='<div class="help-inline alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Picture size must be 2 Megabyte or less!</div>';
		}
		if(!empty($_FILES["category_picture"]['name'])){
			$extension = substr($_FILES['category_picture']['name'], strpos($_FILES['category_picture']['name'],'.'), strlen($_FILES['category_picture']['name'])-1); 
			$filetypes = array('.jpg', '.JPG', '.gif', '.GIF', '.png', '.PNG', '.jpeg', '.JPEG', '.jpe', '.bmp');
 				if(!in_array($extension, $filetypes)){
					$validated=false;
					$error_on_page2='<div class="not-icon"></div>';
					$category_picture_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an image file!</div>';
					}
				}
				
	if($validated==true){
		$category_picture=$_FILES["category_picture"]['name'];
		if(empty($category_picture)){
			$category_picture=$_POST['e_category_picture'];
		}else{
			@unlink(CATEGORY_IMAGES_FOLDER.$_POST['e_category_picture']);
		}
		if(isset($_POST['remove_category_image'])){
			$category_picture=NULL;
			@unlink(CATEGORY_IMAGES_FOLDER.$_POST['e_category_picture']);
		}
		$action='';
		$action=$_POST['action'];
		if($action=='add-new'){
				$res=mysql_query("INSERT INTO cu_categories (title,name,section_id,category_show,description,feature,access,image,alias,uniqueid)VALUES('$categorytitle','$categoryname','$section','$categoryshow','$categorydesc','$categoryfeatured','$categoryaccess','$category_picture','$categoryalias','$categoryuniqueid')") or die(mysql_error());
			}elseif($action=='edit'){
				$category_id=$_POST['category_id'];
				$res=mysql_query("UPDATE cu_categories SET title='$categorytitle',name='$categoryname',section_id='$section',category_show='$categoryshow',description='$categorydesc',feature='$categoryfeatured',access='$categoryaccess' ,image='$category_picture', alias='$categoryalias', uniqueid='$categoryuniqueid' WHERE id='$category_id'")or die(mysql_error());
			}
		
		
		if($res){
			$uploadpath=CATEGORY_IMAGES_FOLDER.$category_picture;
        	@move_uploaded_file($_FILES["category_picture"]['tmp_name'],$uploadpath);
			if($action=='add-new'){
				$category_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Category successfully added!</div>';
			}elseif($action=='edit'){
				$category_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Category successfully updated!</div>';
			}
			
			$categoryname='';
			$categorytitle='';
			$categoryshow='';
			$categoryaccess='';
			$categoryfeatured='';
			$section='';
			$categorydesc='';
			$category_picture='';
			$categoryalias='';
		}
	}
}//End of adding new category 


if(isset($_POST['content_btn'])){// Process Content Add New
@session_start();
	$validated=true;
	$pubished_date=$_POST['pubished_date'];
	$content_source=clean_input($_POST['content_source']);
	$created=create_timestamp($pubished_date);
	$created_by=$_SESSION['userid_admin'];
	$content_section=$_POST['content_section'];
	$content_category=$_POST['content_category'];
	$content_access=$_POST['content_access'];
	$content_featured=$_POST['content_featured'];
	$content_title=clean_input($_POST['content_title']);
	$content_alias=clean_input($_POST['content_alias']);
	$content_publish=$_POST['content_publish'];
	$full_content=$_POST['editor1'];
	$content_pic_desc=clean_input($_POST['content_pic_desc']);
	$video_desc=clean_input($_POST['video_desc']);
	$audio_desc=clean_input($_POST['audio_desc']);
	$content_other_file_desc=clean_input($_POST['content_other_file_desc']);
	$metakey=clean_input($_POST['metakey']);
	$metadesc=clean_input($_POST['metadesc']);
	$metadata=clean_input($_POST['metadata']);
	$introtext=clean_input($_POST['introtext']);
	$excerpt=clean_input($_POST['excerpt']);
	$content_frontpage=$_POST['content_frontpage'];
	$content_picture='';
	$content_audio='';
	$content_video='';


		if(empty($content_title)){
		$validated=false;
		$content_title_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Enter article title!</div>';
	}
	if(empty($content_access)){
		$validated=false;
		$content_access_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Select access level!</div>';
	}
	if(!empty($content_title) && empty($content_alias)){
		$content_alias=create_slug($content_title);
	}
		if(!empty($_FILES["content_picture"]['name'])&&($_FILES["content_picture"]['size']>2097152)){
			$validated=false;
			$error_on_page2='<div class="not-icon"></div>';
			$content_picture_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Picture size must be 2 Megabyte or less!</div>';
		}
		if(!empty($_FILES["content_picture"]['name'])){
			$extension = substr($_FILES['content_picture']['name'], strpos($_FILES['content_picture']['name'],'.'), strlen($_FILES['content_picture']['name'])-1); 
			$filetypes = array('.jpg', '.JPG', '.gif', '.GIF', '.png', '.PNG', '.jpeg', '.JPEG', '.jpe', '.bmp');
 				if(!in_array($extension, $filetypes)){
					$validated=false;
					$error_on_page2='<div class="not-icon"></div>';
					$content_picture_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an image file!</div>';
					}
				}
		if(!empty($_FILES["content_audio"]['name'])){
			$extension = substr($_FILES['content_audio']['name'], strpos($_FILES['content_audio']['name'],'.'), strlen($_FILES['content_audio']['name'])-1); 
			$filetypes = array('.mp3', '.wmv', '.ogg', '.wav', '.mp4');
 				if(!in_array($extension, $filetypes)){
					$validated=false;
					$error_on_page2='<div class="not-icon"></div>';
					$content_audio_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose an audio file!</div>';
					}
				}
		
		if(!empty($_FILES["content_video"]['name'])){
			$extension = substr($_FILES['content_video']['name'], strpos($_FILES['content_video']['name'],'.'), strlen($_FILES['content_video']['name'])-1); 
			$filetypes = array('.wmv', '.avi', '.flv', '.mkv', '.mp4','.mpg','ogg');
 				if(!in_array($extension, $filetypes)){
					$validated=false;
					$error_on_page2='<div class="not-icon"></div>';
					$content_video_error='<div class="help-inline alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Wrong file type: Choose a video file!</div>';
					}
				}
				
	if($validated==true){
		$action='';
		$action=$_POST['action'];
		$content_picture=$_FILES["content_picture"]['name'];
		$content_audio=$_FILES["content_audio"]['name'];
		$content_video=$_FILES["content_video"]['name'];
		$content_other_file=$_FILES["content_other_file"]['name'];
		if(empty($content_picture)){
			$content_picture=$_POST['e_content_picture'];
		}else{
			@unlink(CONTENT_IMAGES_FOLDER.$_POST['e_content_picture']);
		}
		if(empty($content_audio)){
			$content_audio=$_POST['e_content_audio'];
		}else{
			@unlink(CONTENT_AUDIOS_FOLDER.$_POST['e_content_audio']);
		}
		if(empty($content_video)){
			$content_video=$_POST['e_content_video'];
		}else{
			@unlink(CONTENT_VIDEOS_FOLDER.$_POST['e_content_video']);
		}

		if(empty($content_other_file)){
			$content_other_file=$_POST['e_content_other_file'];
		}else{
			@unlink(CONTENT_OTHER_FILE_FOLDER.$_POST['e_content_other_file']);
		}
		
		if($action=='edit'){
			$content_id=$_POST['content_id'];
			$modified=date("Y-m-d H:i:s", time());
			$modified_by=$_SESSION['userid_admin'];
			if(isset($_POST['remove_content_image'])){
				$content_picture=NULL;
				@unlink(CONTENT_IMAGES_FOLDER.$_POST['e_content_picture']);
			}
			if(isset($_POST['remove_content_audio'])){
				$content_audio=NULL;
				@unlink(CONTENT_AUDIOS_FOLDER.$_POST['e_content_audio']);
			}
			if(isset($_POST['remove_content_video'])){
				$content_video=NULL;
				@unlink(CONTENT_VIDEOS_FOLDER.$_POST['e_content_video']);
			}
			if(isset($_POST['remove_content_other_file'])){
				$content_other_file=NULL;
				@unlink(CONTENT_OTHER_FILE_FOLDER.$_POST['e_content_other_file']);
			}
			$res=mysql_query("UPDATE cu_contents SET content_title='$content_title',content_alias='$content_alias',intro_text='$introtext',full_content='$full_content',excerpt='$excerpt',category_id='$content_category',section_id='$content_section',created='$created',created_by='$created_by',image='$content_picture',image_desc='$content_pic_desc',audio_file='$content_audio',audio_file_desc='$audio_desc',video_file='$content_video',video_file_desc='$video_desc',feature='$content_featured',metakey='$metakey',metadesc='$metadesc',metadata='$metadata',access='$content_access',published='$content_publish',modified='$modified',modified_by='$modified_by', other_file='$content_other_file', other_file_desc='$content_other_file_desc',content_source='$content_source' WHERE id='$content_id'") or die(mysql_error());
			
		}elseif($action=='add-new'){
			$res=mysql_query("INSERT INTO cu_contents(content_title,content_alias,intro_text,full_content,excerpt,category_id,section_id,created,created_by,image,image_desc,audio_file,audio_file_desc,video_file,video_file_desc,feature,metakey,metadesc,metadata,access,published,other_file,other_file_desc,content_source)VALUES('$content_title','$content_alias','$introtext','$full_content','$excerpt','$content_category','$content_section','$created','$created_by','$content_picture','$content_pic_desc','$content_audio','$audio_desc','$content_video','$video_desc','$content_featured','$metakey','$metadesc','$metadata','$content_access','$content_publish','$content_other_file','$content_other_file_desc','$content_source')") or die(mysql_error());
		}
		
		
		
		if($res){
			$content_type='content';
			if($action=='add-new'){
				$art_id=mysql_insert_id();
					if($content_frontpage=='1'){
					$fres=mysql_query("INSERT INTO cu_content_frontpage(content_id,content_type) VALUES('$art_id','$content_type')") or die(mysql_error());
					}elseif($content_frontpage=='0'){
						
					}
		}elseif($action=='edit'){
					$art_id=$content_id;
 					if($content_frontpage=='1'){
 					$chkfp=mysql_query("SELECT * FROM cu_content_frontpage WHERE content_id='$art_id'") or die(mysql_error());
 					$chkfp_count=mysql_num_rows($chkfp);
 					if($chkfp_count==0){
 						$fres=mysql_query("INSERT INTO cu_content_frontpage(content_id,content_type) VALUES('$art_id','$content_type')") or die(mysql_error());

 					}

					}elseif($content_frontpage=='0'){
						$fres=mysql_query("DELETE FROM cu_content_frontpage WHERE content_id='$art_id' ") or die(mysql_error());
					}
 		}
			
			
		if($action=='add-new'){
			$content_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Content successfully added!</div>';
		}elseif($action=='edit'){
			$content_add_success='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>Content successfully updated!</div>';
		}
			$uploadpath=CONTENT_IMAGES_FOLDER.$content_picture;
        	@move_uploaded_file($_FILES["content_picture"]['tmp_name'],$uploadpath);
			$uploadpath=CONTENT_AUDIOS_FOLDER.$content_audio;
        	@move_uploaded_file($_FILES["content_audio"]['tmp_name'],$uploadpath);
			$uploadpath=CONTENT_VIDEOS_FOLDER.$content_video;
        	@move_uploaded_file($_FILES["content_video"]['tmp_name'],$uploadpath);
        	$uploadpath=CONTENT_OTHER_FILE_FOLDER.$content_other_file;
        	@move_uploaded_file($_FILES["content_other_file"]['tmp_name'],$uploadpath);
			//Clear Content Fields
			$pubished_date='';
			$content_section='';
			$content_publish='';
			$content_category='';
			$content_access='';
			$content_featured='';
			$content_title='';
			$content_alias='';
			$full_content='';
			$content_pic_desc='';
			$audio_desc='';
			$video_desc='';
			$metakey='';
			$metadesc='';
			$metadata='';
			$introtext='';
			$excerpt='';
			$content_picture='';
			$content_audio='';
			$content_video='';
			$content_other_file_desc='';
			$content_other_file='';
			
		}
	}
}//End of adding new category 
?>