<!-- UPDATE Modal -->
<div id="updateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content login-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Your Account</h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <form  action="" method ="post" id="update_account_form">

                      <div class="form-group" onsubmit="">
                        <label for="userName">Username:</label>
                        <input type="text" class="form-control" id="username" name="userName">
                      </div>
                      <div class="form-group">
                        <label for="email">Enter E-mail:</label>
                        <input type="text" class="form-control" id="email" name = "email">
                      </div>
                      <div class="form-group">
                        <label for="pwd">New Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Confirm New Password:</label>
                        <input type="password" class="form-control" id="pwd-confirm" name="password-confirm">
                      </div>
                      
                      
              <div style="text-align: center;">
                <button type="submit" class="btn btn-light" name = "update" >Submit</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              
                
             </div>
        
        </form>
      </div>
        
      
    </div>

  </div>
</div>
<script>

    
    $('#updateModal').on('show.bs.modal', function (e) {
     
       // get jwt from the cookie
        var jwt = getCookie('jwt');
        //get user info with jwt
        $.post("api/validate_token.php", JSON.stringify({ jwt:jwt })).done(function(result) {
  
          // html form for updating user account will be here
         
        console.log(result.data);
         //set original user info to the form
         $('.modal-body #username').val(result.data.userName);
         $('.modal-body #email').val(result.data.email);
        
        
      })
      // on error/fail, tell the user he needs to login to show the account page
      .fail(function(result){
          alert('Please login first!');
        
        });
    })

    // trigger when 'update account' form is submitted
  $(document).on('submit', '#update_account_form', function(e){
    
    // e.preventDefault();
    // handle for update_account_form
    var update_account_form=$(this);

    // validate jwt to verify access
    var jwt = getCookie('jwt');
    
    //form validataion
    if(!validateForm('update_account_form')){
        
        return false;
      }

    // get form data and jwt here// get form data
    var update_account_form_obj = update_account_form.serializeObject()
    
    // add jwt on the object
    update_account_form_obj.jwt = jwt;
      
    // convert object to json string
    var form_data=JSON.stringify(update_account_form_obj);
      
    // send data to api here
    // submit form data to api
      $.ajax({
          url: "api/update_user.php",
          type : "POST",
          contentType : 'application/json',
          data : form_data,
          success : function(result) {

            $('#updateModal').modal('hide');
              // tell the user account was updated
            alert('User data updated!'); 
      
              // store new jwt to coookie
            setCookie("jwt", result.jwt, 1);

            $('#userNameDisplay').html(result.userName);

            
            
              
          },
          // show error message to user
          error: function(xhr, resp, text){
              if(xhr.responseJSON.message=="Unable to update user."){
                  
                  alert('Unable to update user!');
              }
          
              else if(xhr.responseJSON.message=="Access denied."){
                  
                  alert('Access denied!');
              }
          }
      });

      return false;
  });

</script>