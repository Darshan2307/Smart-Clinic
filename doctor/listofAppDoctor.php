 <?php
 session_start();
 ?>
 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="ISO-8859-1">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <style>
         .navbar-custom {
             background-color: white;
             font-weight: bolder;
         }

         .tbl {
             border-collapse: collapse;
             width: 80%;
             margin-left: 10%;

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
     </style>
     <title>Smart Clinic</title>
 </head>

 <body>

     <nav class="navbar navbar-inverse ">
         <div class="container-fluid">
             <div class="navbar-header">
                 <a class="navbar-brand" href="#">Smart Clinic</a>
             </div>
             <ul class="nav navbar-nav">
                 <li><a href="doctor.php">Home</a></li>
                 <li><a href="doctor.php#contactus">Contact US</a></li>
                 <li><a href="dprofile.php">My Profile</a></li>
                 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">My Appointments <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="listofAppDoctor.php"> Appointments</a></li>
                         <li><a href="generateP.php">Give Prescription</a></li>
                     </ul>
                 </li>
             </ul>
             <ul class="nav navbar-nav navbar-right">

                 <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>

             </ul>
         </div>
     </nav>


     <div class="container">
         <center>
             <h1>My Appointments</h1>
         </center>
         <br><br>
         <?php
            include('../dbcon.php');
            $email=$_SESSION['uid'];
            $sql="select * from doctor where email='$email'";
            $run=mysqli_query($con,$sql);
            $data=mysqli_fetch_assoc($run);
            $doctor=$data['name'];
            $sql1="select * from appointment where doctor='$doctor'";
            $run1=mysqli_query($con,$sql1);
            $row=mysqli_num_rows($run1);
            if($row < 1)
            {
                ?>
                    <h1>you don't have any Appointments.</h1>
                <?php
            }
            else
            {
            ?>
            <table class="tbl">
                <tr>
                    <td>PATIENT ID</td>
                    <td>NAME</td>
                    <td>PHONE</td>
                    <td>DOCTOR</td>
                    <td>DATE</td>
                </tr>
                <?php
                    while($data1=mysqli_fetch_assoc($run1))
                    {
                        ?>
                            <tr>
                                <td><?php echo $data1['P_ID']; ?></td>
                                <td><?php echo $data1['name']; ?></td>
                                <td><?php echo $data1['phone']; ?></td>
                                <td><?php echo $data1['doctor']; ?></td>
                                <td><?php echo $data1['date']; ?></td>
                            </tr>
                        <?php
                    }
                }
                ?>
            </table>

    </body>
 </html>