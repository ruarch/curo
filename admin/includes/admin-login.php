     <div  class="span4 offset4" > 
	 <?php echo admin_login($_POST);?>
      <legend>Login</legend>
       <form class="form-horizontal" action="" method="post">

  <div class="control-group">
    <label class="control-label" for="inputUsername">Username</label>
    <div class="controls">
      <input type="text" id="inputUsername" placeholder="Username" name="username">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password" name="password">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      
      <button type="submit" class="btn" name="login">Login</button>
    </div>
  </div>
</form>
</div>