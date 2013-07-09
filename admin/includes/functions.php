<?php
ob_start();
include('connect-dbase.php');
//Summary
function num_contents(){
	$res=mysql_query("SELECT * FROM cu_contents") or die(mysql_error());
	return $row=mysql_num_rows($res);
}

function num_section(){
	$res=mysql_query("SELECT * FROM cu_sections") or die(mysql_error());
	return $row=mysql_num_rows($res);
}
function num_main_menu_section(){
	$res=mysql_query("SELECT * FROM cu_sections WHERE main_nav='1'") or die(mysql_error());
	return $row=mysql_num_rows($res);
}
function num_categories(){
	$res=mysql_query("SELECT * FROM cu_categories") or die(mysql_error());
	return $row=mysql_num_rows($res);
}
function num_slideshows(){
	$res=mysql_query("SELECT * FROM cu_slideshow") or die(mysql_error());
	return $row=mysql_num_rows($res);
}
function num_slideshows_showing(){
	$res=mysql_query("SELECT * FROM cu_slideshow WHERE slide_show='1'") or die(mysql_error());
	return $row=mysql_num_rows($res);
}

//End of summary
function section_info($sectionid){//Get section information in array
	$res=mysql_query("SELECT * FROM cu_sections WHERE id='$sectionid'") or die(mysql_error());
	return $row=mysql_fetch_array($res);
}
function category_info($categoryid){//Get category information in array
	$res=mysql_query("SELECT * FROM cu_categories WHERE id='$categoryid'") or die(mysql_error());
	return $row=mysql_fetch_array($res);
}
function content_info($contentid){//Get category information in array
	$res=mysql_query("SELECT * FROM cu_contents WHERE id='$contentid'") or die(mysql_error());
	return $row=mysql_fetch_array($res);
}

function access_info($access_id){//get access information in array
	$res=mysql_query("SELECT * FROM cu_access WHERE access='$access_id'") or die(mysql_error());
	return $row=mysql_fetch_array($res);
}

function gallery_info($galleryid){//Get category information in array
	$res=mysql_query("SELECT * FROM cu_gallery WHERE gallery_id='$galleryid'") or die(mysql_error());
	return $row=mysql_fetch_array($res);
}
function newsletter_user_info($nluserid){//Get newsletter information in array
	$res=mysql_query("SELECT * FROM cu_newsletter_user WHERE id='$nluserid'") or die(mysql_error());
	return $row=mysql_fetch_array($res);
}

function list_section_ordering($value=''){//get the number sections for ordering list
	$res=mysql_query("SELECT * FROM cu_sections") or die(mysql_error());
	$sec_num=mysql_num_rows($res);
	$i=1;
	echo'<option value="">Select</option>';
	if($sec_num!=0){
	while($sec_num>=$i){
	echo'<option value="'.$i.'"';
			if($value == $i){
			echo' selected="selected"';
		}
	echo'>'.$i.'</option>';
	$i++;
	}
	$ex=$i;
	echo'<option value="'.$ex.'"';
			if($value == $ex){
			echo' selected="selected"';
		}
	echo'>'.$ex.'</option>';
	}else{
		echo'<option value="1">1</option>';
	}
}

function list_frontpage_ordering($value='',$section){//get the number sections for ordering list
	$res=mysql_query("SELECT * FROM cu_content_frontpage WHERE content_type='$section'") or die(mysql_error());
	$sec_num=mysql_num_rows($res);
	$i=1;
	echo'<option value="">Select</option>';
	if($sec_num!=0){
	while($sec_num>=$i){
	echo'<option value="'.$i.'"';
			if($value == $i){
			echo' selected="selected"';
		}
	echo'>'.$i.'</option>';
	$i++;
	}
	$ex=$i;
	echo'<option value="'.$ex.'"';
			if($value == $ex){
			echo' selected="selected"';
		}
	echo'>'.$ex.'</option>';
	}else{
		echo'<option value="1">1</option>';
	}
}

function list_slide_ordering($value=''){//get the number slide for ordering list
	$res=mysql_query("SELECT * FROM cu_slideshow") or die(mysql_error());
	$sec_num=mysql_num_rows($res);
	$i=1;
	echo'<option value="">Select</option>';
	if($sec_num!=0){
	while($sec_num>=$i){
	echo'<option value="'.$i.'"';
			if($value == $i){
			echo' selected="selected"';
		}
	echo'>'.$i.'</option>';
	$i++;
	}
	$ex=$i;
	echo'<option value="'.$ex.'"';
			if($value == $ex){
			echo' selected="selected"';
		}
	echo'>'.$ex.'</option>';
	}else{
		echo'<option value="1">1</option>';
	}
}
function list_gallery_ordering($value=''){//get the number gallery for ordering list
	$res=mysql_query("SELECT * FROM cu_gallery") or die(mysql_error());
	$sec_num=mysql_num_rows($res);
	$i=1;
	echo'<option value="">Select</option>';
	if($sec_num!=0){
	while($sec_num>=$i){
	echo'<option value="'.$i.'"';
			if($value == $i){
			echo' selected="selected"';
		}
	echo'>'.$i.'</option>';
	$i++;
	}
	$ex=$i;
	echo'<option value="'.$ex.'"';
			if($value == $ex){
			echo' selected="selected"';
		}
	echo'>'.$ex.'</option>';
	}else{
		echo'<option value="1">1</option>';
	}
}

