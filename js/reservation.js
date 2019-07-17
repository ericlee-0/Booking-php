$(document).ready(function(){
      
    if(getCookie('jwt')){
      // get jwt from the cookie
      var jwt = getCookie('jwt');
        //get user info with jwt
        $.post("api/validate_token.php", JSON.stringify({ jwt:jwt })).done(function(result) {
  
          
        //display username on the manu navbar
        $('#userNameDisplay').html(result.data.userName);
        
        
      })
      // on error/fail, tell the user he needs to login to show the account page
      .fail(function(result){
          // alert('Please login first!');
          console.log(result);
        
        });

    }

    if(getCookie('reservInfo')){
      var reservInfo = getCookie('reservInfo');
          reservInfo = JSON.parse(reservInfo);
          console.log(reservInfo);
          $('#datepicker').val(reservInfo.picked_date);
          $('#timepicker').val(reservInfo.picked_time);
          $('#peoplepicker').val(reservInfo.picked_people);
    }
    
  })
 
  
  jQuery('#datepicker').datetimepicker({
    timepicker:false,
    format:'Y-m-d',
  });
           
  jQuery('#timepicker').datetimepicker({
    datepicker:false,
    format:'H:i',
    step: 15,
    minTime:'11:20',
    maxTime:'21:50'
  });
  

  
      // trigger when book_table form is submitted
  $(document).on('submit', '#book_table_form', function(e){
    
    e.preventDefault();
    // get form data
    var sign_up_form=$(this);
        sign_up_form = sign_up_form.serializeObject();
    
    //validate reservaion date and time
    if(!sign_up_form.picked_date){
      alert('Choose date');
      return false;
    }
    if(!sign_up_form.picked_time){
      alert('Choose time');
      return false;
    }
    //get userId from the cookie
    if(getCookie('userId')){  
      sign_up_form['userId'] = getCookie('userId');

      var form_data=JSON.stringify(sign_up_form);
      console.log(form_data);
    //submit form data to api
      $.ajax({
          url: "api/create_reservation.php",
          type : "POST",
          contentType : 'application/json',
          dataType:'text',
          data : form_data,
          success : function(result) {
              // if response is a success, tell the user it was a successful sign up & empty the input boxes
              
              showBookResult(sign_up_form);
              
              console.log(result);
          },
          error: function(xhr, resp, text){
              // on error, tell the user reservation failed
              
              console.log(xhr, resp, text);
          }
      });
    }
    //if no userId then go login form
    else{
      
      setCookie('reservInfo',JSON.stringify(sign_up_form),1);
      console.log(getCookie('reservInfo'));
      $('#loginModal').modal('show');
    }

    

    return false;
  });


  // show login page
function showBookResult(result){
 
    // remove jwt
    // setCookie("jwt", "", 1);
 
    // login page html
    console.log(typeof result);
    var html = `
        <h2 style="text-align:center;">Reservation Successful!</h2>
        <br/>
        <form id='book_result_form'>
            <div class='form-group row' >
            <div class="col-sm-10 " style="background-color: lightgoldenrodyellow;padding-top:5px">
                
                <div >
                    Name: <span id='reserved_name'></span>
                    Date: <span id='reserved_date'></span>
                    Time: <span id='reserved_time'></span>
                    People: <span id='reserved_people'></span>
                    
                    
                    
                </div>
            </div>
            <div class="col-sm-2">
            <button type='submit' class='btn btn-light btn-block float-right'>X</button>
            </div>
            </div>
            
        </form>
        `;
    
    $('#book_result').html(html);
    $('#reserved_name').html($('#userNameDisplay').text());
    $('#reserved_date').html(result.picked_date);
    $('#reserved_time').html(result.picked_time);
    $('#reserved_people').html(result.picked_people);
    // clearResponse();
    // showLoggedOutMenu();
}