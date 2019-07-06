


<!-- LOGIN Modal -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <!-- Modal content login-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Login </h4>
        <!-- <button class="btn btn-success" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Register2</button> -->
        <button type="button" class="btn btn-light" data-dismiss="modal"  data-toggle="modal" data-target="#registerModal">Register</button>
        <button type="button" class="close"  data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="" method="post">

                      <div class="form-group">
                        <label for="email">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                      </div>
                      <div class="checkbox">
                        <label>
                        <input type="checkbox" name="admin" value = "yes"> Login as admin 
                        </label>
                      </div>
                      
      
                      
                        <button type="submit" class="btn btn-light btn-block" name ="login" value="Submit">Submit</button>
                        <button type="button" class="btn btn-light btn-block" data-dismiss="modal">Close</button>
                        
                      
        </form>
      </div>
        <br/>
        
        <div class="modal-footer">
        <?php if (isset($googleAuthUrl)): ?>
            <form action="<?php echo $googleAuthUrl; ?>" method="post">
                <button type="submit" class="btn btn-primary btn-block">
                    Login with Google
                </button>
            </form>
        
        <?php elsif: ?>
        <?php endif ?>
        <br/>
        
        <form action="<?php echo $loginUrl; ?>" method="post">
          <div>
            <button type="submit" class="btn btn-primary">
	            Login with FaceBook
		        </button>
          </div>
        </form>

        <br/>
        <br/>
        
      </div>
    </div>

  </div>
</div>
