<div class="row">
  <?php include('right-menu.php');?>
 
  <div class="span9">
    <section id="articles">
      <div class="page-header">
        <h4 style="margin:0px">Articles</h4>
      </div>
      
      <div class="row">
     <form class="form-search pull-right">
  <div class="input-append">
    <input type="text" class="span2 search-query">
    <button type="submit" class="btn">Search</button>
  </div>
</form>
   <form method="post">
      <div class="span4">
      	<a href="?action=add-new" class="btn"><i class="icon-pencil"></i> <strong>Add New</strong></a>
        <a href="#" class="btn"><i class="icon-edit"></i> <strong>Edit</strong></a>
        <div class="input-prepend pull-right">
          <span class="add-on"><i class="icon-trash"></i></span>
          <input type="submit" name="delete_content" value="Delete" class="btn">
   		 </div>
         
        <a href="#" class="btn"><i class="icon-align-justify"></i> <strong>List</strong></a>
      </div>
      	<div class="span9">
        	<table class="table table-hover">
              <thead>
 			  <tr>
              <th width="10"><input type="checkbox" name="chkall" /></th>
                <th width="20">ID</th>
                <th>Title</th>
                <th>Section</th>
                <th width="130">Published Date</th>
                <th width="100"></th>
              </tr>
              </thead>
              <tbody>
              <tr>
              <td><input type="checkbox" name="chkall" /></td>
              <td>ddds</td>
              <td><span class="label pull-right">Category</span>Title Here</td>
              <td>Section Here</td>
              <td>Published Date Here</td>
              <td><a href="#" class="btn" title="Edit"><i class="icon-edit"></i></a> <a href="#" class="btn" title="Delete"><i class="icon-trash"></i></a></td>
              </tr>
              </tbody>
			</table>
            
        </div>
      </div>
    </section>
    </form>
  </div>
</div>
