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
        <form  action="" method ="post" id="sign_up_form" name='registration' >

                      <div class="form-group" onsubmit="">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="userName">
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
                        <input type="password" class="form-control" id="pwd-confirm" name="password-confirm">
                      </div>
                      
                      
              <div style="text-align: center;">
                <button type="submit" class="btn btn-light" name = "register" >Submit</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              
                
             </div>
        
        </form>
      </div>
        
      <div class="modal-footer">
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
</div>

<script>
  //form validation
  function validateForm(formName) {
    var userName = document.forms[formName]["userName"].value;
    var email = document.forms[formName]["email"].value;
    var password = document.forms[formName]["password"].value;
    var passwordConfirm = document.forms[formName]["password-confirm"].value;
    //regex of email format
    var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    if (userName == "") {
      alert("Username must be filled out");
      return false;
    }
    if(!email.match(mailFormat)){
      alert("Invalid email format");
      return false;
    }
    if(password.length < 4){
      alert("Password has to be more then 4 characters");
      return false;
    }
    if(password !== passwordConfirm ){
      alert("Your password and confirmation password do not match.");
      return false;
    }
    
    return true;
  }

  $(document).ready(function(){

    // function to make form values to json format
    $.fn.serializeObject = function(){
    
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
    };

    
        
    $(document).on('submit','#sign_up_form', function(e){
      e.preventDefault();
      //get data from the form
      var sign_up_form=$(this);
      var form_data=JSON.stringify(sign_up_form.serializeObject());
      
      if(!validateForm('sign_up_form')){
        
        return false;
      }

        $.ajax({
            url: "api/create_user.php",
            type : "POST",
            contentType : 'application/json',
            dataType: 'text',
            data : form_data,
            success : function(result) {
                
                // if response is a success, tell the user it was a successful sign up & empty the input boxes
                
                $('#registerModal').modal('hide');
                $('#sign_up_form')[0].reset();
                $('#registConfirmModal').modal('show');

            },
            error: function(xhr, resp, text){
                // on error, tell the user sign up failed
                // $('#response').html("<div class='alert alert-danger'>Unable to sign up. Please contact admin.</div>");
                console.log(xhr, resp, text);
               
            }
        });
      // }
      
 
      return false; 
    })
    // remove any prompt messages
    // function clearResponse(){
    //     $('#response').html('');
    // }

  });
</script>