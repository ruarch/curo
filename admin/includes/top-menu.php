
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo BASE_URL;?>" target="_new"><?php echo SITE_NAME;?></a>
          <?php if(isloggedin()){ echo '<p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">'.$_SESSION['username_admin'].'</a>  | <a href="?logout">Logout</a>
            </p>';?>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="dropdown <?php if(@$page=='contents'){ echo 'active';}?>">
                <a href="contents.php" class="dropdown-toggle" data-toggle="dropdown">Content <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li <?php if(@$page=='contents'){ echo 'class="active"';}?>><a href="contents.php">Content List</a></li>
                  <li <?php if(@$page=='content-images'){ echo 'class="active"';}?>><a href="content-images.php">Images</a></li>
                </ul>
              </li>
                <li class="dropdown <?php if(@$page=='sections'){ echo 'active';}?>">
                <a href="sections.php" class="dropdown-toggle" data-toggle="dropdown">Sections <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li <?php if(@$page=='sections'){ echo 'class="active"';}?>><a href="sections.php">Sections List</a></li>
                  <li <?php if(@$page=='section-images'){ echo 'class="active"';}?>><a href="section-images.php">Images</a></li>
                </ul>
              </li>
                <li class="dropdown <?php if(@$page=='sections'){ echo 'active';}?>">
                <a href="categories.php" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li <?php if(@$page=='categories'){ echo 'class="active"';}?>><a href="categories.php">Categories List</a></li>
                  <li <?php if(@$page=='category-images'){ echo 'class="active"';}?>><a href="category-images.php">Images</a></li>
                </ul>
                
               </li>
               <li <?php if(@$page=='slideshow'){ echo 'class="active"';}?>><a href="slide-shows.php">Slide Show</a></li>
               <li <?php if(@$page=='gallery' || @$page=='images'){ echo 'class="active"';}?>><a href="gallery.php">Gallery</a></li>
               <li <?php if(@$page=='events'){ echo 'class="active"';}?>><a href="events.php">Events</a></li>
               <li <?php if(@$page=='newsletter'){ echo 'class="active"';}?>><a href="newsletter.php">Newsletter</a></li>
               <li class="dropdown <?php if(@$page=='users'){ echo 'active';}?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li <?php if(@$page=='users'){ echo 'class="active"';}?>><a href="users.php">Users</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
<?php 
if(isset($_GET['logout'])){
	logout();
}
?>