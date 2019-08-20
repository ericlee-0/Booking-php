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
  <!-- jquery datetimepicker -->
  <script src="js/jquery.datetimepicker.full.min.js"></script>
  <!-- google chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  

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
                    <option disabled>7+Contact Restaurant</option>

                  </select>
                
                </div>
              </div>
            
            <br/>
            <button type="submit" class="btn btn-primary btn-large btn-block">Book Now</button>
          </form>
         
        </div>
        <br/>
        <br/>
        <div id="book_result"></div>
        <br/>
        <br/>
        <div>
          <H3>Reservation Status</H3>
        </div>
          <button class="btn btn-light btn_chart" id="btn_daily_chart" name="daily_chart" value="daily_chart" >Today</button>
          <button class="btn btn-light btn_chart" id="btn_weekly_chart" name="weekly_chart" value="weekly_chart" >Weekly</button>   
          <button class="btn btn-light btn_chart" id="btn_monthly_chart" name="monthly_chart" value="monthly_chart" >Monthly</button> 
          <button class="btn btn-light " id="btn_advanced_chart" name="advanced_chart" value="advanced_chart" onclick="displayOption()" >Advanced Chart</button> 
        <!--Div that will hold the pie chart-->
        
          <div id="optionChart" style="display:none">
            <form id="option_chart_form">
              <br/>
              <div class="form-group row">
                GET CHART of SELECTED DATE :
                <label for="datepick_chart" class="col-sm-1 col-form-label text-center"><i class="fa fa-calendar"></i><i class="far fa-calendar-alt"></i></label>
                
                <div class="col-sm-4">
                    
                  <div class="well">
                    <div  class="input-append">
                      <input id ="date_picker_chart"  type="text" class="form-control" placeholder="Select date" autocomplete="off" name="picked_date_chart">
                      <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                        </i>
                      </span>
                      
                    </div>
                    
                  </div>
                
                </div>
                <button class="btn btn-light" id="btn_selected_daily_chart" type="submit" name="daily_chart" value="daily_chart" >Get</button>
              </div>

              <br/>
              <div class="form-group row">
                GET CHART of User :
                <label for="user_pick_chart" class="col-sm-1 col-form-label text-center"><i class="fa fa-user"></i><i class="far fa-calendar-alt"></i></label>
                
                <div class="col-sm-4">
                    
                  <div class="well">
                    <div  class="input-append">
                      <input id ="user_chart"  type="text" class="form-control" placeholder="ex)cccc@cc.com" autocomplete="off" name="picked_user_email">
                      <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                        </i>
                      </span>
                      
                    </div>
                    
                  </div>
                
                </div>
                <button class="btn btn-light" type="submit" id="btn_user_chart" name="monthly_chart" value="monthly_chart" >Get</button>
              </div>

              <br/>
              <div class="form-group row">
                GET CHART by number of guests :
                <label for="number_geust_chart" class="col-sm-1 col-form-label text-center"><i class="fa fa-users"></i></label>
                
                <div class="">
                    
                    <select name="min_guest" class="">
                      <option value="">min</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                          
                    </select>
                    -
                    <select name="max_guest" class="">
                      <option value="">max</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                          
                    </select>
                  </div>
                <button class="btn btn-light" type="submit" id="btn_user_chart" name="monthly_chart" value="monthly_chart" style="margin-left: 15px;" >Get</button>
              </div>
            </form>
          </div>
          
          

        <!-- <div id="chart_div"></div> -->
        <div class="row">
          <div class="col-sm">
              <div id="barchart_daily_div" ></div>
          </div>
          <br/>
          <br>
         
        </div>
        <div class="row">
            <div class="col-sm">
                <div id="user_reservation_list" ></div>
            </div>
            <br/>
            <br>
           
        </div>
        <div class="row">
            <div class="col-sm">
                <div id="div_monthly_chart" ></div>
                <br/>
                
            </div>
            <br/>
            <br>
            
        </div>
        <div class="row">
          
          <div class="col-sm">
                <div id="chart_div" ></div>
                <br/>
              
            </div>
            <br/>
            <br>
            <br/>
            
           
        </div>
        <form>
        
        </form>
        <!-- <form action="" method="post" id="testF"> -->
                
            <button id="test1"  name="send_form" value="send">Add To Databse</button>
            <button id="test2"  name="send_form2" value="save">Save</button>
        <!-- </form> -->
      </div>
    </div>
  </section>

