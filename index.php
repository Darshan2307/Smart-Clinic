<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
     <!-- javascript -->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
     integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
     crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
     integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
     crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
     integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
     crossorigin="anonymous"></script>



    <title>Home</title>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Smart Clinic</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#n">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="n">
            <ul class="navbar-nav" id="home">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#abtus">About&nbsp;us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#service">Services</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="#stories">Stories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact&nbsp;us</a>
                </li>
                <li class="nav-item login">
                    <a class="nav-link" href="login.php">LogIn/SignUp</a>
                </li>

                
            </ul>
        </div>
    </nav>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="height: 600px;">
            <div class="carousel-item active">
                <img src="img/doctors.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/home.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/6.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<br><br>
    <div class="container" id="aboutUs">
        <div class="col-md-12 text-center">
           <header> <h1>Smart Clinic</h1></header>
           <br>
            <div style="text-align: center;" id="abtus"><p>
                <b>SAMAST PATIDAR AAROGYA TRUST</b> is a <b>“NOT FOR PROFIT”</b> Organization. The
                Trust has setup a State of the Art Multi Super speciality Hospital and Research
                Centre. The Hospital bridged qualitative lacuna in the sphere of Medicine, especially
                amongst the super speciality branches of modern Medical Science. This healthcare
                facility is in the diamond capital of India, Surat, Gujarat, is open to all patients
                not only from the state of Gujarat, but also from across the country, and hopefully
                from other Countries as well.
            </p></div>

        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="a-round surgeries">
                    <div class="a-counter" id="n1">
                       <script>
                           var i = 4000, howManyTimes = 5000;
                        function f() {
                          
                          i++;
                          document.getElementById("n1").innerHTML=i;
                          if( i < howManyTimes ){
                           setTimeout( f, 0.0000000000000001 );
                          }
                        }
                        f();
                        
                       </script> 
                       
                    </div>
                    <div class="a-title">
                        Surgeries
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="a-round cardiacProc">
                    <div class="a-counter" id="n2">
                        <script>
                            var i2 = 7301, howManyTimes2 = 8301;
                         function f2() {
                           
                           i2++;
                           document.getElementById("n2").innerHTML=i2;
                           if( i2 < howManyTimes2 ){
                            setTimeout( f2, 0.0000000000000001 );
                           }
                         }
                         f2();
                        </script> 
                        
                    </div>
                    <div class="a-title">
                        Cardiac Procedure
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="a-round patientVisit">
                    <div class="a-counter" id="n3">
                        <script>
                            var i3 = 49000, howManyTimes3 = 50000;
                         function f3() {
                           
                           i3++;
                           document.getElementById("n3").innerHTML=i3;
                           if( i3 < howManyTimes3 ){
                            setTimeout( f3, 0.0000000000000001 );
                           }
                         }
                         f3();
                        </script> 
                        
                    </div>
                    <div class="a-title">
                        Patient Visited
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <br>
    <br>
    <div id="service">
        <div class="container"><br>
            <table cellspacing="20">
              <center><b style="font-size: 40px;">Our Services</b></center><br>
              <br>
              <tr>
              <td>
                <div class="container"><center>
                <img src="https://www.kiranhospital.com/images/accident.png" alt="Avatar" class="image">
                
                <br><a href="#"><div class="overlay">Accident and emergency cases</div></a></center>

                </div>
              </td>
              <td></td>
              <td>
                <div class="container"><center>
                <img src="https://www.kiranhospital.com/images/clinical.png" alt="Avatar" class="image">
                
                <br><a href="#"><div class="overlay"> 
                    Clinical
                    Nutrition & Dietetics</div></a></center>

                </div>
              </td>
              <td></td>
              <td>
                <div class="container"><center>
                <img src="https://www.kiranhospital.com/images/cardiology.png" alt="Avatar" class="image">
                
                <br><a href="#"><div class="overlay"> 
                    Cardiology &
                    Cardiothoracic Surgery</div></a></center>

                </div>
              </td>
              <td></td>
              <td>
                <div class="container"><center>
                <img src="https://www.kiranhospital.com/images/critical.png" alt="Avatar" class="image">
                
                <br><a href="#"><div class="overlay"> 
                    Critical
                    Care</div></a></center>

                </div>
              </td>
              
              </tr>
              <tr>
                  <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
              </tr>
             
            </table>
            
    </div>
    <div id="stories">
        <br><br><br> <center><b style="font-size: 40px;">Our Patient's Stories</b></center><br>
    
        <div class="card" style="width: 18rem; float: left;position: relative; left: 15%; ">
          <img src="https://www.mayoclinic.org/-/media/kcms/gbs/patient-consumer/images/2020/03/16/11/00/kaipainencameronfamily500-150x150jpg.jpg" width="100%" height="180">
            <div class="card-body">
              <h5 class="card-title">Cameron’s New Way Forward After Rare Disease Diagnoses
            </h5>
              <p class="card-text">Cameron Kaipainen with his mom and dad, Michele and Aron. Cameron Kaipainen and his parents spent years searching for explanations to his ongoing and confusing medical problems. </p>
              
            </div>

          </div>
        
          <div class="card" style="width: 18rem; position: relative; left: 20%; float: left;">
            <img src="https://www.mayoclinic.org/-/media/kcms/gbs/patient-consumer/images/2020/04/06/11/00/hustwoody500-150x150jpg.jpg" width="100%" height="180">
            <div class="card-body">
                <h5 class="card-title">Cameron’s New Way Forward After Rare Disease Diagnoses
                </h5>
                  <p class="card-text">Cameron Kaipainen with his mom and dad, Michele and Aron. Cameron Kaipainen and his parents spent years searching for explanations to his ongoing and confusing medical problems. 
            </div>
          </div>
          <div class="card" style="width: 18rem;position: relative; left: 25%; float: left;">
            <img src="https://www.mayoclinic.org/-/media/kcms/gbs/patient-consumer/images/2020/03/18/11/00/smithjames500-150x150jpg.jpg" width="100%" height="180">  
            <div class="card-body">
                <h5 class="card-title">Cameron’s New Way Forward After Rare Disease Diagnoses
                </h5>
                  <p class="card-text">Cameron Kaipainen with his mom and dad, Michele and Aron. Cameron Kaipainen and his parents spent years searching for explanations to his ongoing and confusing medical problems. 
            </div>     
    </div>
    <br><br><br><br><br>
    <div id="contact">

        <center><h2>Contact Us</h2></center>

        <br><br>
        <div class="row text-center" style="margin-top: -10px;padding-top: 5px;">

            <!--Grid column-->
            <div class="col-md-4">
    
              <i class="fas fa-map-marker-alt fa-2x black-text"></i>
    
              <p class="font-weight-bold my-3" style="color: darkblue;">Address</p>
    
              <p style="color: darkblue;">SCET,surat.</p>
    
            </div>
          
            <div class="col-md-4" style="padding-top: 5px;">
    
                <i class="fas fa-phone fa-2x blue-text" id="phone"></i>
    
                <p class="font-weight-bold my-3" style="color: darkblue;">Phone number</p>
      
                <p style="color: darkblue;">+91-9987653214</p>
    
            </div>
                <div class="col-md-4" >
    
                <i class="fas fa-envelope fa-2x blue-text"></i>
    
                <p class="font-weight-bold my-3" style="color: darkblue;">E-mail</p>
      
                <p style="color: darkblue;">info@gmail.com</p>
    
            </div>
    
    
    
    </div>
    
    </div>



   
</body>

</html>