<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Reservation</title>

  <!-- Bootstrap core CSS -->
  <link href="js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css" >
  
  <!-- Date time picker style -->
  
  <!-- Basic stylesheet -->
  

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery/jquery.min.js"></script>
  <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>
  



  <!-- Plugin JavaScript -->
  <script src="js/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/jquery.datetimepicker.full.min.js"></script>
  
  

</head>
<?php
  require "vendor/autoload.php";
  session_start();
  // session_unset();
  include("$_SERVER[DOCUMENT_ROOT]/modals/update.php");
  include("$_SERVER[DOCUMENT_ROOT]/modals/login.php");
  include("$_SERVER[DOCUMENT_ROOT]/modals/loginConfirm.php");
  include("$_SERVER[DOCUMENT_ROOT]/modals/register.php");
  include("$_SERVER[DOCUMENT_ROOT]/modals/registConfirm.php");
  include("$_SERVER[DOCUMENT_ROOT]/modals/logout.php");
  // include "init.php";
  // isset($_SESSION['jwt'])? echo $_SESSION['jwt']:"";
  // if(isset($_SESSION['jwt'])){
    // echo "<br/>"."<br/>"."<br/>".$_SESSION['jwt'];
    
    // var_dump($_SESSION['user_id']);
  // }
  // else{
  //   echo "<br/>"."<br/>"."<br/>"."kajshdfkjahsdkfjhaskdjfhskajdf";
    
  // }
  // echo "<br/>"."<br/>"."<br/>"."kajshdfkjahsdkfjhaskdjfhskajdf";
  
?>
<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Book Your Table</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#reservation">Reservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            
          </li>
          <?php if(!isset($_SESSION['jwt'])): ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#registerModal">Register</a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
              
            </li>
          <?php else: ?>
            <li class="nav-item dropdown">
            
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span id="userNameDisplay" >User</span>
              </a>
                <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#updateModal">Manage Account</a>
                  <a class="dropdown-item" href="#">Admin Mode</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
                
            </li>
            <li class="nav-item">
            
            <a class="nav-link js-scroll-trigger" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            
            </li>
          <?php endif;?>

        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Welcome to Bookig System</h1>
      <p class="lead">This is restaurant's table reservaition web page</p>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>About this page</h2>
          <p class="lead">HTML 5, Bootstrap 4, JavaScript, Php 7.3, MYSQL Database, Heroku web server</p>
          <ul>
            <li>Clickable nav links that smooth scroll to page sections</li>
            <li>Responsive behavior when clicking nav links perfect for a one page website</li>
            <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
            <li>Minimal custom CSS so you are free to explore your own unique design options</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Services we offer</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="reservation">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Book a table</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>

          <form id="book_table_form">
            <div class="form-group row">
              <label for="datepick" class="col-sm-2 col-form-label text-center"><i class="fa fa-calendar"></i><i class="far fa-calendar-alt"></i></label>
              <div class="col-sm-6">
              <div class="well">
                <div  class="input-append">
                  <input id ="datepicker"  type="text" class="form-control" placeholder="date" autocomplete="off" name="picked_date">
                  <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              
              </div>
            </div>
            <div class="form-group row">
              <label for="timepick" class="col-sm-2 col-form-label text-center"><i class="fa fa-clock-o"></i></label>
              <div class="col-sm-6">
                <input id="timepicker" type="text" class="form-control"  placeholder="time" autocomplete="off" name="picked_time">
              </div>
            </div>
            
            <div class="form-group row">
              <label for="numpick" class="col-sm-2 col-form-label text-center"><i class="fa fa-group"></i></label>
              <div class="col-sm-6">
                <div class="form-group">
                  
                  <select class="form-control" id="peoplepicker" name="picked_people" >
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7+Contact Restaurant</option>

                  </select>
                
                </div>
              </div>
            
            <br/>
            <button type="submit" class="btn btn-primary btn-large btn-block">Book Now</button>
          </form>
            
          <div id="book_result">
          </div>
        </div>
      </div>
    </div>
  </section>



  <section id="contact" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Contact us</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy;  B Y Lee 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

  <script>
   
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
                // $('#book_result').html("<div class='alert alert-success'>Successful sign up. Please login.</div>");
                // sign_up_form.find('input').val('');
                console.log(result);
            },
            error: function(xhr, resp, text){
                // on error, tell the user sign up failed
                // $('#book_result').html("<div class='alert alert-danger'>Unable to book. Please change time or contact restaurant.</div>");
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
  </script>

</body>

</html>
