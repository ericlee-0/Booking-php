


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
        <form action="" method="post" id="login_form">

                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="username" name="email">
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
<script>
  
 
  

  // get or read cookie
  function getCookie(cname){
    
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' '){
              c = c.substring(1);
          }
  
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
  }

  


  // function to set cookie
  function setCookie(cname, cvalue, exdays) {
    
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  // trigger when login form is submitted
  $(document).on('submit', '#login_form', function(e){
      
      // get form data
      var login_form=$(this);
      var form_data=JSON.stringify(login_form.serializeObject());
      
      
      // submit form data to api
      $.ajax({
          url: "api/login.php",
          type : "POST",
          contentType : 'application/json',
          dataType: 'text',
          data : form_data,
          success : function(result){
              
              // store jwt to cookie
              result = JSON.parse(result);
              setCookie("jwt", result.jwt, 1);
              setCookie('userId',result.userId,1);
              
              $('#loginModal').modal('hide');
                
              $('#loginConfirmModal').modal('show');
              
          },
          // error response will be here
          error: function(xhr, resp, text){
              // on error, tell the user login has failed & empty the input boxes
            
              console.log(xhr, resp, text);
              alert('Login failed. Email or password is incorrect.');
              
          }
      });
  
      return false;
  });
  
  


  
</script>