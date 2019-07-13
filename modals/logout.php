
<?php  
  
  // echo "<br/>"."<br/>"."<br/>"."logOut modal";
  // echo $_SERVER['REREQUEST_METHOD'];
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['logout'])){
  
      echo "<script>console.log('logout');</script>";
      session_unset();
    }
  };
  
  
?>
<div id="logoutModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Logout Successful!</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        

                      <div class="form-group">
                        <label for="userData"> 
                          You are now Logged out! </label><br>
                      </div>

                      
      </div>
      <div class="modal-footer">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <!-- <button type="submit" class="btn btn-light" data-dismiss="modal" name='logout'>Close</button> -->
          <button type="submit" class="btn btn-light" name='logout'>Close</button>
      
      </form>
      
        
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('button[name="logout"]').on('click', function(){
      setCookie('userId',"",0);
      // window.location.href = "/";
      // console.log('button logout clicked');
      
    })
  })  

</script>
