<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h2>Menu</h2>
 <ul>
            <?php 
            echo '<li ';
                if($curo_url->segment(1)==''){ echo 'class="active"';}
                  echo'><a href="'.BASE_URL.'">Home</a></li>';
                  
                  $tm_row=$curo->load_topmenu();
                   foreach ($tm_row as $topmenu) {

                     echo '<li ';
                        if($curo_url->segment(1)==$topmenu['alias']){ echo 'class="active"';}
                      echo'><a href="';
      
                      
                       echo BASE_URL.$topmenu['alias'];
                      
                      echo'">'.$topmenu['name'].'</a></li>';
                   }

    ?>
            	
            </ul>
 <h2>Sub Menu</h2>
 <ul class="submenu">
        <?php
                            $sid=$curo->section_info(20,'id');
                              $sm_row=$curo->sub_menu($sid);
                              $count=count($sm_row);
                              if($count>0){
                               foreach ($sm_row as $sub_menu) {
                                 echo '<li ';
                                    if($curo_url->segment(2)==$sub_menu['alias']){ echo 'class="active"';}
                                  echo'><a href="'.BASE_URL.$curo_url->segment(1).'/'.$sub_menu['alias'].'">'.$sub_menu['name'].'</a></li>';
                               }
                           }
                        ?>
      </ul>
      
 <h2>Section Title</h2>
 <?php  echo $curo->section_info(20,'title');?>
  <h2>Section Description</h2>
 <?php  echo $curo->section_info(20,'description');?>
 
 <h2>Gallery List</h2>
 <?php
			$glist=$curo->gallery_list();
		?>
        <ul class="thumbnails">
        <?php 
			$countg=count($glist);
			if($countg>0){
			foreach($glist as $gallerylist){
				$gimage=BASE_URL.'/image.php?h=120&w=150&f='.C_GALLERY_FOLDER.$gallerylist['gallery_image'];
				$link=BASE_URL.$curo_url->segment(1).'/'.$gallerylist['gallery_id'].'-'.$curo->create_slug($gallerylist['gallery_name']);
		?>
				  <li class="span2">
					<div class="thumbnail">
					  <a href="<?php echo $link;?>" title="<?php echo $gallerylist['gallery_name'];?>"><img src="<?php echo $gimage;?>" width="150" height="120" alt=""></a>
					</div>
                    <p style="text-align:center; font-weight:bold"><?php echo $gallerylist['gallery_name'];?></p>
				  </li>
                  <?php }}?>
                 
				</ul>
</body>
</html>