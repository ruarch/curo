<div class="row">
  <?php include('right-menu.php');?>
 
  <div class="span9">
  <?php echo  @$del_event_msg;?>
    <section id="articles">
      <div class="page-header">
        <h4 style="margin:0px">Events</h4>
      </div>
      
      <div class="row">
     <form class="form-search pull-right" method="post"  action="">
     <input type="hidden" name="page" value="<?php if(isset($_GET['p'])){echo $_GET['p'];}?>" />
      <input type="hidden" name="search_q" value="<?php if(isset($_GET['q'])){echo $_GET['q'];}?>" />
  <div class="input-append">
    <input type="text" class="span2 search-query" name="q">
    <button type="submit" class="btn" name="events_search_btn">Search</button>
  </div>
</form>
<br class="hidden-desktop" />
<br class="hidden-desktop" />
   <form method="post" name="frmaction">
      <div class="span4">
       <div class="btn-group">
        <a href="?action=add-new" class="btn"><i class="icon-pencil"></i> <strong>Add New</strong></a>
          <button type="submit"  name="delete_event" value="Delete" class="btn"><i class="icon-trash"></i>Delete</button>
        <a href="events.php" class="btn"><i class="icon-align-justify"></i> <strong>List All</strong></a>
        </div>
      </div>
        <div class="span9">
          
             <?php $pagination='';$q=''; if(isset($_GET['p'])){$pagination=$_GET['p'];} if(isset($_GET['q'])){$q=$_GET['q'];};get_list_events($pagination,$q);?>
              
            
        </div>
      </div>
    </section>
    </form>
  </div>
</div>