<script>
  $('#test1').on('click', function (e) {
    // var dataT = $("#test").serialize() + '&submit='+ $(this).attr("value");
    var dataT = $("#testF").serialize();
    // console.log(dataT)
    e.preventDefault();
    // console.log("button>");
    $.ajax({
      type: 'POST',
      url: 'api/posting.php',
      data: {'send_form': dataT},
      // dataType:'json',
      success: function (res) {
        // location.reload();
        console.log(res);
        // console.log(dataT);
      }
    });

    // $.post('api/posting.php', $('#testF').serialize(), function(data){
             
    //          // show the response
    //         //  $('#response').html(data);
    //         console.log(data);
    //         console.log("succeed")
              
    //      }).fail(function(res) {
    //           console.log(res);
    //          // just in case posting your form failed
    //          alert( "Posting failed." );
              
    //      });
   
    return false;
  });
</script>

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

  <!-- Reservation js script -->
  <script src="js/reservation.js"></script>


  <script type="text/javascript">
    function displayOption() {
      var x = document.getElementById("optionChart");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
    }
    


    $('body').on('submit', '.book_result_form', function(e) {
       e.preventDefault();  
     
        $(this).next().toggle();
        
    });

  

  

      google.charts.load('current', {'packages':['bar','corechart','table']});
      // google.charts.setOnLoadCallback(drawChartDaily);
      // google.charts.setOnLoadCallback(drawChartWeekly);
      google.charts.setOnLoadCallback(drawChartMonthly);

      $('#div_monthly_chart').hide();


      function drawChartMonthly() {
        

        var rawData1=[
          ['Month', 'Reserved Seat'],
          ['January', 0]
          
        ]
        var rawData2 = [
          ['Month', 'Reserved Seat']
        ];
       // Create and populate the data tables.
        var data = [];
        data[0] = google.visualization.arrayToDataTable(rawData1);
        data[1] = google.visualization.arrayToDataTable(rawData2);

        var options = {
          chart: {
            title: 'Reservation Status',
            subtitle: 'Reserved seat by month',
          },
          seriesType: "bars",
          series: {5: {type: "line"}},
          vAxis: {format: 'decimal'},
          height: 400,
          width: 800,
          colors: ['#5562ed'],
          animation:{
            duration: 2000,
            easing: 'out'
          },
          // vAxis: {minValue:0, maxValue:300}
        };

       
        
        var current = 0;
        // Create and draw the visualization.
        var chart = new google.visualization.ComboChart(document.getElementById('div_monthly_chart'));
        // var button = document.getElementById(btnId);
        

        function drawChart() {
          // console.log(button);
          // Disabling the button while the chart is drawing.
          // button.disabled = true;
          // google.visualization.events.addListener(chart, 'ready',
          //     function() {
          //       button.disabled = false;
          //       // button.value = 'Switch to ' + (current ? 'Tea' : 'Coffee');
          //     });
          // options['title'] = 'Monthly ' + (current ? 'Coffee' : 'Tea') + ' Production by Country';

          chart.draw(data[current], options);
        }
        drawChart();
        
        function getChart(btnVal,optionValue=null){
          console.log(btnVal);
          console.log(typeof(optionValue));
          // current = 1 - current;
          current = 1 ;
          $('#div_monthly_chart').show();
          //ajax post to fetch_chart_data.php

          
          $.ajax({
              url: "api/fetch_chart_data.php",
              type : "POST",
              // contentType : 'application/json',
              // dataType:'text',
              // dataType:'json',
              data : {chart: btnVal,
                      chartOption:optionValue
              
                    },
              success : function(result) {
                //reset rawData2
                rawData2 = [
                              ['Month', 'Reserved Seat']
                            ];
                  
                  //set rawData2 with result data (month & reserved seat)
                var i=1;
                console.log(result);
                
                
                // if user was selected
                if(result.userData){

                  //create list of reservation data of the user
                  $('#user_reservation_list').empty();

                  result.userData.map((data)=>{
                    showBookResult(data);
                  })
                }
              
                
                //set chart title and color
                if(btnVal ==='weekly_chart'){
                  rawData2[0] = ['Week','Reservations'];
                  options.colors[0] ="#5691f0";
                  
                }else if (btnVal ==='daily_chart'){
                  rawData2[0] = ['Day', 'Reservations'];
                  options.colors[0] ="#1b9e77";
                  
                }
                else{
                  options.colors[0] ="#5562ed"
                }
                //set data from result to rawData2
                result.data.map((k) =>{
                  rawData2[i] = [k['display_date'],parseInt(k['total'])];
                  i++; 
                });
                //set to data with new rawData2
                data[1] = google.visualization.arrayToDataTable(rawData2);
                drawChart();
                  
                  // console.log(result);
              },
              error: function(xhr, resp, text){
                  // on error, tell the error message
                  
                  console.log(xhr, resp, text);
              }
          });


        }
        // choose chart by click button
        $('.btn_chart').click(function(e){

          var btnVal = $(this).val();
             console.log(btnVal)
             getChart(btnVal);
          

         
        });
        // when advanced chart option was submitted
        $(document).on('submit', '#option_chart_form', function(e){
        
          e.preventDefault();
          // get form data
          var option_chart_form=$(this);
            option_chart_form = option_chart_form.serializeObject();
          
            console.log(option_chart_form);
            if(option_chart_form.picked_date_chart){
              getChart("daily_chart",option_chart_form);
            }
            else{
              getChart("monthly_chart",option_chart_form);
            }
        
        
        
        });

         // show login page
        function showBookResult(result){
        
        // remove jwt
        // setCookie("jwt", "", 1);

        // login page html
        // console.log(typeof result);
        var html = `
            
            <form class='book_result_form'>
                <div class='form-group row' >
                <div class="col-sm-10 " style="background-color: lightgoldenrodyellow;padding-top:5px">
                    
                    <div >
                        Ref.#: <span class='reserved_id'>`+result.booking_id+`</span>
                        Name: <span class='reserved_name'>`+result.username+`</span>
                        Date: <span class='reserved_date'>`+result.date+`</span>
                        Time: <span class='reserved_time'>`+result.time+`</span>
                        People: <span class='reserved_people'>`+result.people+`</span>
                        
                        
                        
                    </div>
                </div>
                <div class="col-sm-2">
                <button type='submit' class='btn btn-light btn-block float-right' >Detail</button>
                </div>
                </div>
                
            </form>
            <div class="booking_detail" style="display:none" >
            
              <div> Booking Reference Number : `+result.booking_id+`</div>
              <div> Booking Created time : `+result.created+` </div>
              <div> Name of User : `+result.username+` </div>
              <div> Email of User : `+result.email+` </div>
              <div> Booking Date : `+result.date+` </div>
              <div> Booking Time : `+result.time+` </div>
              <div> Number of Guests : `+result.people+` </div>
              

            
            
            </div>
            `;
        
        $('#user_reservation_list').append(html);
        // $('.reserved_name').html(result.username);
        // $('.reserved_date').html(result.date);
        // $('.reserved_time').html(result.time);
        // $('.reserved_people').html(result.people);
        // clearResponse();
        // showLoggedOutMenu();
        }


        
        



        
      }

   
  </script>

</body>

</html>
