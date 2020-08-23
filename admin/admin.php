<?php
include('../dbcon.php');
if (isset($_POST['delt'])){
  $doc = $_POST['dlt'];
  $qry = "delete from doctor where name='$doc'";
  $run = mysqli_query($con, $qry);
}
if(isset($_POST['udt'])){
  $doct=$_POST['update'];
 
    $dnme=$_POST['name'];
    $dphone=$_POST['phone'];
    $dmail=$_POST['email'];
    $dgender=$_POST['gender'];
    $daddr=$_POST['address'];
    $qry = "update doctor set name='$dnme',phone='$dphone',email='$dmail',gender='$dgender',address='$daddr' where name='$doct'";
    $run = mysqli_query($con, $qry);
    if($run==true){
      echo "<script>alert('updated successfully');</script>";
    }
  

}
?>

<html>
    <head>
        <title>ADMIN PAGE</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
    function openNav() {
      document.getElementById("myNav").style.width = "25%";
    }
    
    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
    </script>

    <style>
  body{
    background-color:#f8fafc;
  }    
.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}



#dashboard,#doctor,#patient{
    height: 800px;
    margin-left:10%;
    padding-top:8%;
}
#doctor{
  height:1000px;
}

.card-1{background:#2193b0;background:linear-gradient(90deg,#2193b0,#6dd5ed)}
.card-1,.card-2{border-radius:8px}
.card-2{background:#4e54c8;background:linear-gradient(90deg,#4e54c8,#8f94fb)}
.card-3{background:#fdc830;background:linear-gradient(90deg,#f37335,#fdc830)}
.card-3,.card-4{border-radius:8px}
.card-4{background:#f2709c;background:linear-gradient(90deg,#f2709c,#ff9472)}
.card-5{background:#11998e;background:linear-gradient(90deg,#11998e,#38ef7d);border-radius:8px}
.card-5 .rotate i{padding-left:22px}
.card-6{background:#36d1dc;background:linear-gradient(90deg,#5b86e5,#36d1dc);border-radius:8px}
.card-6 .rotate i{padding-left:22px}


#one{
  height: 80px;
  border-bottom: 2px solid black;
  background-color: white;
}


.tbl {
             border-collapse: collapse;
             width: 80%;
             margin-left: 10%;
             
             position:relative;
             top:-5%;

         }

         .tbl tr:first-child {
             background-color: teal;
             color: white;
             font-weight: bold;
         }

         .tbl td {
             padding: 8px;
             text-align: left;
             border-bottom: 1px solid #ddd;
             text-align: center;
         }

         #first{
           visibility:visible;
         }
         #second{
          visibility:hidden;
         }
         #updation{
           visibility:hidden;
           width:500px;
           
           
         }
         #updation textarea{
           height:50px;
         }
         #updation input[type=text],input[type=email]{
           height:25px;
         }
    </style>

    </head>
    <body background="">
        <nav class="navbar navbar-expand-sm fixed-top navbar-light" id="one">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#" style="padding-right:10px;">Smart Clinic</a>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            <span class="navbar-text ml-auto" style="font-size: 20px;font-weight: bold; color: black;">
                Welcome  Admin
              </span>
          </nav>
          <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
              <a href="#dashboard">Dashboard</a>
              <a href="#doctor">Doctor</a>
              <a href="#patient">Patient</a>
              <a href="../index.php">Log Out</a>
            </div>
          </div>
          <div class="container-fluid">
          
          <div id="dashboard">
          <h1> Dashboard</h1>
          <br><br>
            <div class="row">
                
            <div class="col-xl-3 col-sm-6 py-2">
               
                    <div class="card card-1 h-100">
                        <div class="card-body card-1" style="">
                            
                            <h5>Invoice Amount</h5>
                            <h3 class="amount-position"><i
                                        class="fa fa-inr"></i>
                                        <?php 
                                          $result=mysqli_query($con,"SELECT count(*) as total from records");
                                          $data=mysqli_fetch_assoc($result);
                                          echo (350*$data['total']);
                                        ?> 
                            </h3>
                        </div>
                    </div>
                
            </div>
            <div class="col-xl-3 col-sm-6 py-2">
               
                <div class="card card-1 h-100">
                    <div class="card-body card-2">
                        
                        <h5>Bill Amount</h5>
                        <h3 class="amount-position"><i
                                    class="fa fa-inr"></i> 00.00 
                        </h3>
                    </div>
                </div>
            
             </div>
             <div class="col-xl-3 col-sm-6 py-2">
               
                <div class="card card-1 h-100">
                    <div class="card-body card-3">
                        
                        <h5>Paid Amount</h5>
                        <h3 class="amount-position"><i
                                    class="fa fa-inr"></i> 50000.00 
                        </h3>
                    </div>
                </div>
            
             </div>

            
                
            </div>
            <div class="row">
                
                <div class="col-xl-3 col-sm-6 py-2">
                   
                        <div class="card card-1 h-100">
                            <div class="card-body card-4">
                                
                                <h5>Doctors</h5>
                                <h3 class="amount-position"><i
                                            class="fa fa-stethoscope"></i> 
                                            <?php 
                                          $result=mysqli_query($con,"SELECT count(*) as total from doctor");
                                          $data=mysqli_fetch_assoc($result);
                                          echo ($data['total']);
                                        ?> 
                                </h3>
                            </div>
                        </div>
                    
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                   
                    <div class="card card-1 h-100">
                        <div class="card-body card-5">
                            
                            <h5>Patient</h5>
                            <h3 class="amount-position"><i
                                        class="fa fa-user"></i> 
                                        <?php 
                                          $result=mysqli_query($con,"SELECT count(*) as total from patient");
                                          $data=mysqli_fetch_assoc($result);
                                          echo ($data['total']);
                                        ?>
                            </h3>
                        </div>
                    </div>
                
                 </div>
                 <div class="col-xl-3 col-sm-6 py-2">
                   
                    <div class="card card-1 h-100">
                        <div class="card-body card-6">
                            
                            <h5>Total Appointments</h5>
                            <h3 class="amount-position"><i
                                        class="fa fa-calendar"></i> 
                                        <?php 
                                          $result=mysqli_query($con,"SELECT count(*) as total from appointment");
                                          $data=mysqli_fetch_assoc($result);
                                          echo ($data['total']);
                                        ?>
                            </h3>
                        </div>
                    </div>
                
                 </div>
                    
                </div>
          </div>
          <hr>
          <div id="doctor">
          
          <h1> Doctors</h1>
          <br><br>
          <center>
          <form action="admin.php" method="post">
               <select name="dlt">
                <option>Select Doctor</option>
               <?php
                 $result=mysqli_query($con,"SELECT * from doctor");
                
                    while( $data1=mysqli_fetch_assoc($result))
                    {
                    ?>
                    <option value="<?php echo $data1['name']; ?>"><?php echo $data1['name']; ?></option>
                    <?php
                    }
                
                ?>

                </select>
                <input type="submit" name="delt" value="delete doctor">
                </form></center>
                <br><br> 
          <table class="tbl" id="first">
                <tr>
                    <td>Doctor ID</td>
                    <td>NAME</td>
                    <td>PHONE</td>
                    <td>Email</td>
                    <td>Gender</td>
                    
                </tr>
                <?php
                 $result=mysqli_query($con,"SELECT * from doctor");
                
                    while( $data1=mysqli_fetch_assoc($result))
                    {
                        ?>
                            <tr>
                                <td><?php echo $data1['d_id']; ?></td>
                                <td><?php echo $data1['name']; ?></td>
                                <td><?php echo $data1['phone']; ?></td>
                                <td><?php echo $data1['email']; ?></td>
                                <td><?php echo $data1['gender']; ?></td>
                            </tr>
                        <?php
                    }
                
                ?>
               </table>
               <br>
               <br>
               <h2>Update Doctor's Information</h2><br>
               <form action="admin.php" method="post">
               <select name="update" id="updt" onchange="document.getElementById('updation').style.visibility='visible'">
                <option>Select Doctor</option>
               <?php
                 $result=mysqli_query($con,"SELECT * from doctor");
                
                    while( $data1=mysqli_fetch_assoc($result))
                    {
                    ?>
                    <option value="<?php echo $data1['name']; ?>"><?php echo $data1['name']; ?></option>
                    <?php
                    }
                
                ?>


                </select>
                
               
                
                
               <div id="updation">
               <br>
                <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="name1" name="name" placeholder="Your Name">
                </div>
                <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="10 digit phone number">
                </div>
                <div class="form-group">
                <label>Address</label>
                <textarea name="address" id="address" rows="3" cols="10"  class="form-control">
                  
                </textarea>
                </div>
                <div class="form-group">
                <label>Gender:</label>&nbsp;&nbsp;
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label><br>

                </div>
               
                <input type="submit" name="udt" value="Update doctor">
                </div>
                
               </form>
              
               <br><br>
               </div>
            <hr>    
          <div id="patient">
          <h1> Patients</h1>
          <br><br>
          <center>
          <table class="tbl" id="first">
                <tr>
                    <td>Patient ID</td>
                    <td>NAME</td>
                    <td>PHONE</td>
                    <td>Email</td>
                    <td>Gender</td>
                    <td>Address</td>
                    
                </tr>
                <?php
                 $result=mysqli_query($con,"SELECT * from patient");
                
                    while( $data1=mysqli_fetch_assoc($result))
                    {
                        ?>
                            <tr>
                                <td><?php echo $data1['P_ID']; ?></td>
                                <td><?php echo $data1['name']; ?></td>
                                <td><?php echo $data1['phone']; ?></td>
                                <td><?php echo $data1['email']; ?></td>
                                <td><?php echo $data1['gender']; ?></td>
                                <td><?php echo $data1['address']; ?></td>
                            </tr>
                        <?php
                    }
                
                ?>
               </table>
          </center>
          </div>
        </div>
    </body>
</html>