function chk_image_gallery($imag_id){//check if image is in a gallery
$res=mysql_query("SELECT * FROM cu_images WHERE image_id='$imag_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
return $row['image_gallery'];
}

function chk_con_image($imag_id,$imagemodule){//check if con image is in a section
$res=mysql_query("SELECT * FROM cu_con_images WHERE image_id='$imag_id' AND image_module='$imagemodule'") or die(mysql_error());
$row=mysql_fetch_array($res);
return $row['imageconid'];
}

function list_image_ordering($value=''){//get the number gallery for ordering list
	
	if($value!=''){
		$img_gal=chk_image_gallery($value);
		$res=mysql_query("SELECT * FROM cu_images WHERE image_gallery='$img_gal'") or die(mysql_error());
	}else{
	$res=mysql_query("SELECT * FROM cu_images") or die(mysql_error());
	}
	$sec_num=mysql_num_rows($res);
	$i=1;
	
	echo'<option value="">Select</option>';
	if($sec_num!=0){
	while($sec_num>=$i){
	echo'<option value="'.$i.'"';
			if($value == $i){
			echo' selected="selected"';
		}
	echo'>'.$i.'</option>';
	$i++;
	}
	$ex=$i;
	echo'<option value="'.$ex.'"';
			if($value == $ex){
			echo' selected="selected"';
		}
	echo'>'.$ex.'</option>';
	}else{
		echo'<option value="1">1</option>';
	}
}
function list_con_image_ordering($value='',$imagemodule=''){//get the number of conimage for ordering list
	
	
	$res=mysql_query("SELECT * FROM cu_con_images") or die(mysql_error());
	
	$sec_num=mysql_num_rows($res);
	$i=1;
	
	echo'<option value="">Select</option>';
	if($sec_num!=0){
	while($sec_num>=$i){
	echo'<option value="'.$i.'"';
			if($value == $i){
			echo' selected="selected"';
		}
	echo'>'.$i.'</option>';
	$i++;
	}
	$ex=$i;
	echo'<option value="'.$ex.'"';
			if($value == $ex){
			echo' selected="selected"';
		}
	echo'>'.$ex.'</option>';
	}else{
		echo'<option value="1">1</option>';
	}
}

function load_image_by_gallery($url,$value=''){
	$res=mysql_query("SELECT * FROM cu_gallery WHERE gallery_id!='' OR gallery_id!='0' OR gallery_id!=NULL  GROUP BY gallery_id ") or die(mysql_error());
	while ($row=mysql_fetch_array($res)) {
		$gallery=gallery_info($row['gallery_id']);
		echo'<li ';
			if($value==$gallery['gallery_id']){echo 'class="active"';}
		echo'><a href="'.$url.'?gid='.$gallery['gallery_id'].'"><i class="icon-chevron-right"></i>'.$gallery['gallery_name'].'</a></li>';
	}
}

function load_content_by_section($url,$value=''){
	$res=mysql_query("SELECT * FROM cu_contents WHERE section_id!='' OR section_id!='0' OR section_id!=NULL  GROUP BY section_id ") or die(mysql_error());
	while ($row=mysql_fetch_array($res)) {
		$section=section_info($row['section_id']);
		echo'<li ';
			if($value==$section['id']){echo 'class="active"';}
		echo'><a href="'.$url.'?secid='.$section['id'].'"><i class="icon-chevron-right"></i>'.$section['name'].'</a></li>';
	}
}
function load_category_by_section($url,$value=''){
	$res=mysql_query("SELECT * FROM cu_categories WHERE section_id!='' OR section_id!='0' OR section_id!=NULL  GROUP BY section_id ") or die(mysql_error());
	while ($row=mysql_fetch_array($res)) {
		$section=section_info($row['section_id']);
		$category=category_info($row['id']);
		echo'<li ';
		if($value==$section['id']){echo 'class="active"';}
		echo'><a href="'.$url.'?secid='.$section['id'].'"><i class="icon-chevron-right"></i>'.$section['name'].'</a></li>';
	}
}
function load_content_by_category($url,$value=''){
	$res=mysql_query("SELECT * FROM cu_contents WHERE category_id!='' OR category_id!='0' OR category_id!=NULL  GROUP BY category_id ") or die(mysql_error());
	while ($row=mysql_fetch_array($res)) {
		$category=category_info($row['category_id']);
		echo'<li ';
		if($value==$category['id']){echo 'class="active"';}
		echo'><a href="'.$url.'?catid='.$category['id'].'"><i class="icon-chevron-right"></i>'.$category['name'].'</a></li>';
	}
}

function get_list_category($page='',$q=''){//get category list
include('pagination.php');
$pagination= new Pagination;
$size=8;//number of records per page

if(!empty($q)){
	if(isset($_GET['secid'])){
		$secid=$_GET['secid'];
			$url="categories.php?secid=$secid&q=$q&p=";//Url for pagination
	}else{
		$url="categories.php?q=$q&p=";//Url for pagination

	}
}else{
	if(isset($_GET['secid'])){
		$secid=$_GET['secid'];
		$url="categories.php?secid=$secid&p=";//Url for pagination
	}else{
		$url="categories.php?p=";//Url for pagination
	}
}

$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT * FROM cu_categories  ";

if(isset($_GET['secid'])){
			$sql.="WHERE section_id='$secid' ";
	}

if(!empty($q)){
	$q=clean_input($q);
$sql.="WHERE title LIKE '%$q%' OR name LIKE '%$q%'";


}
$sql.="ORDER BY id DESC";
//Pagination Res
$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="20">ID</th>
                <th>Name</th>
				<th>Section</th>
                <th width="100">Show</th>
                <th width="100">Feature</th>
                <th width="100">Access</th>
				<th width="100"></th>
              </tr>
              </thead>
              <tbody>';
			  while($row=mysql_fetch_array($res)){
				  $access=access_info($row['access']);
				  $sec=section_info($row['section_id']);
				echo '<tr>
				<td><input type="checkbox" name="categoryid[]" value="'.$row['id'].'" /></td>
					<td data-title="ID">'.$row['id'].'</td>
					<td data-title="Name">'.$row['name'].'</td>
					<td data-title="Section">'.$sec['name'].'</td>
					<td align="center" data-title="Show">';
					
					if($row['category_show']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['category_show']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
				echo'</td>
				<td align="center" data-title="Feature">';
					
					if($row['feature']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['feature']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
				echo'</td><td data-title="Access"><span class="label">'.$access['access_name'].'</span></td>
				 <td><a href="?action=edit&id='.$row['id'].'" class="btn btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="?action=delete&id='.$row['id'].'" class="btn btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white"></i></a></td>
				</tr>';  
			  }
			   echo '</tbody>
			</table>';
			echo $pagination->create_links();
}

function get_list_section($page='',$q=''){//get section list
include('pagination.php');
$pagination= new Pagination;
$size=8;//number of records per page
if(!empty($q)){
	$url="sections.php?q=$q&p=";//Url for pagination
}else{
	$url="sections.php?p=";//Url for pagination
}
$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT * FROM cu_sections  ";
if(!empty($q)){
	$q=clean_input($q);
$sql.="WHERE title LIKE '%$q%' OR name LIKE '%$q%'";


}
$sql.="ORDER BY id DESC";
//Pagination Res
$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="20">ID</th>
                <th>Name</th>
                <th width="100">Show</th>
                <th width="100">Ordering</th>
                <th width="100">Access</th>
				<th width="100"></th>
              </tr>
              </thead>
              <tbody>';
			  while($row=mysql_fetch_array($res)){
				  $access=access_info($row['access']);
				echo '<tr><td><input type="checkbox" name="sectionid[]" value="'.$row['id'].'" /></td>
					<td data-title="ID">'.$row['id'].'</td>	
					<td data-title="Name">'.$row['name'].'</td>	
					<td align="center" data-title="Show">';
					
					if($row['section_show']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['section_show']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
				echo'</td>
				<td align="center" data-title="Ordering"><span class="badge">'.$row['ordering'].'</span></td>
				<td data-title="Access"><span class="label">'.$access['access_name'].'</span></td>
				 <td><a href="?action=edit&id='.$row['id'].'" class="btn btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="?action=delete&id='.$row['id'].'" class="btn btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white"></i></a></td>
				 </tr>
				'; 
				 
			  }
			  echo '</tbody>
			</table>';
	echo $pagination->create_links();
}

function get_list_content($page='',$q=''){//get content list
include('pagination.php');
$pagination= new Pagination;
$size=10;//number of records per page
if(!empty($q)){
	if(isset($_GET['secid'])){
		$secid=$_GET['secid'];
			$url="contents.php?secid=$secid&q=$q&p=";//Url for pagination
	}elseif(isset($_GET['catid'])){
		$catid=$_GET['catid'];
			$url="contents.php?catid=$catid&q=$q&p=";//Url for pagination
	}else{
		$url="contents.php?q=$q&p=";//Url for pagination

	}
}else{
	if(isset($_GET['secid'])){
		$secid=$_GET['secid'];
		$url="contents.php?secid=$secid&p=";//Url for pagination
	}elseif(isset($_GET['catid'])){
		$catid=$_GET['catid'];
		$url="contents.php?catid=$catid&p=";//Url for pagination
	}else{
		$url="contents.php?p=";//Url for pagination
	}
}

$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT * FROM cu_contents  ";

if(isset($_GET['secid'])){
			$sql.="WHERE section_id='$secid' ";
	}elseif(isset($_GET['catid'])){
			$sql.="WHERE category_id='$catid'  ";

}
if(!empty($q)){
	$q=clean_input($q);

$sql.=" AND content_title LIKE '%$q%' OR content_alias LIKE '%$q%'";
}
$sql.=" ORDER BY id DESC";
//Pagination Res

$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="20">ID</th>
                <th>Title</th>
                <th>Section</th>
				<th>Category</th>
                <th width="110">Published Date</th>
				<th width="90">Published</th>
                <th width="140"></th>
              </tr>
              </thead>
              <tbody>';

	while($row=mysql_fetch_array($res)){
		$cat=category_info($row['category_id']);
		$sec=section_info($row['section_id']);
		$access=access_info($row['access']);
		echo' <tr>
              <td><input type="checkbox" name="contentid[]" value="'.$row['id'].'" /></td>
              <td data-title="ID">'.$row['id'].'</td>
              <td data-title="Title">';
			  
			  echo'<span class="label pull-right">'.$access['access_name'].'</span>';
			  echo $row['content_title'].'</td>
              <td data-title="Section">'.$sec['name'].'</td>
			  <td data-title="Category">'.$cat['name'].'</td>
              <td data-title="Published Date">'.date("d-m-Y",strtotime($row['created'])).'</td>
			  <td data-title="Published"><span class="label ';if($row['published']=="published"){ echo'label-success';}elseif($row['published']=="published"){echo'';}elseif($row['published']=="draft"){echo 'label-info';} echo'">'.ucwords($row['published']).'</span></td>
              <td ><a href="?action=edit&id='.$row['id'].'" class="btn btn-small btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="content-images.php?action=add-new&conid='.$row['id'].'" class="btn btn-small btn-inverse" title="Add images" > <i class="icon-plus icon-white"></i> <i class="icon-picture icon-white"></i> </a> <a href="?action=delete&id='.$row['id'].'" class="btn btn-small btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white "></i></a></td>
			  
              </tr>';
	}
	echo '</tbody>
			</table>';
	echo $pagination->create_links();
}
function get_frontpage_list_content($page='',$q=''){//get content list
include('pagination.php');
$pagination= new Pagination;
$size=10;//number of records per page
if(!empty($q)){
	
		$url="contents.php?q=$q&p=";//Url for pagination

}else{

		$url="contents.php?p=";//Url for pagination
	
}

$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT cu_contents.id,cu_content_frontpage.content_id,cu_contents.section_id AS secid, cu_contents.category_id AS catid,cu_contents.access AS con_access,
	  cu_contents.content_title AS contenttitle, cu_contents.created AS con_created, cu_contents.published AS con_published
	 FROM cu_content_frontpage LEFT JOIN cu_contents ON cu_content_frontpage.content_id =cu_contents.id   ";

if(!empty($q)){
	$q=clean_input($q);

$sql.=" AND content_title LIKE '%$q%' OR content_alias LIKE '%$q%'";
}
$sql.=" ORDER BY id DESC";
//Pagination Res

$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="20">ID</th>
                <th>Title</th>
                <th>Section</th>
				<th>Category</th>
                <th width="110">Published Date</th>
				<th width="90">Published</th>
                <th width="140"></th>
              </tr>
              </thead>
              <tbody>';

	while($row=mysql_fetch_array($res)){
		$cat=category_info($row['catid']);
		$sec=section_info($row['secid']);
		$access=access_info($row['con_access']);
		echo' <tr>
              <td><input type="checkbox" name="contentid[]" value="'.$row['id'].'" /></td>
              <td data-title="ID">'.$row['id'].'</td>
              <td data-title="Title">';
			  
			  echo'<span class="label pull-right">'.$access['access_name'].'</span>';
			  echo $row['contenttitle'].'</td>
              <td data-title="Section">'.$sec['name'].'</td>
			  <td data-title="Category">'.$cat['name'].'</td>
              <td data-title="Published Date">'.date("d-m-Y",strtotime($row['con_created'])).'</td>
			  <td data-title="Published"><span class="label ';if($row['con_published']=="published"){ echo'label-success';}elseif($row['con_published']=="published"){echo'';}elseif($row['published']=="draft"){echo 'label-info';} echo'">'.ucwords($row['con_published']).'</span></td>
              <td ><a href="?action=edit&id='.$row['id'].'" class="btn btn-small btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="content-images.php?action=add-new&conid='.$row['id'].'" class="btn btn-small btn-inverse" title="Add images" > <i class="icon-plus icon-white"></i> <i class="icon-picture icon-white"></i> </a> <a href="?action=delete&id='.$row['id'].'" class="btn btn-small btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white "></i></a></td>
			  
              </tr>';
	}
	echo '</tbody>
			</table>';
	echo $pagination->create_links();
}
function get_list_events($page='',$q=''){//get events list
include('pagination.php');
$pagination= new Pagination;
$size=10;//number of records per page
if(!empty($q)){
	$url="events.php?q=$q&p=";//Url for pagination
}else{
	$url="events.php?p=";//Url for pagination
}
$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT * FROM cu_events  ";
if(!empty($q)){
	$q=clean_input($q);
$sql.="WHERE event_title LIKE '%$q%' OR event_details LIKE '%$q%'";
}
$sql.="ORDER BY event_id DESC";
//Pagination Res
$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="35">ID</th>
				<th>Title</th>
                <th>Date</th>
                <th>Venue</th>
				<th width="30">Show</th>
				<th width="40">Featured</th>
				<th width="120"></th>
              </tr>
              </thead>
              <tbody>';

	while($row=mysql_fetch_array($res)){
		$access=access_info($row['event_access']);
		echo' <tr>
              <td><input type="checkbox" name="eventid[]" value="'.$row['event_id'].'" /></td>
              <td data-title="ID">'.$row['event_id'].'</td>';
			  echo'<td data-title="Title">'.$row['event_title'].'<span class="label pull-right">'.$access['access_name'].'</span></td>';
			  	echo'
				<td data-title="Date">'.date("M jS, Y",strtotime($row['event_date'])).'</td>
				<td data-title="Venue">'.$row['event_venue'].'</td>
				<td align="center" data-title="Show">';
					
					if($row['event_show']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['event_show']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
				echo'</td>';
				echo'<td align="center" data-title="Featured">';
					
					if($row['event_feature']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['event_feature']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
              echo'<td><a href="?action=edit&id='.$row['event_id'].'" class="btn btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="?action=delete&id='.$row['event_id'].'" class="btn btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white"></i></a></td>
			  
              </tr>';
	}
	echo '</tbody>
			</table>';
	echo $pagination->create_links();
}

function get_list_users($page='',$q=''){//get users list
include('pagination.php');
$pagination= new Pagination;
$size=10;//number of records per page
if(!empty($q)){
	$url="users.php?q=$q&p=";//Url for pagination
}else{
	$url="users.php?p=";//Url for pagination
}
$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT * FROM cu_users  ";
if(!empty($q)){
	$q=clean_input($q);
$sql.="WHERE username LIKE '%$q%' OR user_email LIKE '%$q%'";
}
$sql.="ORDER BY userid DESC";
//Pagination Res
$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="35">ID</th>
				<th>Full Name</th>
				<th>Username</th>
				<th>Email</th>
                <th>Created Date</th>
				<th width="40">Activated</th>
				<th width="120"></th>
              </tr>
              </thead>
              <tbody>';

	while($row=mysql_fetch_array($res)){
		$access=access_info($row['user_type']);
		echo' <tr>
              <td><input type="checkbox" name="userid[]" value="'.$row['userid'].'" /></td>
              <td data-title="ID">'.$row['userid'].'</td>';
			  echo'<td data-title="Full Name">'.$row['user_fullname'].'<span class="label pull-right">'.$access['access_name'].'</span></td>
			  		<td data-title="Username">'.$row['username'].'</td>
					<td data-title="Created Date"><a href="mailto:'.$row['user_email'].'">'.$row['user_email'].'</a></td>
			  		';
			  	echo'
				<td>'.date("M jS, Y",strtotime($row['register_date'])).'</td>
				<td align="center" data-title="Activated">';
					
					if($row['activation']=='active'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['activation']=='inactive'){
						echo '<span class="badge badge-important">No</span>';
					}
				echo'</td>';
				
              echo'<td><a href="?action=edit&id='.$row['userid'].'" class="btn btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="?action=delete&id='.$row['userid'].'" class="btn btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white"></i></a></td>
			  
              </tr>';
	}
	echo '</tbody>
			</table>';
	echo $pagination->create_links();
}

function get_list_newsletter_users($page='',$q=''){//get newsletter subscribers list
include('pagination.php');
$pagination= new Pagination;
$size=10;//number of records per page
if(!empty($q)){
	$url="newsletter.php?q=$q&p=";//Url for pagination
}else{
	$url="newsletter.php?p=";//Url for pagination
}
$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT * FROM cu_newsletter_users  ";
if(!empty($q)){
	$q=clean_input($q);
$sql.="WHERE email LIKE '%$q%'";
}
$sql.="ORDER BY id DESC";
//Pagination Res
$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="35">ID</th>
				<th>Email</th>
				<th>Subscription Date</th>
				<th width="40">Status</th>
				<th width="120"></th>
              </tr>
              </thead>
              <tbody>';

	while($row=mysql_fetch_array($res)){
		echo' <tr>
              <td ><input type="checkbox" name="subid[]" value="'.$row['id'].'" /></td>
              <td data-title="ID">'.$row['id'].'</td>';
			  echo'<td data-title="Email">'.$row['email'].'</span></td>
					
				<td data-title="Subscription Date">'.date("M jS, Y",strtotime($row['sub_date'])).'</td>
				<td align="center" data-title="Status">';
					
					if($row['status']=='1'){
						echo '<span class="badge badge-success">Activated</span>';
					}elseif($row['status']=='0'){
						echo '<span class="badge badge-important">Deactivated</span>';
					}
				echo'</td>';
				
              echo'<td><a href="?action=edit-subscriber&id='.$row['id'].'" class="btn btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="?action=delete-sub&id='.$row['id'].'" class="btn btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white"></i></a></td>
			  
              </tr>';
	}
	echo '</tbody>
			</table>';
	echo $pagination->create_links();
}

function get_list_newsletters($page='',$q=''){//get newsletter subscribers list
include('pagination.php');
$pagination= new Pagination;
$size=10;//number of records per page
if(!empty($q)){
	$url="newsletter.php?q=$q&p=";//Url for pagination
}else{
	$url="newsletter.php?p=";//Url for pagination
}
$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT * FROM cu_newsletters  ";
if(!empty($q)){
	$q=clean_input($q);
$sql.="WHERE title LIKE '%$q%' OR content LIKE '%$q%'";
}
$sql.="ORDER BY id DESC";
//Pagination Res
$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="35">ID</th>
				<th>title</th>
				<th width="200">Created</th>
				<th width="70">Sent</th>
				<th width="120"></th>
              </tr>
              </thead>
              <tbody>';

	while($row=mysql_fetch_array($res)){
		echo' <tr>
              <td><input type="checkbox" name="nslid[]" value="'.$row['id'].'" /></td>
              <td data-title="ID">'.$row['id'].'</td>
              <td data-title="Title">'.$row['title'].'</td>';
			  echo'
					
				<td data-title="Created">'.date("M jS, Y",strtotime($row['created'])).'</td>
				<td align="center" data-title="Sent">';
					
					if($row['sent']=='1'){
						echo '<span class="badge badge-success">Sent</span>';
					}elseif($row['sent']=='0'){
						echo '<span class="badge badge-important">Not sent</span>';
					}
				echo'</td>';
				
              echo'<td><a href="?action=edit-newsletter&id='.$row['id'].'" class="btn btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="?action=view-newsletter&subaction=delete-nsl&id='.$row['id'].'" class="btn btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white"></i></a></td>
			  
              </tr>';
	}
	echo '</tbody>
			</table>';
	echo $pagination->create_links();
}

function get_list_gallery($page='',$q=''){//get gallery list
include('pagination.php');
$pagination= new Pagination;
$size=5;//number of records per page
if(!empty($q)){
	$url="gallery.php?q=$q&p=";//Url for pagination
}else{
	$url="gallery.php?p=";//Url for pagination
}

$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT * FROM cu_gallery  ";
if(!empty($q)){
	$q=clean_input($q);
$sql.="WHERE gallery_name LIKE '%$q%' OR gallery_description LIKE '%$q%'";
}
$sql.="ORDER BY gallery_id DESC";
//Pagination Res
$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="35">ID</th>
				<th>Image</th>
                <th>Name</th>
                <th>Show</th>
				<th>Order</th>
				<th width="90">Featured</th>
				<th></th>
              </tr>
              </thead>
              <tbody>';

	while($row=mysql_fetch_array($res)){
		$access=access_info($row['gallery_access']);
		echo' <tr>
              <td><input type="checkbox" name="galleryid[]" value="'.$row['gallery_id'].'" /></td>
              <td data-title="ID">'.$row['gallery_id'].'</td>
              <td data-title="Image">
			  <ul class="thumbnails">
				  <li class="span2">
					<div class="thumbnail">
					  <a href="'.GALLERY_FOLDER.$row['gallery_image'].'" title="'.$row['gallery_image'].'" rel="colorbox"><img src="'.image_pro(GALLERY_FOLDER.$row['gallery_image'],140).'" alt=""></a>
					</div>
				  </li>
				</ul>
			  </td>';
			  echo'<td data-title="Name">'.$row['gallery_name'].'<span class="label pull-right">'.$access['access_name'].'</span></td>';
			  	echo'<td align="center" data-title="Show">';
					
					if($row['gallery_show']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['gallery_show']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
				echo'</td>
				<td align="center" data-title="Order"><span class="badge">'.$row['gallery_order'].'</span></td>';
				
				echo'<td align="center" data-title="Featured">';
					
					if($row['gallery_feature']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['gallery_feature']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
              echo'<td><a href="images.php?gid='.$row['gallery_id'].'" class="btn btn-inverse" title="View Gallery Images" ><i class="icon-picture icon-white"></i></a> <a href="?action=edit&id='.$row['gallery_id'].'" class="btn btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="?action=delete&id='.$row['gallery_id'].'" class="btn btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white"></i></a></td>
			  
              </tr>';
	}
	echo '</tbody>
			</table>';
	echo $pagination->create_links();
}

function get_list_images($page='',$q='',$gid=''){//get images list
include('pagination.php');
$pagination= new Pagination;
$conditions='';
$size=5;//number of records per page
if(!empty($q)){
	if(!empty($gid)){
		$url="images.php?q=$q&gid=$gid&p=";//Url for pagination	
	}else{
		$url="images.php?q=$q&p=";//Url for pagination
	}
}else{
	if(!empty($gid)){
		$url="images.php?gid=$gid&p=";//Url for pagination
	}else{
		$url="images.php?p=";//Url for pagination
	}
}
$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT * FROM cu_images  ";

if(!empty($q)){
	if(!empty($gid)){
	$conditions="image_gallery='$gid' AND";
}
	$q=clean_input($q);
$sql.="WHERE $conditions image_title LIKE '%$q%' OR $conditions image_description LIKE '%$q%'";
}
if(!empty($gid)&& empty($q)){
	$conditions="WHERE image_gallery='$gid'";
}
$sql.="$conditions ORDER BY image_id DESC";
//Pagination Res
$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="35">ID</th>
				<th>Image</th>
                <th>Name</th>
				<th>Gallery</th>
                <th>Show</th>
				<th>Order</th>
				<th width="90">Featured</th>
				<th></th>
              </tr>
              </thead>
              <tbody>';

	while($row=mysql_fetch_array($res)){
		$access=access_info($row['image_access']);
		$gallery=gallery_info($row['image_gallery']);
		echo' <tr>
              <td><input type="checkbox" name="imageid[]" value="'.$row['image_id'].'" /></td>
              <td data-title="ID">'.$row['image_id'].'</td>
              <td data-title="Image">
			  <ul class="thumbnails">
				  <li class="span2">
					<div class="thumbnail">
					 <a href="'.GALLERY_FOLDER.$row['image_file'].'" title="'.$row['image_title'].'" rel="colorbox"><img src="'.image_pro(GALLERY_FOLDER.$row['image_file'],140).'" alt=""></a>
					</div>
				  </li>
				</ul>
			  </td>';
			  echo'<td data-title="Gallery">'.$row['image_title'].'<span class="label pull-right">'.$access['access_name'].'</span></td>
			  <td align="center"><a href="gallery.php?q='.$gallery['gallery_name'].'" title="View Gallery" ><i class="icon-picture"></i> '.$gallery['gallery_name'].'</a></td>';
			  
			  	echo'<td align="center" data-title="Show">';
					
					if($row['image_show']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['image_show']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
				echo'</td>
				<td align="center" data-title="Order"><span class="badge">'.$row['image_order'].'</span></td>';
				
				echo'<td align="center" data-title="Featured">';
					
					if($row['image_feature']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['image_feature']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
              echo'<td><a href="?action=edit&id='.$row['image_id'].'" class="btn btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="?action=delete&id='.$row['image_id'].'" class="btn btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white"></i></a></td>
			  
              </tr>';
	}
	echo '</tbody>
			</table>';
	echo $pagination->create_links();
}


function get_list_con_images($page='',$q='',$conid='',$module=''){//get images list
include('pagination.php');
$pagination= new Pagination;
$conditions='';
$size=1;//number of records per page
if(!empty($q)){
	if(!empty($conid)){
		$url="section-images.php?q=$q&conid=$secid&p=";//Url for pagination	
	}else{
		$url="section-images.php?q=$q&p=";//Url for pagination
	}
}else{
	if(!empty($conid)){
		$url="section-images.php?gid=$conid&p=";//Url for pagination
	}else{
		$url="section-images.php?p=";//Url for pagination
	}
}
$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT * FROM cu_con_images WHERE image_module='$module' ";

if(!empty($q)){
	if(!empty($gid)){
	$conditions="imageconid='$conid' AND";
}
	$q=clean_input($q);
$sql.="AND $conditions image_title LIKE '%$q%' OR $conditions image_description LIKE '%$q%'";
}
if(!empty($conid)&& empty($q)){
	$conditions="AND imageconid='$conid'";
}
$sql.="$conditions ORDER BY image_id DESC";
//Pagination Res
$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="35">ID</th>
				<th>Image</th>
                <th>Name</th>';
				if($module=='section'){
					echo '<th>Section</th>';
				}elseif($module=='category'){
					echo '<th>Category</th>';
				}
				
                echo'<th>Show</th>
				<th>Order</th>
				<th width="90">Featured</th>
				<th></th>
              </tr>
              </thead>
              <tbody>';

	while($row=mysql_fetch_array($res)){
		$access=access_info($row['image_access']);
		$con='';
		if($module=='section'){
			$con=section_info($row['imageconid']);
		}elseif ($module=='category') {
			$con=category_info($row['imageconid']);
		}	
		
		echo' <tr>
              <td><input type="checkbox" name="imageid[]" value="'.$row['image_id'].'" /></td>
              <td data-title="ID">'.$row['image_id'].'</td>
              <td data-title="Image">
			  <ul class="thumbnails">
				  <li class="span2">
					<div class="thumbnail">';
					if(empty($row['image_file'])){
					 echo'<a href="'.CON_IMAGES_FOLDER.'http://placehold.it/350x150'.'" title="'.$row['image_title'].'" rel="colorbox"><img src="http://placehold.it/140&text=No+Image" alt=""></a>';

					}else{
						echo' <a href="'.CON_IMAGES_FOLDER.$row['image_file'].'" title="'.$row['image_title'].'" rel="colorbox"><img src="'.image_pro(CON_IMAGES_FOLDER.$row['image_file'],140).'" alt=""></a>';

					}
					echo'</div>
				  </li>
				</ul>
			  </td>';
			  echo'<td data-title="Gallery">'.$row['image_title'].'<span class="label pull-right">'.$access['access_name'].'</span></td>';
			  if($module=='section'){
			  	echo '<td align="center"><a href="sections.php?q='.$con['name'].'" title="View Section" ><i class="icon-picture"></i> '.$con['name'].'</a></td>';
			  }elseif ($module=='category') {
			  	echo '<td align="center"><a href="categories.php?q='.$con['name'].'" title="View Section" ><i class="icon-picture"></i> '.$con['name'].'</a></td>';
			  }
			  	echo'<td align="center" data-title="Show">';
					
					if($row['image_show']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['image_show']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
				echo'</td>
				<td align="center" data-title="Order"><span class="badge">'.$row['image_order'].'</span></td>';
				
				echo'<td align="center" data-title="Featured">';
					
					if($row['image_feature']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['image_feature']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
              echo'<td><a href="?action=edit&id='.$row['image_id'].'" class="btn btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="?action=delete&id='.$row['image_id'].'" class="btn btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white"></i></a></td>
			  
              </tr>';
	}
	echo '</tbody>
			</table>';
	echo $pagination->create_links();
}

function get_list_slides($page='',$q=''){//get slide list
include('pagination.php');
$pagination= new Pagination;
$size=5;//number of records per page
if(!empty($q)){
	$url="slide-shows.php?q=$q&p=";//Url for pagination
}else{
	$url="slide-shows.php?p=";//Url for pagination
}
$q=str_replace(" ","%",$q);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setLink($url);
$sql="SELECT * FROM cu_slideshow  ";
if(!empty($q)){
	$q=clean_input($q);
$sql.="WHERE slide_title LIKE '%$q%' OR slide_description LIKE '%$q%'";
}
$sql.="ORDER BY slide_id DESC";
//Pagination Res
$resnum=mysql_query($sql) or die(mysql_error());
$total_records=mysql_num_rows($resnum);//total number of records
$pagination->setTotalRecords($total_records);
$getsql=$pagination->getLimitSql($sql);
$res=mysql_query($sql.' '.$getsql) or die(mysql_error());
echo'<table class="table table-hover" id="no-more-tables">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" onclick="checkall()" /></th>
                <th width="35">ID</th>
				<th>Slide</th>
                <th>Title</th>
                <th>Show</th>
				<th>Order</th>
				<th width="90">Featured</th>
				<th></th>
              </tr>
              </thead>
              <tbody>';

	while($row=mysql_fetch_array($res)){
		$access=access_info($row['slide_access']);
		echo' <tr>
              <td><input type="checkbox" name="slideid[]" value="'.$row['slide_id'].'" /></td>
              <td data-title="ID">'.$row['slide_id'].'</td>
              <td data-title="Slide">
			  <ul class="thumbnails">
				  <li class="span4">
					<div class="thumbnail">
					   <a href="'.SLIDES_FOLDER.$row['slide_file'].'" title="'.$row['slide_title'].'" rel="colorbox"><img src="'.image_pro(SLIDES_FOLDER.$row['slide_file'],300).'" alt=""></a>
					  <p>'.$row['slide_file'].'</p>
					</div>
				  </li>
				</ul>
			  </td>';
			  echo'<td data-title="Title">'.$row['slide_title'].'<span class="label pull-right">'.$access['access_name'].'</span></td>';
			  	echo'<td align="center" data-title="Show">';
					
					if($row['slide_show']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['slide_show']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
				echo'</td>
				<td align="center" data-title="Order"><span class="badge">'.$row['slide_order'].'</span></td>';
				
				echo'<td align="center" data-title="Featured">';
					
					if($row['slide_feature']=='1'){
						echo '<span class="badge badge-success">Yes</span>';
					}elseif($row['slide_feature']=='0'){
						echo '<span class="badge badge-important">No</span>';
					}
              echo'<td><a href="?action=edit&id='.$row['slide_id'].'" class="btn btn-info" title="Edit" ><i class="icon-edit icon-white"></i></a> <a href="?action=delete&id='.$row['slide_id'].'" class="btn btn-danger" title="Delete" onclick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-trash icon-white"></i></a></td>
			  
              </tr>';
	}
	echo '</tbody>
			</table>';
	echo $pagination->create_links();
}


function section_category_image_thumbnail($section_id){//Get category image thumbnail 
$res=mysql_query("SELECT * FROM cu_categories WHERE id='$section_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['image'])){
echo'<ul class="thumbnails">
  <li class="span3">
    <div class="thumbnail">
      <img src="'.image_pro(CATEGORY_IMAGES_FOLDER.$row['image'],220).'" alt="">
      <p>'.$row['image'].'</p>
    </div>
  </li>
</ul><label class="checkbox"><input type="checkbox" name="remove_category_image"> Remove Image</label>';
}
}

function section_banner_thumbnail($section_id=''){//Get sections image thumbnail 
$res=mysql_query("SELECT * FROM cu_sections WHERE id='$section_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['banner'])){
echo'<ul class="thumbnails">
  <li class="span3">
    <div class="thumbnail">
      <img src="'.image_pro(SECTION_BANNERS_FOLDER.$row['banner'],220).'" alt="">
      <p>'.$row['banner'].'</p>
    </div>
  </li>
</ul><label class="checkbox"><input type="checkbox" name="remove_section_banner"> Remove Banner</label>';
}
}

function slide_thumbnail($slide_id=''){//Get slide image thumbnail 
$res=mysql_query("SELECT * FROM cu_slideshow WHERE slide_id='$slide_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['slide_file'])){
echo'<ul class="thumbnails">
  <li class="span4">
    <div class="thumbnail">
      <img src="'.image_pro(SLIDES_FOLDER.$row['slide_file'],300).'" alt="">
      <p>'.$row['slide_file'].'</p>
    </div>
  </li>
</ul><label class="checkbox"><input type="checkbox" name="remove_slide"> Remove Banner</label>';
}
}

function gallery_thumbnail($gallery_id=''){//Get gallery image thumbnail 
$res=mysql_query("SELECT * FROM cu_gallery WHERE gallery_id='$gallery_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['gallery_image'])){
echo'<ul class="thumbnails">
  <li class="span4">
    <div class="thumbnail">
      <img src="'.image_pro(GALLERY_FOLDER.$row['gallery_image'],300).'" alt="">
      <p>'.$row['gallery_image'].'</p>
    </div>
  </li>
</ul><label class="checkbox"><input type="checkbox" name="remove_gallery"> Remove Image</label>';
}
}

function event_thumbnail($event_id=''){//Get Event image thumbnail 
$res=mysql_query("SELECT * FROM cu_events WHERE event_id='$event_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['event_image'])){
echo'<ul class="thumbnails">
  <li class="span4">
    <div class="thumbnail">
      <img src="'.image_pro(EVENTS_FOLDER.$row['event_image'],300).'" alt="">
      <p>'.$row['event_image'].'</p>
    </div>
  </li>
</ul><label class="checkbox"><input type="checkbox" name="remove_event_image"> Remove Image</label>';
}
}


function image_thumbnail($image_id=''){//Get image thumbnail 
$res=mysql_query("SELECT * FROM cu_images WHERE image_id='$image_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['image_file'])){
echo'<ul class="thumbnails">
  <li class="span4">
    <div class="thumbnail">
      <img src="'.image_pro(GALLERY_FOLDER.$row['image_file'],300).'" alt="">
      <p>'.$row['image_file'].'</p>
    </div>
  </li>
</ul><label class="checkbox"><input type="checkbox" name="remove_image"> Remove Image</label>';
}
}

function con_section_image_thumbnail($image_id=''){//Get section image thumbnail 
$res=mysql_query("SELECT * FROM cu_con_images WHERE image_id='$image_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['image_file'])){
echo'<ul class="thumbnails">
  <li class="span4">
    <div class="thumbnail">
      <img src="'.image_pro(CON_IMAGES_FOLDER.$row['image_file'],300).'" alt="">
      <p>'.$row['image_file'].'</p>
    </div>
  </li>
</ul><label class="checkbox"><input type="checkbox" name="remove_section_image"> Remove Image</label>';
}
}


function section_image_thumbnail($section_id=''){//Get sections image thumbnail 
$res=mysql_query("SELECT * FROM cu_sections WHERE id='$section_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['image'])){
echo'<ul class="thumbnails">
  <li class="span3">
    <div class="thumbnail">
      <img src="'.image_pro(SECTION_IMAGES_FOLDER.$row['image'],220).'" alt="">
      <p>'.$row['image'].'</p>
    </div>
  </li>
</ul><label class="checkbox"><input type="checkbox" name="remove_section_image"> Remove Image</label>';
}
}

function content_image_thumbnail($content_id=''){//Get content image thumbnail 
$res=mysql_query("SELECT * FROM cu_contents WHERE id='$content_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['image'])){
echo'<ul class="thumbnails">
  <li class="span3">
    <div class="thumbnail">
      <img src="'.image_pro(CONTENT_IMAGES_FOLDER.$row['image'],220).'" alt="">
      <p>'.$row['image'].'</p>
    </div>
  </li>
</ul><label class="checkbox"><input type="checkbox" name="remove_content_image"> Remove Image</label>';
}
}

function content_audio_link($content_id=''){//Get content audio link 
$res=mysql_query("SELECT * FROM cu_contents WHERE id='$content_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['audio_file'])){
echo '<a href="'.CONTENT_AUDIOS_FOLDER.$row['audio_file'].'">'.$row['audio_file'].'</a><label class="checkbox"><input type="checkbox" name="remove_content_audio"> Remove Audio</label>';
}
}


function content_video_link($content_id=''){//Get content video link 
$res=mysql_query("SELECT * FROM cu_contents WHERE id='$content_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['video_file'])){
echo '<a href="'.CONTENT_VIDEOS_FOLDER.$row['video_file'].'">'.$row['video_file'].'</a><label class="checkbox"><input type="checkbox" name="remove_content_video"> Remove Video</label>';
}
}

function content_otherfile_link($content_id=''){//Get content other file link 
$res=mysql_query("SELECT * FROM cu_contents WHERE id='$content_id'") or die(mysql_error());
$row=mysql_fetch_array($res);
if(!empty($row['other_file'])){
echo '<a href="'.CONTENT_OTHER_FILE_FOLDER.$row['other_file'].'">'.$row['other_file'].'</a><label class="checkbox"><input type="checkbox" name="remove_content_other_file"> Remove File</label>';
}
}

function load_access_level($value=''){//load the list of access levels available
$sql="SELECT * FROM cu_access ORDER BY access DESC";
	$res=mysql_query($sql) or die(mysql_error());
	echo '<option value="">Select</option>';
	while($row=mysql_fetch_array($res)){
		echo '<option value="'.$row['access'].'"';
		if($value == $row['access']){
			echo' selected="selected"';
		}
		 echo '>'.$row['access_name'].'</option>';
	}
}

function load_frontpage($value=''){//load the list of access levels available
$sql="SELECT * FROM cu_content_frontpage WHERE content_id='$value'";
	$res=mysql_query($sql) or die(mysql_error());
	$count=mysql_num_rows($res);
		if($count>0){
			echo'<option value="1" selected="selected">Yes</option>';
			echo'<option value="0">No</option>';
		}else{
			echo'<option value="1">Yes</option>';
			echo'<option value="0" selected="selected">No</option>';
		}
}

function load_gallery($value=''){//load the list options of gallery available
$sql="SELECT * FROM cu_gallery";
	$res=mysql_query($sql) or die(mysql_error());
	echo '<option value="">Select</option>';
	while($row=mysql_fetch_array($res)){
		echo '<option value="'.$row['gallery_id'].'"';
		if($value == $row['gallery_id']){
			echo' selected="selected"';
		}
		 echo '>'.$row['gallery_name'].'</option>';
	}
}


function load_section($value=''){//load the list options of sections  available
$sql="SELECT * FROM cu_sections";
	$res=mysql_query($sql) or die(mysql_error());
	echo '<option value="">Select</option>';
	while($row=mysql_fetch_array($res)){
		echo '<option value="'.$row['id'].'"';
		if($value == $row['id']){
			echo' selected="selected"';
		}
		echo'>'.$row['name'].'</option>';
	}
}

function load_categories($value){//load the list options of categories available
$sql="SELECT * FROM cu_categories";
	$res=mysql_query($sql) or die(mysql_error());
	echo '<option value="">Select</option>';
	while($row=mysql_fetch_array($res)){
		echo '<option value="'.$row['id'].'"';
		if($value == $row['id']){
			echo' selected="selected"';
		}
		echo'>'.$row['name'].'</option>';
	}
}

function load_contents($value){//load the list options of categories available
$sql="SELECT * FROM cu_contents";
	$res=mysql_query($sql) or die(mysql_error());
	echo '<option value="">Select</option>';
	while($row=mysql_fetch_array($res)){
		echo '<option value="'.$row['id'].'"';
		if($value == $row['id']){
			echo' selected="selected"';
		}
		echo'>'.$row['name'].'</option>';
	}
}

function isloggedin(){
	@session_start();
	if(isset( $_SESSION['userid_admin'])){
		return true;
	}else{
		return false;
	}
}
function logout(){//Logout of admin 
		session_destroy();
		header("Location:.");
}


function create_timestamp($time){//creates string to time in a timestamp format
$timestamp=date("Y-m-d H:i:s", strtotime($time));
return $timestamp;
}
function escape($str)
        {
                $search=array("\\","\0","\n","\r","\x1a","'",'"');
                $replace=array("\\\\","\\0","\\n","\\r","\Z","\'",'\"');
				$str=stripslashes(trim($str));
                return htmlspecialchars(str_replace($search,$replace,$str),ENT_QUOTES);
        }
function clean_input($input){//clean users information before use
	$input=mysql_real_escape_string(strip_tags($input));
	return $input;
}
function create_slug($string){//replaces spaces between words with hyphens (Slugs)
	$string=str_replace('&', 'and', $string);
   $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
   return $slug;
}

function admin_login($post){//admin login
if(isset($post['login'])){
		 $validate=true;
		 if(empty($post['username']) || empty($post['password'])){
			 $validate=false;
			  return  $login_error= '<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>Hmmm! Enter <strong>username</strong> and <strong>password</strong> and try submitting again.</div>';
			   
		 }
		 
		 if($validate==true){
			 $pwd=md5($post['password']);
			 
			 $username=clean_input($post['username']);
			 $login_res=mysql_query("SELECT * FROM cu_users WHERE username='$username' AND user_password='$pwd' AND activation='active'") or die(mysql_error());
			 $count=mysql_num_rows($login_res);
			 $row=mysql_fetch_array($login_res);
			 if($count>0){
				 @session_start();
				 $_SESSION['userid_admin']=$row['userid'];
				 $_SESSION['username_admin']=$row['username'];
				 $_SESSION['user_type_admin']=$row['user_type'];
				$_SESSION['login_success_admin']='<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">×</a>You successfully logged in!</div>';
				header("Location:.");
			 }else{
				  return  $login_error= '<div class="alert alert-notice"><a class="close" data-dismiss="alert" href="#">×</a><strong>Wrong</strong> username or password</div>';
			 }
			 
		 }
	 }
}
function image_pro($imagefile,$width){//process image for display
		$rh=img_ratio_height($imagefile,$width);
		return 'includes/image.php?w='.$width.'&h='.$rh.'&f=../'.$imagefile;
	}
	
 function img_ratio_height($image_file,$width){//get image ratio height
		$info = getimagesize($image_file);
			/* Calculate aspect ratio by dividing height by width */
			$aspectRatio = $info[1] / $info[0];
			return $newHeight = (int)($aspectRatio * $width);
	}


function today_date(){
	return date("d-m-Y",time());
	
}

function chk_username($username,$userid=''){//check username
if(!empty($userid)){
$res=mysql_query("SELECT * FROM cu_users WHERE username='$username' AND userid='$userid'") or die(mysql_error());	
}else{
$res=mysql_query("SELECT * FROM cu_users WHERE username='$username'") or die(mysql_error());
}
$row=mysql_fetch_array($res);
if(!empty($row['userid'])){
	return true;
}else{
	return false;
}

}
function chk_email($email,$userid=''){//check user email
if(!empty($userid)){
$res=mysql_query("SELECT * FROM cu_users WHERE user_email='$email' AND userid='$userid'") or die(mysql_error());
}else{
	$res=mysql_query("SELECT * FROM cu_users WHERE user_email='$email'") or die(mysql_error());
}
$row=mysql_fetch_array($res);
if(!empty($row['userid'])){
	return true;
}else{
	return false;
}

}
ob_flush();
?>