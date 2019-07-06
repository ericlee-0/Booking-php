<!-- REGISGTER Modal -->
<div id="registerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content login-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Create Your Account</h4>
        <button type="button" class="btn btn-light" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login</button>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <form action="" method="post">

                      <div class="form-group">
                        <label for="email">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                      </div>
                      <div class="form-group">
                        <label for="email">Enter E-mail:</label>
                        <input type="text" class="form-control" id="email" name = "email">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Confirm Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                      </div>
                      
                      
                  
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-default" name = "register" value="Submit">Submit</button>
        </form>

        
      </div>
      <form action="<?php echo $loginUrl; ?>" method="post">
          <div style="display: table; margin: 0 auto;">
            <button type="submit" class="btn btn-primary" >
              Sign in with FaceBook
            </button>
          </div>
        </form>
        <br/>
    </div>

  </div>
</div>