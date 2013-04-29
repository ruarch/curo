<?php if($page=='contents'){?>     
      <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Contents</li>
              <!--<li class="active"><a href="#">Link</a></li>-->
             <li><a href="contents.php"><i class="icon-chevron-right"></i> Contents</a>
                <ul>
                  <li><a href="contents.php?action=add-new">Add New</a></li>
                </ul>
             </li>
              <li class="divider"></li>
                  <li class="nav-header">Listing By Section</li>
                  <?php load_content_by_section('contents.php',@$_GET['secid']);?>
                  <li class="divider"></li>
                  <li class="nav-header">Listing By category</li>
                  <?php load_content_by_category('contents.php',@$_GET['catid']);?>
                  
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
<?php }?>

<?php if($page=='sections' || $page=='section-images'){?>     
      <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sections</li>
              <!--<li class="active"><a href="#">Link</a></li>-->
             <li <?php if(@$page=='sections'){ echo 'class="active"';}?>><a href="sections.php"><i class="icon-chevron-right"></i> Sections</a>
                <ul>
                    <li><a href="sections.php?action=add-new">Add New</a></li>
                </ul>
             </li>
             
             <li class="divider"></li>
                  <li class="nav-header">Section Images</li>
                  <li <?php if(@$page=='section-images'){ echo 'class="active"';}?>><a href="section-images.php"><i class="icon-chevron-right"></i> View Images</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
<?php }?>

<?php if($page=='categories' || $page=='category-images'){?>     
      <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Categories</li>
              <!--<li class="active"><a href="#">Link</a></li>-->
             <li <?php if(@$page=='categories'){ echo 'class="active"';}?>><a href="categories.php"><i class="icon-chevron-right"></i>View Categories</a></li>
             <li><a href="categories.php?action=add-new"><i class="icon-chevron-right"></i> Add New</a></li>
              <li class="divider"></li>
                  <li class="nav-header">Listing By Section</li>
                  <?php load_category_by_section('categories.php',@$_GET['secid']);?>
                   <li class="divider"></li>
                  <li class="nav-header">Category Images</li>
                  <li <?php if(@$page=='category-images'){ echo 'class="active"';}?>><a href="category-images.php"><i class="icon-chevron-right"></i> View Images</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
<?php }?>
<?php if($page=='slideshow'){?>     
      <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Slide Show</li>
               
              <li><a href="slide-shows.php?action=add-new"><i class="icon-chevron-right"></i> Add New</a></li>

              <!--<li class="active"><a href="#">Link</a></li>-->
             
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
<?php }?>

<?php if($page=='gallery' || $page=='images'){?>     
      <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Gallery</li>
              <!--<li class="active"><a href="#">Link</a></li>-->
             <li><a href="gallery.php?action=add-new"><i class="icon-chevron-right"></i> Add New</a></li>
             <li class="nav-header">Images</li>
              <li><a href="images.php"><i class="icon-chevron-right"></i>View List</a></li>
              <li><a href="images.php?action=add-new"><i class="icon-chevron-right"></i> Add New</a></li>
              <li class="divider"></li>
                  <li class="nav-header">Listing By Gallery</li>
                  <?php load_image_by_gallery('images.php',@$_GET['gid']);?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
<?php }?>

<?php if($page=='events'){?>     
      <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Events</li>
              <!--<li class="active"><a href="#">Link</a></li>-->
             <li><a href="events.php?action=add-new"><i class="icon-chevron-right"></i> Add New</a></li>
              <li><a href="events.php"><i class="icon-chevron-right"></i> View List</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
<?php }?>

<?php if($page=='users'){?>     
      <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Users</li>
              <!--<li class="active"><a href="#">Link</a></li>-->
             <li><a href="users.php?action=add-new"><i class="icon-chevron-right"></i> Add New</a></li>
              <li><a href="users.php"><i class="icon-chevron-right"></i> Veiw List</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
<?php }?>

<?php if($page=='newsletter'){?>     
      <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
               <li class="nav-header">Newsletter</li>
              <!--<li class="active"><a href="#">Link</a></li>-->
             <li><a href="newsletter.php?action=add-newsletter"><i class="icon-chevron-right"></i> Add Newsletter</a></li>
             <li><a href="newsletter.php?action=view-newsletter"><i class="icon-chevron-right"></i> View Newsletters</a></li>
              <li class="nav-header">Subscribers</li>
              <!--<li class="active"><a href="#">Link</a></li>-->
             <li><a href="newsletter.php?action=add-subscriber"><i class="icon-chevron-right"></i> Add Subscribers</a></li>
            
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
<?php }?>