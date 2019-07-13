<div id="loginConfirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Login Successful!!</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        

                      <div class="form-group">
                        <label for="userData"> 
                        You are now Logged in! </label><br>
                      </div>

                      
      </div>
      <div class="modal-footer">
         
      <button type="button" class="btn btn-light" data-dismiss="modal" name='backHome'>Close</button>
        
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('button[name="backHome"]').on('click', function(){
      //if cookie has reservation info then go to reservation section
      if(getCookie('reservInfo')){
        window.location.href = '/#reservation';
      }
      //otherwise goto main
      else{
        window.location.href = "/";
      }
      
    })
  })  

</script>