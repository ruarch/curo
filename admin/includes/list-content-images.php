<div class="row">
  <?php include('right-menu.php');?>
 
  <div class="span9">
  <?php echo  @$del_images_msg;?>
    <section id="articles">
      <div class="page-header">
        <h4 style="margin:0px">Content Images</h4>
      </div>
      
      <div class="row">
     <form class="form-search pull-right" method="post"  action="">
     <input type="hidden" name="page" value="<?php if(isset($_GET['p'])){echo $_GET['p'];}?>" />
      <input type="hidden" name="search_q" value="<?php if(isset($_GET['q'])){echo $_GET['q'];}?>" />
  <div class="input-append">
    <input type="text" class="span2 search-query" name="q">
    <button type="submit" class="btn" name="images_search_btn">Search</button>
  </div>
</form>
<br class="hidden-desktop" />
<br class="hidden-desktop" />
   <form method="post" name="frmaction">
      <div class="span4">
       <div class="btn-group">
          <button type="submit"  name="delete_con_images" value="Delete" class="btn"><i class="icon-trash"></i>Delete</button>
        <a href="content-images.php" class="btn"><i class="icon-align-justify"></i> <strong>List All</strong></a>
        </div>
      </div>
      	<div class="span9">
        	
             <?php $pagination='';$q='';$conid=''; if(isset($_GET['conid'])){$gid=$_GET['conid'];}if(isset($_GET['p'])){$pagination=$_GET['p'];} if(isset($_GET['q'])){$q=$_GET['q'];};get_list_con_images($pagination,$q,$conid,$module);?>
              
            
        </div>
      </div>
    </section>
    </form>
  </div>
</div>
