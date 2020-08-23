<html>
    <head>
        <title>LOGIN/SIGNUP</title>
        <link rel="stylesheet"  type="text/css" href="signup.css">
        <script>
          function validate()
          {
            
            var Bloodgrp=document.getElementById('BG').value;
            var gender=document.getElementById('gender').value;
            var occp=document.getElementById('occupation').value;
            var email = document.forms["frm"]["email"].value;
            var pswd = document.forms["frm"]["password"].value;
            var name = document.forms["frm"]["username"].value;
            var addr=document.forms["frm"]["address"].value;
            var dob=document.forms["frm"]["dob"].value;
            var phone=document.forms["frm"]["phone"].value;

          
            if(Bloodgrp<1 || gender<1 || occp<1)
            {
              alert("please select at least one option");
              return false;
            }

           
            if (email == "" || pswd == "" || name == "") {
             alert("Fields are empty. Enter something" );
             return false;
            }
            if (phone == "" || addr == "" || dob == "") {
             alert("Fields are empty. Enter something" );
             return false;
            }

           
            if(email.indexOf("@")==-1 || email.indexOf(".")==-1)
            {
                alert("incorrect email");
                return false;
            }

            if(phone.length != 10)
            {
              alert("incorrect mobile number");
                return false;
            }

            if(pswd.length < 8)
            {
              alert("password length must be greater than or equal to 8");
                return false;
            }

           

          }
        
        </script>
    </head>
    <body>
        <center>
       

      
       <div class="signup" id="secondform">
      
           <h2 style="color: white;">Sign Up here</h2>
           <div class="signupform">
            <form action="signUp.php" method="post" onsubmit="return validate()" name="frm" enctype="multipart/form-data">
                
                
                      <label>Name</label>
                      <input type="text" name="username" id="username" placeholder="Enter your Full name" />
                    <br>
                    <br>
                    <br>
                
                      <label>Email</label>
                      <input type="text" name="email" id="email" placeholder="Enter your email address" />
                      <br>
                    <br>
                    <br>
                    <label>Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter your mobile number" />
                    <br>
                  <br>
                  <br>
                  <label>Address</label>
                    <textarea id="address" name="address"></textarea>
                <br>
                    <br>
                    <br>
                  <br>
                  <br>
                  <label>DOB</label>
                    <input type="date" name="dob" id="dob" placeholder="Enter your birthdate" />
                    <br>
                  <br>
                  <br>
                  <label> Set Password(minimum length 8 is required)</label>
                    <input type="password" name="password" placeholder="Enter Password" id="myInput" />
                   <br><br><br>
                  
                

                  
                  <div class="box">
                    <select class="blood" id="BG" name="bg">
                        <option value="0" selected>Blood Group</option>
                        <option value="apt">A+</option>
                        <option value="ang">A-</option>
                        <option value="bpt">B+</option>
                        <option value="bng">B-</option>
                        <option value="abpt">AB+</option>
                        <option value="abng">AB-</option>
                        <option value="opt">O+</option>
                        <option value="ong">O-</option>
                        
                    </select>
                    <select class="blood" id="gender" name="gender">
                        <option value="0" selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        </select>
                       
                  </div>
                  <br>

                  

                  <div class="box">
                    <select class="occ" id="occupation" name="occupation" onchange="handledisplay(value)">
                        <option value="0" selected>I am a .. </option>
                        <option value="doctor">Doctor</option>
                        <option value="patient">Patient</option>
                        <!-- <option value="receptionist">Receptionist</option> -->
                    </select>
                  </div>
                  <script>
                      function handledisplay(choice)
                      {
                          if(choice=="doctor")
                          {
                            document.getElementById('doctordata').style.display='block';
                            document.getElementById('patientdata').style.display='none';
                          }
                          else{
                            document.getElementById('patientdata').style.display='block';
                            document.getElementById('doctordata').style.display='none';
                          }
                      }
                      
                  </script>
                  <br>
                  <div id="patientdata">
                    <label>Your photo</label>
                    <input type="file" name="profile" id="profile" />
                    <br>
                    </div>
                  
                

                  <div id="doctordata" >
                    <label>Certificate</label>
                    <input type="file" name="Certificate" id="Certificate" />

                    <br>
                  
                  <label>Your photo</label>
                    <input type="file" name="Dprofile" id="Dprofile" />

                  </div>
                <input type="submit" name="sub" value="SIGN UP">
                <div class="agile-right">
                    <a href="login.php">Already Have an Account? Log In</a>

                </div>
            </form>

       </div>
    </center>
    </body>
</html>

<?php
    include('dbcon.php');
    if(isset($_POST['sub']))
    {
      $username=$_POST['username'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $address=$_POST['address'];
      $dob=htmlentities($_POST['dob']);
      $password=$_POST['password'];
      $bg=$_POST['bg'];
      $gender=$_POST['gender'];
      $occupation=$_POST['occupation'];
      if($occupation=="doctor")
      {
        $certi=$_FILES['Certificate']['name'];
        $tempcerti=$_FILES['Certificate']['tmp_name'];
        move_uploaded_file($tempcerti,"certi/$certi");

        $dp=$_FILES['Dprofile']['name'];
        $tempdp=$_FILES['Dprofile']['tmp_name'];
        move_uploaded_file($tempdp,"dataimg/$dp");


        $qry="INSERT INTO `doctor`(`name`, `email`, `phone`, `address`, `dob`, `password`, `bloodgroup`, `gender`,`certi`,`picture`) VALUES ('$username','$email','$phone','$address','$dob','$password','$bg','$gender','$certi','$dp')";
        $run=mysqli_query($con,$qry);
        if($run==true)
        {
          $_SESSION['uid'] = $email;
          $_SESSION['occ'] = "doctor";
          header('location:doctor/doctor.php');
        }
      }
      else
      {
        $dp=$_FILES['profile']['name'];
        $tempdp=$_FILES['profile']['tmp_name'];
        move_uploaded_file($tempdp,"dataimg/$dp");

        $qry="INSERT INTO `patient`(`name`, `email`, `phone`, `address`, `dob`, `password`, `bloodgroup`, `gender`,`picture`) VALUES ('$username','$email','$phone','$address','$dob','$password','$bg','$gender','$dp')";
        $run=mysqli_query($con,$qry);
        if($run==true)
        {
          $_SESSION['uid'] = $email;
          $_SESSION['occ'] = "patient";
          header('location:patient/patient.php');
        }
      }
    }
?>